<?php 
// ดึงข้อมูล agent และ member ภายใต้ ที่มีค่าน้อยที่สุด
    $ulevel = intval($_POST["session"]["uplevel"])+1;
    $sql="select * from bom_tb_agent where r_agent_id like '%*".$_POST['id']."*%' and r_level='$ulevel'";
    // echo $sql."<br>";
    $reA=sql_query($sql);

    // ฟุตบอบ กีฬา
    $check_r_sport_share_max = array(); 
    $check_r_sport_share_live_max = array(); 
    $check_r_sport_max_all = array(); 
    $check_r_sport_min_all = array(); 
    $check_r_sport_nam_tor_max = array();
    $check_r_sport_nam_rong_max = array();
    
    //สเต็ป
    $check_r_sport_dis_max = array(); 
    $check_r_sport_step2 = array();
    $check_r_sport_step_dis = array();  
    $check_r_sport_step_max = array(); 
    $check_r_sport_step_min = array(); 
    $check_r_sport_step_day = array();
    $check_r_sport_step_paymax = array();

    // หวย
    $check_r_lotto_share = array(); 
    $check_r_lotto_pay1 = array(); 
    $check_r_lotto_dis1 = array();
    $check_r_lotto_pay2 = array(); 
    $check_r_lotto_dis2 = array(); 
    $check_r_lotto_pay3 = array(); 
    $check_r_lotto_dis3 = array();  

     // หวยหุ้น
    $check_r_lotto_hun_share = array(); 
    $check_r_lotto_hun_pay1 = array(); 
    $check_r_lotto_hun_dis1 = array(); 
    $check_r_lotto_hun_pay2 = array(); 
    $check_r_lotto_hun_dis2 = array(); 
    $check_r_lotto_hun_pay3 = array(); 
    $check_r_lotto_hun_dis3 = array(); 

    // หวยชุด
    $check_r_lotto_hun_set_share = array(); 
    $check_r_lotto_hun_set_pay = array(); 
    $check_r_lotto_hun_set_price = array(); 

    // เกมส์
    $check_r_games_share = array(); 
    $check_r_games_dis = array(); 

    // คาสิโน
    $check_r_casino_max = array(); 
    $check_r_casino_share = array(); 

    while($rss=sql_fetch($reA)){
    // ฟุตบอบ กีฬา 
        $exd=@explode(",",$rss['r_sport_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_share_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_share_live']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_share_live_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_dis_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_nam_tor']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_nam_tor_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_nam_rong']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_nam_rong_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_max_all[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_min_all[$key][] = $value;
           }
        }
    // สเต็ป
        $exd=@explode(",",$rss['r_sport_step2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_step_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_dis[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_step_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_step_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_min[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_step_day']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_day[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_sport_step_paymax']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_paymax[$key][] = $value;
           }
        }
    // หวย
        $exd=@explode(",",$rss['r_lotto_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_share[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_pay1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_pay1[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_dis1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_dis1[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_pay2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_pay2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_dis2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_dis2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_pay3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_pay3[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_dis3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_dis3[$key][] = $value;
           }
        }


      // หวยหุ้น
        $exd=@explode(",",$rss['r_lotto_hun_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_share[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_hun_pay1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay1[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_hun_dis1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis1[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['r_lotto_hun_pay2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_hun_dis2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis2[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['r_lotto_hun_pay3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay3[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_hun_dis3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis3[$key][] = $value;
           }
        } 
       // หวยชุด
        
        $exd=@explode(",",$rss['r_lotto_hun_set_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_set_share[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['r_lotto_hun_set_pay']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_set_pay[$key][] = $value;
           }
        }  
        $exd=@explode(",",$rss['r_lotto_hun_set_price']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_set_price[$key][] = $value;
           }
        }
        // เกมส์
        $exd=@explode(",",$rss['r_games_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_games_share[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_games_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_games_dis[$key][] = $value;
           }
        }
        // คาสิโน
        $exd=@explode(",",$rss['r_casino_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_casino_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_share[$key][] = $value;
           }
        }  

    }


    $sql="select * from bom_tb_member where m_agent_id like '%*".$_POST['id']."*%' and m_level='$ulevel'";
    // echo $sql."<br>";
    $reM=sql_query($sql);

    while($rss=sql_fetch($reM)){
      // ฟุตบอบ กีฬา
        $exd=@explode(",",$rss['m_sport_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_max_all[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_min_all[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_nam_tor']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_nam_tor_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_nam_rong']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_nam_rong_max[$key][] = $value;
           }
        }
      // สเต็ป
        $exd=@explode(",",$rss['m_sport_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_dis_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_step2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_step_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_dis[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_step_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_step_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_min[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_step_day']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_day[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_sport_step_paymax']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_sport_step_paymax[$key][] = $value;
           }
        }
      // หวย
        $exd=@explode(",",$rss['m_lotto_pay1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_pay1[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_dis1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_dis1[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['m_lotto_pay2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_pay2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_dis2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_dis2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_pay3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_pay3[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_dis3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_dis3[$key][] = $value;
           }
        }  
        // หวยหุ้น
        $exd=@explode(",",$rss['m_lotto_hun_pay1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay1[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_dis1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis1[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['m_lotto_hun_pay2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_dis2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis2[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_pay3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay3[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_dis3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis3[$key][] = $value;
           }
        }
        // หวยชุด
        $exd=@explode(",",$rss['m_lotto_hun_set_pay']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_set_pay[$key][] = $value;
           }
        }  
        $exd=@explode(",",$rss['m_lotto_hun_set_price']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_set_price[$key][] = $value;
           }
        }
        // เกมส์
        $exd=@explode(",",$rss['m_games_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_games_dis[$key][] = $value;
           }
        }
        // คาสิโน
        $exd=@explode(",",$rss['m_casino_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_max[$key][] = $value;
           }
        }
            
    }
 
    $today_share_max = max($check_r_sport_share_max[1]);
    $sporttoday_share_max = max($check_r_sport_share_max[2]);
    $step_share_max = max($check_r_sport_share_max[3]);

    $live_share_max = max($check_r_sport_share_live_max[1]);
    $sportlive_share_max = max($check_r_sport_share_live_max[2]);
    $torup_max = max($check_r_sport_nam_tor_max[1]);
    $logup_max = max($check_r_sport_nam_rong_max[1]);

    $live_betmoneymax_pair_max = max($check_r_sport_max_all[1]);
    $live_fbetmoneymax_pair_max = max($check_r_sport_max_all[2]);
    $live_betmax_money_max = max($check_r_sport_max_all[3]);
    $live_betmin_money_max = min($check_r_sport_min_all[1]);
    $live_fbetmax_money_max = max($check_r_sport_max_all[4]);
    $live_fbetmin_money_max = min($check_r_sport_min_all[2]);
    $today_com_max = max($check_r_sport_dis_max[1]);

    $sport_com_max = max($check_r_sport_dis_max[2]);
    $sport_betmoneymax_pair_max = max($check_r_sport_max_all[5]);
    $sport_betmax_money_max = max($check_r_sport_max_all[6]);
    $sport_betmin_money_max = min($check_r_sport_min_all[3]);

    $boxing_betmoneymax_pair_max = max($check_r_sport_max_all[7]);
    $boxing_betmax_money_max = max($check_r_sport_max_all[8]);
    $boxing_betmin_money_max = min($check_r_sport_min_all[4]);

    ##############################################

    $step_min_pair_min = min($check_r_sport_step2[1]);
    $step_max_pair_min = min($check_r_sport_step2[2]);

    for($i = 1; $i <= count($check_r_sport_step_dis); $i++)
    {
      $r_sport_step_dis_min_ary[$i] = max(array_filter($check_r_sport_step_dis[$i]));
      $r_sport_step_dis_min_ary[$i] = ($r_sport_step_dis_min_ary[$i] == "") ? 0 : $r_sport_step_dis_min_ary[$i];
    }

    $step_betmax_money_max = max($check_r_sport_step_max[1]);
    $step_betmin_money_max = min($check_r_sport_step_min[1]);
    $step_daymax_money_max = max($check_r_sport_step_day[1]);
    $step_billmax_money_max = max($check_r_sport_step_paymax[1]);

    // print_r($check_r_lotto_pay1);

    $lotto_pay1_max = [];
    foreach ($check_r_lotto_pay1 as $key => $value) {
      $lotto_pay1_max[$key] = max($value);
    }
    $lotto_dis1_max = [];
    foreach ($check_r_lotto_dis1 as $key => $value) {
      $lotto_dis1_max[$key] = max($value);
    }

    $lotto_pay2_max = [];
    foreach ($check_r_lotto_pay2 as $key => $value) {
      $lotto_pay2_max[$key] = max($value);
    }
    $lotto_dis2_max = [];
    foreach ($check_r_lotto_dis2 as $key => $value) {
      $lotto_dis2_max[$key] = max($value);
    }

    $lotto_pay3_max = [];
    foreach ($check_r_lotto_pay3 as $key => $value) {
      $lotto_pay3_max[$key] = max($value);
    }
    $lotto_dis3_max = [];
    foreach ($check_r_lotto_dis3 as $key => $value) {
      $lotto_dis3_max[$key] = max($value);
    }


    $lotto_hun_pay1 = [];
    foreach ($check_r_lotto_hun_pay1 as $key => $value) {
      $lotto_hun_pay1[$key] = max($value);
    }
    $lotto_hun_dis1 = [];
    foreach ($check_r_lotto_hun_dis1 as $key => $value) {
      $lotto_hun_dis1[$key] = max($value);
    }

    $lotto_hun_pay2 = [];
    foreach ($check_r_lotto_hun_pay2 as $key => $value) {
      $lotto_hun_pay2[$key] = max($value);
    }
    $lotto_hun_dis2 = [];
    foreach ($check_r_lotto_hun_dis2 as $key => $value) {
      $lotto_hun_dis2[$key] = max($value);
    }

    $lotto_hun_pay3 = [];
    foreach ($check_r_lotto_hun_pay3 as $key => $value) {
      $lotto_hun_pay3[$key] = max($value);
    }
    $lotto_hun_dis3 = [];
    foreach ($check_r_lotto_hun_dis3 as $key => $value) {
      $lotto_hun_dis3[$key] = max($value);
    }


    $lotto_share_max = max($check_r_lotto_share[1]);
    $lotto_hun_share_max = max($check_r_lotto_hun_share[1]);
    $lotto_hun_set_share_max = max($check_r_lotto_hun_set_share[1]);


    $lotto_hun_set_pay = [];
    foreach ($check_r_lotto_hun_set_pay as $key => $value) {
      $lotto_hun_set_pay[$key] = max($value);
    }

    $lotto_hun_set_price = [];
    foreach ($check_r_lotto_hun_set_price as $key => $value) {
      $lotto_hun_set_price[$key] = max($value);
    }

    $game_share_max = max($check_r_games_share[1]);
    $game_com_max = max($check_r_games_dis[1]);

 ?>