 <link rel="stylesheet" href="bower_components/hummingbird-treeview/css/hummingbird-treeview.css">
 <link rel="stylesheet" href="bower_components/hummingbird-treeview/css/hummingbird-treeview_custom.css">
<style>
  
  ul#userStructure_tree li label
  {
    padding-left: 10px;
  }
  
  .hummingbird-treeview, .hummingbird-treeview *
  {
    font-size: 15px;
  }

</style>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        โครงสร้างสมาชิก
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">โครงสร้างสมาชิก</li>
      </ol>

    </section>
   <!-- Main content -->
<section class="content"> 
  <div class="box box-solid">
        <div class="box-header with-border">
              <i class="fa fa-list-ul"></i>

              <h3 class="box-title">รายการโครงสร้างสมาชิก</h3>
        </div>


    <div id="treeview_container" class="hummingbird-treeview" style="height: 800px; overflow-y: scroll;">

     <!--  <ul id="userStructure_tree" class="hummingbird-base" style="overflow-x: auto; width: 100%;"> -->
       <ul id="userStructure_tree" class="hummingbird-base">
      </ul>

    </div>
  </div>

 </section>
    <!-- /.content -->
<script src="bower_components/hummingbird-treeview/js/hummingbird-treeview.js"></script>  
<script>

get_data();
function get_data(id=null,lv=1,e=null)
{
  $.ajax({
    url: 'inc/get_data/get_userStructure.php',
    type: 'POST',
    dataType: 'json',
    async : false,
    data: {id: id , lv: lv},
  })
  .done(function(res) {

    let html ="";
    if(res.root)
    {
      html = load_root_tree(res.items);
      $("#userStructure_tree").empty().append(html);
    }else{
      html = load_child_tree(res.items);
      $(e).next('label').next('ul').remove();
      $(e).next('label').after(html);
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

  $("#userStructure_tree").hummingbird();
}

function load_root_tree(data)
{
   let html = ""
    $.each(data,function(index, el) {
       html+= el.text;
    });
    return html;
}

function load_child_tree(data)
{
   let html = "<ul>";
    $.each(data,function(index, el) {
       html+= el.text;
    });

    html += "</ul>";
    return html;
}

</script> 