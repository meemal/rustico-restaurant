<?php

/**
 * Fucntions specific to the menu display
 */

 function returnDietaryFormatted($itemdiet){
   $strdiet = "";
  if ($itemdiet){
    $strdiet = " (";
    foreach ($itemdiet as $diet): 
      $strdiet .= $diet.", ";
    endforeach;
    $strdiet = rtrim($strdiet, ", ");
    $strdiet .= ")";
  }

  return $strdiet;
 }

 function returnPriceFormatted($price){
  $itemprice = "";
    if ($price){
      $itemprice = "<span> / £".$price ."</span>";
    }
    return $itemprice;
 }
