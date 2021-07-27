<?php
session_start();
$captcha = '';
$captchaHeight = 60;
$captchaWidth = 140;
$totalCharacters = 6;
$possibleLetters = 'CT5gKQSBr703aW7RTJaRstv8ve3lyUXhtnf4pXQvt983hr75MaTuVLfzZDD93hrmRYUTyWsARcDu7I31ZemJOVa0fjnr6kDP0Ejl';
$captchaFont = 'monofont.rtf';
$randomDots = 50;
$randomLines = 25;
$textColor = "6d87cf";
$noiseColor = "6d87cf"; 
$character = 0;
while ($character < $totalCharacters) {
      $captcha .= substr($possibleLetters, mt_rand(0, strlen($possibleLetters)-1), 1);
      $character++;
}
$characterFontSize = $captchaHeight * 0.65;
$captchaIamge = @imagecreate(
       $captchaHeight,
       $captchaWidth
);
$backgroundColor = imagecolorallocate(
      $captchaImage,
      255,
      255,
      255
);
$arrayTextColor = hextorgb($textColor);
$textColor = imagecolorallocate(
 $captchaImage,
 $arrayTextColor['red'],
 $arrayTextColor['green'],
 $arrayTextColor['blue']
); 
$arrayNoiseColor = hextorgb($noiseColor);
$imageNoiseColor = imagecolorallocate(
 $captchaImage,
 $arrayNoiseColor['red'],
 $arrayNoiseColor['green'],
 $arrayNoiseColor['blue']
); 
for( $captchaDotsCount=0; $captchaDotsCount<$randomDots; $captchaDotsCount++ ) {
imagefilledellipse(
	 $captchaImage,
	 mt_rand(0,$captchaWidth),
	 mt_rand(0,$captchaHeight),
	 2,
	 3,
	 $imageNoiseColor
 );
}
for( $captchaLinesCount=0; $captchaLinesCount<$randomLines; $captchaLinesCount++ ) {
	imageline(
		$captchaImage,
		mt_rand(0,$captchaWidth),
		mt_rand(0,$captchaHeight),
		mt_rand(0,$captchaWidth),
		mt_rand(0,$captchaHeight),
		$imageNoiseColor
	);
} 
$text_box = imagettfbbox(
	$captchaFontSize,
	0,
	$captchaFont,
	$captcha
); 
$x = ($captchaWidth - $text_box[4])/2;
$y = ($captchaHeight - $text_box[5])/2;
imagettftext(
	$captchaImage,
	$captchaFontSize,
	0,
	$x,
	$y,
	$textColor,
	$captchaFont,
	$captcha
); 
header('Content-Type: image/jpeg'); 
imagejpeg($captchaImage); 
imagedestroy($captchaImage);
$_SESSION['captcha'] = $captcha; 
function hextorgb ($hexstring){
	$integar = hexdec($hexstring);
	return array(
		"red" => 0xFF & ($integar >> 0x10),
		"green" => 0xFF & ($integar >> 0x8),
		"blue" => 0xFF & $integar
	);
}
?>

<?php
session_start();
$message = '';
if ( isset($_POST['securityCode']) && ($_POST['securityCode']!="")){
	if(strcasecmp($_SESSION['captcha'], $_POST['securityCode']) != 0){
		$message = "You have entered incorrect security code! Please try again.";
	}else{
		$message = "Your have entered correct security code."; 
	}
} else {
	$message = "Enter security code."; 
}
?>
