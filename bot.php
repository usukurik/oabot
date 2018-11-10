<?php
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = 'Rf1Re6tnA1sY92LCo8KxZqVo9sOoG22CSpowZB2UbT8HBFUWL2VgObiLq30t/aGfGBuBmzPncbsmrDGP7SH0SFiNE+KZ3texYrirn4/4pnJ/LXbJyiIV5+raqDrvBrAKU8IUO4/4v/aw7zyIk+ALQgdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'eabfabd5c1423eec2dbe9033ad7bc45a';//sesuaikan
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId     = $client->parseEvents()[0]['source']['userId'];
$groupId    = $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp  = $client->parseEvents()[0]['timestamp'];
$type       = $client->parseEvents()[0]['type'];
$message    = $client->parseEvents()[0]['message'];
$messageid  = $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = explode(" ", $message['text']);
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
if ($command == 'anu') {
    $text .= "_________________\n";
    $text .= "sticker gift\n";
    $text .= "sticker image\n";
    $text .= "request\n";
    $text .= "broadcast\n";
    $text .= "gambar\n";
    $text .= "appline1\n";
    $text .= "appline2\n";
    $text .= "lokasi\n";
    $text .= "bog\n";
    $text .= "gog\n";
    $text .= "subscrabe\n";
    $text .= "youtube\n";
    $text .= "me\n";
    $text .= "helpbot\n";
    $text .= "__________________";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array (
  'type' => 'flex',
  'altText' => 'ANU SAKIT',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $text,
          'color' => '#1AE501'
          'wrap' => True,
        ),
      ),
    ),
  ),
)
        )
    );
}
if($message['type']=='text') {
        if ($command == 'me') { 
     
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Chimi-PrankBot', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://cdn.dribbble.com/users/287797/screenshots/2406073/watch_me.gif', 
                            'imageAspectRatio' => 'square', 
                            'imageSize' => 'full', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'KLIK TOMBOL SUBSCRABE GUYS',
                            'text' => 'adiputra.95', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'SUBSCRABE NOW', 
                                'uri' => 'https://www.youtube.com/channel/UCycBrqSWEHdk-slnhUmGWiQ', 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
