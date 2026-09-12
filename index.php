<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Drive - Sign Up</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>

    <style>

      

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background:
                radial-gradient(circle at 15% 20%, rgba(104, 72, 255, 0.18), transparent 28%),
                radial-gradient(circle at 90% 75%, rgba(0, 174, 255, 0.14), transparent 28%),
                #08091d;
            color: #fff;
        }

        .main-con {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            position: relative;
            padding-top: 30px;
            padding-bottom: 50px;
        }

        .main-con > .row {
            width: 100%;
            align-items: center;
        }


        

        .signup-left {
            padding: 30px 50px;
            position: relative;
        }

        .drive-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 9px 16px;
            border: 1px solid rgba(255,255,255,.14);
            background: rgba(255,255,255,.06);
            border-radius: 50px;
            backdrop-filter: blur(12px);
            font-size: 13px;
            color: #cfd2ff;
            margin-bottom: 25px;
        }

        .drive-badge span {
            width: 8px;
            height: 8px;
            background: #6d5dfc;
            border-radius: 50%;
            box-shadow: 0 0 15px #6d5dfc;
        }

        .signup-left h1 {
            font-size: clamp(38px, 4vw, 64px);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -2px;
            margin-bottom: 20px;
        }

        .signup-left h1 span {
            background: linear-gradient(90deg, #ffffff, #8d82ff, #55c8ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .signup-left p {
            max-width: 480px;
            color: #a9abc2;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .feature-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .feature-item {
            padding: 10px 15px;
            border-radius: 12px;
            background: rgba(255,255,255,.055);
            border: 1px solid rgba(255,255,255,.08);
            color: #c9cbe0;
            font-size: 13px;
            backdrop-filter: blur(10px);
        }

        .feature-item::before {
            content: "✓";
            margin-right: 7px;
            color: #7f72ff;
            font-weight: bold;
        }


        /* =========================================
           SIGNUP CARD
        ========================================= */

        .signup-wrapper {
            display: flex;
            justify-content: center;
        }

        .signup_form,
        .activation_form {
            width: 100%;
            max-width: 520px;
            padding: 38px !important;
            border-radius: 24px !important;

            background: rgba(255,255,255,.96) !important;

            border: 1px solid rgba(255,255,255,.7);

            box-shadow:
                0 25px 80px rgba(0,0,0,.45),
                0 0 0 1px rgba(255,255,255,.05);

            position: relative;
            overflow: hidden;
        }

        .signup_form::before,
        .activation_form::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: rgba(104, 87, 255, .10);
            border-radius: 50%;
            top: -100px;
            right: -80px;
        }


        /* =========================================
           FORM HEADER
        ========================================= */

        .form-header {
            position: relative;
            z-index: 2;
            margin-bottom: 30px;
        }

        .form-logo {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(135deg, #6c5ce7, #3b82f6);
            color: white;
            font-size: 21px;
            font-weight: 800;

            box-shadow: 0 10px 25px rgba(92, 80, 220, .28);

            margin-bottom: 18px;
        }

        .form-header h2 {
            color: #111426;
            font-size: 32px;
            font-weight: 750;
            margin: 0 0 8px;
            letter-spacing: -.8px;
        }

        .form-header p {
            color: #777b91;
            margin: 0;
            font-size: 14px;
        }


        /* =========================================
           FORM GROUP
        ========================================= */

        .modern-group {
            margin-bottom: 21px;
        }

        .modern-group label {
            display: block;
            color: #272b3b;
            font-size: 13px;
            font-weight: 650;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .modern-input {
            height: 52px !important;
            border-radius: 13px !important;
            border: 1px solid #dfe2eb !important;
            background: #f8f9fc !important;
            color: #171a2a !important;
            font-size: 14px !important;
            padding: 0 15px !important;
            transition: all .25s ease;
            box-shadow: none !important;
        }

        .modern-input::placeholder {
            color: #a7aab8;
        }

        .modern-input:focus {
            background: #fff !important;
            border-color: #7164ef !important;
            box-shadow: 0 0 0 4px rgba(113,100,239,.10) !important;
        }


        /* =========================================
           EMAIL / PASSWORD ICONS
        ========================================= */

        .email_con,
        .pass_con {
            position: relative;
        }

        .email_icon,
        .check_icon,
        .cross_icon {
            position: absolute;
            right: 18px;
            bottom: 13px;
            width: 25px;
            height: 25px;
            object-fit: contain;
        }

        .pass_icon,
        .spin_icon {
            position: absolute;
            right: 9px;
            bottom: 6px;
            width: 38px;
            height: 38px;
            object-fit: contain;
            cursor: pointer;
        }


        /* =========================================
           PASSWORD GENERATOR
        ========================================= */

        .password-tools {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: -5px;
            margin-bottom: 25px;
        }

        .password-help {
            color: #777b91;
            font-size: 12px;
            line-height: 1.5;
        }

        .pass_gen {
            border: none !important;
            border-radius: 10px !important;
            padding: 9px 15px !important;
            background: #f04461 !important;
            font-size: 12px !important;
            font-weight: 650 !important;
            box-shadow: 0 7px 18px rgba(240,68,97,.20);
            transition: all .2s ease;
        }

        .pass_gen:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(240,68,97,.28);
        }


        /* =========================================
           REGISTER BUTTON
        ========================================= */

        .register_btn,
        .activation_btn {
            width: 100% !important;
            height: 52px;
            border: none !important;
            border-radius: 13px !important;

            background: linear-gradient(
                135deg,
                #6c5ce7,
                #477cf5
            ) !important;

            font-size: 14px !important;
            font-weight: 650 !important;

            box-shadow:
                0 12px 25px rgba(82,94,220,.25);

            transition: all .25s ease;
        }

        .register_btn:hover:not(:disabled),
        .activation_btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow:
                0 16px 30px rgba(82,94,220,.35);
        }

        .register_btn:disabled {
            opacity: .55;
            cursor: not-allowed;
        }


        /* =========================================
           MESSAGE
        ========================================= */

        .msg,
        .activation_msg {
            margin-top: 18px;
        }

        .msg .alert,
        .activation_msg .alert {
            border: none;
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 0;
        }


        /* =========================================
           ACTIVATION PAGE
        ========================================= */

        .activation_form {
            max-width: 520px;
        }

        .activation-icon {
            width: 55px;
            height: 55px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0eeff;
            color: #6659df;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .activation-description {
            color: #777b91;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 25px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 991px) {

            .main-con {
                padding-top: 50px;
            }

            .signup-left {
                text-align: center;
                padding: 10px 25px 40px;
            }

            .signup-left p {
                margin-left: auto;
                margin-right: auto;
            }

            .feature-list {
                justify-content: center;
            }

            .signup-wrapper {
                width: 100%;
            }
        }


        @media (max-width: 575px) {

            .main-con {
                padding: 25px 15px 40px;
            }

            .signup-left {
                padding: 10px 5px 30px;
            }

            .signup-left h1 {
                font-size: 38px;
                letter-spacing: -1.5px;
            }

            .signup-left p {
                font-size: 14px;
                line-height: 1.7;
            }

            .feature-list {
                display: none;
            }

            .signup_form,
            .activation_form {
                padding: 25px 20px !important;
                border-radius: 20px !important;
            }

            .form-header h2 {
                font-size: 27px;
            }

            .password-tools {
                align-items: flex-start;
            }

            .password-help {
                max-width: 210px;
            }

            .pass_gen {
                flex-shrink: 0;
            }
        }

    </style>
</head>

<body>

<?php
require("element/nav.php");
?>


<div class="container main-con">

    <div class="row">

        <!-- =====================================
             LEFT SIDE
        ====================================== -->

        <div class="col-lg-6">

            <div class="signup-left">

                <div class="drive-badge">
                    <span></span>
                    Secure cloud storage
                </div>

                <h1>
                    Your files.<br>
                    <span>Everywhere.</span>
                </h1>

                <p>
                    Create your Drive account and keep your files,
                    documents and important data organized in one
                    secure place.
                </p>

                <div class="feature-list">

                    <div class="feature-item">
                        Secure Storage
                    </div>

                    <div class="feature-item">
                        Easy Access
                    </div>

                    <div class="feature-item">
                        Fast Uploads
                    </div>

                    <div class="feature-item">
                        Simple Sharing
                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================
             RIGHT SIDE
        ====================================== -->

        <div class="col-lg-6">

            <div class="signup-wrapper">


                <!-- =================================
                     SIGNUP FORM
                ================================== -->

                <form action=""
                      class="signup_form"
                      autocomplete="off">

                    <div class="form-header">

                        <div class="form-logo">
                            D
                        </div>

                        <h2>
                            Create your account
                        </h2>

                        <p>
                            Start using your personal Drive today.
                        </p>

                    </div>


                    <!-- USERNAME -->

                    <div class="modern-group">

                        <label for="username">
                            Username
                        </label>

                        <div class="input-wrapper">

                            <input
                                type="text"
                                id="username"
                                class="form-control modern-input"
                                placeholder="Enter your username"
                                required="required"
                            >

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="modern-group email_con">

                        <label for="email">
                            Email address
                        </label>

                        <div class="input-wrapper">

                            <input
                                type="email"
                                id="email"
                                class="form-control modern-input"
                                placeholder="you@example.com"
                                required="required"
                            >

                            <img
                                src="../images/spin.png"
                                alt=""
                                class="email_icon d-none"
                            >

                            <img
                                src="../images/check.png"
                                alt=""
                                class="check_icon d-none"
                            >

                            <img
                                src="../images/cross.png"
                                alt=""
                                class="cross_icon d-none"
                            >

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="modern-group pass_con">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <input
                                type="password"
                                id="password"
                                class="form-control modern-input"
                                placeholder="Create a strong password"
                                required="required"
                            >

                            <img
                                src="../images/password.png"
                                alt=""
                                class="pass_icon"
                                width="40"
                            >

                            <img
                                src="../images/spin.png"
                                alt=""
                                class="spin_icon d-none"
                            >

                        </div>

                    </div>


                    <!-- PASSWORD GENERATOR -->

                    <div class="password-tools">

                        <div class="password-help">
                            Generate a strong password to improve your security.
                        </div>

                        <button
                            class="btn btn-sm btn-danger pass_gen">
                            Generate
                        </button>

                    </div>


                    <!-- REGISTER -->

                    <div class="text-center">

                        <button
                            class="btn btn-primary register_btn"
                            disabled="disabled">

                            Register Now

                        </button>

                    </div>


                    <div class="msg"></div>

                </form>



                <!-- =================================
                     ACTIVATION FORM
                ================================== -->

                <form
                    class="activation_form d-none"
                    autocomplete="off">

                    <div class="form-header">

                        <div class="activation-icon">
                            ✓
                        </div>

                        <h2>
                            Activate your account
                        </h2>

                        <p class="activation-description">
                            We've sent a 6-digit activation code to your
                            email address. Enter the code below to
                            activate your Drive account.
                        </p>

                    </div>


                    <div class="modern-group">

                        <label for="activation_code">
                            Activation Code
                        </label>

                        <input
                            type="text"
                            required="required"
                            id="activation_code"
                            class="form-control modern-input"
                            placeholder="Enter your 6-digit code"
                        >

                    </div>


                    <div class="text-center">

                        <button
                            class="btn btn-primary activation_btn mt-2">

                            Activate Now

                        </button>

                    </div>


                    <div class="activation_msg"></div>

                </form>


            </div>

        </div>

    </div>

</div>



<script>

    $(document).ready(function(){

$(".pass_gen").click(function(e){

       e.preventDefault();

        $("#password").attr("type","text");

$.ajax({

    type:"POST",

    url:"generate_password.php",

    beforeSend:function(){

$(".spin_icon").removeClass("d-none");

$(".pass_icon").addClass("d-none");

    },

    success:function(response){

        $(".spin_icon").addClass("d-none");

$(".pass_icon").removeClass("d-none");

        $("#password").val(response.trim());

    }

})

});



 $(".pass_icon").click(function(){

    if ($("#password").attr("type")=="password") {

        $("#password").attr("type","text");

    }

    else{

         $("#password").attr("type","password");

    }

 })



//loader show coding

 $("#email").on('input',function(){

    $(".email_icon").removeClass("d-none");

 })



//check already registerd user

 $("#email").on('change',function(){

    $.ajax({

        type:"POST",

        url:"check_user.php",

        data:{

       email:$(this).val()

        },

        success:function(response){

           $(".email_icon").addClass("d-none");

           if(response.trim()=="notfound")

           {

                     $(".check_icon").removeClass("d-none");

                     $(".register_btn").removeAttr("disabled");

           }

           else{

             $(".cross_icon").removeClass("d-none");

              $(".register_btn").attr("disabled","disabled");

               $("#email").on('input',function(){

                 $(".spin_icon").addClass("d-none");

              })

              $("#email").on('change',function(){

                $(".cross_icon").addClass("d-none");

              })

           }

        }

    })

 });



//store data into database coding

    $(".signup_form").submit(function(e){

    e.preventDefault();

    $.ajax({

        type:"POST",

        url:"register.php",

        data:{

            username:$("#username").val(),

            email:$("#email").val(),

            password:$("#password").val()

        },

        beforeSend:function(){

            $(".register_btn").html("Please Wait.....");

            $(".register_btn").attr("disabled","disabled");

        },

        success:function(response){

            $(".register_btn").html("Register Now !");

            $(".register_btn").removeAttr("disabled");

            if(response.trim()=="success"){

                var div=document.createElement("DIV");

                div.className="alert alert-success mt-3";

                div.innerHTML="Registerd Success !";

                $(".msg").append(div);

                setTimeout(function(){

                $(".msg").html("");

                 $(".signup_form").addClass("d-none");

                 $(".activation_form").removeClass("d-none");

                },3000);

            }

            else if(response.trim()=="usermatch")

            {

                 var div=document.createElement("DIV");

                div.className="alert alert-warning mt-3";

                div.innerHTML="User already exist !";

                $(".msg").append(div);

                setTimeout(function(){

                $(".msg").html("");

                $(".signup_form").trigger('reset');

                },3000);

            }

            else{

                var div=document.createElement("DIV");

                div.className="alert alert-danger mt-3";

                div.innerHTML="Registration Failed !";

                $(".msg").append(div);

                setTimeout(function(){

                $(".msg").html("");

                },3000);

            }

        }

    })

    });



 $(".activation_form").submit(function(){

    $.ajax({

        type:"POST",

        url:"check_activation_code.php",

        data:{

            email:$("#email").val(),

            atc:$("#activation_code").val()

        },

        beforeSend:function(){

            $(".activation_btn").html("Checking Activation Code......");

            $(".activation_btn").attr("disabled","disabled");

        },

        success:function(response){

            $(".activation_btn").html("Activate Now !");

             $(".activation_btn").removeAttr("disabled");

            if(response.trim()=="active"){

                      var div=document.createElement("DIV");

                div.className="alert alert-success mt-3";

                div.innerHTML="Activation Successfull !";

                $(".activation_msg").append(div);

                setTimeout(function(){

                $(".activation_msg").html("");

                },3000);

            window.location="login.php";

        }

        else{

              var div=document.createElement("DIV");

                div.className="alert alert-danger mt-3";

                div.innerHTML="Wrong Activation Code!";

                $(".activation_msg").append(div);

                setTimeout(function(){

                $(".activation_msg").html("");

                },3000);

        }

        }

    })

 });

    })

</script>

</body>
</html>