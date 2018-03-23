<?php

$hubVerifyToken = 'quang_bff_khanh_linh';
$access_token =   "EAANZCZARH9jp09xoQcTxi2gLO2XVC3qj6QybTYeNRgnHGMRwMeoIX7LHLacCk7YqHWSve6SJV5s5pkGujqdRUFRWslGJ5s0ltZBfzFoHGGdM9AsZAZBoErE8ZCf7qAmpMQBo9zIZAxaZBqhpfw2N585BzXZBAxbZCwDQZDZD";
$servername = "sql21om";
$username = "b2434494";
$password = "quan";
$dbname = "b24_2113ang";


if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$page_id = $input['entry'][0]['id'];
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = isset($input['entry'][0]['messaging'][0]['message']['text']) ? $input['entry'][0]['messaging'][0]['message']['text']: '' ;
$postback = isset($input['entry'][0]['messaging'][0]['message']['quick_reply']['payload']) ? $input['entry'][0]['messaging'][0]['message']['quick_reply']['payload']: '' ;
$msg_type = isset($input['entry'][0]['messaging'][0]['message']['attachments'][0]['type']) ? $input['entry'][0]['messaging'][0]['message']['attachments'][0]['type']: '' ;
$msg_url = isset($input['entry'][0]['messaging'][0]['message']['attachments'][0]['payload']['url']) ? $input['entry'][0]['messaging'][0]['message']['attachments'][0]['payload']['url']: '' ;
$json_data = null;

file_put_contents("save.txt", json_encode($input));
file_put_contents("filename.txt", $msg_type.$msg_url);

$your_id = get_your_id($sender);

if ($message == "pp" || $message == "Pp" || $message == "PP") {
	$json_quick = '{
	"content_type":"text",
	"title":"Có",
	"payload":"POSTBACK_EXIT_YES"
	},
	{
	"content_type":"text",
	"title":"Không",
	"payload":"POSTBACK_EXIT_NO"
	}';
	sendQuick($sender, "Bạn chắc chắn muốn thoát ?", $json_quick);
} else if ($postback == "POSTBACK_EXIT_YES") {
	$people_wait = get_people_wait();
	if ($people_wait == $sender) {
		set_people_wait("");
	}
	delete_people($sender, $your_id);
	sendGeneric($sender, "Bạn đã ngưng thả thính.", "Chat bất kì để tiếp tục thả thính.");
	sendGeneric($your_id, "Đối phương đã ngưng thả thính.", "Chat bất kì để tiếp tục thả thính.");
} else if ($postback == "POSTBACK_EXIT_NO") {
	sendGeneric($sender, "Come back !!!", "Bạn chưa thoát. Tiếp tục giật cá đi nhé.");
} else {
	if (!empty($sender)) {
		if (empty($your_id)) {
			$people_wait = get_people_wait();
			sendGeneric($sender, "Thả thính.", "Đang thả thính, vui lòng chờ.");
			if (empty($people_wait)) {
				set_people_wait($sender);
			} else {
				if ($sender == $people_wait) {
					sendGeneric($sender, "Please wait ...", "Thêm thính đi, cá vẫn chưa cắn câu.");
				} else {
					pairing($sender, $people_wait);
					sendGeneric($sender, "Done !", "Cá đã cắn câu, hãy giật câu đi nào. Gõ pp để kết thúc");
					sendGeneric($people_wait, "Done !", "Cá đã cắn câu, hãy giật câu đi nào. Gõ pp để kết thúc");
					set_people_wait("");
				}
			}
		} else {
			if (empty($msg_type)) {
				sendText($your_id, $message);
			} else {
				sendFile($your_id, $msg_url, $msg_type);
			}
		}
	}
}

function get_your_id($sender) {
	global $servername;
	global $username;
	global $password;
	global $dbname;
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM chatbot WHERE my_id = '".$sender."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);
	    mysqli_close($conn);
	    return $row['your_id'];;
	}
	mysqli_close($conn);
	return '';
}

function delete_people($sender_1, $sender_2) {
	global $servername;
	global $username;
	global $password;
	global $dbname;
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "DELETE FROM chatbot WHERE my_id='".$sender_1."'";
	if (!mysqli_query($conn, $sql)) {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	$sql = "DELETE FROM chatbot WHERE my_id='".$sender_2."'";
	if (!mysqli_query($conn, $sql)) {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function pairing($sender_1, $sender_2) {
	global $servername;
	global $username;
	global $password;
	global $dbname;
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "INSERT INTO chatbot (my_id, your_id) VALUES ('".$sender_1."', '".$sender_2."')";
	if (!mysqli_query($conn, $sql)) {
	   	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	$sql = "INSERT INTO chatbot (my_id, your_id) VALUES ('".$sender_2."', '".$sender_1."')";
	if (!mysqli_query($conn, $sql)) {
	   	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function set_people_wait($sender) {
	file_put_contents('people_wait.txt', $sender);
}

function get_people_wait() {
	return file_get_contents('people_wait.txt');
}

function sendText($sender, $text) {
	$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"text": "'.$text.'",
		}
	}';

	curlMessage($json_data);
}
function sendQuick($sender, $title, $json_quick) {
	$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"text": "'.$title.'",
			"quick_replies":[
				'.$json_quick.'
			]
		}
	}';

	curlMessage($json_data);
}

function sendGeneric ($sender, $title, $subtitle) {
	$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"attachment":{
				"type":"template",
				"payload":{
					"template_type":"generic",
					"elements":[
						{
							"title":"'.$title.'",
							"subtitle":"'.$subtitle.'"
						}
					]
				}
			}
		}
	}';
	curlMessage($json_data);
}
function sendFile($sender, $url, $type) {
	$json_data = '{
	    "recipient":{
	        "id":"'.$sender.'"
	    },
	    "message":{
		    "attachment":{
			    "type":"'.$type.'",
			    "payload":{
			    	"url":"'.$url.'",
			        "is_reusable": true
			    }
		    }
		}
	}';

	curlMessage($json_data);
}

function curlMessage($json_data)
{
	global $access_token;
	$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$result = curl_exec($ch);
}

?>
