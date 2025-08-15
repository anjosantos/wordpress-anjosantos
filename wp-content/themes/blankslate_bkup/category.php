<?php get_header(); ?>
<section id="content" role="main">
<header class="header">
<h1 class="entry-title category-title"><?php _e( '', 'blankslate' ); ?><?php single_cat_title(); ?></h1>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
</header>
	<div id="category-posts">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="as-half">
<?php get_template_part( 'entry' ); ?>
		</div>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>