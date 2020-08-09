<?php 


 $template = "
      <thead>
        <tr>
          <th rowspan='2' class='text-strong'> {$lang_ag[238]} </th>
          <th rowspan='2' class='text-strong'> {$lang_ag[403]} </th>
          <th rowspan='2' class='text-strong'> Selection
          <th rowspan='2' class='text-strong'> Odds </th>
          <th rowspan='2' class='text-strong'> {$lang_ag[255]} </th>
          <th rowspan='2' class='text-strong'> {$lang_ag[184]} </th>
          <th class='text-strong'>Member</th>
          <th class='text-strong'>LV2</th>
          <th class='text-strong'>LV1</th>
          <th class='text-strong'>ohoPa</th>
          <th rowspan='2' class='text-strong'>Company</th>
        </tr>
        <tr>
          <th>{$lang_ag[429]} <br> {$lang_ag[210]} </th>
          <th>{$lang_ag[429]} <br> {$lang_ag[210]} </th>
          <th>{$lang_ag[429]} <br> {$lang_ag[210]} </th>
          <th>{$lang_ag[429]} <br> {$lang_ag[210]} </th>
        </tr>
      </thead>
      <tbody>
    ";
    $data_table = "";
    for($i=1; $i<=8; $i++){
      $data_table .= "
      <tr class='text-right'>
        <td class='text-center text-middle'>{$i}</td>
        <td class='text-center'>
          <span>ohoPaj99</span><br>
          <strong>93126245</strong><br>
          <span>{$lang_ag[2142]}</span><br><span>2019-03-18 21:26:55</span><br>
        </td>
        <td>";
        for($j=0; $j<=2;$j++)
        {
          $data_table .="
          <span class='text-primary'>Over/Under (1st) </span>
          <span class='text-strong'>Under 0.5+1 </span>
          <span class='text-primary'>Live @ 0-0</span><br>
          <span class='text-danger'>เซนต์ จอห์นสโตน เอฟซี (ทีมสำรอง) </span> -vs- <span> พาร์ทิค ทิสเซิล (ทีมสำรอง)</span><br>
          <span class='text-danger'>สก็อตแลนด์ ลีก (ทีมสำรอง) </span><br>
          <span>2019-03-18 <strong>IP:</strong> 223.206.243.227</span><hr>";
        }

      $data_table .="</td>
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

    $full= $template.$data_table."</tbody>";







 ?>