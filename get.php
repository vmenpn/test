<?php
/////////////////////////// DỮ LIỆU ĐẦU VÀO ///////////////////////////////
$link = str_replace(' ','',$_POST['link']);
$passfile = $_POST['pass'];
// $link = 'https://www.fshare.vn/file/4Q56774PV4MG';
$app_name='mirror-I66CZH';
$app_key='dMnqMMZMUnN5YpvKENaEhdQQ5jxDqddt'; 
$email = 'vuphung69@gmail.com';
$pass = 'Hihihaha123@';


/////////////////////////// CÁC HÀM XỬ LÝ ///////////////////////////////
//////// TẠO HISTORY ////////
function createHistory($link,$passfile,$linkdown){ // tạo session và ghi vào file
$listdown = json_decode($_COOKIE['history'], true);
$itemdown = [
    'link' => ''.$link.'',
    'pass' => ''.$passfile.'',
    'down' => ''.$linkdown.''
]; 
array_push($listdown['list'],$itemdown);
$listdown = json_encode($listdown);
setcookie('history', $listdown, time() + (864000 * 30), "/");
}
//////// ĐỌC FILE ĐỂ LẤY DỮ LIỆU INFO /////////
function readSession(){ // đọc file chưa info để lấy session
    $user = file('info.txt');
    $json = json_decode($user[0], true);
    return $json;
}
/////// KIỂM TRA SESSION ///////////
function checkSession($app_name,$session_id){ // kiểm tra session của tài khoản còn sống hay không !
  // Gửi dữ liệu 
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.fshare.vn/api/user/get",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_COOKIE => "session_id=$session_id",
    CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "User-Agent: $app_name",
    "Content-Type: application/json"
  ),
));
$ketqua = curl_exec($curl); // lưu dữ liệu
curl_close($curl);
$json = json_decode($ketqua, true);
if ($json['code'] == 201 ){
    return false;
}else{
    return true;
}
}
/////// KHỞI TẠO SESSION ///////////
function createSessin($app_name,$app_key,$email,$pass){ // tạo session và ghi vào file
// Get session + token cho ứng dụng
// Thông tin cần gửi
$send='{
  "user_email": "'.$email.'",
  "password": "'.$pass.'",
  "app_key": "'.$app_key.'"
}';
// Gửi dữ liệu 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.fshare.vn/api/user/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $send,
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "User-Agent: $app_name",
    "Content-Type: application/json"
  ),
));
$ketqua = curl_exec($curl); // lưu dữ liệu
curl_close($curl);
$myfile = fopen('./info.txt', 'w+'); // mở file
fwrite($myfile, $ketqua); // ghi vào file
}
/////// GET LINK DOWN ///////////
function getLink($app_name,$session_id,$token,$link,$passfile){ // getlink tải nhanh
// Thông tin cần gửi
$send='{
  "url": "'.$link.'",
  "password": "'.$passfile.'",
  "token": "'.$token.'",
  "zipflag": 0
}';
// Gửi dữ liệu 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.fshare.vn/api/session/download",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $send,
  CURLOPT_COOKIE => "session_id=$session_id",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "User-Agent: $app_name",
    "Content-Type: application/json"
  ),
));
$ketqua = curl_exec($curl); // lưu dữ liệu
curl_close($curl);
echo $ketqua;
$json = json_decode($ketqua, true);
if($json['location'] != ''){
$list = fopen('list.txt','a');
if ($passfile!=''){
createHistory($link,$passfile,$json['location']);
$content = $link.'|'.$passfile.'|'.$json['location'].'
';
}else{
createHistory($link,'No password',$json['location']);
$content = $link.'|No password|'.$json['location'].'
';    
}
fwrite($list, $content);
fclose($list);
}
}
/////////////////////////// BẮT ĐẦU XỬ LÝ LẤY LINK ///////////////////////////////
// Get các thông tin cần thiết từ file
$info = readSession();
$session_id = $info['session_id'];
$token = $info['token'];
// kiếm tra session
if(checkSession($app_name,$session_id)){
    getLink($app_name,$session_id,$token,$link,$passfile);
}else{
    createSessin($app_name,$app_key,$email,$pass);
    $info = readSession();
    $session_id = $info['session_id'];
    $token = $info['token'];
    getLink($app_name,$session_id,$token,$link,$passfile);
}

?>