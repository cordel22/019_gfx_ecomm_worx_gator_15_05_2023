<?php # Script 19.8 - show_image.php
//  This pages retrieves and shows in image.
//  Flag variables:
$image = FALSE;
$name = (!empty($_GET['name'])) ? $_GET['name'] : 'print image';

//  Chck for an image value in the URL:
if (isset($_GET['image']) && filter_var($_GET['image'], FILTER_VALIDATE_INT, array('min_range' => 1))) {

  //  Full image path:
  $image = './uploads/' . $_GET['image'] . '.jpg';

  //  Check that the imge exists and is a file:
  if (!file_exists($image) || (!is_file($image))) {
    $image = FALSE;
  }
} //  End of $_GET['image'] IF.

//  If there was a problem, use the default image:
if (!$image) {
  /* $image = 'images/unavailable.png';
      $name = 'unavailable.png'; */
  //  nemas *.png
  //  debug
  $image = 'images/unavailable.jpg';
  $name = 'unavailable.jpg';
}

//  Get the image information:
$info = getimagesize($image);
$fs = filesize($image);

//  Send the content informtion:
header("Content-Type: {$info['mime']}\n");
header("Content-Disposition: inline; filename=\"$name\"\n");
header("Content-Length: $fs\n");

//  Send the file:
readfile($image);
