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

			<main class="site-main" id="main">
				
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					understrap_post_nav();

					echo "<div class='d-flex flex-wrap my-5'>";
					if (have_rows('section')):
						while(have_rows('section')) : the_row();
							$sectionname = get_sub_field('section_name');
							$sectionintro = get_sub_field('section_intro');
							$sectionwidth = get_sub_field('section_width');
							switch ($sectionwidth){
								case "half": 
									$maincol = "col-md-6";
									$subcol = "col-6";
									break;
									case "full":
									$maincol = "col-12";
									$subcol = "col-md-6 col-lg-3";
									break;
								default:
									$maincol = "col-12";
									$subcol = "col-md-6 col-lg-3";
									break;
							}

							echo "<div class='".$maincol." my-5'>";
							echo "<h3 class='text-center text-uppercase border-bottom pb-4 mb-0'>".$sectionname ."</h3>";
							if ( $sectionintro ){
								echo "<p class='text-center border-bottom p-4 text-uppercase'>". $sectionintro."</p>";
							}
							

							if (have_rows("menu_item")):
								echo "<div class='d-flex flex-wrap'>";
								while(have_rows("menu_item")) : the_row();
									$itemname = get_sub_field('item_name');
									$itemdesc = get_sub_field('item_description');
									$itemprice = returnPriceFormatted(get_sub_field('item_price'));
									$itemdiet = returnDietaryFormatted(get_sub_field('item_diet'));
									$hasoptions = get_sub_field('has_options');



									echo "<div class='border-bottom ".$subcol." mb-2 p-2'>";
									if ($itemdesc){
										echo "<p><span class='text-uppercase'>".$itemname . "</span>" . $itemdiet ."</p>";
										echo "<p>". $itemdesc.$itemprice. "</p>";
									}else{
										echo "<p><span class='text-uppercase'>".$itemname . "</span>" . $itemdiet . $itemprice. "</p>";
									}
									
									if ($hasoptions){
										if (have_rows("price_variation")):
											echo "<ul class='list-unstyled'>";
											while(have_rows("price_variation")) : the_row();
												$vardesc = get_sub_field('variation_description');
												$varprice = returnPriceFormatted(get_sub_field('variation_price'));
												$vardiet = returnDietaryFormatted(get_sub_field('variation_dietary'));
												echo "<li>".$vardesc.$varprice.$vardiet. "</li>";

											endwhile;
											echo "</ul>";
										else: 
											echo "Please add some price varations for this menu item";
										endif;
									}
									echo "</div>";
									
								endwhile;
								echo "</div>";
								echo "</div>";
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
	</div>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
