
    <style type="text/css">
    @media (max-width: 990px) { 
        .form-group div,label{
          padding-top: 5px;
        }
    }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="relodUStatus">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> สถานะสมาชิก </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload">
                    <i class="ace-icon fa fa-refresh"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form class="form-horizontal" id="userReturnForm">
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-1 no-padding-right" for="fuser">ชื่อผู้ใช้:</label>
                                <div class="col-xs-12 col-sm-3">
                                    <input type="text" id="fuser" name="fuser" class="col-xs-12 col-sm-12" placeholder="ชื่อผู้ใช้">
                                </div>
                                <div class="col-xs-6 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" name="fuactive" onchange="getUStatus(1,1);">
                                        <option value="Y">ปกติ</option>
                                        <option value="B">ปิดเบ็ต</option>
                                        <option value="N">ล็อค</option>
                                        <option value="A">ทั้งหมด</option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" name="futype" onchange="getUStatus(1,1);">
                                        <option value="M">สมาชิก</option>
                                        <option value="A">เอเย่นต์</option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-2">
                                    <select class="form-control col-xs-12 col-sm-6 input-sm" name="list_sort" onchange="getUStatus(1,1);">
                                        <option value="1">เรียงตามวันที่สร้าง มาก-&gt;น้อย</option>
                                        <option value="2">เรียงตามวันที่สร้าง น้อย-&gt;มาก</option>
                                        <option value="3">เรียงตามชื่อ มาก-&gt;น้อย</option>
                                        <option value="4">เรียงตามชื่อ น้อย-&gt;มาก</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn_search">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        ค้นหา                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="widget-box">
                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <div class="table-responsive">
                                        <table id="tb_userstatus" class="table table-striped table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3" class="center">ลำดับ </th>
                                                    <th rowspan="3" class="center">แก้ไข </th>
                                                    <th rowspan="3"> ชื่อผู้ใช้ </th>
                                                    <th colspan="12"><center>สถานะ</center></th>
                                                </tr>
                                                <tr>
                                                                                                                                                                        <th>
                                                                <span class="lbl"> สเต็ป </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> บอลวันนี้ </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> บอลสด </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> กีฬาวันนี้ </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> กีฬาสด </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> เกมส์ </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> คาสิโน </span>
                                                            </th>
                                                                                                                    <!-- <th>
                                                                <span class="lbl"> ล็อตเตอร์รี่ </span>
                                                            </th> -->
                                                                                                                    <th>
                                                                <span class="lbl"> หวย </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> หวยหุ้น </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> หวยชุด </span>
                                                            </th>
                                                                                                                    <th>
                                                                <span class="lbl"> โอนเงิน </span>
                                                            </th>
                                                                                                                                                            </tr>
                                            </thead>
                                            <tbody><tr><td>1</td><td><div class="ace-settings-item"><input type="checkbox" class="ace ace-checkbox-2" onchange="ckEdit(&quot;mmaxPa04&quot;);" id="mmaxPa04"><label class="lbl" for="ace-settings-navbar"></label></div></td><td class="text-left"><strong> mmaxPa04 </strong>(ตึ๋ง)</td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_step_active" name="step_active" disabled="disabled" onchange="setSl('step_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_soccer_today_active" name="soccer_today_active" disabled="disabled" onchange="setSl('soccer_today_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_soccer_live_active" name="soccer_live_active" disabled="disabled" onchange="setSl('soccer_live_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_sport_today_active" name="sport_today_active" disabled="disabled" onchange="setSl('sport_today_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_sport_live_active" name="sport_live_active" disabled="disabled" onchange="setSl('sport_live_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_game_active" name="mmaxPa04_game_active" disabled="disabled" onchange="setSl('game_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_casino_active" name="casino_active" disabled="disabled" onchange="setSl('casino_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_lottery_active" name="lottery_active" disabled="disabled" onchange="setSl('lottery_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_lotto_active" name="lotto_active" disabled="disabled" onchange="setSl('lotto_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_lotto_share_active" name="lotto_share_active" disabled="disabled" onchange="setSl('lotto_share_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_lotto_lao_active" name="lotto_lao_active" disabled="disabled" onchange="setSl('lotto_lao_active',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa04" id="mmaxPa04_transfer_money" name="transfer_money" disabled="disabled" onchange="setSl('transfer_money',&quot;mmaxPa04&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td></tr><tr><td>2</td><td><div class="ace-settings-item"><input type="checkbox" class="ace ace-checkbox-2" onchange="ckEdit(&quot;mmaxPa03&quot;);" id="mmaxPa03"><label class="lbl" for="ace-settings-navbar"></label></div></td><td class="text-left"><strong> mmaxPa03 </strong>(ดรีม)</td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_step_active" name="step_active" disabled="disabled" onchange="setSl('step_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_soccer_today_active" name="soccer_today_active" disabled="disabled" onchange="setSl('soccer_today_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_soccer_live_active" name="soccer_live_active" disabled="disabled" onchange="setSl('soccer_live_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_sport_today_active" name="sport_today_active" disabled="disabled" onchange="setSl('sport_today_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_sport_live_active" name="sport_live_active" disabled="disabled" onchange="setSl('sport_live_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_game_active" name="mmaxPa03_game_active" disabled="disabled" onchange="setSl('game_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_casino_active" name="casino_active" disabled="disabled" onchange="setSl('casino_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_lottery_active" name="lottery_active" disabled="disabled" onchange="setSl('lottery_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_lotto_active" name="lotto_active" disabled="disabled" onchange="setSl('lotto_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_lotto_share_active" name="lotto_share_active" disabled="disabled" onchange="setSl('lotto_share_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_lotto_lao_active" name="lotto_lao_active" disabled="disabled" onchange="setSl('lotto_lao_active',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa03" id="mmaxPa03_transfer_money" name="transfer_money" disabled="disabled" onchange="setSl('transfer_money',&quot;mmaxPa03&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td></tr><tr><td>3</td><td><div class="ace-settings-item"><input type="checkbox" class="ace ace-checkbox-2" onchange="ckEdit(&quot;mmaxPa02&quot;);" id="mmaxPa02"><label class="lbl" for="ace-settings-navbar"></label></div></td><td class="text-left"><strong> mmaxPa02 </strong>(บอม)</td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_step_active" name="step_active" disabled="disabled" onchange="setSl('step_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_soccer_today_active" name="soccer_today_active" disabled="disabled" onchange="setSl('soccer_today_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_soccer_live_active" name="soccer_live_active" disabled="disabled" onchange="setSl('soccer_live_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_sport_today_active" name="sport_today_active" disabled="disabled" onchange="setSl('sport_today_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_sport_live_active" name="sport_live_active" disabled="disabled" onchange="setSl('sport_live_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_game_active" name="mmaxPa02_game_active" disabled="disabled" onchange="setSl('game_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_casino_active" name="casino_active" disabled="disabled" onchange="setSl('casino_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_lottery_active" name="lottery_active" disabled="disabled" onchange="setSl('lottery_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_lotto_active" name="lotto_active" disabled="disabled" onchange="setSl('lotto_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_lotto_share_active" name="lotto_share_active" disabled="disabled" onchange="setSl('lotto_share_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_lotto_lao_active" name="lotto_lao_active" disabled="disabled" onchange="setSl('lotto_lao_active',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa02" id="mmaxPa02_transfer_money" name="transfer_money" disabled="disabled" onchange="setSl('transfer_money',&quot;mmaxPa02&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td></tr><tr><td>4</td><td><div class="ace-settings-item"><input type="checkbox" class="ace ace-checkbox-2" onchange="ckEdit(&quot;mmaxPa01&quot;);" id="mmaxPa01"><label class="lbl" for="ace-settings-navbar"></label></div></td><td class="text-left"><strong> mmaxPa01 </strong>(บอม)</td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_step_active" name="step_active" disabled="disabled" onchange="setSl('step_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_soccer_today_active" name="soccer_today_active" disabled="disabled" onchange="setSl('soccer_today_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_soccer_live_active" name="soccer_live_active" disabled="disabled" onchange="setSl('soccer_live_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_sport_today_active" name="sport_today_active" disabled="disabled" onchange="setSl('sport_today_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_sport_live_active" name="sport_live_active" disabled="disabled" onchange="setSl('sport_live_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_game_active" name="mmaxPa01_game_active" disabled="disabled" onchange="setSl('game_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_casino_active" name="casino_active" disabled="disabled" onchange="setSl('casino_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_lottery_active" name="lottery_active" disabled="disabled" onchange="setSl('lottery_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_lotto_active" name="lotto_active" disabled="disabled" onchange="setSl('lotto_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_lotto_share_active" name="lotto_share_active" disabled="disabled" onchange="setSl('lotto_share_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_lotto_lao_active" name="lotto_lao_active" disabled="disabled" onchange="setSl('lotto_lao_active',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td><td><select class="form-control col-xs-12 col-sm-4 input-sm sl_mmaxPa01" id="mmaxPa01_transfer_money" name="transfer_money" disabled="disabled" onchange="setSl('transfer_money',&quot;mmaxPa01&quot;);"><option value="N"> ไม่ </option><option value="Y" selected=""> ใช่ </option></select></td></tr></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        getUStatus(1,1);
    });

    function ckEdit(id){
        if($('#'+id).is(':checked')) {
            $('.sl_'+id).removeAttr('disabled');
        }else{
            $('.sl_'+id).attr('disabled','disabled');
        }
    }

    $('#btn_search').on('click',function(e){
        getUStatus(1,1);
    });
    
    function getUStatus(page,no){
        $('#relodUStatus').load('show');
        var table = "";

        $.ajax({
            url: 'memberUserStatus/search.php',
            type: 'POST',
            dataType: 'json',
            data: {
                _token      : $('input[name=_token]').val(),
                fuser       : $('input[name=fuser]').val(),
                fuactive    : $('select[name=fuactive]').val(),
                futype      : $('select[name=futype]').val(),
                list_sort   : $('select[name=list_sort]').val(),
                page        : page
            },
        })
        .done(function(response) {
            if(response.status){
                if(Number(response.rows) >= 50){
                    var pv   = page - 1;
                    var nv   = no - 50;
                    var pn   = page +1;
                    var nn   = no + 50;

                    if(nv < 1){
                        $('#btn_prev').addClass('hidden');
                    }else{
                        $('#btn_prev').removeClass('hidden');
                        $('#btn_next').removeClass('hidden');
                    }
                    $('#btn_prev').attr('onclick','getUStatus('+ pv +','+ nv +',"prev");');
                    $('#btn_next').attr('onclick','getUStatus('+ pn +','+ nn +',"next");');

                }else{
                    var pv   = page - 1;
                    var nv   = no - 50;
                    $('#btn_prev').attr('onclick','getUStatus('+ pv +','+ nv +',"prev");');
                    $('#btn_next').addClass('hidden');
                }

                var i = no;
                $.each(response.result,function(key,val){
                    var uname   = "";
                    if(val.u_name != ''){
                        uname = '('+ val.u_name +')';
                    }
                    table += '<tr>'+
                                '<td>'+ i +'</td>'+
                                '<td>'+
                                    '<div class="ace-settings-item">'+
                                        '<input type="checkbox" class="ace ace-checkbox-2" onchange="ckEdit(&quot;'+ val.u_username +'&quot;);" id="'+ val.u_username +'"/>'+
                                        '<label class="lbl" for="ace-settings-navbar"></label>'+
                                    '</div>'+
                                '</td>'+
                                '<td class="text-left">'+
                                    '<strong> '+ val.u_username +' </strong>' + uname +
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_step_active" name="step_active" disabled="disabled" onchange="setSl(\'step_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.step_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_soccer_today_active" name="soccer_today_active" disabled="disabled" onchange="setSl(\'soccer_today_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.soccer_today_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_soccer_live_active" name="soccer_live_active" disabled="disabled" onchange="setSl(\'soccer_live_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.soccer_live_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_sport_today_active" name="sport_today_active" disabled="disabled" onchange="setSl(\'sport_today_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.sport_today_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_sport_live_active" name="sport_live_active" disabled="disabled" onchange="setSl(\'sport_live_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.sport_live_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_game_active" name="'+ val.u_username +'_game_active" disabled="disabled" onchange="setSl(\'game_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.game_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_casino_active" name="casino_active" disabled="disabled" onchange="setSl(\'casino_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.casino_active) +
                                    '</select>'+
                                '</td>'+
                                // '<td>'+
                                //     '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_lottery_active" name="lottery_active" disabled="disabled" onchange="setSl(\'lottery_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.lottery_active) +
                                //     '</select>'+
                                // '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_lotto_active" name="lotto_active" disabled="disabled" onchange="setSl(\'lotto_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.lotto_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_lotto_share_active" name="lotto_share_active" disabled="disabled" onchange="setSl(\'lotto_share_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.lotto_share_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_lotto_lao_active" name="lotto_lao_active" disabled="disabled" onchange="setSl(\'lotto_lao_active\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.lotto_lao_active) +
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<select class="form-control col-xs-12 col-sm-4 input-sm sl_'+ val.u_username +'" id="'+ val.u_username +'_transfer_money" name="transfer_money" disabled="disabled" onchange="setSl(\'transfer_money\',&quot;'+ val.u_username +'&quot;);">'+ genSl(val.transfer_money) +
                                    '</select>'+
                                '</td>'+
                            '</tr>';
                    i++;
                });
            }else{
                table = '<tr>'+
                            '<td colspan="15" class="text-danger"> ไม่พบข้อมูล </td>'+
                        '</tr>';
            }
        })
        .always(function(response){
            $('#tb_userstatus tbody').html(table);
            $('#relodUStatus').load('hide');
        });
    }
    function genSl(return_value){
        var seY = "";
        var seN = "";

        if(return_value == 'N'){
            seN = "selected";
        }else if(return_value == 'Y'){
            seY = "selected";
        }

        var slOp  = '<option value="N" '+ seN +'> ไม่ </option>'+
                    '<option value="Y" '+ seY +'> ใช่ </option>';

        return slOp;
    }
    function setSl(game,user){
        var title = game.split('_');
        // var confirm = '<h5>Please confirm change user status ?</h5>';
        var confirm = '<h5>กรุณายืนยันสถานะของผู้ใช้</h5>';
        bootbox.dialog({
            size : '',
            message : confirm,
            buttons:            
            {
                "success" :
                 {
                    "label" : "บันทึก",
                    "className" : "btn-sm btn-success",
                    "callback": function() {
                        $.ajax({
                            url: 'memberUserStatus/save.php',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                _token   : $('input[name=_token]').val(),
                                username : user,
                                ctype    : game,
                                cvalue   : $('#'+user+'_'+game).val(),
                            },
                        })
                        .done(function(response) {
                            if(response.status){
                                dialogSuccess(response.msg);
                            }
                        });
                    }
                },
                "button" :
                {
                    "label" : "ยกเลิก",
                    "className" : "btn-sm"
                }
            }
        });
    }
</script>
