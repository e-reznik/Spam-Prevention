<?php

class Email {

    /**
     * Creates a PNG image out of your email address.
     * 
     * @param type $fontFolder path of the font
     * @param type $mail your desired email address
     */
    function mail($fontFolder, $mail) {
        $image = imagecreatetruecolor(100, 18);
        $darkgrey = imagecolorallocate($image, 26, 26, 26);
        $grey = imagecolorallocate($image, 169, 169, 169);

        imagefill($image, 0, 0, $darkgrey);
        ImageTTFText($image, 10, 0, 0, 12, $grey, $fontFolder, $mail);

        imagepng($image, 'output/mail.png');
        imagedestroy($image);
    }

}

?>
