<?php
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = '2kTr8O2SVHUCjri0tZwoBeuSot36bglTs8Q4jm1n84vAyMS+7xxJ6vZ+bKVVNoIzxAeOURfqx6DxLvED2puqb7V/hkgttEtgS8B9dG3f8pk4sJt4kYlNDf2bmqfvJ20h28bxNfHzstmt78HuScxVuQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '6fd3a100a3fe9499c4e13daf380fac9d';//sesuaikan
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
#-------------------------[Function Open]-------------------------#
function tv($keyword) {
    $uri = "https://rest.farzain.com/api/acaratv.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal AcaraTV」";
    $result .= "\nStatus : Success!!!";
    $result .= "\nStasiun : " . $keyword . "-";
    $result .= "\nJadwal : ";
    $result .= $json['result'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Open]-------------------------#
function coolt($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://api.farzain.com/cooltext.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function qr($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://rest.farzain.com/api/qrcode.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
function ahli($keyword) {
    $uri = "https://rest.farzain.com/api/ahli.php?name=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
  
    $response = Unirest\Request::get("$uri");
  
    $json = json_decode($response->raw_body, true);
    $parsed = array();
    $parsed['a1'] = $json['result']['result'];
    $parsed['a2'] = $json['result']['image'];
    $parsed['a3'] = "Nama :" . $keyword . "-";
    return $parsed;
}
#-------------------------[Open]-------------------------#
function neon($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://rest.farzain.com/api/photofunia/neon_sign.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function light($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
    $json = json_decode($response->raw_body, true); 
    $result .= " https://rest.farzain.com/api/photofunia/light_graffiti.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function quotes($keyword) {
    $uri = "https://rest.farzain.com/api/motivation.php?apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Quotes」";
    $result .= "Status : Success!!!";
    $result .= "\nQuotes : ";
    $result .= $json['result']['quotes'];
    $result .= "\nBy : ";
    $result .= $json['result']['by'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
function arti($keyword) {
    $uri = "https://rest.farzain.com/api/nama.php?q=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Arti Nama」";
    $result .= "\nStatus : Success!!!";
    $result .= "\nNama : " . $keyword . "-";
    $result .= "\nArti Nama : ";
    $result .= $json['result'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Open]-------------------------#
function wib($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=Jakarta";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wit($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=jayapura";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wita($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=manado";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function tts($keyword) { 
    $uri = "https://translate.google.com/translate_tts?ie=UTF-8&tl=id-ID&client=tw-ob&q=" . $keyword; 

    $response = Unirest\Request::get("$uri"); 
    $result = $uri; 
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function urb_dict($keyword) {
    $uri = "http://api.urbandictionary.com/v0/define?term=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['list'][0]['definition'];
    $result .= "\n\nExamples : \n";
    $result .= $json['list'][0]['example'];
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function zodiak($keyword) {
    $uri = "https://script.google.com/macros/exec?service=AKfycbw7gKzP-WYV2F5mc9RaR7yE3Ve1yN91Tjs91hp_jHSE02dSv9w&nama=ervan&tanggal=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Zodiak Kamu」";
    $result .= "\nLahir : ";
    $result .= $json['data']['lahir'];
    $result .= "\nUsia : ";
    $result .= $json['data']['usia'];
    $result .= "\nUltah : ";
    $result .= $json['data']['ultah'];
    $result .= "\nZodiak : ";
    $result .= $json['data']['zodiak'];
    $result .= "\n\nPencarian : Google";
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function film_syn($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "Judul : \n";
    $result .= $json['Title'];
    $result .= "\n\nSinopsis : \n";
    $result .= $json['Plot'];
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function film($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Informasi Film」";
    $result .= "\nJudul :";
    $result .= $json['Title'];
    $result .= "\nRilis : ";
    $result .= $json['Released'];
    $result .= "\nTipe : ";
    $result .= $json['Genre'];
    $result .= "\nActors : ";
    $result .= $json['Actors'];
    $result .= "\nBahasa : ";
    $result .= $json['Language'];
    $result .= "\nNegara : ";
    $result .= $json['Country'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal shalat」";
    $result .= "\nLokasi : ";
    $result .= $json['location']['address'];
    $result .= "\nTanggal : ";
    $result .= $json['time']['date'];
    $result .= "\n\nShubuh : ";
    $result .= $json['data']['Fajr'];
    $result .= "\nDzuhur : ";
    $result .= $json['data']['Dhuhr'];
    $result .= "\nAshar : ";
    $result .= $json['data']['Asr'];
    $result .= "\nMaghrib : ";
    $result .= $json['data']['Maghrib'];
    $result .= "\nIsya : ";
    $result .= $json['data']['Isha'];
    $result .= "\n\nPencarian : Google";
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
function instagram($keyword) {
    $uri = "https://rest.farzain.com/api/ig_profile.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
  
    $response = Unirest\Request::get("$uri");
  
    $json = json_decode($response->raw_body, true);
    $parsed = array();
    $parsed['a1'] = $json['info']['username'];
    $parsed['a2'] = $json['info']['bio'];
    $parsed['a3'] = $json['count']['followers'];
    $parsed['a4'] = $json['count']['following'];
    $parsed['a5'] = $json['count']['post'];
    $parsed['a6'] = $json['info']['full_name'];
    $parsed['a7'] = $json['info']['profile_pict'];
    $parsed['a8'] = "https://www.instagram.com/" . $keyword;
    return $parsed;
}
#-------------------------[Open]-------------------------#
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
//show menu, saat join dan command,menu
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
if ($type == 'join') {
    $text = "Terimakasih Telah invite aku ke group ini silahkan ketik Help untuk lihat command aku :)";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/quotes') {
        $result = quotes($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => $result
                )
            )
        );
    }
}   
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
if ($command == '/jam') { 
     
        $result = wib($options); 
        $result2 = wit($options); 
        $result3 = wita($options); 
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                  'type' => 'template', 
                  'altText' => 'Jam Indonesia', 
                  'template' =>  
                  array ( 
                    'type' => 'carousel', 
                    'columns' =>  
                    array ( 
                      0 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/gXGfLU/20180913_194713.jpg', 
                        'imageBackgroundColor' => '#FFFFFF', 
                        'title' => 'WIB', 
                        'text' => 'Jam Indonesia WIB', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['time'], 
                            'data' => $result['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['date'],
                            'data' => $result['date'],
                          ), 
                        ), 
                      ), 
                      1 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/nxaPfU/20180913_194725.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WIT', 
                        'text' => 'Jam Indonesia WIT', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['time'], 
                            'data' => $result2['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['date'],
                            'data' => $result2['date'],
                          ), 
                        ), 
                      ), 
                      2 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/cPdc0U/20180913_194744.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WITA', 
                        'text' => 'Jam Indonesia WITA', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['time'], 
                            'data' => $result3['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['date'],
                            'data' => $result3['date'],
                          ), 
                        ),  
                      ),
                    ), 
                  ), 
                ) 
            ) 
        ); 
}
}
if($message['type']=='text') {
        if ($command == '/jadwaltv') {
        $result = tv($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array( 
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Open]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/test123') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                  'type' => 'bubble',
                  'styles' => 
                  array (
                    'footer' => 
                    array (
                      'separator' => true,
                    ),
                  ),
                  'body' => 
                  array (
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => 
                    array (
                      0 => 
                      array (
                        'type' => 'text',
                        'text' => 'Arti Nama',
                        'weight' => 'bold',
                        'size' => 'xxl',
                        'margin' => 'md',
                      ),
                      1 => 
                      array (
                        'type' => 'text',
                        'text' => 'Test',
                        'size' => 'xs',
                        'color' => '#aaaaaa',
                        'wrap' => true,
                      ),
                      2 => 
                      array (
                        'type' => 'separator',
                        'margin' => 'xxl',
                      ),
                      3 => 
                      array (
                        'type' => 'box',
                        'layout' => 'horizontal',
                        'margin' => 'md',
                        'contents' => 
                        array (
                          0 => 
                          array (
                            'type' => 'text',
                            'text' => 'RpdBot',
                            'size' => 'xs',
                            'color' => '#aaaaaa',
                            'flex' => 0,
                          ),
                          1 => 
                          array (
                            'type' => 'text',
                            'text' => '#2018',
                            'color' => '#aaaaaa',
                            'size' => 'xs',
                            'align' => 'end',
                          ),
                        ),
                      ),
                    ),
                  ),
                )
            )
        );
    }
}   
if($message['type']=='text') {
    if ($command == '/instagram') { 
        
        $result = instagram($options);
        $altText2 = "Followers : " . $result['a3'];
        $altText2 .= "\nFollowing :" . $result['a4'];
        $altText2 .= "\nPost :" . $result['a5'];
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Instagram @' . $options, 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result['a7'], 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => $result['a6'], 
                            'text' => $altText2, 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Check', 
                                'uri' => $result['a8'],
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
    if ($command == '/say') {

        $result = tts($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                'type' => 'audio',
                'originalContentUrl' => $result,
                'duration' => 10000,
                )
            )
        );
}
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if ($message['type'] == 'text') {
    if ($command == '/definition') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Definition : ' . urb_dict($options)
                )
            )
        );
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/ahli') { 
     
        $result = ahli($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Kamu Ahli apa?', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result['a2'], 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => $reult['a3'], 
                            'text' => $reult['a1'], 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'message', 
                                'label' => 'Done', 
                                'text' => 'Terimakasih RpdBot', 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/cooltext') {
        $result = coolt($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/zodiak') {

        $result = zodiak($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/creator') { 
     
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => '[INFO]', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://image.ibb.co/c5K17q/33727728-1041049566051644-99906234999635968-n.jpg', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'VirtualSystem TeamBots',
                            'text' => 'Creator VSB', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Contact', 
                                'uri' => 'https://line.me/ti/p/~rafly_cf', 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film-syn') {
        $result = film_syn($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array( 
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film') {

        $result = film($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/shalat') {

        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/qiblat') { 
     
        $result = qibla($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Qiblat shalat', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Qiblat Shalat', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
if($message['type']=='text') {
        if ($command == '/arti-nama') {
        $result = arti($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array( 
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Open]-------------------------#
#----------------------------------#
if($message['type']=='text') {
        if ($command == 'Help' || $command == 'help') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                      'type' => 'template',
                      'altText' => 'this is a image carousel template',
                      'template' => 
                      array (
                        'type' => 'image_carousel',
                        'columns' => 
                        array (
                          0 => 
                          array (
                            'imageUrl' => 'https://media.giphy.com/media/uo6rcjwHSAFsQ/giphy.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Instagram',
                              'text' => 'Example:\n/instagram jokowi',
                            ),
                          ),
                          1 => 
                          array (
                            'imageUrl' => 'https://rest.farzain.com/api/photofunia/neon_sign.php?text=Virtual%20SYSTEM&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Neon Teks',
                              'text' => 'Example:\n/neon Yout Text',
                            ),
                          ),
                          2 => 
                          array (
                            'imageUrl' => 'https://media.giphy.com/media/3ohc10GA6j4XrLWzZK/giphy.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'TTS',
                              'text' => 'Example:\n/say Mantap Jiwa',
                            ),
                          ),
                          3 => 
                          array (
                            'imageUrl' => 'http://bestanimations.com/HomeOffice/Clocks/clock-animated-gif-13.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Jam Indo',
                              'text' => '/jam',
                            ),
                          ),
                          4 => 
                          array (
                            'imageUrl' => 'https://media.giphy.com/media/10zxDv7Hv5RF9C/giphy.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Creator',
                              'text' => '/creator',
                            ),
                          ),
                          5 => 
                          array (
                            'imageUrl' => 'https://2.bp.blogspot.com/-rj1nxBPkzT0/UEJCW4qHsGI/AAAAAAAAAu0/6xKNlKRHi9U/s1600/perahi+kertas.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Lirik',
                              'text' => 'Example:\n/lirik asal kau bahagia',
                            ),
                          ),
                          6 => 
                          array (
                            'imageUrl' => 'https://media.giphy.com/media/l2JhGk8rR9WFLEDQY/giphy.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Music',
                              'text' => 'Example:\n/song asal kau bahagia',
                            ),
                          ),
                          7 => 
                          array (
                            'imageUrl' => 'https://media.giphy.com/media/l0DAH3NEBeYW2JFkc/giphy.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Shalat',
                              'text' => 'Example:\n/shalat Bandung',
                            ),
                          ),
                          8 => 
                          array (
                            'imageUrl' => 'https://media.giphy.com/media/l378gpi62P5nyfbSU/giphy.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Jadwal Tv',
                              'text' => 'Example:\n/jadwaltv trans7',
                            ),
                          ),
                          9 => 
                          array (
                            'imageUrl' => 'https://media.giphy.com/media/euQotCus27vQYR7wI3/giphy.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'More Command',
                              'text' => '/menu',
                            ),
                          ),
                        ),
                      ),
                    )
            )
        );
    }
}
if($message['type']=='text') {
        if ($command == '/qr') { 
     
        $result = qr($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Qr-code Generator', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Qr-code', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/neon') { 
     
        $result = neon($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Neon teks', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Teks Image Generator', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/light') { 
     
        $result = light($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Light teks', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Teks Image Generator', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
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
