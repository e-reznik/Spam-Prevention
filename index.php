<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "Captcha.class.php";
        $captcha = new Captcha();
        $captcha->createCaptcha("fonts/OpenSans.ttf");

        include "Email.class.php";
        $email = new Email();
        $email->mail("fonts/OpenSans.ttf", "info@example.com");
        ?>
    </body>
</html>
