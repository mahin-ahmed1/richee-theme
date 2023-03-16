<?php
/**
 * Template part for displaying posts
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'richee' ) );
		}
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
			<div class="richee-post-meta">
				<span><?php echo get_the_date();?> |</span>
				<span><?php echo get_the_author();?> |</span>
				<?php $richee_post_cats=get_the_category();
				foreach($richee_post_cats as $richee_cat){
					echo '<span>'.$richee_cat->name.', </span>';
				}
				?> 
			</div>
			<?php
		endif;
		?>
	</header><!-- .entry-header -->

	<?php the_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_excerpt(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'richee' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'richee' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<a class="blog-read-more" href="<?php echo esc_url(get_the_permalink());?>">Read More</a>

</article><!-- #post-<?php the_ID(); ?> -->
