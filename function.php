<?php
function fixbbox($bbox) {
   $xcorr=0-$bbox[6]; //northwest X
   $ycorr=0-$bbox[7]; //northwest Y
   $tmp_bbox['left']=$bbox[6]+$xcorr;
   $tmp_bbox['top']=$bbox[7]+$ycorr;
   $tmp_bbox['width']=$bbox[2]+$xcorr;
   $tmp_bbox['height']=$bbox[3]+$ycorr;
   
   return $tmp_bbox;
}
      
function imagettftextSp($image, $size, $angle, $x, $y, $color, $font, $text, $spacing = 0)
{        
    if ($spacing == 0)
    {
        imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
    }
    else
    {
        $temp_x = $x;
        for ($i = 0; $i < strlen($text); $i++)
        {
            $bbox = imagettftext($image, $size, $angle, $temp_x, $y, $color, $font, $text[$i]);
            $temp_x += $spacing + ($bbox[2] - $bbox[0]);
        }
    }
}


function generateImage($base,$text,$fontSize = 141,$letterSpacing = 25){
   
      $filename = 'layout/'.$base.'.jpg';
      
      // Create Image From Existing File
      $jpg_image = imagecreatefromjpeg($filename);
      $img_size = getimagesize($filename);
      // Allocate A Color For The Text
      $white = imagecolorallocate($jpg_image, 119, 24, 15);

      // Set Path to Font File
      $font_path = 'Antonio-Regular.ttf';
       
     
      
      $bbox = fixbbox(imagettfbbox($fontSize, 0, $font_path, $text));
        
      $left = ($img_size[0] / 2) - ($bbox['width'] / 2);
      $top = 1170;
       
      // Print Text On Image
     imagettftextSp($jpg_image, ($fontSize - $letterSpacing), 0, $left, $top, $white, $font_path, $text,$letterSpacing);
     
     
      $name = strtolower(str_replace(' ','-',$text));
      // Send Image to Browser
      imagejpeg($jpg_image,'result/'.$name.'.jpg');

      // Clear Memory
      imagedestroy($jpg_image);
}