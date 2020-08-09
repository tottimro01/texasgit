<?
    require_once 'inc/function.php';

    $qSport = $_GET['sport'];
    $qPage  = "";
    $qSportId  = $_GET['sport_id'];
    $mActive = 'result';
    $mActiveSport = $qSport;
    $menuKey = 'sport_result';
    $docBodyClass = "removeLoaderOnLoad";

    $pageTitle = $arr_sp[$_GET['sport_id']]['sp_name'] . " - ผลบอล";
  
    if($qSport == ""){
        header("Location: sport_result.php?sport=soccer&sport_id=6");
        die();
    }

    $addtional_resources = array(
        array('css', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.css'),
        array('js', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.js'),
    );
    require 'header.php';
?>

<script>
    var sport = getQueryVariable('sport');
    var sport_id = getQueryVariable('sport_id');
    var qDate = (getQueryVariable('date')!==false) ? getQueryVariable('date') : bDate;
    var hash = window.location.hash.substr(1);

    $(function(){
        var resultDatepicker = document.getElementById('resultDatepicker');
        var resultDatepickerButton = document.getElementById('resultDatepickerButton');
        $(resultDatepicker).datepicker({
            showOn: "focus",
            maxDate: "0",
            minDate: "-10d",
            defaultDate: 0,
            dateFormat: "dd-mm-yy",
            onSelect: function(dateText){
                $('#sport_waiting_input').val("");
                window.history.replaceState({'sport': sport, 'sport_id': sport_id, 'date': dateText}, "Sport result " + dateText, '?sport='+sport+'&sport_id='+sport_id);
                loadSportResult();
            },
            beforeShow: function(){
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 9);
                }, 0);
            }
        });
        $(resultDatepicker).datepicker('setDate' , qDate);

        var xhrLoadResult = null;
        loadSportResult();
        function loadSportResult(){
            var spResDate = $(resultDatepicker).datepicker('getDate');
            var dd = padNumber(spResDate.getDate());
            var mm = padNumber(spResDate.getMonth() + 1);
            var yyyy = spResDate.getFullYear();
            var spResDateFormatted = dd + '-' + mm + '-' + yyyy;
            $('#qDateText').text(spResDateFormatted)
            $('input.date_relate_input').val(spResDateFormatted);
            var wid = $('#sport_waiting_input').val();
            var newQueryParam = GetBaseURL()+"?"+createQueryVariable('date', spResDateFormatted);
            window.history.replaceState({'sport': sport, 'sport_id': sport_id, 'date': spResDateFormatted}, "Sport result " + spResDateFormatted, newQueryParam);

            if(xhrLoadResult!==null){
                xhrLoadResult.abort();
                $(resultDatepicker, resultDatepickerButton).removeAttr('disabled');
            }

            var form = resultDatepicker.form;
            var fdata = $(form).serialize();
            $.ajax({
                url: form.action,
                type: form.method,
                dataType: 'json',
                data: fdata,
                contentType: false,
                processData: false,
                beforeSend: ()=>{
                    showLoader(true);
                    $(resultDatepicker, resultDatepickerButton).attr('disabled', 'disabled');
                }
            })
            .done(function(res){
                if(res.status == 1){
                    if(res.result.waiting != ""){
                        $('#sport_waiting_container').show();
                        $('#sport_waiting').html(res.result.waiting);
                    }else{
                        $('#sport_waiting_container').hide();
                        $('#sport_waiting').html("");
                    }
                    var sortLeagues = sortProperties(res.result.sport_result, 'zone_name'); // Sort league by name
                    if(sortLeagues.length == 0){
                        $('#result_table').html($.templates('#sportResultEmpty_Tmpl'));
                    }else{
                        var frag = document.createDocumentFragment();
                        for(var i = 0; i < sortLeagues.length; i++){
                            let data = sortLeagues[i].value;
                            let tmpl = $.templates('#sportResult_Tmpl');
                            let html = tmpl.render(data);
                            let div = document.createElement('DIV');
                            div.innerHTML = html;
                            frag.appendChild(div);
                        }
                        $('#result_table').html(frag);

                        if(hash !=""){
                            var e = $('.match_row.'+hash);
                            if(e !== null && typeof e != 'undefined'){
                                $('html, body').animate({
                                    scrollTop: ($(e).offset().top - $('header').height())
                                }, 1000, function(){});
                            }
                        }
                    }
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                xhrLoadResult = null;
                $(resultDatepicker, resultDatepickerButton).removeAttr('disabled');
                showLoader(false);
            });
        }

        $(document).on('change', 'input[name="chk_date"], input[name="chk_score"]', function(event){
            event.preventDefault();
            $(this.form).trigger('submit');
        });

        $(document).on('click', 'td.spCellTriggerForm', function(event){
            $(this).find('.sp_cell input[type="text"]').focus();
        });

        $(document).on('click', '.selectWaiting', function(event){
            event.preventDefault();
            window.location.href = this.href;
        });

        var topPosElement = document.getElementById('navbarBelow');
        $(document).scroll(function(event){
            $('tr.match_row').each(function(){
                var post = $(this);
                var dist = $(post).offset().top - ($(topPosElement).offset().top + $(topPosElement).height());
                if(dist > 0 && dist < 30){
                    $('.selected-to-hash').not(post).removeClass('selected-to-hash');
                    post.addClass('selected-to-hash');
                    window.location.hash = $(post).attr('data-bid');
                }
            });        
        });
    });

    function submitSportResultCallback(res){
        if(res.status == 1){
            $.alert({
                title: 'Success!',
                content: 'Submit data success!',
                autoClose: 'ok|2000',
                boxWidth: '300px',
                buttons: {
                    ok: {
                        text: "Okay",
                        btnClass: 'oho-btn',
                    }
                }
            });
        }
    }

    function updateIdThScoreCallback(form, res){
        // console.log(res)
        if(res.status == 1){
            if(res.result != "")
                $('.id_thscore_'+res.match).removeClass("bg-light");
            else
                $('.id_thscore_'+res.match).addClass("bg-light");
        }
    }

    var liveScoreDialog = null;

    function loadLiveScoreCallback(form, res){
        // console.log(res)
        if(res.status == 1){
            var raw_info = res.result.info;
            var raw_scores = res.result.score;
            var grouped_score = [];
            var _1h = raw_info.score_half!=""?raw_info.score_half:"?-?";
            var _ft = raw_info.score_full!=""?raw_info.score_full:_1h;;
            var _ds = raw_info.team_1_name + " " + _ft + " " + raw_info.team_2_name;
            raw_info.live_text=raw_info.live_text!=""?raw_info.live_text+"'":"";
            if(raw_scores.length > 0){
                for(var i = 0; i < raw_scores.length; i++){
                    if(raw_scores[i].time != ""){
                        let r = raw_scores[i].time.split(" ");
                        raw_scores[i].time_half = r[0];
                        raw_scores[i].time_min = raw_scores[i].time;
                        grouped_score.push(raw_scores[i]);
                    }
                }
            }
                 
            let data = {
                info: {
                    team_1: raw_info.team_1_name,
                    team_2: raw_info.team_2_name,
                    _ft: _ft,                        
                    _1h: _1h,
                    live_txt: raw_info.live_text,
                },
                score: grouped_score,
            }
            let tmpl = $.templates('#sportLiveScoreTable_Tmpl');
            let html = tmpl.render(data);

            liveScoreDialog = $.dialog({
                title: raw_info.team_1_name + " - " + raw_info.team_2_name,
                content: html,
                boxWidth: '40%',
                onOpenBefore: function (){
                    var $self = this;
                    $self.$content.addClass("px-0 pt-0");
                },
                onClose: function(){
                    liveScoreDialog = null;
                },
            });

        }
    }
</script>

<div class="py-2">
    <div class="container container-alt">
        <div class="row">
            <div class="col-md-6">
                <form action="process/sportResultPulling.php" method="get" class="d-inline-block formGetVal">
                    <fieldset>
                        <input type="hidden" name="date" class="date_relate_input" />
                        <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
                        <button class="btn btn-sm btn-danger no-outline"><span>ดึงผลวันที่</span>&nbsp;&nbsp;<span id="qDateText"></span></button>
                    </fieldset>
                </form>

                <form action="process/sportResultProcess.php" method="post" class="d-inline-block formUpdateVal" data-onsuccess="submitSportResultCallback">
                    <fieldset>
                        <input type="hidden" name="date" class="date_relate_input" />
                        <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
                         <input type="hidden" name="process" value="1234" />
                        <button class="btn btn-sm btn-success no-outline"><span>Process = 0</span></button>
                    </fieldset>
                </form>

                <form action="process/sportResultProcess.php" method="post" class="d-inline-block formUpdateVal" data-onsuccess="submitSportResultCallback">
                    <fieldset>
                        <input type="hidden" name="date" class="date_relate_input" />
                        <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
                        <button class="btn btn-sm btn-warning no-outline"><span>Pay = 0</span></button>
                    </fieldset>
                </form>
                <div class="d-inline-block mr-3"></div>
            </div> 

            <div class="col-md-6">
                <div class="text-right">
                    <form action="process/sportResultProcess.php" method="post" class="d-inline-block formUpdateVal" data-onsuccess="submitSportResultCallback">
                        <fieldset>
                            <input type="hidden" name="date" class="date_relate_input" />
                            <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
                             <input type="hidden" name="process" value="789" />
                            <span>บอลยกเลิกใส่ [ * ] ดอกจัน</span>
                            <button class="btn btn-sm btn-info no-outline"><span>คำนวณผลบิลพนัน</span></button>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="col" id="sport_waiting_container">
                <hr />
                <div style="font-size:12px;" id="sport_waiting"></div>
            </div>

            <div class="col-12">
                <hr class="w-100" />  
            </div>

            <div class="col-md-12 mb-3">
                <form action="process/sportResultProcess.php" method="post" class="formUpdateVal" data-onsuccess="submitSportResultCallback">
                    <fieldset>
                        <div class="form-inline">
                            <input type="hidden" name="date" class="date_relate_input" />
                            <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
                                  <input type="hidden" name="process" value="8888" />
                            <label for="late_result" class="mr-1">บอลเลื่อนออกผล ID:</label> 
                            <input type="text" name="late_result" id="late_result" class="form-control form-control-sm no-outline mr-1" />
                            <input type="submit" name="submit" class="btn btn-sm btn-primary no-outline" value="บันทึก" />
                        </div>
                    </fieldset>
                </form>
            </div> 
        </div>

        <div>
            <table class="sport-match-header sport-match-table-sizer sp_result">
                <thead class="text-center small">
                    <tr>
                        <th class="bd-m-1 text-white bg-m-1">เวลา</th>
                        <th class="bd-m-1 text-white bg-m-1">เจ้าบ้าน</th>
                        <th class="bd-m-1 text-white bg-m-1">TH Score 1H</th>
                        <th class="bd-m-1 text-white bg-m-1">TH Score FT</th>
                        <th class="bd-m-1 text-white bg-m-1">!Live</th>
                        <th class="bd-m-1 text-white bg-m-1">1H</th>
                        <th class="bd-m-1 text-white bg-m-1">FT</th>
                        <th class="bd-m-1 text-white bg-m-1">ทีมเยือน</th>
                        <th class="bd-m-1 text-white bg-m-1"></td>
                        <th class="bd-m-1 text-white bg-m-1"></td>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="result_table"></div>
    
    </div>
</div>

<?
    include 'sport_result_tmpl.html';
    require 'footer.php';
?>
