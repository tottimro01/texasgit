<?php require('inc_head.php');?>

<div class="page-content" id="pageContent" style=""><div class="row">
    <br>
    <div class="col-xs-12 col-sm-12">
        <div class="widget-box widget-color-blue2">
            <div class="widget-header">
                <h4 class="widget-title lighter"><?=$lang_userStructure[2];?></h4>
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
                                        <strong><font size="4"> <?=$_POST[session][r_user];?> </font></strong>
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
            var main_username   = "<?=$_POST["session"]["r_user"];?>";
            var main_id         = "<?=$_POST["session"]["r_id"];?>";

            strMain[main_username]          = new Object();
            strMain[main_username]['user']  = main_username;
            strMain[main_username]['id']  = main_id;
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
      display:none;
    }
  }
</style></div>