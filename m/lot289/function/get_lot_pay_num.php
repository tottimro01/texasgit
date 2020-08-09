<?
	session_start();
	header("Content-type: application/json");

	$isCloseBig = (intval($_time) > intval($_SESSION["close_big"])) ? true : false;
	$isCloseSmall = (intval($_time) > intval($_SESSION["close_small"])) ? true : false;

	$res = array(
	'lpn1' => $_SESSION["lot_pay_num1"],
	'lpn2' => $_SESSION["lot_pay_num2"],
	'lpn3' => $_SESSION["lot_pay_num3"],
	'lpn4' => $_SESSION["lot_pay_num4"],
	'lpn5' => $_SESSION["lot_pay_num5"],
	'CloseBig' => $isCloseBig,
	'CloseSmall' => $isCloseSmall, );

	echo json_encode($res);
?>