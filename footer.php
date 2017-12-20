			<div class="footer">
				Copyright © 2017
				<a class="authorLink" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. All rights reserved.
				<br />
                Theme powered by <a href="https://github.com/RenChuanChuan/RCC_WP_Theme">RCC</a>.
			</div>
<?php if(get_option('loadPlugins')=='YES') wp_footer(); ?>