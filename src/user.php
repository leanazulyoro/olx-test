<?php

use olxtest\api\UserApi;

require_once 'init.php';

// db connection
$dblink = dbconnect();

// User Api
$api = new UserApi($dblink);

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {

  case 'GET':
    if ($uid = $_GET['uid']) {
      echo $api->get($uid);
      exit;

    }
    break;

  case 'POST':
    if(isset($_POST['id'])) {

      // get fields to upload
      $fields = array();
      foreach($_POST as $key => $value){
        if($key == 'id'){
          $uid = $value;
        } else {
          $fields[$key] = $value;
        }
      }

      // upload image
      $file = $_FILES['picture'];
      if ($file['error'] == UPLOAD_ERR_OK) {

        $tmpfile = $file['tmp_name'];
        $filename = basename($file['name']);
        $filetype = $file['type'];

        $POST_DATA = array(
          'file' => curl_file_create($tmpfile, $filetype, $filename)
        );

        // Connecting to external api via cURL
        $curl_handle = curl_init("https://api.olx.com/v1.0/users/images");
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $POST_DATA);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);

        //execute the API Call
        $response = json_decode(curl_exec($curl_handle));
        curl_close($curl_handle);

        if($response->url){
          $fields['picture'] = 'https://images01.olx-st.com/' . $response->url;
        } 

      }
    }

    echo $api->update($uid, $fields);

    break;

  case 'DELETE':
    echo $api->delete($_REQUEST['uid']);
    break;

}


