<?php
 
 $accesstoken="EAADBV1abaCkBABxGuH55B0ZCEFBkeKit5NB9f70mpvSqSD3B9dLeZBjbQcCNwDhCbnH1xWq9lav1lpmCDMc6ZCWetOnHXKOTkJZACvZBCZCCKPZBd5EuP5tThzVxSQUNtZAcY3N66apsdNXYOlXnE4ZBzuVTrvO8ZCrwzeNnI4wc1i2QZDZD";
 $challenge = $_REQUEST['hub_challenge'];
 $verify_token = $_REQUEST['hub_verify_token'];

// Set this Verify Token Value on your Facebook App 
 if ($verify_token === 'abc123') 
 {
  echo $challenge;
  die();
 }


$input = json_decode(file_get_contents('php://input'), true);
// Get the Senders Graph ID
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];

$messagingArray=$input['entry'][0]['messaging'][0];
if(isset($messagingArray['postback']))
{
	if($messagingArray['postback']['payload']=='Get Started')
	{
		sendTextMessage("Hello there :) ");
		die();
	}
}


// Get the returned message
$message = $input['entry'][0]['messaging'][0]['message']['text'];

//button sender test
if(isset($messagingArray['message']))
{ $sendMessage=$messagingArray['message']['text'];
  if(isset($messagingArray['message']['is_echo']))
  {
    die();
  }
  else{ 
    $senderActionResponse='{
  "recipient":{
    "id":"'.$sender.'"
  },
  "sender_action":"typing_on"
}';
sendRandResponse($senderActionResponse);
  if ($sendMessage=='merci') {
    $response='{
  "recipient":{
    "id":"'.$sender.'"
  },
  "message":{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"button",
        "text":"Vous voulez faire quoi maintenant",
        "buttons":[
          {
            "type":"web_url",
            "url":"https://www.google.com",
            "title":"Visiter notre site Website"
          }, 
          {
            "type":"web_url",
            "url":"https://www.facebook.com/monster.leebruce",
            "title":"Reclamer un probleme"
          },
          {
            "type":"postback",
            "title":"j\' ai une question?",
            "payload":"USER_DEFINED_PAYLOAD"
          }
        ]
      }
    }
  }
}';
sendRandResponse($response);
  }
 }
}


//
/*curl -X POST -H "Content-Type: application/json" -d '{
  "get_started": {"payload": "Get Started"}
}' "https://graph.facebook.com/v2.6/me/messenger_profile?access_token=EAADBV1abaCkBAKVdujbP8amT9fQCXRjZAvC3ZBZA4y5ZBkXmexQfLZAo36ZACxaZANybJNHxnZBL9PKSlBQDgHkZAvZCWNvy3F6a0U4MfK5XLN6aAZCZAKOO5ZCrZCsii4LSifVZBkZAX79j2P4HdaWMZB14Uzcd4JeNat1OsbejML01OYwIW2AZDZD"   */
//
//{ "get_started":{ "payload":"GET_STARTED_PAYLOAD" } }

$msg="j'ai pas compris !";


if(preg_match('/(hi|hello|bonjour|slm|cc|salam|salut|aslema|cc|slt|السلام عليكم|مرحبا)(.*?)/', $message))
{
	sendTextMessage("Vous étes le bienvenu !Comment je peux vous aidez? :)");
}

if(preg_match('/(cv|sava|lebess|comment va tu|sa va|chna7welik|chnahwelik)(.*?)/', $message))
{
	sendTextMessage("cv bien hmd :) ");
}

if(preg_match('/(pantalon|serwel|shoes|sbadri|spadri|sabat|trikou|pull|dbech|vetements)/', $message))
{
	sendTextMessage("Ah je comprend ! veuillez m'envoyer le numero de l'article svp :) ");
}

if(preg_match('/(quoi de neuf|k29|quoi 2 9|jdid)(.*?)/', $message))
{
	sendTextMessage("Plein de choses  ! veuillez Visiter l'acceuil de notre page ;) ");
}

if(preg_match('/(merci|thanks|thnx|chokran)(.*?)/', $message))
{
	sendTextMessage("Pas de quoi :) ");
}
if(preg_match('/(by|goodbye|byby|a\+)(.*?)/', $message))
{
	sendTextMessage("see u soon! ;)  ");
}

/*$link=mysqli_connect("localhost", "root", "","magazin_bot");



if(preg_match('/^[1-5]$/', $message))
{
	$reponse1=mysqli_query($link,"SELECT * FROM articles where id_article='$message' ")or die(mysqli_error($link));
	$getR = mysqli_fetch_assoc($reponse1);
	sendTextMessage("A propos de cette article , il ne reste que ".$getR['stock']."pieces, le prix est ".$getR['prix']."dinars");
		
}*/

if(preg_match('/(ok|att|[a-zA-Z0-9])/', $message))
{$senderActionResponse='{
  "recipient":{
    "id":"'.$sender.'"
  },
  "sender_action":"typing_off"
}';
sendRandResponse($senderActionResponse);
	  $senderActionResponse='{
  "recipient":{
    "id":"'.$sender.'"
  },
  "sender_action":"mark_seen"
}';
sendRandResponse($senderActionResponse);
}


// -------- // --------- // --------- // --------- // --------- // --------- // --------- //
//images des articles
//image 1
if (preg_match('/^1$/', $message)){	
$imageurl="https://scontent.ftun3-1.fna.fbcdn.net/v/t1.0-9/33602005_104409147097137_7304040874139189248_n.jpg?_nc_cat=0&oh=a55c3703c26e1ea6bd13b87d6d9bc07b&oe=5B7B7775";
sendImage($imageurl);
	}
	//image 2
if (preg_match('/^2$/', $message)){
$imageurl="https://scontent.ftun3-1.fna.fbcdn.net/v/t1.0-9/33521036_104409573763761_4739874630251053056_n.jpg?_nc_cat=0&oh=35defdc06df7ec6e1bdf71a6d60c367f&oe=5B7CB3E4";
sendImage($imageurl);
	}
		//image 3
if (preg_match('/^3$/', $message)){
//$imageurl="https://scontent.ftun3-1.fna.fbcdn.net/v/t1.0-9/33566037_104410123763706_6604628621334151168_n.jpg?_nc_cat=0&oh=d8da32c3d3dc8dd64ae57aecaee6f246&oe=5B87C32D";
sendImage("https://scontent.ftun3-1.fna.fbcdn.net/v/t1.0-9/33566037_104410123763706_6604628621334151168_n.jpg?_nc_cat=0&oh=d8da32c3d3dc8dd64ae57aecaee6f246&oe=5B87C32D");
	}
			//image 4
if (preg_match('/^4$/', $message)){
$imageurl="https://scontent.ftun3-1.fna.fbcdn.net/v/t1.0-9/33622844_104410320430353_2795403619497672704_n.jpg?_nc_cat=0&oh=02774ee498a4ca66de5b1afae67ee7ea&oe=5BBCE8DC";
sendImage($imageurl);
	}
			//image 5
if (preg_match('/^5$/', $message)){
$imageurl="https://scontent.ftun3-1.fna.fbcdn.net/v/t1.0-9/33598349_104410710430314_4432988410814136320_n.jpg?_nc_cat=0&oh=c16c97b302db0faa4ba78079f17a6558&oe=5BC4C76C";
sendImage($imageurl);
	}

//
if(preg_match('/(picture|nouveauté)(.*?)/', $message)){
	//API Url and Access Token, generate this token value on your Facebook App Page
$url = "https://graph.facebook.com/v2.6/me/messages?access_token=".$accesstoken;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"' . $sender . '"
    }, 
    "message":{
    	"attachment":{
    		"type": "image",
    		"payload":{
    			"url": "https://scontent.ftun3-1.fna.fbcdn.net/v/t1.0-9/33704749_104408900430495_5834534551300341760_n.jpg?_nc_cat=0&oh=21e36a4c69cb008bae3203d360daae1f&oe=5B7CC115"
    		}
    	}

        
    }
}';
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//Execute the request but first check if the message is not empty.
			if(!empty($input['entry'][0]['messaging'][0]['message'])){
			  $result = curl_exec($ch);

			  $errors=curl_error($ch);
			  $reponse=curl_getinfo($ch,CURLINFO_HTTP_CODE);

			  var_dump($errors);
			  var_dump($reponse);

			  curl_close($ch);
			  }
}
if(preg_match('/(send|text|tell)(.*?)joke/', $message)){
	$res=json_decode(file_get_contents('http://api.icndb.com/jokes/random'),true);
	$msg=$res['value']['joke'];	
	sendTextMessage($msg);
}



//anonym text
//sendTextMessage($msg);

//sendTextMessage($msg);



function sendTextMessage($msg)
{global $sender;
	global $accesstoken;
//API Url and Access Token, generate this token value on your Facebook App Page
$url = "https://graph.facebook.com/v2.6/me/messages?access_token=".$accesstoken;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.


$jsonData = '{
    "recipient":{
        "id":"' . $sender . '"
    }, 
    "message":{
    	"text":"'.$msg.'"      
    }
}';
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//Execute the request but first check if the message is not empty.
//if(!empty($input['entry'][0]['messaging'][0]['message'])){
  $result = curl_exec($ch);

  $errors=curl_error($ch);
  $reponse=curl_getinfo($ch,CURLINFO_HTTP_CODE);

  var_dump($errors);
  var_dump($reponse);

  curl_close($ch);

//}
}


//button function
function sendRandResponse($rawResponse)
{global $accesstoken;
//API Url and Access Token, generate this token value on your Facebook App Page
$url = "https://graph.facebook.com/v2.6/me/messages?access_token=".$accesstoken;
//Initiate cURL.
$ch = curl_init($url);



//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawResponse);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//Execute the request but first check if the message is not empty.
//if(!empty($input['entry'][0]['messaging'][0]['message'])){
  $result = curl_exec($ch);

  $errors=curl_error($ch);
  $reponse=curl_getinfo($ch,CURLINFO_HTTP_CODE);

  var_dump($errors);
  var_dump($reponse);

  curl_close($ch);

//}
}
function sendImage($adrIm)
{global $accesstoken;
	global $sender;
	
$url = "https://graph.facebook.com/v2.6/me/messages?access_token=".$accesstoken;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"' . $sender . '"
    }, 
    "message":{
    	"attachment":{
    		"type": "image",
    		"payload":{
    			"url":   "'.$adrIm.'"
    		}
    	}

        
    }
}';
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//Execute the request but first check if the message is not empty.
			//if(!empty($input['entry'][0]['messaging'][0]['message'])){
			  $result = curl_exec($ch);

			  $errors=curl_error($ch);
			  $reponse=curl_getinfo($ch,CURLINFO_HTTP_CODE);

			  var_dump($errors);
			  var_dump($reponse);

			  curl_close($ch);
			 // }

}
?>

