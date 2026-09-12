<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive - Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>
</head>

<body>

<?php
require("element/nav.php");
?>

<div class="container login-page">

    <div class="row align-items-center login-row">

        <div class="col-lg-6 login-intro">

            <div class="intro-badge">
                <span></span>
                Secure cloud storage
            </div>

            <h1>
                Welcome<br>
                <span>back.</span>
            </h1>

            <p>
                Access your files, documents and important data
                from one secure and simple place.
            </p>

            <div class="feature-list">

                <div class="feature-box">
                    <span>✓</span>
                    Secure Storage
                </div>

                <div class="feature-box">
                    <span>✓</span>
                    Easy Access
                </div>

                <div class="feature-box">
                    <span>✓</span>
                    Fast Uploads
                </div>

                <div class="feature-box">
                    <span>✓</span>
                    Simple Sharing
                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <form action="" class="login-card login_form" autocomplete="off">

                <div class="login-logo">
                    D
                </div>

                <h2>Welcome back</h2>

                <p class="login-subtitle">
                    Login to continue to your Drive account.
                </p>

                <div class="mb-4 email_con">

                    <label for="email" class="form-label">
                        Email address
                    </label>

                    <div class="input-wrapper">

                        <span class="input-symbol">✉</span>

                        <input
                            type="email"
                            id="email"
                            class="form-control modern-input"
                            placeholder="you@example.com"
                            required="required">

                    </div>

                </div>

                <div class="mb-4 pass_con">

                    <div class="password-label">

                        <label for="password" class="form-label">
                            Password
                        </label>

                        <span class="forgot-text">
                            Secure login
                        </span>

                    </div>

                    <div class="input-wrapper">

                        <span class="input-symbol">●</span>

                        <input
                            type="password"
                            id="password"
                            class="form-control modern-input"
                            placeholder="Enter your password"
                            required="required">

                        <img
                            src="../images/password.png"
                            alt=""
                            class="pass_icon"
                            width="35">

                        <img
                            src="../images/spin.png"
                            alt=""
                            class="spin_icon d-none">

                    </div>

                </div>

                <button
                    class="login-submit login_btn"
                    type="submit">

                    <span>Login Now</span>
                    <span class="login-submit-arrow">→</span>

                </button>

                <div class="login-bottom">
                    Secure and private access to your files
                </div>

                <div class="msg"></div>

            </form>


            <form
                class="activation-card activation_form d-none"
                autocomplete="off">

                <div class="login-logo">
                    D
                </div>

                <h2>Activate your account</h2>

                <p class="login-subtitle">
                    Enter the activation code sent to your email.
                </p>

                <div class="mb-4">

                    <label
                        for="activation_code"
                        class="form-label">

                        Activation Code

                    </label>

                    <input
                        type="text"
                        requiired="required"
                        id="activation_code"
                        class="form-control modern-input activation-input"
                        placeholder="Enter activation code">

                </div>

                <button
                    class="login-submit activation_btn"
                    type="submit">

                    <span>Activate Now</span>
                    <span class="login-submit-arrow">→</span>

                </button>

                <div class="activation_msg"></div>

            </form>

        </div>

    </div>

</div>


<style>

body {
    background:
        radial-gradient(circle at 15% 50%, rgba(91,78,210,.18), transparent 32%),
        radial-gradient(circle at 90% 30%, rgba(45,116,220,.16), transparent 30%),
        #060719;
    min-height: 100vh;
}

.login-page {
    min-height: 100vh;
    padding-top: 105px;
    padding-bottom: 50px;
}

.login-row {
    min-height: calc(100vh - 130px);
}

.login-intro {
    padding: 40px 55px 40px 10px;
}

.intro-badge {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 9px 15px;
    border-radius: 50px;
    border: 1px solid rgba(139,126,255,.25);
    background: rgba(113,100,239,.09);
    color: #c5c3df;
    font-size: 13px;
    margin-bottom: 25px;
}

.intro-badge span {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #7668ff;
    box-shadow: 0 0 12px #7668ff;
}

.login-intro h1 {
    font-size: clamp(55px, 6vw, 82px);
    line-height: .95;
    letter-spacing: -4px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 28px;
}

.login-intro h1 span {
    background: linear-gradient(90deg, #ffffff, #8b7cff, #5cbcff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-intro p {
    max-width: 510px;
    color: #a8abc3;
    font-size: 16px;
    line-height: 1.9;
    margin-bottom: 28px;
}

.feature-list {
    display: flex;
    flex-wrap: wrap;
    gap: 11px;
    max-width: 540px;
}

.feature-box {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px;
    border-radius: 11px;
    color: #b9bad0;
    font-size: 13px;
    background: rgba(255,255,255,.035);
    border: 1px solid rgba(255,255,255,.08);
    transition: .25s ease;
}

.feature-box span {
    color: #8b7cff;
    font-weight: bold;
}

.feature-box:hover {
    transform: translateY(-2px);
    border-color: rgba(139,126,255,.3);
    background: rgba(113,100,239,.08);
}

.login-card,
.activation-card {
    position: relative;
    max-width: 510px;
    margin: auto;
    padding: 42px;
    border-radius: 26px;
    background: rgba(255,255,255,.96);
    border: 1px solid rgba(255,255,255,.8);
    box-shadow:
        0 30px 80px rgba(0,0,0,.38),
        0 0 60px rgba(91,78,210,.10);
    overflow: hidden;
}

.login-card::before,
.activation-card::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    right: -90px;
    top: -90px;
    border-radius: 50%;
    background: rgba(113,100,239,.12);
}

.login-logo {
    position: relative;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: linear-gradient(135deg, #7164ef, #4d8cff);
    color: white;
    font-size: 22px;
    font-weight: 800;
    box-shadow: 0 12px 25px rgba(90,80,220,.25);
    margin-bottom: 25px;
}

.login-card h2,
.activation-card h2 {
    position: relative;
    color: #121528;
    font-size: 31px;
    font-weight: 800;
    letter-spacing: -1px;
    margin-bottom: 8px;
}

.login-subtitle {
    position: relative;
    color: #85899f;
    font-size: 14px;
    margin-bottom: 30px;
}

.form-label {
    color: #292d40;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 9px;
}

.input-wrapper {
    position: relative;
}

.modern-input {
    height: 55px;
    border-radius: 13px !important;
    border: 1px solid #dfe2ec !important;
    background: #f9faff !important;
    padding-left: 45px !important;
    padding-right: 48px !important;
    color: #202338 !important;
    font-size: 14px;
    box-shadow: none !important;
    transition: .25s ease;
}

.modern-input::placeholder {
    color: #a9adbd;
}

.modern-input:focus {
    border-color: #7568ee !important;
    background: #ffffff !important;
    box-shadow: 0 0 0 4px rgba(113,100,239,.10) !important;
}

.input-symbol {
    position: absolute;
    z-index: 2;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #969bb0;
    font-size: 13px;
}

.pass_icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    width: 32px;
    height: 32px;
    object-fit: contain;
    cursor: pointer;
    opacity: .65;
    transition: .2s ease;
}

.pass_icon:hover {
    opacity: 1;
}

.spin_icon {
    position: absolute;
    right: 17px;
    top: 50%;
    transform: translateY(-50%);
    width: 23px;
}

.password-label {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.forgot-text {
    font-size: 11px;
    color: #8d91a4;
}

.login-submit {
    position: relative;
    width: 100%;
    height: 53px;
    border: 0;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    color: #ffffff;
    font-size: 14px;
    font-weight: 700;
    background: linear-gradient(135deg, #7164ef, #4b88f4);
    box-shadow: 0 12px 25px rgba(82,91,215,.25);
    transition: .25s ease;
    overflow: hidden;
}

.login-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 16px 30px rgba(82,91,215,.35);
}

.login-submit:active {
    transform: translateY(0);
}

.login-submit:disabled {
    opacity: .7;
    transform: none;
}

.login-submit-arrow {
    font-size: 19px;
    transition: .25s ease;
}

.login-submit:hover .login-submit-arrow {
    transform: translateX(4px);
}

.login-bottom {
    text-align: center;
    color: #9a9eaf;
    font-size: 11px;
    margin-top: 18px;
}

.msg,
.activation_msg {
    position: relative;
}

.activation-input {
    padding-left: 17px !important;
}

.activation-card {
    max-width: 510px;
}

@media (max-width: 991px) {

    .login-page {
        padding-top: 105px;
    }

    .login-row {
        min-height: auto;
    }

    .login-intro {
        text-align: center;
        padding: 30px 20px 45px;
    }

    .login-intro h1 {
        font-size: 58px;
        letter-spacing: -3px;
    }

    .login-intro p {
        margin-left: auto;
        margin-right: auto;
    }

    .feature-list {
        justify-content: center;
        margin: auto;
    }

    .login-card,
    .activation-card {
        margin-bottom: 40px;
    }

}

@media (max-width: 575px) {

    .login-page {
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 95px;
    }

    .login-intro {
        padding: 25px 8px 35px;
    }

    .login-intro h1 {
        font-size: 48px;
        letter-spacing: -2px;
    }

    .login-intro p {
        font-size: 14px;
        line-height: 1.7;
    }

    .login-card,
    .activation-card {
        padding: 28px 22px;
        border-radius: 21px;
    }

    .login-card h2,
    .activation-card h2 {
        font-size: 26px;
    }

    .feature-box {
        font-size: 12px;
        padding: 9px 11px;
    }

}

</style>


<script>

$(document).ready(function(){

    $(".login_form").submit(function(e){

        e.preventDefault();

        $.ajax({

            type:"POST",

            url:"user_login.php",

            data:{
                email:$("#email").val(),
                pass:$("#password").val()
            },

            beforeSend:function(){

                $(".login_btn").attr("disabled","disabled");

                $(".login_btn").html(
                    "<span>Please Wait.....</span>"
                );

            },

            success:function(response){

                $(".login_btn").removeAttr("disabled");

                $(".login_btn").html(
                    "<span>Login Now</span><span class='login-submit-arrow'>→</span>"
                );

                if(response.trim()=="success"){

                    window.location="profile.php";

                }

                else if(response.trim()=="pendding"){

                    $(".login_form").addClass("d-none");

                    $(".activation_form").removeClass("d-none");

                }

                else if(response.trim()=="wrong password"){

                    var div=document.createElement("DIV");

                    div.className="alert alert-warning mt-3";

                    div.innerHTML="Wrong Password !";

                    $(".msg").append(div);

                    setTimeout(function(){

                        $(".msg").html("");

                    },3000);

                }

                else{

                    var div=document.createElement("DIV");

                    div.className="alert alert-warning mt-3";

                    div.innerHTML="user not registerd !";

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

                $(".activation_btn").html(
                    "Checking Activation Code......"
                );

                $(".activation_btn").attr(
                    "disabled",
                    "disabled"
                );

            },

            success:function(response){

                $(".activation_btn").html(
                    "<span>Activate Now</span><span class='login-submit-arrow'>→</span>"
                );

                $(".activation_btn").removeAttr("disabled");

                if(response.trim()=="active"){

                    var div=document.createElement("DIV");

                    div.className="alert alert-success mt-3";

                    div.innerHTML="Activation Successfull !";

                    $(".activation_msg").append(div);

                    setTimeout(function(){

                        $(".activation_msg").html("");

                        window.location="login.php";

                    },3000);

                }

                else{

                    var div=document.createElement("DIV");

                    div.className="alert alert-warning mt-3";

                    div.innerHTML="Wrong Activation Code!";

                    $(".activation_msg").append(div);

                    setTimeout(function(){

                        $(".activation_msg").html("");

                    },3000);

                }

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

    });

});

</script>

</body>
</html>