<?php
//ไฟล์นี้ใช้กำหนดตัว endpoint(route) ในการทำงาน CRUD กับตารางในฐานข้อมูลจาก client (web / mobile)
//ดึงข้อมูลทั้งหมด GET | smartfarmservice/sensors

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once "./../core/Request.php";
require_once "./../controller/SensorController.php";

//สร้างตัวแปรที่ใช้ทำงานกับตัว Controller ของ Sensor
$sensorController = new SensorController();

Request::handleRequest("GET", "/smartfarmservice/sensors", function () use ($sensorController) {
    $sensorController->getSensorAll();
    
});