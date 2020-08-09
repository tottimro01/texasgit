<?
    $qSport = $_GET['sport'];
    $qPage  = $_GET['page'];
    $qSportId  = isset($_GET['sport_id']) ? $_GET['sport_id'] : '6';
    $mActiveSport = $qSport;
    $menuKey = 'sport';
    $docBodyClass = "";

    $addtional_resources = array(
        array('js', 'assets/js/sportSetting.js'),
        array('css', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.css'),
        array('js', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.js'),
    );

    require_once 'inc/function.php';
    $pageTitle = "เรียงลีก";
    $mActive = "sort_league";
    require 'header.php';
?>
<div class="py-2">
    <form action="process/leagueOrderData.php" class="" method="get" id="formGetLeagueOrder" data-onsuccess="loadOrderCallback">
        <fieldset>
            <input type="hidden" name="zone" value="<?=$qSportId;?>" />
            <input type="hidden" name="date" value="<?=_bdate();?>" />
        </fieldset>
    </form>
    <div class="container">
        <div class="col-md-6 mx-auto">
            <h5>เรียงลีก</h5>
            <hr>
            <div class="text-right mb-3">
                <button class="btn btn-sm btn-info" id="btn-reload" title="โหลดลีกใหม่"><i class="fas fa-sync-alt"></i></button>
                <button class="btn btn-sm btn-info" id="btn-auto-sort" title="เรียงอัตโนมัติ"><i class="fas fa-sort-numeric-down"></i></button>
            </div>
            <div id="league_order"></div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-4 mx-auto">
            <form action="process/updateLeagueOrder.php" class="formUpdateVal mx-auto" method="post" id="formUpdateLeagueOrder" data-onsuccess="updateLeagueOrderCallback,toastSaveSuccess" data-onfail="toastSaveError">
                <fieldset disabled="disabled">
                    <div class="input-group"></div>
                    <input type="hidden" name="zone" value="<?=$qSportId;?>" />
                    <input type="hidden" name="date" value="<?=_bdate();?>" />
                    <button type="submit" class="btn mt-2 mb-1 btn-block control-oho">บันทึก</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script id="leagueOrderBoxTmpl" type="text/x-jsrender">
{{for league}}
<div class="sport-order-list mb-0 shadow-sm border small odr-{{:zone_top}}" id="odr_{{:zone_id}}" data-top="{{:zone_top}}" data-id="{{:zone_id}}" data-name="{{:zone_name}}">
    <div class="alert alert-light m-0 py-1">
        <div class="text-dark">
            <table class="w-100">
                <tr>
                    <td style="width: 50px;">
                        <div>
                            <span>{{:zone_top}}</span><span>)</span>
                        </div>
                    </td>
                    <td>
                        <div class="mt-1">
                            <span>{{:zone_name}}</span>
                            <span class="text-danger">[{{:zone_id}}]</span>
                        </div>
                    </td>
                    <td>
                        <div class="text-right ctrl-cell">
                        <form class="ctrl-form">
                            <input type="hidden" name="zone_id" value="{{:zone_id}}" />
                            <input type="hidden" name="zone_top" value="{{:zone_top}}" />
                            <input type="hidden" name="zone_name" value="{{:zone_name}}" />
                        </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
{{/for}}
</script>
<?
  require 'footer.php';
?>