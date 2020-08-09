<input id="hidMenuData" name="hidMenuData" value="{{menuData}}" type="hidden" />
<!--olympic menu-->
<div id="subnav_olympic" class="special">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr id="menu_all_tr">
        <td id="menu_all" class="" colspan="2"><a href="JavaScript:SwitchMenuType(0,'template/maxbet/th/images/')"><span title="ทุกชนิดกีฬา">ทุกชนิดกีฬา</span></a></td>
    </tr>
    <tr>
      <td id="menu_ep" class=""><a href="JavaScript:SwitchMenuType(3,'template/maxbet/th/images/')"><span title="Euro&nbsp;2016">Euro&nbsp;2016</span></a></td>
      <td id="menu_wp" class=""><a href="JavaScript:SwitchMenuType(1,'template/maxbet/th/images/')"><span title="โอลิมปิค&nbsp;2016">โอลิมปิค&nbsp;2016</span></a></td>
      <td id="menu_cp" class=""><a href="JavaScript:SwitchMenuType(2,'template/maxbet/th/images/')"><span title="ฟุตบอลโลก">ฟุตบอลโลก</span></a></td>
      <td id="menu_ap" class=""><a href="JavaScript:SwitchMenuType(0,'template/maxbet/th/images/')"><span title="ทุกชนิดกีฬา">ทุกชนิดกีฬา</span></a></td>
    </tr>
  </table>
</div>
<!-- My Favorite menu -->
<!--<div id="div_favorite" class="{{showfavoriteclass}}" style="display:none">
	<a href="javascript:ShowOdds('F','1','3');">
		<img border="0" width="174" height="25" src="../template/maxbet/public/images/layout/bb.gif" />
	</a>
</div>-->
<!-- world cup menu
<div id="worldcup_menu" class="special" style="display: none;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td id="menu_wp" class=""><a href="JavaScript:SwitchMenuType(2,'template/maxbet/th/images/')" onmouseout="m_onmouseout('template/maxbet/th/images/');" onmouseover="m_mouseover(2,'template/maxbet/th/images/');"><span title="ฟุตบอลโลก">ฟุตบอลโลก</span></a></td>
      <td id="menu_all" class="current"><a href="JavaScript:SwitchMenuType(0,'template/maxbet/th/images/')" onmouseout="m_onmouseout('template/maxbet/th/images/');" onmouseover="m_mouseover(0,'template/maxbet/th/images/');"><span title="ทุกชนิดกีฬา">ทุกชนิดกีฬา</span></a></td>
    </tr>
  </table>
  </div>
  -->
<!--sport menu-->
<div id="subnav_head">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td id="market_E_head" width="30%" valign="top"><span id="market_E_text" style="cursor: pointer; display: block;" onclick="openMenu('th'); LoadMenuData('E');" title="ล่วงหน้า">ล่วงหน้า</span></td>
          <td class="itemline" width="2">&nbsp;</td>
          <td id="market_T_head" width="30%" valign="top"><span id="market_T_text" style="cursor: pointer; display: block;" onclick="openMenu('th'); LoadMenuData('T');" title="วันนี้">วันนี้</span></td>
          <td class="itemline" width="2">&nbsp;</td>
          <td width="40%" valign="top" nowrap="nowrap" id="market_L_head"><span style="cursor: pointer; display: block;" onclick="openMenu('th'); LoadMenuData('L'); LiveSportsClickAll(true);" title="การแข่งขันสด"> <span id="market_L_text">การแข่งขันสด</span> <span id="market_L_head_Cnt"></span></span></td>
          <!--td width="1%" valign="top"><div class="menu_hard_line">&nbsp;</div></td--> 
        </tr>
    </table>
</div>

<!--Today and Early-->
<div id="subnavbg">
<div id="subnav">
    
	<div id="market_body" style='display:'>
		
		
		
		
		
		
		
		
		
		
		<div id='44_head'>
			<a class="navon" href="JavaScript:SwitchSport('','44',false,false,'OU')" title="มวยไทย">
				<span class="sports-icon">
                	<img src="template/sportsicon/muay_thai.png" alt="" />
                </span>
				<div class="right">
					<span id="img_44_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_44_LV" class="icon_live"></span>
					<span id="44_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">มวยไทย</div>
			</a>
		</div>
		<div id='44_body' class="MuSubbg">
			<div id="44_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','44','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="44_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="44_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','44')">
						<span class="submenu" title="มวยไทยชุด">มวยไทยชุด</span>
						<span id="44_P_Cnt" class="text-number"></span>
						<span id="img_44_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="44_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','44')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="44_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='1_head'>
			<a class="navon current" href="JavaScript:SwitchSport('','1',false,false,'OU')" title="ฟุตบอล">
				<span class="sports-icon">
                	<img src="template/sportsicon/soccer.png" alt="" />
                </span>
				<div class="right">
					<span id="img_1_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_1_LV" class="icon_live"></span>
					<span id="1_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">ฟุตบอล</div>
			</a>
		</div>
		<div id='1_body' class="MuSubbg">
			<div id="1_A">
				<div class="subnav-link" style="display: block; position:relative;">
					<a href="JavaScript:ShowOdds('','1',fFrame.DisplayMode,'OU')" class="current">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="1_A_Cnt" class="text-number"></span>
					</a>
					<!-- &nbsp;<div style="position:absolute; top:22px; left: 16px;"><a href="JavaScript:ShowOdds('','1','1')" style="display:inline;padding:0px; margin:0px;"><b>ใหม่</b></a>|<a href="JavaScript:ShowOdds('','1','1F')" style="display:inline; padding:0px; margin:0px;"><b>เก่า</b></a></div> -->
				</div>
			</div>
			<div id="1_1X2">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('1X2','1')">
						<span class="submenu" title="ราคาพูล 1X2">ราคาพูล 1X2</span>
						<span id="1_1X2_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="1_CS">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('CS','1')">
						<span class="submenu" title="ทายผลสกอร์">ทายผลสกอร์</span>
						<span id="1_CS_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="1_OE">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OE','1')">
						<span class="submenu" title="คี่/คู่">คี่/คู่</span>
						<span id="1_OE_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="1_TG">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('TG','1')">
						<span class="submenu" title="จำนวนรวมของประตู">จำนวนรวมของประตู</span>
						<span id="1_TG_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="1_HTFT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('HTFT','1')">
						<span class="submenu" title="ครึ่งแรก / เต็มเวลา">ครึ่งแรก / เต็มเวลา</span>
						<span id="1_HTFT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="1_HTFTOE">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('HTFTOE','1')">
						<span class="submenu" title="HT / FT Odd/Even">HT / FT Odd/Even</span>
						<span id="1_HTFTOE_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="1_FGLG">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('FGLG','1')">
						<span class="submenu" title="ประตูแรก/ ประตูสุดท้าย">ประตูแรก/ ประตูสุดท้าย</span>
						<span id="1_FGLG_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="1_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','1')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="1_P_Cnt" class="text-number"></span>
						<span id="img_1_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="1_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','1')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="1_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<!-- <div id='161_head'>
			<a class="navon" href="JavaScript:SwitchSport('','161')" title="เกมหมายเลข">
				<div class="right">
					<span id="img_161_TV" class="iconOdds tv" onclick="fFrame.openBingoStreamingMain();" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_161_LV" class="icon_live" style="display:none"></span>
					<span class="icon_new" style="display:inline-block"></span>
					<span id="161_Cnt" class="text-number" ></span>
				</div>
				<div class="text-ellipsis">เกมหมายเลข</div>
			</a>
		</div> -->
	<!-- 	<div id='161_body' class="MuSubbg">
			<div id="161_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:SwitchSport('','161')" class="current">
						<span class="submenu" title="เกมหมายเลข">เกมหมายเลข</span>
						<span id="161_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			
		<div id="164_A">
			<div class="subnav-link" style="display: block;">
				<a href="JavaScript:SwitchSport('','164')">
					<span class="submenu" title="Happy 5">Happy 5</span>
					<span id="164_A_Cnt" class="text-number"></span>
					<span class="icon_new" ></span>
				</a>
			</div>
		</div>
		
		</div> -->
		
	<!-- 	<div id='18X_head'>
			<a class="navon" href="JavaScript:SwitchSport('','194')" title="หมวดเกมส์จำลอง">
				<div class="right">
				</div>
				<div class="text-ellipsis">หมวดเกมส์จำลอง</div>
			</a>
		</div> -->
		<!-- <div id='18X_body' class="MuSubbg"> -->
			<!-- BEGIN T_VirtualSport_194 -->
			<!-- <div id="194_A">
				<div class="subnav-link two-tags" style="display: block;">
					<a href="JavaScript:ShowOdds('','194')">
						<span class="submenu" title="ฟุตบอลอนิเมชั่นเอเชี่ยนคัพ">ฟุตบอลอนิเมชั่นเอเชี่ยนคัพ</span>
						<span class="icon_trophy"></span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_194 -->
			<!-- BEGIN T_VirtualSport_190 -->
			<!-- <div id="190_A">
				<div class="subnav-link two-tags" style="display: block;">
					<a href="JavaScript:ShowOdds('','190')">
						<span class="submenu" title="ฟุตบอลลีกเสมือนจริง">ฟุตบอลลีกเสมือนจริง</span>
						<span class="icon_trophy"></span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_190 -->
			<!-- BEGIN T_VirtualSport_192 -->
			<!-- <div id="192_A">
				<div class="subnav-link two-tags" style="display: block;">
					<a href="JavaScript:ShowOdds('','192')">
						<span class="submenu" title="ฟุตบอลโลกเสมือนจริง">ฟุตบอลโลกเสมือนจริง</span>
						<span class="icon_trophy"></span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_192 -->
			<!-- BEGIN T_VirtualSport_191 -->
			<!-- <div id="191_A">
				<div class="subnav-link two-tags" style="display: block;">
					<a href="JavaScript:ShowOdds('','191')">
						<span class="submenu" title="ทีมชาติฟุตบอลเสมือนจริง">ทีมชาติฟุตบอลเสมือนจริง</span>
						<span class="icon_trophy"></span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_191 -->
			<!-- BEGIN T_VirtualSport_180 -->
			<!-- <div id="180_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','180')">
						<span class="submenu" title="ฟุตบอลอนิเมชั่น">ฟุตบอลอนิเมชั่น</span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_180 -->
			<!-- BEGIN T_VirtualSport_193 -->
			<!-- <div id="193_A">
				<div class="subnav-link two-tags" style="display: block;">
					<a href="JavaScript:ShowOdds('','193')">
						<span class="submenu" title="บาสเกตบอลเสมือนจริง">บาสเกตบอลเสมือนจริง</span>
						<span class="icon_trophy"></span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_193 -->
			<!-- BEGIN T_VirtualSport_181 -->
			<!-- <div id="181_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','181')">

						<span class="submenu" title="แข่งม้าเสมือนจริง">แข่งม้าเสมือนจริง</span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_181 -->
			<!-- BEGIN T_VirtualSport_182 -->
			<!-- <div id="182_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','182')">
						<span class="submenu" title="แข่งเกรย์ฮาวด์ออนไลน์">แข่งเกรย์ฮาวด์ออนไลน์</span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_182 -->
			<!-- BEGIN T_VirtualSport_186 -->
			<!-- <div id="186_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','186')">
						<span class="submenu" title="เทนนิสเสมือนจริง">เทนนิสเสมือนจริง</span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_186 -->
			<!-- BEGIN T_VirtualSport_184 -->
			<!-- <div id="184_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','184')">
						<span class="submenu" title="แข่งรถเสมือนจริง">แข่งรถเสมือนจริง</span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_184 -->
			<!-- BEGIN T_VirtualSport_185 -->
			<!-- <div id="185_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','185')">
						<span class="submenu" title="แข่งจักรยานออนไลน์">แข่งจักรยานออนไลน์</span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_185 -->
			<!-- BEGIN T_VirtualSport_183 -->
			<!-- <div id="183_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','183')">
						<span class="submenu" title="ถนนแข่งรถออนไลน์">ถนนแข่งรถออนไลน์</span>
					</a>
				</div>
			</div> -->
			<!-- END T_VirtualSport_183 -->
		<!-- </div> -->
		
		<div id='43_head'>
			<a class="navon current" href="JavaScript:SwitchSport('','43',false,false,'OU')" title="อีสปอร์ต">
				<div class="right">
					<span id="img_43_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_43_LV" class="icon_live"></span>
					<span id="43_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">อีสปอร์ต</div>
			</a>
		</div>
		<div id='43_body' class="MuSubbg">
			
		<div id="43_0" refId="0">
			<div class="subnav-link two-tags" style="display: block;">
				<a href="JavaScript:ShowOdds('','43',null,null,'0')">
					<span class="submenu" title="ทั้งหมด">ทั้งหมด</span>
					<span id="43_0_Cnt" class="text-number"></span>
				</a>
			</div>
		</div>
		
		<div id="43_1" refId="1">
			<div class="subnav-link two-tags" style="display: block;">
				<a href="JavaScript:ShowOdds('','43',null,null,'1')">
					<span class="submenu" title="โดตา 2 (Dota2)">โดตา 2 (Dota2)</span>
					<span id="43_1_Cnt" class="text-number"></span>
				</a>
			</div>
		</div>
		
		<div id="43_2" refId="2">
			<div class="subnav-link two-tags" style="display: block;">
				<a href="JavaScript:ShowOdds('','43',null,null,'2')">
					<span class="submenu" title="ลีกออฟเลเจนด์ (LOL)">ลีกออฟเลเจนด์ (LOL)</span>
					<span id="43_2_Cnt" class="text-number"></span>
				</a>
			</div>
		</div>
		
		<div id="43_3" refId="3">
			<div class="subnav-link two-tags" style="display: block;">
				<a href="JavaScript:ShowOdds('','43',null,null,'3')">
					<span class="submenu" title="CS:GO">CS:GO</span>
					<span id="43_3_Cnt" class="text-number"></span>
				</a>
			</div>
		</div>
		
		<div id="43_4" refId="4">
			<div class="subnav-link two-tags" style="display: block;">
				<a href="JavaScript:ShowOdds('','43',null,null,'4')">
					<span class="submenu" title="เคโอจี (KOG)">เคโอจี (KOG)</span>
					<span id="43_4_Cnt" class="text-number"></span>
				</a>
			</div>
		</div>
		
		<div id="43_99" refId="99">
			<div class="subnav-link two-tags" style="display: block;">
				<a href="JavaScript:ShowOdds('','43',null,null,'99')">
					<span class="submenu" title="อื่น ๆ">อื่น ๆ</span>
					<span id="43_99_Cnt" class="text-number"></span>
				</a>
			</div>
		</div>
		
			<div id="43_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','43')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="43_P_Cnt" class="text-number"></span>
						<span id="img_43_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="43_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','43')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="43_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='2_head'>
			<a class="navon" href="JavaScript:SwitchSport('','2',false,false,'OU')" title="บาสเก็ตบอล">
				<span class="sports-icon">
                	<img src="template/sportsicon/basketball.png" alt="" />
                </span>
				<div class="right">
					<span id="img_2_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_2_LV" class="icon_live"></span>
					<span id="2_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">บาสเก็ตบอล</div>
			</a>
		</div>
		<div id='2_body' class="MuSubbg">
			<div id="2_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','2','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="2_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="2_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','2')">
						<span class="submenu" title="บาสเก็ตบอลชุด">บาสเก็ตบอลชุด</span>
						<span id="2_P_Cnt" class="text-number"></span>
						<span id="img_2_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="2_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','2')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="2_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='8_head'>
			<a class="navon" href="JavaScript:SwitchSport('','8',false,false,'OU')" title="เบสบอล">
				<div class="right">
					<span id="img_8_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_8_LV" class="icon_live"></span>
					<span id="8_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">เบสบอล</div>
			</a>
		</div>
		<div id='8_body' class="MuSubbg">
			<div id="8_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','8','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="8_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="8_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','8')">
						<span class="submenu" title="เบสบอลชุด">เบสบอลชุด</span>
						<span id="8_P_Cnt" class="text-number"></span>
						<span id="img_8_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="8_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','8')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="8_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='3_head'>
			<a class="navon" href="JavaScript:SwitchSport('','3',false,false,'OU')" title="อเมริกันฟุตบอล">
				<div class="right">
					<span id="img_3_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_3_LV" class="icon_live"></span>
					<span id="3_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">อเมริกันฟุตบอล</div>
			</a>
		</div>
		<div id='3_body' class="MuSubbg">
			<div id="3_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','3','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="3_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="3_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','3')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="3_P_Cnt" class="text-number"></span>
						<span id="img_3_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="3_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','3')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="3_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='4_head'>
			<a class="navon" href="JavaScript:SwitchSport('','4',false,false,'OU')" title="ฮ๊อกกี้น้ำแข็ง">
				<span class="sports-icon">
                	<img src="template/sportsicon/ice_hockey.png" alt="" />
                </span>
				<div class="right">
					<span id="img_4_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_4_LV" class="icon_live"></span>
					<span id="4_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">ฮ๊อกกี้น้ำแข็ง</div>
			</a>
		</div>
		<div id='4_body' class="MuSubbg">
			<div id="4_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','4','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="4_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="4_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','4')">
						<span class="submenu" title="ฮ๊อกกี้น้ำแข็งชุด">ฮ๊อกกี้น้ำแข็งชุด</span>
						<span id="4_P_Cnt" class="text-number"></span>
						<span id="img_4_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="4_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','4')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="4_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='29_head'>
			<a class="navon" href="JavaScript:SwitchSport('','29',false,false,'OU')" title="Winter Sports">
				<div class="right">
					<span id="img_29_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_29_LV" class="icon_live"></span>
					<span id="29_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Winter Sports</div>
			</a>
		</div>
		<div id='29_body' class="MuSubbg">
			<div id="29_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','29','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="29_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="29_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','29')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="29_P_Cnt" class="text-number"></span>
						<span id="img_29_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="29_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','29')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="29_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='5_head'>
			<a class="navon" href="JavaScript:SwitchSport('','5',false,false,'OU')" title="เทนนิส">
				<span class="sports-icon">
                	<img src="template/sportsicon/tennis.png" alt="" />
                </span>
				<div class="right">
					<span id="img_5_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_5_LV" class="icon_live"></span>
					<span id="5_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">เทนนิส</div>
			</a>
		</div>
		<div id='5_body' class="MuSubbg">
			<div id="5_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','5','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="5_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="5_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','5')">
						<span class="submenu" title="เทนนิสชุด">เทนนิสชุด</span>
						<span id="5_P_Cnt" class="text-number"></span>
						<span id="img_5_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="5_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','5')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="5_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='9_head'>
			<a class="navon" href="JavaScript:SwitchSport('','9',false,false,'OU')" title="แบตมินตัน">
				<span class="sports-icon">
                	<img src="template/sportsicon/badminton.png" alt="" />
                </span>
				<div class="right">
					<span id="img_9_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_9_LV" class="icon_live"></span>
					<span id="9_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">แบตมินตัน</div>
			</a>
		</div>
		<div id='9_body' class="MuSubbg">
			<div id="9_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','9','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="9_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="9_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','9')">
						<span class="submenu" title="แบตมินตันชุด">แบตมินตันชุด</span>
						<span id="9_P_Cnt" class="text-number"></span>
						<span id="img_9_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="9_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','9')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="9_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='6_head'>
			<a class="navon" href="JavaScript:SwitchSport('','6',false,false,'OU')" title="วอลเลย์บอล">
				<span class="sports-icon">
                	<img src="template/sportsicon/volleyball.png" alt="" />
                </span>
				<div class="right">
					<span id="img_6_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_6_LV" class="icon_live"></span>
					<span id="6_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">วอลเลย์บอล</div>
			</a>
		</div>
		<div id='6_body' class="MuSubbg">
			<div id="6_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','6','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="6_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="6_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','6')">
						<span class="submenu" title="วอลเลย์บอลชุด">วอลเลย์บอลชุด</span>
						<span id="6_P_Cnt" class="text-number"></span>
						<span id="img_6_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="6_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','6')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="6_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='7_head'>
			<a class="navon" href="JavaScript:SwitchSport('','7',false,false,'OU')" title="สนุกเกอร์ / พูล">
				<div class="right">
					<span id="img_7_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_7_LV" class="icon_live"></span>
					<span id="7_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">สนุกเกอร์ / พูล</div>
			</a>
		</div>
		<div id='7_body' class="MuSubbg">
			<div id="7_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','7','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="7_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="7_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','7')">
						<span class="submenu" title="สนุกเกอร์ชุด">สนุกเกอร์ชุด</span>
						<span id="7_P_Cnt" class="text-number"></span>
						<span id="img_7_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="7_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','7')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="7_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='11_head'>
			<a class="navon" href="JavaScript:SwitchSport('','11',false,false,'OU')" title="กีฬายานยนต์">
				<div class="right">
					<span id="img_11_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_11_LV" class="icon_live"></span>
					<span id="11_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">กีฬายานยนต์</div>
			</a>
		</div>
		<div id='11_body' class="MuSubbg">
			<div id="11_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','11','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="11_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="11_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','11')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="11_P_Cnt" class="text-number"></span>
						<span id="img_11_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="11_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','11')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="11_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='50_head'>
			<a class="navon" href="JavaScript:SwitchSport('','50',false,false,'OU')" title="คริกเก็ต">
				<div class="right">
					<span id="img_50_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_50_LV" class="icon_live"></span>
					<span id="50_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">คริกเก็ต</div>
			</a>
		</div>
		<div id='50_body' class="MuSubbg">
			<div id="50_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','50','','OU')">
						<span class="submenu" title="Match, ราคาต่อรอง & สูงต่ำ">Match, ราคาต่อรอง & สูงต่ำ</span>
						<span id="50_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="50_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','50')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="50_P_Cnt" class="text-number"></span>
						<span id="img_50_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="50_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','50')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="50_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='47_head'>
			<a class="navon" href="JavaScript:SwitchSport('','47',false,false,'OU')" title="Kabaddi">
				<div class="right">
					<span id="img_47_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_47_LV" class="icon_live"></span>
					<span id="47_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Kabaddi</div>
			</a>
		</div>
		<div id='47_body' class="MuSubbg">
			<div id="47_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','47','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="47_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="47_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','47')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="47_P_Cnt" class="text-number"></span>
						<span id="img_47_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="47_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','47')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="47_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='99_head'>
			<a class="navon" href="JavaScript:SwitchSport('','99',false,false,'OU')" title="กีฬาอื่นๆ">
				<div class="right">
					<span id="img_99_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_99_LV" class="icon_live"></span>
					<span id="99_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">กีฬาอื่นๆ</div>
			</a>
		</div>
		<div id='99_body' class="MuSubbg">
			<div id="99_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','99','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="99_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="99_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','99')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="99_P_Cnt" class="text-number"></span>
						<span id="img_99_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="99_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','99')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="99_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='10_head'>
			<a class="navon" href="JavaScript:SwitchSport('','10',false,false,'OU')" title="กอล์ฟ">
				<div class="right">
					<span id="img_10_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_10_LV" class="icon_live"></span>
					<span id="10_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">กอล์ฟ</div>
			</a>
		</div>
		<div id='10_body' class="MuSubbg">
			<div id="10_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','10','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="10_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="10_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','10')">
						<span class="submenu" title="กอล์ฟชุด">กอล์ฟชุด</span>
						<span id="10_P_Cnt" class="text-number"></span>
						<span id="img_10_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="10_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','10')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="10_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='16_head'>
			<a class="navon" href="JavaScript:SwitchSport('','16',false,false,'OU')" title="มวย">
				<span class="sports-icon">
                	<img src="template/sportsicon/boxing_mma.png" alt="" />
                </span>
				<div class="right">
					<span id="img_16_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_16_LV" class="icon_live"></span>
					<span id="16_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">มวย</div>
			</a>
		</div>
		<div id='16_body' class="MuSubbg">
			<div id="16_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','16','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="16_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="16_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','16')">
						<span class="submenu" title="มวยชุด">มวยชุด</span>
						<span id="16_P_Cnt" class="text-number"></span>
						<span id="img_16_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="16_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','16')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="16_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='26_head'>
			<a class="navon" href="JavaScript:SwitchSport('','26',false,false,'OU')" title="รักบี้">
				<div class="right">
					<span id="img_26_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_26_LV" class="icon_live"></span>
					<span id="26_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">รักบี้</div>
			</a>
		</div>
		<div id='26_body' class="MuSubbg">
			<div id="26_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','26','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="26_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="26_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','26')">
						<span class="submenu" title="รักบี้ชุด">รักบี้ชุด</span>
						<span id="26_P_Cnt" class="text-number"></span>
						<span id="img_26_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="26_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','26')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="26_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='25_head'>
			<a class="navon" href="JavaScript:SwitchSport('','25',false,false,'OU')" title="ปาเป้า">
				<div class="right">
					<span id="img_25_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_25_LV" class="icon_live"></span>
					<span id="25_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ปาเป้า</div>
			</a>
		</div>
		<div id='25_body' class="MuSubbg">
			<div id="25_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','25','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="25_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="25_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','25')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="25_P_Cnt" class="text-number"></span>
						<span id="img_25_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="25_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','25')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="25_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='18_head'>
			<a class="navon" href="JavaScript:SwitchSport('','18',false,false,'OU')" title="ปิงปอง">
				<div class="right">
					<span id="img_18_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_18_LV" class="icon_live"></span>
					<span id="18_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ปิงปอง</div>
			</a>
		</div>
		<div id='18_body' class="MuSubbg">
			<div id="18_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','18','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="18_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="18_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','18')">
						<span class="submenu" title="ปิงปองชุด">ปิงปองชุด</span>
						<span id="18_P_Cnt" class="text-number"></span>
						<span id="img_18_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="18_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','18')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="18_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='48_head'>
			<a class="navon" href="JavaScript:SwitchSport('','48',false,false,'OU')" title="เซปักตะกร้อ">
				<div class="right">
					<span id="img_48_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_48_LV" class="icon_live"></span>
					<span id="48_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">เซปักตะกร้อ</div>
			</a>
		</div>
		<div id='48_body' class="MuSubbg">
			<div id="48_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','48','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="48_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="48_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','48')">
						<span class="submenu" title="ตะกร้อชุด">ตะกร้อชุด</span>
						<span id="48_P_Cnt" class="text-number"></span>
						<span id="img_48_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="48_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','48')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="48_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='49_head'>
			<a class="navon" href="JavaScript:SwitchSport('','49',false,false,'OU')" title="ฟุตซอล">
				<div class="right">
					<span id="img_49_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_49_LV" class="icon_live"></span>
					<span id="49_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ฟุตซอล</div>
			</a>
		</div>
		<div id='49_body' class="MuSubbg">
			<div id="49_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','49','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="49_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="49_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','49')">
						<span class="submenu" title="ฟุตซอลชุด">ฟุตซอลชุด</span>
						<span id="49_P_Cnt" class="text-number"></span>
						<span id="img_49_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="49_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','49')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="49_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='51_head'>
			<a class="navon" href="JavaScript:SwitchSport('','51',false,false,'OU')" title="ฟุตบอลชายหาด">
				<div class="right">
					<span id="img_51_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_51_LV" class="icon_live"></span>
					<span id="51_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ฟุตบอลชายหาด</div>
			</a>
		</div>
		<div id='51_body' class="MuSubbg">
			<div id="51_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','51','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="51_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="51_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','51')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="51_P_Cnt" class="text-number"></span>
						<span id="img_51_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="51_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','51')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="51_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='30_head'>
			<a class="navon" href="JavaScript:SwitchSport('','30',false,false,'OU')" title="Squash">
				<div class="right">
					<span id="img_30_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_30_LV" class="icon_live"></span>
					<span id="30_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Squash</div>
			</a>
		</div>
		<div id='30_body' class="MuSubbg">
			<div id="30_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','30','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="30_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="30_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','30')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="30_P_Cnt" class="text-number"></span>
						<span id="img_30_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="30_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','30')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="30_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='28_head'>
			<a class="navon" href="JavaScript:SwitchSport('','28',false,false,'OU')" title="ฟิลด์ฮอกกี้">
				<span class="sports-icon">
                	<!-- <img src="template/sportsicon/field_hockey.png" alt="" /> -->
                </span>
				<div class="right">
					<span id="img_28_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_28_LV" class="icon_live"></span>
					<span id="28_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">ฟิลด์ฮอกกี้</div>
			</a>
		</div>
		<div id='28_body' class="MuSubbg">
			<div id="28_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','28','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="28_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="28_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','28')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="28_P_Cnt" class="text-number"></span>
						<span id="img_28_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="28_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','28')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="28_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='24_head'>
			<a class="navon" href="JavaScript:SwitchSport('','24',false,false,'OU')" title="แฮนด์บอล">
				<span class="sports-icon">
                	<img src="template/sportsicon/handball.png" alt="" />
                </span>
				<div class="right">
					<span id="img_24_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_24_LV" class="icon_live"></span>
					<span id="24_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">แฮนด์บอล</div>
			</a>
		</div>
		<div id='24_body' class="MuSubbg">
			<div id="24_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','24','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="24_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="24_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','24')">
						<span class="submenu" title="แฮนด์บอลชุด">แฮนด์บอลชุด</span>
						<span id="24_P_Cnt" class="text-number"></span>
						<span id="img_24_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="24_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','24')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="24_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='32_head'>
			<a class="navon" href="JavaScript:SwitchSport('','32',false,false,'OU')" title="Netball">
				<div class="right">
					<span id="img_32_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_32_LV" class="icon_live"></span>
					<span id="32_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Netball</div>
			</a>
		</div>
		<div id='32_body' class="MuSubbg">
			<div id="32_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','32','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="32_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="32_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','32')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="32_P_Cnt" class="text-number"></span>
						<span id="img_32_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="32_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','32')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="32_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='22_head'>
			<a class="navon" href="JavaScript:SwitchSport('','22',false,false,'OU')" title="กรีฑา">
				<div class="right">
					<span id="img_22_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_22_LV" class="icon_live"></span>
					<span id="22_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">กรีฑา</div>
			</a>
		</div>
		<div id='22_body' class="MuSubbg">
			<div id="22_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','22','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="22_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="22_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','22')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="22_P_Cnt" class="text-number"></span>
						<span id="img_22_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="22_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','22')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="22_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='12_head'>
			<a class="navon" href="JavaScript:SwitchSport('','12',false,false,'OU')" title="ว่ายน้ำ">
				<div class="right">
					<span id="img_12_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_12_LV" class="icon_live"></span>
					<span id="12_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ว่ายน้ำ</div>
			</a>
		</div>
		<div id='12_body' class="MuSubbg">
			<div id="12_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','12','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="12_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="12_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','12')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="12_P_Cnt" class="text-number"></span>
						<span id="img_12_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="12_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','12')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="12_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='14_head'>
			<a class="navon" href="JavaScript:SwitchSport('','14',false,false,'OU')" title="โปโลน้ำ">
				<span class="sports-icon">
                	<img src="template/sportsicon/water_polo.png" alt="" />
                </span>
				<div class="right">
					<span id="img_14_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_14_LV" class="icon_live"></span>
					<span id="14_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">โปโลน้ำ</div>
			</a>
		</div>
		<div id='14_body' class="MuSubbg">
			<div id="14_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','14','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="14_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="14_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','14')">
						<span class="submenu" title="โปโลน้ำชุด">โปโลน้ำชุด</span>
						<span id="14_P_Cnt" class="text-number"></span>
						<span id="img_14_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="14_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','14')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="14_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='15_head'>
			<a class="navon" href="JavaScript:SwitchSport('','15',false,false,'OU')" title="ดำน้ำ">
				<div class="right">
					<span id="img_15_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_15_LV" class="icon_live"></span>
					<span id="15_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ดำน้ำ</div>
			</a>
		</div>
		<div id='15_body' class="MuSubbg">
			<div id="15_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','15','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="15_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="15_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','15')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="15_P_Cnt" class="text-number"></span>
						<span id="img_15_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="15_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','15')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="15_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='17_head'>
			<a class="navon" href="JavaScript:SwitchSport('','17',false,false,'OU')" title="ยิงธนู">
				<div class="right">
					<span id="img_17_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_17_LV" class="icon_live"></span>
					<span id="17_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ยิงธนู</div>
			</a>
		</div>
		<div id='17_body' class="MuSubbg">
			<div id="17_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','17','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="17_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="17_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','17')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="17_P_Cnt" class="text-number"></span>
						<span id="img_17_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="17_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','17')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="17_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='20_head'>
			<a class="navon" href="JavaScript:SwitchSport('','20',false,false,'OU')" title="เรือแคนู">
				<div class="right">
					<span id="img_20_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_20_LV" class="icon_live"></span>
					<span id="20_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">เรือแคนู</div>
			</a>
		</div>
		<div id='20_body' class="MuSubbg">
			<div id="20_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','20','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="20_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="20_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','20')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="20_P_Cnt" class="text-number"></span>
						<span id="img_20_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="20_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','20')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="20_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='33_head'>
			<a class="navon" href="JavaScript:SwitchSport('','33',false,false,'OU')" title="กีฬาขี่จักรยาน">
				<div class="right">
					<span id="img_33_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_33_LV" class="icon_live"></span>
					<span id="33_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">กีฬาขี่จักรยาน</div>
			</a>
		</div>
		<div id='33_body' class="MuSubbg">
			<div id="33_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','33','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="33_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="33_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','33')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="33_P_Cnt" class="text-number"></span>
						<span id="img_33_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="33_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','33')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="33_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='31_head'>
			<a class="navon" href="JavaScript:SwitchSport('','31',false,false,'OU')" title="ความบันเทิง">
				<div class="right">
					<span id="img_31_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_31_LV" class="icon_live"></span>
					<span id="31_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ความบันเทิง</div>
			</a>
		</div>
		<div id='31_body' class="MuSubbg">
			<div id="31_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','31','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="31_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="31_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','31')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="31_P_Cnt" class="text-number"></span>
						<span id="img_31_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="31_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','31')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="31_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='23_head'>
			<a class="navon" href="JavaScript:SwitchSport('','23',false,false,'OU')" title="ขี่ม้า">
				<div class="right">
					<span id="img_23_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_23_LV" class="icon_live"></span>
					<span id="23_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ขี่ม้า</div>
			</a>
		</div>
		<div id='23_body' class="MuSubbg">
			<div id="23_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','23','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="23_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="23_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','23')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="23_P_Cnt" class="text-number"></span>
						<span id="img_23_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="23_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','23')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="23_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='34_head'>
			<a class="navon" href="JavaScript:SwitchSport('','34',false,false,'OU')" title="Fencing">
				<div class="right">
					<span id="img_34_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_34_LV" class="icon_live"></span>
					<span id="34_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Fencing</div>
			</a>
		</div>
		<div id='34_body' class="MuSubbg">
			<div id="34_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','34','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="34_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="34_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','34')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="34_P_Cnt" class="text-number"></span>
						<span id="img_34_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="34_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','34')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="34_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='21_head'>
			<a class="navon" href="JavaScript:SwitchSport('','21',false,false,'OU')" title="ยิมนาสติก">
				<div class="right">
					<span id="img_21_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_21_LV" class="icon_live"></span>
					<span id="21_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ยิมนาสติก</div>
			</a>
		</div>
		<div id='21_body' class="MuSubbg">
			<div id="21_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','21','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="21_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="21_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','21')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="21_P_Cnt" class="text-number"></span>
						<span id="img_21_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="21_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','21')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="21_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='35_head'>
			<a class="navon" href="JavaScript:SwitchSport('','35',false,false,'OU')" title="Judo">
				<div class="right">
					<span id="img_35_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_35_LV" class="icon_live"></span>
					<span id="35_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Judo</div>
			</a>
		</div>
		<div id='35_body' class="MuSubbg">
			<div id="35_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','35','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="35_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="35_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','35')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="35_P_Cnt" class="text-number"></span>
						<span id="img_35_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="35_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','35')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="35_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='36_head'>
			<a class="navon" href="JavaScript:SwitchSport('','36',false,false,'OU')" title="M. Pentathlon">
				<div class="right">
					<span id="img_36_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_36_LV" class="icon_live"></span>
					<span id="36_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">M. Pentathlon</div>
			</a>
		</div>
		<div id='36_body' class="MuSubbg">
			<div id="36_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','36','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="36_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="36_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','36')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="36_P_Cnt" class="text-number"></span>
						<span id="img_36_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="36_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','36')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="36_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='37_head'>
			<a class="navon" href="JavaScript:SwitchSport('','37',false,false,'OU')" title="Rowing">
				<div class="right">
					<span id="img_37_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_37_LV" class="icon_live"></span>
					<span id="37_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Rowing</div>
			</a>
		</div>
		<div id='37_body' class="MuSubbg">
			<div id="37_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','37','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="37_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="37_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','37')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="37_P_Cnt" class="text-number"></span>
						<span id="img_37_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="37_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','37')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="37_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='38_head'>
			<a class="navon" href="JavaScript:SwitchSport('','38',false,false,'OU')" title="Sailing">
				<div class="right">
					<span id="img_38_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_38_LV" class="icon_live"></span>
					<span id="38_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Sailing</div>
			</a>
		</div>
		<div id='38_body' class="MuSubbg">
			<div id="38_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','38','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="38_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="38_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','38')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="38_P_Cnt" class="text-number"></span>
						<span id="img_38_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="38_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','38')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="38_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='39_head'>
			<a class="navon" href="JavaScript:SwitchSport('','39',false,false,'OU')" title="Shooting">
				<div class="right">
					<span id="img_39_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_39_LV" class="icon_live"></span>
					<span id="39_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Shooting</div>
			</a>
		</div>
		<div id='39_body' class="MuSubbg">
			<div id="39_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','39','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="39_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="39_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','39')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="39_P_Cnt" class="text-number"></span>
						<span id="img_39_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="39_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','39')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="39_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='40_head'>
			<a class="navon" href="JavaScript:SwitchSport('','40',false,false,'OU')" title="Taekwondo">
				<div class="right">
					<span id="img_40_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_40_LV" class="icon_live"></span>
					<span id="40_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Taekwondo</div>
			</a>
		</div>
		<div id='40_body' class="MuSubbg">
			<div id="40_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','40','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="40_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="40_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','40')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="40_P_Cnt" class="text-number"></span>
						<span id="img_40_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="40_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','40')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="40_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='41_head'>
			<a class="navon" href="JavaScript:SwitchSport('','41',false,false,'OU')" title="Triathlon">
				<div class="right">
					<span id="img_41_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_41_LV" class="icon_live"></span>
					<span id="41_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Triathlon</div>
			</a>
		</div>
		<div id='41_body' class="MuSubbg">
			<div id="41_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','41','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="41_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="41_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','41')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="41_P_Cnt" class="text-number"></span>
						<span id="img_41_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="41_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','41')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="41_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='19_head'>
			<a class="navon" href="JavaScript:SwitchSport('','19',false,false,'OU')" title="ยกน้ำหนัก">
				<div class="right">
					<span id="img_19_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_19_LV" class="icon_live"></span>
					<span id="19_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">ยกน้ำหนัก</div>
			</a>
		</div>
		<div id='19_body' class="MuSubbg">
			<div id="19_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','19','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="19_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="19_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','19')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="19_P_Cnt" class="text-number"></span>
						<span id="img_19_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="19_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','19')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="19_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='42_head'>
			<a class="navon" href="JavaScript:SwitchSport('','42',false,false,'OU')" title="มวยปล้ำ">
				<div class="right">
					<span id="img_42_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_42_LV" class="icon_live"></span>
					<span id="42_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">มวยปล้ำ</div>
			</a>
		</div>
		<div id='42_body' class="MuSubbg">
			<div id="42_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','42','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="42_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="42_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','42')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="42_P_Cnt" class="text-number"></span>
						<span id="img_42_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="42_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','42')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="42_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<div id='13_head'>
			<a class="navon" href="JavaScript:SwitchSport('','13',false,false,'OU')" title="การเมือง">
				<div class="right">
					<span id="img_13_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_13_LV" class="icon_live"></span>
					<span id="13_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">การเมือง</div>
			</a>
		</div>
		<div id='13_body' class="MuSubbg">
			<div id="13_A">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('','13','','OU')">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ</span>
						<span id="13_A_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
			<div id="13_P">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('P','13')">
						<span class="submenu" title="บอลชุด">บอลชุด</span>
						<span id="13_P_Cnt" class="text-number"></span>
						<span id="img_13_P_LV" class="icon_live"></span>
					</a>
				</div>
			</div>
			<div id="13_OT">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('OT','13')">
						<span class="submenu" title="เอาท์ไรท์">เอาท์ไรท์</span>
						<span id="13_OT_Cnt" class="text-number"></span>
					</a>
				</div>
			</div>
		</div>
		
		<!--Finance-->
		<div id='201_head'>
			<a class="navon" href="JavaScript:SwitchSport('','201')" title="Financials">
				<div class="right">
					<span id="iveimg_201_LV" class="icon_live"></span>
					<span id="201_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">Financials</div>
			</a>
		</div>
		<div id='201_body' class="MuSubbg">
			<div id="201_0">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('0','201')">
						<span class="submenu" title="Random">Random</span>
					</a>
				</div>
			</div>
			<div id="201_5300">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('5300','201')">
						<span class="submenu" title="Nikkei">Nikkei</span>
					</a>
				</div>
			</div>
			<div id="201_5301">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('5301','201')">
						<span class="submenu" title="Hong Kong">Hong Kong</span>
					</a>
				</div>
			</div>
			<div id="201_5306">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('5306','201')">
						<span class="submenu" title="Wall Street">Wall Street</span>
					</a>
				</div>
			</div>
			<div id="201_5309">
				<div class="subnav-link" style="display: block;">
					<a href="JavaScript:ShowOdds('5309','201')">
						<span class="submenu" title="UK 100">UK 100</span>
					</a>
				</div>
			</div>
		</div>
		<!--SportsParlay-->
		<div id='P_head'>
			<a class="navon" href="JavaScript:SwitchSport('P','0')" title="บอลชุด">
				<span class="sports-icon">
                	<img src="template/sportsicon/mix_parley.png" alt="" />
                </span>
				<div class="right">
					<span id="img_P_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
					<span id="img_P_LV" class="icon_live"></span>
					<span id="P_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis sports-name">บอลชุด</div>
			</a>
		</div>
		<div id='0_body' class="MuSubbg"></div>

		<!--Oudivight-->
		<div id='OT_head'>
			<a class="navon" href="JavaScript:SwitchSport('OT','0')" title="เอาท์ไรท์">
				<div class="right">
					<span id="OT_Cnt" class="text-number"></span>
				</div>
				<div class="text-ellipsis">เอาท์ไรท์</div>
			</a>
		</div>
		<div id='OT_body' class="MuSubbg"></div>
	</div>

</div>
</div>

<!--Live-->
<div id="subnavbg">
<div id="subnav">

<div id="market_L_body" style='display:none'>

		<!--All Sports-->
		<div id='L_A_head'>
			<a class="navon" href="JavaScript:LiveSportsClickAll(false)" title="ทั้งหมด">
                <div class="right">
                    <span id="img_L_A_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_A_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSpotrs_All" class="hight" checked="checked"  onclick="LiveSportsClickAll(false);" hidefocus="" type="checkbox" />ทั้งหมด</div>
            </a>
		</div>
		
		<!-- BEGIN L_LiveCasino -->
		<!--<div id='L_162_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('162')" title="คาสิโน ออนไลน์">
                <div class="text-ellipsis"><input id="chkLvSport_162" name="chkLvSport" type="checkbox" class="hight"  value="162" checked="checked" hidefocus="" />คาสิโน ออนไลน์</div>
            </a>
</div>
		<div id='L_162'></div>		-->
		<!-- END L_LiveCasino -->	
		
		
        
		<div id='L_44_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('44')" title="มวยไทย">
                <div class="right">
                    <span id="img_L_44_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_44_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_44" name="chkLvSport" type="checkbox" class="hight"  value="44" checked="checked" hidefocus="" />มวยไทย</div>
            </a>
</div>
		<div id='L_44'></div>
		
		<div id='L_1_head'>
            <a  class="navon" onclick="JavaScript:LiveSportLinkClick('1')" title="ฟุตบอล">
                <div class="right">
                    <span id="img_L_1_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_1_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_1" name="chkLvSport" type="checkbox" class="hight" checked="checked" value="1" hidefocus="" >ฟุตบอล</div>
            </a>
		</div>
		<div id='L_1' class="MuSubbg">
				<div class="subnav-link" style="display: block; position:relative;">
					<a href="JavaScript:changeLiveDisplayMode(fFrame.DisplayMode)">
						<span class="submenu" title="ราคาต่อรอง & สูงต่ำ">ราคาต่อรอง & สูงต่ำ
							<span id="L_1_A_Cnt" class="text-number"></span>
						</span>
					</a>
					&nbsp;<div style="position:absolute; top:22px; left: 16px;"><a href="JavaScript:changeLiveDisplayMode('1')" style="display:inline;padding:0px; margin:0px;"><b>ใหม่</b></a> | 
					<a href="JavaScript:changeLiveDisplayMode('1F')" style="display:inline;padding:0px; margin:0px;"><b>เก่า</b></a></div>
				</div>
		</div>
		
		<div id='L_161_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('161')" title="เกมหมายเลข">
                <div class="right">
                    <span id="img_L_161_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์" onclick ="fFrame.openBingoStreamingMain();"></span>
                    <span id="L_161_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_161" name="chkLvSport" type="checkbox" class="hight"  value="161" checked="checked" hidefocus="" />เกมหมายเลข</div>
            </a>
        </div>
		<div  id='L_161'></div>
        <!---->

		<div id='L_43_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('43')" title="อีสปอร์ต">
                <div class="right">
                    <span id="img_L_43_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_43_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_43" name="chkLvSport" type="checkbox" class="hight"  value="43" checked="checked" hidefocus="" />อีสปอร์ต</div>
            </a>
</div>
		<div id='L_43'></div>
		
		<div id='L_2_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('2')" title="บาสเก็ตบอล">
                <div class="right">
                    <span id="img_L_2_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_2_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_2" name="chkLvSport" type="checkbox" class="hight"  value="2" checked="checked" hidefocus="" />บาสเก็ตบอล</div>
            </a>
</div>
		<div id='L_2'></div>
		
		<div id='L_8_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('8')" title="เบสบอล">
                <div class="right">
                    <span id="img_L_8_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_8_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_8" name="chkLvSport" type="checkbox" class="hight"  value="8" checked="checked" hidefocus="" />เบสบอล</div>
            </a>
</div>
		<div id='L_8'></div>
		
		<div id='L_3_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('3')" title="อเมริกันฟุตบอล">
                <div class="right">
                    <span id="img_L_3_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_3_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_3" name="chkLvSport" type="checkbox" class="hight"  value="3" checked="checked" hidefocus="" />อเมริกันฟุตบอล</div>
            </a>
</div>
		<div id='L_3'></div>
		
		<div id='L_4_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('4')" title="ฮ๊อกกี้น้ำแข็ง">
                <div class="right">
                    <span id="img_L_4_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_4_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_4" name="chkLvSport" type="checkbox" class="hight"  value="4" checked="checked" hidefocus="" />ฮ๊อกกี้น้ำแข็ง</div>
            </a>
</div>
		<div id='L_4'></div>
		
		<div id='L_29_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('29')" title="Winter Sports">
                <div class="right">
                    <span id="img_L_29_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_29_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_29" name="chkLvSport" type="checkbox" class="hight"  value="29" checked="checked" hidefocus="" />Winter Sports</div>
            </a>
</div>
		<div id='L_29'></div>
		
		<div id='L_5_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('5')" title="เทนนิส">
                <div class="right">
                    <span id="img_L_5_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_5_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_5" name="chkLvSport" type="checkbox" class="hight"  value="5" checked="checked" hidefocus="" />เทนนิส</div>
            </a>
</div>
		<div id='L_5'></div>
		
		<div id='L_9_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('9')" title="แบตมินตัน">
                <div class="right">
                    <span id="img_L_9_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_9_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_9" name="chkLvSport" type="checkbox" class="hight"  value="9" checked="checked" hidefocus="" />แบตมินตัน</div>
            </a>
</div>
		<div id='L_9'></div>
		
		<div id='L_6_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('6')" title="วอลเลย์บอล">
                <div class="right">
                    <span id="img_L_6_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_6_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_6" name="chkLvSport" type="checkbox" class="hight"  value="6" checked="checked" hidefocus="" />วอลเลย์บอล</div>
            </a>
</div>
		<div id='L_6'></div>
		
		<div id='L_7_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('7')" title="สนุกเกอร์ / พูล">
                <div class="right">
                    <span id="img_L_7_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_7_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_7" name="chkLvSport" type="checkbox" class="hight"  value="7" checked="checked" hidefocus="" />สนุกเกอร์ / พูล</div>
            </a>
</div>
		<div id='L_7'></div>
		
		<div id='L_11_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('11')" title="กีฬายานยนต์">
                <div class="right">
                    <span id="img_L_11_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_11_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_11" name="chkLvSport" type="checkbox" class="hight"  value="11" checked="checked" hidefocus="" />กีฬายานยนต์</div>
            </a>
</div>
		<div id='L_11'></div>
		
		<div id='L_50_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('50')" title="คริกเก็ต">
                <div class="right">
                    <span id="img_L_50_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_50_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_50" name="chkLvSport" type="checkbox" class="hight"  value="50" checked="checked" hidefocus="" />คริกเก็ต</div>
            </a>
</div>
		<div id='L_50'></div>
		
		<div id='L_47_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('47')" title="Kabaddi">
                <div class="right">
                    <span id="img_L_47_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_47_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_47" name="chkLvSport" type="checkbox" class="hight"  value="47" checked="checked" hidefocus="" />Kabaddi</div>
            </a>
</div>
		<div id='L_47'></div>
		
		<div id='L_99_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('99')" title="กีฬาอื่นๆ">
                <div class="right">
                    <span id="img_L_99_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_99_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_99" name="chkLvSport" type="checkbox" class="hight"  value="99" checked="checked" hidefocus="" />กีฬาอื่นๆ</div>
            </a>
</div>
		<div id='L_99'></div>
		
		<div id='L_10_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('10')" title="กอล์ฟ">
                <div class="right">
                    <span id="img_L_10_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_10_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_10" name="chkLvSport" type="checkbox" class="hight"  value="10" checked="checked" hidefocus="" />กอล์ฟ</div>
            </a>
</div>
		<div id='L_10'></div>
		
		<div id='L_16_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('16')" title="มวย">
                <div class="right">
                    <span id="img_L_16_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_16_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_16" name="chkLvSport" type="checkbox" class="hight"  value="16" checked="checked" hidefocus="" />มวย</div>
            </a>
</div>
		<div id='L_16'></div>
		
		<div id='L_26_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('26')" title="รักบี้">
                <div class="right">
                    <span id="img_L_26_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_26_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_26" name="chkLvSport" type="checkbox" class="hight"  value="26" checked="checked" hidefocus="" />รักบี้</div>
            </a>
</div>
		<div id='L_26'></div>
		
		<div id='L_25_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('25')" title="ปาเป้า">
                <div class="right">
                    <span id="img_L_25_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_25_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_25" name="chkLvSport" type="checkbox" class="hight"  value="25" checked="checked" hidefocus="" />ปาเป้า</div>
            </a>
</div>
		<div id='L_25'></div>
		
		<div id='L_18_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('18')" title="ปิงปอง">
                <div class="right">
                    <span id="img_L_18_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_18_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_18" name="chkLvSport" type="checkbox" class="hight"  value="18" checked="checked" hidefocus="" />ปิงปอง</div>
            </a>
</div>
		<div id='L_18'></div>
		
		<div id='L_48_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('48')" title="เซปักตะกร้อ">
                <div class="right">
                    <span id="img_L_48_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_48_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_48" name="chkLvSport" type="checkbox" class="hight"  value="48" checked="checked" hidefocus="" />เซปักตะกร้อ</div>
            </a>
</div>
		<div id='L_48'></div>
		
		<div id='L_49_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('49')" title="ฟุตซอล">
                <div class="right">
                    <span id="img_L_49_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_49_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_49" name="chkLvSport" type="checkbox" class="hight"  value="49" checked="checked" hidefocus="" />ฟุตซอล</div>
            </a>
</div>
		<div id='L_49'></div>
		
		<div id='L_51_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('51')" title="ฟุตบอลชายหาด">
                <div class="right">
                    <span id="img_L_51_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_51_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_51" name="chkLvSport" type="checkbox" class="hight"  value="51" checked="checked" hidefocus="" />ฟุตบอลชายหาด</div>
            </a>
</div>
		<div id='L_51'></div>
		
		<div id='L_30_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('30')" title="Squash">
                <div class="right">
                    <span id="img_L_30_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_30_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_30" name="chkLvSport" type="checkbox" class="hight"  value="30" checked="checked" hidefocus="" />Squash</div>
            </a>
</div>
		<div id='L_30'></div>
		
		<div id='L_28_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('28')" title="ฟิลด์ฮอกกี้">
                <div class="right">
                    <span id="img_L_28_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_28_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_28" name="chkLvSport" type="checkbox" class="hight"  value="28" checked="checked" hidefocus="" />ฟิลด์ฮอกกี้</div>
            </a>
</div>
		<div id='L_28'></div>
		
		<div id='L_24_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('24')" title="แฮนด์บอล">
                <div class="right">
                    <span id="img_L_24_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_24_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_24" name="chkLvSport" type="checkbox" class="hight"  value="24" checked="checked" hidefocus="" />แฮนด์บอล</div>
            </a>
</div>
		<div id='L_24'></div>
		
		<div id='L_32_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('32')" title="Netball">
                <div class="right">
                    <span id="img_L_32_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_32_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_32" name="chkLvSport" type="checkbox" class="hight"  value="32" checked="checked" hidefocus="" />Netball</div>
            </a>
</div>
		<div id='L_32'></div>
		
		<div id='L_22_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('22')" title="กรีฑา">
                <div class="right">
                    <span id="img_L_22_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_22_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_22" name="chkLvSport" type="checkbox" class="hight"  value="22" checked="checked" hidefocus="" />กรีฑา</div>
            </a>
</div>
		<div id='L_22'></div>
		
		<div id='L_12_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('12')" title="ว่ายน้ำ">
                <div class="right">
                    <span id="img_L_12_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_12_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_12" name="chkLvSport" type="checkbox" class="hight"  value="12" checked="checked" hidefocus="" />ว่ายน้ำ</div>
            </a>
</div>
		<div id='L_12'></div>
		
		<div id='L_14_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('14')" title="โปโลน้ำ">
                <div class="right">
                    <span id="img_L_14_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_14_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_14" name="chkLvSport" type="checkbox" class="hight"  value="14" checked="checked" hidefocus="" />โปโลน้ำ</div>
            </a>
</div>
		<div id='L_14'></div>
		
		<div id='L_15_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('15')" title="ดำน้ำ">
                <div class="right">
                    <span id="img_L_15_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_15_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_15" name="chkLvSport" type="checkbox" class="hight"  value="15" checked="checked" hidefocus="" />ดำน้ำ</div>
            </a>
</div>
		<div id='L_15'></div>
		
		<div id='L_17_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('17')" title="ยิงธนู">
                <div class="right">
                    <span id="img_L_17_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_17_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_17" name="chkLvSport" type="checkbox" class="hight"  value="17" checked="checked" hidefocus="" />ยิงธนู</div>
            </a>
</div>
		<div id='L_17'></div>
		
		<div id='L_20_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('20')" title="เรือแคนู">
                <div class="right">
                    <span id="img_L_20_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_20_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_20" name="chkLvSport" type="checkbox" class="hight"  value="20" checked="checked" hidefocus="" />เรือแคนู</div>
            </a>
</div>
		<div id='L_20'></div>
		
		<div id='L_33_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('33')" title="กีฬาขี่จักรยาน">
                <div class="right">
                    <span id="img_L_33_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_33_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_33" name="chkLvSport" type="checkbox" class="hight"  value="33" checked="checked" hidefocus="" />กีฬาขี่จักรยาน</div>
            </a>
</div>
		<div id='L_33'></div>
		
		<div id='L_31_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('31')" title="ความบันเทิง">
                <div class="right">
                    <span id="img_L_31_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_31_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_31" name="chkLvSport" type="checkbox" class="hight"  value="31" checked="checked" hidefocus="" />ความบันเทิง</div>
            </a>
</div>
		<div id='L_31'></div>
		
		<div id='L_23_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('23')" title="ขี่ม้า">
                <div class="right">
                    <span id="img_L_23_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_23_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_23" name="chkLvSport" type="checkbox" class="hight"  value="23" checked="checked" hidefocus="" />ขี่ม้า</div>
            </a>
</div>
		<div id='L_23'></div>
		
		<div id='L_34_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('34')" title="Fencing">
                <div class="right">
                    <span id="img_L_34_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_34_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_34" name="chkLvSport" type="checkbox" class="hight"  value="34" checked="checked" hidefocus="" />Fencing</div>
            </a>
</div>
		<div id='L_34'></div>
		
		<div id='L_21_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('21')" title="ยิมนาสติก">
                <div class="right">
                    <span id="img_L_21_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_21_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_21" name="chkLvSport" type="checkbox" class="hight"  value="21" checked="checked" hidefocus="" />ยิมนาสติก</div>
            </a>
</div>
		<div id='L_21'></div>
		
		<div id='L_35_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('35')" title="Judo">
                <div class="right">
                    <span id="img_L_35_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_35_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_35" name="chkLvSport" type="checkbox" class="hight"  value="35" checked="checked" hidefocus="" />Judo</div>
            </a>
</div>
		<div id='L_35'></div>
		
		<div id='L_36_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('36')" title="M. Pentathlon">
                <div class="right">
                    <span id="img_L_36_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_36_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_36" name="chkLvSport" type="checkbox" class="hight"  value="36" checked="checked" hidefocus="" />M. Pentathlon</div>
            </a>
</div>
		<div id='L_36'></div>
		
		<div id='L_37_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('37')" title="Rowing">
                <div class="right">
                    <span id="img_L_37_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_37_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_37" name="chkLvSport" type="checkbox" class="hight"  value="37" checked="checked" hidefocus="" />Rowing</div>
            </a>
</div>
		<div id='L_37'></div>
		
		<div id='L_38_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('38')" title="Sailing">
                <div class="right">
                    <span id="img_L_38_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_38_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_38" name="chkLvSport" type="checkbox" class="hight"  value="38" checked="checked" hidefocus="" />Sailing</div>
            </a>
</div>
		<div id='L_38'></div>
		
		<div id='L_39_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('39')" title="Shooting">
                <div class="right">
                    <span id="img_L_39_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_39_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_39" name="chkLvSport" type="checkbox" class="hight"  value="39" checked="checked" hidefocus="" />Shooting</div>
            </a>
</div>
		<div id='L_39'></div>
		
		<div id='L_40_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('40')" title="Taekwondo">
                <div class="right">
                    <span id="img_L_40_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_40_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_40" name="chkLvSport" type="checkbox" class="hight"  value="40" checked="checked" hidefocus="" />Taekwondo</div>
            </a>
</div>
		<div id='L_40'></div>
		
		<div id='L_41_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('41')" title="Triathlon">
                <div class="right">
                    <span id="img_L_41_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_41_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_41" name="chkLvSport" type="checkbox" class="hight"  value="41" checked="checked" hidefocus="" />Triathlon</div>
            </a>
</div>
		<div id='L_41'></div>
		
		<div id='L_19_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('19')" title="ยกน้ำหนัก">
                <div class="right">
                    <span id="img_L_19_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_19_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_19" name="chkLvSport" type="checkbox" class="hight"  value="19" checked="checked" hidefocus="" />ยกน้ำหนัก</div>
            </a>
</div>
		<div id='L_19'></div>
		
		<div id='L_42_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('42')" title="มวยปล้ำ">
                <div class="right">
                    <span id="img_L_42_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_42_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_42" name="chkLvSport" type="checkbox" class="hight"  value="42" checked="checked" hidefocus="" />มวยปล้ำ</div>
            </a>
</div>
		<div id='L_42'></div>
		
		<div id='L_13_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('13')" title="การเมือง">
                <div class="right">
                    <span id="img_L_13_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_13_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_13" name="chkLvSport" type="checkbox" class="hight"  value="13" checked="checked" hidefocus="" />การเมือง</div>
            </a>
</div>
		<div id='L_13'></div>
		
		<!--Finance-->
		<div id='L_201_head'>		
            <a class="navon" onclick="JavaScript:LiveSportLinkClick('201')" title="Financials">
                <div class="right">
                    <span id="img_L_201_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
                    <span id="L_201_Cnt" class="text-number"></span>
                </div>
                <div class="text-ellipsis"><input id="chkLvSport_201" name="chkLvSport" type="checkbox" class="hight"  value="201" checked="checked" hidefocus="" />Financials</div>
            </a>
</div>
		<div id='L_201'></div>
		<!--SportsParlay-->
		<div id='L_P_head'>		
					<a class="navon" href="JavaScript:SwitchSport('LP','0')" title="บอลชุด">
                	    <div class="right">						
							<span id="img_L_P_TV" class="iconOdds tv" title="การดูภาพการแข่งขันสดผ่านเวปไซค์"></span>
							<span id="L_P_Cnt" class="text-number"></span>
                        </div>
						<div class="text-ellipsis">บอลชุด</div>
					</a>
</div>
		<div id='L_P'></div>
</div>

</div>
</div>

<!--div id="subnav-foot"><img src="../template/maxbet/public/images/layout/L_menu_bg1.gif" /></div-->
<div class="leftBoxFoot"></div>
<span id='tmplEnd'></span>
