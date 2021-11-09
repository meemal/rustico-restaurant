<?php
/**
 * The template for displaying all single menus
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					understrap_post_nav();

					if (have_rows('section')):
						while(have_rows('section')) : the_row();
							$sectionname = get_sub_field('section_name');
							$sectionintro = get_sub_field('section_intro');
							$menuitem = get_sub_field('menu_item');
							echo "<h3>".$sectionname ."</h3>";
							echo "<p>". $sectionintro."</p>";
							if (have_rows($menuitem)):
								while(have_rows($menuitem)) : the_row();
									$itemname = get_sub_field('item_name');
									$itemdesc = get_sub_field('item_description');
									$itemprice = get_sub_field('item_price');
									$itemdiet = get_sub_field('item_diet');
									echo "<div>";
									echo "<h3>".$itemname . "(".$itemdiet.")</h3>";
									echo "<p>". $itemdesc."</p>";
									echo "<p>". $itemprice."</p>";
									echo "</div>";
								endwhile;

							else:
								echo "<blockquote>Please add some menu items to section '".$sectionname."'</blockquote>";
							endif;
						endwhile;

					else:
						echo "<blockquote>Please add some sections to this menu.</blockquote>";
					endif;
// 					section
// section_name
// section_intro

// repeater menu_item
// item_name
// item_description
// item_price
// item_diet

// repeater price_variation
// variation_description
// variation_price
// variation_dietary 
				}
				?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
