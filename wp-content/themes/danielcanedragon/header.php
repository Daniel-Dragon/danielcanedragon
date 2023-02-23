<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="site-header">
		<nav class="navbar navbar-expand-md navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'mytheme'); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'menu_class' => 'navbar-nav mr-auto',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => 'navbarNav',
						'fallback_cb' => false,
						'depth' => 1,
					));
				?>
			</div>
		</nav>
	</header>

	<main class="site-main">