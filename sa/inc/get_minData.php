<?php 


$ulevel = 2;
$sql="select * from bom_tb_agent where r_agent_id like '%*".$r_id."*%' and r_level='$ulevel'";
$reA=sql_query($sql);

// ฟุตบอบ กีฬา
$check_r_sport_share_max = array(); 
$check_r_sport_share_live_max = array(); 
$check_r_sport_max_all = array(); 
$check_r_sport_min_all = array(); 
$check_r_nam = array();
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
        // $exd=@explode(",",$rss['r_nam']);
        // foreach ($exd as $key => $value) {
        //    if($key > 0){    
        //         $check_r_nam[$key][] = $value;
        //    }
        // }

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
        $exd=@explode(",",$rss['r_lotto_hun_dis3']);
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

        $exd=@explode(",",$rss['r_casino_share']);
        foreach ($exd as $key => $value) {
           if($key > 0){    
                $check_r_casino_share[$key][] = $value;
           }
        }  

    }


    $sql="select * from bom_tb_member where m_agent_id like '%*".$r_id."*%' and m_level='$ulevel'";
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
    $torup_max = max($check_r_sport_nam_tor_max[1]);
    $logup_max = max($check_r_sport_nam_rong_max[1]);

    $r_nam_max =($r_nam_max == "") ? 0 : $r_nam_max;
    $torup_max =($torup_max == "") ? 0 : $torup_max;
    $logup_max =($logup_max == "") ? 0 : $logup_max;

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

    // $step_min_pair_min =($step_min_pair_min == "") ? 19 : $step_min_pair_min;
    // $step_max_pair_min =($step_max_pair_min == "") ? 3 : $step_max_pair_min;

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
    $game_min_max = (min($check_r_games_min[1]) == "") ? $max_betmin_money : min($check_r_games_min[1]);

    $check_r_casino_max = (max($check_r_casino_max[1]) == "") ? 0 : max($check_r_casino_max[1]);
    $check_r_casino_min = (min($check_r_casino_min[1]) == "") ? 0 : min($check_r_casino_min[1]);
    $check_r_casino_dis = max($check_r_casino_dis[1]);
   // $r_casino_share_max = [];
   // foreach ($check_r_casino_share as $key => $value) {
   //    $r_casino_share_max[$key] = max($value);
   // }

   // $r_casino_max_max = [];
   // foreach ($check_r_casino_max as $key => $value) {
   //    $r_casino_max_max[$key] = max($value);
   // }



 ?>