<?php 
require('../conn.php');
require('../function.php');
?>

<?php


$dateBegin = date('Y-m-d', strtotime($_POST["dateBegin"]));
$dateEnd = date('Y-m-d', strtotime($_POST["dateEnd"]));


$sql = "SELECT * FROM `bom_tb_news` where (DATE(`n_date`) BETWEEN '$dateBegin' AND '$dateEnd')";
$num_row = sql_num($sql); 

//// pageination //

      $rowPerPage =  intval($_POST["rowPerPage"]);
      $page       = $_POST["thisPage"];
      $start      = ($page-1)*$rowPerPage;

      $pagi_data["numrow"] =  $num_row;
      $pagi_data["rowPerPage"] =  $rowPerPage;
      $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
      $pagi_data["active_page"] = intval($page);
      $pagi_data["start_page"]  = $start; 

 //// pageination //

$sql_limit="SELECT * FROM `bom_tb_news` where (DATE(`n_date`) BETWEEN '$dateBegin' AND '$dateEnd') LIMIT {$start} , {$rowPerPage}"; 

$re=sql_query($sql_limit); 

$no = $rowPerPage*($page-1);
while($rs=sql_fetch_as($re)){
  
  $no ++;
  $templates[] = "<tr>
        <td align='center'>".$no."</td>
        <td align='center' width='10%'>".$rs["n_date"]."</td>
        <td align='left'> ".$rs["n_note_en"]."</td>
        </tr>
      <tr>";
}


  $data = array(
    "list"        =>  $templates,
    "status"      =>  true,
    "pagi_data" => $pagi_data
  
  );


  echo json_encode($data);