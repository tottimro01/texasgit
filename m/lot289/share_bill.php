<? 
  session_start();
  include "function/site-data.php";
  include "function/checkLang.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <? if(isset($_POST["bill_bid"]) && !empty($_POST["bill_bid"]) && isset($_POST["bill_status"]) && !empty($_POST["bill_status"]) && $_POST["bill_status"] == '1') { ?>
    <title><?=$lang_data["detail_bill"]." ".$_POST["bill_bid"];?></title>
  <? }else { ?>
    <title><?=$lang_data["fail"];?></title>
  <? } ?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="library/html2canvas.min0.4.1.js?v=1001"></script>
	<script src="library/js/bill.js?v=<?=time();?>"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="library/css/bill-style.css">

</head>
<body>
	<div id="bill-img" class="bill-img"><img src="" alt=""></div>
	<div class="bill-result-wrapper" data-bid=<?="bill".$_POST["bill_bid"];?>>
		<div class="bill-result-top">
      <? if($_POST["bill_status"] == "1") { ?>
        <div class="bet-result-top-section">
          <div class="bet-result-top-info info" style="font-weight: 600;"><?=$_POST["bill_info"];?></div>
          <div class="bet-result-top-info lesson" style="font-weight: 600;"><?=$_POST["bill_lesson"];?></div>
          <div class="bet-result-top-info datetime"><?=$_POST["bill_datetime"];?></div>
          <? if(isset($_POST["bill_uname"]) && !empty($_POST["bill_uname"]) && isset($_POST["bill_poy"]) && !empty($_POST["bill_poy"])) { ?>
            <div class="bet-result-top-info uname"><?=$_POST["bill_uname"]."     ".$_POST["bill_poy"];?></div>
          <? } ?>
        </div>
        <div class="bet-result-top-section">
          <div class="bet-result-top-info branch"><?=$_POST["bill_branch"];?></div>
          <div class="bet-result-top-info saler"><?=$_POST["bill_saler"];?></div>
        </div>
        <? } ?>
		</div>
		<div class="bill-result-body">
			<div class="bill-result">
				<?
          if($_POST["bill_status"] == "1") { //แทงสำเร็จ
            if(isset($_POST["bill_list"]) && !empty($_POST["bill_list"]))
            {
              $bill_data = $_POST["bill_list"];
              $bill_data = json_decode($bill_data,true);

				      for ($i=0; $i < count($bill_data); $i++) { 
                $class = ($bill_data[$i]["status"] == "1") ? "success" : "fail";
              ?>
              <div class=<?=$class;?>><?=$bill_data[$i]["txt"];?></div>
              <?
              }
            }
          }else { //แทงไม่สำเร็จ
            if(isset($_POST["bill_msg"]) && !empty($_POST["bill_msg"]))
            {
              $msg = preg_split( '/\r\n|\r|\n/', $_POST["bill_msg"]);
              for ($i=0; $i < count($msg); $i++) { 
              ?>
              <div class='fail'><?=$msg[$i];?></div>
              <?
              }
            }
          }
				?>
			</div>
		</div>
    <div class="bill-result-bottom">
      <? if(isset($_POST["bill_total"]) && !empty($_POST["bill_total"])) { ?>
        <div><?=$_POST["bill_total"];?></div>
      <? } ?>
    </div>
	</div>

</body>
</html>