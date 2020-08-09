<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }

  require('lang/ag_'.$_SESSION["AGlang"].'.php');
  include "inc/function.php";
  include "inc/conn.php";


$head =	"<tr>
    <th rowspan='2' class='text-strong'> {$lang_betReject[11]} </th>   
    <th rowspan='2' class='text-strong'> {$lang_betReject[12]} </th>    
    <th rowspan='2' class='text-strong'> {$lang_betReject[13]} </th>       
    <th rowspan='2' class='text-strong'> {$lang_betReject[14]} </th>  
    <th rowspan='2' class='text-strong'> {$lang_betReject[15]} </th>    
    <th rowspan='2' class='text-strong'> {$lang_betReject[16]} </th>  
    </tr>";



$list = "<tr class='text-right'>
               <td class='text-center text-middle'>1</td>
               <td class='text-center'>                
                   <span>{$_POST["suser"]}</span><br/>
                   <strong>94620811</strong><br/>                
                   <span>Soccer</span><br/>
                   <span>2019-04-02 00:25:48</span><br/>
                </td>
                <td >
                    <span class='text-primary'>Handicap</span>
                    <span class='text-strong'>
                    	<span class='text-danger'> FCI Levadia Tallinn U21</span><br/> 
                        1.0	               
                    </span>                	                    
                    <span class='text-primary'>Live 2-0</span><br/>
                    <span class='text-danger'>FCI Levadia Tallinn U21 </span> -vs- <span > Tartu JK Welco</span><br/> 
                    <span class='text-danger'>ESTONIA ESILIIGA </span><br/>
                    <span>2019-04-01 <strong>IP:</strong> 223.206.241.122</span><br/>
                </td>            
                <td class='text-center'>
                	<span class='num'>0.89</span><br/>
                	<span>MY</span><br/>
                </td>
                <td >
                	<span class='num'>30,000.00</span><br/>
                	<span class='num no-skin lossColor'>30,000.00</span><br/>
                </td>
                <td class='text-center'>
                	<span class='text-danger'>Reject </span><br/>
                </td>
            </tr>";

	$data = [];
	$data = array(
	    'head' => $head,
	    'list' => $list,
	    'status' => true,
	);
	
	echo json_encode($data);

?>	

