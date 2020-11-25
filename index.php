<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /* Example use of the captcha creator */

        include "Captcha.class.php";
        $captcha = new Captcha();

        $minNum = 1000; // lowest possible number
        $maxNum = 9999999; // highest possible number
        $size = 40; // text size

        $number = $captcha->createCaptcha($minNum, $maxNum, $size, "fonts/GloriaHallelujah.ttf");

        echo $number;

        /* Example use of the email address obfuscator */

        include "Email.class.php";
        $email = new Email();
        $email->mail("fonts/OpenSans.ttf", "info@example.com");
        ?>
    </body>
</html>
