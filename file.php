<?php
$bar=array();
foreach($_GET as $name=>$value) {
$name=preg_match('/^[\w _-]$/si',trim(urldecode($name)))?trim(urldecode($name)):'';
$value=ctype_digit(trim(urldecode($value)))?trim(urldecode($value)):0;
if($name!='') $bar[$name]=$value;
}
$c=count($bar);
$sort=$bar;sort($sort);$max=$sort[$c-1];
$h=150/$max;
header("Content-type: image/gif");
if($c>0) {
$im=@imagecreate(400,200);
$background_color=imagecolorallocate($im,255,255,255);
$line_color=imagecolorallocate($im,127,127,127);
$text_color=imagecolorallocate($im,0,0,0);
imageline($im, 20, 20, 20, 180, $line_color);
imageline($im, 20, 180, 380, 180, $line_color);

$w=340/$c;$i=0;
foreach($bar as $name=>$value) {
$p=30+($w*$i);$height=150-($value*$h)+30;
imageline($im, $p, $height, $p, 180, $line_color);
imageline($im, $p+$w, $height, $p+$w, 180, $line_color);
imageline($im, $p, $height, $p+$w, $height, $line_color);
imagestring($im,2,$p+($w/2),($i%2==1?185:180),$name,$text_color);
$i++;
}
}
else {
$im=@imagecreate(400,200);
$background_color=imagecolorallocate($im,255,255,255);
$text_color=imagecolorallocate($im,0,0,0);
imagestring($im,10,10,10,'No Data',$text_color);
}
imagegif($im);
imagedestroy($im);
?>
