<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body>
		<div id="main" class="m-scene">
			<div <?php body_class(); ?>>
		    <!--[if IE]>
		      <div class="alert alert-warning">
		        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
		      </div>
		    <![endif]-->
				<header class="side-nav">
			    <?php
			      do_action('get_header');
			      get_template_part('templates/header');
			    ?>
				</header>
		    <main class="site-content m-page scene_element scene_element--fadein">
		      <div class="container-fluid">
		        <?php include Wrapper\template_path(); ?>
		      </div><!-- /.content -->
		    </main><!-- /.main -->
			</div>
		</div>
		<?php
			do_action('get_footer');
			get_template_part('templates/footer');
			wp_footer();
		?>
  </body>
</html>
