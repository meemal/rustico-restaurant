<?php 



function displayMenu($menuid){
  $output = "";

  // WP_Query arguments
  $args = array(
    'post_type' => array( 'menu' ),
    'p' => $menuid,   // id of the post you want to query
  );

// The Query
$queryMenu = new WP_Query( $args );

// The Loop
if ( $queryMenu->have_posts() ) {
	while ( $queryMenu->have_posts() ) {
		$queryMenu->the_post();

    if (have_rows('section')):
      $output .= '<nav aria-label="Jump to menus" class="mt-5 text-center text-uppercase">';
      $output .= '<div class="wp-block-buttons is-content-justification-center">';
      while(have_rows('section')) : the_row();
        $sectionname = get_sub_field('section_name');
        if ($sectionname) {
          $output .= '<div class="wp-block-button is-style-outline">';
          $output .= '<a class="wp-block-button__link  dropdown-toggle" href="#section_'.preg_replace('/\W+/', '', $sectionname).'">'.$sectionname .'</a>';
          $output .= '</div>';
        }
      endwhile;
      $output .= '</div>';
      $output .= '</nav>';
    endif;
  
    $output .= "<div class='flex-wrap my-5'>";
    if (have_rows('section')):
      while(have_rows('section')) : the_row();
        $sectionname = get_sub_field('section_name');
        $sectionintro = get_sub_field('section_intro');
        $sectionsup = get_sub_field('section_suplementary');
        
        if ($sectionname) {
          $output .= "<div class='my-5' id='section_".preg_replace('/\W+/', '', $sectionname)."'>";
          $output .= "<h3 class='text-center text-uppercase pb-4 mb-4 border-bottom'>".$sectionname ."</h3>";
        } else {
          $output .= "<div class='my-5'>";
        }
        if ($sectionintro) {
          $output .= "<p class='text-center border-bottom  pb-4 text-uppercase'>". $sectionintro."</p>";
        }
        if ($sectionsup) {
          $output .= "<p class='text-center pb-2'><em>~ ". $sectionsup." ~</em></p>";
        }
        if (have_rows("menu_item")):
          while(have_rows("menu_item")) : the_row();
            $itemname = get_sub_field('item_name');
            $itemdesc = get_sub_field('item_description');
            $itemprice = returnPriceFormatted(get_sub_field('item_price'));
            $itemdiet = returnDietaryFormatted(get_sub_field('item_diet'));
            $hasoptions = get_sub_field('has_options');
  
            $output .= "<div class='mb-2'>";
            $output .= "<div class='d-flex flex-row flex-nowrap justify-content-between align-content-start mb-0'>";
              $output .= "<div class='mb-3'>";
                $output .= "<strong style='font-size:1.25rem;'>".$itemname ."</strong>". $itemdiet;
                if ($itemdesc) {$output .= "<br /><span class='text-light'>".$itemdesc."</span>";}
              $output .= "</div>";
              $output .= "<div class='d-flex pl-4 lead'><strong>".$itemprice."</strong></div>";
            $output .= "</div>";
            if ($hasoptions){
              if (have_rows("price_variation")):
                while(have_rows("price_variation")) : the_row();
                  $vardesc = get_sub_field('variation_description');
                  $varprice = returnPriceFormatted(get_sub_field('variation_price'));
                  $vardiet = returnDietaryFormatted(get_sub_field('variation_dietary'));
                  $output .= "<p class='d-flex flex-row flex-nowrap justify-content-between align-content-start ml-3 mb-0'><span class='text-light'>- ". $vardesc.$vardiet."</span><span class='pl-4 lead'><strong>".$varprice."</strong></span>". "</p>";
                endwhile;
              else: 
                $output .= "Please add some price varations for this menu item";
              endif;
            }
            $output .= "</div>";
          endwhile;
          $output .= "</div>";
        else:
          $output .= "<blockquote>Please add some menu items to section '".$sectionname."'</blockquote>";
        endif;
      endwhile;
  
    else:
      $output .= "<blockquote>Please add some sections to this menu.</blockquote>";
    endif;
    $output .= "</div>";
	}
}
// Restore original Post Data
wp_reset_postdata();

return $output;
  
}

?>