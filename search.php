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
$cr = http_request("https://api.github.com/search/repositories?q=$target");
$cr = json_decode($cr, TRUE);
 
for ($i = 0; $i < count($cr['items']); $i++) {
    $id   = $cr['items'][$i]['owner']['id'];
    $baha = $cr['items'][$i]['language'];
    $user = $cr['items'][$i]['owner']['login'];
    $foto = $cr['items'][$i]['owner']['avatar_url'];
    $url  = $cr['items'][$i]['html_url'];
    $desk = $cr['items'][$i]['description'];

    echo "\n";
    echo "Repositories     : ke-$i\n";
    echo "Id               : $id\n";
    echo "Bahasa           : $baha\n";
    echo "Username         : $user\n";
    echo "Foto Profil      : $foto\n";
    echo "Url Repositories : $url\n";
    echo "Deskripsi        : $desk\n";
    }
?>
