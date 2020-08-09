<?php
  session_start();
  if(isset($_SESSION["manage_language"]) == null){
    header('Location:login.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/language.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Manage_Language</title>
  </head>
  <body class="bg-light">
    <nav id="login" class="site-header sticky-top py-1">
      <div class="container d-flex flex-row justify-content-between">
        <a class="py-2 text-dark" href="index.php">
          <img src="assets/img/language.png" width="36" height="36">
          <label class="text-light font-weight-bolder pl-3">Manage Language</label>
        </a>
        <a class="mt-2" v-on:click="logout()">
          <img src="assets/img/logout.png" width="36" height="36">
        </a>
      </div>
    </nav>
    <div id="myapp" class="container-fluid mt-5">
      <div class="row">
        <div class="col-sm">
          <div class="">
            <a href="rule.php?lg=th&ty=football&n=กฏกติกากีฬา" target="_blank" class="btn btn-outline-success">กฏกติกากีฬา</a> 
            <a href="rule.php?lg=th&ty=lotto&n=กฏกติกาหวย" target="_blank" class="btn btn-outline-success">กฏกติกาหวย</a> 
            <a href="rule.php?lg=th&ty=hun&n=กฏกติกาหวยหุ้น" target="_blank" class="btn btn-outline-success">กฏกติกาหวยหุ้น</a> 
            <a href="rule.php?lg=th&ty=games&n=กฏกติกาเกมส์" target="_blank" class="btn btn-outline-success">กฏกติกาเกมส์</a> 
            <a href="rule.php?lg=th&ty=casino&n=กฏกติกาคาสิโน" target="_blank" class="btn btn-outline-success">กฏกติกาคาสิโน</a> 
            <a href="rule.php?lg=th&ty=transfer&n=กฏกติกาฝาก-ถอน" target="_blank" class="btn btn-outline-success">กฏกติกาฝาก-ถอน</a> 
            <a href="rule.php?lg=th&ty=affiliate&n=กฏกติกาแนะนำเพื่อน" target="_blank" class="btn btn-outline-success">กฏกติกาแนะนำเพื่อน</a> 
          </div>

          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">en</span>
            </div>
            <input v-model="en" type="text" class="form-control" placeholder="en" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">th</span>
            </div>
            <input v-model="th" ref="th" type="text" class="form-control" placeholder="th" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">jp</span>
            </div>
            <input v-model="jp" type="text" class="form-control" placeholder="jp" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">ko</span>
            </div>
            <input v-model="ko" type="text" class="form-control" placeholder="ko" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">cn</span>
            </div>
            <input v-model="cn" type="text" class="form-control" placeholder="cn" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">vn</span>
            </div>
            <input v-model="vn" type="text" class="form-control" placeholder="vn" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">id</span>
            </div>
            <input v-model="id" type="text" class="form-control" placeholder="id" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">mm</span>
            </div>
            <input v-model="mm" type="text" class="form-control" placeholder="mm" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">km</span>
            </div>
            <input v-model="km" type="text" class="form-control" placeholder="km" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">la</span>
            </div>
            <input v-model="la" type="text" class="form-control" placeholder="la" aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-sm">
          <select v-model="type" ref="ref_type" class="custom-select">
            <option value="1">member</option>
            <option value="2">ag</option>
          </select>
        </div>
        <div class="col-sm">
          <input type="hidden" v-model="lang_id" value="">
          <button v-if="test != true" v-on:click="insert()" type="button" class="btn btn-outline-success">save</button>
          <button v-else v-on:click="update()" type="button" class="btn btn-outline-success">save</button>
        </div>
      </div>
      <div class="container-fluid mt-3 mb-3">
        <div class="row">
          <div class="">
            <input v-model="checked1" type="checkbox" value="true">
            <label class="mr-2">en</label>
            <input v-model="checked2" type="checkbox" value="true">
            <label class="mr-2">th</label>
            <input v-model="checked3" type="checkbox" value="true">
            <label class="mr-2">jp</label>
            <input v-model="checked4" type="checkbox" value="true">
            <label class="mr-2">ko</label>
            <input v-model="checked5" type="checkbox" value="true">
            <label class="mr-2">cn</label>
            <input v-model="checked6" type="checkbox" value="true">
            <label class="mr-2">vn</label>
            <input v-model="checked7" type="checkbox" value="true">
            <label class="mr-2">id</label>
            <input v-model="checked8" type="checkbox" value="true">
            <label class="mr-2">mm</label>
            <input v-model="checked9" type="checkbox" value="true">
            <label class="mr-2">km</label>
            <input v-model="checked10" type="checkbox" value="true">
            <label class="mr-2">la</label>
          </div>
          <div class="col"></div>
          <div>
            <button v-on:click="exportPHP('member')" type="button" class="btn btn-sm btn-outline-dark">Export member</button>        
            <button v-on:click="exportPHP('ag')" type="button" class="btn btn-sm btn-outline-dark">Export ag</button>        
          </div>
        </div>
      </div>
      <div class="container row my-3">
        <div class="row mr-3">
          <div class="col">
            <input v-model="searchKey" type="text" class="form-control" placeholder="Search">
          </div>
        </div>
        <!-- <div class="">
          <select v-model="selectType" class="custom-select" v-on:click="selectTypes()">
            <option value="0">All</option>
            <option value="1">Member</option>
            <option value="2">Ag</option>
          </select>
        </div> -->
      </div>
      <div class="table-responsive">
        <table id="data_table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th v-if="checked1 === true">en</th>
              <th v-if="checked2 === true">th</th>
              <th v-if="checked3 === true">jp</th>
              <th v-if="checked4 === true">ko</th>
              <th v-if="checked5 === true">cn</th>
              <th v-if="checked6 === true">vn</th>
              <th v-if="checked7 === true">id</th>
              <th v-if="checked8 === true">mm</th>
              <th v-if="checked9 === true">km</th>
              <th v-if="checked10 === true">la</th>
              <th>Variable</th>
              <th>Category</th>
              <th>Tool</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for='(lang, index) in paginate' v-if='lang !== null'>
              <!-- <td v-show="checked+col" v-for="col in 10" v-on:click="focusField(text,index,col,checked+''+col)">
                <div v-show="editOffset !== index+''+col">{{langs[index][col]}}</div>
                <input v-model="langs[index][col]" v-show="editOffset === index+''+col" type="text" ref="item" @focus="focusField(langs[index][col],index,col)" v-on:blur="blurField(langs[index][col],langs[index][lang_id],'en')">
              </td> -->
              <td v-for="col in 10" v-show="checked_lang('checked'+''+col)">
                <!-- <input v-model="langs[index][col]" type="text" ref="item" v-on:blur="blurField(langs[index][col],langs[index][0],col)"> -->
                <input v-model="lang[col]" type="text" ref="item">
              </td>
              <td>
                <input v-model="lang[99]" type="text" ref="var" onclick="myFunction(this);" readonly="">
              </td>
              <td>
                <select v-model="paginate[index][11]" ref="type" class="custom-select">
                  <option value="1">member</option>
                  <option value="2">ag</option>
                </select>
              </td>
              <td id="">
                <button v-on:click="updateRecord(paginate[index])" type="button" class="btn btn-sm btn-outline-success">บันทึก</button>
                <!-- <button v-on:click="clickRecord(lang)" type="button" class="btn btn-sm btn-outline-warning">แก้ไข</button> -->
                <!-- <button v-on:click="deleteRecord(paginate[index][0])" type="button" class="btn btn-sm btn-outline-danger">ลบ</button> -->
              </td>
            </tr>
            <tr v-if='paginate === null'>
              <td colspan="12" class="text-center">ไม่พบข้อมูล</td>
            </tr>
          </tbody>
        </table>
        <ul>
          <li v-for="pageNumber in totalPages" v-if="Math.abs(pageNumber - currentPage) < 3 || pageNumber == totalPages || pageNumber == 1">
            <a v-bind:key="pageNumber" href="#" @click="setPage(pageNumber)" :class="{current: currentPage === pageNumber, last: (pageNumber == totalPages && Math.abs(pageNumber - currentPage) > 3), first:(pageNumber == 1 && Math.abs(pageNumber - currentPage) > 3)}">{{ pageNumber }}</a>
          </li>
        </ul>
      </div>
    </div>
    <script src="assets/js/vue.js"></script>
    <script src="assets/js/axios.min.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
  <script type="text/javascript">
    function myFunction(e) {
      /* Get the text field */
      var copyText = e;

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");

      /* Alert the copied text */
      //alert("Copied the text: " + copyText.value);
    }

  </script>
</html>