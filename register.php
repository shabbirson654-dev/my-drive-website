<?php

require("db.php");

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../PHPMailer/src/Exception.php";
require_once "../PHPMailer/src/PHPMailer.php";
require_once "../PHPMailer/src/SMTP.php";


if($_SERVER['REQUEST_METHOD']=="POST")
{
    $pattern="1234567890";
    $length= strlen($pattern)-1;
    $v_code=[];

    for ($i=0; $i < 6; $i++) {
        $index= rand(0,$length);
        $v_code[]= $pattern[$index];
    }

    $ver_code= implode($v_code);

    $full_name=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $check="SELECT email FROM users WHERE email='$email'";

    $response=$db->query($check);

    if($response->num_rows !=0)
    {
        echo "usermatch";
    }
    else
    {

        // =========================
        // SEND ACTIVATION EMAIL
        // =========================

        $mail = new PHPMailer(true);

        try
        {
            // SMTP
            $mail->isSMTP();
            $mail->Host = "smtp.maileroo.com";
            $mail->SMTPAuth = true;

            // Maileroo SMTP credentials
            $mail->Username = "14ef21.5286.479da6ce7f6727529c6d71179d4187df@a.maileroo.net";
            $mail->Password = "481977bb01a4907bdf9b446e";

            // Encryption
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;


            // FROM
            // Use the sender address belonging to your
            // Maileroo verified domain.
            $mail->setFrom(
                "shabbirson@9764ba9aacf16e41.maileroo.org",
                "My Drive Website"
            );


            // TO
            $mail->addAddress($email);


            // Email format
            $mail->isHTML(true);

            $mail->Subject = "Activation Code";

            $mail->Body = "
                <h2>My Drive Website</h2>

                <p>Hello <b>$full_name</b>,</p>

                <p>Your Activation Code is:</p>

                <h1>$ver_code</h1>

                <p>Please use this code to activate your account.</p>

                <p>Thank you.</p>
            ";


            // Send email
            $mail->send();

            $send_atc = true;

        }
        catch(Exception $e)
        {
            $send_atc = false;
        }


        // =========================
        // STORE USER
        // =========================

        if($send_atc)
        {
            $store="INSERT INTO users(full_name,email,password,activation_code)
            VALUES('$full_name','$email','$password','$ver_code')";

            if($db->query($store))
            {
                echo "success";
            }
            else
            {
                echo "failed";
            }
        }

        else
        {
            echo "Try Again code is not sent!";
        }

    }
}
else
{
    echo "unauthorized request";
}

?>