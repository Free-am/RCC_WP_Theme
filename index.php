<?php if($_GET['target'] != 'post') { ?>
<!DOCTYPE html>
<html>
<?php } ?>
<?php get_header(); ?>
<?php if($_GET['target'] != 'post') { ?>
<body>
<div class="wrap">
	<div class="header">
		<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<span><?php bloginfo( 'description' ); ?></span>
	</div>
<?php } ?>
	<div class="content">
		<?php while (have_posts()) : the_post(); ?>
		<div class="post box">
			<div class="meta">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?>
				</a></h2>
                <span class="info-post"><?php the_time('Y m/d D') ?> - <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><br /><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?></span>
			</div>
			<div class="post-content">
                <?php the_content('Read More...'); ?>
			</div>
		</div>
		<?php endwhile; ?>
        <?php
			$link_next_page = get_next_posts_link(__('Load More'));
			if(!empty($link_next_page))
            {
        ?>
		<div class="loading" id="load_posts">
			<div class="link-load">
                <?php echo $link_next_page; ?>
			</div>
		</div>
        <?php } ?>
	</div>
<?php if($_GET['target'] != 'post') { ?>
    <div class="area_sidebar">
        <?php get_sidebar(); ?>
		<?php get_sidebar( '2' ); ?>
    </div>
    <?php get_footer(); ?>
</div>
</body>
</html>
<?php } ?>