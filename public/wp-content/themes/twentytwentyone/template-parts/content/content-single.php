<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php  
		$args = array(
        'posts_per_page' => 1000,
        'order'          => 'ASC',
       	'post_mime_type' => 'image',
        'post_parent'    => get_the_ID(),
        'post_type'      => 'attachment',
    );
 
    $attachments = get_children( $args );
	
 	/**
	  * Exibe as imagens destacadas e as Thumbnails do álbum
	  */
    foreach ( $attachments as $att ) {
       echo '<img src="' . wp_get_attachment_thumb_url( $att->ID ) . '" class="current">';
    } 
	
	?>

	</header>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
