<?
	function checkLottoClose($idx) {
		if(floatval($_SESSION["lot_pay_num1"][$idx]) <= 0.0 || floatval($_SESSION["lot_pay_num2"][$idx]) <= 0.0 || floatval($_SESSION["lot_pay_num3"][$idx]) <= 0.0 || 	floatval($_SESSION["lot_pay_num4"][$idx]) <= 0.0 || floatval($_SESSION["lot_pay_num5"][$idx]) <= 0.0) {
			return false;
		}
	
		return true;
	}

	$date = new DateTime();
	$_time = $date->getTimestamp();

	$isCloseBig = (intval($_time) > intval($_SESSION["close_big"])) ? true : false;
	$isCloseSmall = (intval($_time) > intval($_SESSION["close_small"])) ? true : false;
?>