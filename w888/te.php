<?
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;

require 'vendor/autoload.php';

$url = "http://www.sbobet.bid:3002";
$array = get_headers($url);
$string = $array[0];
if(strpos($string,"404")){
    $client = new Client(new Version1X($url));
	$arr = array();
	$client->initialize();
	$arr["listLot"][0] = ['lot_type' => '1','play_number' => '324','d' => '06-11-2015','b' => 1,'rob' => 1];
	$arr["listLot"][1] = ['lot_type' => '1','play_number' => '731','d' => '06-11-2015','b' => 1,'rob' => 1];
	$client->emit('broadcast', $arr);
	$client->close();
}
?>