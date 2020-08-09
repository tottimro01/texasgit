<?
################OPEN BET LOTTO 
$url_file="../../../json/lotto.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode($op_js, true);
if($jsop["open"]==1){
#echo "<center><br><h3 style='color:#F00;'>ปิดรับพนัน</h3></center>";
	
?>
<link rel="stylesheet" href="" >
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css?v=<?=time()?>">
<div style="overflow-y: auto; margin-bottom: 60px;" id="data_list">
	
</div>
<div class="modal fade" id="lot3success" tabindex="-1" role="dialog" aria-labelledby="lot3successLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-height:80vh; overflow-y:scroll;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:goldenrod">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title thaisan" id="lot3successLabel"><!-- บันทึกเสร็จสิ้น --><?=$lang_saveMessage;?></h4>
      </div>
      <div class="modal-body" style="color:#333333">
      <div class="row">
        	<div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px"><!-- ประเภท --><?=$lang_type;?></span></div>
          <div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px"><!-- เลข --><?=$lang_number;?></span></div>
          <div class="col-xs-4" align="center"><span class="badge thaisan" style="font-size:14px"><!-- สถานะ --><?=$lang_status;?></span></div>
          </div>
          <div class="row" id="statussave">
          
          </div>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).ready(function($) 
	{
		load_page_list();
		var _table = $('.table-template');
		$.each(_table, function(index, val) 
		{
			var _h = $(this).children('table').children('tbody').children('tr').eq(0).height() + 
				$(this).children('table').children('tbody').children('tr').eq(1).height();
			var init_h = $(this).height();
			$(this).height(init_h);
			$(this).attr('data-maxHeight', init_h);
			$(this).attr('data-minHeight', _h);
		});

		$('.table-template table tbody tr th').on('click', '.arrow', function(event) {
			//console.log('click')
			event.preventDefault();
			var _parent = $(this).parent('th').parent('tr').parent('tbody').parent('table').parent('.table-template');
			//console.log(_parent)
			var minH = $(_parent).attr('data-minHeight');
			var maxH = $(_parent).attr('data-maxHeight');

			if ($(_parent).height() > minH)
			{
				$(_parent).height(minH);
				$(this).html("&#8744;");
			}else {
				$(_parent).height(maxH);
				$(this).html("&#8743;");
			}
		});

		setTimeout(countdown, 1000);
		// countdown();
	});


	var timer = 10;
	function countdown () 
	{
		var timeStr = timer.toString().length <= 1 ? "0"+timer.toString() : timer.toString();
		$('.countdown').html(timeStr);
		timer -= 1;

		//countdown to 0
		if(timer < 0)
		{
			load_page_list()
			timer = 10;
		}
		setTimeout(countdown, 1000);
	}

</script>




<script>
function load_page_list(){
	set_html_call({}, "../ajax/load_page_list.php", "#data_list" , function(data) {
	});
}
function save_data(e , btn){
	$("#"+btn).hide();
	set_process(e, "../ajax/save_lotto_false.php", function(data) {
		if (data.res == 1) {
			$("#statussave").html(data.txt);
			$('#lot3success').modal('show');
			load_page_list();
			//parent.leftx.get_credit();
			//parent.leftx.result_save(data.txt);
			//window.location.href = "main_lotto.php?tlot=lottofalse&vvw=0";
		}else if(data.res == 99){
			alert(data.msg);
			$("#"+btn).show();
		}else{
			$("#statussave").html(data.txt);
			$('#lot3success').modal('show');
			load_page_list()
			//parent.leftx.result_save(data.txt);
			$("#"+btn).show();
		}
	});
	return false; 
}
function set_process(set_data , set_url , callback){
  $.ajax({
        type: "POST",
        url: set_url,
        data: new FormData( set_data ),
        processData: false,
        contentType: false,
        dataType:"json",
        cache: false, // Clear cache IE
        beforeSend: function(){
          $(".loader").show();
        },
        success: function(data){
          $(".loader").hide();
          callback(data);
        }
      });
}
function set_html_call(set_id , set_url , element , callback){
  $.ajax({
        type: "POST",
        url: set_url,
        data: set_id,
        cache: false, // Clear cache IE
        beforeSend: function(){
          $(".loader").show();
        },
        success: function(data){
          $(".loader").hide();
          $(element).html(data);
          callback();
        }
      });
}
</script>

<?  
}
?>


