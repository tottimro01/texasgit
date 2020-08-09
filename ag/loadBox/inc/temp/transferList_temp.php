<?php

require('inc_head_bySession.php');
$list = "";
for($i =0; $i<= 5; $i++)
{
	$list.= "<tr>
        <td colspan='2' class='text-center'> test_$i </td>
        <td align='right' >0.00</td>
        <td class='text-center' >
            <label>
                <input name='yesterday' id='chkboxYesterday_$i' class='ace ace-checkbox-2 chkboxYesterday' data-id='$i' data-username='test_$i'  data-tmoney='0.00' type='checkbox'>
                <span class='lbl'></span>
            </label>
        </td>
        <td align='right' >0.00</td>
        <td class='text-center' >
            <label>
                <input name='todaychkboxToday' id='chkboxToday_$i' class='ace ace-checkbox-2 chkboxToday' data-id='$i' data-username='test_$i'  data-tmoney='0.00' type='checkbox'>
                <span class='lbl'></span>
            </label>   
        </td>
        <td align='right' >0.00</td>
        <td align='right' >0.00</td>
        <td align='right' >0.00</td>
        <td align='center' >  
            <button type='button' class='btn btn-xs btn-primary' onclick=\"transferMoney_byuser(this,'$i');\">
                <i class='fa fa-check-square' aria-hidden='true'></i>
                <span class='bigger-110'> $lang_ag[29] </span>
            </button> 
        </td>
    </tr>";
}





  $data = array(
    "list"        =>  $list,
    "status"      =>  true,
    "optionPage"  =>  $option = array("page" => "1", "listCount" => "0")
  );
  echo json_encode($data);