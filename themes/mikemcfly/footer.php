		
		</main>
		<footer>
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu') ); ?>
			</div>
		</footer>
		
		<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
