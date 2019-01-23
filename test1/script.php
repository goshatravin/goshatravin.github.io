<?php 

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
         $queryUrl = 'https://currate.ru/api/?get=rates&date=%'.$_POST['date'].'&pairs=USDRUB,EURRUB&key=d4f39ddc37d95e298b02cbbe68dee11c';
         // $queryData = http_build_query(array());
        
         $curl = curl_init();
         curl_setopt_array($curl, array(
             CURLOPT_SSL_VERIFYPEER => 0,
             CURLOPT_POST => 1,
             CURLOPT_HEADER => 0,
             CURLOPT_RETURNTRANSFER => 1,
             CURLOPT_URL => $queryUrl,
             //CURLOPT_POSTFIELDS => $queryData,
         ));
 
         $result = curl_exec($curl);
         curl_close($curl);
         $stuff = (json_decode($result,1));
         $currency = $stuff['data']['USDRUB'];
 
         $image = new Imagick();
         $draw = new ImagickDraw();
         $pixel = new ImagickPixel( 'gray' );
         $image->newImage(800, 75, $pixel);
         $draw->setFillColor('black');
        //  $draw->setFont('arial');
         $draw->setFontSize( 30 );
         $textPic =  $_POST['date'].'      '.$currency;
         $image->annotateImage($draw, 10, 45, 0, $textPic);
         $image->setImageFormat('png');
 
         if (array_key_exists('saved', $_POST)) {
 
                 $queryUrl = 'https://b24-ki9zzw.bitrix24.ru/rest/1/23kg9d5nhptmzbsm/log.blogpost.add.json';
                 $queryData = http_build_query(
                 array(
                     "USER_ID" => 1,
                     "POST_MESSAGE" => $_POST['date'].' '. $currency,
                     "FILES" => [
                         'fileData' => [
                         'image.png',
                               base64_encode($image),
                         ]
                     ],  
                 )
             );
             $curl = curl_init();
             curl_setopt_array($curl, array(
                 CURLOPT_SSL_VERIFYPEER => 0,
                 CURLOPT_POST => 1,
                 CURLOPT_HEADER => 0,
                 CURLOPT_RETURNTRANSFER => 1,
                 CURLOPT_URL => $queryUrl,
                 CURLOPT_POSTFIELDS => $queryData,
             ));
 
             $result = curl_exec($curl);
             curl_close($curl);
 
             return json_decode($result, true);
         };
       
 ?>