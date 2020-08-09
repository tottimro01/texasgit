<?php 

  if($_GET["game"] == "sc")
  {
    $template = "
      <thead>
        <tr>
          <th rowspan='2' class='text-strong'> ลำดับ </th>
          <th rowspan='2' class='text-strong'> ข้อมูล </th>
          <th rowspan='2' class='text-strong'> Selection
          <th rowspan='2' class='text-strong'> Odds </th>
          <th rowspan='2' class='text-strong'> ยอดเล่น </th>
          <th rowspan='2' class='text-strong'> สถานะ </th>
          <th class='text-strong'>Member</th>
          <th class='text-strong'>LV2</th>
          <th class='text-strong'>LV1</th>
          <th class='text-strong'>ohoPa</th>
          <th rowspan='2' class='text-strong'>Company</th>
        </tr>
        <tr>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
        </tr>
      </thead>
      <tbody>
    ";

    for($i=1; $i<=8; $i++){
      $data_table[$i] = "
      <tr class='text-right'>
        <td class='text-center text-middle'>{$i}</td>
        <td class='text-center'>
          <span>ohoPaj99</span><br>
          <strong>93126245</strong><br>
          <span>ฟุตบอล</span><br><span>2019-03-18 21:26:55</span><br>
        </td>
        <td>
          <span class='text-primary'>Over/Under (1st) </span>
          <span class='text-strong'>Under 0.5+1 </span>
          <span class='text-primary'>Live @ 0-0</span><br>
          <span class='text-danger'>เซนต์ จอห์นสโตน เอฟซี (ทีมสำรอง) </span> -vs- <span> พาร์ทิค ทิสเซิล (ทีมสำรอง)</span><br>
          <span class='text-danger'>สก็อตแลนด์ ลีก (ทีมสำรอง) </span><br>
          <span>2019-03-18 <strong>IP:</strong> 223.206.243.227</span><br>
        </td>
        <td class='text-center'>
          <span class='num'>0.95</span><br>
          <span>MY</span><br></td>
        <td>
          <span class='num'>88.00</span><br>
          <span class='num no-skin lossColor'>88.00</span><br>
        </td>
        <td class='text-center'>
          <span class='text-primary'>Won </span><br>
          <span> HT 0:0</span><br><span> FT 0:1</span><br>
        </td>
        <td>
          <span class='num'> 0.00 </span><br>
          <span class='num no-skin lossColor'> 0.00 </span><br>
        </td>
        <td> 
          <span class='num'> 83.60 </span><br>
          <span class='num no-skin lossColor'> 0.00 </span><br>
        </td>
        <td> 
          <span class='num'> 4.40 </span><br>
          <span class='num no-skin lossColor'> 0.44 </span><br>
        </td>
        <td> 
          <span class='num' style='color: rgb(204, 0, 0);'> -76.00 </span><br>
          <span class='num no-skin lossColor' style='color: rgb(204, 0, 0);'> -0.38 </span><br>
        </td>
        <td> 
          <span class='num' style='color: rgb(204, 0, 0);'> -12.06 </span>
        </td>
      </tr>";
    }

    $full= $template.$data_table["1"].$data_table["2"].$data_table["3"].$data_table["4"].$data_table["5"].$data_table["6"].$data_table["7"].$data_table["8"]."</tbody>";
    $data = array(
      "status"    =>  true,
      "result"    =>  $full,
    );
    echo json_encode($data);
  }
  else if($_GET["game"] == "st")
  {
    $template = "
      <thead>
        <tr>
          <th rowspan='2' class='text-strong'> นับ </th>
          <th rowspan='2' class='text-strong'> ข้อมูล </th>
          <th rowspan='2' class='text-strong'> วันที่/เวลา </th>
          <th rowspan='2' class='text-strong'> ยอดเล่น </th>
          <th rowspan='2' class='text-strong'> สถานะ </th>
          <th class='text-strong'>Member</th>
          <th class='text-strong'>LV2</th>
          <th class='text-strong'>LV1</th>
          <th class='text-strong'>ohoPa</th>
          <th rowspan='2' class='text-strong'>Company</th>
        </tr>
        <tr>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
          <th>แพ้/ชนะ <br> ค่าคอม </th>
        </tr>
      </thead>
      <tbody>
    ";

    $data_table = "
      <tr class='text-right cur' onclick='getStepDetail(\"41675560\");'>
        <td class='text-center text-middle'>4</td>
        <td class='text-center'> 
          <span>ohoPaj99</span><br>
          <strong>41675560</strong><br>
          <span>223.206.249.244</span><br>
        </td>
        <td class='text-center'> 2019-03-19 05:04:06 </td>
        <td class='num'> 500.00 </td>
        <td class='text-center'><!--  ด้/เสีย -->
          <span class='text-danger'>Loss </span><br>
        </td>
        <td> 
          <span class='num'> 0.00 </span><br>
          <span class='num no-skin lossColor'> 0.00 </span><br>
        </td>
        <td> 
          <span class='num' style='color: rgb(204, 0, 0);'> -500.00 </span><br>
          <span class='num no-skin lossColor'> 0.00 </span><br>
        </td>
        <td> 
          <span class='num'> 0.00 </span><br>
          <span class='num no-skin lossColor'> 50.00 </span><br>
        </td>
        <td> 
          <span class='num'> 400.00 </span><br>
          <span class='num no-skin lossColor' style='color: rgb(204, 0, 0);'> -40.00 </span><br>
        </td>
        <td> 
          <span class='num'> 90.00</span>
        </td>
      </tr>
   ";

    $full= $template.$data_table."</tbody>";
    $data = array(
      "status"    =>  true,
      "result"    =>  $full,
    );
    echo json_encode($data);
  }

?> 