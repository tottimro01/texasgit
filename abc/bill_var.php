<?
    require_once 'inc/function.php';

    // $qSport = $_GET['sport'];
    // $qPage  = "";
    // $qSportId  = $_GET['sport_id'];
    $mActive = 'bill_var';
    $mActiveSport = $qSport;
    $menuKey = 'bill_var';
    $docBodyClass = "removeLoaderOnLoad";

    $pageTitle = $arr_sp[$_GET['sport_id']]['sp_name'] . " - บิล VAR";
  
    // if($qSport == ""){
    //     header("Location: bill_var.php?sport=soccer&sport_id=6");
    //     die();
    // }

    $addtional_resources = array(
        array('css', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.css'),
        array('js', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.js'),
    );
    require 'header.php';
?>

<script>
    var sport = getQueryVariable('sport');
    var sport_id = getQueryVariable('sport_id');
    $(function(){
        $('#formGetVAR').submit();    
    });

    function GetBillVARCallback(form, res){
        if(res.status == 1){
            // let data = sortPropertiesReverse(res.result, 'bill_id');
            let tmpl = $.templates('#billVarTable_Tmpl');
            let html = tmpl.render({bills: res.result});
            $('#bill_var_table').html(html);
        }
    }

    function OnCancelBillVAR(form, res){
        if(res.status == 1){
            $('#tr_bill_'+res.result.bill_id).remove();
        }
    }
    
</script>

<div class="py-2">
    <div class="container container-alt">
        <form action="process/GetBillVAR.php" method="get" class="formGetVal" id="formGetVAR" data-onsuccess="GetBillVARCallback">
            <!-- <input type="hidden" name="sport" value="<?=$qSportId;?>" /> -->
        </form>
        <div>
            <table class="sport-match-header sport-match-table-sizer bill_var">
                <thead class="text-center small">
                    <tr>
                        <th class="bd-m-1 text-white bg-m-1">Bill ID</th>
                        <th class="bd-m-1 text-white bg-m-1">วันที่</th>
                        <th class="bd-m-1 text-white bg-m-1">Play ID</th>
                        <th class="bd-m-1 text-white bg-m-1">คู่แข่งขัน</th>
                        <th class="bd-m-1 text-white bg-m-1">กีฬา</th>
                        <th class="bd-m-1 text-white bg-m-1">ผลสกอร์เล่น</th>
                        <th class="bd-m-1 text-white bg-m-1">ผลกลับคำตัดสิน</th>
                        <th class="bd-m-1 text-white bg-m-1"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="bill_var_table"></div>
    
    </div>
</div>

<?
  #  include 'sport_result_tmpl.html';
    require 'footer.php';
?>

<script id="billVarTable_Tmpl" type="text/x-jsrender">
<table class="sport-match-table sport-match-table-sizer bill_var w-100 table-fixed small">  
  <tbody>
    {{for bills}}
    <tr class="match_row" id="tr_bill_{{:bill_id}}">
        <td>
            <div class="text-center font-weight-bold">
            {{:bill_id}}
            </div>
        </td>
        <td>
            <div class="text-center">
            {{:play_datetime_format}}
            </div>
        </td>
        <td>
            <div class="text-center">
            {{:play_id}}
            </div>
        </td>
        <td>
            <div class="text-center font-weight-bold">
            {{:team_1}} - {{:team_2}} 
            </div>
        </td>
        <td>
            <div class="text-center">
            {{:sport_name}}
            </div>
        </td>
        <td>
            <div class="text-center">
            {{:score_live}}
            </div>
        </td>
        <td>
            <div class="text-center">
            {{:score_var}}
            </div>
        </td>
        <td>
            <form action="process/CancelBillVAR.php" method="post" class="formUpdateVal mx-auto" data-onsuccess="OnCancelBillVAR">
                <fieldset>
                    <input type="hidden" name="bill_id" value="{{:bill_id}}" />
                    <input type="hidden" name="play_id" value="{{:play_id}}" />
                    <input type="submit" class="btn btn-sm btn-danger d-block mx-auto" value="ยกเลิก" />
                </fieldset>
            </form>
        </td>
    </tr>
    {{/for}}
</table>
</script>
