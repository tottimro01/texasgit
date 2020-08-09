<?
header("Content-type: text/json");

$lang = $_GET['lang'];
$mid = $_GET['mid'];

$arr["ok"] = "ตกลง";
$arr["cancel"] = "ยกเลิก";
$arr["logout"] = "ออกจากระบบ";
$arr["select_games"] = "เลือกเกมส์";
$arr["months_f1"] ="มกราคม";
$arr["months_f2"] ="กุมภาพันธ์";
$arr["months_f3"] ="มีนาคม";
$arr["months_f4"] ="เมษายน";
$arr["months_f5"] ="พฤษภาคม";
$arr["months_f6"] ="มิถุนายน";
$arr["months_f7"] ="กรกฎาคม";
$arr["months_f8"] ="สิงหาคม";
$arr["months_f9"] ="กันยายน";
$arr["months_f10"] ="ตุลาคม";
$arr["months_f11"] ="พฤศจิกายน";
$arr["months_f12"] ="ธันวาคม";
$arr["months_s1"] ="ม.ค";
$arr["months_s2"] ="ก.พ";
$arr["months_s3"] ="มี.ค";
$arr["months_s4"] ="เม.ย";
$arr["months_s5"] ="พ.ค";
$arr["months_s6"] ="มิ.ย";
$arr["months_s7"] ="ก.ค";
$arr["months_s8"] ="ส.ค";
$arr["months_s9"] ="ก.ย";
$arr["months_s10"] ="ต.ค";
$arr["months_s11"] ="พ.ย";
$arr["months_s12"] ="ธ.ค";
$arr["monday"] ="จ.";
$arr["tuesday"] ="อ.";
$arr["wednesday"] ="พ.";
$arr["thursday"] ="พฤ.";
$arr["friday"] ="ศ.";
$arr["saturday"] ="ส.";
$arr["sunday"] ="อา.";
echo json_encode($arr);
?>
