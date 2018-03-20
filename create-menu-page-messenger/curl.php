<?php
$access_token =   "EAAN3qJxqcx8BAK3ZCZARH9jp09xoQcTxi2gLO2XVC3qj6QybTYeNRgnHGMRwMeoIX7LHLacCk7YqHWSve6SJV5s5pkGujqdRUFRWslGJ5s0ltZBfzFoHGGdM9AsZAZBoErE8ZCf7qAmpMQBo9zIZAxaZBqhpfw2N585BzXZBAxbZCwDQZDZD";

$json_data = '{
  "persistent_menu":[
    {
      "locale":"default",
      "composer_input_disabled": false,
      "call_to_actions":[
        {
          "type":"web_url",
          "title":"Hướng dẫn",
          "url":"http://bit.ly/lg1-huong-dan/",
          "webview_height_ratio":"full"
        },
        {
          "type":"web_url",
          "title":"Liên hệ",
          "url":"http://bit.ly/lg1-lien-he",
          "webview_height_ratio":"full"
        },
        {
          "type":"web_url",
          "title":"Developer by Quang Dev",
          "url":"http://doanvanquang.com/",
          "webview_height_ratio":"full"
        }
      ]
    },
    {
      "locale":"zh_CN",
      "composer_input_disabled":false,
      "call_to_actions":[
        {
          "title":"Developer by Quang Dev",
          "type":"postback",
          "payload":"PAYBILL_PAYLOAD"
        }
      ]    
    }
  ]
}';


$url = 'https://graph.facebook.com/v2.6/me/messenger_profile?access_token='.$access_token;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
?>