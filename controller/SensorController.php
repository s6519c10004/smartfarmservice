<?php
require_once "./../config/Database.php"; // จัดการติดต่อฐานข้อมูล
require_once "./../model/Sensor.php"; // จัดการการทำงาน CRUD กับตารางในฐานข้อมูล
require_once "./../core/Response.php"; // จัดการการส่งข้อมูลกลับไปยัง Client (Web / Mobile)

class SensorController {
    private $db;
    private $sensor;

    public function __construct() {
        $this->db = new Database(); // สร้างตัวแปร $db เพื่อเชื่อมต่อฐานข้อมูล
        $this->sensor = new Sensor($this->db->connect()); // สร้างตัวแปร $sensor เพื่อทำงาน CRUD กับตารางในฐานข้อมูล
    }

    public function getSensorAll() {
        $result = $this->sensor->getSensorAll(); //ดึงข้อมูล Sensor ทั้งหมดจาก Sensor_tb
        $this->sendResponseFromResult($result); // ใช้แบบนี้กรณีที่การส่งค่ากลับมีมากกว่า 1 รายการ
    }

    //ใช้ในกรณีที่การส่งค่ากลับมีมากกว่า 1 รายการ /แถว/คอลั่ม/ข้อมูล
    private function sendResponseFromResult($result) {
        $num = $result->rowCount();
        if ($num > 0) {
            $sensors_arr = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $sensors_arr[] = $row;
            }
            Response::sendResponse(200, $sensors_arr);
        } else {
            Response::sendResponse(404, ["message" => "No data found"]);
        }
    }
}