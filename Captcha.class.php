<?php

class Captcha {

    /**
     * Creates a captcha consisting of random numbers.
     * 
     * @param type $minNum lowest possible number
     * @param type $maxNum highest possible number
     * @param type $minAng minimum angle
     * @param type $maxAng maximum angle
     * @param type $size font size
     * @param type $fontFolder font path
     * @return type the random number for comparison
     */
    function createCaptcha($minNum, $maxNum, $size, $fontFolder) {
        $number = rand($minNum, $maxNum);
        $angle = rand(-10, 10);

        /* Calculating final image size */
        $arSize = imagettfbbox($size, $angle, $fontFolder, $number);
        $iWidth = abs($arSize[2] - $arSize[0]);
        $iHeight = abs($arSize[7] - $arSize[1]);

        $image = imagecreatetruecolor($iWidth * 1.25, $iHeight * 2);

        /* Defining colors */
        $red = imagecolorallocate($image, 255, 0, 0);
        $lightgray = imagecolorallocate($image, 240, 240, 240);

        imagefill($image, 0, 0, $lightgray);
        ImageTTFText($image, $size, $angle, 10, $size * 1.25, $red, $fontFolder, $number);

        $this->createRandomLines($image);

        imagepng($image, 'output/captcha.png');
        imagedestroy($image);

        // $_SESSION['captcha'] = $number;
        return $number;
    }

    /**
     * Adds random lines for additional obfuscation.
     * 
     * @param type $image
     */
    function createRandomLines($image) {
        $grey = imagecolorallocate($image, 150, 150, 150);

        for ($i = 1; $i <= 200; $i += 10) {
            $x1 = rand(-20, 0) + $i;
            $y1 = rand(-20, 0) - $i;
            $x2 = rand(100, 220) + $i;
            $y2 = rand(100, 220) - $i;
            imageline($image, $x1, $y1, $x2, $y2, $grey);
        }

        for ($i = 1; $i <= 200; $i = $i + 10) {
            $x1 = rand(80, 95) - $i;
            $y1 = rand(-10, 10) - $i;
            $x2 = rand(-10, 1) - $i;
            $y2 = rand(80, 250) - $i;
            imageline($image, $x1, $y1, $x2, $y2, $grey);
        }
    }

}

?>