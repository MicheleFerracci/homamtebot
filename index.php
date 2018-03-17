<?php
$botToken = "498616169:AAFwsonDR3wHHqU9PseQ7kzWTuuhdMrRt1M";
$website = "https://api.telegram.org/bot".$botToken ;

//salva il update quello che manda telegram
$update = file_get_contents('php://input');
//decodicfica del json
$update = json_decode($update, TRUE);

$chatId = $update['message']['from']['id'];
$text = $update['message']['text'];

sendMessage($chatId,"Ciao come va?");

function sendMessage($chatId, $text)
{
  // richiamo l'indirizzo creato all'inizio e utilizzo il metodo delle api
  // sendmessage e il punto di domanda indica che gli sto dando quei valori
  // che richiede, quali, chat_id (obbligatorio) e il testo da scrivere
  $url = $GLOBAL['website']."/sendMessage?chat_id=$chatId&text=".urlencode($text);
  //urlencode codifica il testo per essere messo nell'url
  file_get_contents($url);
}


?>
