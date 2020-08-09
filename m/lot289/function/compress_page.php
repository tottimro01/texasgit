<?
	$GZipEncodingEnable = true;
	function GZipAccepts()
	{
		$accept = str_replace(" ","",strtolower($_SERVER['HTTP_ACCEPT_ENCODING']));
		$accept = explode(",",$accept);
		return in_array("gzip",$accept);
	}
	function MinifyHTML($HtmlOutput)
	{
		return preg_replace("/\s+/"," ",$HtmlOutput);
	}
	function CompressPage($HtmlOutput)
	{
		global $GZipEncodingEnable;
		$HtmlOutput = MinifyHTML($HtmlOutput);
		if(!GZipAccepts() || headers_sent() || !$GZipEncodingEnable) return $HtmlOutput;
		header("Content-Encoding: gzip");
		return gzencode($HtmlOutput);
	}
	ob_start("CompressPage");
?>