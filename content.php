<?php
/**
 * @package Melany
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hero-unit' ); ?>>
	<header class="page-header">
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta muted">
			<small><?php melany_posted_on();
					/* Check categories for this blog */
					if( melany_categorized_blog() ){
						$category_list = get_the_category_list( __( ', ', 'melany' ) );
						printf( __( ' in %1$s', 'melany' ), $category_list );
					}
				?></small>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_home() ) : // Only display Excerpts for Search and posts page ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<div class="clearfix">
			<a href="<?php echo get_permalink(); ?>" class="btn btn-large btn-primary pull-right"><?php echo __( 'Continue reading', 'melany' ); ?></a>
		</div>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content clearfix">
		<?php melany_the_content( __( 'Continue reading', 'melany' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'melany' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="well well-small row-fluid">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'melany' ) );
				if ( $tags_list ) :
			?>
		<div class="span9">
			<span>
				<?php printf( __( 'Tags: %1$s', 'melany' ), $tags_list ); ?>
			</span>
		</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
		<div class="span3 text-right pull-right">
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<?php comments_popup_link( __( 'Leave a comment', 'melany' ), __( '1 Comment', 'melany' ), __( '% Comments', 'melany' ) ); ?>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'melany' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</div>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
