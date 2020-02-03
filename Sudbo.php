<?php
error_reporting(0);
    echo "#################################\n";
    echo "#   Search Repositories Github  #\n";
    echo "#      Create By MarsHall       #\n";
    echo "#################################\n";
    echo "Note : Jika lebih dari satu kata gunakan (-)\n";
    echo "Search Repositories : ";
    $target = trim(fgets(STDIN));
 
function http_request($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 5.0.2; Redmi Note 3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.96 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);      
    return $output;
}
$crot = http_request("https://api.github.com/search/repositories?q=$target");
$crot = json_decode($crot, TRUE);
 
for ($i = 0; $i < count($crot['items']); $i++) {
    $id   = $crot['items'][$i]['owner']['id'];
    $user = $crot['items'][$i]['owner']['login'];
    $foto = $crot['items'][$i]['owner']['avatar_url'];
    $url  = $crot['items'][$i]['html_url'];
    $desk = $crot['items'][$i]['description'];

    echo "\n";
    echo "Repositories     : ke-$i\n";
    echo "Id               : $id\n";
    echo "Username         : $user\n";
    echo "Foto Profil      : $foto\n";
    echo "Url Repositories : $url\n";
    echo "Deskripsi        : $desk\n";
    echo "$key\n";//
    }
?>