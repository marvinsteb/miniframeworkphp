<?php
use App\Http\Request;
require_once(__DIR__."/../vendor/autoload.php");
$request = new Request();
$request->send(); 
?>