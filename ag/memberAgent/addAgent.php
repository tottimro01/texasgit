<?php  include "../../inc/function.php"; ?>
<div class="page-content" id="pageContent" style=""><style type="text/css">
    .input-group {
        width:100px;
    }
    .input-group-addon {
        width: 40px;
    }
    .sl-width {
        width: 80px;
    }
    .tabbable input[type="text"] {
        width: 85px;
    }
    .col-md-4 {
        float: '' !important;
    }
    .numeric {
        height: 30px;
    }
    .label-sm {
        padding: 0px !important;
    }

    .selectize-control.repositories .selectize-dropdown > div {
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .selectize-control.repositories .selectize-dropdown .by {
        font-size: 11px;
        opacity: 0.8;
    }
    .selectize-control.repositories .selectize-dropdown .by::before {
        content: 'by ';
    }
    .selectize-control.repositories .selectize-dropdown .name {
        font-weight: bold;
        margin-right: 5px;
    }
    .selectize-control.repositories .selectize-dropdown .title {
        display: block;
    }
    .selectize-control.repositories .selectize-dropdown .description {
        font-size: 12px;
        display: block;
        color: #a0a0a0;
        white-space: nowrap;
        width: 100%;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .selectize-control.repositories .selectize-dropdown .meta {
        list-style: none;
        margin: 0;
        padding: 0;
        font-size: 10px;
    }
    .selectize-control.repositories .selectize-dropdown .meta li {
        margin: 0;
        padding: 0;
        display: inline;
        margin-right: 10px;
    }
    .selectize-control.repositories .selectize-dropdown .meta li span {
        font-weight: bold;
    }
    .selectize-control.repositories::before {
        -moz-transition: opacity 0.2s;
        -webkit-transition: opacity 0.2s;
        transition: opacity 0.2s;
        content: ' ';
        z-index: 2;
        position: absolute;
        display: block;
        top: 10px;
        right: 45px;
        width: 16px;
        height: 16px;
        background: url(assets/img/loading.gif);
        background-size: 16px 16px;
        opacity: 0;
    }
    .selectize-control.repositories.loading::before {
        opacity: 0.4;
    }

    @media (max-width:992px) {                         
        #manage-btn , .normal{
            display: none;
        }                      
    }
    @media (min-width: 993px){  
        #small-manage-btn , .mobile{
            display: none;
        }
    }
</style>
<link rel="stylesheet" href="assets/css/selectize.css">
<div class="row pdTop">
    <div class="col-xs-12 col-sm-12 col-md-12 widthTable">
        <form class="form-horizontal" id="createAgent_form" method="post" action="" onsubmit="return false;">
            <div class="widget-box no-skin widget-color">
                <div class="widget-header widget-header-blue">
                    <h4 class="widget-title lighter">ข้อมูลเอเย่นต์</h4>
                    <div class="widget-toolbar " id="manage-btn">
                        <button type="button" class="btn btn-success btn-xs" onclick="saveAgent();">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            บันทึก                        </button>
                        <button type="reset" class="btn btn-danger  btn-xs" onclick="btn_reset();">
                            <span class="fa fa-refresh icon-on-right bigger-110"></span>
                            ล้างค่า                        </button>
                    </div>
                    <div class="widget-toolbar no-border">
                        <button type="button" class="btn btn-xs btn-white bigger btn-info btn-bold" onclick="regisCopyUser();return false;">
                            <span class="normal">
                                คัดลอกผู้ใช้                            </span>
                            <span class="mobile">
                                คัดลอก                            </span>
                        </button>
                        <button type="button" class="btn btn-xs btn-white bigger btn-info btn-bold" onclick="setMaxAll();return false;">
                            <span class="normal">
                                ค่าสูงสุดทั้งหมด                            </span>
                            <span class="mobile">
                                Max                            </span>
                        </button>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div>
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="username"> ชื่อผู้ใช้ :</label>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="input-group clearfix">
                                        <span class="input-group-addon">
                                            oho 
                                        </span>
                                        <input type="text" class="inputEngNum" id="username" name="username" value="" maxlength="3" placeholder="ชื่อผู้ใช้">
                                    </div>
                                </div>
                                <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="password">รหัสผ่าน :</label>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="clearfix">
                                        <input type="password" name="password" id="password" class="inputEngNum" minlength="6" maxlength="16" placeholder="รหัสผ่าน">
                                        <span class="text-danger">* ต้องเป็น A-Z หรือ a-z และตัวเลข 0-9 และต้องไม่น้อยกว่า 5 ตัวอักษร</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="name"> ชื่อ :</label>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="clearfix">
                                        <input type="text" name="name" id="name" value="" placeholder="ชื่อ">
                                    </div>
                                </div>
                                <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="telephone"> เบอร์โทรศัพท์ :</label>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="clearfix">
                                        <input type="tel" id="telephone" name="telephone" value="" placeholder="เบอร์โทรศัพท์">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="credit"> เครดิต :</label>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="clearfix">
                                        <input type="text" name="credit" id="credit" value="0.00" class="numeric" placeholder="เครดิต">
                                        <span class="text-danger" id="max_credit" data-json="399,983">(Max = 399,983) </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue">
                                                                                                            <li class="active">
                                            <a data-toggle="tab" href="#soccer" onclick="utab('soccer');">
                                                <input type="checkbox" class="ace" checked="checked">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7>ฟุตบอล</h7>
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a data-toggle="tab" href="#sport" onclick="utab('sport');">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7>กีฬา</h7>
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a data-toggle="tab" href="#step" onclick="utab('step');">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7>สเต็ป</h7>
                                            </a>
                                        </li>
                                                                                                                                                <!-- <li>
                                            <a data-toggle="tab" href="#casino" onclick="utab('casino');">
                                                <i class="menu-icon fa fa-puzzle-piece"></i>
                                                <h7>คาสิโน</h7>
                                            </a>
                                        </li> -->
                                                                                                                                                <li>
                                            <a data-toggle="tab" href="#lotto" onclick="utab('lotto');">
                                                <i class="menu-icon fa fa-retweet"></i>
                                                <h7>หวย</h7>
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a data-toggle="tab" href="#lotto_set" onclick="utab('lotto_set');">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7>หวยหุ้น</h7>
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a data-toggle="tab" href="#lotto_lao" onclick="utab('lotto_lao');">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7>หวยชุด</h7>
                                            </a>
                                        </li>
                                                                                                                                                <!-- <li>
                                            <a data-toggle="tab" href="#lottery" onclick="utab('lottery');">
                                                <i class="menu-icon fa fa-cubes"></i>
                                                <h7>ล็อตเตอร์รี่</h7>
                                            </a>
                                        </li> -->
                                                                                                                                                <li>
                                            <a data-toggle="tab" href="#game" onclick="utab('game');">
                                                <i class="menu-icon fa fa-gamepad"></i>
                                                <h7>เกมส์</h7>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#casino" onclick="utab('casino');">
                                                <i class="menu-icon fa fa-puzzle-piece"></i>
                                                <h7>คาสิโน</h7>
                                            </a>
                                        </li>
                                                                                                </ul>
                            <div class="tab-content">
                                <div id="soccer" class="tab-pane fade in active">
                                    
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-inline pull-left">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" name="soccer_today_active" checked="">
                                                        <span class="lbl"> บอลก่อนแข่ง</span>
                                                    </label> &nbsp;
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" name="soccer_live_active" checked="">
                                                        <span class="lbl"> บอลกำลังแข่ง </span>
                                                    </label>
                                                </div>
                                                <div class="form-inline pull-right">
                                                    <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('soccer');">
                                                        ค่าสูงสุด                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="today_share">หุ้นกีฬาวันนี้ :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="clearfix input-group">
                                                        <select class="form-control input-sm sl_soccer" id="today_share" name="today_share" onchange="setKeep('today_share');" onclick="generateSL('87',this,true);">
                                                            <option value="0">0</option>
                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option></select>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                    <span class="text-danger"> 
                                                        oho 
                                                    </span>
                                                    ยอดเก็บ : <span id="k_today_share" data-json="87">
                                                        87                                                    </span> %
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="live_share">หุ้นกีฬากำลังแข่ง :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="clearfix input-group">
                                                        <select class="form-control input-sm sl_soccer" id="live_share" name="live_share" onchange="setKeep('live_share');" onclick="generateSL('87',this,true);">
                                                            <option value="0">0</option>
                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option></select>
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                    <span class="text-danger">
                                                        oho 
                                                    </span> 
                                                    ยอดเก็บ : <span id="k_live_share" data-json="87">
                                                        87                                                    </span> %
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="today_com">ค่าคอม :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix input-group">
                                                        <select class="form-control input-sm sl_soccer" id="today_com" name="today_com" onclick="generateSL2('0.50',this);">
                                                            <option value="0.00">0.00</option>
                                                        <option value="0.05">0.05</option><option value="0.10">0.10</option><option value="0.15">0.15</option><option value="0.20">0.20</option><option value="0.25">0.25</option><option value="0.30">0.30</option><option value="0.35">0.35</option><option value="0.40">0.40</option><option value="0.45">0.45</option><option value="0.50">0.50</option></select>
                                                        <span class="input-group-addon" id="k_today_com" data-json="0.50">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="torup">เพิ่มราคาทีมต่อ :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <select class="form-control sl-width input-sm sl_soccer" id="torup" name="torup" onclick="generateSL('5',this,true);">
                                                            <option value="0">0</option>
                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
                                                        <span class="hidden" id="k_torup" data-json="5"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="logup">เพิ่มราคาทีมรอง :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <select class="form-control sl-width input-sm sl_soccer" id="logup" name="logup" onclick="generateSL('5',this,true);">
                                                            <option value="0">0</option>
                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
                                                        <span class="hidden" id="k_logup" data-json="5"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_betmoneymax_pair">45 นาทีสูงสุด/คู่ :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <input type="text" name="live_betmoneymax_pair" id="live_betmoneymax_pair" class="numeric maxLimit" value="500,000">
                                                        <span class="text-danger label-sm" id="k_live_betmoneymax_pair" data-json="500,000">(&lt;= 500,000) </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_betmax_money">45 นาทีสูงสุด/ไม้ :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <input type="text" name="live_betmax_money" id="live_betmax_money" class="numeric maxLimit" value="100,000">
                                                        <span class="text-danger label-sm" id="k_live_betmax_money" data-json="100,000">(&lt;= 100,000) </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_betmin_money">45 นาทีต่ำสุด/ไม้ :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <input type="text" name="live_betmin_money" id="live_betmin_money" class="numeric minLimit" value="50">
                                                        <span class="text-danger label-sm" id="k_live_betmin_money" data-json="50">(&gt;= 50) </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_fbetmoneymax_pair">90 นาทีสูงสุด/คู่ :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <input type="text" name="live_fbetmoneymax_pair" id="live_fbetmoneymax_pair" class="numeric maxLimit" value="2,000,000">
                                                        <span class="text-danger label-sm" id="k_live_fbetmoneymax_pair" data-json="2,000,000">(&lt;= 2,000,000) </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_fbetmax_money">90 นาทีสูงสุด/ไม้ :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <input type="text" name="live_fbetmax_money" id="live_fbetmax_money" class="numeric maxLimit" value="1,000,000">
                                                        <span class="text-danger label-sm" id="k_live_fbetmax_money" data-json="1,000,000">(&lt;= 1,000,000) </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_fbetmin_money">90 นาทีต่ำสุด/ไม้  :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-8">
                                                    <div class="clearfix">
                                                        <input type="text" name="live_fbetmin_money" id="live_fbetmin_money" class="numeric minLimit" value="50">
                                                        <span class="text-danger label-sm" id="k_live_fbetmin_money" data-json="50">(&gt;= 50) </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                                <div id="sport" class="tab-pane fade">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-inline pull-left">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" name="sport_today_active" checked="checked">
                                                    <span class="lbl"> กีฬาวันนี้</span>
                                                </label> &nbsp;
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" name="sport_live_active" checked="checked">
                                                    <span class="lbl"> กีฬากำลังแข่ง</span>
                                                </label>
                                            </div>
                                            <div class="form-inline pull-right">
                                                <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('sport');">
                                                    ค่าสูงสุด                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="sporttoday_share">หุ้นกีฬาวันนี้ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm sl_sport" id="sporttoday_share" name="sporttoday_share" onchange="setKeep('sporttoday_share');" onclick="generateSL('70',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option></select>
                                                    <span class="input-group-addon">
                                                        %
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                <span class="text-danger">
                                                    oho 
                                                </span> 
                                                ยอดเก็บ : <span id="k_sporttoday_share" data-json="70">
                                                        70                                                </span> %
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="sportlive_share">หุ้นกีฬากำลังแข่ง :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm sl_sport" id="sportlive_share" name="sportlive_share" onchange="setKeep('sportlive_share');" onclick="generateSL('70',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option></select>
                                                    <span class="input-group-addon">
                                                        %
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                <span class="text-danger">oho</span> 
                                                ยอดเก็บ : <span id="k_sportlive_share" data-json="70">
                                                        70                                                </span> %
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_com">ค่าคอม :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm sl_sport" id="sport_com" name="sport_com" onclick="generateSL2('0.50',this,true);">
                                                            <option value="0.00">0.00</option>
                                                    <option value="0.05">0.05</option><option value="0.10">0.10</option><option value="0.15">0.15</option><option value="0.20">0.20</option><option value="0.25">0.25</option><option value="0.30">0.30</option><option value="0.35">0.35</option><option value="0.40">0.40</option><option value="0.45">0.45</option><option value="0.50">0.50</option></select>
                                                    <span class="input-group-addon" id="k_sport_com" data-json="0.50">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_betmoneymax_pair">สูงสุด/คู่ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <input type="text" name="sport_betmoneymax_pair" id="sport_betmoneymax_pair" class="numeric maxLimit" value="10,000">
                                                    <span class="text-danger label-sm" id="k_sport_betmoneymax_pair" data-json="10,000">(&lt;= 10,000) </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_betmax_money">สูงสุด/ไม้ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <input type="text" name="sport_betmax_money" id="sport_betmax_money" class="numeric maxLimit" value="5,000">
                                                    <span class="text-danger label-sm" id="k_sport_betmax_money" data-json="5,000">(&lt;= 5,000) </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_betmin_money">ต่ำสุด/ไม้ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <input type="text" name="sport_betmin_money" id="sport_betmin_money" class="numeric minLimit" value="50">
                                                    <span class="text-danger label-sm" id="k_sport_betmin_money" data-json="50">(&gt;= 50) </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step" class="tab-pane fade">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-inline pull-left">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" name="step_active" checked="checked">
                                                    <span class="lbl"> สเต็ป </span>
                                                </label>
                                            </div>
                                            <div class="form-inline pull-right">
                                                <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('step');">
                                                    ค่าสูงสุด                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="step_share">แบ่งหุ้น :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm sl_step" id="step_share" name="step_share" onchange="setKeep('step_share');" onclick="generateSL('80',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option></select>
                                                    <span class="input-group-addon">
                                                        %
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                <span class="text-danger">oho </span> 
                                                ยอดเก็บ : <span id="k_step_share" data-json="80">
                                                        80                                                </span> %
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="stepcom2">ส่วนลด 2 คู่ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix  input-group">
                                                    <select class="form-control input-sm sl_step" id="stepcom2" name="stepcom2" onclick="generateSL('5',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
                                                    <span class="input-group-addon" id="k_stepcom2" data-json="5">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="step_betmax_money">สูงสุด/ไม้ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <input type="text" name="step_betmax_money" id="step_betmax_money" class="numeric maxLimit" value="100,000">
                                                    <span class="text-danger label-sm" id="k_step_betmax_money" data-json="100,000">(&lt;= 100,000) </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="step_daymax_money">เล่นได้สูงสุด/วัน :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <input type="text" name="step_daymax_money" id="step_daymax_money" class="numeric maxLimit" value="100,000">
                                                    <span class="text-danger label-sm" id="k_step_daymax_money" data-json="100,000">(&lt;= 100,000) </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="stepcom3">ส่วนลด 3-4 คู่ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix  input-group">
                                                    <select class="form-control input-sm sl_step" id="stepcom3" name="stepcom3" onclick="generateSL('10',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select>
                                                    <span class="input-group-addon" id="k_stepcom3" data-json="10">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="step_betmin_money">ต่ำสุด/ไม้ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <input type="text" name="step_betmin_money" id="step_betmin_money" class="numeric minLimit" value="50">
                                                    <span class="text-danger label-sm" id="k_step_betmin_money" data-json="50">(&gt;= 50) </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="step_billmax_money">จ่ายสูงสุด/บิล :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <input type="text" name="step_billmax_money" id="step_billmax_money" class="numeric maxLimit" value="1,000,000">
                                                    <span class="text-danger label-sm" id="k_step_billmax_money" data-json="1,000,000">(&lt;= 1,000,000) </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="stepcom5">ส่วนลด 5-6 คู่ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix  input-group">
                                                    <select class="form-control input-sm sl_step" id="stepcom5" name="stepcom5" onclick="generateSL('11',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option></select>
                                                    <span class="input-group-addon" id="k_stepcom5" data-json="11">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="stepcom1">Comm fold :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix  input-group">
                                                    <select class="form-control input-sm sl_step" id="stepcom1" name="stepcom1" onclick="generateSL('0',this,true);">
                                                            <option value="0">0</option>
                                                    </select>
                                                    <span class="input-group-addon" id="k_stepcom1" data-json="0">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="step_max_pair">จำนวนคู่สูงสุด/บิล :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <select class="form-control sl-width input-sm sl_step" id="step_max_pair" name="step_max_pair" onclick="generateSL('12',this,false);">
                                                            <option value="12">
                                                                12                                                            </option>
                                                    <option value="12">12</option><option value="11">11</option><option value="10">10</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1</option><option value="0">0</option></select>
                                                    <span class="hidden" id="k_step_max_pair" data-json="12"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="stepcom7">ส่วนลด 7-8 คู่ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix  input-group">
                                                    <select class="form-control input-sm sl_step" id="stepcom7" name="stepcom7" onclick="generateSL('14',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option></select>
                                                    <span class="input-group-addon" id="k_stepcom7" data-json="14">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4"></div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="step_min_pair">จำนวนคู่ต่ำสุด/บิล :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix">
                                                    <select class="form-control sl-width input-sm sl_step" id="step_min_pair" name="step_min_pair" onclick="generateSL('2',this,false);">
                                                            <option value="2">2</option>
                                                    <option value="2">2</option><option value="1">1</option><option value="0">0</option></select>
                                                    <span class="hidden" id="k_step_min_pair" data-json="2"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="stepcom9">ส่วนลด 9-10 คู่ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix  input-group">
                                                    <select class="form-control input-sm sl_step" id="stepcom9" name="stepcom9" onclick="generateSL('17',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option></select>
                                                    <span class="input-group-addon" id="k_stepcom9" data-json="17">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label class="control-label col-sm-6 col-md-4 no-padding-right" for="stepcom11">ส่วนลด 11-12 คู่ :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-8">
                                                <div class="clearfix  input-group">
                                                    <select class="form-control input-sm sl_step" id="stepcom11" name="stepcom11" onclick="generateSL('20',this,true);">
                                                            <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select>
                                                    <span class="input-group-addon" id="k_stepcom11" data-json="20">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="casino" class="tab-pane fade">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-inline pull-left">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" name="casino_active" checked="checked">
                                                    <span class="lbl"> คาสิโน </span>
                                                </label>
                                            </div>
                                            <div class="form-inline pull-right">
                                                <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('casino');">
                                                    ค่าสูงสุด                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="widget-box" style="">
                                                <div class="widget-header widget-header-flat  text-center">
                                                    <h4 class="widget-title smaller">SAGaming </h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="casino_share">แบ่งหุ้น :</label>
                                                                <div class="col-xs-12 col-sm-6 col-md-7">
                                                                    <div class="clearfix input-group">
                                                                        <select class="form-control input-sm sl_casino" id="casino_share" name="casino_share" onchange="setKeep('casino_share');" onclick="generateSL('60',this,true);">
                                                                            <option value="0">0</option>
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option></select>
                                                                        <span class="input-group-addon">
                                                                            %
                                                                        </span>
                                                                    </div>
                                                                    <label class="control-label no-padding-right">
                                                                        <span class="text-danger">oho </span> 
                                                                        ยอดเก็บ : <span id="k_casino_share" data-json="60">
                                                                                60                                                                        </span> %
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="display: none;">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="casino_com">ค่าคอม :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix  input-group">
                                                                        <select class="form-control input-sm sl_casino" id="casino_com" name="casino_com" onclick="generateSL2('0.00',this);">
                                                                            <option value="0.00">0.00</option>
                                                                        </select>
                                                                        <span class="input-group-addon" id="k_casino_com" data-json="0.00">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="display: none;">
                                                            <div class="col-xs-12 col-sm-12">
                                                                <label class="control-label col-xs-12 col-sm-5 no-padding-right" for="casino_maxloss">เล่นเสียสูงสุดต่อวัน :</label>
                                                                <div class="col-xs-12 col-sm-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="casino_maxloss" id="casino_maxloss" class="numeric maxLimit" value="2,000,000" style="width: 150px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="">
                                                            <div class="col-xs-12 col-sm-12">
                                                                <label class="control-label col-xs-12 col-sm-5 no-padding-right" for="casino_maxtransfer">โอนไปคาสิโนสูงสุด :</label>
                                                                <div class="col-xs-7 col-sm-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="casino_maxtransfer" id="casino_maxtransfer" class="numeric maxLimit" value="1,000,000" style="width: 150px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="widget-box">
                                                <div class="widget-header widget-header-flat  text-center">
                                                    <h4 class="widget-title smaller">SunMacau&amp;Allbet&amp;Sexy&amp;Party&amp;Joker&amp;Slotcity Casino</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="party_share">แบ่งหุ้น :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix input-group">
                                                                        <select class="form-control input-sm sl_casino" id="party_share" name="party_share" onchange="setKeep('party_share');" onclick="generateSL('60',this,true);">
                                                                            <option value="0">0</option>
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option></select>
                                                                        <span class="input-group-addon">
                                                                            %
                                                                        </span>
                                                                    </div>
                                                                    <label class="control-label no-padding-right">
                                                                        <span class="text-danger">oho </span> 
                                                                        ยอดเก็บ : <span id="k_party_share" data-json="60">
                                                                                60                                                                        </span> %
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="display:none;">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="party_com">ค่าคอม :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix  input-group">
                                                                        <select class="form-control input-sm sl_casino" id="party_com" name="party_com" onclick="generateSL('0.00',this);">
                                                                            <option value="0.00">0.00</option>
                                                                        <option value="0.00">0.00</option></select>
                                                                        <span class="input-group-addon" id="k_party_com" data-json="0.00">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="password">โอนไปคาสิโนสูงสุด :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="party_maxtransfer" id="party_maxtransfer" class="numeric maxLimit" value="10,000">
                                                                        <span class="text-danger label-sm" id="k_party_maxtransfer" data-json="10,000">(&lt;= 10,000) </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="widget-box">
                                                <div class="widget-header widget-header-flat  text-center">
                                                    <h4 class="widget-title smaller">Vivo Casino</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="vivo_share">แบ่งหุ้น :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix input-group">
                                                                        <select class="form-control input-sm sl_casino" id="vivo_share" name="vivo_share" onchange="setKeep('vivo_share');" onclick="generateSL('60',this,true);">
                                                                            <option value="0">0</option>
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option></select>
                                                                        <span class="input-group-addon">
                                                                            %
                                                                        </span>
                                                                    </div>
                                                                    <label class="control-label no-padding-right">
                                                                        <span class="text-danger">oho </span> 
                                                                        ยอดเก็บ : <span id="k_vivo_share" data-json="60">
                                                                                60                                                                        </span> %
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="display: none;">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="vivo_com">ค่าคอม :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix  input-group">
                                                                        <select class="form-control input-sm sl_casino" id="vivo_com" name="vivo_com" onclick="generateSL2('0.00',this);">
                                                                            <option value="0.00">0.00</option>
                                                                        </select>
                                                                        <span class="input-group-addon" id="k_vivo_com" data-json="0.00">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12">
                                                                <label class="control-label col-xs-12 col-sm-5 no-padding-right" for="vivo_maxloss">เล่นเสียสูงสุดต่อวัน :</label>
                                                                <div class="col-xs-12 col-sm-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="vivo_maxloss" id="vivo_maxloss" class="numeric maxLimit" value="5,000,000" style="width: 150px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12">
                                                                <label class="control-label col-xs-12 col-sm-5 no-padding-right" for="vivo_maxtransfer">เล่นได้สูงสุดต่อวัน :</label>
                                                                <div class="col-xs-7 col-sm-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="vivo_maxtransfer" id="vivo_maxtransfer" class="numeric maxLimit" value="5,000,000" style="width: 150px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="widget-box">
                                                <div class="widget-header widget-header-flat  text-center">
                                                    <h4 class="widget-title smaller">Fishing Game&amp;Casino</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="fg_share">แบ่งหุ้น :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix input-group">
                                                                        <select class="form-control input-sm sl_casino" id="fg_share" name="fg_share" onchange="setKeep('fg_share');" onclick="generateSL('55',this,true);">
                                                                            <option value="0">0</option>
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option></select>
                                                                        <span class="input-group-addon">
                                                                            %
                                                                        </span>
                                                                    </div>
                                                                    <label class="control-label no-padding-right">
                                                                        <span class="text-danger">oho </span> 
                                                                        ยอดเก็บ : <span id="k_fg_share" data-json="55">
                                                                                55                                                                        </span> %
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="display:none;">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="fg_com">ค่าคอม :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix  input-group">
                                                                        <select class="form-control input-sm sl_casino" id="fg_com" name="fg_com" onclick="generateSL2('0.00',this);">
                                                                            <option value="0.00">0.00</option>
                                                                        </select>
                                                                        <span class="input-group-addon" id="k_fg_com" data-json="0.00">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="fg_maxtransfer">โอนไปคาสิโนสูงสุด :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="fg_maxtransfer" id="fg_maxtransfer" class="numeric maxLimit" value="10,000">
                                                                        <span class="text-danger label-sm" id="k_fg_maxtransfer" data-json="10,000">(&lt;= 10,000) </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="widget-box">
                                                <div class="widget-header widget-header-flat  text-center">
                                                    <h4 class="widget-title smaller">TGP Casino&amp;Slot</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="tgp_share">แบ่งหุ้น :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix input-group">
                                                                        <select class="form-control input-sm sl_casino" id="tgp_share" name="tgp_share" onchange="setKeep('tgp_share');" onclick="generateSL('60',this,true);">
                                                                            <option value="0">0</option>
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option></select>
                                                                        <span class="input-group-addon">
                                                                            %
                                                                        </span>
                                                                    </div>
                                                                    <label class="control-label no-padding-right">
                                                                        <span class="text-danger">oho </span> 
                                                                        ยอดเก็บ : <span id="k_tgp_share" data-json="60">
                                                                                60                                                                        </span> %
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="display:none;">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="tgp_com">ค่าคอม :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix  input-group">
                                                                        <select class="form-control input-sm sl_casino" id="tgp_com" name="tgp_com" onclick="generateSL2('0.00',this);">
                                                                            <option value="0.00">0.00</option>
                                                                        </select>
                                                                        <span class="input-group-addon" id="k_tgp_com" data-json="0.00">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="tgp_maxtransfer">โอนไปคาสิโนสูงสุด :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="tgp_maxtransfer" id="tgp_maxtransfer" class="numeric maxLimit" value="10,000">
                                                                        <span class="text-danger label-sm" id="k_tgp_maxtransfer" data-json="10,000">(&lt;= 10,000) </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6" style="">
                                            <div class="widget-box">
                                                <div class="widget-header widget-header-flat  text-center">
                                                    <h4 class="widget-title smaller">ไก่ชน</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="allbet_share">แบ่งหุ้น :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix input-group">
                                                                        <select class="form-control input-sm sl_casino" id="allbet_share" name="allbet_share" onchange="setKeep('allbet_share');" onclick="generateSL('0',this,true);">
                                                                            <option value="0">0</option>
                                                                        </select>
                                                                        <span class="input-group-addon">
                                                                            %
                                                                        </span>
                                                                    </div>
                                                                    <label class="control-label no-padding-right">
                                                                        <span class="text-danger">oho </span> 
                                                                        ยอดเก็บ : <span id="k_allbet_share" data-json="0">
                                                                                0                                                                        </span> %
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="display:none;">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="allbet_com">ค่าคอม :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix  input-group">
                                                                        <select class="form-control input-sm sl_casino" id="allbet_com" name="allbet_com" onclick="generateSL2('0.00',this);">
                                                                            <option value="0.00">0.00</option>
                                                                        </select>
                                                                        <span class="input-group-addon" id="k_allbet_com" data-json="0.00">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="allbet_maxtransfer">โอนไปคาสิโนสูงสุด :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix">
                                                                        <input type="text" name="allbet_maxtransfer" id="allbet_maxtransfer" class="numeric maxLimit" value="50,000">
                                                                        <span class="text-danger label-sm" id="k_allbet_maxtransfer" data-json="50,000">(&lt;= 50,000) </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <?php
                                            $last_key = end(array_keys($arr["list_game"]));
                                            $i=1;
                                            foreach ($arr["list_game"] as $key => $value):
                                                if ($key != $last_key):
                                                
                                        ?>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="widget-box">
                                                <div class="widget-header widget-header-flat  text-center">
                                                    <h4 class="widget-title smaller"><?=$value['name'];?></h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="casino_share">แบ่งหุ้น :</label>
                                                                <div class="col-xs-12 col-sm-6 col-md-7 casino_select">
                                                                    <div class="clearfix input-group">
                                                                        <select class="form-control input-sm sl_casino casino_share" id="casino_share<?=$i;?>" name="casino_share" onchange="setKeep('casino_share');" onclick="generateSL('60',this,true);">
                                                                            <option value="0">0</option>
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option></select>
                                                                        <span class="input-group-addon">
                                                                            %
                                                                        </span>
                                                                    </div>
                                                                    <!-- <label class="control-label no-padding-right"> -->
                                                                        <span class="text-danger">oho </span> 
                                                                        ยอดเก็บ : <span id="k_casino_share" class="sl_data" data-json="60">
                                                                                60                                                                        </span> %
                                                                    <!-- </label> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="rcb_maxtransfer">โอนไปคาสิโนสูงสุด :</label>
                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                    <div class="clearfix casino_Input">
                                                                        <input type="text" name="rcb_maxtransfer" id="rcb_maxtransfer<?=$i;?>" class="numeric maxLimit" value="10,000">
                                                                        <span class="text-danger label-sm maxtransfer" id="k_rcb_maxtransfer" data-json="10,000">(&lt;= 10,000) </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                <?$i++;endif;endforeach;?>
                                    </div>
                                </div>
                                <div id="lotto" class="tab-pane fade">
                                    <div class="widget-main no-padding">
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-inline pull-left">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" name="lotto_active" checked="checked">
                                                        <span class="lbl"> หวย </span>
                                                    </label>
                                                </div>
                                                <div class="form-inline pull-right">
                                                    <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('lotto');">
                                                        ค่าสูงสุด                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-4 col-md-2">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="7_lotto_share">แบ่งหุ้น :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="clearfix input-group">
                                                        <select class="form-control input-sm sl_lotto" id="7_lotto_share" name="7[][lotto_share]" onchange="setKeep('7_lotto_share');" onclick="generateSL('0',this,true);">
                                                            <option value="0">0</option>
                                                        </select>
                                                        <span class="input-group-addon">
                                                            %
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                    <span class="text-danger">oho </span> 
                                                    ยอดเก็บ : <span id="k_7_lotto_share" data-json="0">
                                                            0                                                    </span> %
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="widget-box">
                                                    <div class="widget-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">รายการ</th>
                                                                        <th class="text-center">อัตราจ่าย</th>
                                                                        <th class="text-center">ค่าคอม</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">3 ตัวบน</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto" id="7_0_lotto_pay" name="7[0][lotto_pay]" onclick="generateSL('700',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option><option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option><option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option><option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option><option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option><option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option><option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option><option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option><option value="150">150</option><option value="151">151</option><option value="152">152</option><option value="153">153</option><option value="154">154</option><option value="155">155</option><option value="156">156</option><option value="157">157</option><option value="158">158</option><option value="159">159</option><option value="160">160</option><option value="161">161</option><option value="162">162</option><option value="163">163</option><option value="164">164</option><option value="165">165</option><option value="166">166</option><option value="167">167</option><option value="168">168</option><option value="169">169</option><option value="170">170</option><option value="171">171</option><option value="172">172</option><option value="173">173</option><option value="174">174</option><option value="175">175</option><option value="176">176</option><option value="177">177</option><option value="178">178</option><option value="179">179</option><option value="180">180</option><option value="181">181</option><option value="182">182</option><option value="183">183</option><option value="184">184</option><option value="185">185</option><option value="186">186</option><option value="187">187</option><option value="188">188</option><option value="189">189</option><option value="190">190</option><option value="191">191</option><option value="192">192</option><option value="193">193</option><option value="194">194</option><option value="195">195</option><option value="196">196</option><option value="197">197</option><option value="198">198</option><option value="199">199</option><option value="200">200</option><option value="201">201</option><option value="202">202</option><option value="203">203</option><option value="204">204</option><option value="205">205</option><option value="206">206</option><option value="207">207</option><option value="208">208</option><option value="209">209</option><option value="210">210</option><option value="211">211</option><option value="212">212</option><option value="213">213</option><option value="214">214</option><option value="215">215</option><option value="216">216</option><option value="217">217</option><option value="218">218</option><option value="219">219</option><option value="220">220</option><option value="221">221</option><option value="222">222</option><option value="223">223</option><option value="224">224</option><option value="225">225</option><option value="226">226</option><option value="227">227</option><option value="228">228</option><option value="229">229</option><option value="230">230</option><option value="231">231</option><option value="232">232</option><option value="233">233</option><option value="234">234</option><option value="235">235</option><option value="236">236</option><option value="237">237</option><option value="238">238</option><option value="239">239</option><option value="240">240</option><option value="241">241</option><option value="242">242</option><option value="243">243</option><option value="244">244</option><option value="245">245</option><option value="246">246</option><option value="247">247</option><option value="248">248</option><option value="249">249</option><option value="250">250</option><option value="251">251</option><option value="252">252</option><option value="253">253</option><option value="254">254</option><option value="255">255</option><option value="256">256</option><option value="257">257</option><option value="258">258</option><option value="259">259</option><option value="260">260</option><option value="261">261</option><option value="262">262</option><option value="263">263</option><option value="264">264</option><option value="265">265</option><option value="266">266</option><option value="267">267</option><option value="268">268</option><option value="269">269</option><option value="270">270</option><option value="271">271</option><option value="272">272</option><option value="273">273</option><option value="274">274</option><option value="275">275</option><option value="276">276</option><option value="277">277</option><option value="278">278</option><option value="279">279</option><option value="280">280</option><option value="281">281</option><option value="282">282</option><option value="283">283</option><option value="284">284</option><option value="285">285</option><option value="286">286</option><option value="287">287</option><option value="288">288</option><option value="289">289</option><option value="290">290</option><option value="291">291</option><option value="292">292</option><option value="293">293</option><option value="294">294</option><option value="295">295</option><option value="296">296</option><option value="297">297</option><option value="298">298</option><option value="299">299</option><option value="300">300</option><option value="301">301</option><option value="302">302</option><option value="303">303</option><option value="304">304</option><option value="305">305</option><option value="306">306</option><option value="307">307</option><option value="308">308</option><option value="309">309</option><option value="310">310</option><option value="311">311</option><option value="312">312</option><option value="313">313</option><option value="314">314</option><option value="315">315</option><option value="316">316</option><option value="317">317</option><option value="318">318</option><option value="319">319</option><option value="320">320</option><option value="321">321</option><option value="322">322</option><option value="323">323</option><option value="324">324</option><option value="325">325</option><option value="326">326</option><option value="327">327</option><option value="328">328</option><option value="329">329</option><option value="330">330</option><option value="331">331</option><option value="332">332</option><option value="333">333</option><option value="334">334</option><option value="335">335</option><option value="336">336</option><option value="337">337</option><option value="338">338</option><option value="339">339</option><option value="340">340</option><option value="341">341</option><option value="342">342</option><option value="343">343</option><option value="344">344</option><option value="345">345</option><option value="346">346</option><option value="347">347</option><option value="348">348</option><option value="349">349</option><option value="350">350</option><option value="351">351</option><option value="352">352</option><option value="353">353</option><option value="354">354</option><option value="355">355</option><option value="356">356</option><option value="357">357</option><option value="358">358</option><option value="359">359</option><option value="360">360</option><option value="361">361</option><option value="362">362</option><option value="363">363</option><option value="364">364</option><option value="365">365</option><option value="366">366</option><option value="367">367</option><option value="368">368</option><option value="369">369</option><option value="370">370</option><option value="371">371</option><option value="372">372</option><option value="373">373</option><option value="374">374</option><option value="375">375</option><option value="376">376</option><option value="377">377</option><option value="378">378</option><option value="379">379</option><option value="380">380</option><option value="381">381</option><option value="382">382</option><option value="383">383</option><option value="384">384</option><option value="385">385</option><option value="386">386</option><option value="387">387</option><option value="388">388</option><option value="389">389</option><option value="390">390</option><option value="391">391</option><option value="392">392</option><option value="393">393</option><option value="394">394</option><option value="395">395</option><option value="396">396</option><option value="397">397</option><option value="398">398</option><option value="399">399</option><option value="400">400</option><option value="401">401</option><option value="402">402</option><option value="403">403</option><option value="404">404</option><option value="405">405</option><option value="406">406</option><option value="407">407</option><option value="408">408</option><option value="409">409</option><option value="410">410</option><option value="411">411</option><option value="412">412</option><option value="413">413</option><option value="414">414</option><option value="415">415</option><option value="416">416</option><option value="417">417</option><option value="418">418</option><option value="419">419</option><option value="420">420</option><option value="421">421</option><option value="422">422</option><option value="423">423</option><option value="424">424</option><option value="425">425</option><option value="426">426</option><option value="427">427</option><option value="428">428</option><option value="429">429</option><option value="430">430</option><option value="431">431</option><option value="432">432</option><option value="433">433</option><option value="434">434</option><option value="435">435</option><option value="436">436</option><option value="437">437</option><option value="438">438</option><option value="439">439</option><option value="440">440</option><option value="441">441</option><option value="442">442</option><option value="443">443</option><option value="444">444</option><option value="445">445</option><option value="446">446</option><option value="447">447</option><option value="448">448</option><option value="449">449</option><option value="450">450</option><option value="451">451</option><option value="452">452</option><option value="453">453</option><option value="454">454</option><option value="455">455</option><option value="456">456</option><option value="457">457</option><option value="458">458</option><option value="459">459</option><option value="460">460</option><option value="461">461</option><option value="462">462</option><option value="463">463</option><option value="464">464</option><option value="465">465</option><option value="466">466</option><option value="467">467</option><option value="468">468</option><option value="469">469</option><option value="470">470</option><option value="471">471</option><option value="472">472</option><option value="473">473</option><option value="474">474</option><option value="475">475</option><option value="476">476</option><option value="477">477</option><option value="478">478</option><option value="479">479</option><option value="480">480</option><option value="481">481</option><option value="482">482</option><option value="483">483</option><option value="484">484</option><option value="485">485</option><option value="486">486</option><option value="487">487</option><option value="488">488</option><option value="489">489</option><option value="490">490</option><option value="491">491</option><option value="492">492</option><option value="493">493</option><option value="494">494</option><option value="495">495</option><option value="496">496</option><option value="497">497</option><option value="498">498</option><option value="499">499</option><option value="500">500</option><option value="501">501</option><option value="502">502</option><option value="503">503</option><option value="504">504</option><option value="505">505</option><option value="506">506</option><option value="507">507</option><option value="508">508</option><option value="509">509</option><option value="510">510</option><option value="511">511</option><option value="512">512</option><option value="513">513</option><option value="514">514</option><option value="515">515</option><option value="516">516</option><option value="517">517</option><option value="518">518</option><option value="519">519</option><option value="520">520</option><option value="521">521</option><option value="522">522</option><option value="523">523</option><option value="524">524</option><option value="525">525</option><option value="526">526</option><option value="527">527</option><option value="528">528</option><option value="529">529</option><option value="530">530</option><option value="531">531</option><option value="532">532</option><option value="533">533</option><option value="534">534</option><option value="535">535</option><option value="536">536</option><option value="537">537</option><option value="538">538</option><option value="539">539</option><option value="540">540</option><option value="541">541</option><option value="542">542</option><option value="543">543</option><option value="544">544</option><option value="545">545</option><option value="546">546</option><option value="547">547</option><option value="548">548</option><option value="549">549</option><option value="550">550</option><option value="551">551</option><option value="552">552</option><option value="553">553</option><option value="554">554</option><option value="555">555</option><option value="556">556</option><option value="557">557</option><option value="558">558</option><option value="559">559</option><option value="560">560</option><option value="561">561</option><option value="562">562</option><option value="563">563</option><option value="564">564</option><option value="565">565</option><option value="566">566</option><option value="567">567</option><option value="568">568</option><option value="569">569</option><option value="570">570</option><option value="571">571</option><option value="572">572</option><option value="573">573</option><option value="574">574</option><option value="575">575</option><option value="576">576</option><option value="577">577</option><option value="578">578</option><option value="579">579</option><option value="580">580</option><option value="581">581</option><option value="582">582</option><option value="583">583</option><option value="584">584</option><option value="585">585</option><option value="586">586</option><option value="587">587</option><option value="588">588</option><option value="589">589</option><option value="590">590</option><option value="591">591</option><option value="592">592</option><option value="593">593</option><option value="594">594</option><option value="595">595</option><option value="596">596</option><option value="597">597</option><option value="598">598</option><option value="599">599</option><option value="600">600</option><option value="601">601</option><option value="602">602</option><option value="603">603</option><option value="604">604</option><option value="605">605</option><option value="606">606</option><option value="607">607</option><option value="608">608</option><option value="609">609</option><option value="610">610</option><option value="611">611</option><option value="612">612</option><option value="613">613</option><option value="614">614</option><option value="615">615</option><option value="616">616</option><option value="617">617</option><option value="618">618</option><option value="619">619</option><option value="620">620</option><option value="621">621</option><option value="622">622</option><option value="623">623</option><option value="624">624</option><option value="625">625</option><option value="626">626</option><option value="627">627</option><option value="628">628</option><option value="629">629</option><option value="630">630</option><option value="631">631</option><option value="632">632</option><option value="633">633</option><option value="634">634</option><option value="635">635</option><option value="636">636</option><option value="637">637</option><option value="638">638</option><option value="639">639</option><option value="640">640</option><option value="641">641</option><option value="642">642</option><option value="643">643</option><option value="644">644</option><option value="645">645</option><option value="646">646</option><option value="647">647</option><option value="648">648</option><option value="649">649</option><option value="650">650</option><option value="651">651</option><option value="652">652</option><option value="653">653</option><option value="654">654</option><option value="655">655</option><option value="656">656</option><option value="657">657</option><option value="658">658</option><option value="659">659</option><option value="660">660</option><option value="661">661</option><option value="662">662</option><option value="663">663</option><option value="664">664</option><option value="665">665</option><option value="666">666</option><option value="667">667</option><option value="668">668</option><option value="669">669</option><option value="670">670</option><option value="671">671</option><option value="672">672</option><option value="673">673</option><option value="674">674</option><option value="675">675</option><option value="676">676</option><option value="677">677</option><option value="678">678</option><option value="679">679</option><option value="680">680</option><option value="681">681</option><option value="682">682</option><option value="683">683</option><option value="684">684</option><option value="685">685</option><option value="686">686</option><option value="687">687</option><option value="688">688</option><option value="689">689</option><option value="690">690</option><option value="691">691</option><option value="692">692</option><option value="693">693</option><option value="694">694</option><option value="695">695</option><option value="696">696</option><option value="697">697</option><option value="698">698</option><option value="699">699</option><option value="700">700</option></select>
                                                                                        <span class="hidden" id="k_7_0_lotto_pay" data-json="700">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_0_lotto_com" name="7[0][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_0_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">3 ตัวบนโต๊ด</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto" id="7_1_lotto_pay" name="7[1][lotto_pay]" onclick="generateSL('120',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option></select>
                                                                                        <span class="hidden" id="k_7_1_lotto_pay" data-json="120">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_1_lotto_com" name="7[1][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_1_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">3 ตัวบนวิ่ง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto" id="7_2_lotto_pay" name="7[2][lotto_pay]" onclick="generateSL('3',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option></select>
                                                                                        <span class="hidden" id="k_7_2_lotto_pay" data-json="3">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_2_lotto_com" name="7[2][lotto_com]" onclick="generateSL('8',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
                                                                                        <span class="input-group-addon" id="k_7_2_lotto_com" data-json="8">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">2 ตัวบน</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto" id="7_4_lotto_pay" name="7[4][lotto_pay]" onclick="generateSL('75',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option></select>
                                                                                        <span class="hidden" id="k_7_4_lotto_pay" data-json="75">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_4_lotto_com" name="7[4][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_4_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">3 ตัวล่าง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto" id="7_6_lotto_pay" name="7[6][lotto_pay]" onclick="generateSL('150',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option><option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option><option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option><option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option><option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option><option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option><option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option><option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option><option value="150">150</option></select>
                                                                                        <span class="hidden" id="k_7_6_lotto_pay" data-json="150">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_6_lotto_com" name="7[6][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_6_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">2 ตัวล่าง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto" id="7_5_lotto_pay" name="7[5][lotto_pay]" onclick="generateSL('75',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option></select>
                                                                                        <span class="hidden" id="k_7_5_lotto_pay" data-json="75">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_5_lotto_com" name="7[5][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_5_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">2 ตัวล่างวิ่ง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto" id="7_3_lotto_pay" name="7[3][lotto_pay]" onclick="generateSL('4',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
                                                                                        <span class="hidden" id="k_7_3_lotto_pay" data-json="4">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_3_lotto_com" name="7[3][lotto_com]" onclick="generateSL('8',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
                                                                                        <span class="input-group-addon" id="k_7_3_lotto_com" data-json="8">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="widget-box">
                                                    <div class="widget-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">รายการ</th>
                                                                        <th class="text-center">อัตราจ่าย</th>
                                                                        <th class="text-center">ค่าคอม</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">บน 2 ใน 3</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sminput-sm sl_lotto" id="7_7_lotto_pay" name="7[7][lotto_pay]" onclick="generateSL('10',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select>
                                                                                        <span class="hidden" id="k_7_7_lotto_pay" data-json="10">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_7_lotto_com" name="7[7][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_7_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">บน 3 ใน 4</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sminput-sm sl_lotto" id="7_8_lotto_pay" name="7[8][lotto_pay]" onclick="generateSL('20',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select>
                                                                                        <span class="hidden" id="k_7_8_lotto_pay" data-json="20">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_8_lotto_com" name="7[8][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_8_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">บน 3 ใน 5</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sminput-sm sl_lotto" id="7_9_lotto_pay" name="7[9][lotto_pay]" onclick="generateSL('10',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select>
                                                                                        <span class="hidden" id="k_7_9_lotto_pay" data-json="10">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_9_lotto_com" name="7[9][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_9_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">ปักหลักหน่วย</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sminput-sm sl_lotto" id="7_10_lotto_pay" name="7[10][lotto_pay]" onclick="generateSL('8',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
                                                                                        <span class="hidden" id="k_7_10_lotto_pay" data-json="8">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_10_lotto_com" name="7[10][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_10_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">ปักหลักสิบ</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sminput-sm sl_lotto" id="7_11_lotto_pay" name="7[11][lotto_pay]" onclick="generateSL('8',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
                                                                                        <span class="hidden" id="k_7_11_lotto_pay" data-json="8">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_11_lotto_com" name="7[11][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_11_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">ปักหลักร้อย</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sminput-sm sl_lotto" id="7_12_lotto_pay" name="7[12][lotto_pay]" onclick="generateSL('8',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
                                                                                        <span class="hidden" id="k_7_12_lotto_pay" data-json="8">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto" id="7_12_lotto_com" name="7[12][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_7_12_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="lotto_set" class="tab-pane fade">
                                    <div class="widget-main no-padding">
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-inline pull-left">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" name="lotto_share_active" checked="checked">
                                                        <span class="lbl"> หวยหุ้น </span>
                                                    </label>
                                                </div>
                                                <div class="form-inline pull-right">
                                                    <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('lotto_set');">
                                                        ค่าสูงสุด                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-4 col-md-2">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="8_lotto_share">แบ่งหุ้น :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="clearfix input-group">
                                                        <select class="form-control input-sm sl_lotto_set" id="8_lotto_share" name="8[][lotto_share]" onchange="setKeep('8_lotto_share');" onclick="generateSL('0',this,true);">
                                                            <option value="0">0</option>
                                                        </select>
                                                        <span class="input-group-addon">
                                                            %
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                    <span class="text-danger">oho </span> 
                                                    ยอดเก็บ : <span id="k_8_lotto_share" data-json="0">
                                                            0                                                    </span> %
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="widget-box">
                                                    <div class="widget-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">รายการ</th>
                                                                        <th class="text-center">อัตราจ่าย</th>
                                                                        <th class="text-center">ค่าคอม</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">2 ตัว</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto_set" id="8_0_lotto_pay" name="8[0][lotto_pay]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="hidden" id="k_8_0_lotto_pay" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto_set" id="8_0_lotto_com" name="8[0][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_8_0_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">เลขวิ่ง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                        <select class="form-control sl-width input-sm sl_lotto_set" id="8_2_lotto_pay" name="8[2][lotto_pay]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="hidden" id="k_8_2_lotto_pay" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                        <select class="form-control input-sm sl_lotto_set" id="8_2_lotto_com" name="8[2][lotto_com]" onclick="generateSL('0',this,true);">
                                                                                            <option value="0">0</option>
                                                                                        </select>
                                                                                        <span class="input-group-addon" id="k_8_2_lotto_com" data-json="0">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="lotto_lao" class="tab-pane fade">
                                    <div class="widget-main no-padding">
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-inline pull-left">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" name="lotto_lao_active" checked="checked">
                                                        <span class="lbl"> หวยชุด </span>
                                                    </label>
                                                </div>
                                                <div class="form-inline pull-right">
                                                    <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('lotto_lao');">
                                                        ค่าสูงสุด                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-4 col-md-2">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="9_lotto_share">แบ่งหุ้น :</label>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="clearfix input-group">
                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_lotto_share" name="9[][lotto_share]" onchange="setKeep('9_lotto_share');" onclick="generateSL('0',this,true);">
                                                                <option value="0">0</option>
                                                            </select>
                                                            <span class="input-group-addon">%</span>
                                                                                                            </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                    <span class="text-danger">oho </span> 
                                                                                                            ยอดเก็บ : <span id="k_9_lotto_share" data-json="0">
                                                                0                                                        </span> %
                                                                                                    </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="widget-box">
                                                    <div class="widget-body">
                                                        <?php /* ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">รายการ</th>
                                                                        <th class="text-center">อัตราจ่าย</th>
                                                                        <th class="text-center">ค่าคอม</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">3 ตัวตรง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                                                                                                                    <select class="form-control sl-width input-sm sl_lotto_lao" id="9_0_lotto_pay" name="9[0][lotto_pay]" onclick="generateSL('550',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option><option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option><option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option><option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option><option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option><option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option><option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option><option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option><option value="150">150</option><option value="151">151</option><option value="152">152</option><option value="153">153</option><option value="154">154</option><option value="155">155</option><option value="156">156</option><option value="157">157</option><option value="158">158</option><option value="159">159</option><option value="160">160</option><option value="161">161</option><option value="162">162</option><option value="163">163</option><option value="164">164</option><option value="165">165</option><option value="166">166</option><option value="167">167</option><option value="168">168</option><option value="169">169</option><option value="170">170</option><option value="171">171</option><option value="172">172</option><option value="173">173</option><option value="174">174</option><option value="175">175</option><option value="176">176</option><option value="177">177</option><option value="178">178</option><option value="179">179</option><option value="180">180</option><option value="181">181</option><option value="182">182</option><option value="183">183</option><option value="184">184</option><option value="185">185</option><option value="186">186</option><option value="187">187</option><option value="188">188</option><option value="189">189</option><option value="190">190</option><option value="191">191</option><option value="192">192</option><option value="193">193</option><option value="194">194</option><option value="195">195</option><option value="196">196</option><option value="197">197</option><option value="198">198</option><option value="199">199</option><option value="200">200</option><option value="201">201</option><option value="202">202</option><option value="203">203</option><option value="204">204</option><option value="205">205</option><option value="206">206</option><option value="207">207</option><option value="208">208</option><option value="209">209</option><option value="210">210</option><option value="211">211</option><option value="212">212</option><option value="213">213</option><option value="214">214</option><option value="215">215</option><option value="216">216</option><option value="217">217</option><option value="218">218</option><option value="219">219</option><option value="220">220</option><option value="221">221</option><option value="222">222</option><option value="223">223</option><option value="224">224</option><option value="225">225</option><option value="226">226</option><option value="227">227</option><option value="228">228</option><option value="229">229</option><option value="230">230</option><option value="231">231</option><option value="232">232</option><option value="233">233</option><option value="234">234</option><option value="235">235</option><option value="236">236</option><option value="237">237</option><option value="238">238</option><option value="239">239</option><option value="240">240</option><option value="241">241</option><option value="242">242</option><option value="243">243</option><option value="244">244</option><option value="245">245</option><option value="246">246</option><option value="247">247</option><option value="248">248</option><option value="249">249</option><option value="250">250</option><option value="251">251</option><option value="252">252</option><option value="253">253</option><option value="254">254</option><option value="255">255</option><option value="256">256</option><option value="257">257</option><option value="258">258</option><option value="259">259</option><option value="260">260</option><option value="261">261</option><option value="262">262</option><option value="263">263</option><option value="264">264</option><option value="265">265</option><option value="266">266</option><option value="267">267</option><option value="268">268</option><option value="269">269</option><option value="270">270</option><option value="271">271</option><option value="272">272</option><option value="273">273</option><option value="274">274</option><option value="275">275</option><option value="276">276</option><option value="277">277</option><option value="278">278</option><option value="279">279</option><option value="280">280</option><option value="281">281</option><option value="282">282</option><option value="283">283</option><option value="284">284</option><option value="285">285</option><option value="286">286</option><option value="287">287</option><option value="288">288</option><option value="289">289</option><option value="290">290</option><option value="291">291</option><option value="292">292</option><option value="293">293</option><option value="294">294</option><option value="295">295</option><option value="296">296</option><option value="297">297</option><option value="298">298</option><option value="299">299</option><option value="300">300</option><option value="301">301</option><option value="302">302</option><option value="303">303</option><option value="304">304</option><option value="305">305</option><option value="306">306</option><option value="307">307</option><option value="308">308</option><option value="309">309</option><option value="310">310</option><option value="311">311</option><option value="312">312</option><option value="313">313</option><option value="314">314</option><option value="315">315</option><option value="316">316</option><option value="317">317</option><option value="318">318</option><option value="319">319</option><option value="320">320</option><option value="321">321</option><option value="322">322</option><option value="323">323</option><option value="324">324</option><option value="325">325</option><option value="326">326</option><option value="327">327</option><option value="328">328</option><option value="329">329</option><option value="330">330</option><option value="331">331</option><option value="332">332</option><option value="333">333</option><option value="334">334</option><option value="335">335</option><option value="336">336</option><option value="337">337</option><option value="338">338</option><option value="339">339</option><option value="340">340</option><option value="341">341</option><option value="342">342</option><option value="343">343</option><option value="344">344</option><option value="345">345</option><option value="346">346</option><option value="347">347</option><option value="348">348</option><option value="349">349</option><option value="350">350</option><option value="351">351</option><option value="352">352</option><option value="353">353</option><option value="354">354</option><option value="355">355</option><option value="356">356</option><option value="357">357</option><option value="358">358</option><option value="359">359</option><option value="360">360</option><option value="361">361</option><option value="362">362</option><option value="363">363</option><option value="364">364</option><option value="365">365</option><option value="366">366</option><option value="367">367</option><option value="368">368</option><option value="369">369</option><option value="370">370</option><option value="371">371</option><option value="372">372</option><option value="373">373</option><option value="374">374</option><option value="375">375</option><option value="376">376</option><option value="377">377</option><option value="378">378</option><option value="379">379</option><option value="380">380</option><option value="381">381</option><option value="382">382</option><option value="383">383</option><option value="384">384</option><option value="385">385</option><option value="386">386</option><option value="387">387</option><option value="388">388</option><option value="389">389</option><option value="390">390</option><option value="391">391</option><option value="392">392</option><option value="393">393</option><option value="394">394</option><option value="395">395</option><option value="396">396</option><option value="397">397</option><option value="398">398</option><option value="399">399</option><option value="400">400</option><option value="401">401</option><option value="402">402</option><option value="403">403</option><option value="404">404</option><option value="405">405</option><option value="406">406</option><option value="407">407</option><option value="408">408</option><option value="409">409</option><option value="410">410</option><option value="411">411</option><option value="412">412</option><option value="413">413</option><option value="414">414</option><option value="415">415</option><option value="416">416</option><option value="417">417</option><option value="418">418</option><option value="419">419</option><option value="420">420</option><option value="421">421</option><option value="422">422</option><option value="423">423</option><option value="424">424</option><option value="425">425</option><option value="426">426</option><option value="427">427</option><option value="428">428</option><option value="429">429</option><option value="430">430</option><option value="431">431</option><option value="432">432</option><option value="433">433</option><option value="434">434</option><option value="435">435</option><option value="436">436</option><option value="437">437</option><option value="438">438</option><option value="439">439</option><option value="440">440</option><option value="441">441</option><option value="442">442</option><option value="443">443</option><option value="444">444</option><option value="445">445</option><option value="446">446</option><option value="447">447</option><option value="448">448</option><option value="449">449</option><option value="450">450</option><option value="451">451</option><option value="452">452</option><option value="453">453</option><option value="454">454</option><option value="455">455</option><option value="456">456</option><option value="457">457</option><option value="458">458</option><option value="459">459</option><option value="460">460</option><option value="461">461</option><option value="462">462</option><option value="463">463</option><option value="464">464</option><option value="465">465</option><option value="466">466</option><option value="467">467</option><option value="468">468</option><option value="469">469</option><option value="470">470</option><option value="471">471</option><option value="472">472</option><option value="473">473</option><option value="474">474</option><option value="475">475</option><option value="476">476</option><option value="477">477</option><option value="478">478</option><option value="479">479</option><option value="480">480</option><option value="481">481</option><option value="482">482</option><option value="483">483</option><option value="484">484</option><option value="485">485</option><option value="486">486</option><option value="487">487</option><option value="488">488</option><option value="489">489</option><option value="490">490</option><option value="491">491</option><option value="492">492</option><option value="493">493</option><option value="494">494</option><option value="495">495</option><option value="496">496</option><option value="497">497</option><option value="498">498</option><option value="499">499</option><option value="500">500</option><option value="501">501</option><option value="502">502</option><option value="503">503</option><option value="504">504</option><option value="505">505</option><option value="506">506</option><option value="507">507</option><option value="508">508</option><option value="509">509</option><option value="510">510</option><option value="511">511</option><option value="512">512</option><option value="513">513</option><option value="514">514</option><option value="515">515</option><option value="516">516</option><option value="517">517</option><option value="518">518</option><option value="519">519</option><option value="520">520</option><option value="521">521</option><option value="522">522</option><option value="523">523</option><option value="524">524</option><option value="525">525</option><option value="526">526</option><option value="527">527</option><option value="528">528</option><option value="529">529</option><option value="530">530</option><option value="531">531</option><option value="532">532</option><option value="533">533</option><option value="534">534</option><option value="535">535</option><option value="536">536</option><option value="537">537</option><option value="538">538</option><option value="539">539</option><option value="540">540</option><option value="541">541</option><option value="542">542</option><option value="543">543</option><option value="544">544</option><option value="545">545</option><option value="546">546</option><option value="547">547</option><option value="548">548</option><option value="549">549</option><option value="550">550</option></select>
                                                                                            <span class="hidden" id="k_9_0_lotto_pay" data-json="550">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_0_lotto_com" name="9[0][lotto_com]" onclick="generateSL('33',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option></select>
                                                                                            <span class="input-group-addon" id="k_9_0_lotto_com" data-json="33">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">3 ตัวโต๊ด</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                                                                                                                    <select class="form-control sl-width input-sm sl_lotto_lao" id="9_1_lotto_pay" name="9[1][lotto_pay]" onclick="generateSL('105',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option></select>
                                                                                            <span class="hidden" id="k_9_1_lotto_pay" data-json="105">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_1_lotto_com" name="9[1][lotto_com]" onclick="generateSL('33',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option></select>
                                                                                            <span class="input-group-addon" id="k_9_1_lotto_com" data-json="33">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">2 ตัวตรง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                                                                                                                    <select class="form-control sl-width input-sm sl_lotto_lao" id="9_2_lotto_pay" name="9[2][lotto_pay]" onclick="generateSL('70',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option></select>
                                                                                            <span class="hidden" id="k_9_2_lotto_pay" data-json="70">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_2_lotto_com" name="9[2][lotto_com]" onclick="generateSL('28',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option></select>
                                                                                            <span class="input-group-addon" id="k_9_2_lotto_com" data-json="28">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">2 ตัวโต๊ด</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                                                                                                                    <select class="form-control sl-width input-sm sl_lotto_lao" id="9_3_lotto_pay" name="9[3][lotto_pay]" onclick="generateSL('12',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
                                                                                            <span class="hidden" id="k_9_3_lotto_pay" data-json="12">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_3_lotto_com" name="9[3][lotto_com]" onclick="generateSL('28',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option></select>
                                                                                            <span class="input-group-addon" id="k_9_3_lotto_com" data-json="28">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                    </tbody>
                                                            </table>
                                                        </div>*/;?>

                                                        <?php 

                                                            $lot_type= array(1 =>"4 ตัวตรง", 2 =>"4 ตัวโต๊ด", 3 =>"3 ตัวตรง(หลัง)", 4 =>"3 ตัวหน้าตรง", 5 =>"3 ตัวโต๊ด(หลัง)", 6 =>"2 ตัวหน้า(2ล่าง)", 7 =>"2 ตัวตรง");
                                                         ?>

                                                        <div class="table-responsive">
                                                                <table class="table table-striped table-bordered table-hover" style="width: 99.9%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center">รายการ</th>
                                                                            <th class="text-center">รางวัล , 0=ปิด</th>
                                                                            <th class="text-center">ราคาส่ง</th>
                                                                        </tr>
                                                                    </thead>

                                                                     <tbody>

                                                                        <?php 
                                                                            foreach ($lot_type as $key => $value) {
                                                                                
                                                                           
                                                                         ?>
                                                                             <tr class="text-center">
                                                                                    <td width="35%"><?=$value;?></td>
                                                                                    <td width="35%" class="lotto_lao_Input">
                                                                                        <input type="text" name="lot_hun_set_pay<?=$key;?>" id="" class="numeric maxLimit" value="50,000">
                                                                                        <span class="text-danger label-sm maxtransfer" id="lot_hun_set_pay_info" data-json="50,000">(0-50,000) </span>
                                                                                    </td>

                                                                                    <?php if($key == 1){ ?>
                                                                                    <td width="35%" rowspan="100%" style="vertical-align: top;" class="lotto_lao_Input">
                                                                                        <input type="text" name="lot_hun_set_price<?=$key;?>" id="" class="numeric maxLimit" value="50,000">
                                                                                        <span class="text-danger label-sm maxtransfer" id="lot_hun_set_price_info" data-json="50,000">(0- 50,000) </span>
                                                                                    </td>

                                                                                    <?php } ?>
                                                                             </tr>

                                                                             <?php 
                                                                             }
                                                                              ?>
                                                                     </tbody>
                                                                </table>

                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php /* ?>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="widget-box">
                                                    <div class="widget-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">รายการ</th>
                                                                        <th class="text-center">อัตราจ่าย</th>
                                                                        <th class="text-center">ค่าคอม</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">1 ตัววิ่ง</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                                                                                                                                                                                                                    <select class="form-control sl-width input-sm sl_lotto_lao" id="9_4_lotto_pay" name="9[4][lotto_pay]" onclick="generateSL('3',this,true);">
                                                                                                    <option value="0">0</option>
                                                                                                <option value="1">1</option><option value="2">2</option><option value="3">3</option></select>
                                                                                                <span class="hidden" id="k_9_4_lotto_pay" data-json="3">%</span>
                                                                                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_4_lotto_com" name="9[4][lotto_com]" onclick="generateSL('12',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
                                                                                            <span class="input-group-addon" id="k_9_4_lotto_com" data-json="12">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">สูง-ต่ำ</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                                                                                                                                                                                                                    <select class="form-control sl-width input-sm sl_lotto_lao" id="9_5_lotto_pay" name="9[5][lotto_pay]" onclick="generateSL3('0.00',this);">
                                                                                                    <option value="0.00">0.00</option>
                                                                                                </select>
                                                                                                <span class="hidden" id="k_9_5_lotto_pay" data-json="0.00">%</span>
                                                                                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_5_lotto_com" name="9[5][lotto_com]" onclick="generateSL('3',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option></select>
                                                                                            <span class="input-group-addon" id="k_9_5_lotto_com" data-json="3">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                            <tr class="text-center">
                                                                            <td width="35%">คู่-คี่</td>
                                                                            <td width="30%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix">
                                                                                                                                                                                                                                                                                    <select class="form-control sl-width input-sm sl_lotto_lao" id="9_6_lotto_pay" name="9[6][lotto_pay]" onclick="generateSL3('0.00',this);">
                                                                                                    <option value="0.00">0.00</option>
                                                                                                </select>
                                                                                                <span class="hidden" id="k_9_6_lotto_pay" data-json="0.00">%</span>
                                                                                                                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td width="35%">
                                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                    <div class="clearfix  input-group">
                                                                                                                                                                                    <select class="form-control input-sm sl_lotto_lao" id="9_6_lotto_com" name="9[6][lotto_com]" onclick="generateSL('3',this,true);">
                                                                                                <option value="0">0</option>
                                                                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option></select>
                                                                                            <span class="input-group-addon" id="k_9_6_lotto_com" data-json="3">%</span>
                                                                                                                                                                            </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>*/;?>
                                        </div>
                                    </div>
                                </div>
                                <div id="lottery" class="tab-pane fade">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-inline pull-left">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" name="lottery_active" checked="checked">
                                                    <span class="lbl"> ล็อตเตอร์รี่ </span>
                                                </label>
                                            </div>
                                            <div class="form-inline pull-right">
                                                <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('lottery');">
                                                    ค่าสูงสุด                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-8 col-sm-6 col-md-4">
                                            <label class="control-label col-xs-6 col-sm-4 col-md-6 no-padding-right" for="6_0_lotto_com">ค่าคอม :</label>
                                            <div class="col-xs-6 col-sm-8 col-md-6">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm sl_lottery" id="6_0_lotto_com" name="6[][lotto_com]" onclick="generateSL('0',this,true);">
                                                        <option value="0">0</option>
                                                    </select>
                                                    <span class="input-group-addon" id="k_6_0_lotto_com" data-json="0">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game" class="tab-pane fade">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-inline pull-left">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" name="game_active" checked="checked">
                                                    <span class="lbl"> เกมส์ </span>
                                                </label>
                                            </div>
                                            <div class="form-inline pull-right">
                                                <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('game');">
                                                    ค่าสูงสุด                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="game_share">แบ่งหุ้น :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm sl_game" id="game_share" name="game_share" onchange="setKeep('game_share');" onclick="generateSL('60',this,true);">
                                                        <option value="0">0</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option></select>
                                                    <span class="input-group-addon">
                                                        %
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right">
                                                <span class="text-danger">oho </span> 
                                                ยอดเก็บ : <span id="k_game_share" data-json="60">
                                                        60                                                </span> %
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                            <label class="control-label col-xs-12 col-sm-6 col-md-6 no-padding-right" for="game_com">ค่าคอม :</label>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm sl_game" id="game_com" name="game_com" onclick="generateSL2('0.30',this);">
                                                        <option value="0.00">0.00</option>
                                                    <option value="0.05">0.05</option><option value="0.10">0.10</option><option value="0.15">0.15</option><option value="0.20">0.20</option><option value="0.25">0.25</option><option value="0.30">0.30</option></select>
                                                    <span class="input-group-addon" id="k_game_com" data-json="0.30">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-toolbox text-center clearfix" id="small-manage-btn">
                        <button type="button" class="btn btn-success btn-xs" onclick="saveAgent();">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            บันทึก                        </button>
                        <button type="reset" class="btn btn-danger  btn-xs" onclick="btn_reset();">
                            <span class="fa fa-refresh icon-on-right bigger-110"></span>
                            ล้างค่า                        </button>
                    </div>
                </div>
            </div></form>
        
    </div>
</div>
<script src="assets/js/selectize.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.numeric').autoNumeric();
        
        utab('soccer');
        utab('sport');
        utab('step');
        utab('casino');
        utab('lotto');
        utab('lotto_set');
        utab('lotto_lao');
        utab('lottery');
        utab('game');
    });

    function utab(id){
        $('.sl_'+id).click();
    }

    function generateSL(v,tag,plus){
        var select = document.getElementById(tag.id);
        if(select.length == 1){
            if(plus){
                for(var i = 1 ; i <= v; i++){
                    var opt = document.createElement('option');
                    opt.value = i;
                    opt.innerHTML = i;
                    select.appendChild(opt);
                }
            }else{
                for(var i = v ; i >= 0; i--){
                    var opt = document.createElement('option');
                    opt.value = i;
                    opt.innerHTML = i;
                    select.appendChild(opt);
                }
            }
        }
    }

    function generateSL2(v,tag){
        var select = document.getElementById(tag.id);
        if(select.length == 1){
            for(var i = 0.05 ; parseFloat(i).toFixed(2) <= parseFloat(v).toFixed(2); i = i+ 0.05){
                var opt = document.createElement('option');
                opt.value = i.toFixed(2);
                opt.innerHTML = i.toFixed(2);
                select.appendChild(opt);
            }
        }
    }

    function generateSL3(v,tag){
        var select = document.getElementById(tag.id);
        if(select.length == 1){
            for(var i = 0.01; parseFloat(i).toFixed(2) <= parseFloat(v).toFixed(2); i = i+ 0.01){
                var opt = document.createElement('option');
                opt.value = i.toFixed(2);
                opt.innerHTML = i.toFixed(2);
                select.appendChild(opt);
            }
        }
    }

    function saveAgent(){
        var serializeFrm = $("#createAgent_form").serializeArray();

        $.ajax({
            url: 'memberAgent/save.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
                if(response.status){
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-success'
                    });
                    getMenu('memberAgent');
                }else{
                    var err = response.msg;
                    // jQuery.each(response.msg, function(i, val) {
                    //     err += '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+val+'</h5>';
                    // });
                    $.gritter.add({
                        title: "",
                        text: err,
                        class_name: 'gritter-error'
                    });
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function setMaxAll(){
        var list = ['soccer','sport','step','casino','lotto','lotto_set','lotto_lao','lottery','game'];
        // $('#credit').val($('#max_credit').data('json'));
        $.each(list,function(k,v){
            setMax(v);
        });
    }

    function setMax(game){
        switch (game){
            case 'soccer' :
                $('#today_share').val($('#k_today_share').data('json'));
                $('#live_share').val($('#k_live_share').data('json')); 
                $('#today_com').val($('#k_today_com').data('json')); 

                // $('#torup').val($('#k_torup').data('json'));    
                // $('#logup').val($('#k_logup').data('json')); 
                $('#live_betmoneymax_pair').val($('#k_live_betmoneymax_pair').data('json'));    
                $('#live_betmax_money').val($('#k_live_betmax_money').data('json'));    
                $('#live_betmin_money').val($('#k_live_betmin_money').data('json'));    
                $('#live_fbetmoneymax_pair').val($('#k_live_fbetmoneymax_pair').data('json'));    
                $('#live_fbetmax_money').val($('#k_live_fbetmax_money').data('json'));    
                $('#live_fbetmin_money').val($('#k_live_fbetmin_money').data('json'));     

                $('#k_today_share').text(0);    
                $('#k_live_share').text(0);    
            break;

            case 'sport' :
                $('#sporttoday_share').val($('#k_sporttoday_share').data('json'));
                $('#sportlive_share').val($('#k_sportlive_share').data('json')); 
                $('#sport_com').val($('#k_sport_com').data('json')); 

                $('#sport_betmoneymax_pair').val($('#k_sport_betmoneymax_pair').data('json'));   
                $('#sport_betmax_money').val($('#k_sport_betmax_money').data('json'));   
                $('#sport_betmin_money').val($('#k_sport_betmin_money').data('json'));   

                $('#k_sporttoday_share').text(0);    
                $('#k_sportlive_share').text(0);    
            break;

            case 'step' :
                $('#step_share').val($('#k_step_share').data('json'));
                $('#stepcom1').val($('#k_stepcom1').data('json'));
                $('#stepcom2').val($('#k_stepcom2').data('json')); 
                $('#stepcom3').val($('#k_stepcom3').data('json')); 
                $('#stepcom5').val($('#k_stepcom5').data('json')); 
                $('#stepcom7').val($('#k_stepcom7').data('json')); 
                $('#stepcom9').val($('#k_stepcom9').data('json')); 
                $('#stepcom11').val($('#k_stepcom11').data('json')); 

                $('#step_betmax_money').val($('#k_step_betmax_money').data('json')); 
                $('#step_betmin_money').val($('#k_step_betmin_money').data('json')); 
                $('#step_daymax_money').val($('#k_step_daymax_money').data('json')); 
                $('#step_billmax_money').val($('#k_step_billmax_money').data('json')); 
                $('#step_max_pair').val($('#k_step_max_pair').data('json')); 
                $('#step_min_pair').val($('#k_step_min_pair').data('json')); 

                $('#k_step_share').text(0);     
            break;

            // case 'casino' :
            //     $('#casino_share').val($('#k_casino_share').data('json'));
            //     $('#casino_com').val($('#k_casino_com').data('json')); 

            //     $('#party_share').val($('#k_party_share').data('json'));
            //     $('#party_com').val($('#k_party_com').data('json')); 
            //     $('#party_maxtransfer').val($('#k_party_maxtransfer').data('json')); 

            //     $('#vivo_share').val($('#k_vivo_share').data('json'));
            //     $('#vivo_com').val($('#k_vivo_com').data('json')); 

            //     $('#allbet_share').val($('#k_allbet_share').data('json'));
            //     $('#allbet_com').val($('#k_allbet_com').data('json')); 
            //     $('#allbet_maxtransfer').val($('#k_allbet_maxtransfer').data('json'));  

            //     $('#fg_share').val($('#k_fg_share').data('json'));
            //     $('#tgp_share').val($('#k_tgp_share').data('json'));
            //     $('#rcb_share').val($('#k_rcb_share').data('json'));


            //     $('#k_casino_share').text(0);    
            //     $('#k_party_share').text(0); 
            //     $('#k_vivo_share').text(0);    
            //     $('#k_allbet_share').text(0);  

            //     $('#k_fg_share').text(0);    
            //     $('#k_tgp_share').text(0);    
            //     $('#k_rcb_share').text(0);    
            // break;

            case 'casino' :
                // $('#casino_com').val($('#k_casino_com').data('json')); 

                // $('#party_com').val($('#k_party_com').data('json')); 
                // $('#party_maxtransfer').val($('#k_party_maxtransfer').data('json')); 

                // $('#vivo_com').val($('#k_vivo_com').data('json')); 

                // $('#allbet_com').val($('#k_allbet_com').data('json'));  
                // $('#allbet_maxtransfer').val($('#k_allbet_maxtransfer').data('json'));  

                $( "#casino .maxLimit" ).each(function() {
                  var data = $( this ).closest('.casino_Input').children('.maxtransfer').data('json')
                    $( this ).val(data);
                    // console.log(data);
                });    

                $( "#casino .casino_select .sl_casino" ).each(function() {
                  // var data = $( this ).closest('.casino_share').children('.casino_share_data').hide()
                    // $( this ).val(data);
                     var data = $(this).closest('.casino_select').children('span.sl_data').data('json')

                     // .attr("data-json")
                     // .data('json')
                     $( this ).val(data);
                    console.log(data)
                    
                    // console.log(data);
                });    
            break;

            case 'lotto' :

                $('#7_lotto_share').val($('#k_7_lotto_share').data('json')); 

                for (var i = 0; i <= 12; i++){
                    $('#7_'+i+'_lotto_pay').val($('#k_7_'+i+'_lotto_pay').data('json'));
                    $('#7_'+i+'_lotto_com').val($('#k_7_'+i+'_lotto_com').data('json')); 
                }

                $('#k_7_lotto_share').text(0);    

            break;

            case 'lotto_set' :

                $('#8_lotto_share').val($('#k_8_lotto_share').data('json')); 

                for (var i = 0; i <= 7; i++){
                    $('#8_'+i+'_lotto_pay').val($('#k_8_'+i+'_lotto_pay').data('json'));
                    $('#8_'+i+'_lotto_com').val($('#k_8_'+i+'_lotto_com').data('json')); 
                }

                $('#k_8_lotto_share').text(0);    

            break;

            case 'lotto_lao' :

                // if($('input[name="lotto_lao_active"').is(':checked')){
                    
                //     $('#9_lotto_share').val($('#k_9_lotto_share').data('json')); 

                //     for (var i = 0; i <= 6; i++){
                //         $('#9_'+i+'_lotto_pay').val($('#k_9_'+i+'_lotto_pay').data('json'));
                //         $('#9_'+i+'_lotto_com').val($('#k_9_'+i+'_lotto_com').data('json')); 
                //     }
                // }

                // $('#k_9_lotto_share').text(0); 

                $( "#lotto_lao .maxLimit" ).each(function() {
                  var data = $( this ).closest('.lotto_lao_Input').children('.maxtransfer').data('json')
                    $( this ).val(data);
                });      

            break;

            case 'lottery' :

                $('#6_0_lotto_com').val($('#k_6_0_lotto_com').data('json')); 

            break;

            case 'game' :

                $('#game_share').val($('#k_game_share').data('json')); 
                $('#game_com').val($('#k_game_com').data('json')); 

                $('#k_game_share').text(0);    
            break;
        }
    }

    function setKeep(id){
        var diff = 0;
        var share = $('#'+id).val();
        var keep  = $('#k_'+id).data('json'); 
        diff = keep - share;

        $('#k_'+id).text(diff);
    }

    function btn_reset(){
        $('#k_today_share').text($('#k_today_share').data('json'));    
        $('#k_live_share').text($('#k_live_share').data('json'));    

        $('#k_sporttoday_share').text($('#k_sporttoday_share').data('json'));    
        $('#k_sportlive_share').text($('#k_sportlive_share').data('json'));

        $('#k_step_share').text($('#k_step_share').data('json'));

        $('#k_casino_share').text($('#k_casino_share').data('json'));    
        $('#k_party_share').text($('#k_party_share').data('json')); 
        $('#k_vivo_share').text($('#k_vivo_share').data('json'));    
        $('#k_allbet_share').text($('#k_allbet_share').data('json'));

        $('#k_fg_share').text($('#k_fg_share').data('json'));
        $('#k_tgp_share').text($('#k_tgp_share').data('json'));
        $('#k_rcb_share').text($('#k_rcb_share').data('json'));

        $('#k_7_lotto_share').text($('#k_7_lotto_share').data('json'));        

        $('#k_9_lotto_share').text($('#k_9_lotto_share').data('json'));    

        $('#k_8_lotto_share').text($('#k_8_lotto_share').data('json'));            

        $('#k_game_share').text($('#k_game_share').data('json'));    
    }

    function regisCopyUser(){

        $.ajax({
            url: 'memberAgent/copyUser.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                bootbox.dialog({
                    message:response.result,
                    buttons:            
                    {
                        
                        "UserList" :
                        {
                            "label" : "<i class=\"ace-icon fa fa-list-ul bigger-110\"></i> <span class=\"normal\">รายชื่อสมาชิก</span>",
                            "className" : "btn btn-sm btn-inverse pull-left",
                            "callback": function(e) {
                                getMenu('userList');
                            }
                        },
                        "OK" :
                        {
                            "label" : "<i class='fa fa-floppy-o'></i> <span class=\"normal\">คัดลอกผู้ใช้</span>",
                            "className" : "btn-sm btn-success",
                            "callback": function(e) {
                                $.ajax({
                                    url: 'memberUserList/saveCopyUser.php',
                                    data: { 

                                        _token : $('input[name="_token"]').val(),
                                        olduser : $('#select-user').val(),
                                        newuser: $('input[name="regis_usernameCopy"]').val(),
                                        pass: $('input[name="regis_password"]').val(),
                                        credit: $('input[name="regis_credit"]').val(),
                                        name: $('input[name="regis_name"]').val(),
                                        telephone: $('input[name="regis_tel"]').val()
                                     },
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function (response) {

                                        if(response.status =='success'){

                                            dialogSuccess(response.msg);
                                            $("#search").click();
                                            
                                        }else{
                                            dialogError(response.msg);
                                        }
                                    },
                                    error: function (response) {
                                        console.log(response);
                                    }
                                });
                            }
                        },
                        "NO" :
                        {
                            "label" : "<i class='ace-icon glyphicon glyphicon-log-in'></i> <span class=\"normal\">ปิด</span>",
                            "className" : "btn-sm btn-primary"
                        }
                    }
                });
            }
        });
    }

</script></div>