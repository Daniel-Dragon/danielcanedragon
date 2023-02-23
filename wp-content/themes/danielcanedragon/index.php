<?php

get_header();
?>
<div class="container">
	<?php if (is_front_page() && is_home()): ?>
		<h1 class="display-4"><?php bloginfo('name'); ?></h1>
		<p class="lead"><?php bloginfo('description'); ?></p>
	<?php else: ?>
		<h1 class="my-4"><?php the_title(); ?></h1>
	<?php endif; ?>

	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>
			<div class="card mb-4">
				<div class="card-body">
					<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
	<?php else: ?>
		<p><?php esc_html_e('Sorry, no posts found.', 'mytheme'); ?></p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>