<?php 
$link = $_GET['link'];
$link = str_replace("http://","https://",$link);
sleep(2);
// các xử lí
// Tiến hành chuyển hướng
header("Location: $link");
exit;

// có thể các còn các xử lí khác không được thực hiện.
?>