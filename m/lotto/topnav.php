

<div class="app-top-nav app-top-nav-h m_bg_gd">
  <div class="px-3 d-flex align-items-center h-100">
    <div>
      <table class="top-nav-table text-white w-100">
        <tr>
          <td class="w-25">
            <label for="side-nav-toggle" class="side-nav-toggle m-0">
              <input type="checkbox" id="side-nav-toggle" />
              <span class="checkmark"><i class="fa fa-list"></i></span>
            </label>
          </td>

          <td class="text-center">
            <h3 class="m-0"><?=$_SESSION['m_user'];?></h3>
          </td>

          <td class="w-25">
            <div class="home-button ml-auto"></div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>

<nav class="app-side-nav m_bg">
  <div class="app-top-nav-h d-flex align-items-center">
    <label for="side-nav-toggle" class="side-nav-toggle mr-3 ml-auto my-0 text-white d-block">
      <span class="checkmark"><i class="fa fa-list"></i></span>
    </label>
  </div>
  

  <hr class="mt-0">
  
  <h5 class="text-center text-white position-relative">
    <span><?=$lang_member[2186];?></span>
    <button id="updateCredit" onclick="UpdateUserCredit();"><img src="assets/img/ui/icon_refresh_mem.png" alt="refresh" class="w-100 d-block"></button>
  </h5>
  <div>
    <div class="px-3">
      <table class="w-100 text-white">
        <tr>
          <td><span><?=$lang_member[95];?></span></td>
          <td class="text-right text-primary"><span id="betcre"></span> <span class="text-white txt-currency"></span></td>
        </tr>

        <tr>
          <td><span><?=$lang_member[53];?></span></td>
          <td class="text-right text-danger"><span id="cre"></span> <span class="text-white txt-currency"></span></td>
        </tr>

        <tr>
          <td><span><?=$lang_member[97];?></span></td>
          <td class="text-right text-success"><span id="wincre"></span> <span class="text-white txt-currency"></span></td>
        </tr>
      </table>
    </div>
    

    <hr class="mb-0">

    <a href="javascript:void(0); OnSelectPage('zone')"        class="side-nav-menu text-white d-block p-2 i-nav zone">
      <img src="assets/img/ui/ic_menu_zone.png" /><span><?=$lang_member[2189];?></span>
    </a>
    <hr class="m-0">

    <a href="javascript:void(0); OnSelectPage('pay')"         class="side-nav-menu text-white d-block p-2 i-nav pay">
      <img src="assets/img/ui/ic_menu_payrate.png" /><span><?=$lang_member[580];?></span>
    </a>
    <hr class="m-0">

    <a href="javascript:void(0); OnSelectPage('full')"        class="side-nav-menu text-white d-block p-2 i-nav full">
      <img src="assets/img/ui/ic_menu_lotfull.png" /><span><?=$lang_member[414];?></span>
    </a>
    <hr class="m-0">

    <a href="javascript:void(0); OnSelectPage('result')"      class="side-nav-menu text-white d-block p-2 i-nav result">
      <img src="assets/img/ui/ic_menu_win.png" /><span><?=$lang_member[50];?></span>
    </a>
    <hr class="m-0">

    <a href="javascript:void(0); OnSelectPage('news')"        class="side-nav-menu text-white d-block p-2 i-nav news">
      <img src="assets/img/ui/ic_menu_news.png" /><span><?=$lang_member[441];?></span>
    </a>
    <hr class="m-0">

    <a href="javascript:void(0); OnSelectPage('changepwd')"   class="side-nav-menu text-white d-block p-2 i-nav changepwd">
      <img src="assets/img/ui/ic_menu_newpass.png" /><span><?=$lang_member[45];?></span>
    </a>
    <hr class="m-0">

    <a href="javascript:void(0); OnSelectPage('changelang')"  class="side-nav-menu text-white d-block p-2 i-nav changelang">
      <img src="assets/img/ui/ic_menu_lang.png" /><span><?=$lang_member[2345];?></span>
    </a>
    <hr class="m-0">

    <a href="javascript:void(0); OnSelectPage('transfer')"  class="side-nav-menu text-white d-block p-2 i-nav transfer">
      <img src="assets/img/ui/ic_menu_depwith.png" /><span><?=$lang_member[39];?></span>
    </a>
    <hr class="m-0">

    <a href="logout.php"                                      class="side-nav-menu text-white d-block p-2">
     <img src="assets/img/ui/ic_menu_logout.png" /> <span><?=$lang_member[46];?></span>
    </a>
    <hr class="m-0">

  </div>
</nav>

<form action="process/get_credit.php" method="get" class="auto-form" id="form_credit" data-onsuccess="UpdateUserCreditCallback" data-oninit="UpdateUserCreditBegin" data-oncomplete="UpdateUserCreditEnd">
  <fieldset>
    <input type="hidden" name="lang" value="<?=$lang;?>" />
  </fieldset>
</form>