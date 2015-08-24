<?php


class CembriGenerator{
    
    private $layout;
    private $layout_size;
    private $text;
    private $text_color;
    private $font;
    private $font_size;
    private $letter_spacing;
    private $position;
    
    public function __construct($base){
        $layout_path = 'layout/'.$base.'.jpg';
        $this->layout = imagecreatefromjpeg($layout_path);
        $this->layout_size = getimagesize($layout_path);
       
       
    }
    
    
        
}

/*
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
      $top = 330;
       
      // Print Text On Image
     imagettftextSp($jpg_image, ($fontSize - $letterSpacing), 0, $left, $top, $white, $font_path, $text,$letterSpacing);
     
    
      $name = strtolower(str_replace(' ','-',$text));
      // Send Image to Browser
      imagejpeg($jpg_image,'result/'.$name.'.jpg');

      // Clear Memory
      imagedestroy($jpg_image);
      */