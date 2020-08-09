<?
if ($x_sum > 0) {
    if ($_SESSION[xcount] < $x_sum) {
        $_SESSION[error][1][] = "$lang_b[6] : $re_m[m_count]";
    } else {
        $cmax = $hmax[$type_lot];
        $cmin = $hmin[$type_lot];
        if ($x_sum >= $cmin) { ###### ตรวจเงินต่ำสุด
            if ($x_sum <= $cmax) { ###### ตรวจเงินสูงสุด
                $url_file_0 = "../json/lotto/lock/" . $type_lot . "/" . $q_num . ".json";
                $sumck0     = jrlot($url_file_0);
                $url_file_1 = "../json/lotto/lock/" . $type_lot . "/" . $q_num . "_" . $_SESSION['crid1'] . ".json";
                $sumck1     = jrlot($url_file_1);
                $url_file_2 = "../json/lotto/lock/" . $type_lot . "/" . $q_num . "_" . $_SESSION['crid2'] . ".json";
                $sumck2     = jrlot($url_file_2);
                $url_file_3 = "../json/lotto/lock/" . $type_lot . "/" . $q_num . "_" . $_SESSION['crid3'] . ".json";
                $sumck3     = jrlot($url_file_3);
                $url_file_4 = "../json/lotto/lock/" . $type_lot . "/" . $q_num . "_" . $_SESSION['crid4'] . ".json";
                $sumck4     = jrlot($url_file_4);
                if ($sumck0 <= 0 and $sumck0 != "") {
                    $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40]";
                    $sql                  = "INSERT IGNORE INTO bom_tb_lotto_lock_1 (h_num,	lot_type,h_datetime  ) values('$q_num','$type_lot', now())";
                    sql_query($sql);
                } elseif ($sumck0 < $x_sum and $sumck0 != "") {
                    $txt_q                = "$lang_lot[41]: " . number_format($sumck0);
                    $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $txt_q";
                } else {
                    ##########################################Agent
                    if ($sumck4 <= 0 and $sumck4 != "") {
                        $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $x_level[4]";
                        $sql                  = "INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'" . $_SESSION['crid4'] . "')";
                        sql_query($sql);
                    } elseif ($sumck4 < $x_sum and $sumck4 != "") {
                        $txt_q                = "$lang_lot[41]: " . number_format($sumck4);
						$_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $txt_q";
                    } else {
                        ##########################################Master
                        if ($sumck3 <= 0 and $sumck3 != "") {
							 $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $x_level[3]";
                            $sql                  = "INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'" . $_SESSION['crid3'] . "')";
                            sql_query($sql);
                        } elseif ($sumck3 < $x_sum and $sumck3 != "") {
                            $txt_q                = "$lang_lot[41]: " . number_format($sumck3);
							$_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $txt_q";
                        } else {
                            ##########################################Senior
                            if ($sumck2 <= 0 and $sumck2 != "") {
								 $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $x_level[2]";
                                $sql                  = "INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'" . $_SESSION['crid2'] . "')";
                                sql_query($sql);
                            } elseif ($sumck2 < $x_sum and $sumck2 != "") {
                                $txt_q                = "$lang_lot[41]: " . number_format($sumck2);
								$_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $txt_q";
                            } else {
                                ##########################################Super
                                if ($sumck1 <= 0 and $sumck1 != "") {
									 $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $x_level[1]";
                                    $sql                  = "INSERT IGNORE INTO bom_tb_lotto_lock_rid (h_num,	lot_type,h_datetime,r_id  ) values('$q_num','$type_lot', now(),'" . $_SESSION['crid1'] . "')";
                                    sql_query($sql);
                                } elseif ($sumck1 < $x_sum and $sumck1 != "") {
                                    $txt_q                = "$lang_lot[41]: " . number_format($sumck1);
									$_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_lot[40] $txt_q";
                                } else {
                                    $adis   = _dislot($x_sum, $hdis[$type_lot], $type_lot);
                                    $ar1dis = _dislot($x_sum, $r1dis[$type_lot], $type_lot);
                                    $ar2dis = _dislot($x_sum, $r2dis[$type_lot], $type_lot);
                                    $ar3dis = _dislot($x_sum, $r3dis[$type_lot], $type_lot);
                                    $ar4dis = _dislot($x_sum, $r4dis[$type_lot], $type_lot);
                                    ###########################SAVE####################################
                                    $sql    = "INSERT IGNORE INTO bom_tb_lotto_bill_play ( play_timestam,	play_datenow,	play_number,	ok_id , lot_zone	,lot_rob,	lot_type,	play_pay,play_dis ,b_total,	b_pay	,	bill_id,	m_id	,b_date
							,	r_agent_id,b_share_m	,b_share_1,	b_share_2,	b_share_3	,b_share_4 , b_share_force_1  , b_share_force_2  , b_share_force_3  , b_share_force_4
							 ,b_myshare_1 ,b_myshare_2 ,b_myshare_3
							,play_br_pay_1	,play_br_pay_2,	play_br_pay_3	,play_br_pay_4
							,play_br_dis_1	,play_br_dis_2	,play_br_dis_3,	play_br_dis_4
							,br_pay_1,	br_pay_2,	br_pay_3,	br_pay_4
							 ) 
							 
								values ('$date_timestam',now(),'$q_num','$re_ok[ok_id]','$_POST[zone]','$_POST[rob]' ,'$type_lot' ,'$hpay[$type_lot]','$hdis[$type_lot]' ,'$x_sum', '$adis'  ,'$reeb[bill_id]' ,'$_SESSION[mid]','$view_date' 
								,'$_SESSION[r_agent_id]' ,'$hshare[$type_lot]' ,'$r1share[$type_lot]' ,'$r2share[$type_lot]' ,'$r3share[$type_lot]' ,'$r4share[$type_lot]' ,'$r1force[$type_lot]' ,'$r2force[$type_lot]' ,'$r3force[$type_lot]' ,'$r4force[$type_lot]' 
								,'$r1myshare[$type_lot]' 	,'$r2myshare[$type_lot]' 	,'$r3myshare[$type_lot]' 
							 ,'$r1pay[$type_lot]' ,'$r2pay[$type_lot]' ,'$r3pay[$type_lot]' ,'$r4pay[$type_lot]' 
							  ,'$r1dis[$type_lot]' ,'$r2dis[$type_lot]' ,'$r3dis[$type_lot]' ,'$r4dis[$type_lot]' 
							  ,'$ar1dis'  ,'$ar2dis'  ,'$ar3dis'  ,'$ar4dis'
								)";
							#	'$date_time'
                                    sql_query($sql);
								   $arr_in_socket[] = '(lot_type="'.$type_lot.'" and play_number="'.$q_num.'")';
								   $_SESSION[error][1][]=$lot_type["th"][$type_lot]." [ $q_num ] =".number_format($x_sum)." ".$lang_m[21];
                                    $_SESSION[count_sum]  = $_SESSION[count_sum] + $x_sum;
                                    $_SESSION[count_dis]  = $_SESSION[count_dis] + $adis;
                                    $_SESSION[count_dis1] = $_SESSION[count_dis1] + $ar1dis;
                                    $_SESSION[count_dis2] = $_SESSION[count_dis2] + $ar2dis;
                                    $_SESSION[count_dis3] = $_SESSION[count_dis3] + $ar3dis;
                                    $_SESSION[count_dis4] = $_SESSION[count_dis4] + $ar4dis;
                                    $_SESSION[xcount]     = $_SESSION[xcount] - $x_sum;
                                    $count_num[]          = 1;
                                    ################################################################
                                    if ($sumck0 == "") {
                                      ##                jwlot($url_file_0, ($hover[$type_lot] - $x_sum));
                                    } else {
                                        ##              jwlot($url_file_0, ($sumck0 - $x_sum));
                                    }
                                    if ($sumck1 == "") {
                                       ##               jwlot($url_file_1, ($r1over[$type_lot] - $x_sum));
                                    } else {
                                       ##               jwlot($url_file_1, ($sumck1 - $x_sum));
                                    }
                                    if ($sumck2 == "") {
                                    ##                  jwlot($url_file_2, ($r2over[$type_lot] - $x_sum));
                                    } else {
                                      ##                jwlot($url_file_2, ($sumck2 - $x_sum));
                                    }
                                    if ($sumck3 == "") {
                                  ##                    jwlot($url_file_3, ($r3over[$type_lot] - $x_sum));
                                    } else {
                                     ##                 jwlot($url_file_3, ($sumck3 - $x_sum));
                                    }
                                    if ($sumck4 == "") {
                                  ##                    jwlot($url_file_4, ($r4over[$type_lot] - $x_sum));
                                    } else {
                              ##          jwlot($url_file_4, ($sumck4 - $x_sum));
                                    }
                                } #if($sumck1<=0 and $sumck1!=""){
                            } #if($sumck2<=0 and $sumck2!=""){
                        } #if($sumck3<=0 and $sumck3!=""){
                    } #if($sumck4<=0 and $sumck4!=""){
                } #if($sumck0<=0 and $sumck0!=""){
            } else {
                $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_b[5] " . number_format($cmax);
            }
        } else {
            $_SESSION[error][1][] = $lot_type["th"][$type_lot] . " [ " . _dt($q_num) . " ] = $lang_b[4] " . number_format($cmin);
        }
    } #	if($_SESSION[xcount]<$x_sum){
} #if($x_sum>0){
?>