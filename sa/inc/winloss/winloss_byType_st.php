  <tr>

    <?php 
        $_link = "?";
        foreach ($_GET as $key1 => $value1) {

          if($key1 == "p")
          {
            $value1 = "winloss_user";
          }else if($key1 == "h")
          {
             $h = $_GET['h'].'|'.$key;
             // $h = substr($h, 1);
             $value1 = $h;
          }

          $_link.=$key1."=".$value1."&";
        
        }

        $_link .= "b=".$key;

     ?>
        <td>
          <a href="<?=$_link;?>">
               <?=$value;?>
            </a>  
        </td>
        <td class="aign_r">0</td>
        <td class="aign_r col_a">0</td>
        <td class="aign_r col_a">0</td>
        <td class="aign_r col_a">0</td>
        <td class="aign_r col_b">0</td>
        <td class="aign_r col_b">0</td>
        <td class="aign_r col_b">0</td>
        <td class="aign_r col_c">0</td>
  </tr>