<?php
   $template = "
      <table class='table table-striped table-bordered table-hover'>
         <thead>
            <tr>
               <th>คู่แข่งขัน</th>
               <th>รายละเอียด</th>
               <th>ครึ่งแรก</th>
               <th>เต็มเวลา</th>
               <th>สถานะ</th>
            </tr>
         </thead>
         <tbody>
            <tr class='text-left' style='background-color:#87b87f;color: #fff;'>
               <td colspan='5'>
                  <span class='text-strong'>4 - Fold (1 Bet)</span> &nbsp;
               </td>
            </tr>
            <tr class='text-center' style=''>
               <td>
                  <span> สเปน พรีเมียร์ ลาลีก้า </span><br>
                  <span class='text-danger'> แอตเลติโก้ มาดริด </span> <strong>vs</strong> <span> คิโรน่า </span>
               </td>
               <td>
                  <span class='text-primary'></span>
                  <span class='text-strong'>
                     <span class='text-danger'> แอตเลติโก้ มาดริด</span><br>
                     1+1.5 @ 1.87 [0 : 0]
                  </span>
               </td>
               <td> 0 : 0 </td>
               <td> 2 : 0 </td>
               <td>
                  <span class='text-primary'>Won </span><br>
                  <strong class='text-primary'>T</strong>.2 : 0
               </td>
            </tr>
            <tr class='text-center' style=''>
               <td>
                  <span> อังกฤษ พรีเมียร์ ลีก </span><br>
                  <span class='text-danger'> วัตฟอร์ด </span> <strong>vs</strong> <span> ฟูแล่ม </span>
               </td>
               <td>
                  <span class='text-primary'></span>
                  <span class='text-strong'>
                  <span class='text-danger'> Over </span><br>                                                                                
                     2.5+3 @ 1.92 [0 : 0]
                  </span>
               </td>
               <td> 1 : 1 </td>
               <td> 4 : 1 </td>
               <td>
                  <span class='text-primary'>Won </span><br>
                  <strong class='text-primary'>T</strong>.4 : 1
               </td>
            </tr>
            <tr class='text-center' style=''>
               <td>
                  <span> กัลโช่ เซเรีย เอ </span><br>
                  <span> กายารี่ </span> <strong>vs</strong> <span class='text-danger'> ยูเวนตุส </span>
               </td>
               <td>
                  <span class='text-primary'></span>
                  <span class='text-strong'>
                     <span class='text-danger'> ยูเวนตุส </span><br>                                                                         
                        0.5 @ 1.79 [0 : 0]
                  </span>
               </td>
               <td> 0 : 1 </td>
               <td> 0 : 2 </td>
               <td>
                  <span class='text-primary'>Won </span><br>
                  <strong class='text-primary'>T</strong>.0 : 2
               </td>
            </tr>
            <tr class='text-center' style=''>
               <td>
                  <span> ฝรั่งเศส คัพ </span><br>
                  <span class='text-danger'> โอลิมปิก ลียง </span> <strong>vs</strong> <span> สเตด แรนส์ </span>
               </td>
               <td>
                  <span class='text-primary'></span>
                  <span class='text-strong'>
                  <span class='text-danger'> โอลิมปิก ลียง</span><br>
                     1.0 @ 1.81 [0 : 0]
                  </span>
               </td>
               <td> 0 : 1 </td>
               <td> 2 : 3 </td>
               <td>
                  <span class='text-danger'>Loss </span><br>
                  <strong class='text-primary'>T</strong>.2 : 3
               </td>
            </tr>
            <tr class='text-left' style='background-color:#dddddd;'>
               <td colspan='5' class='text-info'>
                  <span class='text-strong'>ยอดเล่น : 20,000</span> &nbsp;
                  <span>
                     [ <span class='text-strong num' style='color: rgb(204, 0, 0);'> -20,000.00</span> ]
                  </span>
               </td>
            </tr>
         </tbody>
         <tfoot>
            <tr class='text-left'>
               <td colspan='5'>
                  <span class='text-strong'>Bet ID :</span> &nbsp;
                  <span>41675560</span> &nbsp;&nbsp;&nbsp;&nbsp;
                  <span class='text-strong'>Bet Money :</span> &nbsp;
                  <span>
                     <span>
                           500 [ <span class='num' style='color: rgb(204, 0, 0);'> -500.00</span> ]
                     </span> &nbsp;&nbsp;
                  </span>
               </td>
            </tr>
         </tfoot>
      </table>
   ";
   $data = array(
      "status"    =>  true,
      "result"    =>  $template,
   );
   echo json_encode($data);
?>