<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_th.js?v=2019"></script>
<style>
body {
	margin:0px;
	padding:0px;
	background:#ECE9D8;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
.txt {
	height: 14px;
	outline:none;
	width:100px;
}
</style>
<script>
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"yy-mm-dd"
    });
  });

  </script>
  <style>
  .ui-datepicker-trigger {
	   vertical-align: bottom !important;
	   cursor:pointer;
	 }
  </style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="height:20px; padding:5px 0px 0px 0px;"><strong>เลือกลีก : </strong><select style="min-width:200px;">
              <option value="1"></option>
            </select>&nbsp;&nbsp;
            <strong>วันที่ : </strong><input name="tdd" type="text" class="datepicker txtq2" id="tdd" value="" size="15" readonly required>
            </td>
  </tr>
  <tr>
    <td><hr></td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="center"><strong>เจ้าบ้าน</strong></td>
    <td align="center"><strong>ทีมต่อ</strong></td>
    <td align="center"><strong>ทีมเยือน</strong></td>
    <td align="center"><strong>เวลา</strong></td>
    <td align="center"><strong>ปิดคู่ก่อนเตะ</strong></td>
    <td align="center"><strong>Live</strong></td>
    <td align="center"><strong>ราคา2</strong></td>
    <td align="center"><strong>1stH</strong></td>
    <td align="center"><strong>TV</strong></td>
    <td align="center"><strong>หมายเหตุ</strong></td>
    <td rowspan="7" width="1%">&nbsp;</td>
    <td rowspan="5">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><select style="min-width:150px;">
              <option value="1"></option>
            </select></td>
    <td><input type="radio" checked><input type="radio"></td>
    <td><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td><input type="text" size="7"></td>
    <td><input type="checkbox" checked></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="text" size="10"></td>
    <td><input type="text" size="10"></td>
    </tr>
  <tr align="center">
    <td><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td><input type="radio" checked><input type="radio"></td>
    <td><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td><input type="text" size="7"></td>
    <td><input type="checkbox" checked></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="text" size="10"></td>
    <td><input type="text" size="10"></td>
    </tr>
  <tr align="center">
    <td><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td><input type="radio" checked><input type="radio"></td>
    <td><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td><input type="text" size="7"></td>
    <td><input type="checkbox" checked></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="text" size="10"></td>
    <td><input type="text" size="10"></td>
    </tr>
  <tr align="center">
    <td><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td><input type="radio" checked><input type="radio"></td>
    <td><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td><input type="text" size="7"></td>
    <td><input type="checkbox" checked></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="text" size="10"></td>
    <td><input type="text" size="10"></td>
    </tr>
  <tr>
    <td align="center"><select style="min-width:150px;">
              <option value="1"></option>
            </select></td>
    <td align="center"><input type="radio" checked><input type="radio"></td>
    <td align="center"><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td align="center"><input type="text" size="7"></td>
    <td align="center"><input type="checkbox" checked></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="text" size="10"></td>
    <td align="center"><input type="text" size="10"></td>
    <td><button>บันทึก</button></td>
  </tr>
  <tr>
    <td align="center"><select style="min-width:150px;">
              <option value="1"></option>
            </select></td>
    <td align="center"><input type="radio" checked><input type="radio"></td>
    <td align="center"><select style="min-width:150px;">
              <option value="1"></option>
          </select></td>
    <td align="center"><input type="text" size="7"></td>
    <td align="center"><input type="checkbox" checked></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="text" size="10"></td>
    <td align="center"><input type="text" size="10"></td>
    <td><button onClick="parent.document.getElementById('frameset2').rows='24,*,0'; ">ปิด</button></td>
  </tr>
</table>
    </td>
  </tr>
</table>
</body>
</html>