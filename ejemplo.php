<?php

//PARA VER LOS ERRORES EN TIEMPO DE EJECUCCION
ini_set('display_errors',1);
ini_set('display_status_errors',1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

//Hay que importar todas las clases
use Aws\Exception\MultipartUploadException;
use Aws\Exception\S3Exception;
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$file = 'familia.jpg';
$name = 'familia.jpg';
uploadFileToBucket($file,$name);   

header('Location: https://informatica.ieszaidinvergeles.org:10054/PIA/env/ejemplo2.php?file=' . $file . '&name=' . $name);
exit;

function uploadFileToBucket($file, $key) {
    $result = false;
    try {
        $s3 = new S3Client([
            'version'     => 'latest',
            'region'      => 'us-east-1', //depends on the value of your region
            'credentials' => [
                'key'    => $_ENV['aws_access_key_id'], 
                'secret' => $_ENV['aws_secret_access_key'],
                'token'  => $_ENV['aws_session_token']
            ]
        ]);
        $uploader = new MultipartUploader($s3, $file, [
            'bucket' => 'bucketfaces1',     
            'key'    => $key,
        ]);
        $result = $uploader->upload();
    } catch(MultipartUploadException $e) {
        //to see the message: $e->getMessage()
    } catch (S3Exception $e) {
        //to see the message: $e->getMessage()
    }
    return $result; //DEVUELVE TRUE SI FUNCIONA
}