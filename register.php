<?php 
  include("head.php");
?>

<style>

  @font-face {
      font-family: 'supermarket';
      src: url('newLogin/fonts/supermarket.woff2') format('woff2'),
          url('newLogin/fonts/supermarket.woff') format('woff');
      font-weight: normal;
      font-style: normal;
  }


  .div-block-5
  {
    position: relative;
  }

  .div-block-5 form
  {
    position: absolute;
    top: 225px;
    left: 45%;
    color: #ffffff;
    width: 385px;
  }

  .div-block-5 form label
  {
    font-size: 17px;
  }
  .div-block-5 form input , .div-block-5 form select
  {
      margin-bottom: 5px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #ababab;
      width: 100%;
      padding: 10px;
      color: #ccc;
      font-family: 'supermarket';
  }


  .div-block-5 form select option {
    color: #333;
  }

  .div-block-5 form input:focus  , .div-block-5 form select:focus{
    outline: none;
  }

  .div-block-5 form input::-webkit-input-placeholder { /* Edge */
      color: #ccc;
    }
    
    .div-block-5 form input:-ms-input-placeholder { /* Internet Explorer 10-11 */
       color: #ccc;
    }
    
    .div-block-5 form input::placeholder {
       color: #ccc;
    }

    .div-block-5 form button
    {
      bottom: 0;
      margin-top: 30px;
      width: 190px;
      background-image: url(newLogin/images/regis_button.png);
      background-position: center;
      background-size: cover;
      height: 40px;
      transition-duration: .3s;
      box-shadow: 0px 3px 7px 0px #06060680;
      border-radius: 5px;
      font-family: 'supermarket';
      font-size: 20px;
    }

    .div-block-5 form button:hover
    {
      background-image: url(newLogin/images/regis_button_at.png);
    }
    

    .image-8 {
    width: auto;
    height: auto;
    margin-top: -80px;
  }

  
 </style>


  <div class="section"></div>
  <div class="sec2"></div>
  <div class="sec3">
    <div class="div-block-5"><img src="newLogin/images/register-bar.png" srcset="newLogin/images/register-bar.png 500w, newLogin/images/register-bar.png 781w" sizes="(max-width: 767px) 100vw, 980.0000610351562px" alt="" class="image-7"><img src="newLogin/images/girl-1.png" srcset="newLogin/images/girl-1.png 500w, newLogin/images/girl-1.png 800w, newLogin/images/girl-1.png 1080w, newLogin/images/girl-1.png 1153w" sizes="100vw" alt="" class="image-8">

       <form action="">
            <label for="username">User Name</label>
            <input type="text" name="username" placeholder="ชื่อผู้ใช้" autocomplete="off">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="รหัสผ่าน" autocomplete="off">
            <label for="phone" >Phone nomber</label>
            <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" autocomplete="off">
            <label for="bank_name">Blank name</label>
            <select name="bank_name" id="bank_name">
              <?php 
                foreach ($ab_bank as $key => $value) {
                  ?>
                    <option value="<?=$key;?>"><?=$value;?></option>
                  <?
                }

               ?>
            </select>
            <label for="bank_code">Blank number</label>
            <input type="text" name="bank_code" placeholder="เลขบัญชี" autocomplete="off">

            <button type="button" id="regis_submit"> สมัครสมาชิก </button>
            <button type="cancel" id="cancel_submit"> รีเซ็ต </button>
       </form> 

    </div>
    <div class="div-block-6"></div>
  </div>
<?php 
  include("footer.php");
?> 