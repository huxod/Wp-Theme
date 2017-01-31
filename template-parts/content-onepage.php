<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hlportfolio
 */

?>
<div id="primary" class="content-area one-page">
	<main id="main" class="site-main" role="main"><!-- .entry-menu -->
		<?php 
// the name of your menu
$menu_name = 'primary';

if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
}
foreach ($menu_items as $menu_item) {
    $idm = $menu_item->ID;
    $title = strtolower($menu_item->title);
    $url = $menu_item->url;

    if ($parent_id = $menu_item->menu_item_parent) {
        //the element has a parent with id $parent_id, so you can build a hierarchically menu tree
    }
    else {
      $mtitle = str_replace(' ', '', $title);  //the element doesn't have a parent

			$mypages = get_pages();
			foreach( $mypages as $page ):	
				$idtitle = strtolower($page->post_title);
				?>
				<?php if($mtitle == str_replace(' ', '', $idtitle)):?>
				<?php
				$content = $page->post_content;
				if ( ! $content ) // Check for empty page
					continue;
				$idcurentpage = ($page->ID );
				$content = apply_filters( 'the_content', $content );	?>
		<div id="<?php echo str_replace(' ', '', $idtitle); ?>"  class="article_wrapper">
		<article id="post-<?php echo $idcurentpage; ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo $page->post_title; ?></h1>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php
					echo $content; 
		
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hlportfolio' ),
								'after'  => '</div>'
							) );
				?>
			</div><!-- .entry-content -->
			<?php  if ( get_edit_post_link($idcurentpage) ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %1s', 'hlportfolio'),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>',
						$idcurentpage
					);
				?>
			</footer><!-- .entry-footer -->
			<?php endif; ?>
		</article>
		</div>
		<?php endif; endforeach; 
    }
}?><!-- #post-## -->
	</main><!-- #main -->
</div><!-- #primary -->