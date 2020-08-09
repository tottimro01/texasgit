<script src="assests/js/socket.io.js"></script>
<script src="assests/js/react.min.js"></script>
<script src="assests/js/react-dom.min.js"></script>
<style type="text/css">
.info-box-number {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.filter {
    float: left;
    border-radius: 3px;
    padding: 0.15em 0.5em;
    color: #545454;
    border: 1px solid #cdcdcd;
    background: #ececec;
    margin: 2px 10px;
}
.filter.oddsTableStatus, .filter.oddsTableStatus-offline, .filter.oddsTableStatus-connecting {
  width: 44px;
  height: 23px;
  overflow: hidden;
  position: relative;
} 
.filter.oddsTableStatus::before, .filter.oddsTableStatus-offline::before, .filter.oddsTableStatus-connecting::before {
  background: url(img/connectIcon.png) no-repeat 0 0;
  content: "";
  position: absolute;
  top: -.05em;
  width: 897px;
  height: 22px;
  z-index: 1;
}

.filter.oddsTableStatus::before {
  transform: translateX(-819px);
  left: -.05em;
}

.filter.oddsTableStatus-offline {
  cursor: default;
}

.filter.oddsTableStatus-offline::before {
  transform: translateX(-857px);
  left: -.05em;
}

.filter.oddsTableStatus-offline:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting {
  cursor: default;
}

.filter.oddsTableStatus-connecting:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting::before {
  left: .15em;
  animation: playConnect 4s steps(21) infinite normal;
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000;
  -webkit-transform: translateZ(0);
}

@keyframes playConnect {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-819px);
  }
}

@media (max-width: 991px)
{
  .content-header>.breadcrumb
  {
       background: transparent;
  }
}
</style>
<script type="text/javascript">
  $(() => {
      var socket = io.connect('<?=$nodejs_ip;?>', { secure: true , reconnect: true});

      socket.emit('check_user_xyz');

      socket.on("connect", function(){
          //console.log("connected");
          $("#connect_ico").removeClass("oddsTableStatus-offline");
          $("#connect_ico").addClass("oddsTableStatus-connecting");
      });

      socket.on("disconnect", function(){
          //console.log("disconnected");
          $("#connect_ico").removeClass("oddsTableStatus-connecting");
          $("#connect_ico").addClass("oddsTableStatus-offline");
      });

      //socket.emit('check_user', { "token": "<?=$_SESSION[m_tokenx]?>", "mid": "<?=$_SESSION[mid]?>" , "site":document });
      socket.on('dataconnect', function (data) {
          var arr_data = JSON.parse(data);
          //arr_mdata = data[1];
          //console.log(arr_data);
          set_data(arr_data[0]);
      });
      socket.on("error", console.error);
  });

  function set_data(d){
    //console.log(d);
    ReactDOM.render(
          React.createElement(HelloMessage, d),
          document.getElementById('content_box') , function(){
            //say("Connection");
            <? foreach ($arr_code_node as $key => $value) { if($value=="ping" or $value=="polo"){ continue; } ?>
            if(d["c_<?=$value?>"]==0){
              say("<?=$arr_name_node[$key]?> ขาดการเชื่อมต่อ");
            }
            <? } ?>
          }
      );
  }


  var HelloMessage = React.createClass({
    componentDidMount: function() {
      //$(".loader").hide();
    },
    render: function() {
      <? foreach ($arr_code_node as $key => $value) { ?>
      var bg_<?=$value?> = (this.props.c_<?=$value?>==1 ? "bg-green" : "bg-red");
      var ic_<?=$value?> = (this.props.c_<?=$value?>==1 ? "wifi" : "exclamation-triangle");
      var pgn_<?=$value?> = (this.props.c_<?=$value?>==1 ? "100%" : "0%");
      var pgt_<?=$value?> = (this.props.c_<?=$value?>==1 ? "เชื่อมต่อปกติ" : "ขาดการเชื่อมต่อ");
    <? } ?>
      return (
        React.DOM.div({className: "row"}, 
          <? $lastElement = end($arr_code_node); foreach ($arr_code_node as $key => $value) { ?>
          React.createElement("div" , {className: "col-md-3 col-sm-6 col-xs-12" } , 
            React.createElement("div" , {className: "info-box "+bg_<?=$value?> } , 
              React.createElement("span" , {className: "info-box-icon" } , 
                React.createElement("i" , {className: "fa fa-"+ic_<?=$value?> })
              ),
              React.createElement("div" , {className: "info-box-content" } , 
                React.createElement("span" , {className: "info-box-text" } , "<?=$arr_name_node[$key]?>"),
                React.createElement("span" , {className: "info-box-number" } , time_con(this.props.c_time_<?=$value?>)),
                React.createElement("div" , {className: "progress" } , 
                  React.createElement("div" , {className: "progress-bar" , style : {'width': pgn_<?=$value?>} })
                ),
                React.createElement("span" , {className: "progress-description" } , pgt_<?=$value?>)
              )
            )
          )<?=($value!=$lastElement ? "," : "")?>
        <? } ?>
        )
      );
    }
  });

  function time_con(d){
    if(d>0){
      var date_data_1 = new Date(d * 1000);
      var day_data_1 = "0" + date_data_1.getDate();
      var mount_data_1 = "0" + (date_data_1.getMonth()+1);
      var year_data_1 = "0" + date_data_1.getFullYear();

      var hours_data_1 = "0" + date_data_1.getHours();
      var minutes_data_1 = "0" + date_data_1.getMinutes();
      var seconds_data_1 = "0" + date_data_1.getSeconds();
      var formattedTime = day_data_1.substr(-2) + '/' + mount_data_1.substr(-2) + '/' + year_data_1.substr(-2) + ' ' + hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2) + ':' + seconds_data_1.substr(-2);
    }else{
      var formattedTime = "-";
    }

    return formattedTime;
  }

  function say( text ){
  if('speechSynthesis' in window) { // Chrome only !!

    var speech = new SpeechSynthesisUtterance( text );
    speech.lang = 'th-TH';
    window.speechSynthesis.speak(speech);

  } else { // Other browsers !!

     // Use AJAX (with GET) to a .php to file_get_contents
     // generate the <100 by <100 charaters audio files, and nest in callbacks

  }
}




</script>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span style="display: block; float: left;">สถานะเซิร์ฟเวอร์</span>
        <div id="connect_ico" class="filter"></div>
        <span style="display: block; float: left;">Socket IP : <?=$nodejs_ip;?></span>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">สถานะเซิร์ฟเวอร์</li>
      </ol>
      <div style="clear: both;"></div>
    </section>

    <!-- Main content -->
   <!-- Main content -->

    <section class="content" id="content_box">

      <!-- /.row -->

 </section>
 <!-- /.content -->

 <script>


 </script>