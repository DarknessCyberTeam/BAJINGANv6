<?php
error_reporting(0);

echo "\n";
echo "{Masukkan Token} :>   ";
$token=trim(fgets(STDIN, 1024));
echo "\n";
echo "{Jumlah Like Di Kirim} :>   ";
$limit=trim(fgets(STDIN, 1024));
$ambil_konten = file_get_contents("https://graph.facebook.com/v2.1/me/home?fields=id,from,type,message&limit={$limit}&access_token={$token}");
$jdecode = json_decode($ambil_konten,true);
//print_r($jdecode);
foreach ($jdecode['data'] as $key => $data) {
	$data_id = $data['id']; // data id
	$data_name = $data['from']['name']; // pemilik status
	$data_time = $data['created_time']; // waktu status
	$data_pesan = $data['message'];
/* mulai like */
	$url = "https://graph.facebook.com/v2.1/{$data_id}/likes";
	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,20);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31');
    curl_setopt($curl, CURLOPT_COOKIE,'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEFILE,'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
    curl_setopt($curl, CURLOPT_POSTFIELDS,"access_token={$token}&method=post");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 3);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
    $result = curl_exec($curl);
    $results = json_decode($result,true);
    curl_close($curl);
    if($results['success']){
    	echo "[Success]-> ".substr_replace($data_pesan,"...",16)." - ".$data_name."\r\n";
    }
}

?>