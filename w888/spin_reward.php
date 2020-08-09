<?
  include_once __DIR__.'/inc/conn_dd.php';
  include_once __DIR__.'/inc/function.php';
?>
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css?v=00002" />
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script>
<script src="spin/spin_reward.js?v=<?=time();?>"></script>
<link rel="stylesheet" href="spin/spin_reward.css?v=<?=time();?>" >
<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>

<script>
	var _jcSpin = null;
	function activeSpinGame(){
		if(_jcSpin !== null)
			return;

        var win, lose, m_content;
		_jcSpin = $.dialog({
    		title: 'Spin game',
    		content: $('#spin_tmpl').html(),
    		useBootstrap: false,
    		theme: "oho",
    		closeIcon: true,
    		animation: 'none',
    		closeAnimation: 'none',
    		backgroundDismiss: false,
    		boxWidth: '600px',
    		onContentReady: function(){
                m_content =  this.$content[0];
                m_content.style.padding = '0';
                this.$jconfirmBox.find('.jconfirm-clear').hide();
                win = this.$content.find('#spin_win')[0];
                lose = this.$content.find('#spin_lose')[0];
                $(win).width(m_content.style.width);
                $(win).height(m_content.style.height);
                win = this.$content.find('#spin_win')[0];
                CreateSpinGame(win, lose);
        	},
        	onClose: function(){
          		_jcSpin = null;
        	},
    	});
	}
</script>
<script id="spin_tmpl" type="text/template">
    <div id="chart"></div>
    <div id="spin_win" class="spin_res">
        <div class="t_text">
            <div class="t">Congratulation</div>
            <div class="m">YOU WON <span id="spin_reward_amount"></span>฿</div>
        </div>
        <!-- <div class="close-spin-res">
            <button>Close</button>
        </div> -->
    </div>
    <div id="spin_lose" class="spin_res">
        <div class="t_text">
            <div class="t">Sorry</div>
            <div class="m">YOU LOOSE</div>
        </div>
        <!-- <div class="close-spin-res">
            <button>Close</button>
        </div>  --> 
    </div>
</script>
<!-- <div id="spin_game_tmpl">
	<div id="chart"></div>
</div> -->