<?php

class Captcha {

    function createCaptcha($fontFolder) {
        $image = imagecreatetruecolor(100, 50);

        $number = rand(1000, 9999);
        $angle = rand(-10, 10);

        $red = imagecolorallocate($image, 255, 0, 0);
        $grey = imagecolorallocate($image, 150, 150, 150);
        $lightgray = imagecolorallocate($image, 240, 240, 240);

        imagefill($image, 0, 0, $lightgray);

        ImageTTFText($image, 18, $angle, 10, 35, $red, $fontFolder, $number);
        for ($i = 1; $i <= 100; $i += 10) {
            $x1 = rand(-20, 0) + $i;
            $y1 = rand(-20, 0) - $i;
            $x2 = rand(90, 120) + $i;
            $y2 = rand(90, 120) - $i;
            imageline($image, $x1, $y1, $x2, $y2, $grey);
        }

        for ($i = 1; $i <= 100; $i = $i + 10) {
            $x1 = rand(80, 95) - $i;
            $y1 = rand(-10, 10) - $i;
            $x2 = rand(-10, 1) - $i;
            $y2 = rand(100, 200) - $i;
            imageline($image, $x1, $y1, $x2, $y2, $grey);
        }

        imagepng($image, 'output/captcha.png');
        imagedestroy($image);

        $_SESSION['captcha'] = $number;
    }

}

?>
