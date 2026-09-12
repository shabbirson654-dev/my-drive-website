<?php 
 
session_start(); 
if(empty( $_SESSION['user'])){ 
    header("Location:login.php"); 
} 
 
 
require("db.php"); 
$user_email=$_SESSION['user']; 
$user_sql= "SELECT * FROM users WHERE email='$user_email'"; 
$user_res=$db->query($user_sql); 
$user_data=$user_res->fetch_assoc(); 
$user_name=$user_data['full_name']; 
$total_storage=$user_data['storage']; 
$used_storage=$user_data['used_storage']; 
$per=round(($used_storage*100)/$total_storage,2); 
$user_id=$user_data['id']; 
$tf="user_".$user_id; 
$plan=$user_data['plans']; 
$free_storage=$total_storage-$used_storage; 
 
 
 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>My Drive Website</title> 
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
	 <link rel="stylesheet" href="../css/style.css"> 
    
    <script src="../js/bootstrap.bundle.min.js"></script> 
    <script src="../js/jquery.js"></script> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style> 
        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            background:#f5f7fb;
            font-family:Arial, Helvetica, sans-serif;
        }

        .main-container{ 
            width:100%; 
            height:100vh; 
            overflow:hidden;
        } 

        .left{ 
            width:260px; 
            min-width:260px;
            height:100%; 
            background:linear-gradient(180deg,#09072b 0%,#11104a 100%);
            box-shadow:5px 0 25px rgba(0,0,0,.12);
            position:relative;
            z-index:100;
        } 

        .right{ 
            width:calc(100% - 260px); 
            height:100%; 
            overflow:auto; 
            background:#f6f8fc;
        } 

        .profile_pic{ 
            width:92px; 
            height:92px; 
            border-radius:50%; 
            border:4px solid rgba(255,255,255,.9);
            background:linear-gradient(135deg,#6875f5,#8b5cf6);
            display:flex;
            align-items:center;
            justify-content:center;
            box-shadow:0 10px 30px rgba(79,70,229,.35);
        } 

        .profile_pic p{
            margin:0;
            font-size:42px;
        }

        .line{ 
            color:#fff; 
            width:85%;
            opacity:.12;
        } 

        .storage{ 
            width:82%;
			
        } 

        .my_menu{ 
            list-style:none; 
            margin:8px 0; 
            padding:0; 
            width:100%; 
        } 

        .my_menu li{ 
            width:90%; 
            margin:4px auto;
            padding:13px 18px; 
            color:#cbd0f5; 
            border-radius:12px;
            transition:.25s ease;
            font-size:15px;
        } 

        .my_menu li:hover{ 
            background:rgba(255,255,255,.12); 
            color:#fff; 
            cursor:pointer;
            transform:translateX(4px);
        } 

        .left .btn-light{
            border:0;
            padding:10px 22px;
            font-weight:600;
            color:#161440;
            box-shadow:0 8px 20px rgba(0,0,0,.15);
        }

        .left .btn-light:hover{
            transform:translateY(-2px);
        }

        .left .progress{
            height:100px;
            border-radius:20px;
            background:rgba(255,255,255,.12);
        }

        .left .progress-bar{
            border-radius:20px;
			height:100%;
			box-sizing:border-box;
			
			
            background:linear-gradient(90deg,#6366f1,#8b5cf6)!important;
        }

        .left .text-white{
            color:#e9eaff!important;
        }

        .left > div{
            height:100%;
        }

        .left a{
            text-decoration:none;
        }

        .msg{ 
            width:100%; 
            height:100vh; 
            background:rgba(8,7,35,.55); 
            backdrop-filter:blur(4px);
            position:fixed; 
            top:0; 
            left:0; 
            display:flex; 
            justify-content:center; 
            align-items:center;
            z-index:999999;
        }

        .right > nav{
            height:76px;
            background:rgba(255,255,255,.92)!important;
            backdrop-filter:blur(12px);
            border-bottom:1px solid #e8ebf3;
        }

        .search_frm{
            width:420px;
        }

        .search_frm input{
            height:44px;
            border:1px solid #e1e5ee;
            border-radius:12px;
            background:#f8f9fc;
            padding-left:18px;
            box-shadow:none!important;
        }

        .search_frm input:focus{
            border-color:#6366f1;
            background:#fff;
        }

        .search_frm button{
            border-radius:12px;
            padding:0 22px;
            border:0;
            color:#fff;
            background:linear-gradient(135deg,#6366f1,#8b5cf6);
        }

        .search_frm button:hover{
            background:linear-gradient(135deg,#5558e8,#7c3aed);
        }

        .bar{
            cursor:pointer;
            color:#171642;
            background:#f0f1f8;
            padding:8px 12px;
            border-radius:10px;
        }

        .content{
            min-height:calc(100vh - 76px);
        }

        .mobile_menu{ 
            position:fixed; 
            top:0; 
            left:0; 
            background:linear-gradient(180deg,#09072b,#11104a); 
            width:0%; 
            height:auto; 
            z-index:100000000000; 
            overflow:hidden; 
            transition:.4s;
            box-shadow:10px 0 30px rgba(0,0,0,.3);
        }

        .mobile_menu .cut{
            position:absolute;
            right:20px;
            top:18px;
            cursor:pointer;
            z-index:2;
        }

        .mobile_menu .my_menu li{
            width:90%;
        }

        .mobile_menu .profile_pic{
            margin-top:10px;
        }

        .upload_msg{
            width:85%;
        }

        .upload_msg .alert{
            font-size:12px;
            padding:8px;
        }

        .u_pro{
            border:0;
            overflow:hidden;
        }

        @media(max-width:992px){ 
            .right{ 
                width:100%; 
            }

            .search_frm{
                width:auto;
                max-width:400px;
            }

            .content{
                padding:20px!important;
            }
        }

        @media(max-width:576px){
            .right > nav{
                padding:12px!important;
            }

            .search_frm{
                flex:1;
                margin-left:12px!important;
            }

            .search_frm input{
                min-width:0;
                width:100%;
            }

            .search_frm button{
                padding:0 15px;
            }

            .content{
                padding:15px!important;
            }
			  .left .btn-light:hover{
            transform:translateY(-2px);
        }

        .left .progress{
            height:100px;
            border-radius:20px;
            background:rgba(255,255,255,.12);
        }

        .left .progress-bar{
            border-radius:20px;
			height:100%;
			box-sizing:border-box;
			
			
            background:linear-gradient(90deg,#6366f1,#8b5cf6)!important;
        }

        .left .text-white{
            color:#e9eaff!important;
        }

        }
    </style> 
</head> 
<body> 
    <div class="main-container d-flex"> 
        <div class="left d-none d-lg-block"> 
            <div class="d-flex justify-content-center align-items-center flex-column pt-5"> 
                <div class="profile_pic text-center"> 
                  <p>👨‍💼</p> 
                </div> 
                <span class="text-white fs-3 mt-3 fw-bold"><?php echo $user_name;?></span> 
                <small class="text-white opacity-50 mt-1">My Drive Account</small>
                <hr class="line"> 
                <button class="btn btn-light rounded-pill upload">📤 Upload File</button> 
 
                <div class="progress storage mt-3 d-none u_pro"> 
                    <div class="progress-bar upload_p " style="width:0%"> 
 
                    </div> 
                </div> 
                 <div class="upload_msg"></div> 
 
                 
                 <hr class="line"> 
                 <ul class="my_menu"> 
                    <li class="menu" p_link="my_files">📁 &nbsp; My Files</li> 
                    <li class="menu" p_link="f_files">⭐ &nbsp; Favourite Files</li> 
                    <li class="menu" p_link="buy_storage">☁️ &nbsp; Buy Storage</li> 
                 </ul> 
 
                 <hr class="line"> 
 
                <span class="text-white small fw-bold">STORAGE</span> 
                <div class="progress storage  mt-2"> 
                    <div class="progress-bar  pb" style="width:<?php echo $per; ?>%"> 
 
                    </div> 
                </div> 
                <span class="text-white small mt-2"><span class="us"><?php echo $used_storage; ?></span>MB / <?php echo $total_storage; ?>MB</span> 
                <a href="logout.php" class="btn btn-light mt-3 rounded-pill px-4">↪ Logout</a> 
            </div> 
        </div> 

        <div class="mobile_menu d-block d-lg-none"> 
            <p class="bolder fs-3 text-white cut">❌</p> 
            <div class="d-flex justify-content-center align-items-center flex-column pt-5"> 
                <div class="profile_pic text-center"> 
                  <p>👨‍💼</p> 
                </div> 
                <span class="text-white fs-3 mt-3 fw-bold"><?php echo $user_name;?></span> 
                <small class="text-white opacity-50 mt-1">My Drive Account</small>
                <hr class="line"> 
                <button class="btn btn-light rounded-pill upload">📤 Upload File</button> 
 
                <div class="progress storage mt-3 d-none u_pro"> 
                    <div class="progress-bar upload_p " style="width:0%"> 
 
                    </div> 
                </div> 
                 <div class="upload_msg"></div> 
 
                 
                 <hr class="line"> 
                 <ul class="my_menu"> 
                    <li class="menu mm" p_link="my_files">📁 &nbsp; My Files</li> 
                    <li class="menu mm" p_link="f_files">⭐ &nbsp; Favourite Files</li> 
                    <li class="menu mm" p_link="buy_storage">☁️ &nbsp; Buy Storage</li> 
                 </ul> 
 
                 <hr class="line"> 
 
                <span class="text-white small fw-bold">STORAGE</span> 
                <div class="progress storage  mt-2"> 
                    <div class="progress-bar pb" style="width:<?php echo $per; ?>%"> 
 
                    </div> 
                </div> 
                <span class="text-white small mt-2"><span class="us"><?php echo $used_storage; ?></span>MB / <?php echo $total_storage; ?>MB</span> 
                <a href="logout.php" class="btn btn-light mt-3 rounded-pill px-4">↪ Logout</a> 
            </div> 
        </div> 

        <div class="right"> 
               <nav class="navbar navbar-light p-3 shadow-sm sticky-top"> 
                <div class="container-fluid"> 
                    <span class="fs-4 fw-bold bar d-block d-lg-none">&#9776;</span> 
                    <div class="d-none d-lg-block">
                        <span class="fw-bold fs-5" style="color:#15143d;">My Drive Website</span>
                    </div>
                    <form class="d-flex ms-auto search_frm"> 
                    <input type="search" placeholder="Search your files..." class="form-control me-2" aria-label="search" id="search"> 
                    <button class="btn" type="submit">Search</button> 
                    </form> 
                </div> 
               </nav> 

               <div class="content p-4"> 
                 
               </div> 
                
            </div> 
 
 
    </div> 
     
    <div class="msg d-none"></div> 
 
    <?php 
    if($plan !="free"){ 
    $p_status=""; 
 
$ed=$user_data['expiry_date']; 
$cd=date('Y-m-d'); 
 
if($ed < $cd){ 
echo '<style> 
 
.upload,[p_link="my_files"],[p_link="f_files"]{pointer-events:none; 
</style>'; 
} 
else{ 
    $p_status="activate"; 
} 
} 
 
     
     
     
    ?> 
    <script> 
        $(document).ready(function(){ 
            $(".upload").click(function(){ 
                var input=document.createElement("INPUT"); 
                input.setAttribute("type","file"); 
                input.click(); 
                input.onchange=function(){ 
                $(".u_pro").removeClass("d-none"); 
                    var file=new FormData(); 
                    file.append("data",input.files[0]); 
                  var file_size=  Math.floor(input.files[0].size/1024/1024); 
                  var free_storage=<?php echo $free_storage;?>; 
                  if(file_size<free_storage) 
                  { 
                    $.ajax({ 
                        type:"POST", 
                        url:"upload.php", 
                        data:file, 
                        processData:false, 
                        contentType:false, 
                        cahce:false, 
                        xhr:function(){ 
                             var request=new XMLHttpRequest(); 
                             request.upload.onprogress=function(e){ 
                                         var loaded =(e.loaded/1024/1024).toFixed(2); 
                                         var total =(e.total/1024/1024).toFixed(2); 
                                         var upload_per=((loaded*100)/total).toFixed(0); 
 
                                         $(".upload_p").css("width",upload_per+"%"); 
                                         $(".upload_p").html(upload_per+"%"); 
                             } 
                             return request; 
                        }, 
                        success:function(response){ 
                          var obj=JSON.parse(response); 
                           $(".u_pro").addClass("d-none"); 
                          if(obj.msg=="File upload Successfully"){ 
                            var new_per=(obj.used_storage*100)/<?php echo $total_storage ;?>; 
                                   $(".us").html(obj.used_storage); 
                                   $(".pb").css("width",new_per+"%"); 
								    
                                   var div=document.createElement("DIV"); 
                             div.className="alert alert-success  mt-3"; 
                                   div.innerHTML=obj.msg; 
                                  $(".upload_msg").append(div); 
                                             setTimeout(function(){ 
 
                                       $(".upload_msg").html(""); 
                                        $(".upload_p").css("width","0%"); 
                                         $(".upload_p").html(""); 
                
                                        },3000); 
                          } 
                          else{ 
                            var div=document.createElement("DIV"); 
                             div.className="alert alert-danger mt-3"; 
                                   div.innerHTML=obj.msg; 
                                  $(".upload_msg").append(div); 
                                             setTimeout(function(){ 
 
                                       $(".upload_msg").html(""); 
                                       $(".upload_p").css("width","0%"); 
                                         $(".upload_p").html(""); 
                
                                        },3000); 
                          } 
                        } 
                    }) 
} 
 else{ 
                         var div=document.createElement("DIV"); 
                             div.className="alert alert-danger p-3 mt-3"; 
                                   div.innerHTML="file size too large kindly buy more sotrage"; 
                                  $(".upload_msg").append(div); 
                                             setTimeout(function(){ 
 
                                       $(".upload_msg").html(""); 
                                       $(".upload_p").css("width","0%"); 
                                         $(".upload_p").html(""); 
                                          $(".u_pro").addClass("d-none"); 
                
                                        },3000); 
 
                      } 
 
                       
                      
                } 
            }); 
            $(".menu").each(function(){ 
                $(this).click(function(){ 
                    var page_link=$(this).attr("p_link"); 
                    $.ajax({ 
 
                    type:"POST", 
                    url:"pages/"+page_link+".php", 
                    beforeSend:function(){ 
					$(div).html(""); 
                        var div=document.createElement("DIV"); 
                        $(div).addClass("alert alert-success"); 
                        $(div).html("Loading...."); 
                        $(".msg").html(div); 
                        $(".msg").removeClass("d-none"); 
 
                    }, 
                    success:function(response){ 
                        $(".msg").addClass("d-none"); 
                        $(".content").html(response); 
                    } 
                    }) 
                }) 
            }); 
            $(".cut").click(function(){ 
                $(".mobile_menu").css({"width":"0%"}); 
            }) 
            $(".bar").click(function(){ 
                $(".mobile_menu").css({"width":"75%"}); 
            }) 
            $(".mm").each(function(){ 
                $(this).click(function(){ 
                    $(".mobile_menu").css({"width":"0%"}); 
                }) 
            }); 
            $(".search_frm").submit(function(e){ 
                e.preventDefault(); 
 
                var query=$("#search").val(); 
                $.ajax({ 
 
                    type:"POST", 
                    url:"pages/search.php", 
                    data:{ 
                        query:query 
                    }, 
                    beforeSend:function(){ 
                        var div=document.createElement("DIV"); 
                        $(div).addClass("alert alert-success"); 
                        $(div).html("Loading...."); 
                        $(".msg").append(div); 
                        $(".msg").removeClass("d-none"); 
 
                    }, 
                    success:function(response){ 
                        $(".msg").addClass("d-none"); 
                        $(".content").html(response); 
                    } 
                    }) 
            }) 
 
 
             
 
             
             
        }) 
         
    </script> 
</body> 
</html>