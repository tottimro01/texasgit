<?
  if($_SESSION['m_user_set']==""){ 
  include_once __DIR__.'/inc/conn_dd.php';
?>
<!-- <script src="<?=$hostserver;?>/commJS/jquery.min.js"></script> -->
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css?v=00002" />
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script>
<script>

window.onload = function(){
  var mn = parent.leftx.document.getElementsByClassName('member_nickname');
  for (var i = 0; i < mn.length; i++) {
    mn[i].style.cursor = 'pointer';
    mn[i].onclick = setNicknamePopup;
  }
}

var _jc = _ac = null;
function setNicknamePopup(event){
    event.stopImmediatePropagation()
    var _form = $('#tmpl-mname-form').html();
    var _dom = null;
    if(null!==_jc)
      return;

    if(null!==_ac)
      _ac.close();

    _jc = $.dialog({
        title: '<?=$lang_member[98];?>',
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

            _jc.setContent('<div style="text-align: center; margin: 20px 0;"><img src="http://ohoking.com/template/sportsbook/public/images/layout/loading.gif" /></div>');
            submitMname(fd).then(function(mname){
              var e = parent.leftx.document.getElementsByClassName('member_nickname');
              for (var i = 0; i < e.length; i++){
                e[i].onclick = null;
                e[i].innerHTML = mname;
                e[i].style.cursor = '';
              }
              _jc.close();
            }, function(msg){
              _ac = $.dialog({
                title: "<?=$lang_member[98];?>",
                content: '<div style="color: red; text-align: center; font-size: 12px; margin-top: 10px; margin-bottom: 10px;">'+msg+'</div>',
                useBootstrap: false,
                theme: "oho",
                closeIcon: true,
                animation: 'none',
                closeAnimation: 'none',
                backgroundDismiss: true,
                onClose: function(){
                  _ac = null;
                },
              })
              _jc.close();
            });
          });

          $(self.$content).on('click', '._close', function(event){
            event.preventDefault();
            _jc.close();
          });
        },
        onClose: function(){
          _jc = null;
        },
    });
  }

  function submitMname($fd){
    var $def = $.Deferred();
    var _nm = $fd.get('mname').trim();
    if(_nm.length == 0 || _nm.length < 5){
      // $def.reject("<?=$lang_member[61];?>");
      $def.reject("<?=$lang_member[2148]?>");
      return $def.promise();
    }
    $.ajax({
      url: 'mname_save.php',
      type: 'post',
      dataType: 'json',
      data: $fd,
      contentType: false,
      processData: false,
    })
    .done(function(data){
      if(data.status==1){
        $def.resolve(data.mname);
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
<template id="tmpl-mname-form">
<div style="margin-top: 15px; margin-bottom: 15px;">
  <form action="#" method="post" class="jquery-confirm-form">
    <fieldset style="border: 0; padding: 0; margin: 0;">
      <label for="mname" style="margin-bottom: 4px; display: block;"><?=$lang_member[93];?></label>
    <input type="text" name="mname" id="mname" placeholder="<?=$lang_member[93];?>" autocomplete="off" />
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
<? } ?>