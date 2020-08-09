<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
  if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  require('../../conn.php');
  require('../../function.php');
  require('../../ag_function.php');
  require('../../../lang/ag_lang.php');
  require('../../../lang/function_array.php');



  include "getWinlossM_Bill_".$_GET["game"].".php";
    $data = array(
      "status"    =>  true,
      "result"    =>  $full,
    );
    echo json_encode($data);


  // if($_GET["game"] == "sc")
  // {
    
  //   include "getWinlossM_Bill_sc.php";
  //   $data = array(
  //     "status"    =>  true,
  //     "result"    =>  $full,
  //   );
  //   echo json_encode($data);
  // }
  // else if($_GET["game"] == "st")
  // {
  //   $template = "
  //     <thead>
  //       <tr>
  //         <th rowspan='2' class='text-strong'> นับ </th>
  //         <th rowspan='2' class='text-strong'> ข้อมูล </th>
  //         <th rowspan='2' class='text-strong'> วันที่/เวลา </th>
  //         <th rowspan='2' class='text-strong'> ยอดเล่น </th>
  //         <th rowspan='2' class='text-strong'> สถานะ </th>
  //         <th class='text-strong'>Member</th>
  //         <th class='text-strong'>LV2</th>
  //         <th class='text-strong'>LV1</th>
  //         <th class='text-strong'>ohoPa</th>
  //         <th rowspan='2' class='text-strong'>Company</th>
  //       </tr>
  //       <tr>
  //         <th>แพ้/ชนะ <br> ค่าคอม </th>
  //         <th>แพ้/ชนะ <br> ค่าคอม </th>
  //         <th>แพ้/ชนะ <br> ค่าคอม </th>
  //         <th>แพ้/ชนะ <br> ค่าคอม </th>
  //       </tr>
  //     </thead>
  //     <tbody>
  //   ";

  //   $data_table = "
  //     <tr class='text-right cur' onclick='getStepDetail(\"41675560\");'>
  //       <td class='text-center text-middle'>4</td>
  //       <td class='text-center'> 
  //         <span>ohoPaj99</span><br>
  //         <strong>41675560</strong><br>
  //         <span>223.206.249.244</span><br>
  //       </td>
  //       <td class='text-center'> 2019-03-19 05:04:06 </td>
  //       <td class='num'> 500.00 </td>
  //       <td class='text-center'><!--  ด้/เสีย -->
  //         <span class='text-danger'>Loss </span><br>
  //       </td>
  //       <td> 
  //         <span class='num'> 0.00 </span><br>
  //         <span class='num no-skin lossColor'> 0.00 </span><br>
  //       </td>
  //       <td> 
  //         <span class='num' style='color: rgb(204, 0, 0);'> -500.00 </span><br>
  //         <span class='num no-skin lossColor'> 0.00 </span><br>
  //       </td>
  //       <td> 
  //         <span class='num'> 0.00 </span><br>
  //         <span class='num no-skin lossColor'> 50.00 </span><br>
  //       </td>
  //       <td> 
  //         <span class='num'> 400.00 </span><br>
  //         <span class='num no-skin lossColor' style='color: rgb(204, 0, 0);'> -40.00 </span><br>
  //       </td>
  //       <td> 
  //         <span class='num'> 90.00</span>
  //       </td>
  //     </tr>
  //  ";

  //   $full= $template.$data_table."</tbody>";
  //   $data = array(
  //     "status"    =>  true,
  //     "result"    =>  $full,
  //   );
  //   echo json_encode($data);
  // }

?> 