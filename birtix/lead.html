<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?
/**
 * Write data to log file.
 *
 * @param mixed $data
 * @param string $title
 *
 * @return bool
 */
function writeToLog($data, $title = '') {
 $log = "\n------------------------\n";
 $log .= date("Y.m.d G:i:s") . "\n";
 $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
 $log .= print_r($data, 1);
 $log .= "\n------------------------\n";
 file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);
 return true;
}

$defaults = array('first_name' => '', 'last_name' => '', 'phone' => '', 'email' => '','file' => '','date' => '');
$file = $_REQUEST['file'];
if (array_key_exists('saved', $_REQUEST)) {
 $defaults = $_REQUEST;
 writeToLog($_REQUEST, 'webform');

 $queryUrl = 'https://b24-ki9zzw.bitrix24.ru/rest/1/mfrhqvm4u23ai2wx/crm.lead.add.json';
 $queryData = http_build_query(array(
 'fields' => array(
 "TITLE" => $_REQUEST['first_name'].' '.$_REQUEST['last_name'],
 "NAME" => $_REQUEST['first_name'],
 "LAST_NAME" => $_REQUEST['last_name'],
 "UF_CRM_1548072349" => $_REQUEST['date'],
  "UF_CRM_1548069865" => [
    $_FILES['file'],
    base64_encode(file_get_contents($_FILES['file']['tmp_name']) ),
  ],
 "STATUS_ID" => "NEW",
 "OPENED" => "Y",
 "ASSIGNED_BY_ID" => 1,
 "PHONE" => array(array("VALUE" => $_REQUEST['phone'], "VALUE_TYPE" => "WORK" )),
 "EMAIL" => array(array("VALUE" => $_REQUEST['email'], "VALUE_TYPE" => "WORK" )),
 ),
 'params' => array("REGISTER_SONET_EVENT" => "Y")
 ));
 echo var_dump($_FILES['file']['tmp_name']);
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

 $result = json_decode($result, 1);
 writeToLog($result, 'webform result');

 if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."
";
}


?>
<form method="post" action="" enctype="multipart/form-data">
    Имя: <input type="text" name="first_name" size="15" value="<?=$defaults['first_name']?>"><br/>
    Фамилия: <input type="text" name="last_name" size="15" value="<?=$defaults['last_name']?>"><br/>
    Телефон: <input type="phone" name="phone" value="<?=$defaults['phone']?>"><br/>

    E-mail: <input type="email" name="email" value="<?=$defaults['email']?>"><br/>
    Фотография от клиента: <input type="file" name="file" value="<?=$defaults['fileй']?>"><br/>
     дата <input type="date" name="date" value="<?=$defaults['date']?>"><br/>
    <input type="hidden" name="saved" value="yes">
    <input type="submit" value="Отправить">
</form>
 
</body>
</html>
