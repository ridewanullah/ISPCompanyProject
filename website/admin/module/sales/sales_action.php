<?php
require __DIR__ . '\..\..\..\vendor\autoload.php';

use GuzzleHttp\Client;

$module =$_GET['module'];
$action = $_GET['act'];
// if(isset($_GET['id'])) {
// }
$id = $_GET['id'];

// $id = $_POST['id'];
//$name = $_POST['name'];

if ($action=='hapus') {
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:7676',
            'timeout' => 5
        ]);
        $response =  $client->request('DELETE', '/api/sales/' . $id , [
            'json' => []
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:..\..\dashboard_user.php?module=sales');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}elseif ($action=='insert') {
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:7676',
            'timeout' => 5
        ]);
        $response =  $client->request('POST', '/api/register/', [
            'json' => [
                'nip' => $_POST['nip'],
                'name' => $_POST['name'],
                'alamat' => $_POST['alamat'],
                'divisi' => $_POST['divisi'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password']
            ]
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:..\..\dashboard_user.php?module=sales');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}elseif ($action=='update') {
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:7676',
            'timeout' => 5
        ]);
        $response =  $client->request('PUT', '/api/sales/' . $_POST['id'] , [
            'json' => [
                'nip' => $_POST['nip'],
                'name' => $_POST['name'],
                'alamat' => $_POST['alamat'],
                'divisi' => $_POST['divisi'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password']
            ]
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:..\..\dashboard_user.php?module=sales');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}
?>