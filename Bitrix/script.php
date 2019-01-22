<?  
    //operation 'find custom field'
    
    $queryUrl = 'https://b24-ki9zzw.bitrix24.ru/rest/1/mfrhqvm4u23ai2wx/crm.lead.fields';
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


    // echo '<pre>';
    // echo print_r($result);
    // echo print_r(json_decode($result, true));
    // echo '<pre>';


    if (array_key_exists('send', $_REQUEST)) {
    $def = $_REQUEST;

    $queryUrl = 'https://b24-ki9zzw.bitrix24.ru/rest/1/mfrhqvm4u23ai2wx/crm.lead.add.json';
    $queryData = http_build_query(array(
    'fields' => array(
    "TITLE" => $_POST['first_name'],
    "NAME" => $_POST['first_name'],
    // "UF_CRM_1548072349" => $_REQUEST['date'],
    "UF_CRM_1548069865" => [
        'fileData' => [
            $_FILES['filename']['name'],
            base64_encode(file_get_contents($_FILES['filename']['tmp_name']) ),
        ]
    ],
    "STATUS_ID" => "NEW",
    "OPENED" => "Y",
    "ASSIGNED_BY_ID" => 1,
    "PHONE" => array(array("VALUE" => $_POST['phone'], "VALUE_TYPE" => "WORK" )),
    "EMAIL" => array(array("VALUE" => $_POST['email'], "VALUE_TYPE" => "WORK" )),
 ),
    'params' => array("REGISTER_SONET_EVENT" => "Y")
    ));
    echo 'отправленно'.var_dump($_FILES['filename']['tmp_name']);

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

    if (array_key_exists('error', $result)) echo "Error: ".$result['error_description']."
    ";
}


?>