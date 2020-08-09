<?php 
if($_GET["edit"]==1){

  $key1 = range('A', 'Z');
  $key2 = array('!','@','#','$','%','=','&');
  $key3 = array('ก','ข','ค','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฐ','ฑ','ฒ','ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ล','ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');

  $code = array_merge($key1,$key2,$key3);

  for($i=0;$i<10;$i++){
    $output = array_rand( $code , 5 );
    foreach ($output as $key => $value) {
      $num["num_".$i] .= $code[$value];
      unset($code[$value]);
    }

    $set_tb .= "num_".$i." = '".$num["num_".$i]."' , ";
  }
  foreach ($code as $key => $value) {
    $num["num_space"] .= $value;
    unset($code[$key]);
  }

  $set_tb .= "num_space = '".$num["num_space"]."'";


  $sql = "update bom_tb_keycode set $set_tb where keycode_id = 1";
  sql_query($sql);

  /*$txt44=json_encode($num);
  $url_file="../keycode/keycode.json";    
  @write($url_file ,$txt44,"w+"); */

  @header("Location: main.php?p=".$_GET['p']."&g_p=".$_GET['g_p']."&set_new_in_node=1");

  exit();
}

?>
<script src="assests/js/socket.io.js"></script>
<style type="text/css">
.info-box-number {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.filter {
    float: left;
    border-radius: 3px;
    padding: 0.15em 0.5em;
    color: #545454;
    border: 1px solid #cdcdcd;
    background: #ececec;
    margin: 2px 10px;
}
.filter.oddsTableStatus, .filter.oddsTableStatus-offline, .filter.oddsTableStatus-connecting {
  width: 44px;
  height: 23px;
  overflow: hidden;
  position: relative;
} 
.filter.oddsTableStatus::before, .filter.oddsTableStatus-offline::before, .filter.oddsTableStatus-connecting::before {
  background: url(img/connectIcon.png) no-repeat 0 0;
  content: "";
  position: absolute;
  top: -.05em;
  width: 897px;
  height: 22px;
  z-index: 1;
}

.filter.oddsTableStatus::before {
  transform: translateX(-819px);
  left: -.05em;
}

.filter.oddsTableStatus-offline {
  cursor: default;
}

.filter.oddsTableStatus-offline::before {
  transform: translateX(-857px);
  left: -.05em;
}

.filter.oddsTableStatus-offline:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting {
  cursor: default;
}

.filter.oddsTableStatus-connecting:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting::before {
  left: .15em;
  animation: playConnect 4s steps(21) infinite normal;
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000;
  -webkit-transform: translateZ(0);
}

@keyframes playConnect {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-819px);
  }
}
</style>
 <!-- Content Header (Page header) -->


<section class="content-header">
  <h1>
        <span style="display: block; float: left;">สถานะเซิร์ฟเวอร์</span>
        <div id="connect_ico" class="filter"></div>
        <span style="display: block; float: left;">Socket IP : <?=$nodejs_ip;?></span>
      </h1>

<button type="button" class="btn btn-success btn-sm sBtForm" onclick="window.location.href='main.php?p=keycodeList&g_p=keycode&edit=1'" style="margin-left: 25px;">
                           สร้างชุดรหัส
                   </button>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li class="active"> สร้างชุดรหัส </li>
  </ol>
  <div style="clear: both;"></div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box">
    <div class="table-responsive">
        <table class="table table-bordered">
          <colgroup>
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
            <col width="8%" />
          </colgroup>
          <thead>
            <tr class="bg-blue-gradient">
              <th class="text-center">เลข 0</th>
              <th class="text-center">เลข 1</th>
              <th class="text-center">เลข 2</th>
              <th class="text-center">เลข 3</th>
              <th class="text-center">เลข 4</th>
              <th class="text-center">เลข 5</th>
              <th class="text-center">เลข 6</th>
              <th class="text-center">เลข 7</th>
              <th class="text-center">เลข 8</th>
              <th class="text-center">เลข 9</th>
              <th class="text-center">ค่าว่าง</th>
            </tr>
          </thead>
          <tbody>
             <?
 $x=1;

$re=sql_page("bom_tb_keycode","keycode_id","asc",50);
while($rs=sql_fetch($re[re])){
  $num = $rs;
  ?>   
            <tr class="text-center">
              <td><?=$rs["num_0"]?></td>
              <td><?=$rs["num_1"]?></td>
              <td><?=$rs["num_2"]?></td>
              <td><?=$rs["num_3"]?></td>
              <td><?=$rs["num_4"]?></td>
              <td><?=$rs["num_5"]?></td>
              <td><?=$rs["num_6"]?></td>
              <td><?=$rs["num_7"]?></td>
              <td><?=$rs["num_8"]?></td>
              <td><?=$rs["num_9"]?></td>
              <td><?=$rs["num_space"]?></td>
            </tr>

             <? $x++;} ?>
           
          </tbody>
        </table>
    </div>

  </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">ทดสอบเข้ารหัส</h3>
      </div>
      <div class="box-body table-responsive">
        <div class="form-group col-md-6">
          <label for="txt_number">กรอกตัวเลขไม่เกิน 10 หลัก</label>
          <div class="input-group">
            <input type="text" maxlength="10" class="form-control" id="txt_number" onkeypress='validate(event)'>
            <span class="input-group-btn">
              <button type="button" class="btn btn-info btn-flat" onclick="$('#txt_result').val(bee_encode($('#txt_number').val() , num));">ตกลง</button>
            </span>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="txt_result">ผลลัพธ์</label>
          <input type="text" class="form-control" id="txt_result" readonly="readonly">
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">ทดสอบถอดรหัส</h3>
      </div>
      <div class="box-body table-responsive">
        <div class="form-group col-md-6">
          <label for="txt_encode">กรอกขอมูลเข้ารหัส</label>
          <div class="input-group">
            <input type="text" class="form-control" id="txt_encode">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info btn-flat" onclick="$('#txt_decode').val(bee_decode($('#txt_encode').val() , num));">ตกลง</button>
            </span>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="txt_decode">ผลลัพธ์</label>
          <input type="text" class="form-control" id="txt_decode" readonly="readonly">
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
  $(() => {
      var socket = io.connect('<?=$nodejs_ip;?>', { secure: true , reconnect: true});

      socket.emit('check_user_xyz');

      socket.on("connect", function(){
          console.log("connected");
          $("#connect_ico").removeClass("oddsTableStatus-offline");
          $("#connect_ico").addClass("oddsTableStatus-connecting");
      });

      socket.on("disconnect", function(){
          //console.log("disconnected");
          $("#connect_ico").removeClass("oddsTableStatus-connecting");
          $("#connect_ico").addClass("oddsTableStatus-offline");
      });

      <? if($_GET["set_new_in_node"]==1){ ?>
        socket.emit('get_keycode');
        window.history.replaceState({}, document.title, "/" + "main.php?p=keycodeList&g_p=keycode");
      <? } ?>

      //socket.emit('check_user', { "token": "<?=$_SESSION[m_tokenx]?>", "mid": "<?=$_SESSION[mid]?>" , "site":document });
      
      socket.on("error", console.error);
  });





function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
  var num = {};
<?
for($i=0;$i<=10;$i++){
  if($i==10){
    $kn = "space";
  }else{
    $kn = $i;
  }
  ?>
  num["num_<?=$kn?>"] = "<?=$num["num_".$kn]?>";
  <?
}
?>




function bee_encode(n , num){
  var ar_mid = n.split("");
  var encode = "";
  /*########################เข้ารหัส########################*/
  for(var i=0;i<(10-ar_mid.length);i++){
    var ar_c = num["num_space"].split("");
    var rand = ar_c[Math.floor(Math.random() * ar_c.length)];
    encode += rand;
  }
  for (var key in ar_mid) {
    var ar_c = num["num_"+ar_mid[key]].split("");
    var rand = ar_c[Math.floor(Math.random() * ar_c.length)];
    encode += rand;
  }
  return encode;
  /*######################################################*/
}


function bee_decode(encode , num){
  var decode = "";
  /*########################ถอดรหัส########################*/
  var ar_encode = encode.split("");
  for (var key in ar_encode) {
    for(var i=0;i<=10;i++){
      if(i==10){
        var kn = "space";
      }else{
        var kn = i;
      }
      var ar_c = num["num_"+kn].split("");
      if(ar_c.indexOf(ar_encode[key]) != -1){
        if(i!=10){
          decode += ""+i;
        }
      }
    }
  }
  return decode;
  /*######################################################*/
}
</script>