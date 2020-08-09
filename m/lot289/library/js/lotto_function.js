var lotPayNum;
$(document).ready(function($) {
   //ดึงค่า lot pay num
   $.ajax({
      url: base_url + 'function/get_lot_pay_num.php',
      type: 'GET',
      dataType: 'json',
      data: {},
      cache: false,
      beforeSend: activeLoadModal,
   })
   .always(function(data, status, xhr) {
      if(status == 'success') { lotPayNum = data; }
      activeLoadModal(false);
   });

	//รีเฟรชฟอร์ม
	$('.lotto-top-wrapper').on('click', '.lotto-refresh', function(event) {
		event.preventDefault();
		$('input[type="tel"]').val('');
      $('input[type="text"]').val('');

		$('label[name="chk-switch"] input[type="checkbox"]').prop('checked', false);

      $('.radio-lotto').children('.radio-lotto-option-wrapper').children('.radio-lotto-option').removeClass('radio-lotto-option-active');
      $('.radio-lotto').children('.radio-lotto-option-wrapper').children('.radio-lotto-option-text').removeClass('radio-lotto-option-text-active');
      $('.digit-num_select').val('-')
      $('input[data-inputtype="lotnum"]').trigger('input');
   });

   //กำหนดค่าเสียง
   createjs.Sound.registerSound("library/audio/soundtang_no.m4a?v=1001", "x");
   
	//ถ้าไม่ได้กำหนดค่า sound ให้กำหนดเป็น 1 // 1 คือเปิดเสียง 0 คือปิดเสียง
	if($.cookie('sound') === undefined)
		$.cookie('sound', '1', { expires: 360, path: '/' });

   //ถ้าเสียงเป็น 0 เปลี่ยนรูปภาพเป็นลำโพงปิดเสียง
	if($.cookie('sound') === '0') 
		$('.lotto-volume').css('backgroundImage', 'url(library/img/ico/ic_volume_off.png)');

	//เปิด/ปิดเสียง
	$('.lotto-top-wrapper').on('click', '.lotto-volume', function(event) {
		event.preventDefault();

		if($.cookie('sound') === '1') {
			$.cookie('sound', '0', { expires: 360, path: '/' });
			$(this).css('backgroundImage', 'url(library/img/ico/ic_volume_off.png)');

         //หยุดเล่นเสียง
         createjs.Sound.stop();
		}else {
			$.cookie('sound', '1', { expires: 360, path: '/' });
			$(this).css('backgroundImage', '');
		}
	});

   //เช็ค maxlength
   $('input[data-inputtype="lotnum"]').on('keypress', function(event) {
      if($.trim($(this).val()).length >= $(this).attr('data-maxlength')) {
         $(this).attr('data-tmp', $(this).val());
      }
   });

   $('input[data-inputtype="lotnum"]').on('input', function(event) {
      event.preventDefault();

      //เช็คว่าเปนตัวเลข
      var val = $.trim($(this).val());
      let isSwitch = false;
      if(event.originalEvent !== undefined) {isSwitch = event.originalEvent.data == "*"  ? true : false;} 
     
      val = val.replace(/[^0-9]/g, '');
      $(this).val(val); 

       if(isSwitch && val.length > 1 && !val.includes("*")) {
         if($('#chk-switch'+$(this).attr('data-index')).prop('checked') == true){
            $('#chk-switch'+$(this).attr('data-index')).prop('checked', false);
         }
         else{
            $('#chk-switch'+$(this).attr('data-index')).prop('checked', true);
         }
      }

      let page = getQueryVariable("page");
      checkClose(this,val,page,isSwitch);    

      if($(this).attr('data-tmp') !== undefined) { $(this).val($(this).attr('data-tmp')); }
      $(this).removeAttr('data-tmp');
   });

   //เฃ็คช่องกรอกจำนวนเงิน ว่าเป็นตัวเลข
   $('input[data-inputtype="amount"]').on('input', function(){
         var val = $.trim($(this).val());
         val = val.replace(/[^0-9]/g, '');
      
         if(val.length == 1 && val == '0') { val = '' };
         if($.trim(val).length > 0){ val = $.number(val); }//add comma 
         $(this).val(val); 
   });

   // คลิก กลับ
   $('button[data-action="switch"]').on('click', function(event) {
      event.preventDefault();
      let data_target = $(this).attr('data-target');
      let number = $.trim($('input[data-target="' + data_target + '"][data-index="0"]').val());
      let minLenght = getLotPage() == 2 ? 3 : 2;//ถ้า 3 หน้า ต้องกรอกเลข 3 ตัวถึงกลับได้ //ถ้าไม่ใช่กรอก 2 ตัวก็กลับได้
      if(number.length >= minLenght) {
         let arr_number = fnumcross(number);
         for(var r in arr_number) {
            if (arr_number.hasOwnProperty(r)) {
               $('input[data-target="' + data_target + '"][data-index="' + r + '"]').val(arr_number[r]);
               $('input[data-target="' + data_target + '"][data-index="' + r + '"]').trigger('input');  
            }
         }
      }
   }); 

   //คลิกคัดลอก
   $('button[data-action="copy"]').on('click', function(event) {
      event.preventDefault();
      let data_target = $(this).attr('data-target');
      let number = $.trim($('input[data-target="' + data_target + '"][data-index="0"]').val());
      if(number.length > 0) { $('input[data-target="' + data_target + '"]:enabled').val(number); }
   });3

   //mark2
   // checkbox เช็คกลับ
   $('label[name="chk-switch"] input[type="checkbox"]').on('change', function(event) {
      event.preventDefault();
      let isCheck = $(this).is(':checked');
      let txt_idx = $(this).attr('data-idx');
      let txt_val = $('#lotto-num'+txt_idx).val();
      let txt_lenght = txt_val.length;
      let page = getQueryVariable("page");

      switch (page) {
         case 'quick':
            //ถ้าเปิดโต๊ด
            if($('#chk-tod').is(':checked') === true) {
               if(isCheck === true) { disableTextbox("lotto_tod", txt_idx, true); }else {
                  if(txt_lenght >= 2) { disableTextbox("lotto_tod", txt_idx, false); }
               }

               if(txt_lenght == 2){
                  if(checkLotPayNum(24) == false) { disableTextbox("lotto_tod", txt_idx, true); }
               }
            }
            break;
         case 'three':
            //ถ้าเปิดโต๊ด
            if($('#chk-tod').is(':checked') === true){
               if(isCheck === true) {
                  disableTextbox("lotto_tod", txt_idx, true);
               }else {
                  if(txt_lenght >= 3) { disableTextbox("lotto_tod", txt_idx, false); }
               }
            }

            if(txt_lenght >= 3){
               if(checkLotPayNum(20) == false){ disableTextbox("lotto_tod", txt_idx, true); }
            }

            break;
         case 'two':
            //ถ้าเปิดโต๊ด
            if($('#chk-tod').is(':checked') === true) {
               if(isCheck === true) {
                  disableTextbox("lotto_tod", txt_idx, true);
               }else {
                  if(txt_lenght >= 2) {
                     disableTextbox("lotto_tod", txt_idx, false);
                  }
               }
            }

            if(txt_lenght >= 2){
               if(checkLotPayNum(24) == false){ disableTextbox("lotto_tod", txt_idx, true); }
            }

            break;

         default:
            break;
      }
   });

// -------------------------------------LOTTO NORMAL ------------------------------------- //
   // ใช้ในหน้า แทงด่วน, 3 หน้า, 2 ตัว
   //เพิ่ม ลบ คลาสให้ checkbox หัวตาราง
   $('.lotto-table-title input[type="checkbox"]').change(function(event) {
      let _id = $(this).attr('id');
      let _isCheck = $(this).is(":checked");
      if(_isCheck){
         $('input[data-row="'+ _id +'"], button[data-row="'+ _id +'"]').removeAttr('disabled');
         
         //mark3
         let page = getQueryVariable("page");
         let isCheckboxTop = $(this).attr('id') == 'chk-top' ? true : false;
         let isCheckboxBottom = $(this).attr('id') == 'chk-bottom' ? true : false;
         let isCheckboxTod = $(this).attr('id') == 'chk-tod' ? true : false;
         switch (page) {
            case "quick":
               if(isCheckboxTod === true) {
                  for (var i = 0; i < 20; i++) {
                     let _val = $('#lotto-num'+i).val();
                     if(_val.length == 1) { disableTextbox("lotto_tod", i, true); }
                     if($('#chk-switch'+i).is(':checked')) { disableTextbox("lotto_tod", i, true); }
                  }
               } 

               for (var i = 0; i < 20; i++) {
                  let _val = $('#lotto-num'+i).val();
                  if(_val.length >= 3) {
                     if(checkLotPayNum(2) == false) { disableTextbox("lotto_bottom", i, true); }
                  }else if(_val.length >= 2) {
                     if(checkLotPayNum(24) == false) { disableTextbox("lotto_tod", i, true); }
                  }else if(_val.length >= 1) {}
               }

               break;

            case "three":

               if(isCheckboxTod === true) {
                  for (var i = 0; i < 20; i++) {
                     let _val = $('#lotto-num'+i).val();
                     if(_val.length == 1 || _val.length == 2) { disableTextbox("lotto_tod", i, true); }
                     if($('#chk-switch'+i).is(':checked')) { disableTextbox("lotto_tod", i, true); }
                  }
               } 

               if(isCheckboxBottom === true) {
                  for (var i = 0; i < 20; i++) {
                     let _val = $('#lotto-num'+i).val();
                     if(_val.length == 1 || _val.length == 2) { disableTextbox("lotto_bottom", i, true); }
                     if($('#chk-switch'+i).is(':checked')) { disableTextbox("lotto_bottom", i, true); }
                  }
               } 

               for (var i = 0; i < 20; i++) {
                  let _val = $('#lotto-num'+i).val();
                  if(_val.length >= 3) {
                     if(checkLotPayNum(16) == false) {
                        disableTextbox("lotto_top", i, true);
                     }else {
                        if(checkLotPayNum(17) == false){ disableTextbox("lotto_bottom", i, true); }
                        if(checkLotPayNum(20) == false){ disableTextbox("lotto_tod", i, true); }
                     }
                  }else if(_val.length >= 2) {
                     if(checkLotPayNum(18) == false) { disableTextbox("lotto_top", i, true); }
                  }else if(_val.length >= 1) {
                     if(checkLotPayNum(19) == false) { disableTextbox("lotto_top", i, true); }
                  }
               }

               break;

            case "two":
               if(isCheckboxTod === true) {
                  for (var i = 0; i < 20; i++) {
                     let _val = $('#lotto-num'+i).val();
                     if(_val.length == 1) { disableTextbox("lotto_tod", i, true); }
                     if($('#chk-switch'+i).is(':checked')) { disableTextbox("lotto_tod", i, true); }
                  }
               } 

               for (var i = 0; i < 20; i++) {
                  let _val = $('#lotto-num'+i).val();
                  if(_val.length >= 3) {
                  }else if(_val.length >= 2) {
                     if(checkLotPayNum(24) == false) { disableTextbox("lotto_tod", i, true); }
                  }else if(_val.length >= 1) {}
               }

               break;

            default:
               break;
         }

      }else {
         $('input[data-row="'+ _id +'"]').val('');
         $('input[data-row="'+ _id +'"], button[data-row="'+ _id +'"]').attr('disabled', 'disabled');
      }
   });

   //บันทึกแทง หน้า แทงด่วน, 3 หน้า, 2 ตัว
   $('#save-btn[name="lotto"]').on('click', function(event) {
      let _txt = '';
      let _lat = '0.0';
      let _lon = '0.0';
      let _bf = 'm';
      let _lotpage = getLotPage();

      let _topAvailable = true;
      let _bottomAvailable = true;
      let _todAvailable = true;

      let _uuid = '';
      let _pname = $.trim($('#username_txt').val()).length > 0 ? $.trim($('#username_txt').val()) : '';
      let _pid = $.trim($('#pollnum_txt').val()).length > 0 ? $.trim($('#pollnum_txt').val()) : '';

      let lotrows = 20;
      for (var i = 0; i < lotrows; i++) {

         let _number = []; // bet number array

         let _input_val = $.trim($('input[id=lotto-num' + i + ']').val()); 
         let _chkSwitch = $('input[id=chk-switch' + i + ']');

         let _amount_top = '';
         if(_topAvailable) {
            _amount_top = $('input[id=lotto_top' + i + ']').val();
            _amount_top = $.trim(_amount_top).length > 0 ? $.trim(_amount_top) : '';
            _amount_top = parseNumeric(_amount_top);
         }
         
         
         let _amount_bottom  = '';
         if(_bottomAvailable) {
            _amount_bottom = $('input[id=lotto_bottom' + i + ']').val();
            _amount_bottom = $.trim(_amount_bottom).length > 0 ? $.trim(_amount_bottom) : '';
            _amount_bottom = parseNumeric(_amount_bottom);
         }
         
         
         let _amount_tod = '';
         if(_todAvailable) {
            _amount_tod = $('input[id=lotto_tod' + i + ']').val();
            _amount_tod = $.trim(_amount_tod).length > 0 ? $.trim(_amount_tod) : '';
            _amount_tod = parseNumeric(_amount_tod);
         }

         //if text box is not empty
         if(_input_val.length > 0) {
            //check is amount empty
            if(_amount_top.length > 0 || _amount_bottom.length > 0 || _amount_tod.length > 0) {

               //if checked switch number
               if($(_chkSwitch[0]).is(':checked')) { _number = fnumcross(_input_val); }
               else { _number.push(_input_val); }

                  if(_lotpage == 1 || _lotpage == 2) { //แทงด่วน , 3 ตัว
                     $.each(_number, function(index, val) {
                        _txt += val + '-' + _amount_top + '-' + _amount_tod + '-' + _amount_bottom;
                        _txt += ',';
                     });
                  }else {
                     $.each(_number, function(index, val) { // 2 ตัว
                     _txt += val + '-' + _amount_top + '-' + _amount_bottom + '-' + _amount_tod;
                     _txt += ',';
                  });
               }
            }  
         }
      }

      if($.trim(_txt).length == 0) {
         activeMessageModal(true, lang_data["fail"], lang_data["alert_input_data"], lang_data["ok"]);
         return;
      }

      //remove last comma and add ( )
      _txt = _txt.replace(/\,$/, '');
      _txt = '(' + _txt + ')';

      let submitParam = { 
         'txt': _txt, 'lat': _lat, 'lon': _lon,'bf': _bf,'lotpage': _lotpage,
         'uuid':   _uuid,'pname':   _pname,'pid':   _pid
      }
      submitLotto(submitParam);
   });
// ------------------------------------- END LOTTO NORMAL ------------------------------------- //

// ------------------------------------- LOTTO SPECIAL ------------------------------------- //
// ใช้ในหน้า พิเศษ

   //กำหนดค่าเริ่มต้นให้ประเถทพิเศษ //เปลี่ยนตอนเลื่อน หรือเปลี่ยนหน้าพิเศษ
   $('#lotto-type').attr('data-type', '3in5');

   //เพิ่ม
   $('.radio-indicator').on('click', function(event) {
      event.preventDefault();
      let _type = $(this).attr('data-type');
      $('#lotto-type').attr('data-type', _type);
   });

   //เปลี่ยนประเภทเมื่อคลิก indicator
   $('.radio-lotto').on('click', '.radio-lotto-option-wrapper', function(event) {
      event.preventDefault();

      let _parent = $(this).parent('.radio-lotto');
      let _selected = $(_parent).attr('data-select');
      let _option = $(this).attr('data-option');

      //remove style form another radio
      $(_parent).children('.radio-lotto-option-wrapper').children('.radio-lotto-option').removeClass('radio-lotto-option-active');
      $(_parent).children('.radio-lotto-option-wrapper').children('.radio-lotto-option-text').removeClass('radio-lotto-option-text-active');

      if(_option != _selected) {
         //add style to this 
         $(this).children('.radio-lotto-option').addClass('radio-lotto-option-active');
         $(this).children('.radio-lotto-option-text').addClass('radio-lotto-option-text-active');

         //focus textbox
         var _input = $(this).parent('.radio-lotto').children('.lotto-input-form').children('input');
         $(_input[0]).focus();
         
         $(_parent).attr('data-select', $(this).attr('data-option'));
      }else {
         $(_parent).attr('data-select', '0');
      }  
   });

   //บันทึกแทง หน้า พิเศษ
   $('#save-btn[name="lotto-special"]').on('click', function(event) {
      let _type = $('#lotto-type').attr('data-type');
      let _txt = '';
      let _lat = '0.0';
      let _lon = '0.0';
      let _bf = 'm';
      let _lotpage = '4';
      let _uuid = '';
      let _pname = $.trim($('#username_txt').val()).length > 0 ? $.trim($('#username_txt').val()) : '';
      let _pid = $.trim($('#pollnum_txt').val()).length > 0 ? $.trim($('#pollnum_txt').val()) : '';

      if(_type == "3in5" && checkLotPayNum(15) === true) { //3 ใน 5
         let rows = 10;
         for (var i = 0; i < rows; i++) {
            let _num = $.trim($('#3in5num'+i).val());
            let _amount = $.trim($('#3in5amount'+i).val());

            if(_num.length > 0 && _amount.length > 0) {
               _txt += _num + '-' + parseNumeric(_amount) + '-' + '12' + ',';
            }
         } 

      }else if(_type == "3in4"  && checkLotPayNum(14) === true) { //3 ใน 4
         let rows = 10;
         for (var i = 0; i < rows; i++) {
            let _num = $.trim($('#3in4num'+i).val());
            let _amount = $.trim($('#3in4amount'+i).val());

            if(_num.length > 0 && _amount.length > 0) {
               _txt += _num + '-' + parseNumeric(_amount) + '-' + '11' + ',';
            }
         } 

      }else if (_type == "19") {
         let rows = 10;
         for (var i = 0; i < rows; i++) {
            let _num = $.trim($('#19num'+i).val());
            let _top_amount = $.trim($('#19topamount'+i).val());
            let _bottom_amount = $.trim($('#19bottomamount'+i).val());

            if(_num.length > 0 || _top_amount.length > 0 || _bottom_amount.length > 0) {
               _txt += _num + '-0-' + '13' + '-' + parseNumeric(_top_amount) + '-' + parseNumeric(_bottom_amount) + ',';
            }
         } 

      }else if(_type == "others") {
         //6 กลับ
         if(checkLotPayNum(16) === true || checkLotPayNum(1) === true || checkLotPayNum(2) === true) {
            let _num_6s = $.trim($('#6switchnum').val());
            let _top_6s = $.trim($('#6switchtop').val());
            let _bottom_6s = $.trim($('#6switchbottom').val());
            let _front_6s = $.trim($('#6switchfront').val());
   
            if(_num_6s.length > 0) {
               if(_top_6s.length > 0 || _bottom_6s.length > 0 || _front_6s.length > 0) {
                  _txt += _num_6s + '-0-14-' + parseNumeric(_top_6s) + '-' + parseNumeric(_bottom_6s) + '-' + parseNumeric(_front_6s);
                  _txt +=',';
               }
            }
         }
         
         //เลขพี่น้อง
         let _sibling_top = $.trim($('#siblingtop').val());
         let _sibling_bottom = $.trim($('#siblingbottom').val());
         
         if(_sibling_top.length > 0) {
            _txt += '0-0-15-' + parseNumeric(_sibling_top) + '-0-0';
            _txt += ',';
         }

         if(_sibling_bottom.length > 0) {
            _txt += '0-0-16-' + parseNumeric(_sibling_bottom) + '-0-0';
            _txt += ',';
         }

         //เลขเบิ้ล
         let _double_top = $.trim($('#doubletop').val());
         let _double_bottom = $.trim($('#doublebottom').val());

         if(_double_top.length > 0) {
            _txt += '0-0-17-' + parseNumeric(_double_top) + '-0-0';
            _txt += ',';
         }

         if(_double_bottom.length > 0) {
            _txt += '0-0-18-' + parseNumeric(_double_bottom) + '-0-0';
            _txt += ',';
         }

         if(checkLotPayNum(8) === true) {
            // 1 ตัวบน สูง ต่ำ
            let _HL = $('#lot_1topHL').attr('data-select');
            if(_HL == 'H' || _HL == 'L') {
               let _1topHL = $.trim($('#1topHL').val());
               if(_1topHL.length > 0) {
                  _txt += _HL + '-' + parseNumeric(_1topHL) + '-5';
                  _txt += ',';
               }
            }
         }

         if(checkLotPayNum(9) === true) {
            // 2 ตัวบน สูง ต่ำ
            let _HL = $('#lot_2topHL').attr('data-select');
            if(_HL == 'H' || _HL == 'L') {
               let _2topHL = $.trim($('#2topHL').val());
               if(_2topHL.length > 0) {
                  _txt += _HL + '-' + parseNumeric(_2topHL) + '-6';
                  _txt += ',';
               }
            }
         }

         if(checkLotPayNum(10) === true) {
            // 3 ตัวบน สูง ต่ำ
            let _HL = $('#lot_3topHL').attr('data-select');
            if(_HL == 'H' || _HL == 'L') {
               let _3topHL = $.trim($('#3topHL').val());
               if(_3topHL.length > 0) {
                  _txt += _HL + '-' + parseNumeric(_3topHL) + '-7';
                  _txt += ',';
               }
            }
         }

         if(checkLotPayNum(11) === true && lotPayNum["CloseSmall"] == false) {
            // 2 ตัวล่าง สูง ต่ำ
            let _HL = $('#lot_2bottomHL').attr('data-select');
            if(_HL == 'H' || _HL == 'L') {
               let _2bottomHL = $.trim($('#2bottomHL').val());
               if(_2bottomHL.length > 0) {
                  _txt += _HL + '-' + parseNumeric(_2bottomHL) + '-8';
                  _txt += ',';
               }
            }
         }

         if(checkLotPayNum(12) == true) {
            // คู่ คี่
            let _OE = $('#lot_oe').attr('data-select');
            if(_OE == 'E' || _OE == 'K') {
               let _oe_val = $.trim($('#oe').val());
               if(_oe_val.length > 0) {
                  _txt += _OE + '-' + parseNumeric(_oe_val) + '-9';
                  _txt += ',';
               }
            }
         }

         if(checkLotPayNum(24) == true) {
            //2 โต็ด
            let _2todnum = $.trim($('#2todnum').val());
            let _2todamount = $.trim($('#2todamount').val());
            
            if(_2todnum.length > 0 || _2todamount.length > 0) {
               _txt += _2todnum + '-' + parseNumeric(_2todamount) + '-10';
               _txt += ',';
            }
         }

         // เลขปักหลัก
         if(checkLotPayNum(21) == true) {
            //หน่วย
            let _digi1num = $('#digits-ones-select').val();
            let _digi1amount = $.trim($('#num-digit-ones').val());
            
            if(_digi1num != '-' && _digi1amount.length > 0) {
               _txt += _digi1num + '-' + parseNumeric(_digi1amount) + '-2';
               _txt += ',';
            }
         }

         if(checkLotPayNum(22) == true) {
            // สิบ
            let _digi10num = $('#digits-tens-select').val();
            let _digi10amount = $.trim($('#num-digit-tens').val());
            
            if(_digi10num != '-' && _digi10amount.length > 0) {
               _txt += _digi10num + '-' + parseNumeric(_digi10amount) + '-3';
               _txt += ',';
            }
         }

         if(checkLotPayNum(23) == true) {
            // ร้อย
            let _digi100num = $('#digits-hundreds-select').val();
            let _digi100amount = $.trim($('#num-digit-hundreds').val());
            
            if(_digi100num != '-' && _digi100amount.length > 0) {
               _txt += _digi100num + '-' + parseNumeric(_digi100amount) + '-4';
               _txt += ',';
            }
         }
      }else {
         return;
      }
      // console.log(_txt)
      if($.trim(_txt).length == 0) {
         activeMessageModal(true, lang_data["fail"], lang_data["alert_input_data"], lang_data["ok"])
         return;
      }

      //remove last comma and add ( )
      _txt = _txt.replace(/\,$/, '');
      _txt = '(' + _txt + ')';


      let submitParam = { 
         'txt': _txt, 'lat': _lat, 'lon': _lon,'bf': _bf,'lotpage': _lotpage,
         'uuid':   _uuid,'pname':   _pname,'pid':   _pid
      }
      submitLotto(submitParam);
   });
// ------------------------------------- END LOTTO SPECIAL ------------------------------------- //
});

//mark1
//เช็คปิดแทง
function checkClose(_element, _val, _page, _root) {
   let idx = $(_element).attr('data-index');
   //เคลียร์การปิด/เปิด
   $('#lotto_top'+idx).removeAttr('disabled');
   $('#lotto_bottom'+idx).removeAttr('disabled');
   $('#lotto_tod'+idx).removeAttr('disabled');
   $('#chk-switch'+idx).removeAttr('disabled');
   $('#chk-switch'+idx).parent('label').children('.checkmark').removeAttr('disabled');
   $('#chk-switch'+idx).parent('label').children('.checkmark').removeClass('disabled-checkmark');

   //ถ้าเช็คปิดบน ให้ปิดอถวบน
   if($('#chk-top').is(':checked') == false){ disableTextbox("lotto_top", idx, true); }
   //ถ้าเช็คปิดล่าง ให้ปิดอถวล่าง
   if($('#chk-bottom').is(':checked') == false){ disableTextbox("lotto_bottom", idx, true); }
   //ถ้าเช็คปิดโต๊ด ให้ปิดอถวโต๊ด
   if($('#chk-tod').is(':checked') == false){ disableTextbox("lotto_tod", idx, true); }

   if(_val.length <= 1) {
      $('#chk-switch'+idx).prop('checked', false);
      $('#chk-switch'+idx).attr('disabled', 'disabled');
      $('#chk-switch'+idx).parent('label').children('.checkmark').attr('disabled','disabled');
      $('#chk-switch'+idx).parent('label').children('.checkmark').addClass('disabled-checkmark');
   }else {
      $('#chk-switch'+idx).removeAttr('disabled');
      $('#chk-switch'+idx).parent('label').children('.checkmark').removeAttr('disabled');
      $('#chk-switch'+idx).parent('label').children('.checkmark').removeClass('disabled-checkmark');
   }

   switch (_page) {
      case "quick":
         if(_val.length == 0) {}

         if(_val.length == 1) {
            //1 ตัว กลับไม่ได้
            $('#chk-switch'+idx).attr('disabled', 'disabled');
            $('#chk-switch'+idx).prop('checked', false);
            $('#chk-switch'+idx).parent('label').children('.checkmark').attr('disabled', 'disabled');
            $('#chk-switch'+idx).parent('label').children('.checkmark').addClass('disabled-checkmark');

            //1 ตัว ปิดโต๊ด
            disableTextbox("lotto_tod", idx, true);

            //ถ้ามี * เปิดโต๊ด
            if(_root === true) {
               $(_element).val($(_element).val() + "*");
               disableTextbox("lotto_tod", idx, false);
            }
         }

         if(_val.length == 2) {
            //ปิด 2 โต๊ด
            if(checkLotPayNum(13) == false || checkLotPayNum(24) == false || $('#chk-tod').is(':checked') == false || $('#chk-switch'+idx).is(':checked') == true) {
               disableTextbox("lotto_tod", idx, true);
            }

            if(checkLotNumAllSameNum(_val) === true) {
               $('#chk-switch'+idx).attr('disabled', 'disabled');
               $('#chk-switch'+idx).prop('checked', false);
               $('#chk-switch'+idx).parent('label').children('.checkmark').attr('disabled', 'disabled');
               $('#chk-switch'+idx).parent('label').children('.checkmark').addClass('disabled-checkmark');
            }
         }
   
         if(_val.length >= 3) {
            //ปิด 3 ล่าง
            if(checkLotPayNum(2) == false) { disableTextbox("lotto_bottom", idx, true); }

            if(checkLotNumAllSameNum(_val) === true) {
               $('#chk-switch'+idx).attr('disabled', 'disabled');
               $('#chk-switch'+idx).prop('checked', false);
               $('#chk-switch'+idx).parent('label').children('.checkmark').attr('disabled', 'disabled');
               $('#chk-switch'+idx).parent('label').children('.checkmark').addClass('disabled-checkmark');
            }

            if($('#chk-switch'+idx).is(':checked') == true  || $('#chk-tod').is(':checked') == false){
               disableTextbox("lotto_tod", idx, true);
            }
         }

         break;
      case "three":
         
         if(_val.length == 0) {}
         if(_val.length == 1) {
            disableTextbox("lotto_bottom", idx, true);
            disableTextbox("lotto_tod", idx, true);

            if(checkLotPayNum(19) == false) { disableTextbox("lotto_top", idx, true); }
         }

         if(_val.length == 2) {
            disableTextbox("lotto_bottom", idx, true);
            disableTextbox("lotto_tod", idx, true);

            if(checkLotNumAllSameNum(_val) === true) {
               $('#chk-switch'+idx).attr('disabled', 'disabled');
               $('#chk-switch'+idx).prop('checked', false);
               $('#chk-switch'+idx).parent('label').children('.checkmark').attr('disabled', 'disabled');
               $('#chk-switch'+idx).parent('label').children('.checkmark').addClass('disabled-checkmark');
            }

            if(checkLotPayNum(18) == false) { disableTextbox("lotto_top", idx, true); }
         }

         if(_val.length >= 3) {
            if(checkLotNumAllSameNum(_val) === true) {
               $('#chk-switch'+idx).attr('disabled', 'disabled');
               $('#chk-switch'+idx).prop('checked', false);
               $('#chk-switch'+idx).parent('label').children('.checkmark').attr('disabled', 'disabled');
               $('#chk-switch'+idx).parent('label').children('.checkmark').addClass('disabled-checkmark');
            }

            if($('#chk-switch'+idx).is(':checked') == true  || $('#chk-tod').is(':checked') == false){
               disableTextbox("lotto_tod", idx, true);
            }

            if(checkLotPayNum(16) == false) {
               disableTextbox("lotto_top", idx, true);
               disableTextbox("lotto_bottom", idx, true);
               disableTextbox("lotto_tod", idx, true);
            }else {
               if(checkLotPayNum(17) == false){ disableTextbox("lotto_bottom", idx, true); }
               if(checkLotPayNum(20) == false){ disableTextbox("lotto_tod", idx, true); }
            }
         }

         break;
      case "two":
         
         if(_val.length == 0) {}
         if(_val.length == 1) { disableTextbox("lotto_tod", idx, true); }
         if(_val.length >= 2) {
             //ปิด 2 โต๊ด
            if(checkLotPayNum(24) == false) { disableTextbox("lotto_tod", idx, true); }
         }

         break;
      default:

         break;
   }
     
}

function disableTextbox(_key, _idx, _disable) {
   if(_disable === true) {
      $('#'+_key+_idx).attr('disabled', 'disabled');
      $('#'+_key+_idx).val('');
   }else if(_disable == false) {
      $('#'+_key+_idx).removeAttr('disabled');
   }
}

function checkLotNumAllSameNum(num) {
   let arr = num.split('');
   let isSame = true;
   for(var i = 0; i < arr.length; i++) {
      if(arr[i] != arr[0]) { isSame = false; }
   }
   return isSame;
}

function submitLotto(_param) {
   $.ajax({
      url: 'function/save_lotto.php',
      type: 'POST',
      dataType: 'json',
      data: { txt: _param["txt"], lat: _param["lat"], lon: _param["lon"], bf: _param["bf"], 
      lot_page: _param["lotpage"], uuid: _param["uuid"], pname: _param["pname"], pid: _param["pid"], },
      beforeSend: activeLoadModal ,
   })
   .always(function(data, status, xhr) {
      if(status == 'success') {
         console.log(data)
         clearBetResultForm();
         //แทงสำเร็จ
         if(data['Status'] == 1) {
                let param = { "Status": data["Status"],
                              "Licen": data["Licen"],
                              "BillID": data["BillID"],
                              "LastLot": data["LastLot"],
                              "CloseBig": data["CloseBig"],
                              "CloseSmall": data["CloseSmall"],
                              "txtBillId": data["txtBillId"],
                              "txtLastLot": data["txtLastLot"],
                              "txtDateTime": data["txtDateTime"],
                              "txtBranch": data["txtBranch"],
                              "txtUser": data["txtUser"],
                              "txtTotal": data["txtTotal"],
                              "data": data["data"],
                              "Msg": data["Msg"],
                              "UName": data["txtName"],
                              "UBill": data["txtNo"],
                        }

            $('#bill_status').val(data["Status"]);
            $('#bill_bid').val(data["BillID"]);
            $('#bill_info').val(data["txtBillId"]);
            $('#bill_lesson').val(data["txtLastLot"]);
            $('#bill_datetime').val(data["txtDateTime"]);
            $('#bill_uname').val(data["txtName"]);
            $('#bill_poy').val(data["txtNo"]);
            $('#bill_saler').val(data["txtUser"]);
            $('#bill_branch').val(data["txtBranch"]);
            $('#bill_list').val(JSON.stringify(data["data"]));
            $('#bill_total').val(data["txtTotal"]);
            $('#bill_msg').val(data["Msg"]);

            //open result modal
            activeBetResultModal(true, param, 1);

            //refresh lotto form
            $('.lotto-refresh').trigger('click');
            updateCredit();
         }else {

            let param = {  "Status": data["Status"],
                           "Licen": data["Licen"],
                           "BillID": data["BillID"],
                           "LastLot": data["LastLot"],
                           "CloseBig": data["CloseBig"],
                           "CloseSmall": data["CloseSmall"],
                           "data": data["data"],
                           "Msg": data["Msg"].split('\n'),
                        }

            $('#bill_status').val(data["Status"]);
            $('#bill_bid').val('');
            $('#bill_info').val('');
            $('#bill_lesson').val(data["txtLastLot"]);
            $('#bill_datetime').val('');
            $('#bill_uname').val('');
            $('#bill_poy').val('');
            $('#bill_saler').val('');
            $('#bill_branch').val('');
            $('#bill_list').val(JSON.stringify(data["data"]));
            $('#bill_total').val('');
            $('#bill_msg').val(data["Msg"]);

            activeBetResultModal(true, param, 0);
           
            if($.cookie('sound') == 1) { createjs.Sound.play("x"); }
         }
      }
      activeLoadModal(false);
   });
}

function getNumericFromString(str) {
   str = str.replace( /[^\d.]/g, '' );
   return parseFloat(str);
}

//กลับเลข
function fnumcross(fnum) {
   var org_vu  = [];  
   var u       = {};
   var a       = [];
   var txtv0   = fnum.substr(0,1);   
   var txtv1   = fnum.substr(1,1);
   var txtv2   = fnum.substr(2,1);
   var val1    = txtv0+txtv2+txtv1;
   var val2    = txtv1+txtv2+txtv0; 
   var val3    = txtv1+txtv0+txtv2;
   var val4    = txtv2+txtv0+txtv1;
   var val5    = txtv2+txtv1+txtv0;

   org_vu[0]   = fnum;
   org_vu[1]   = val1;
   org_vu[2]   = val2;
   org_vu[3]   = val3;
   org_vu[4]   = val4;
   org_vu[5]   = val5;
   
   for(var i = 0, l = org_vu.length; i < l; ++i){
       if(u.hasOwnProperty(org_vu[i])) { continue; }
       a.push(org_vu[i]);
       u[org_vu[i]] = 1;
   }

   return a;
}

function checkLotPayNum(idx) {
   if(parseInt(lotPayNum["lpn1"][idx]) <= 0.0 || parseInt(lotPayNum["lpn2"][idx]) <= 0.0 || parseInt(lotPayNum["lpn3"][idx]) <= 0.0 || parseInt(lotPayNum["lpn4"][idx]) <= 0.0 || parseInt(lotPayNum["lpn5"][idx]) <= 0.0) {
      return false;
   }

   return true;
}

//ค่า lot page
function getLotPage() {
   let page = getQueryVariable("page");
   switch (page) {
      case "quick": return 1;
      case "three": return 2;
      case "two":   return 3;
      default:      return -1;
   }
}

function parseNumeric(str) {
   return str.replace(/[^0-9]/g, '');
}