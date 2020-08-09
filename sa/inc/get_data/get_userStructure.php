<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  require('../conn.php');
  require('../function.php');



  function get_share($rs)
  {
        $r_sport_share            = explode(",", $rs["r_sport_share"]);
        $r_sport_share_live       = explode(",", $rs["r_sport_share_live"]);
        $r_lotto_share            = explode(",", $rs["r_lotto_share"]);
        $r_lotto_hun_share        = explode(",", $rs["r_lotto_hun_share"]);
        $r_lotto_hun_set_share    = explode(",", $rs["r_lotto_hun_set_share"]);
        $r_games_share            = explode(",", $rs["r_games_share"]);
        $r_casino_share           = explode(",", $rs["r_casino_share"]);


        $share_text = "";
        $share_text.= "<div class='tree_overflow_w' data-simplebar onselectstart=\"return false;\">
                        <font color='black' class='fshow'> (หุ้นฟุตบอลวันนี้ = ".number_format($r_sport_share[1],0).") </font>
                        <font color='black' class='fshow'> (หุ้นฟุตบอลกำลังแข่ง = ".number_format($r_sport_share_live[1],0).") </font>
                        <font color='black' class='fshow'> (หุ้นกีฬาวันนี้ = ".number_format($r_sport_share[2],0).") </font>
                        <font color='black' class='fshow'> (หุ้นกีฬากำลังแข่ง = ".number_format($r_sport_share_live[2],0).") </font>
                        <font color='black' class='fshow'> (หุ้นมวยไทยวันนี้ = ".number_format($r_sport_share[3],0).") </font>
                        <font color='black' class='fshow'> (หุ้นมวยไทยกำลังแข่ง = ".number_format($r_sport_share_live[3],0).") </font>
                        <font color='black' class='fshow'> (หุ้นสเต็ป = ".number_format($r_sport_share[4],0).") </font>
                        <font color='black' class='fshow'> (หุ้นหวย = ".number_format($r_lotto_share[1],0).") </font>
                        <font color='black' class='fshow'> (หุ้นหวยหุ้น = ".number_format($r_lotto_hun_share[1],0).") </font>
                        <font color='black' class='fshow'> (หุ้นหวยชุด = ".number_format($r_lotto_hun_set_share[1],0).") </font>
                        <font color='black' class='fshow'> (หุ้นเกมส์ = ".number_format($r_games_share[1],0).") </font>
                        <font color='black' class='fshow'> (หุ้นบาคาร่า = ".number_format($r_casino_share[1],0).") </font>
                        <font color='black' class='fshow'> (หุ้นเสือมังกร = ".number_format($r_casino_share[2],0).") </font>
                        <font color='black' class='fshow'> (หุ้นไฮโล = ".number_format($r_casino_share[3],0).") </font>
                        <font color='black' class='fshow'> (หุ้นรูเล็ต = ".number_format($r_casino_share[4],0).") </font>
                       </div> 
                      ";

       return $share_text;           
  }

  // ดึง agent LV1
  if($_POST['id'] == "")
  {
    $sql= "select * from bom_tb_agent where r_level = '1'";
    $re = sql_query($sql);

    $data = [];
    $data["root"]  = true; 
    $data['items'] = [];
    while($rs = sql_fetch_as($re)){

        $share_text =  get_share($rs);

        $data['items'][$rs["r_id"]]["text"]  = "<li>
                                          <i class=\"fa fa-plus\" onclick=\"get_data(".$rs["r_id"].",".$rs["r_level"].",this)\"></i>
                                          <label>
                                              <i class=\"fa fa-user-secret\"></i> ".$rs["r_user"]."
                                              ( <font color='black'>".number_format($rs["r_count"])."</font> )
                                              $share_text
                                          </label>
                                        </li>";
    }

    echo json_encode($data);
    exit();

  }else{

    // ดึง agent  
    $sql= "select r_id , r_agent_id , r_user ,r_level from bom_tb_agent where r_id = '".$_POST["id"]."' and r_level = '".$_POST["lv"]."' ";
    $re_agent=sql_array($sql);

    $r_agent_id = $re_agent["r_agent_id"].$re_agent["r_id"]."*";
    $lv = intval($re_agent["r_level"])+1; 
      
    $sql= "select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".$lv."";
    $re=sql_query($sql);

    $data = [];
    $data["root"]  = false; 
    $data['items'] = [];
    while($rs=sql_fetch($re)){
        $share_text =  get_share($rs);
        $data['items']['r_'.$rs["r_id"].'']["text"]  = "<li>
                                          <i class=\"fa fa-plus bd\" onclick=\"get_data(".$rs["r_id"].",".$rs["r_level"].",this)\"></i>
                                          <label>
                                              <i class=\"fa fa-user-secret\"></i> ".$rs["r_user"]."
                                              ( <font color='black'>".number_format($rs["r_count"])."</font> )
                                              $share_text
                                          </label>
                                        </li>";

    }

    // ดึง member
  $sql= "select * from bom_tb_member where  m_agent_id like '%$r_agent_id%' and m_level=".$lv."";
  $re=sql_query($sql);

  while($rs=sql_fetch($re)){

      $data['items']['m_'.$rs["m_user"].'']["text"]  = "<li>
                                          <label>
                                              <i class=\"fa fa-user\"></i> ".$rs["m_user"]."
                                              ( <font color='black'>".number_format($rs["m_count"])."</font> )
                                          </label>
                                        </li>";
  }



    echo json_encode($data);


  }




  
  

 ?>