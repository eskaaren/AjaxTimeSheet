<?php
$menu_items = file("projects.txt");
sort($menu_items);
foreach ($menu_items as $menu_item)
 {
   // Explode 
   $menu_item_exploded = explode("\t", $menu_item);
   $option_value = htmlspecialchars(trim($menu_item_exploded[0]));
   $option_label = htmlspecialchars(trim($menu_item_exploded[1]));

   echo "\"<option value=\"$option_value\">$option_label</option>\"";   
 }
?>