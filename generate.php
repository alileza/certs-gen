<?php
include 'function.php';
//Set the Content Type
header('Content-type: image/jpeg');


// Set Text to Be Printed On Image
$data = explode(';',$_POST['name']);
foreach($data as $a){
  generateImage('sertifikat2',$a);
}
header( 'Location: index.php' ) ;
    ?> 