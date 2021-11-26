<?php 
$listdown = json_decode($_COOKIE['history'], true);
if ($listdown['list'] == NULL){
    echo '<h2 class="text-center text-danger"> Không có lịch sử </h2>';
}else{
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>LINK GET</th>
            <th>PASSWORD</th>
            <th>LINK DOWN</th>
        </tr>
    </thead>
    <tbody>
<?php 
        foreach ($listdown['list'] as $key) {
            $link = str_replace('https://www.fshare.vn/file/','',$key['link']);
            $link = explode('?token',$link);
                echo '<tr>
                    <td><a href="'.$key['link'].'" target="_blank">'.$link[0].'</a></td>
                    <td>'.$key['pass'].'</td>
                    <td><a href="https://fshare.kmacfs.com/download.php?link='.urlencode($key['down']).'" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Tải về</a></td>
                    </tr>';
        }
?>        
    </tbody>
</table>
<?php } ?>