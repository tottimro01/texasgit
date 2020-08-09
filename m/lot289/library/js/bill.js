$(document).ready(function($) {
	let img_name = $('.bill-result-wrapper').attr('data-bid');;
	html2canvas($(".bill-result-wrapper"), {
     	onrendered: function(canvas) {
     		var url = canvas.toDataURL("image/png", 1.0);
            $('#bill-img img').attr("src",url);
     		$('.bill-result-wrapper').css('display', 'none');
     		autoSaveImage(canvas.toDataURL(), img_name);
            window.close();
     	},
    });

    function autoSaveImage(uri, filename) {
    	var link = document.createElement('a');
    	if (typeof link.download === 'string') {
    		link.href = uri;
    		link.download = filename;
	
    		//Firefox requires the link to be in the body
    		document.body.appendChild(link);
	
    		//simulate click
    		link.click();
	
    		//remove the link when done
    		document.body.removeChild(link);
            // alert("บันทึกแล้ว")
    	}
  	}
});