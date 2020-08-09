<?php require('inc_head.php');?>
<style type="text/css">

  @media (max-width: 990px) { 

    .form-group div,label{
      padding-top: 5px;
    }
  }

  @media (max-width: 435px) { 
   .nav-tabs>li {
        min-width: 50%;
    }
  }

  tbody tr>td.tdNoHover:hover{
    background: #fff !important;
  }
</style>

<div class="row">
  <div class="widget-box hidden-boder" id="reloadLog">
    <div class="widget-header hidden">
      <div class="widget-toolbar hidden">
        <a href="#" data-action="reload">
          <i class="ace-icon fa fa-refresh"></i>
        </a>
      </div>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <div class="row">
          <div class="col-xs-12 widthTable">
            <form class="form-horizontal" id="frmSearchDeposit"></form>
            <div class="tabbable">
              <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                <li class="active">
                  <a data-toggle="tab" href="#home4" aria-expanded="true" onclick="searchLog('loginLog');"><?=$lang_ag[391];?></a>
                </li>
                <li class="">
                  <a data-toggle="tab" href="#sub_user" aria-expanded="false" onclick="searchLog('subUserLog');"><?=$lang_ag[392];?></a>
                </li>
                <li class="">
                  <a data-toggle="tab" href="#agentLog" aria-expanded="false" onclick="searchLog('agentLog');"><?=$lang_ag[394];?></a>
                </li>
                <li class="">
                  <a data-toggle="tab" href="#memberLog" aria-expanded="false" onclick="searchLog('memberLog');"><?=$lang_ag[396];?></a>
                </li>  
              </ul>

              <div class="tab-content">
                <div id="home4" class="tab-pane active">
                  <div class="table-responsive">
                    <table id="tbLoginLog" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th class="text-center"> <?=$lang_ag[326];?> </th>
                          <th class="text-center"> <?=$lang_ag[398];?> </th>
                          <th class="text-center"> <?=$lang_ag[400];?> </th>
                          <th class="text-center"> <?=$lang_ag[402];?> </th>
                          <th class="text-center"> <?=$lang_ag[403];?></th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>

                    </table>

                  </div>
                  <div id="pagination"></div>

                </div>
                <div id="sub_user" class="tab-pane">
                    <div class="table-responsive">
                          <table id="tbSubUserLog" class="table table-striped table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th class="text-center"> <?=$lang_ag[326];?> </th>
                                  <th class="text-center"> <?=$lang_ag[1392];?> </th>
                                  <th class="text-center"> <?=$lang_ag[405];?> </th>
                                  <th class="text-center"> <?=$lang_ag[398];?> </th>
                                  <th class="text-center"> <?=$lang_ag[406];?> </th>
                                  <th class="text-center"> <?=$lang_ag[400];?> </th>
                                  <th class="text-center"> <?=$lang_ag[403];?> </th>
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                          </table>
                    </div>
                     <div id="pagination"></div>
                </div> 

                <div id="agentLog" class="tab-pane">
                    <div class="table-responsive">
                          <table id="tbAgentLog" class="table table-striped table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th class="text-center"> <?=$lang_ag[326];?> </th>
                                  <th class="text-center"> <?=$lang_ag[1392];?> </th>
                                  <th class="text-center"> <?=$lang_ag[405];?> </th>
                                  <th class="text-center"> <?=$lang_ag[398];?> </th>
                                  <th class="text-center"> <?=$lang_ag[406];?> </th>
                                  <th class="text-center"> <?=$lang_ag[400];?> </th>
                                  <th class="text-center"> <?=$lang_ag[403];?> </th>
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                          </table>
                    </div>
                     <div id="pagination"></div>
                </div> 

                <div id="memberLog" class="tab-pane">
                    <div class="table-responsive">
                          <table id="tbMemberLog" class="table table-striped table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th class="text-center"> <?=$lang_ag[326];?> </th>
                                  <th class="text-center"> <?=$lang_ag[1392];?> </th>
                                  <th class="text-center"> <?=$lang_ag[405];?> </th>
                                  <th class="text-center"> <?=$lang_ag[398];?> </th>
                                  <th class="text-center"> <?=$lang_ag[406];?> </th>
                                  <th class="text-center"> <?=$lang_ag[400];?> </th>
                                  <th class="text-center"> <?=$lang_ag[403];?> </th>
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                          </table>
                    </div>
                     <div id="pagination"></div>
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


<script src="../../assets/js/main.js"></script>
<script type="text/javascript">

 var this_typeLog = ""; 
  searchLog('loginLog');
  function searchLog(typeLog,this_page=1)
  {
    $("#reloadLog").load('show');
    $rowPerPage = 20;

    $.ajax({
      url: 'inc/temp/logSearch_temp.php',
      data: 
      { 
        thisPage    : this_page,
        rowPerPage  : $rowPerPage,
        typeLog : typeLog
      },
      type: 'POST',
      dataType: 'json',
      success: function (response) 
      {
        // console.log(response);
        if(response.status){
          if(response.typeLog == 'loginLog')
          {
            this_typeLog = response.typeLog;
            $("#tbLoginLog tbody").html(response.list);

             var pagi_html = loadPagination(response.pagi_data);
             $('#home4 #pagination').text('');
             $('#home4 #pagination').html(pagi_html);

          }else if(response.typeLog == 'subUserLog')
          {
            this_typeLog = response.typeLog;
            $("#tbSubUserLog tbody").html(response.list);

             var pagi_html = loadPagination(response.pagi_data);
             $('#sub_user #pagination').text('');
             $('#sub_user #pagination').html(pagi_html);
             
          }else if(response.typeLog == 'agentLog')
          {
             this_typeLog = response.typeLog;
             $("#tbAgentLog tbody").html(response.list);

             var pagi_html = loadPagination(response.pagi_data);
             $('#agentLog #pagination').text('');
             $('#agentLog #pagination').html(pagi_html);

          }else if(response.typeLog == 'memberLog')
          {
             this_typeLog = response.typeLog;
             $("#tbMemberLog tbody").html(response.list);

             var pagi_html = loadPagination(response.pagi_data);
             $('#memberLog #pagination').text('');
             $('#memberLog #pagination').html(pagi_html);
          }
        }
        else
        {
          dialogError('data error');
        }
        $("#reloadLog").load('hide');
      },
      error: function (response) 
      {
        console.log(response);
      }
    });
  }

  function clickPage(page)
  {
          searchLog(this_typeLog,page);
  }

</script>