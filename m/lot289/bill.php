<? header("Content-type: text/html"); ?>
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