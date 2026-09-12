<style>
  .file-card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    background: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.08) !important;
  }

  .file-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
  }

  .file-icon-box {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
  }

  .action-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    cursor: pointer;
  }

  .action-btn:hover {
    background-color: #f1f3f5;
  }

  .action-btn.del-btn:hover {
    background-color: #ffe3e3;
    color: #dc3545 !important;
  }

  .action-btn.star-btn:hover {
    background-color: #fff0f6;
    color: #e03131 !important;
  }

  .file-title {
    color: #212529;
    font-weight: 600;
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<?php
session_start();
require("../db.php");
$user_email=$_SESSION['user'];
$user_sql= "SELECT * FROM users WHERE email='$user_email'";
$user_res=$db->query($user_sql);
$user_data=$user_res->fetch_assoc();
$user_id=$user_data['id'];
$tf="user_".$user_id;
$total_storage=$user_data['storage'];
?>

<div class="row g-3">
    <?php
    $file_data_sql="SELECT * FROM $tf WHERE star='yes'";
    $file_res=$db->query($file_data_sql);
    
    if($file_res->num_rows == 0) {
        echo '<div class="col-12 text-center py-5 text-muted">
                <i class="fa-regular fa-star fa-3x mb-3 text-secondary"></i>
                <h5>No starred files found</h5>
              </div>';
    }

    while($file_array= $file_res->fetch_assoc()){
        $fd_array=pathinfo($file_array['filename']);
        $file_name=$fd_array['filename'];
        $f_ext=strtolower($fd_array['extension']);
        $basename=$fd_array['basename'];

        echo '
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card file-card h-100 rounded-4 p-2">
                <div class="card-body d-flex flex-column justify-content-between p-2">
                    <div class="d-flex align-items-center mb-3">
                        <div class="file-icon-box me-3 flex-shrink-0">';
                        
                        if($f_ext=="mp4" || $f_ext=="mov" || $f_ext=="wmv"){
                            echo '<i class="fa-solid fa-file-video text-warning"></i>';
                        }
                        else if($f_ext=="mp3"){
                            echo '<i class="fa-solid fa-file-audio text-info"></i>';
                        }
                        else if($f_ext=="ppt" || $f_ext=="pptx"){
                            echo '<i class="fa-solid fa-file-powerpoint text-danger"></i>';
                        }
                        else if($f_ext=="xls" || $f_ext=="xlsx"){
                            echo '<i class="fa-solid fa-file-excel text-success"></i>';
                        }
                        else if($f_ext=="zip" || $f_ext=="rar"){
                            echo '<i class="fa-solid fa-file-zipper text-secondary"></i>';
                        }
                        else if($f_ext=="pdf"){
                            echo '<i class="fa-solid fa-file-pdf text-danger"></i>';
                        }
                        else if($f_ext=="doc" || $f_ext=="docx"){
                            echo '<i class="fa-solid fa-file-word text-primary"></i>';
                        }
                        else if(in_array($f_ext, ['png', 'jpg', 'jpeg', 'gif'])){
                            echo '<img src="../data/'.$tf.'/'.$basename.'" class="rounded-3 object-fit-cover" style="width: 100%; height: 100%;">';
                        }
                        else {
                            echo '<i class="fa-solid fa-file text-muted"></i>';
                        }
                        
                        echo '</div>
                        <div class="overflow-hidden">
                            <h6 class="file-title text-truncate mb-0 fs-6" title="'.$file_name.'">'.$file_name.'</h6>
                            <span class="badge bg-light text-secondary text-uppercase fw-semibold mt-1" style="font-size: 0.7rem;">'.$f_ext.'</span>
                        </div>
                    </div>
                    
                    <hr class="my-2 text-muted opacity-25">
                    
                    <div class="d-flex justify-content-between align-items-center pt-1 px-2">
                        <a href="../data/'.$tf.'/'.$basename.'" target="_blank" class="action-btn text-secondary text-decoration-none" title="View"><i class="fa-regular fa-eye"></i></a>
                        <a href="../data/'.$tf.'/'.$basename.'" download class="action-btn text-secondary text-decoration-none" title="Download"><i class="fa-solid fa-download"></i></a>
                        <a role="button" class="action-btn del-btn text-secondary text-decoration-none del" id="'.$file_array['id'].'" folder="'.$tf.'" file="'.$basename.'" title="Delete"><i class="fa-regular fa-trash-can"></i></a>';
                        
                        if($file_array['star']=="yes"){
                            echo '<a role="button" status="no" id="'.$file_array['id'].'" class="action-btn star-btn star text-danger text-decoration-none" folder="'.$tf.'" title="Unstar"><i class="fa-solid fa-heart"></i></a>';
                        }
                        else{
                            echo '<a role="button" status="yes" id="'.$file_array['id'].'" class="action-btn star-btn star text-muted text-decoration-none" folder="'.$tf.'" title="Star"><i class="fa-regular fa-heart"></i></a>';
                        }

                        echo '</div>
                </div>
            </div>
        </div>';
    }
    ?>
</div>

<script>
$(document).ready(function(){
    $(".del").each(function(){
        $(this).click(function(){
            var id=$(this).attr('id');
            var folder=$(this).attr('folder');
            var file=$(this).attr('file');
            var ce=$(this);
            $.ajax({
                type:"POST",
                url:"del_file.php",
                data:{
                    id:id,
                    folder:folder,
                    file:file
                },
                success:function(response){
                    var obj= JSON.parse(response);
                    if(obj.msg=="File delete Successfully"){
                        var new_per=(obj.used_storage*100)/<?php echo $total_storage ?>;
                        $(".us").html(obj.used_storage);
                        $(".pb").css("width",new_per+"%");
                        var div=document.createElement("DIV");
                        div.className="alert alert-success mt-3 shadow-sm rounded-3";
                        div.innerHTML=obj.msg;
                        $(".upload_msg").append(div);
                        $(ce).closest('.col-12').remove();
                        
                        setTimeout(function(){
                            $(".upload_msg").html("");
                            $(".upload_p").css("width","0%");
                            $(".upload_p").html("");
                        },3000);
                    }
                    else{
                        var div=document.createElement("DIV");
                        div.className="alert alert-danger mt-3 shadow-sm rounded-3";
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
        })
    });
    
    $(".star").each(function(){
        $(this).click(function(){
            var star_id=$(this).attr('id');
            var star_status=$(this).attr('status');
            var s_folder=$(this).attr('folder');
            var ce=$(this);
            $.ajax({
                type:"POST",
                url:"star_files.php",
                data:{
                    sid:star_id,
                    s_status:star_status,
                    s_folder:s_folder
                },
                success:function(response){
                    if(response.trim()=="success"){
                        // Remove the item smoothly from favorites view when unstarred
                        $(ce).closest('.col-12').fadeOut(300, function(){
                            $(this).remove();
                        });
                    }
                    else{
                        alert(response);
                    }
                }
            })
        })
    })
});
</script>