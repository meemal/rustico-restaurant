<?php 
// WP_Query arguments
$args = array(
	'post_type' => array( 'menu' ),
);

// The Query
$queryMenu = new WP_Query( $args );

// The Loop
if ( $queryMenu->have_posts() ) {
	while ( $queryMenu->have_posts() ) {
		$queryMenu->the_post();

    if (have_rows('section')):
      echo '<nav aria-label="Jump to menus" class="mt-5 text-center text-uppercase"><p>Browse Menus</p>';
      while(have_rows('section')) : the_row();
        $sectionname = get_sub_field('section_name');
        if ($sectionname) {
          echo '<h3><a href="#section_'.preg_replace('/\W+/', '', $sectionname).'">'.$sectionname .'</a></h3>';
        }
      endwhile;
      echo '</nav>';
    endif;
  
    echo "<div class='flex-wrap my-5'>";
    if (have_rows('section')):
      while(have_rows('section')) : the_row();
        $sectionname = get_sub_field('section_name');
        $sectionintro = get_sub_field('section_intro');
        if ($sectionname) {
          echo "<div class='my-5' id='section_".preg_replace('/\W+/', '', $sectionname)."'>";
          echo "<h3 class='text-center text-uppercase pb-4 mb-4 border-bottom'>".$sectionname ."</h3>";
        } else {
          echo "<div class='my-5'>";
        }
        if ($sectionintro) {
          echo "<p class='text-center border-bottom pb-4 text-uppercase'>". $sectionintro."</p>";
        }
        if (have_rows("menu_item")):
          while(have_rows("menu_item")) : the_row();
            $itemname = get_sub_field('item_name');
            $itemdesc = get_sub_field('item_description');
            $itemprice = returnPriceFormatted(get_sub_field('item_price'));
            $itemdiet = returnDietaryFormatted(get_sub_field('item_diet'));
            $hasoptions = get_sub_field('has_options');
  
            echo "<div class='mb-2'>";
            echo "<p class='d-flex flex-row flex-nowrap justify-content-between align-content-start mb-0'>";
              echo "<span>";
                echo "<strong>".$itemname ."</strong>". $itemdiet;
                if ($itemdesc) {echo "<br />".$itemdesc;}
              echo "</span>";
              echo "<span class='d-flex pl-4 lead'><strong>".$itemprice."</strong></span>";
            echo "</p>";
            if ($hasoptions){
              if (have_rows("price_variation")):
                while(have_rows("price_variation")) : the_row();
                  $vardesc = get_sub_field('variation_description');
                  $varprice = returnPriceFormatted(get_sub_field('variation_price'));
                  $vardiet = returnDietaryFormatted(get_sub_field('variation_dietary'));
                  echo "<p class='d-flex flex-row flex-nowrap justify-content-between align-content-start ml-3 mb-0'>- ". $vardesc.$vardiet."<span class='pl-4 lead'><strong>".$varprice."</strong></span>". "</p>";
                endwhile;
              else: 
                echo "Please add some price varations for this menu item";
              endif;
            }
            echo "</div>";
          endwhile;
          echo "</div>";
        else:
          echo "<blockquote>Please add some menu items to section '".$sectionname."'</blockquote>";
        endif;
      endwhile;
  
    else:
      echo "<blockquote>Please add some sections to this menu.</blockquote>";
    endif;
    echo "</div>";
	}
}
// Restore original Post Data
wp_reset_postdata();
				

?>