<?php
set_time_limit(0);
error_reporting(0);
$token = 'EAACW5Fg5N2IBAPe5NvR19dwZAA9th7tNiPWRXMRstBIbde2jNDVZBIhlapJp7dMZB6koZCseSyvw2IwmVGvORs0iDwZANPhe0mgLNBZCu3KJpZB4NegaohfeKYWOmthJ4KOFPgOtVD5P8RFZAe9LEBZAw'; 
$post = json_decode(request('https://graph.facebook.com/v2.9/me/feed?fields=id,message,created_time,from&limit=10&access_token=' . $token), true);
$timelocpost = date('Y-m-d');
$logpost     = file_get_contents("log.txt");
for ($i = 0; $i < 10; $i++) {
    $idpost      = $post['data'][$i]['id'];
    $messagepost = $post['data'][$i]['message'];
    $time        = $post['data'][$i]['created_time'];
    $post_comment = json_decode(request('https://graph.facebook.com/v2.9/' .$idpost. '?fields=id,message,comments&limit=1000&access_token=' . $token), true);
    if (!empty($idpost))
    for ($j = 0; $j < 1000; $j++) {
        $id_comment = $post_comment['comments']['data'][$j]['id'];
        if (strpos($logpost, $id_comment) === FALSE && !empty($id_comment)) {
            $reply_comment = 'Nhớ like và share nhé.';
            request('https://graph.facebook.com/' . urlencode($id_comment) . '/comments?method=post&message=' . urlencode($reply_comment) . '&access_token=' . $token);
            $luulog = fopen("log.txt", "a");
            fwrite($luulog, $id_comment . " ");
            fclose($luulog);
        }
    }
}
exec("php test.php");
function request($url)
{
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return FALSE;
    }
    
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HEADER => FALSE,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_ENCODING => '',
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.87 Safari/537.36',
        CURLOPT_AUTOREFERER => TRUE,
        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => 0
    );
    
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response  = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    unset($options);
    return $http_code === 200 ? $response : FALSE;
}
?>