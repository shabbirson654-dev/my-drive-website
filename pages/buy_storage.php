

<?php


session_start();
require("../db.php");
$user_email=$_SESSION['user'];
$user_sql= "SELECT * FROM users WHERE email='$user_email'";
$user_res=$db->query($user_sql);
$user_data=$user_res->fetch_assoc();
$plan=$user_data['plans'];
if($plan !="free"){
    $p_status="";

$ed=$user_data['expiry_date'];
$cd=date('Y-m-d');

if($ed < $cd){
 $p_status="deactivate";
}
else{
    $p_status="activate";
}
}


$s_btn='<button class="p-3  bg-dark text-light buy" plan="start" amount="100">Buy Now</button>';
$p_btn='<button class="p-3  bg-dark text-light buy" plan="premium" amount="300">Buy Now</button>';
$g_btn='<button class="p-3  bg-dark text-light buy" plan="golden" amount="500">Buy Now</button>';
if($plan=="start" && $p_status=="activate"){
	$s_btn='<button class="p-3  bg-danger text-light  buy" plan="start" amount="100" disabled="disabled">Current Plan</button>';
$p_btn='<button class="p-3  bg-dark text-light buy" plan="premium" amount="300">Buy Now</button>';
$g_btn='<button class="p-3  bg-dark text-light buy" plan="golden" amount="500">Buy Now</button>';
   
}
else if($plan=="start" && $p_status=="deactivate"){
	$s_btn='<button class="p-3  bg-dark text-light buy" plan="start" amount="100">Buy Now</button>';
$p_btn='<button class="p-3  bg-dark text-light buy" plan="premium" amount="300">Buy Now</button>';
$g_btn='<button class="p-3  bg-dark text-light buy" plan="golden" amount="500">Buy Now</button>';

}
else if($plan=="premium" && $p_status=="activate" ){
    $s_btn='<button class="p-3  bg-dark text-light  buy" plan="start" amount="100">Buy Now</button>';
$p_btn='<button class="p-3  bg-danger text-light buy" plan="premium" amount="300" disabled="disabled">Current Plan</button>';
$g_btn='<button class="p-3  bg-dark text-light buy" plan="golden" amount="500">Buy Now</button>';
   
}
else if($plan=="premium" && $p_status=="deactivate"){
	$s_btn='<button class="p-3  text-light buy" plan="start" amount="100" disabled="disabled"  background-color="#ccc">Buy Now</button>';
$p_btn='<button class="p-3  bg-dark text-light buy" plan="premium" amount="300">Buy Now</button>';
$g_btn='<button class="p-3  bg-dark text-light buy" plan="golden" amount="500">Buy Now</button>';

}

else if($plan=="golden" && $p_status=="activate"){
 $s_btn='<button class="p-3  bg-dark text-light buy" plan="start" amount="100">Buy Now</button>';
$p_btn='<button class="p-3  bg-dark text-light buy" plan="premium" amount="300">Buy Now</button>';
$g_btn='<button class="p-3  bg-danger text-light  buy" plan="golden" amount="500" disabled="disabled">Current Plan</button>';
}
else if($plan=="golden" && $p_status=="deactivate"){
	$s_btn='<button class="p-3  text-light buy" plan="start" amount="100" disabled="disabled" background-color="#ccc">Buy Now</button>';
$p_btn='<button class="p-3  text-light buy" plan="premium" amount="300" disabled="disabled" background-color="#ccc">Buy Now</button>';
$g_btn='<button class="p-3  bg-dark text-light buy" plan="golden" amount="500">Buy Now</button>';

}
?>

<style>
    .plans-section {
        padding: 25px 10px 40px;
    }

    .plans-title {
        text-align: center;
        margin-bottom: 35px;
    }

    .plans-title h1 {
        font-size: 38px;
        font-weight: 800;
        letter-spacing: 1px;
        margin-bottom: 8px;
        color: #1f2937;
    }

    .plans-title p {
        color: #6b7280;
        margin: 0;
        font-size: 15px;
    }

    .plan-card {
        position: relative;
        height: 100%;
        border: none;
        border-radius: 22px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .plan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.14);
    }

    .plan-header {
        padding: 25px 20px;
        text-align: center;
        color: white;
        border: none;
    }

    .starter-header {
        background: linear-gradient(135deg, #f59e0b, #f97316);
    }

    .premium-header {
        background: linear-gradient(135deg, #2563eb, #4f46e5);
    }

    .golden-header {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
    }

    .plan-header h3 {
        margin: 0;
        font-size: 23px;
        font-weight: 800;
        letter-spacing: .5px;
    }

    .plan-body {
        padding: 30px 25px;
        text-align: center;
    }

    .plan-price {
        font-size: 34px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 5px;
    }

    .plan-price span {
        font-size: 14px;
        font-weight: 500;
        color: #6b7280;
    }

    .storage {
        display: inline-block;
        padding: 7px 18px;
        border-radius: 30px;
        background: #f3f4f6;
        color: #374151;
        font-weight: 700;
        margin: 10px 0 20px;
    }

    .feature {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 11px 0;
        color: #4b5563;
        font-size: 15px;
        border-bottom: 1px solid #f0f0f0;
    }

    .feature:last-child {
        border-bottom: none;
    }

    .feature::before {
        content: "✓";
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #dcfce7;
        color: #16a34a;
        font-size: 13px;
        font-weight: bold;
    }

    .plan-footer {
        padding: 0 25px 30px;
        text-align: center;
    }

    .buy {
        width: 100%;
        border: none;
        border-radius: 12px;
        padding: 14px 20px !important;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .buy:not(:disabled):hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .buy:disabled {
        opacity: 1;
        cursor: not-allowed;
    }

    .plan-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255,255,255,.22);
        color: white;
        padding: 5px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        backdrop-filter: blur(5px);
    }

    @media (max-width: 767px) {
        .plans-section {
            padding: 15px 5px 30px;
        }

        .plans-title h1 {
            font-size: 30px;
        }

        .plan-card {
            margin-bottom: 10px;
        }
    }
</style>


<div class="plans-section">

    <div class="plans-title">
        <h1>OUR PLANS</h1>
        <p>Choose the storage plan that works best for you</p>
    </div>

    <div class="row g-4">

        <!-- STARTER PLAN -->
        <div class="col-md-4 mt-4">
            <div class="plan-card">

                <div class="plan-header starter-header">
                    <h3>STARTER PLAN</h3>
                </div>

                <div class="plan-body">

                    <div class="plan-price">
                        100 <span>/ Month</span>
                    </div>

                    <div class="storage">
                        10GB Storage
                    </div>

                    <div class="feature">SEO</div>
                    <div class="feature">Email</div>
                    <div class="feature">24X7 Technical Support</div>
                    <div class="feature">Security</div>
                    <div class="feature">Guaranteed</div>
                    <div class="feature">Support</div>

                </div>

                <div class="plan-footer">
                    <?php
                    echo $s_btn;
                    ?>
                </div>

            </div>
        </div>


        <!-- PREMIUM PLAN -->
        <div class="col-md-4 mt-4">
            <div class="plan-card">

                <div class="plan-header premium-header">
                    <span class="plan-badge">POPULAR</span>
                    <h3>PREMIUM PLAN</h3>
                </div>

                <div class="plan-body">

                    <div class="plan-price">
                        300 <span>/ Month</span>
                    </div>

                    <div class="storage">
                        30GB Storage
                    </div>

                    <div class="feature">SEO</div>
                    <div class="feature">Email</div>
                    <div class="feature">24X7 Technical Support</div>
                    <div class="feature">Security</div>
                    <div class="feature">Guaranteed</div>
                    <div class="feature">Support</div>

                </div>

                <div class="plan-footer">
                    <?php
                    echo $p_btn;
                    ?>
                </div>

            </div>
        </div>


        <!-- GOLDEN PLAN -->
        <div class="col-md-4 mt-4">
            <div class="plan-card">

                <div class="plan-header golden-header">
                    <h3>GOLDEN PLAN</h3>
                </div>

                <div class="plan-body">

                    <div class="plan-price">
                        500 <span>/ Month</span>
                    </div>

                    <div class="storage">
                        50GB Storage
                    </div>

                    <div class="feature">SEO</div>
                    <div class="feature">Email</div>
                    <div class="feature">24X7 Technical Support</div>
                    <div class="feature">Security</div>
                    <div class="feature">Guaranteed</div>
                    <div class="feature">Support</div>

                </div>

                <div class="plan-footer">
                    <?php
                    echo $g_btn;
                    ?>
                </div>

            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function(){
        $(".buy").each(function(){
            $(this).click(function(){
                var plan=$(this).attr("plan");
                var amt=$(this).attr("amount");
                location.href="pay.php?plan="+plan+"&amt="+amt;
            })
        })
    })
</script>