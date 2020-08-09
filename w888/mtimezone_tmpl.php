<?
  // if (!isset($_SESSION)) { session_start(); } 
  // require_once(__DIR__."/lang/member_lang.php");
  include_once __DIR__.'/inc/conn_dd.php';
  include_once __DIR__.'/inc/function.php';
?>
<!-- <script src="<?=$hostserver;?>/commJS/jquery.min.js"></script> -->
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css?v=00002" />
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script>
<script>

var _jcTimezone = _acTimezone = null;
function openUserTimezone(event){
    event.stopImmediatePropagation()
    if(null!==_jcTimezone)
      return;

    if(null!==_acTimezone)
      _acTimezone.close();

    var listTMPL = '<option value="{{timezone}}" {{checked}}>{{tmzName}}</option>';
    var tmzList = <?=json_encode($timezoneArr);?>;
    var tmzListHTML = [];
    $.each(tmzList, function(index, val){
      var h = listTMPL;
      var c = parent.topx.userTimezone.toUpperCase() == index.toUpperCase() ? 'selected="selected"' : '';
      var ct = val.city.split(",");
      if(ct.length > 4){
        ct = ct[0] + "," + ct[1] + "," + ct[2] + "," + ct[3];
      }else{
        ct = ct.join("");
      }
      h = h.replace(/{{tmzName}}/g,   index.toUpperCase() + " " + ct);
      h = h.replace(/{{timezone}}/g,  index.toUpperCase());
      h = h.replace(/{{checked}}/g,   c);
      tmzListHTML.push(h);
    });

    var _form = $('#tmpl-mtimzone-form').html();
    var _ct = [ '<select name="timezone">', tmzListHTML.join(""), '</select>', ].join("");
    _form = _form.replace('{{form}}', _ct);

    _jcTimezone = $.dialog({
        title: '<?=$lang_member[1428];?>',
        content: _form,
        useBootstrap: false,
        theme: "oho",
        closeIcon: true,
        animation: 'none',
        closeAnimation: 'none',
        backgroundDismiss: true,
        onContentReady: function(){
          var self = this;
          $(self.$content).on('submit', 'form', function(event){
            event.preventDefault();
            var fd = new FormData(event.target);

            _jcTimezone.setContent('<div style="text-align: center; margin: 20px 0;"><img src="http://ohoking.com/template/sportsbook/public/images/layout/loading.gif" /></div>');
            submitUserTimezone(fd).then(function(tz){
              parent.topx.userTimezone = tz.timezone;
              parent.topx.userTimeNow = new Date(tz.timenow);
              _jcTimezone.close();
              window.location.reload();
            }, function(msg){
              _acTimezone = $.dialog({
                title: "<?=$lang_member[67];?>",
                content: '<div style="color: red; text-align: center; font-size: 12px; margin-top: 10px; margin-bottom: 10px;">'+msg+'</div>',
                useBootstrap: false,
                theme: "oho",
                closeIcon: true,
                animation: 'none',
                closeAnimation: 'none',
                backgroundDismiss: true,
                onClose: function(){
                  _acTimezone = null;
                },
              })
              _jcTimezone.close();
            });
          });

          $(self.$content).on('click', '._close', function(event){
            event.preventDefault();
            _jcTimezone.close();
          });
        },
        onClose: function(){
          _jcTimezone = null;
        },
    });
  }

  function submitUserTimezone($fd){
    var $def = $.Deferred();
    $.ajax({
      url: 'mtimezone_save.php',
      type: 'post',
      dataType: 'json',
      data: $fd,
      contentType: false,
      processData: false,
    })
    .done(function(data){
      if(data.status==1){
        $def.resolve({'timezone': data.timezone, 'timenow': data.timenow});
      }else{
        $def.reject(data.msg);
      }
    })
    .fail(function() {
      $def.reject("<?=$lang_member[66];?>");
    });
    return $def.promise();
  }
</script>
<template id="tmpl-mtimzone-form">
<div style="margin-top: 15px; margin-bottom: 15px;">
  <form action="#" method="post" class="jquery-confirm-form">
    <fieldset style="border: 0; padding: 0; margin: 0;">
      <label for="mname" style="margin-bottom: 4px; display: block;"><?=$lang_member[1429];?></label>
      {{form}}
      <div style="margin-top: 8px;">
        <div class="jconfirm-buttons oho-btns" style="border: 0;padding: 0;">
          <button type="submit" class="btn btn-default oho-btn _submit"><span><?=$lang_member[64];?></span></button>
          <button type="button" class="btn btn-default oho-btn _close"><span><?=$lang_member[65];?></span></button>
        </div>
      </div>
    </fieldset>
  </form>
</div>
</template>