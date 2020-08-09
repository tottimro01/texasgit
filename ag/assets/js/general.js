
function timeCountDown(btId){

    // var fiveSeconds = new Date().getTime() + 10000;
    var fiveSeconds = new Date().getTime() + 59000;
    $('#clock').countdown(fiveSeconds, function(event) {
    var $this = $(this).html(event.strftime('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i> %S &nbsp;&nbsp;'));

        // console.log(event.strftime('%S'));
        if(event.strftime('%S')==0){
            $('#'+btId).click();
            timeCountDown(btId);
        }

    });

}


function dialogError(msg){
	bootbox.dialog({
        message: '<span class="bigger-110 red"><i class="fa fa-ban" aria-hidden="true"></i> '+msg+'</span>',
        buttons:            
        {
            "click" :
            {
                "label" : "OK",
                "className" : "btn-sm btn-primary",
                "callback": function() {
                }
            }, 
            
        }
    });
}

function dialogSuccess(msg){
	bootbox.dialog({
        message: '<span class="bigger-110 green"><i class="fa fa-check" aria-hidden="true"></i> '+msg+'</span>',
    });
    window.setTimeout(function(){
        bootbox.hideAll();
    }, 1000);
}

function editSettingUser(now){
	// var xx = $(now).html();
	// alert(xx);
	$(now).find('td').each(function() {
		$inpName = $(this).data('name');
		$('#'+$inpName).val($(this).text());
		// console.log($aa);
	});
}

function formatNumber(num, decplaces,showtt) {
    num = (num);
    if (!isNaN(num) && parseFloat(num)!=0 && num) {
        num = num.toString();

        var exp = [];
        var lD = 0;

        exp = num.split('.');
        if(exp[1]){
            if(exp[1].length>=decplaces){
                lD = exp[1].length+1;
                exp[1] = exp[1]+'1';
            }
        }else{
            exp[1] = '00';
        }

        num = exp[0]+'.'+exp[1];
    
        var str = "" + Math.round (eval(num) * Math.pow(10,decplaces));
        if (str.indexOf("e") != -1) {return "Out of Range";}
        while (str.length <= decplaces) {str = "0" + str;}
        var decpoint = str.length - decplaces;
         var tmpNum = str.substring(0,decpoint);
        //---------------Add Commas--------------------------
        var numRet = tmpNum.toString();
        if(showtt==1){
            var re = /(-?\d+)(\d{3})/;
            while (re.test(numRet)){
                numRet = numRet.replace(re, "$1,$2");
            }
        }
        return numRet + "." + str.substring(decpoint,str.length);
    }else{
        return "0.00";
    }
}
function textToNum(ams){
    if(ams == null || ams == ''){
        return 0;
    }

    ams = ams.toString();
    ams = ams.replace(' ','');
    
    var strd='';
    var str= ams.split(',');
    if(str.length > 1){
        for (var i=0;i < str.length;i++) {
            strd=strd+str[i];
        }
        if(strd ==0) str = ams;
        else str = strd;
    }else str = ams;
    if(str=='N.aN') str='0.00';
    return str;
}

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}
    

    