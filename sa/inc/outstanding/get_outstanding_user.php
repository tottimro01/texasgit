<?

if($_POST["lang"]==""){
    $_SESSION["AGlang"]="th";
}else{
    $_SESSION["AGlang"]=$_POST["lang"];
}   

require('../../lang/sa_lang.php');
require('../conn.php');
require('../function.php');
require('../../../lang/function_array.php');

$view_date=_bdate();

$gametype=$_POST["b"];

  $lv = sql_escape_str($_POST["level"]);
  $id = ($_POST['id'] == "") ? " " :  sql_escape_str($_POST["id"]);

  $q_a = "";
  $q_m = "";
  if(isset($_POST['q']))
  {
    $serch_text = sql_escape_str($_POST["q"]);
    $qq     = "and (m_user like '%$serch_text%' or m_name like '%$serch_text%')";
    $qq_ag  = "and (r_user like '%$serch_text%' or r_name like '%$serch_text%')";
  }
                    
  if($id== "" || $lv == "") // gt level1
  {
    $lv = 1;
  }
  else  
  {
    $sql= "select r_id , r_agent_id , r_user ,r_level from bom_tb_agent where r_id = '".$id."' and r_level = '".$lv."'  ";
    $re_agent=sql_array($sql);

    $r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
    $lv = intval($re_agent["r_level"])+1;

  }


  $rowPerPage = intval($_POST["rowPerPage"]);
  $page       = intval($_POST["thisPage"]);
  $start      = ($page-1)*$rowPerPage;

  $num_row = 0;

  $pagi_data["numrow"] =  $num_row;
  $pagi_data["rowPerPage"] =  $rowPerPage;
  $pagi_data["total_page"] = $rowPerPage; 
  $pagi_data["active_page"] = $page;
  $pagi_data["start_page"]  = $start;



       
        $row_agPerPage = $rowPerPage; // หาแถวที่เป้นแถวของ agent
        $ag_num_row = 0;


             // ดึง agent;
             $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".$lv." $qq_ag LIMIT {$start} , {$row_agPerPage}";
             $re=sql_query($sql);
             $list = "";
             while($rs=sql_fetch($re)){
               $h = $_POST['h'].'|'.$rs['r_level'].'^'.$rs['r_user'].'^'.$rs['r_id'].'^A';
			   
				           $r_level=$rs['r_level'];
				           $ag_level=$rs['r_level']+1;
			             ######################
			             include("inc_ag_share1.php");
			             include("inc_ag.php");
			             ######################
			   
               $list .= "<tr>
                            <td>
                              <a href='?p=outstanding_user&g_p=bill&level=".$rs['r_level']."&id=".$rs['r_id']."&b=".$_POST['b']."&h=".$h."'>
                                  <i class='fa fa-user-secret'></i> ".$rs['r_user']." [ ".$rs['r_name']." ]
                              </a>
                            </td>
                            <td class='aign_r'>"._cbp($psum1,2)."</td>
                            <td class='aign_r col_a'>"._cbp($psum5,2)."</td>
                            <td class='aign_r col_a'>"._cbp($psum6,2)."</td>
                            <td class='aign_r col_a'>"._cbp($psum7,2)."</td>
                            <td class='aign_r col_b'>"._cbp($psum2,2)."</td>
                            <td class='aign_r col_b'>"._cbp($psum3,2)."</td>
                            <td class='aign_r col_b'>"._cbp($psum4,2)."</td>
                      </tr>";
                      $ag_num_row++;

             }

            $row_mPerPage = $rowPerPage-$ag_num_row;  // หาแถวที่เป้นแถวของ member
            $start_member = 0; // กำหนดแถวแรกของ member ให้เป็นแถวที่ 0
            $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' and m_level=".$lv." $qq LIMIT {$start_member} , {$row_mPerPage}";
            $re_m=sql_query($sql);

            while($rs=sql_fetch($re_m)){
                $h = $_POST['h'].'|'.$rs['m_level'].'^'.$rs['m_user'].'^'.$rs['m_id'].'^M';
				
				           $r_level=$rs['m_level'];
				           $ag_level=$rs['m_level']+1;
			             ######################
			             include("inc_ag_share1.php");
			             include("inc_mem.php");
			             ######################
						 
                $list .= "<tr>
                             <td>
                               <a href='?p=outstandingM&g_p=bill&level=".$rs['m_level']."&id=".$rs['m_id']."&b=".$_POST['b']."&h=".$h."'>
                                <i class='fa fa-user'></i> ".$rs['m_user']." [ ".$rs['m_name']." ]
                               </a> 
                             </td>
                             <td class='aign_r'>"._cbp($psum1,2)."</td>
                             <td class='aign_r col_a'>"._cbp($psum5,2)."</td>
                             <td class='aign_r col_a'>"._cbp($psum6,2)."</td>
                             <td class='aign_r col_a'>"._cbp($psum7,2)."</td>
                             <td class='aign_r col_b'>"._cbp($psum2,2)."</td>
                             <td class='aign_r col_b'>"._cbp($psum3,2)."</td>
                             <td class='aign_r col_b'>"._cbp($psum4,2)."</td>
                       </tr>";
                
            }


            $list .= "<tr class=\"col_footer\">
                   <td class=\"vaign_m\">รวม</td>
                   <td class=\"aign_r\">"._cbp(@array_sum($xsum1),2)."</td>
                   <td class=\"aign_r\">"._cbp(@array_sum($xsum5),2)."</td>
                   <td class=\"aign_r\">"._cbp(@array_sum($xsum6),2)."</td>
                   <td class=\"aign_r\">"._cbp(@array_sum($xsum7),2)."</td>
                   <td class=\"aign_r\">"._cbp(@array_sum($xsum2),2)."</td>
                   <td class=\"aign_r\">"._cbp(@array_sum($xsum3),2)."</td>
                   <td class=\"aign_r\">"._cbp(@array_sum($xsum4),2)."</td>
                </tr>";



  $data = array(
    "status" => true, 
    "list" => $list,
    "pagi_data" => $pagi_data,
    "sql" => $sql,
  );

  echo json_encode($data);

?>