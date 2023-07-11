<?php
session_start();
require __DIR__ . '\..\vendor\autoload.php';

use GuzzleHttp\Client;

$action = $_GET['action'];
$id = $_GET['id'];
$id_user = $_SESSION['id'];

//$id = $_POST['id'];
//$nama = $_POST['nama'];

if ($action=='beli') {
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:7676',
            'timeout' => 5
        ]);
        $response =  $client->request('POST', '/api/customer', [
            'json' => [
                'nik' => $_POST['nik'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'alamat' => $_POST['alamat'],
                'nomor_telepon' => $_POST['nomor_telepon'],
                'fotoktp' => $_POST['fotoktp'],
                'id_paket' => $_POST['id_paket'],
            ]
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:dashboard_user.php?module=home');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}elseif($action=='update'){
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:7676',
            'timeout' => 5
        ]);
        $response =  $client->request('PUT', '/api/customer/' . $_POST['id'], [
            'json' => [
                'nik' => $_POST['nik'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'alamat' => $_POST['alamat'],
                'nomor_telepon' => $_POST['nomor_telepon'],
                'fotoktp' => $_POST['fotoktp'],
                'id_paket' => $_POST['id_paket'],
            ]
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:dashboard_user.php?module=home');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}elseif ($action == 'batal'){
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:7676',
            'timeout' => 5
        ]);
        $response =  $client->request('DELETE', '/api/customer/' . $id , [
            'json' => []
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:dashboard_user.php?module=home');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}
?>