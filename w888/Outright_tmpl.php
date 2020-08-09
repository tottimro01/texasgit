
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Outright tmpl</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">

<tbody id='tmplHeader'>
	<tr>
		<th width="6%" align="center">เวลา</th>
		<th align="left" class="even">รายการ</th>
		<th width="13%" align="right" title="ราคาน้ำ">ราคาน้ำ</th>
	</tr>
</tbody>

<tbody id='tmplLeague'>
	<tr onclick="refreshData()" style="cursor:pointer">
      	<td class="tabtitle"></td>
		<td class="tabtitle">{@FavLeagues}{%LeagueName}</td>
		<td class="tabtitle" width="10%" align="right" nowrap>
        	<a name="btnRefresh" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
	</tr>
</tbody>

<tbody id='tmplEvent'>
	<tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#fff5a5'" onmouseout="this.style.backgroundColor='{@BgColor}';">
		<td align="center">{%ShowTime}</td>
		<td align="left" class="UdrDogTeamClass" onmousemove="ChangeCursor(this);" onclick="{@link}" ><span>{%TeamName}</span></td>
		<td align="right" class="{%Changed} UdrDogOddsClass" onmousemove="ChangeCursor(this);" onclick="JavaScript:if (CheckHaveOdds(this)){BetO('{%MatchId}_Outright_{@Odds}')};" ><a>{@Odds}</a>
		</td>
	</tr>
</tbody>

</table>

<span id="tmplEnd"></span>
<script type="text/javascript">
//<![CDATA[
(function() {
var _analytics_scr = document.createElement('script');
_analytics_scr.type = 'text/javascript'; _analytics_scr.async = true; _analytics_scr.src = '_Incapsula_Resource.php?SWJIYLWA=719d34d31c8e3a6e6fffd425f7e032f3&ns=11&cb=1330005452';
var _analytics_elem = document.getElementsByTagName('script')[0]; _analytics_elem.parentNode.insertBefore(_analytics_scr, _analytics_elem);
})();
// ]]>
</script></body>
</html>
