/*******************************************************************************************
 * Class: getDataClass
 * Description: Get Data(Stript) From ASPX By jQuery AJAX. 
 * Author: Edward Lee
 * Remark: Use jQuery (1.5 Or Newer)
 * Edited Remark:
 * 2012/06/06 Add Queue. The param async:true for timeout and abort can work. By Edward Lee
 *******************************************************************************************/
 
/*	Constructor Start=============*/
function getDataClass() {

    // private members block Start
    var _default_Defined = { "contentType":"application/x-www-form-urlencoded", "dataType":"script", "type":"POST", "cache":true, "ifModified":true, "timeout":10000 };
    var _user_Defined = { "url":"", "param":"", "callBack":null, "feedBack":null };
    var _default_Options = {};
    var _default_Queue = "OneXQueue";
    var _objController = {};
    // private members block End
    
    // private methods block Start
    function _HTTPStatusOK(code) {
    
        return (code === 304 || (200 <= code && code <= 207));
    }
    function _Inspect(opts) {
    
        return opts.url != "";// && typeof(opts.callBack) == "function";
    }
    function _AjaxRequest(millsec, autoRepeat) {
    
        _AjaxRequest_Customize(_default_Queue, _default_Options, millsec, autoRepeat);
    }
    function _AjaxRequest_Customize(que, opts, millsec, autoRepeat) {
    
        if (typeof(_objController[que]) == "undefined") {
        
            _objController[que] = {"queue":[], "xhrObj":null};
        }
        
        if (typeof(opts) != "undefined") {
        
            var optionsCopy = {};
		    for (var o in opts) optionsCopy[o] = opts[o];
		    opts = optionsCopy;
		    
		    _objController[que].queue.push({ "options":opts, "originalComplete":optionsCopy.complete, "autoRepeat":autoRepeat, "interval":millsec, "timer":null });
            
            opts.complete = function (xhr, status) {
    			
    			if (_objController[que].queue.length > 0) {
    			
    			    var _refOpts = _objController[que].queue[0];
			        _objController[que].queue.shift();
			        _objController[que].xhrObj = null;
        			
			        if (_refOpts.originalComplete) _refOpts.originalComplete(xhr, status);
                    
                    if (_refOpts.autoRepeat === true) {
                    
                        _objController[que].queue.push(_refOpts);
                    }
                    
			        if (_objController[que].queue.length > 0) {
    			        
			            if (_Inspect(_objController[que].queue[0].options)) {
    			        
			                _objController[que].queue[0].timer = setTimeout(function() { _objController[que].xhrObj = jQuery.ajax(_objController[que].queue[0].options); }, _objController[que].queue[0].interval);
			            }
			        }
			    }
		    };
		    if (_objController[que].queue.length == 1 && _objController[que].xhrObj == null) {
		        
		        if (_Inspect(opts)) {
		        
		             _objController[que].queue[0].timer = setTimeout(function() { _objController[que].xhrObj = jQuery.ajax(_objController[que].queue[0].options); }, _objController[que].queue[0].interval);
		        }
		        else {
		        
		            _objController[que].queue.shift();
			        _objController[que].xhrObj = null;
		        }
            }
        }
    }
    function _AbortRequest(que) {
    
        if (typeof(_objController[que]) != "undefined" && _objController[que].xhrObj) {
        
            _objController[que].xhrObj.abort();
            _objController[que].xhrObj = null;
        }
    }
    function _AutoGetDataStart(millsec) {
    
        _AjaxRequest(0, false);
        _AjaxRequest(millsec, true);
    }
    function _AutoGetDataStop() {
    
        if (typeof(_objController[_default_Queue]) != "undefined") {
        
            if (_objController[_default_Queue].queue.length > 0) {
            
                clearTimeout(_objController[_default_Queue].queue[0].timer);
            }
            _objController[_default_Queue].queue = [];
        }
        _AbortRequest(_default_Queue);
    }
    function _UpdateDefault_Options () {
    
        _default_Options = {
            url: _user_Defined.url,
            data: _user_Defined.param,
            contentType: _default_Defined.contentType,
            dataType: _default_Defined.dataType,
            type: _default_Defined.type,
            ifModified: _default_Defined.ifModified,
            cache: _default_Defined.cache,
            async: true,
            timeout: _default_Defined.timeout,
            beforeSend: function() {
                    
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                
            },
            complete: function(xhr, status) {
                //"success", "notmodified", "error", "timeout", "abort", "parsererror"
                if (_HTTPStatusOK(xhr.status) && (status == "success" || status == "notmodified")) {
                
                    if (typeof(_user_Defined.callBack) == "function") {
                    
                        _user_Defined.callBack(xhr);
                    }
                }
                else {
                
                   if (typeof(_user_Defined.feedBack) == "function") {
                        
                        _user_Defined.feedBack(xhr, status);
                    }
                }
            }
        };
    }
    // private methods block End
    
    // public methods block Start
    this.SetAjaxAttr = function(n, v) {
        
        if (typeof(_user_Defined[n]) != "undefined") {
        
            _user_Defined[n] = v;
        }
        else if (typeof(_default_Defined[n]) != "undefined") {
        
            _default_Defined[n] = v;
        }
        _UpdateDefault_Options();
    }
    this.GetAjaxAttr = function(n) {
    
        if (typeof(_user_Defined[n]) != "undefined") {
        
            return _user_Defined[n];
        }
        else if (typeof(_default_Defined[n]) != "undefined") {
        
            return _default_Defined[n];
        }
    }
    this.AutoGetData = function(millsec) {
        
        _AutoGetDataStart(millsec);
    }
    this.StopGetData = function() {
        
        _AutoGetDataStop();
    }
    this.GetData = function() {
        
        _AjaxRequest(0, false);
    }
    this.GetDataCustomize = function(queue, opts) {
    
        _AjaxRequest_Customize(queue, opts, 0, false);
    }
    this.AbortRequest = function(queue) {
        
        _AbortRequest(queue);
    }
    // public methods block End
}
/*	Constructor End===============*/