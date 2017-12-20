<?php if($_GET['target'] != 'post' && $_GET['target'] != 'comments') { ?>
<head>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=0.8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php 
	if (is_home() || is_front_page())//ok
	{
        $description = get_bloginfo( 'description' , false);
    ?>
	<meta name="description" content="<?php echo $description; ?>" />
	<?php
	}
	elseif (is_category())//ok
	{
        $description = sprintf( __( '目录 %s 下的文章列表'), single_cat_title('', false));
    ?>
	<meta name="description" content="<?php echo $description; ?>" />
	<?php
	}
	elseif (is_tag())//ok
	{
        $description = sprintf( __( '与标签 %s 相关联的文章列表'), single_tag_title('', false));
    ?>
	<meta name="description" content="<?php echo $description; ?>" />
	<?php
    }
	elseif (is_single())//ok
	{
    	$keywords = "";
    	$tags = wp_get_post_tags($post->ID);
        foreach ($tags as $tag ) 
        {
        	$keywords = $keywords . $tag->name . ", ";
        }
    ?>
	<meta name="keywords" content="<?php echo $keywords; ?>" />
    <?php
    }
	elseif (is_page())//ok
	{
	}
	?>
<?php } ?>
	<title>
    <?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );

	?>
    </title>
<?php if($_GET['target'] != 'post' && $_GET['target'] != 'comments') { 
    $themeUrl = get_option('themeUrl');
	if(empty($themeUrl))
    {
    	$themeUrl = esc_url(site_url('/')).'wp-content/themes/RCC_WP_Theme/';
    }
?>
    <link rel="stylesheet" type="text/css" href="<?php echo $themeUrl; ?>style.css" />
    <link rel="shortcut icon" href="<?php echo $themeUrl; ?>favicon.png" />
    <script type="text/javascript" src="<?php echo $themeUrl; ?>jquery.min.js">
    </script>
    <?php if(get_option('loadPlugins')=='YES') wp_head(); ?>
</head>
<?php } ?>