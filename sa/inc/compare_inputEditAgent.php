<?php 

$ulevel = 2;
$sql="select * from bom_tb_agent where r_agent_id like '%*".$id."*%' and r_level='$ulevel'";
$reA=sql_query($sql);

// ฟุตบอบ กีฬา
$check_r_sport_share_max = array(); 
$check_r_sport_share_live_max = array(); 
$check_r_sport_max_all = array(); 
$check_r_sport_min_all = array(); 
$check_r_nam_max = array();
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
$check_r_lotto_max  = array(); 
$check_r_lotto_min  = array();
$check_r_lotto_pay1 = array(); 
$check_r_lotto_dis1 = array();
$check_r_lotto_pay2 = array(); 
$check_r_lotto_dis2 = array(); 
$check_r_lotto_pay3 = array(); 
$check_r_lotto_dis3 = array();  

 // หวยหุ้น
$check_r_lotto_hun_share = array(); 
$check_r_lotto_hun_max  = array(); 
$check_r_lotto_hun_min  = array(); 
$check_r_lotto_hun_pay1_max = array(); 
$check_r_lotto_hun_dis1_max = array(); 
$check_r_lotto_hun_pay2_max = array(); 
$check_r_lotto_hun_dis2_max = array(); 
$check_r_lotto_hun_pay3_max = array(); 
$check_r_lotto_hun_dis3_max = array(); 

// หวยชุด
$check_r_lotto_hun_set_share = array(); 
$check_r_lotto_hun_set_pay = array(); 
$check_r_lotto_hun_set_price = array(); 

// เกมส์
$check_r_games_share = array(); 
$check_r_games_dis = array();
$check_r_games_max = array();
$check_r_games_min = array(); 

// คาสิโน
$check_r_casino_max = array(); 
$check_r_casino_share = array(); 
$check_r_casino_min = array(); 
$check_r_casino_dis = array();   


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

        $check_r_nam[] = $rss['r_nam'];

        // $exd=@explode(",",$rss['r_sport_nam_tor']);
        // foreach ($exd as $key => $value) {
        //    if($key > 0){    
        //         $check_r_sport_nam_tor_max[$key][] = $value;
        //    }
        // }
        // $exd=@explode(",",$rss['r_sport_nam_rong']);
        // foreach ($exd as $key => $value) {
        //    if($key > 0){    
        //         $check_r_sport_nam_rong_max[$key][] = $value;
        //    }
        // }
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

        $exd=@explode(",",$rss['r_lotto_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_max[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['r_lotto_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_min[$key][] = $value;
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

        $exd=@explode(",",$rss['r_lotto_hun_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_max[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['r_lotto_hun_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_min[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['r_lotto_hun_pay1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay1_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_hun_dis1']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis1_max[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['r_lotto_hun_pay2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay2_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_hun_dis2']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis2_max[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['r_lotto_hun_pay3']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay3_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['r_lotto_hun_dis3_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis3_max[$key][] = $value;
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

        $exd=@explode(",",$rss['r_games_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_games_max[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['r_games_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_games_min[$key][] = $value;
           }
        }
        // คาสิโน
        $exd=@explode(",",$rss['r_casino_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_max[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['r_casino_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_min[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['r_casino_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_dis[$key][] = $value;
           }
        }


        $exd=@explode(",",$rss['r_casino_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_share[$key][] = $value;
           }
        }  

    }


    $sql="select * from bom_tb_member where m_agent_id like '%*".$id."*%' and m_level='$ulevel'";
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

        $check_r_nam[] = $rss['m_nam'];

        // $exd=@explode(",",$rss['m_sport_nam_tor']);
        // foreach ($exd as $key => $value) {
        //    if($key > 0){    
        //         $check_r_sport_nam_tor_max[$key][] = $value;
        //    }
        // }
        // $exd=@explode(",",$rss['m_sport_nam_rong']);
        // foreach ($exd as $key => $value) {
        //    if($key > 0){    
        //         $check_r_sport_nam_rong_max[$key][] = $value;
        //    }
        // }
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

        $exd=@explode(",",$rss['m_lotto_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_min[$key][] = $value;
           }
        }

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

        $exd=@explode(",",$rss['r_lotto_hun_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_max[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['r_lotto_hun_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_min[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['m_lotto_hun_pay1_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay1_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_dis1_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis1_max[$key][] = $value;
           }
        } 
        $exd=@explode(",",$rss['m_lotto_hun_pay2_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay2_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_dis2_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis2_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_pay3_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_pay3_max[$key][] = $value;
           }
        }
        $exd=@explode(",",$rss['m_lotto_hun_dis3_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_lotto_hun_dis3_max[$key][] = $value;
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

        $exd=@explode(",",$rss['m_games_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_games_max[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['m_games_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_games_min[$key][] = $value;
           }
        }

        // คาสิโน
        $exd=@explode(",",$rss['m_casino_max']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_max[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['m_casino_min']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_min[$key][] = $value;
           }
        }

        $exd=@explode(",",$rss['m_casino_dis']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_dis[$key][] = $value;
           }
        }
            
    }



    $today_share_max = (max($check_r_sport_share_max[1]) == "") ? 0 : max($check_r_sport_share_max[1]);
    $sporttoday_share_max = (max($check_r_sport_share_max[2])=="") ? 0 : max($check_r_sport_share_max[2]);
    $boxingtoday_share_max = (max($check_r_sport_share_max[3])=="") ? 0 : max($check_r_sport_share_max[3]);
    $step_share_max = (max($check_r_sport_share_max[4]) == "") ? 0 : max($check_r_sport_share_max[4]);

    $live_share_max = (max($check_r_sport_share_live_max[1]) == "") ? 0 : max($check_r_sport_share_live_max[1]);
    $sportlive_share_max = (max($check_r_sport_share_live_max[2]) == "") ? 0 : max($check_r_sport_share_live_max[2]);
    $boxinglive_share_max = (max($check_r_sport_share_live_max[3]) == "") ? 0 : max($check_r_sport_share_live_max[3]);

    $r_nam_max = max($check_r_nam);
    // $torup_max = max($check_r_sport_nam_tor_max[1]);
    // $logup_max = max($check_r_sport_nam_rong_max[1]);

    $r_nam_max =($r_nam_max == "") ? 0 : $r_nam_max;
    // $torup_max =($torup_max == "") ? 0 : $torup_max;
    // $logup_max =($logup_max == "") ? 0 : $logup_max;

    $live_betmoneymax_pair_max = max($check_r_sport_max_all[1]);
    $live_fbetmoneymax_pair_max = max($check_r_sport_max_all[2]);
    $live_betmax_money_max = max($check_r_sport_max_all[3]);
    $live_betmin_money_max = min($check_r_sport_min_all[1]);
    $live_fbetmax_money_max = max($check_r_sport_max_all[4]);
    $live_fbetmin_money_max = min($check_r_sport_min_all[2]);
    $today_com_max = max($check_r_sport_dis_max[1]);

    $live_betmoneymax_pair_max =($live_betmoneymax_pair_max == "") ? $min_betmin_money : $live_betmoneymax_pair_max;
    $live_fbetmoneymax_pair_max =($live_fbetmoneymax_pair_max == "") ? $min_betmin_money : $live_fbetmoneymax_pair_max;
    $live_betmax_money_max =($live_betmax_money_max == "") ? $min_betmin_money : $live_betmax_money_max;
    $live_betmin_money_max =($live_betmin_money_max == "") ? $max_betmin_money : $live_betmin_money_max;
    $live_fbetmax_money_max =($live_fbetmax_money_max == "") ? $min_betmin_money : $live_fbetmax_money_max;
    $live_fbetmin_money_max =($live_fbetmin_money_max == "") ? $max_betmin_money : $live_fbetmin_money_max;
    $today_com_max =($today_com_max == "") ? 0 : $today_com_max;


    $sport_com_max = max($check_r_sport_dis_max[2]);
    $sport_betmoneymax_pair_max = max($check_r_sport_max_all[5]);
    $sport_betmax_money_max = max($check_r_sport_max_all[6]);
    $sport_betmin_money_max = min($check_r_sport_min_all[3]);

    $sport_com_max =($sport_com_max == "") ? 0 : $sport_com_max;
    $sport_betmoneymax_pair_max =($sport_betmoneymax_pair_max == "") ? $min_betmin_money : $sport_betmoneymax_pair_max;
    $sport_betmax_money_max =($sport_betmax_money_max == "") ? $min_betmin_money : $sport_betmax_money_max;
    $sport_betmin_money_max =($sport_betmin_money_max == "") ? $max_betmin_money : $sport_betmin_money_max;

    $boxing_com_max = max($check_r_sport_dis_max[3]);
    $boxing_betmoneymax_pair_max = max($check_r_sport_max_all[7]);
    $boxing_betmax_money_max = max($check_r_sport_max_all[8]);
    $boxing_betmin_money_max = min($check_r_sport_min_all[4]);

    $boxing_com_max =($boxing_com_max == "") ? 0 : $boxing_com_max;
    $boxing_betmoneymax_pair_max =($boxing_betmoneymax_pair_max == "") ? $min_betmin_money : $boxing_betmoneymax_pair_max;
    $boxing_betmax_money_max =($boxing_betmax_money_max == "") ? $min_betmin_money : $boxing_betmax_money_max;
    $boxing_betmin_money_max =($boxing_betmin_money_max == "") ? $max_betmin_money : $boxing_betmin_money_max;

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

    $step_betmax_money_max =($step_betmax_money_max == "") ? $min_betmin_money : $step_betmax_money_max;
    $step_betmin_money_max =($step_betmin_money_max == "") ? $max_betmin_money : $step_betmin_money_max;
    $step_daymax_money_max =($step_daymax_money_max == "") ? $min_betmin_money : $step_daymax_money_max;
    $step_billmax_money_max =($step_billmax_money_max == "") ? $min_betmin_money : $step_billmax_money_max;




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


    $lotto_hun_pay1_max = [];
    foreach ($check_r_lotto_hun_pay1_max as $key => $value) {
      $lotto_hun_pay1_max[$key] = max($value);
    }
    $lotto_hun_dis1_max = [];
    foreach ($check_r_lotto_hun_dis1_max as $key => $value) {
      $lotto_hun_dis1_max[$key] = max($value);
    }

    $lotto_hun_pay2_max = [];
    foreach ($check_r_lotto_hun_pay2_max as $key => $value) {
      $lotto_hun_pay2_max[$key] = max($value);
    }
    $lotto_hun_dis2_max = [];
    foreach ($check_r_lotto_hun_dis2_max as $key => $value) {
      $lotto_hun_dis2_max[$key] = max($value);
    }

    $lotto_hun_pay3_max = [];
    foreach ($check_r_lotto_hun_pay3_max as $key => $value) {
      $lotto_hun_pay3_max[$key] = max($value);
    }
    $lotto_hun_dis3_max = [];
    foreach ($check_r_lotto_hun_dis3_max as $key => $value) {
      $lotto_hun_dis3_max[$key] = max($value);
    }


    $lotto_share_max = (max($check_r_lotto_share[1]) == "") ? 0 : max($check_r_lotto_share[1]);
    $r_lotto_max_max = (max($check_r_lotto_max[1]) == "") ? $min_betmin_money : max($check_r_lotto_max[1]);
    $r_lotto_min_max = (min($check_r_lotto_min[1]) == "") ? $max_betmin_money : min($check_r_lotto_min[1]);

    $lotto_hun_share_max = (max($check_r_lotto_hun_share[1]) == "") ? 0 : max($check_r_lotto_hun_share[1]);
    $r_lotto_hun_max_max = (max($check_r_lotto_hun_max[1]) == "") ? $min_betmin_money : max($check_r_lotto_hun_max[1]);
    $r_lotto_hun_min_max = (min($check_r_lotto_hun_min[1]) == "") ? $max_betmin_money : min($check_r_lotto_hun_min[1]);

    $lotto_hun_set_share_max = (max($check_r_lotto_hun_set_share[1]) == "") ? 0 : max($check_r_lotto_hun_set_share[1]);

    $lotto_hun_set_pay_max = [];
    foreach ($check_r_lotto_hun_set_pay as $key => $value) {
      $lotto_hun_set_pay_max[$key] = max($value);
    }

    $lotto_hun_set_price_max = [];
    foreach ($check_r_lotto_hun_set_price as $key => $value) {
      $lotto_hun_set_price_max[$key] = min($value);
    }

    $game_share_max = (max($check_r_games_share[1]) == "") ? 0 : max($check_r_games_share[1]); 
    $game_com_max = (max($check_r_games_dis[1]) == "") ? 0 : max($check_r_games_dis[1]); 
    $game_max_max = (max($check_r_games_max[1]) == "") ? $min_betmin_money : max($check_r_games_max[1]);
    $game_min_max = (min($check_r_games_min[1]) == "") ? $max_betmin_money :min($check_r_games_min[1]);


   $r_casino_share_max = [];
   foreach ($check_r_casino_share as $key => $value) {
      $r_casino_share_max[$key] = max($value);
   }

   $r_casino_max_max = [];
   foreach ($check_r_casino_max as $key => $value) {
      $r_casino_max_max[$key] = max($value);
   }


//tab 0
$ex_today_share = str_replace(",","",$_POST["today_share"]);
$ex_live_share = str_replace(",","",$_POST["live_share"]);
$ex_torup = str_replace(",","",$_POST["torup"]);
$ex_logup = str_replace(",","",$_POST["logup"]); 
$ex_today_com = str_replace(",","",$_POST["today_com"]);
$ex_live_betmoneymax_pair = str_replace(",","",$_POST["live_betmoneymax_pair"]);
$ex_live_fbetmoneymax_pair = str_replace(",","",$_POST["live_fbetmoneymax_pair"]);
$ex_live_betmax_money = str_replace(",","",$_POST["live_betmax_money"]);
$ex_live_fbetmax_money = str_replace(",","",$_POST["live_fbetmax_money"]);
$ex_live_betmin_money = str_replace(",","",$_POST["live_betmin_money"]);
$ex_live_fbetmin_money = str_replace(",","",$_POST["live_fbetmin_money"]);

//tab 1
$ex_sporttoday_share = str_replace(",","",$_POST["sporttoday_share"]);
$ex_sportlive_share = str_replace(",","",$_POST["sportlive_share"]);
$ex_sport_com = str_replace(",","",$_POST["sport_com"]);
$ex_sport_betmoneymax_pair = str_replace(",","",$_POST["sport_betmoneymax_pair"]);
$ex_sport_betmax_money = str_replace(",","",$_POST["sport_betmax_money"]);
$ex_sport_betmin_money = str_replace(",","",$_POST["sport_betmin_money"]);

//tab 1
$ex_boxingtoday_share = str_replace(",","",$_POST["boxingtoday_share"]);
$ex_boxinglive_share = str_replace(",","",$_POST["boxinglive_share"]);
$ex_boxing_com = str_replace(",","",$_POST["boxing_com"]);
$ex_boxing_betmoneymax_pair = str_replace(",","",$_POST["boxing_betmoneymax_pair"]);
$ex_boxing_betmax_money = str_replace(",","",$_POST["boxing_betmax_money"]);
$ex_boxing_betmin_money = str_replace(",","",$_POST["boxing_betmin_money"]);

//tab 2
$ex_step_share = str_replace(",","",$_POST["step_share"]);
$ex_step_betmax_money = str_replace(",","",$_POST["step_betmax_money"]);
$ex_step_betmin_money = str_replace(",","",$_POST["step_betmin_money"]);
$ex_step_daymax_money = str_replace(",","",$_POST["step_daymax_money"]);
$ex_step_billmax_money = str_replace(",","",$_POST["step_billmax_money"]);
$ex_step_min_pair = str_replace(",","",$_POST["step_min_pair"]);
$ex_step_max_pair = str_replace(",","",$_POST["step_max_pair"]);

//tab 3
$ex_lotto_share = str_replace(",","",$_POST["lotto_share"]);

//tab 4
$ex_lotto_share_hun = str_replace(",","",$_POST["lotto_share_hun"]);
$ex_lotto_betmax_money = str_replace(",","",$_POST["lotto_betmax_money"]);
$ex_lotto_betmin_money = str_replace(",","",$_POST["lotto_betmin_money"]);

//tab 5
$ex_lotto_hun_set_share = str_replace(",","",$_POST["lotto_hun_set_share"]);
$ex_lotto_share_hun_betmax_money = str_replace(",","",$_POST["lotto_share_hun_betmax_money"]);
$ex_lotto_share_hun_betmin_money = str_replace(",","",$_POST["lotto_share_hun_betmin_money"]);

//tab 6
$ex_game_share = str_replace(",","",$_POST["game_share"]);
$ex_game_com = str_replace(",","",$_POST["game_com"]);
$ex_game_max = str_replace(",","",$_POST["game_max"]);
$ex_game_min = str_replace(",","",$_POST["game_min"]);


// $xy = $ex_live_fbetmoneymax_pair."<".$live_fbetmoneymax_pair_max;
//    $data  = array(
//      'msg'     => "99999",
//      'status'  =>  false,
//      'sql' => $sql,
//      'xy'  => $xy,
//    );
//    echo json_encode($data);
//    exit();

// tab 0

if($ex_today_share > $max_share_config || $ex_today_share < $today_share_max || !is_numeric($ex_today_share)){
  warningInput(0,"หุ้นกีฬาวันนี้ ไม่ถูกต้อง","today_share");
}else if($ex_live_share > $max_share_config || $ex_live_share < $live_share_max || !is_numeric($ex_live_share)){
    warningInput(0,"หุ้นกีฬากำลังแข่ง ไม่ถูกต้อง","live_share");
}else if($ex_today_com > $max_sport_com || $ex_today_com < $today_com_max || !is_numeric($ex_today_com)){
    warningInput(0,"ค่าคอม ไม่ถูกต้อง","today_com");
}
// else if($_POST["r_nam"]> 8 || $_POST["r_nam"] < $r_nam_max || !is_numeric($_POST["r_nam"])){
//     warningInput(0,"ค่าน้ำ ไม่ถูกต้อง","r_nam");
// }
else if($ex_live_betmoneymax_pair < $live_betmoneymax_pair_max || !is_numeric($ex_live_betmoneymax_pair)){
    warningInput(0,"45 นาทีสูงสุด/คู่ ไม่ถูกต้อง","live_betmoneymax_pair");
}else if($ex_live_fbetmoneymax_pair < $live_fbetmoneymax_pair_max || !is_numeric($ex_live_fbetmoneymax_pair)){
    warningInput(0,"90 นาทีสูงสุด/คู่ ไม่ถูกต้อง","live_fbetmoneymax_pair");
}else if($ex_live_betmax_money < $live_betmax_money_max || !is_numeric($ex_live_betmax_money)){
    warningInput(0,"45 นาทีสูงสุด/ไม้ ไม่ถูกต้อง","live_betmax_money");
}else if($ex_live_fbetmax_money < $live_fbetmax_money_max || !is_numeric($ex_live_fbetmax_money)){
    warningInput(0,"90 นาทีสูงสุด/ไม้ ไม่ถูกต้อง","live_fbetmax_money");
}else if($ex_live_betmin_money > $live_betmin_money_max || $ex_live_betmin_money < $min_betmin_money || !is_numeric($ex_live_betmin_money)){
    warningInput(0,"45 นาทีต่ำสุด/ไม้ ไม่ถูกต้อง","live_betmin_money");
}else if($ex_live_fbetmin_money > $live_fbetmin_money_max || $ex_live_fbetmin_money < $min_betmin_money || !is_numeric($ex_live_fbetmin_money)){
    warningInput(0,"90 นาทีต่ำสุด/ไม้ ไม่ถูกต้อง","live_fbetmin_money");
}else if($ex_live_betmoneymax_pair < $ex_live_betmin_money || !is_numeric($ex_live_betmoneymax_pair)){
    warningInput(0,"45 นาทีสูงสุด/คู่ น้อยกว่า 45 นาทีต่ำสุด/ไม้","live_betmoneymax_pair");
}else if($ex_live_fbetmoneymax_pair < $ex_live_fbetmin_money || !is_numeric($ex_live_fbetmoneymax_pair)){
    warningInput(0,"90 นาทีสูงสุด/คู่ น้อยกว่า 90 นาทีต่ำสุด/ไม้","live_fbetmoneymax_pair");
}else if($ex_live_betmax_money < $ex_live_betmin_money || !is_numeric($ex_live_betmoneymax_pair)){
    warningInput(0,"45 นาทีสูงสุด/ไม้ น้อยกว่า 45 นาทีต่ำสุด/ไม้","live_betmax_money");
}else if($ex_live_fbetmin_money < $ex_live_fbetmin_money || !is_numeric($ex_live_fbetmoneymax_pair)){
    warningInput(0,"90 นาทีสูงสุด/คู่ น้อยกว่า 90 นาทีต่ำสุด/ไม้","live_fbetmax_money");
}


 // tab 1
if($ex_sporttoday_share > $max_share_config || $ex_sporttoday_share < $sporttoday_share_max || !is_numeric($ex_sporttoday_share)){
    warningInput(1,"หุ้นกีฬาวันนี้ ไม่ถูกต้อง","sporttoday_share");
}else if($ex_sportlive_share > $max_share_config || $ex_sportlive_share < $sportlive_share_max || !is_numeric($ex_sportlive_share)){
    warningInput(1,"หุ้นกีฬากำลังแข่ง ไม่ถูกต้อง","sportlive_share");
}else if($ex_sport_com > $max_sport_com || $ex_sport_com < $sport_com_max || !is_numeric($ex_sport_com)){
    warningInput(1,"ค่าคอม ไม่ถูกต้อง","sport_com");
}else if($ex_sport_betmoneymax_pair < $sport_betmoneymax_pair_max || !is_numeric($ex_sport_betmoneymax_pair)){
    warningInput(1,"สูงสุด/คู่ ไม่ถูกต้อง","sport_betmoneymax_pair");
}else if($ex_sport_betmax_money < $sport_betmax_money_max || !is_numeric($ex_sport_betmax_money)){
    warningInput(1,"สูงสุด/ไม้ ไม่ถูกต้อง","sport_betmax_money");
}else if($ex_sport_betmin_money < $min_betmin_money || $ex_sport_betmin_money > $sport_betmin_money_max || !is_numeric($ex_sport_betmin_money)){
    warningInput(1,"ต่ำสุด/ไม้ ไม่ถูกต้อง","sport_betmin_money");
}else if($ex_sport_betmax_money < $ex_sport_betmin_money){
    warningInput(1,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","sport_betmax_money");
}else if($ex_sport_betmoneymax_pair < $ex_sport_betmin_money){
    warningInput(1,"สูงสุด/คู่ น้อยกว่า ต่ำสุด/ไม้","sport_betmoneymax_pair");
} 

// tab 2
if($ex_boxingtoday_share > $max_share_config || $ex_boxingtoday_share < $boxingtoday_share_max || !is_numeric($ex_boxingtoday_share)){
   warningInput(2,"หุ้นมวยไทยวันนี้ ไม่ถูกต้อง","boxingtoday_share");
}else if($ex_boxinglive_share > $max_share_config || $ex_boxinglive_share < $boxinglive_share_max || !is_numeric($ex_boxinglive_share)){
    warningInput(2,"หุ้นมวยไทยกำลังแข่ง ไม่ถูกต้อง","boxinglive_share");
}else if($ex_boxing_com > $max_sport_com || $ex_boxing_com < $sport_com_max || !is_numeric($ex_boxing_com)){
    warningInput(2,"ค่าคอม ไม่ถูกต้อง","boxing_com");
}else if($ex_boxing_betmoneymax_pair < $boxing_betmoneymax_pair_max || !is_numeric($ex_boxing_betmoneymax_pair)){
    warningInput(2,"สูงสุด/คู่ ไม่ถูกต้อง","boxing_betmoneymax_pair");
}else if($ex_boxing_betmax_money < $boxing_betmax_money_max || !is_numeric($ex_boxing_betmax_money)){
    warningInput(2,"สูงสุด/ไม้ ไม่ถูกต้อง","boxing_betmax_money");
}else if($ex_boxing_betmin_money < $min_betmin_money || $ex_boxing_betmin_money > $boxing_betmin_money_max || !is_numeric($ex_boxing_betmin_money)){
    warningInput(2,"45 นาทีต่ำสุด/ไม้ ไม่ถูกต้อง","boxing_betmin_money");
}else if($ex_boxing_betmax_money < $ex_boxing_betmin_money){
    warningInput(2,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","boxing_betmax_money");
}else if($ex_boxing_betmoneymax_pair < $ex_boxing_betmin_money){
    warningInput(2,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","boxing_betmoneymax_pair");
}

  // tab 3

if($ex_step_share > $max_share_config || $ex_step_share < $step_share_max || !is_numeric($ex_step_share)){
    warningInput(3,"แบ่งหุ้น ไม่ถูกต้อง","step_share");
}else if($ex_step_betmax_money < $step_betmax_money_max || !is_numeric($ex_step_betmax_money)){
    warningInput(3,"สูงสุด/ไม้ ไม่ถูกต้อง","step_betmax_money");
}else if($ex_step_betmin_money < $min_betmin_money || $ex_step_betmin_money > $step_betmin_money_max || !is_numeric($ex_step_betmax_money)){
    warningInput(3,"ต่ำสุด/ไม้ ไม่ถูกต้อง","step_betmin_money");
}else if($ex_step_betmax_money < $ex_step_betmin_money){
    warningInput(3,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","step_betmax_money");
}else if($ex_step_daymax_money < $step_daymax_money_max || !is_numeric($ex_step_daymax_money)){
    warningInput(3,"เล่นได้สูงสุด/วัน ไม่ถูกต้อง","step_daymax_money");
}else if($ex_step_billmax_money < $step_billmax_money_max || !is_numeric($ex_step_billmax_money)){
    warningInput(3,"จ่ายสูงสุด/บิล ไม่ถูกต้อง","step_billmax_money");
}else{

		if($step_min_pair_min == "" || $step_max_pair_min == "")  // หาจำนวนสูงสุด ต่ำสุด / บิล  ของสมาชิกที่ไม่มีภายใต้
    {
    	if($ex_step_min_pair < 2 || $ex_step_min_pair > 19 || !is_numeric($ex_step_min_pair)){
        warningInput(3,"จำนวนคู่ต่ำสุด/บิล ไม่ถูกต้อง","step_min_pair");
      }else if($ex_step_max_pair > 20 || $ex_step_max_pair < 3 ||!is_numeric($ex_step_max_pair)){
        warningInput(3,"จำนวนคู่สูงสุด/บิล","step_max_pair");
      }else if($ex_step_min_pair > $ex_step_max_pair){
        warningInput(3,"จำนวนคู่สูงสุด/บิล น้อยกว่า จำนวนคู่ต่ำสุด/บิล","step_max_pair");
      }
    }else // หาจำนวนสูงสุด ต่ำสุด / บิล  ของสมาชิกที่มีภายใต้ 
    {
    	if($ex_step_min_pair > $step_min_pair_min || $ex_step_min_pair < 2 || !is_numeric($ex_step_min_pair)){
        warningInput(3,"จำนวนคู่ต่ำสุด/บิล ไม่ถูกต้อง","step_min_pair");
      }else if($ex_step_max_pair < $step_max_pair_min || $ex_step_max_pair > 20 || !is_numeric($ex_step_max_pair)){
        warningInput(3,"จำนวนคู่สูงสุด/บิล","step_max_pair");
      }else if($ex_step_min_pair > $ex_step_max_pair){
        warningInput(3,"จำนวนคู่สูงสุด/บิล น้อยกว่า จำนวนคู่ต่ำสุด/บิล","step_max_pair");
      }
    }


    for ($i=$ex_step_min_pair; $i <= $ex_step_max_pair; $i++) { 
      $ex_stepcom = str_replace(",","",$_POST["stepcom".$i.""]);
      $r_sport_step_dis_min_ary[$i] = ($r_sport_step_dis_min_ary[$i] == "") ? 0 : $r_sport_step_dis_min_ary[$i];
      if($ex_stepcom > $max_share_config || $ex_stepcom < $r_sport_step_dis_min_ary[$i] || !is_numeric($ex_stepcom))
      {
        warningInput(3,"สว่นลด ".$i."คู่ ","stepcom".$i);
      }
    }

}


//tab 4  
if($ex_lotto_share > $max_share_config || $ex_lotto_share < $lotto_share_max || !is_numeric($ex_lotto_share)){
  warningInput(4,"แบ่งหุ้น ไม่ถูกต้อง","7_lotto_share");
}else if($ex_lotto_betmin_money < $min_betmin_money || $ex_lotto_betmin_money > $r_lotto_min_max || !is_numeric($ex_lotto_betmin_money)){
    warningInput(4,"ต่ำสุด/ไม้ ไม่ถูกต้อง","lotto_betmin_money");
}else if($ex_lotto_betmin_money > $ex_lotto_betmax_money){
    warningInput(4,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","lotto_betmax_money");
}else if($ex_lotto_betmax_money < $r_lotto_max_max){
    warningInput(4,"สูงสุด/ไม้ ไม่ถูกต้อง","lotto_betmax_money");
}else{

	// $ex_lotto_pay1_config = explode(",", $config_lotto_pay1);
 //  $ex_lotto_com1_config = explode(",", $config_lotto_dis1); 
 //  $ex_lotto_pay2_config = explode(",", $config_lotto_pay2);
 //  $ex_lotto_com2_config = explode(",", $config_lotto_dis2); 
 //  $ex_lotto_pay3_config = explode(",", $config_lotto_pay3);
 //  $ex_lotto_com3_config = explode(",", $config_lotto_dis3); 

  $ex_lotto_pay1_config = explode(",", $config_lotto_pay1_max);
  $ex_lotto_com1_config = explode(",", $config_lotto_dis1_max); 
  $ex_lotto_pay2_config = explode(",", $config_lotto_pay2_max);
  $ex_lotto_com2_config = explode(",", $config_lotto_dis2_max); 
  $ex_lotto_pay3_config = explode(",", $config_lotto_pay3_max);
  $ex_lotto_com3_config = explode(",", $config_lotto_dis3_max); 

	foreach ($lot_type[$_SESSION["AGlang"]][1] as $key => $value) {

			$ex_lotto_pay1 = str_replace(",","",$_POST["lotto_pay1_".$key.""]);
      $lotto_pay1_max = (max($check_r_lotto_pay1[$key]) == "") ? 0 : max($check_r_lotto_pay1[$key]);
      if($ex_lotto_pay1 > $ex_lotto_pay1_config[$key] || $ex_lotto_pay1 < $lotto_pay1_max || !is_numeric($ex_lotto_pay1)){
        warningInput(4,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_pay1_".$key."");
      }

      $ex_lotto_com1 = str_replace(",","",$_POST["lotto_com1_".$key.""]);
      $lotto_dis1_min = (max($check_r_lotto_dis1[$key]) == "") ? 0 : max($check_r_lotto_dis1[$key]);
      if($ex_lotto_com1 > $ex_lotto_com1_config[$key] || $ex_lotto_com1 < $lotto_dis1_min || !is_numeric($ex_lotto_com1)){
        warningInput(4,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_com1_".$key);
      }

      $ex_lotto_pay2 = str_replace(",","",$_POST["lotto_pay2_".$key.""]);
      $lotto_pay2_max = (max($check_r_lotto_pay2[$key]) == "") ? 0 : max($check_r_lotto_pay2[$key]);
      if($ex_lotto_pay2 > $ex_lotto_pay2_config[$key] || $ex_lotto_pay2 < $lotto_pay2_max || !is_numeric($ex_lotto_pay2)){
        warningInput(4,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_pay2_".$key."");
      }

      $ex_lotto_com2 = str_replace(",","",$_POST["lotto_com2_".$key.""]);
      $lotto_dis2_min = (max($check_r_lotto_dis2[$key]) == "") ? 0 : max($check_r_lotto_dis2[$key]);
      if($ex_lotto_com2 > $ex_lotto_com2_config[$key] || $ex_lotto_com2 < $lotto_dis2_min || !is_numeric($ex_lotto_com2)){
        warningInput(4,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_com2_".$key);
      }

      $ex_lotto_pay3 = str_replace(",","",$_POST["lotto_pay3_".$key.""]);
      $lotto_pay3_max = (max($check_r_lotto_pay3[$key]) == "") ? 0 : max($check_r_lotto_pay3[$key]);
      if($ex_lotto_pay3 > $ex_lotto_pay3_config[$key] || $ex_lotto_pay3 < $lotto_pay3_max || !is_numeric($ex_lotto_pay3)){
        warningInput(4,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_pay3_".$key."");
      }

      $ex_lotto_com3 = str_replace(",","",$_POST["lotto_com3_".$key.""]);
      $lotto_dis3_min = (max($check_r_lotto_dis3[$key]) == "") ? 0 : max($check_r_lotto_dis3[$key]);
      if($ex_lotto_com3 > $ex_lotto_com3_config[$key] || $ex_lotto_com3 < $lotto_dis3_min || !is_numeric($ex_lotto_com3)){
        warningInput(4,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_com3_".$key);
      }

	}
}

// $xy = $ex_lotto_share_hun_betmin_money."<".$min_betmin_money." ".$ex_lotto_share_hun_betmin_money." > ".$r_lotto_hun_min_max;
//    $data  = array(
//      'msg'     => "99999",
//      'status'  =>  false,
//      'sql' => $sql,
//      'xy'  => $xy,
//    );
//    echo json_encode($data);
//    exit();


//tab 5
if($ex_lotto_share_hun > $max_share_config || $ex_lotto_share_hun < $lotto_hun_share_max || !is_numeric($ex_lotto_share_hun)){
    warningInput(5,"แบ่งหุ้น ไม่ถูกต้อง","8_lotto_share");
}else if($ex_lotto_share_hun_betmin_money < $min_betmin_money || $ex_lotto_share_hun_betmin_money > $r_lotto_hun_min_max || !is_numeric($ex_lotto_share_hun_betmin_money)){
    warningInput(5,"ต่ำสุด/ไม้ ไม่ถูกต้อง","lotto_share_hun_betmin_money");
}else if($ex_lotto_share_hun_betmin_money > $ex_lotto_share_hun_betmax_money){
    warningInput(5,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","lotto_share_hun_betmax_money");
}else if($ex_lotto_share_hun_betmax_money < $r_lotto_hun_max_max){
    warningInput(4,"สูงสุด/ไม้ ไม่ถูกต้อง","lotto_share_hun_betmax_money");
}else{


	// $ex_lotto_hun_pay1_config = explode(",", $config_lotto_hun_pay1);
 //  $ex_lotto_hun_com1_config = explode(",", $config_lotto_hun_dis1); 
 //  $ex_lotto_hun_pay2_config = explode(",", $config_lotto_hun_pay2);
 //  $ex_lotto_hun_com2_config = explode(",", $config_lotto_hun_dis2); 
 //  $ex_lotto_hun_pay3_config = explode(",", $config_lotto_hun_pay3);
 //  $ex_lotto_hun_com3_config = explode(",", $config_lotto_hun_dis3); 

$ex_lotto_hun_pay1_config = explode(",", $config_lotto_hun_pay1_max);
$ex_lotto_hun_com1_config = explode(",", $config_lotto_hun_dis1_max); 
$ex_lotto_hun_pay2_config = explode(",", $config_lotto_hun_pay2_max);
$ex_lotto_hun_com2_config = explode(",", $config_lotto_hun_dis2_max); 
$ex_lotto_hun_pay3_config = explode(",", $config_lotto_hun_pay3_max);
$ex_lotto_hun_com3_config = explode(",", $config_lotto_hun_dis3_max); 




  foreach ($lot_type[$_SESSION["AGlang"]][3] as $key => $value) {
  	if($key==31){continue;}  

  		$ex_lotto_hun_pay1 = str_replace(",","",$_POST["lotto_hun_pay1_".$key.""]);
      $lotto_hun_pay1_max = (max($check_r_lotto_hun_pay1_max[$key]) == "") ? 0 : max($check_r_lotto_hun_pay1_max[$key]);
      if($ex_lotto_hun_pay1 > $ex_lotto_hun_pay1_config[$key] || $ex_lotto_hun_pay1 < $lotto_hun_pay1_max || !is_numeric($ex_lotto_hun_pay1))
      {
        warningInput(5,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_hun_pay1_".$key."");
      }

      $ex_lotto_hun_com1 = str_replace(",","",$_POST["lotto_hun_com1_".$key.""]);
      $lotto_hun_dis_min1 = (max($check_r_lotto_hun_dis1_max[$key]) == "") ? 0 : max($check_r_lotto_hun_dis1_max[$key]);
      if($ex_lotto_hun_com1 > $ex_lotto_hun_com1_config[$key] || $ex_lotto_hun_com1 < $lotto_hun_dis_min1 || !is_numeric($ex_lotto_hun_com1))
      {
        warningInput(5,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_hun_com1_".$key."");
      }


      $ex_lotto_hun_pay2 = str_replace(",","",$_POST["lotto_hun_pay2_".$key.""]);
      $lotto_hun_pay2_max = (max($check_r_lotto_hun_pay2_max[$key]) == "") ? 0 : max($check_r_lotto_hun_pay2_max[$key]);
      if($ex_lotto_hun_pay2 > $ex_lotto_hun_pay2_config[$key] || $ex_lotto_hun_pay2 < $lotto_hun_pay2_max || !is_numeric($ex_lotto_hun_pay2))
      {
        warningInput(5,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_hun_pay2_".$key."");
      }

      $ex_lotto_hun_com2 = str_replace(",","",$_POST["lotto_hun_com2_".$key.""]);
      $lotto_hun_dis_min1 = (max($check_r_lotto_hun_dis1_max[$key]) == "") ? 0 : max($check_r_lotto_hun_dis1_max[$key]);
      if($ex_lotto_hun_com2 > $ex_lotto_hun_com2_config[$key] || $ex_lotto_hun_com2 < $lotto_hun_dis_min1 || !is_numeric($ex_lotto_hun_com2))
      {
        warningInput(5,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_hun_com2_".$key."");
      }

      $ex_lotto_hun_pay3 = str_replace(",","",$_POST["lotto_hun_pay3_".$key.""]);
      $lotto_hun_pay3_max = (max($check_r_lotto_hun_pay3_max[$key]) == "") ? 0 : max($check_r_lotto_hun_pay3_max[$key]);
      if($ex_lotto_hun_pay3 > $ex_lotto_hun_pay3_config[$key] || $ex_lotto_hun_pay3 < $lotto_hun_pay3_max || !is_numeric($ex_lotto_hun_pay3))
      {
        warningInput(5,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_hun_pay3_".$key."");
      }

      $ex_lotto_hun_com3 = str_replace(",","",$_POST["lotto_hun_com3_".$key.""]);
      $lotto_hun_dis_min1 = (max($check_r_lotto_hun_dis1_max[$key]) == "") ? 0 : max($check_r_lotto_hun_dis1_max[$key]);
      if($ex_lotto_hun_com3 > $ex_lotto_hun_com3_config[$key] || $ex_lotto_hun_com3 < $lotto_hun_dis_min1 || !is_numeric($ex_lotto_hun_com3))
      {
        warningInput(5,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_hun_com3_".$key."");
      }

  }

}

//tab 6
if($ex_lotto_hun_set_share > $max_share_config || $ex_lotto_hun_set_share < $lotto_hun_set_share_max || !is_numeric($ex_lotto_hun_set_share)){
  warningInput(6,"แบ่งหุ้น ไม่ถูกต้อง","9_lotto_share");
}else{

	// $ex_lotto_hun_set_pay_config = explode(",", $config_lotto_hun_set_pay);
 //  $ex_lotto_hun_set_price_config = explode(",", $config_lotto_hun_set_price);
  $ex_lotto_hun_set_pay_config = explode(",", $config_lotto_hun_set_pay_max);
  $ex_lotto_hun_set_price_config = explode(",", $config_lotto_hun_set_price_max);

  

	foreach ($lang_g["setpay"] as $key => $value) {

			$index = $key+1;
      $ex_lot_hun_set_pay = str_replace(",","",$_POST["lot_hun_set_pay".$index.""]);
      $lotto_hun_set_pay_max = (max($check_r_lotto_hun_set_pay[$index]) == "") ? 0 : max($check_r_lotto_hun_set_pay[$index]);

      if($ex_lot_hun_set_pay > $ex_lotto_hun_set_pay_config[$index] || $ex_lot_hun_set_pay < $lotto_hun_set_pay_max || !is_numeric($ex_lot_hun_set_pay)){
        warningInput(6,"รางวัล , 0=ปิด ".$value." ไม่ถูกต้อง","lot_hun_set_pay".$index."");
      }

       if($index == 1){
        $ex_lot_hun_set_price = str_replace(",","",$_POST["lot_hun_set_price".$index.""]);
         $r_lotto_hun_set_price[$index] =  (min($check_r_lotto_hun_set_price[$index]) == "" || min($check_r_lotto_hun_set_price[$index]) == 0 ) ?  0 : min($check_r_lotto_hun_set_price[$index]);

        if($ex_lot_hun_set_price > $ex_lotto_hun_set_price_config[$index] || $ex_lot_hun_set_price < $r_lotto_hun_set_price[$index]|| !is_numeric($ex_lot_hun_set_price)){
          warningInput(6,"ราคาส่ง ไม่ถูกต้อง","lot_hun_set_price".$index."");
        }
      } 


	}

}


 //tab 7
if($ex_game_share > $max_share_config || $ex_game_share < $game_share_max || !is_numeric($ex_game_share)){
   warningInput(7,"แบ่งหุ้น ไม่ถูกต้อง","game_share");
}
else if($ex_game_com > $max_share_config || $ex_game_com < $game_com_max || !is_numeric($ex_game_com)){
   warningInput(7,"ค่าคอม ไม่ถูกต้อง","game_com");
 }else if( $ex_game_max < $game_max_max || !is_numeric($ex_game_max)){
   warningInput(7,"สูงสุด/ไม้ ไม่ถูกต้อง","game_max");
}else if($ex_game_min > $game_min_max || !is_numeric($ex_game_min)){
    warningInput(7,"ต่ำสุด/ไม้ ไม่ถูกต้อง","game_min");
}else  if($ex_game_max < $ex_game_min){
    warningInput(7,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","game_max");
}

  // tab 8 


 // foreach ($lang_g["casino_share"]  as $key => $value) {
 // 	$ex_casino_share = str_replace(",","",$_POST["casino_share".$key.""]);
 //  $ex_casino_com = str_replace(",","",$_POST["casino_com".$key.""]);
 //  $ex_rcb_maxtransfer = str_replace(",","",$_POST["rcb_maxtransfer".$key.""]);
 //  $ex_rcb_mintransfer = str_replace(",","",$_POST["rcb_mintransfer".$key.""]);

 // 	$check_r_casino_share_max =  (max($check_r_casino_share[$key]) == "") ? 0 : max($check_r_casino_share[$key]);
 //  $check_r_casino_dis =  (max($check_r_casino_dis[$key]) == "") ? 0.00 : max($check_r_casino_dis[$key]);  
 //  $check_casino_max =  (max($check_r_casino_max[$key]) == "") ? $casino_min[$key] : max($check_r_casino_max[$key]); 
 //  $check_casino_min =  (max($check_r_casino_min[$key]) == "") ? $casino_max[$key] : max($check_r_casino_min[$key]); 

 //    if($ex_casino_share > 100 || $ex_casino_share < $check_r_casino_share_max || !is_numeric($ex_casino_share)){
 //      warningInput(8,"แบ่งหุ้น ".$value." ไม่ถูกต้อง","casino_share".$key."");
 //    }else if($ex_casino_com > $max_sport_com || $ex_casino_com < $check_r_casino_dis || !is_numeric($ex_casino_com)){
 //      warningInput(8,"ค่าคอม ".$value." ไม่ถูกต้อง","casino_com".$key."");
 //    }else if($ex_rcb_maxtransfer < $check_casino_max || !is_numeric($ex_rcb_maxtransfer)){
 //      warningInput(8,"สูงสุด/ไม้ ".$value." ไม่ถูกต้อง","rcb_maxtransfer".$key."");
 //    }else if($ex_rcb_mintransfer < $casino_min[$key] || $ex_rcb_mintransfer > $check_casino_min || !is_numeric($ex_rcb_mintransfer)){

 //      warningInput(8,"ต่ำสุด/ไม้ ".$value." ไม่ถูกต้อง","rcb_mintransfer".$key."");
 //    }else  if($ex_rcb_maxtransfer < $ex_rcb_mintransfer){
 //      warningInput(8,"สูงสุด/ไม้ ".$value."น้อยกว่า ต่ำสุด/ไม้","rcb_maxtransfer".$key."");
 //    }
 // }

 ?>