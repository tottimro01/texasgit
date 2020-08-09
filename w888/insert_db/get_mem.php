<?
$sql="select *   from bom_tb_member where m_id='$mid'";
$re=sql_array($sql);
$_SESSION['mid'] = $re[m_id];
$_SESSION['m_user'] = $re[m_user];
$_SESSION['m_name'] = $re[m_name];

$exopen = @explode(",",$re[m_open]);
$_SESSION['open_sc'] = $exopen[1];#Soccer
$_SESSION['open_mu'] = $exopen[2];#Muay
$_SESSION['open_st'] = $exopen[3];#Step
$_SESSION['open_sp'] = $exopen[4];#Sport
$_SESSION['open_lo'] = $exopen[5];#lotto
$_SESSION['open_ga'] = $exopen[6];#Games
$_SESSION['open_ca'] = $exopen[7];#Casino
$_SESSION['open_tf'] = $exopen[8];#Tranfer


if($re[m_count]<=0){$re[m_count]=0;}
$_SESSION['mcount'] = $re[m_count];
$_SESSION['mcredit'] = $re[m_count_de];
$_SESSION['m_currency'] = $re[m_currency];
###############BANK
$_SESSION['m_b_pass'] = $re[m_b_pass];
$_SESSION['m_b_bank'] = $re[m_b_bank];
$_SESSION['m_b_code'] = $re[m_b_code];
$_SESSION['m_b_name'] = $re[m_b_name];

###################BALL######################
$_SESSION['m_max'] = $re[m_max];
$_SESSION['m_min'] = $re[m_min];
$_SESSION['m_max_match'] = $re[m_max_match];
$_SESSION['m_com'] = $re[m_com];
$_SESSION['m_share'] = $re[m_share];
$_SESSION['m_share_live'] = $re[m_share_live];
$_SESSION['m_step_dis'] = $re[m_step_dis];
$_SESSION['m_step2'] = $re[m_step2];
$_SESSION['m_type'] = $re[m_type];
$_SESSION['m_nam_tor'] = $re[m_nam_tor];
$_SESSION['m_nam_rong'] = $re[m_nam_rong];
$_SESSION['m_nam_tor_live'] = $re[m_nam_tor_live];
$_SESSION['m_nam_rong_live'] = $re[m_nam_rong_live];

######################LOTTO
$_SESSION['m_lotto_max'] = $re[m_lotto_max];
$_SESSION['m_lotto_min'] = $re[m_lotto_min];

$_SESSION['m_lotto_share'] = $re[m_lotto_share];
$_SESSION['m_lotto_pay'] = $re[m_lotto_pay];
$_SESSION['m_lotto_dis'] = $re[m_lotto_dis];


$sql="select lot_over from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$_SESSION['lot_over'] = $rec[lot_over];

#####################SET
#$_SESSION['lang']=$arr_lang[$re[m_lang]];
$_SESSION['lang']=$_REQUEST['clang'];
$_SESSION['m_price'] = $m_price[$re[m_price]];
$_SESSION['m_row'] = $re[m_row];


$ex_rid=explode('*',$re[r_agent_id]);
$_SESSION[r_agent_id] = $re[r_agent_id];
$_SESSION['crid1'] = $ex_rid[1];
$_SESSION['crid2'] = $ex_rid[2];
$_SESSION['crid3'] = $ex_rid[3];
$_SESSION['crid4'] = $ex_rid[4];
$_SESSION['crid'] = $ex_rid[4];

########################Agent 1
$sql="select * from bom_tb_agent where (r_id='".$_SESSION['crid1']."' and r_level=1)";
$re1=sql_array($sql);
$_SESSION['r_com_1']=$re1[r_com];
$_SESSION['step_dis_1']=$re1[r_step_dis];
$_SESSION['r_share_1']=$re1[r_share];
$_SESSION['r_share_live_1']=$re1[r_share_live];
$_SESSION['r_force_1']=$re1[r_force];
$_SESSION['r_force_live_1']=$re1[r_force_live];
$_SESSION['r_nam_tor_1']=$re1[r_nam_tor];
$_SESSION['r_nam_rong_1']=$re1[r_nam_rong];
$_SESSION['r_nam_tor_live_1']=$re1[r_nam_tor_live];
$_SESSION['r_nam_rong_live_1']=$re1[r_nam_rong_live];
######LOTTO
$_SESSION['lotto_share_1']=$re1[r_lotto_share];
$_SESSION['lotto_pay_1']=$re1[r_lotto_pay];
$_SESSION['lotto_dis_1']=$re1[r_lotto_dis];
$_SESSION['r_lotto_over_1']=$re1[r_lotto_over];
$_SESSION['r_lotto_force_1']=$re1[r_lotto_force];
$_SESSION['r_id_user_1']=$re1[r_user]." [ ".$re1[r_name]." ]";

########################Agent 1
$sql="select * from bom_tb_agent where (r_id='".$_SESSION['crid2']."' and r_level=2)";
$re2=sql_array($sql);
$_SESSION['r_com_2']=$re2[r_com];
$_SESSION['step_dis_2']=$re2[r_step_dis];
$_SESSION['r_share_2']=$re2[r_share];
$_SESSION['r_share_live_2']=$re2[r_share_live];
$_SESSION['r_force_2']=$re2[r_force];
$_SESSION['r_force_live_2']=$re2[r_force_live];
$_SESSION['r_nam_tor_2']=$re2[r_nam_tor];
$_SESSION['r_nam_rong_2']=$re2[r_nam_rong];
$_SESSION['r_nam_tor_live_2']=$re2[r_nam_tor_live];
$_SESSION['r_nam_rong_live_2']=$re2[r_nam_rong_live];
######LOTTO
$_SESSION['lotto_share_2']=$re2[r_lotto_share];
$_SESSION['lotto_myshare_1']=$re2[r_lotto_myshare];
$_SESSION['lotto_pay_2']=$re2[r_lotto_pay];
$_SESSION['lotto_dis_2']=$re2[r_lotto_dis];
$_SESSION['r_lotto_over_2']=$re2[r_lotto_over];
$_SESSION['r_lotto_force_2']=$re2[r_lotto_force];


########################Agent 1
$sql="select * from bom_tb_agent where (r_id='".$_SESSION['crid3']."' and r_level=3)";
$re3=sql_array($sql);
$_SESSION['r_com_3']=$re3[r_com];
$_SESSION['step_dis_3']=$re3[r_step_dis];
$_SESSION['r_share_3']=$re3[r_share];
$_SESSION['r_share_live_3']=$re3[r_share_live];
$_SESSION['r_force_3']=$re3[r_force];
$_SESSION['r_force_live_3']=$re3[r_force_live];
$_SESSION['r_nam_tor_3']=$re3[r_nam_tor];
$_SESSION['r_nam_rong_3']=$re3[r_nam_rong];
$_SESSION['r_nam_tor_live_3']=$re3[r_nam_tor_live];
$_SESSION['r_nam_rong_live_3']=$re3[r_nam_rong_live];
######LOTTO
$_SESSION['lotto_share_3']=$re3[r_lotto_share];
$_SESSION['lotto_myshare_2']=$re3[r_lotto_myshare];
$_SESSION['lotto_pay_3']=$re3[r_lotto_pay];
$_SESSION['lotto_dis_3']=$re3[r_lotto_dis];
$_SESSION['r_lotto_over_3']=$re3[r_lotto_over];
$_SESSION['r_lotto_force_3']=$re3[r_lotto_force];


########################Agent 1
$sql="select * from bom_tb_agent where (r_id='".$_SESSION['crid4']."' and r_level=4)";
$re4=sql_array($sql);
$_SESSION['r_com_4']=$re4[r_com];
$_SESSION['step_dis_4']=$re4[r_step_dis];
$_SESSION['r_share_4']=$re4[r_share];
$_SESSION['r_share_live_4']=$re4[r_share_live];
$_SESSION['r_force_4']=$re4[r_force];
$_SESSION['r_force_live_4']=$re4[r_force_live];
$_SESSION['r_nam_tor_4']=$re4[r_nam_tor];
$_SESSION['r_nam_rong_4']=$re4[r_nam_rong];
$_SESSION['r_nam_tor_live_4']=$re4[r_nam_tor_live];
$_SESSION['r_nam_rong_live_4']=$re4[r_nam_rong_live];
######LOTTO
$_SESSION['lotto_share_4']=$re4[r_lotto_share];
$_SESSION['lotto_myshare_3']=$re4[r_lotto_myshare];
$_SESSION['lotto_pay_4']=$re4[r_lotto_pay];
$_SESSION['lotto_dis_4']=$re4[r_lotto_dis];
$_SESSION['r_lotto_over_4']=$re4[r_lotto_over];
$_SESSION['r_lotto_force_4']=$re4[r_lotto_force];

#$sql="select sum(b_total) as btotal from bom_tb_football_bill where m_id='$_SESSION[mid]'  and b_status=5";
#$reb1=sql_array($sql);
#$sql="select sum(b_total) as btotal from bom_tb_lotto_bill where m_id='$_SESSION[mid]'  and b_status=5";
#$reb2=sql_array($sql);
#$_SESSION['mnot']=$reb1[btotal]+$reb2[btotal];
?>