<?php
$list_items = file("hours.txt");
$total_hours = 0;
$all_hours = 0;
$name = "";
$i = 0;
$arr = array();
sort($list_items);

foreach($list_items as $list_item) {
	$list_item_exploded = explode("\t", $list_item);
	$list_curName = htmlspecialchars(trim($list_item_exploded[0]));
	$list_hours = htmlspecialchars(trim($list_item_exploded[2]));
	
	if($name == "") $name = $list_curName;
	
	if($list_curName != $name) {
		$arr[$i] = $total_hours;
		$name = $list_curName;
		$total_hours = $list_hours;
	}
	else $total_hours += $list_hours;
	
	if($list_item == end($list_items)) {
		$arr[$i] = $total_hours;
	}
	$all_hours += $list_hours;
	$i++;
}

for($k=0; $k<$i; $k++) {
	$arr[$k] = ($arr[$k]/$all_hours)*100;
}

$total_hours = 0;
$name = "";
$i = 0;
echo "<table cellspacing=\"2\" cellpadding=\"2\" border=\"2\">
<tr>
<td>Project</td>
<td>Hours</td>
<td>Percent</td>
</tr>";
foreach($list_items as $list_item) {
	$list_item_exploded = explode("\t", $list_item);
	$list_curName = htmlspecialchars(trim($list_item_exploded[0]));
	$list_hours = htmlspecialchars(trim($list_item_exploded[2]));
	
	if($name == "") $name = $list_curName;
	
	if($list_curName != $name) {
		echo "<tr>" . "<td>" . "$name" . "</td>" . "<td>" . "$total_hours" . "</td>" . "<td>" . "$arr[$i]" . "</td>" . "</tr>";
		$name = $list_curName;
		$total_hours = $list_hours;
	}
	else $total_hours += $list_hours;
	
	if($list_item == end($list_items)) {
				echo "<tr>" . "<td>" . "$name" . "</td>" . "<td>" . "$total_hours" . "</td>" . "<td>" . "$arr[$i]" . "</td>" . "</tr>";
	}
	$i++;
}
	
echo "<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Total</td>
<td>$all_hours</td>
<td>100</td>
</tr>
</table>";
?>