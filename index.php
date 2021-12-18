<?php
if(!isset($_COOKIE['history'])) {
$listdown = [
    'list' => array()    
];
$listdown = json_encode($listdown); 
setcookie('history', $listdown, time() + (864000 * 30), "/");
}
// get thông tin từ KMA CODE
$dl = @file_get_contents("https://code.kmacfs.com");
$data = explode('<ul class="list-group list-group-flush">',$dl);
$data = explode('</ul>',$data[1]);
$data = str_replace('<li class="list-group-item">','<div class="col-sm-2 text-center mt-3 code-new">',$data[0]);
$data = str_replace('</li>','</div>',$data);
$data = str_replace('<a','<a target="_blank" ',$data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" /> 
    <link rel="icon" type="image/png" href="./logo.png" sizes="57x57">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <title>Tải nhanh FShare - KMA CFS</title>
    Latest compiled and minified CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    jQuery library 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "./jquery.cookie.js "></script>
    Popper JS 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    Latest compiled JavaScript 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta property="og:title" content="Tải nhanh FShare - KMA CFS">
    <meta property="og:site_name" content="Tải nhanh FShare - KMA CFS">
    <meta property="og:description" content="Tải nhanh FShare - KMA CFS">
    <meta property="og:image" content="./logo.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fshare.kmacfs.com/">
    <meta name="keywords" content="Tải nhanh FShare - KMA CFS">
    <meta name="description" content="Website hỗ trợ tải nhanh Fshare của KMACFS. Không cần đăng ký thành viên!">
    Global site tag (gtag.js) - Google Analytics 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FLK7VZQWH8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FLK7VZQWH8');
    </script>
    <script data-ad-client="ca-pub-7405819810016388" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="https://use.fontawesome.com/55461975e7.js"></script>
    <style>
        li.nav-item {
        margin: 5px 5px;
        }
        .col-sm-2.text-center.mt-3.code-new {
    background: #f7f7f7;
    border: 1px dotted #dc3545;
    padding-top: 15px;
    margin: 0 !important;
}
    .kma-title{
        background: #dc3545;
    color: #fff;
    margin: 0 0;
    padding: 4px 0 0 0;
}
.dropdown-toggle::after{
    dislay:none !important;
}
.dropdown-menu.item-notice {top: 20px;left: -298px;width: 300px;padding: 0;}

.item-notice a.dropdown-item {
    width: 298px;
    white-space: inherit;
    padding: 5px 12px;
    border-bottom: 1px solid #ced4da;
}

.button-notice{
    position: absolute;
    top: -17px;
    right: 0px;
    width: 41px;
    padding: 2px 0;
}
.n-mobile .button-notice{
    display:none;
}
@media(max-width: 768px) {
   html{
    overflow-x: hidden;
   }        
  .button-notice{
    display:none;
}  

.n-mobile .button-notice {
    display: block;
    top: -15px;
    left: 10px;
}
.n-mobile .dropdown-menu.item-notice {
    top: 20px;
    left: 10px;
}
}


    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
        <div class="dropdown n-mobile">
  <button type="button" class="btn btn-primary button-notice" data-toggle="dropdown">
      
    <i class="fa fa-bell-o" aria-hidden="true"></i> <span class="badge badge-light" style="border-radius: 50%;
    background: red;
    color: #fff;
    position: absolute;
    top: -5px;
    right: 28px;">3</span>
  </button>
  <div class="dropdown-menu item-notice">
    <a class="dropdown-item" href="#"><i class="fa fa-circle" aria-hidden="true"></i>
 Đã fix lỗi chuyển hướng link dẫn đến không down được</a>
    <a class="dropdown-item" href="#"><i class="fa fa-circle" aria-hidden="true"></i>
 Update thêm lịch sử get link</a>
    <a class="dropdown-item" href="#"><i class="fa fa-circle" aria-hidden="true"></i>
 Update thêm tải link có pass</a>
     <a class="dropdown-item check-kma" href="#"><i class="fa fa-circle" aria-hidden="true"></i> Chỉ dành cho sinh viên KMA!</span></a>    
  </div>
</div>
        <a class="navbar-brand" href="https://kmacfs.com" style="margin:0 auto;"><img src="./logo.png" width="50px"></a>
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false" style="position: absolute; top: 16px; right: 10px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navb" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="https://www.facebook.com/kmaconfessions" class="btn btn-primary"><i class="fa fa-flag" aria-hidden="true"></i> FanPage </a>
                </li>
                <li class="nav-item">
                    <a href="https://bit.ly/KMA_CFS" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Confession </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.facebook.com/groups/kma.community.cfs" class="btn btn-warning"><i class="fa fa-users" aria-hidden="true"></i> Group </a>
                </li>
                <li class="nav-item"><a href="https://code.kmacfs.com" class="btn btn-danger"><i class="fa fa-code" aria-hidden="true"></i> KMA CODE </a></li>
                <li class="nav-item"><a href="https://upanh.kmacfs.com" class="btn btn-info"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Up Ảnh </a></li>
                <li class="nav-item"><a href="https://pokemon.kmacfs.com" class="btn btn-outline-danger"><i class="fa fa-eercast" aria-hidden="true"></i> Pokémon </a></li>
            </ul>
        </div>
<div class="dropdown">
  <button type="button" class="btn btn-primary button-notice" data-toggle="dropdown">
      
    <i class="fa fa-bell-o" aria-hidden="true"></i> <span class="badge badge-light" style="border-radius: 50%;
    background: red;
    color: #fff;
    position: absolute;
    top: -5px;
    right: 28px;">3</span>
  </button>
  <div class="dropdown-menu item-notice">
    <a class="dropdown-item" href="#"><i class="fa fa-circle" aria-hidden="true"></i>
 Đã fix lỗi chuyển hướng link dẫn đến không down được</a>
    <a class="dropdown-item" href="#"><i class="fa fa-circle" aria-hidden="true"></i>
 Update thêm lịch sử get link</a>
    <a class="dropdown-item" href="#"><i class="fa fa-circle" aria-hidden="true"></i>
 Update thêm tải link có pass</a>
     <a class="dropdown-item check-kma" href="#"><i class="fa fa-circle" aria-hidden="true"></i> Chỉ dành cho sinh viên KMA!</span></a>
  </div>
</div>
    </nav>
    </div>
    <div class="container">
        <div class="row">
           <div class="col-sm-12 text-center mt-3">
               <h1 style="color:#cd1417">GET LINK TẢI NHANH</h1><br></be><img src="./fshare.png">
           </div>
           <div class="col-sm-12 text-center mt-3">
               <div class="alert alert-danger notice" style="display:none">
                   <strong>Lỗi!</strong> Không get được link xin vui lòng thử lại sau!
               </div>
           </div>
           <div class="col-sm-12 text-center mt-3"><b>
                    <p class="text-warning"><i class="fa fa-exclamation-triangle"></i> Lưu ý : Dung lượng tải nhanh tối đa của website là 150GB / Ngày. Sau khi hết dung lượng tốc độ tải thuộc loại khá !</p>  
                   <h4 class="text-danger" style="border: 1px solid #cd1417;padding: 10px 0;"><i class="fa fa-exclamation-triangle"></i> Hệ thống chỉ dành cho Sinh Viên KMAer!</h4>
                    <p class="text-primary "> Gợi ý: Tưởng là <span class="text-danger">3</span> hóa ra là <span class="text-danger">4</span> ! Học sinh KMAer chắc chắn giải được để dùng! </p>
               </b></div>
           <div class="col-sm-12 text-center">
               <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myHistory"><i class="fa fa-history" aria-hidden="true"></i> LỊCH SỬ GET LINK</button>
           </div>
           <div class="col-sm-5 text-right mt-3">
               <input id="link-get" type="text" class="form-control" placeholder="Nhập Link Fshare cần tải" required>
           </div>
           <div class="col-sm-5 text-right mt-3">
               <input id="pass-get" type="text" class="form-control" placeholder="Nhập pass nếu có">
               <i class="fa fa-info-circle text-secondary" aria-hidden="true" id="ispass" style="cursor: help;position: absolute;top: 10px;right: 20px;font-size: 20px;"></i>
           </div>
           <div class="col-sm-2 mt-3">
               <button type="button" class="btn btn-success btn-block" id="click-get"><i class="fa fa-link"></i> Get Link</button>
           </div>
           <div class="col-sm-12 text-center mt-3 button-get"><b>
                   <p class="text-primary"> Nhập link cần tải <i class="text-danger">( VD : https://www.fshare.vn/file/4Q56774PV4MG )</i> và nhập <i class="text-danger">PASS</i>, link không có pass thì bỏ trống! Sau đó ấn [ <i class="fa fa-link"></i> Get Link ]</p>
               </b></div>
       </div>
       <div class="row text-center">
           <div class="col-sm-3"></div>
           <div class="col-sm-6 luu-y" style="border: 1px solid #dee2e6;border-radius: 10px; display:none;">
               <p style="color: #17a2b8; font-weight: 600;margin: 5px 0;">Ô pass dành cho link file đặt password</p>
               <img src="https://i.imgur.com/9NsGLBL.png" width="100%">
           </div>
           <div class="col-sm-3"></div>
       </div>
       <div class=row>
            <div class="col-sm-12 text-center kma-title mt-3">
                <h2>KMA CODE - NEW</h2>
            </div>
            <?php echo $data; ?>
        </div>
    </div>
    The Modal 
    <div class="modal" id="myHistory">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
                Modal Header 
               <div class="modal-header">
                   <h4 class="modal-title"><i class="fa fa-history" aria-hidden="true"></i> LỊCH SỬ GET LINK CỦA BẠN</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button><br>
                    
               </div>
                Modal body 
               <div class="modal-body">
                
                   <div class="table-responsive list-history">
                   </div>
               </div>
                Modal footer 
               <div class="modal-footer">
                    <p><i><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Lưu ý : Các link get sẽ bị hết hạn trong một thời gian nhất định!</i></p>
                   <button type="button" class="btn btn-warning clear-cookie">Xóa lịch sử</button>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
               </div>
           </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $.get( "./history.php", function( data ) {
          $( ".list-history" ).html( data );
        });
        $('.clear-cookie').click(function(){
            let history = {'list': []};
            history = JSON.stringify(history);
            $.cookie("history", history, { expires : 365 });
            $.get( "./history.php", function( data ) {
            $( ".list-history" ).html( data );
        });
        });
        $("#click-get").click(function() { // xử lý khi click
            if (!($("#click-get").hasClass('disabled'))) {
                var link = $('#link-get').val(); // lấy dữ liệu link
                var pass = $('#pass-get').val(); // lấy pass của link
                if (link == '') {
                    $('.notice').css("display", "block");
                    $('.notice').html('<strong>Lỗi!</strong> Bạn chưa nhập link cần GET!');
                } else {
                    if (link.search('www.fshare.vn/file') != -1) {
                        $('.notice').css("display", "none");
                        $("#click-get").addClass('disabled');
                        // tạo deylay 
                        $(".button-get").html('<button type="button" class="btn btn-primary disabled"><span class="spinner-grow spinner-grow-sm"></span> Link tải sẽ được khởi tạo sau <span id="countdowntimer">1</span> giây</button>');
                        var timeleft = 1;
                        var downloadTimer = setInterval(function() {
                            timeleft--;
                            document.getElementById("countdowntimer").textContent = timeleft;
                            if (timeleft <= 0)
                                clearInterval(downloadTimer);
                        }, 1000);
                        // xử lý get link 
                        setTimeout(function() {
                            var request = $.ajax({
                                url: "getlink.php",
                                method: "POST",
                                data: { link: link, pass: pass },
                                dataType: "html"
                            });

                            request.done(function(msg) {
                                let url = JSON.parse(msg);
                                if (url.location != undefined) {
                                    $(".button-get").html('<a href="https://fshare.kmacfs.com/download.php?link=' + encodeURIComponent(url.location) + '" class="btn btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Tải xuống ngay!</a>');
                                    $("#click-get").removeClass('disabled');
                                        $.get( "./history.php", function( data ) {
                                        $( ".list-history" ).html( data );
                                 });
                                } else {
                                    if (url.code == 123) {
                                        $(".button-get").html('<button class="btn btn-danger disabled"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Lỗi! ' + url.msg);
                                        $("#click-get").removeClass('disabled');
                                    } else {
                                         if (url.code == 333) {
                                        $(".button-get").html('<button class="btn btn-danger disabled"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Lỗi! Bạn không phải sinh viên KMAer!</button>');
                                        $("#click-get").removeClass('disabled');                                             
                                         }else{
                                        $(".button-get").html('<button class="btn btn-danger disabled"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Lỗi! Tập tin không tồn tại</button>');
                                        $("#click-get").removeClass('disabled');                                             
                                         }
                                    }
                                }
                            });
                          
                    } else {
                        $('.notice').css("display", "block");
                        $('.notice').html('<strong>Lỗi!</strong> Link bạn nhập không đúng định dạng!')
                    }
                }
            }
        });
        $("#ispass")
            .mouseover(function() {
                $('.luu-y').css("display", "block");
            })
            .mouseout(function() {
                $('.luu-y').css("display", "none");
            });

    });
    </script>
</body>

</html>
