<?php   
/////////////////////////// DỮ LIỆU ĐẦU VÀO ///////////////////////////////
$link = str_replace(' ','',$_POST['link']);
$passfile = $_POST['pass'];

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
/////// GET LINK DOWN ///////////
$linkget = 'https://congtygahu.com/getlink.php?link='.urlencode($link).'&pass='.$pass;
$dl = @file_get_contents($linkget);
$data = json_decode($dl, true);
if($data['location'] == ''){
    echo$dl;
}else{
    echo $dl;
    if($passfile == ''){
        $passfile = 'No Password';
    }
    createHistory($link,$passfile,$data['location']);
    $list = fopen('list.txt','a');
    $content = date("D-m-Y h:i:s A").'|'.$link.'|'.$passfile.'|'.$data['location'].'
';    
fwrite($list, $content);
fclose($list);
}
}
?>