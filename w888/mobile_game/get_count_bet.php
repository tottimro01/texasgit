<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('../inc/conn.php');
require('../inc/function.php');
require('../games/function.php');
require('cache/cache.php');
$count_fake = true;
$ary_item;


// bacarat
$url_1 = '../games/bacarat/json/count_bet.txt';
$url_2 = '../games/bacarat/json/count_fake.txt';

// $_get_url = ($count_fake == false ? $url_1 : $url_2);
$url_file= $url_1;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['bacarat_count'] = $date2_bet;

$url_file= $url_2;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['bacarat_count_fake'] = $date2_bet;


//hilo
$url_1 = '../games/hilo/json/count_bet.txt';
$url_2 = '../games/hilo/json/count_fake.txt';

$url_file= $url_1;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['hilo'] = $date2_bet;

$url_file= $url_2;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['hilo_fake'] = $date2_bet;

//fish
$url_1 = '../games/fish/json/count_bet.txt';
$url_2 = '../games/fish/json/count_fake.txt';

$url_file= $url_1;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['fish'] = $date2_bet;

$url_file= $url_2;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['fish_fake'] = $date2_bet;

//2hit
$url_1 = '../games/2hit/json/count_bet.txt';
$url_2 = '../games/2hit/json/count_fake.txt';

$url_file= $url_1;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['2hit'] = $date2_bet;

$url_file= $url_2;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['2hit_fake'] = $date2_bet;

//dragon
$url_1 = '../games/dragon/json/count_bet.txt';
$url_2 = '../games/dragon/json/count_fake.txt';

$url_file= $url_1;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['dragon'] = $date2_bet;

$url_file= $url_2;
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$ary_item['dragon_fake'] = $date2_bet;


 $json = json_encode($ary_item);
   echo $json;
// print_r($ary_item);




 ?>


					