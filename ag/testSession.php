<? 

ob_start(); if (!isset($_SESSION)) { session_start(); } 
require('inc/conn.php');
require('inc/function.php');

?>

<?


// $sql="select * from bom_tb_agent where  r_agent_id like '%*$_SESSION[rid]*%'";
// $re=sql_query($sql);

// while($rs=sql_fetch($re)){
// 	$data[aa][$rs[r_id]][name]=$rs[r_name];
// 	$data[aa][$rs[r_id]][user]=$rs[r_user];
// }


$data["session"] = $_SESSION;
echo json_encode($data);

?>
