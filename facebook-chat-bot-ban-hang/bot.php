<?php

$hubVerifyToken = 'quang_bff_khanh_linh';
$access_token =   "EAAFWl8k5X4wBAAplZAseoTvooDPXbCoHZBm8OPGj8dDNZB7dk0MpUxG3c48o7VFWaUmdokS1EGED980wcRUrMIEyFirfRiWoFXV5B6H3WXBk8xwWRB8yhRyZBPstBn4C099tx8z7upSwQLGp4GzBSJ25u2eAMjC7FBZBwMWUZCWP6i1nKVz4al";

if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$page_id = $input['entry'][0]['id'];
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = isset($input['entry'][0]['messaging'][0]['message']['text']) ? $input['entry'][0]['messaging'][0]['message']['text']: '' ;
$postback = isset($input['entry'][0]['messaging'][0]['postback']['payload']) ? $input['entry'][0]['messaging'][0]['postback']['payload']: '' ;
$json_data = null;


file_put_contents("save.txt",json_encode($input));

// sendImage($sender, "http://static.vietnammoi.vn/stores/news_dataimages/anhngocnt/032017/07/01/3641_IMG_9726.jpg", $access_token);

if ($message == "T-shirt") {
	$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"attachment":{
				"type":"template",
				"payload": {
					"template_type":"generic",
					"elements":[
				    	{
							"title":"AoK1362 Thời Trang Everest",
							"image_url":"https://vn-live-02.slatic.net/p/7/ao-thun-nu-trang-in-hinh-meo-mun-form-rong-han-quoc-vai-day-min-aok1362-thoi-trang-everest-1502782965-07900501-f3d11781b0c417e3ec727dedfe8cb77f-webp-zoom_850x850.jpg",
							"subtitle":"Áo thun nữ trắng in hình mèo mun form rộng hàn quốc.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-thun-nu-trang-in-hinh-meo-mun-form-rong-han-quoc-vai-day-min-aok1362-thoi-trang-everest-10500970.html?spm=a2o4n.searchlistcategory.list.10.3e4179bbVGxBCY",
									"title":"Buy now"
								}
							]
						},
						{
							"title":"Thời Trang (Đen) Trần Doanh",
							"image_url":"https://vn-live-02.slatic.net/p/7/ao-thun-tron-nu-form-rong-phong-cach-han-quoc-vai-day-min-thoi-trang-den-tran-doanh-1518060609-64355382-301f0f3540d572c8b9920cc0942df2ab-webp-zoom_850x850.jpg",
							"subtitle":"Áo thun trơn nữ form rộng phong cách hàn quốc.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-thun-tron-nu-form-rong-phong-cach-han-quoc-vai-day-min-thoi-trang-den-tran-doanh-28355346.html?spm=a2o4n.searchlistcategory.list.16.3e4179bbekcrTc",
									"title":"Buy now"
								}            
							]
						},
						{
							"title":"KEEP GOING",
							"image_url":"https://vn-live-03.slatic.net/p/7/ao-thun-nu-tay-ngan-keep-going-mau-trang-d489-1516502407-44368701-9319a7574a56d718418d6428bc3ca47a-webp-zoom_850x850.jpg",
							"subtitle":"ÁO THUN NỮ TAY NGAN.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-thun-nu-tay-ngan-keep-going-mau-trang-d489-10786344.html?spm=a2o4n.searchlistcategory.list.45.3e4179bbCfzvk0",
									"title":"Buy now"
								}           
							]
						},
						{
							"title":"T&D D119",
							"image_url":"https://vn-live-02.slatic.net/p/7/ao-thun-nu-tay-lo-roma-mau-hong-tampd-d119-kem-ao-day-bat-ky-1508931570-49079081-8cd97236be0cad717b0a451d4e382202-webp-zoom_850x850.jpg",
							"subtitle":"Áo thun nữ tay lỡ ROMA màu hồng.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-thun-nu-tay-lo-roma-mau-hong-tampd-d119-kem-ao-day-bat-ky-18097094.html?spm=a2o4n.searchlistcategory.list.71.3e4179bbKbRPNa",
									"title":"Buy now"
								}   
							]
						},
						{
							"title":"AoK590 Thời Trang Everest",
							"image_url":"https://vn-live-02.slatic.net/p/7/ao-thun-nu-trang-in-hinh-youtube-form-rong-han-quoc-vai-day-min-aok590thoi-trang-everest-1510223438-9077687-84aedf378395716ee68cd7c35ca7178e-webp-zoom_850x850.jpg",
							"subtitle":"Áo thun nữ trắng in hình YouTube.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-thun-nu-trang-in-hinh-youtube-form-rong-han-quoc-vai-day-min-aok590thoi-trang-everest-7867709.html?spm=a2o4n.searchlistcategory.list.191.3e4179bbaffXqX",
									"title":"Buy now"
								}            
							]
						}

				  ]
				}
			}
		}
	}';
} else if ($message == "Litter") {
		$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"attachment":{
				"type":"template",
				"payload": {
					"template_type":"generic",
					"elements":[
				    	{
							"title":"ML350",
							"image_url":"https://vn-live-01.slatic.net/p/7/dam-xoe-phoi-tay-caro-ml350-1512099054-81643822-dcdb154b9b51722f286cc4b63327ff19-webp-zoom_850x850.jpg",
							"subtitle":"Đầm Xòe Phối Tay Caro - ML350.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/dam-xoe-phoi-tay-caro-ml350-22834618.html?spm=a2o4n.searchlistcategory.list.3.410d1658CVyZsW",
									"title":"Buy now"
								}
							]
						},
						{
							"title":"Thời trang Azado",
							"image_url":"https://vn-live-03.slatic.net/p/7/kieu-ao-dam-nu-dep-vn118-thoi-trang-azado-1512469844-56616042-eba9d90e3208e2055e71ce5566a6595c-webp-zoom_850x850.jpg",
							"subtitle":"Kiểu áo đầm nữ đẹp, VN118.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/kieu-ao-dam-nu-dep-vn118-thoi-trang-azado-24061665.html?spm=a2o4n.searchlistcategory.list.4.410d1658X0ROsF",
									"title":"Buy now"
								}            
							]
						},
						{
							"title":"Đầm thun thời trang nữ ống tay rộng Rozalo",
							"image_url":"https://vn-live-03.slatic.net/p/7/dam-thun-thoi-trang-nu-ong-tay-rong-rozalo-rwd70605sdt-soc-den-trang-1503975965-49676611-24f91abe7d77aabcb9984ccaa8e1801d-webp-zoom_850x850.jpg",
							"subtitle":"Tôn nét đẹp gợi cảm, dịu dàng, cuốn hút nhưng không kém phần thanh lịch và quý phái.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/dam-thun-thoi-trang-nu-ong-tay-rong-rozalo-rwd70605sdt-soc-den-trang-11667694.html?spm=a2o4n.searchlistcategory.list.14.410d16585KMtRG",
									"title":"Buy now"
								}           
							]
						},
						{
							"title":"Tiểu Thanh Fashion Shop",
							"image_url":"https://vn-live-02.slatic.net/p/7/dam-nu-dam-xoe-cot-eo-yu-dress-mau-xanh-1499670005-9566157-96cb15899c621e35e6b147893dcc64a0-webp-zoom_850x850.jpg",
							"subtitle":"Đầm Nữ - Đầm Xòe Cột Eo Yu Dress.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/dam-nu-dam-xoe-cot-eo-yu-dress-mau-xanh-7516659.html?spm=a2o4n.searchlistcategory.list.15.410d1658hiHqaE",
									"title":"Buy now"
								}   
							]
						},
						{
							"title":"FASHION Q&N",
							"image_url":"https://vn-live-02.slatic.net/p/7/dam-suong-phoi-luoi-qnf113-den-1508852296-84062871-7b2d7b195eea06b6c2603e3ba84df5aa-webp-zoom_850x850.jpg",
							"subtitle":"Đầm Suông Phối Lưới.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/dam-suong-phoi-luoi-qnf113-den-17826048.html?spm=a2o4n.searchlistcategory.list.68.410d1658eBqllF",
									"title":"Buy now"
								}            
							]
						}

				  ]
				}
			}
		}
	}';
} else if ($message == "Shirt") {
		$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"attachment":{
				"type":"template",
				"payload": {
					"template_type":"generic",
					"elements":[
				    	{
							"title":"BT Fashion",
							"image_url":"https://vn-live-02.slatic.net/p/7/ao-nu-voan-kieu-tre-vai-phoi-day-no-duyen-dang-thoi-trang-moi-bt-fashion-at062c-trang-1514634933-10062292-1bb793f5b35e83b7c7ebc2ec94b58a53-webp-zoom_850x850.jpg",
							"subtitle":"Áo Nữ Voan Kiểu Trễ Vai Phối Dây Nơ Duyên Dáng - Thời Trang Mới.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-nu-voan-kieu-tre-vai-phoi-day-no-duyen-dang-thoi-trang-moi-bt-fashion-at062c-trang-29226001.html?spm=a2o4n.searchlistcategory.list.10.5eb819f0y6yAoi",
									"title":"Buy now"
								}
							]
						},
						{
							"title":"Nguồn Hàng Thời Trang",
							"image_url":"https://vn-live-01.slatic.net/p/7/ao-kieu-nu-rot-vai-tre-trung-hong-cam-1508790619-21343671-0445e60ed9980fbbbec5906dcc10a557-webp-zoom_850x850.jpg",
							"subtitle":"Áo Kiểu Nữ Rớt Vai Trẻ Trung.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-kieu-nu-rot-vai-tre-trung-hong-cam-17634312.html?spm=a2o4n.searchlistcategory.list.13.5eb819f0PnVfYo",
									"title":"Buy now"
								}            
							]
						},
						{
							"title":"H3H Shop",
							"image_url":"https://vn-live-02.slatic.net/p/7/ao-kieu-thoi-trang-bet-vai-dinh-hoa-roi-1503046925-98195701-2803161e7582e702bda4671c1eb0ec16-webp-zoom_850x850.jpg",
							"subtitle":"Aó kiểu thời trang bẹt vai đính hoa rơi đem đến cho bạn gái phong cách thời trang nhẹ nhàng.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-kieu-thoi-trang-bet-vai-dinh-hoa-roi-10759189.html?spm=a2o4n.searchlistcategory.list.39.5eb819f07BNlAN",
									"title":"Buy now"
								}           
							]
						},
						{
							"title":"Zenko WM TOP",
							"image_url":"https://vn-live-01.slatic.net/p/7/ao-thun-nu-tre-vai-hoa-tiet-chu-thoi-trang-zenko-wm-top-800021-y-1499740284-5773097-3b6dbfb07a0c7a366de6c31670514ab4-webp-zoom_850x850.jpg",
							"subtitle":"Áo Thun Nữ Trễ Vai Họa Tiết Chữ Thời Trang.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-thun-nu-tre-vai-hoa-tiet-chu-thoi-trang-zenko-wm-top-800021-y-7903775.html?spm=a2o4n.searchlistcategory.list.55.5eb819f0sXyq85",
									"title":"Buy now"
								}   
							]
						},
						{
							"title":"Beyeu1688 Shop",
							"image_url":"https://vn-live-03.slatic.net/p/7/ao-kieu-phoi-soc-ho-vai-cach-dieu-beyeu1688-by6159-1495089659-0875785-5b9330864ea357b606f42494b8daa5eb-webp-zoom_850x850.jpg",
							"subtitle":"Áo kiểu phối sọc hở vai cách điệu.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-kieu-phoi-soc-ho-vai-cach-dieu-beyeu1688-by6159-5875780.html?spm=a2o4n.searchlistcategory.list.183.5eb819f0xWM6vc",
									"title":"Buy now"
								}            
							]
						}

				  ]
				}
			}
		}
	}';
}  else if ($message == "Coats") {
		$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"attachment":{
				"type":"template",
				"payload": {
					"template_type":"generic",
					"elements":[
				    	{
							"title":"GIA MINH KHANG",
							"image_url":"https://vn-live-03.slatic.net/p/7/ao-khoac-nu-hai-mat-gmkj382xanh-hong-nhac-1517988169-70931951-e0d84903eb1cdeb1b5bf1519bee68a92-webp-zoom_850x850.jpg",
							"subtitle":"Áo khoác nữ hai mặt.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-khoac-nu-hai-mat-gmkj382xanh-hong-nhac-15913907.html?spm=a2o4n.searchlistcategory.list.28.515c5b28rQJTOL",
									"title":"Buy now"
								}
							]
						},
						{
							"title":"Áo khoác dù nữ in logo phong cách mới",
							"image_url":"https://vn-live-03.slatic.net/p/7/ao-khoac-du-nu-in-logo-phong-cach-moi-mau-den-1507222972-58268951-7b28821b067566c30c6b310cc2ef6ae7-webp-zoom_850x850.jpg",
							"subtitle":"H.H.P là shop quần áo chuyên bán về thời trang nam nữ.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-khoac-du-nu-in-logo-phong-cach-moi-mau-den-15986285.html",
									"title":"Buy now"
								}            
							]
						},
						{
							"title":"Áo khoác gió có mũ nữ teen",
							"image_url":"https://vn-live-01.slatic.net/p/7/ao-khoac-gio-co-mu-nu-teen-pksr-b070do-1511173865-01725812-5c4943c881677124bf09e4b7c4132aef-webp-zoom_850x850.jpg",
							"subtitle":"Chất vải dù cao cấp giúp cho khách mặc cảm thấy thoải mái, dễ chịu.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-khoac-gio-co-mu-nu-teen-pksr-b070do-21852710.html?spm=a2o4n.searchlistcategory.list.89.515c5b28EW4fFY",
									"title":"Buy now"
								}           
							]
						},
						{
							"title":"Áo khoác kaki 2 lớp nữ",
							"image_url":"https://vn-live-03.slatic.net/p/7/ao-khoac-kaki-2-lop-nuap0152-1515652450-09997013-c20393840e6ae78ad0e873131893d7f8-webp-zoom_850x850.jpg",
							"subtitle":"Với cá tính mang lại vẻ đẹp thanh nhã ,thiết kế phù hợp với gu thời trang hiện đại cho bạn gái.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-khoac-kaki-2-lop-nuap0152-31079990.html",
									"title":"Buy now"
								}   
							]
						},
						{
							"title":"Áo khoác dù nam nữ 3 sọc cao cấp A35",
							"image_url":"https://vn-live-01.slatic.net/p/7/ao-khoac-du-nam-nu-3-soc-cao-cap-a35-den-1512376332-27021932-1678a82277474368ff4c7afc6b01cc57-webp-zoom_850x850.jpg",
							"subtitle":"Áo kiểu phối sọc cách điệu.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://www.lazada.vn/ao-khoac-du-nam-nu-3-soc-cao-cap-a35-den-23912072.html",
									"title":"Buy now"
								}            
							]
						}

				  ]
				}
			}
		}
	}';
} else if ($message == "Help" || $message == "help") {
	$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"text": "Mọi chi tiết xin liên hệ 0869033950.",
		}
	}';
} else {
	$json_data = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"text": "Chọn loại hàng bạn muốn mua.",
			"quick_replies":[
				{
				"content_type":"text",
				"title":"T-shirt",
				"payload":"POSTBACK_T_SHIRT"
				},
				{
				"content_type":"text",
				"title":"Litter",
				"payload":"POSTBACK_LITTER"
				},
				{
				"content_type":"text",
				"title":"Shirt",
				"payload":"POSTBACK_SHIRT"
				},
				{
				"content_type":"text",
				"title":"Coats",
				"payload":"POSTBACK_COATS"
				}
			]
		}
	}';
}


$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);


function sendA () {
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
							"title":"Welcome to Quang\'s ChatBot",
							"image_url":"https://kenh14cdn.com/2016/an-nguy-13-1466959393236.jpg",
							"subtitle":"Weve got the right hat for everyone.",
							"buttons":[
								{
									"type":"web_url",
									"url":"https://doanvanquang.com/",
									"title":"View Website"
								},{
									"type":"postback",
									"title":"Start Chatting",
									"payload":"DEVELOPER_DEFINED_PAYLOAD"
								}              
							]
						}
					]
				}
			}
		}
	}';
}
function sendImage($sender, $url, $access_token) {
	$json_data = '{
	    "recipient":{
	        "id":"'.$sender.'"
	    },
	    "message":{
		    "attachment":{
			    "type":"image", 
			    "payload":{
			    	"url":"'.$url.'",
			        "is_reusable": true
			    }
		    }
		}
	}';

	sendMessage($json_data, $access_token);
}

function sendMessage($json_data, $access_token)
{
	$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$result = curl_exec($ch);
}

?>