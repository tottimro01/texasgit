<?php
require('../inc/conn.php');
require('../inc/function.php');
$uploaddir = 'profile/';
$mid = $_GET["mid"];
$time = time();

$file = basename($_FILES['uploadedfile']['name']);
$uploadfile = $uploaddir . $file;
	if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $uploadfile)) {
		$img_add = $file;
		$re=sql_query("update bom_tb_member set m_pic = '$file' where m_id = '$mid'");
		echo $img_add;
	}
	else {
		echo "error";
		exit();
	}


class SimpleImage {   var $image; var $image_type;   function load($filename) {   $image_info = getimagesize($filename); $this->image_type = $image_info[2]; if( $this->image_type == IMAGETYPE_JPEG ) {   $this->image = imagecreatefromjpeg($filename); } elseif( $this->image_type == IMAGETYPE_GIF ) {   $this->image = imagecreatefromgif($filename); } elseif( $this->image_type == IMAGETYPE_PNG ) {   $this->image = imagecreatefrompng($filename); } } function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {   if( $image_type == IMAGETYPE_JPEG ) { imagejpeg($this->image,$filename,$compression); } elseif( $image_type == IMAGETYPE_GIF ) {   imagegif($this->image,$filename); } elseif( $image_type == IMAGETYPE_PNG ) {   imagepng($this->image,$filename); } if( $permissions != null) {   chmod($filename,$permissions); } } function output($image_type=IMAGETYPE_JPEG) {   if( $image_type == IMAGETYPE_JPEG ) { imagejpeg($this->image); } elseif( $image_type == IMAGETYPE_GIF ) {   imagegif($this->image); } elseif( $image_type == IMAGETYPE_PNG ) {   imagepng($this->image); } } function getWidth() {   return imagesx($this->image); } function getHeight() {   return imagesy($this->image); } function resizeToHeight($height) {   $ratio = $height / $this->getHeight(); $width = $this->getWidth() * $ratio; $this->resize($width,$height); }   function resizeToWidth($width) { $ratio = $width / $this->getWidth(); $height = $this->getheight() * $ratio; $this->resize($width,$height); }   function scale($scale) { $width = $this->getWidth() * $scale/100; $height = $this->getheight() * $scale/100; $this->resize($width,$height); }   function resize($width,$height) { $new_image = imagecreatetruecolor($width, $height); imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight()); $this->image = $new_image; }   }


$image = new SimpleImage(); 
$image->load($uploaddir.$file); 
$image->resizeToWidth(160); 
$image->save($uploaddir."small_".$file); 

?>