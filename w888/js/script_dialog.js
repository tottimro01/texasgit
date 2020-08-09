// JavaScript Document
function open_dialog(page){
	//var page = file_msg;
	  var IEWidth =  880 ;
	  var IEHeight = 535 ;
	  var NNWidth =  880 ;
	  var NNHeight = 535 ;
	  var MyBrowser = navigator.appName;
	 
	  if (MyBrowser == "Netscape") {
	  var myWinWidth = (window.screen.width/2) - (NNWidth/2);
	  var myWinHeight = (window.screen.height/2) - ((NNHeight/2) + 50);
	
	  var myWin = window.open(page,"MainWin","width=" + NNWidth + ",height=" + NNHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }else {
	  var myWinWidth = (window.screen.width/2) - (IEWidth/2);
	  var myWinHeight = (window.screen.height/2) - ((IEHeight/2) + 50);
	
	  var myWin = window.open(page,"MainWin","width=" + IEWidth + ",height=" + IEHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }
	  myWin.focus();

}	
function open_dialog2(page){
	//var page = file_msg;
	  var IEWidth =  965 ;
	  var IEHeight = 535 ;
	  var NNWidth =  965 ;
	  var NNHeight = 535 ;
	  var MyBrowser = navigator.appName;
	 
	  if (MyBrowser == "Netscape") {
	  var myWinWidth = (window.screen.width/2) - (NNWidth/2);
	  var myWinHeight = (window.screen.height/2) - ((NNHeight/2) + 50);
	
	  var myWin = window.open(page,"MainWin2","width=" + NNWidth + ",height=" + NNHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }else {
	  var myWinWidth = (window.screen.width/2) - (IEWidth/2);
	  var myWinHeight = (window.screen.height/2) - ((IEHeight/2) + 50);
	
	  var myWin = window.open(page,"MainWin2","width=" + IEWidth + ",height=" + IEHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }
	  myWin.focus();

}
function _w(url){
	window.location=url;
	}
function _o(url){
	window.open(url);
	}
	function _r(){
	window.location.reload()
	}