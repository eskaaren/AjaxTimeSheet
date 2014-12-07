<?php
$list_items = file("hours.txt");
$total_hours = 0;
$all_hours = 0;
$total_cost = 0;
$all_cost = 0;
$name = $_GET['project'];
$price = $_GET['price'];

echo "<table cellspacing=\"2\" cellpadding=\"2\" border=\"2\">
<tr>
<td>Date</td>
<td>Hours</td>
<td>Cost</td>
</tr>";
foreach($list_items as $list_item) {
	$list_item_exploded = explode("\t", $list_item);
	$list_date = htmlspecialchars(trim($list_item_exploded[1]));
	$list_hours = htmlspecialchars(trim($list_item_exploded[2]));
	if($name == htmlspecialchars(trim($list_item_exploded[0]))) {
		$cost = $list_hours * $price;
		echo "<tr>" . "<td>" . "$list_date" . "</td>" . "<td>" . "$list_hours" . "</td>" . "<td>" . "$cost" . "</td>" . "</tr>";
		$total_hours += $list_hours;
		$total_cost += $cost;
	}
	$all_hours += $list_hours;
	$all_cost = $all_hours * $price;
}
echo "<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Total</td>
<td>$total_hours</td>
<td>$total_cost</td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Total all projects</td>
<td>$all_hours</td>
<td>$all_cost</td>
</tr>
</table>";
?>