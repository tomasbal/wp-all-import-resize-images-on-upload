//Images resize on upload handling
add_action('pmxi_gallery_image', 'my_gallery_image', 10, 3);

function my_gallery_image($pid, $attid, $image_filepath) {
    $attachment = get_post($attid);
   $square=500;


   // Load up the original image
   	//get extension
	$ext = pathinfo($image_filepath, PATHINFO_EXTENSION);
		if($ext == 'png'){
		$src = imagecreatefrompng($image_filepath);
		}
		else{
		$src = imagecreatefromjpeg($image_filepath);
		}

   $w = imagesx($src); // image width
   $h = imagesy($src); // image height

   // Create output canvas and fill with white
   $final = imagecreatetruecolor($square,$square);
   $bg_color = imagecolorallocate ($final, 255, 255, 255);
   imagefill($final, 0, 0, $bg_color);

   // Check if portrait or landscape
   if($h>=$w){
      // Portrait, i.e. tall image
      $newh=$square;
      $neww=intval($square*$w/$h);
      // Resize and composite original image onto output canvas
      imagecopyresampled(
         $final, $src, 
         intval(($square-$neww)/2),0,
         0,0,
         $neww, $newh, 
         $w, $h);
   } else {
      // Landscape, i.e. wide image
      $neww=$square;
      $newh=intval($square*$h/$w);
      imagecopyresampled(
         $final, $src, 
         0,intval(($square-$newh)/2),
         0,0,
         $neww, $newh, 
         $w, $h);
   }

   // Write result 
   	//get extension
   		if($ext == 'png'){
		   imagepng($final,$image_filepath);
		}
		else{
   		   imagejpeg($final,$image_filepath);
		}
    // do something with $attachment image
exec('wpcli --allow-root media regenerate '.$attid );
}
