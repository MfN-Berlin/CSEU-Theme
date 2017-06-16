<?php

/**
 * @file
 * Template to display a list of rows.
 */

$colnr = 1;
$total = count($rows) - 1;
$maxcols = 3;
$i = 0;

print '<h2>Working Group Members</h2>';

foreach ($rows as $delta => $row) {
  if ($delta % $maxcols == 0) {
    print '<div class="cseu-wgs-list-attachment-members-row">';
    $i = 0;
    $colnr = 1;
  }
  print '<div class="cseu-wgs-list-attachment-members-col-'. $colnr .'">';
  print '<div'. $row_attributes[$delta] .'>';
  print $row;
  print '</div>';
  print '</div>';
  $i++;
  $colnr++;
  if ($i == $maxcols || $delta == $total) {
    print '</div>';
  }
}

?>

