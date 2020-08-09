<?php require('inc_head.php');

  $r_agent_id = $_POST["session"]["r_agent_id"];
  $sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_POST["session"]["rid"]." and r_level=".intval($_POST["session"]["r_level"])."";
  $rs = sql_array($sql);

?>

<div class="page-content" id="pageContent" style=""><div class="row">
    <br>
    <div class="col-xs-12 col-sm-12">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter"><?=$lang_ag[89];?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main padding-8">
                    <ul id="tree" class="tree tree-unselectable" role="tree">
                        <li class="tree-branch hide" data-template="treebranch" role="treeitem" aria-expanded="false">        
                            <div class="tree-branch-header">
                                <span class="tree-branch-name">
                                    <i class="icon-folder ace-icon tree-plus"></i>
                                    <span class="tree-label"></span>
                                </span>
                            </div>
                            <ul class="tree-branch-children" role="group"></ul>
                            <div class="tree-loader hide" role="alert">
                                <div class="tree-loading">
                                    <i class="ace-icon fa fa-refresh fa-spin blue"></i>
                                </div>
                            </div>
                        </li>
                        <li class="tree-item hide" data-template="treeitem" role="treeitem">
                            <span class="tree-item-name">
                                <span class="tree-label"></span>
                            </span>
                        </li>
                        <li class="tree-branch" role="treeitem" aria-expanded="false">
                            <div class="tree-branch-header">
                                <span class="tree-branch-name">
                                    <i class="icon-folder ace-icon tree-plus"></i>
                                    <span class="tree-label">
                                        <span class="fa-stack fa-lg">
                                            <i class="ace-icon fa fa-users fa-fw" style="color:black;font-size:23px;"></i>
                                        </span>&nbsp;&nbsp;
                                        <strong><font size="4"> <?=$rs["r_user"];?> </font></strong>
                                    </span>
                                </span>
                            </div>
                            <ul class="tree-branch-children" role="group"></ul>
                            <div class="tree-loader hide" role="alert">
                                <div class="tree-loading">
                                    <i class="ace-icon fa fa-refresh fa-spin blue"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/fuelux.wizard.min.js"></script>
<script src="assets/js/fuelux.tree.min.js"></script>

<script type="text/javascript">

    jQuery(function($){

        var sampleData = initiateDemoData();//see below
        try {
       $('#tree').ace_tree({
            dataSource: sampleData['dataSource2'],
            multiSelect: false,
            cacheItems: true,
            'open-icon' : 'ace-icon tree-minus',
            'close-icon' : 'ace-icon tree-plus',
            'selectable' : false,
            'selected-icon' : null,
            'unselected-icon' : null,
            loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
          });
    }
    catch(err) {
      getMenu('userStructure');
    }

        function initiateDemoData(){

            var strMain         = new Object();
            var iconMainUser    = '<span class="fa-stack fa-lg"><i class="ace-icon fa fa-users fa-fw" style="color:black;font-size:23px;"></i></span>&nbsp;&nbsp;';
            var main_username   = "<?=$rs["r_user"];?>";
            var main_id         = "<?=$rs["r_id"];?>";

            strMain[main_username]          = new Object();
            strMain[main_username]['user']  = main_username;
            strMain[main_username]['id']    = main_id;
            strMain[main_username]['text']  = iconMainUser+'<strong><font size="4"> '+main_username+' </font></strong>';
            strMain[main_username]['type']  ='folder';

            tree_data_2 = strMain;

            $.ajaxSetup({async:false});

            var dataSource2 = function(options, callback){
                var $data = null
                var param = '';
                if(!("text" in options) && !("type" in options)){
                    $data = tree_data_2;//the root tree
                    callback({ data: $data });
                    return;
                }
                else if("type" in options && options.type == "folder") {

                    if("additionalParameters" in options && "children" in options.additionalParameters){
                        $data = options.additionalParameters.children || {};
                        param = options.user;
                    }
                    else{
                        $data = {}//no data
                        param = options.user;
                    }
                }

                if($data != null){
                    $.ajax({
                        url: 'userStructureGetData.php',
                        data: 'username='+ param,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            
                            callback({ data: response.data });
                        },
                        error: function (response) {
                            //console.log(response);
                        }
                    })
                }
            }
            return {'dataSource2' : dataSource2}
        }
    });

</script>

<style type="text/css">
  @media (max-width: 990px) { 
    .fshow{
      /*display:none;*/
    }

    .tree_overflow_w
    {
        margin-left: 15px;
    }

    
    .tree .tree-branch:before, .tree .tree-item:before
    {
      top: 18px;
    }

    .tree .tree-branch .tree-branch-children:before , .tree .tree-branch .tree-branch-children.hide:before {
        display: inline-block;
        content: "";
        position: absolute;
        z-index: 1;
        /*top: -35px;*/
        bottom: 16px;
        left: -14px;
        border: 1px dotted #67b2dd;
        border-width: 0 0 0 1px;
    }

  }
</style></div>