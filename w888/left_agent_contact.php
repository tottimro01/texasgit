<?php   
  ob_start();
  if (!isset($_SESSION)){ session_start(); } 
?>
<style> 
    #ag_contact 
    {
      border: 1px solid #111929;
      width: 185px;
      background: #fff;
      padding: 5px;
      margin: 5px auto;
      display: block;
      box-sizing: border-box;
    }

   /* #sp2 #ag_contact 
    {
      width: 180px; 
    }*/

    #ag_contact td
    {
      vertical-align: middle;
    }
</style>
    
  <?php 
  $up_level = intval($_SESSION['m_level'])-1;
  // print_r($_SESSION['r'.$up_level]);
  if($_SESSION['r'.$up_level]['r_phone1'] != "" || $_SESSION['r'.$up_level]['r_phone2'] != "" || $_SESSION['r'.$up_level]['r_lineid'] != "")
  {
    ?>
  <div id="ag_contact">
        <table> 
    <?
        if($_SESSION['r'.$up_level]['r_phone1'] != "")
        {
         
          ?>
              <tr>  
                  <td> <img src="img/contact_icon/phone.png" alt="" class="ag_contact_icon" > </td> 
                  <td>  เบอร์โทร 1  </td>
                  <td>
                      : <?=$_SESSION['r'.$up_level]['r_phone2'];?>
                  </td>
              </tr>

          <?
        } 

        if($_SESSION['r'.$up_level]['r_phone2'] != "")
        {
         
          ?>
              <tr>  
                  <td> <img src="img/contact_icon/phone.png" alt="" class="ag_contact_icon" > </td>   
                  <td> เบอร์โทร 2  </td>
                  <td>
                      : <?=$_SESSION['r'.$up_level]['r_phone2'];?>
                  </td>
              </tr>

          <?
        } 

        if($_SESSION['r'.$up_level]['r_lineid'] != "")
        {
          ?>
                <tr> 
                    <td> <img src="img/contact_icon/lind.png" alt="" class="ag_contact_icon" >  </td>  
                    <td>  ไลน์ไอดี  </td>
                    <td>
                        : <?=$_SESSION['r'.$up_level]['r_lineid'];?>
                    </td>
                </tr>

          <?
        }

        ?>
        </table>
  </div>
        
        <?
   }  

  ?>



