<script>
$(function(){
    var dd;
    if(dd = document.getElementById('sportSelectorDropdown')){
        $.fn.selectpicker.Constructor.BootstrapVersion = '4';
        $(dd).selectpicker({
            width: 'fit',
            styleBase: 'nav-link bg-transparent',
            BootstrapVersion: '4',
        });
        $(dd).show();
        $(dd).on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue){
            let urlToGo = e.target[clickedIndex].value;
            window.location.href = urlToGo;
        });
    }
});
</script>
<header>
    <div class="topnav bg-m-1">

        <div>
            <div>
                <div class="container mx-0 mx-lg-auto topnav-container">
                    <nav class="navbar navbar-expand py-0">
                        <a class="navbar-brand py-0 mb-2 logo" href="/">
                            <img src="assets/img/logo.png" alt="ABC OHOKING" class="w-100" />
                        </a>

                        <div class="navbar-collapse navbar-expand" id="navbarTop">
                            <ul class="navbar-nav mr-auto">
                                <li  class="nav-item">
                                    <a id="sportFilterTrigger" class="nav-link" href="#">ตั้งค่า</a>
                                </li>
                                <li class="nav-item <?if($menuKey == 'sport'){?> tm-active <?}?>">
                                  <? if($menuKey == 'sport'){ ?>
                                    <a class="nav-link" href="sport.php?sport=<?=$qSport;?>&sport_id=<?=$qSportId;?>&page=<?=$qPage;?>">กีฬา</a>
                                  <? }else{ ?>
                                    <a class="nav-link" href="sport.php">กีฬา</a>
                                  <? } ?>
                                </li>

                                <li class="nav-item <?if($menuKey == 'sport_result'){?> tm-active <?}?>">
                                  <? if($menuKey == 'sport_result'){ ?>
                                    <a class="nav-link" href="sport_result.php?sport=<?=$qSport;?>&sport_id=<?=$qSportId;?>">ผลบอล</a>
                                  <? }else{ ?>
                                  <a class="nav-link" href="sport_result.php">ผลบอล</a>
                                  <? } ?>
                                </li>

                                <li class="nav-item <?if($menuKey == 'lotto'){?> tm-active <?}?>">
                                  <a class="nav-link" href="lotto.php">หวย</a>
                                </li>

                                <li class="nav-item <?if($menuKey == 'lothun'){?> tm-active <?}?>">
                                    <a class="nav-link" href="lothun.php">หวยหุ้น</a>
                                </li>

                                <!--<li class="nav-item <?if($menuKey == 'system_setting'){?> tm-active <?}?>">
                                    <a class="nav-link" href="system_setting.php">ควบคุมระบบ</a>
                                </li>-->

                                <li class="nav-item <?if($menuKey == 'bill_var'){?> tm-active <?}?> position-relative">
                                    <a class="nav-link" href="bill_var.php">บิล VAR</a>
                                    <span id="noti_bill_var" class="topnav_noti_num position-absolute bg-danger rounded text-white small--1 text-center">0</span>
                                </li>

                                <li class="nav-item <?if($menuKey == '_bank'){?> tm-active <?}?> position-relative">
                                    <a class="nav-link" href="_bank.php">ธนาคาร</a>
                                    <span id="noti_bill_var" class="topnav_noti_num position-absolute bg-danger rounded text-white small--1 text-center">0</span>
                                </li>
                                
                            </ul>

                            <ul class="navbar-nav small">
                                <li class="nav-item <?if($menuKey == 'server_status'){?> tm-active <?}?>">
                                    <a class="nav-link" href="server_status.php">เซิร์ฟเวอร์</a>
                                </li>
                                <li class="nav-item <?if($menuKey == 'system_setting'){?> tm-active <?}?>">
                                    <a class="nav-link" href="system_setting.php">ควบคุมระบบ</a>
                                </li>
                                <li class="nav-item <?if($menuKey == 'change_password'){?> tm-active <?}?>">
                                    <a class="nav-link" href="change_password.php">เปลี่ยนรหัสผ่าน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
       
            <div class="top-menu-row">
                <div class="container topnav-container">
                    <nav class="navbar navbar-expand py-0">

                    <? if($menuKey == 'sport'){ ?>

                        <script>
                            var sportList = {};
                            <? foreach($arr_sp as $k => $v){ ?>
                            sportList['<?=$k;?>'] = { id: '<?=$k;?>', key: '<?=$v['sp_key'];?>', name: '<?=$v['sp_name'];?>' };
                            <? } ?>
                        </script>

                        <div class="collapse navbar-collapse" id="navbarBelow">
                            <ul class="navbar-nav page-selector mr-auto">
                                <li class="nav-item dropdown">
                                    <select id="sportSelectorDropdown" style="display: none;">
                                    <? 
                                    foreach($arr_sp as $k => $v){ 
                                        $_a = $mActiveSport==$v['sp_key'];
                                        $_page = $_GET['page']!="" ? $_GET['page'] : "hdc_goal"; 
                                        //if($mActive=='sport_setting'){
                                        ?>
                                        <!-- <option class="dropdown-item small <?if($_a){?>m-sport-active<?}?>"
                                        <?if($_a){?> selected="selected" <?}?>
                                        value="sport_setting.php?sport=<?=$v['sp_key'];?>&sport_id=<?=$k;?>">
                                            <?=$v['sp_name'];?>
                                        </option> -->
                                        <?
                                        //}else{
                                        ?>
                                        <option class="dropdown-item small <?if($_a){?>m-sport-active<?}?>"
                                        <?if($_a){?> selected="selected" <?}?>
                                        value="sport.php?sport=<?=$v['sp_key'];?>&sport_id=<?=$k;?>&page=<?=$_page;?><?if(isset($_GET['date'])){echo "&date={$_GET['date']}";}?>">
                                            <?=$v['sp_name'];?>
                                        </option>
                                        <?
                                        //}
                                    } 
                                    ?>
                                    </select>
                                </li>

                                <li class="nav-item mn-main <?if($mActive=='hdc_goal'){?>m-active<?}?>">
                                    <a class="nav-link" href="sport.php?sport=<?=$arr_sp[$qSportId]['sp_key'];?>&sport_id=<?=$qSportId;?>&page=hdc_goal<?if(isset($_GET['date'])){echo "&date={$_GET['date']}";}?>">HDC / GOAL</a>
                                </li>

                                <li class="nav-item mn-main <?if($mActive=='hdc_goal_step'){?>m-active<?}?>">
                                    <a class="nav-link" href="sport.php?sport=<?=$arr_sp[$qSportId]['sp_key'];?>&sport_id=<?=$qSportId;?>&page=hdc_goal_step<?if(isset($_GET['date'])){echo "&date={$_GET['date']}";}?>">HDC / GOAL STEP</a>
                                </li>

                                <li class="nav-item mn-main <?if($mActive=='1x2_oe'){?>m-active<?}?>">
                                    <a class="nav-link" href="sport.php?sport=<?=$arr_sp[$qSportId]['sp_key'];?>&sport_id=<?=$qSportId;?>&page=1x2_oe<?if(isset($_GET['date'])){echo "&date={$_GET['date']}";}?>">1X2 / OE</a>
                                </li>

                                <li class="nav-item mn-main <?if($mActive=='1x2_step'){?>m-active<?}?>">
                                    <a class="nav-link" href="sport.php?sport=<?=$arr_sp[$qSportId]['sp_key'];?>&sport_id=<?=$qSportId;?>&page=1x2_step<?if(isset($_GET['date'])){echo "&date={$_GET['date']}";}?>">1X2 STEP</a>
                                </li>

                                <li class="nav-item mn-main <?if($mActive=='sort_league'){?>m-active<?}?>">
                                    <a class="nav-link" href="sport.php?sport=<?=$arr_sp[$qSportId]['sp_key'];?>&sport_id=<?=$qSportId;?>&page=sort_league">เรียงลีก</a>
                                </li>

                                <!--<li class="nav-item mn-main <?if($mActive=='sport_setting'){?>m-active<?}?>">
                                    <a class="nav-link" href="sport_setting.php?sport=<?=$arr_sp[$qSportId]['sp_key'];?>&sport_id=<?=$qSportId;?>">เรียงลีก</a>
                                </li>-->

                                <li class="nav-item mn-main">
                                    <a class="nav-link" href="#" onclick="createMatchData(); return false;">สร้าง</a>
                                </li>

                               <? if($mActive!='sort_league'){ ?>
                                <li class="nav-item mn-main">
                                    <form action="#" method="get">
                                        <fieldset>
                                            <div class="form-inline">
                                                <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
                                                <label for="qSportDatepicker"><span class="nav-link">วันที่:&nbsp;&nbsp;</span></label> 
                                                <div class="input-group input-group-sm">
                                                    <input type="text" id="qSportDatepicker" name="date" class="form-control form-control-sm no-outline" />
                                                    <div class="input-group-append">
                                                        <button type="submit" class="input-group-text no-outline" id="qSportDatepickerButton" onclick="document.getElementById('qSportDatepicker').focus(); return false;"><img src="assets/img/ui/calendar.png" alt="Select date" /></button>
                                                  </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </li>
                               <? } ?>
                            </ul>
                        </div>

                    <? }else if($menuKey == 'sport_result'){ ?>

                        <script>
                            var sportList = {};
                            <? foreach($arr_sp as $k => $v){ ?>
                            sportList['<?=$k;?>'] = { id: '<?=$k;?>', key: '<?=$v['sp_key'];?>', name: '<?=$v['sp_name'];?>' };
                            <? } ?>
                        </script>
                        <div class="collapse navbar-collapse" id="navbarBelow">
                            <ul class="navbar-nav page-selector mr-auto">

                                <li class="nav-item dropdown">
                                    <select id="sportSelectorDropdown" style="display: none;">
                                    <? foreach($arr_sp as $k => $v){ ?>
                                        <option class="dropdown-item small <?if($mActiveSport==$v['sp_key']){?>m-sport-active<?}?>"
                                        <?if($mActiveSport==$v['sp_key']){?> selected="selected" <?}?>
                                        value="sport_result.php?sport=<?=$v['sp_key'];?>&sport_id=<?=$k;?>">
                                            <?=$v['sp_name'];?>
                                        </option>
                                    <? } ?>
                                    </select>
                                </li>

                                <li class="nav-item">
                                    <form action="process/sportResultData.php" method="get">
                                        <fieldset>
                                            <div class="form-inline">
                                                <input type="hidden" name="sport_waiting" id="sport_waiting_input" value="<?=$_GET['wid'];?>" />
                                                <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
                                                <label for="resultDatepicker"><span class="nav-link">ผลบอลวันที่:&nbsp;&nbsp;</span></label> 
                                                <div class="input-group input-group-sm">
                                                    <input type="text" id="resultDatepicker" name="date" class="form-control form-control-sm no-outline" />
                                                    <div class="input-group-append">
                                                        <button type="submit" class="input-group-text no-outline" id="resultDatepickerButton" onclick="document.getElementById('resultDatepicker').focus(); return false;"><img src="assets/img/ui/calendar.png" alt="Select date" /></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <? }else if($menuKey == 'bill_var'){ ?>

<!-- <script>
    var sportList = {};
    <? foreach($arr_sp as $k => $v){ ?>
    sportList['<?=$k;?>'] = { id: '<?=$k;?>', key: '<?=$v['sp_key'];?>', name: '<?=$v['sp_name'];?>' };
    <? } ?>
</script>
<div class="collapse navbar-collapse" id="navbarBelow">
    <ul class="navbar-nav page-selector mr-auto">

        <li class="nav-item dropdown">
            <select id="sportSelectorDropdown" style="display: none;">
            <? foreach($arr_sp as $k => $v){ ?>
                <option class="dropdown-item small <?if($mActiveSport==$v['sp_key']){?>m-sport-active<?}?>"
                <?if($mActiveSport==$v['sp_key']){?> selected="selected" <?}?>
                value="bill_var.php?sport=<?=$v['sp_key'];?>&sport_id=<?=$k;?>">
                    <?=$v['sp_name'];?>
                </option>
            <? } ?>
            </select>
        </li>
    </ul>
</div> -->

                    <? }else if($menuKey == 'lotto'){ ?>

                        <div class="collapse navbar-collapse" id="navbarBelow">
                            <ul class="navbar-nav page-selector mr-auto">
                                <li class="nav-item mn-main <?if($mActive=='lotto_win'){?>m-active<?}?>">
                                    <a class="nav-link" href="lotto.php?page=win">ผลรางวัล</a>
                                </li>
                            </ul>
                        </div>

                    <? }else if($menuKey == 'lothun'){ ?>

                        <div class="collapse navbar-collapse" id="navbarBelow">
                            <ul class="navbar-nav page-selector mr-auto">
                                <li class="nav-item mn-main <?if($mActive=='lothun_win'){?>m-active<?}?>">
                                    <a class="nav-link" href="lotto.php?page=win">ผลรางวัล</a>
                                </li>
                            </ul>
                        </div>

                    <? } ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<script id="sportFilterForm_Tmpl" type="text/x-jsrender">
    <form action="#" method="post" class="" id="sportFilterForm">
        <fieldset>

            <div>
                <div>
                   <h6>เวลาแข่งขัน</h6>
                    <span class="chk-item rdo with-label">
                        <input type="radio" name="m_b_live" id="blive--1" value="-1" {{if b_live<0}}checked="checked"{{/if}} />
                        <label class="checkmark" for="blive--1">ทั้งหมด</label>
                    </span>
             
                    <span class="chk-item rdo with-label">
                        <input type="radio" name="m_b_live" id="blive-0" value="0" {{if b_live==0}}checked="checked"{{/if}} />
                        <label class="checkmark" for="blive-0">ก่อนเวลา</label>
                    </span>
             
                    <span class="chk-item rdo with-label">
                        <input type="radio" name="m_b_live" id="blive-1" value="1" {{if b_live==1}}checked="checked"{{/if}} />
                        <label class="checkmark" for="blive-1">ระหว่างแข่ง</label>
                    </span>
             
                    <span class="chk-item rdo with-label">
                        <input type="radio" name="m_b_live" id="blive-4" value="4" {{if b_live==4}}checked="checked"{{/if}} />
                        <label class="checkmark" for="blive-4">หลังเวลา</label>
                    </span>
                </div>
            </div>
                
        </fieldset>
    </form>
</script>