var app = new Vue({
  el: '#myapp',
  data: {
    lang_id: '',
    en: '',
    th: '',
    jp: '',
    ko: '',
    cn: '',
    vn: '',
    id: '',
    mm: '',
    km: '',
    la: '',
    langs: [],
    type: '1',
    errors: null,
    test: null,
    checkedEn: true,
    checkedTh: true,
    checkedJp: true,
    checkedKo: true,
    checkedCn: true,
    checkedVn: true,
    checkedId: true,
    checkedMm: true,
    checkedKm: true,
    checkedLa: true,
    checked1: true,
    checked2: true,
    checked3: true,
    checked4: true,
    checked5: true,
    checked6: true,
    checked7: true,
    checked8: true,
    checked9: true,
    checked10: true,
    searchKey: '',
    currentPage: 1,
    itemsPerPage: 10,
    resultCount: 0,
    selectType: '0',
  },
  mounted: function () {
    this.getData()
  },
  computed: {
    rows() {
      return this.langs.length
    },
    resultCount() {
      return this.filteredLangs.length;
    },
    totalPages: function() {
      return Math.ceil(this.resultCount / this.itemsPerPage)
    },
    filteredLangs: function() {
      let key = this.searchKey.toUpperCase();
      return this.langs.filter((lang) => {
        return lang.en.toUpperCase().indexOf(key) !== -1 || lang.th.toUpperCase().indexOf(key) !== -1
      })
    },
    paginate: function() {
      if (!this.langs || this.langs.length != this.langs.length) {
        return 
      }
      this.resultCount = this.langs.length
      if (this.currentPage >= this.totalPages) {
        this.currentPage = this.totalPages
      }
      var index = this.currentPage * this.itemsPerPage - this.itemsPerPage
      if(index <= -1){
        index = 0
      }
      // return this.langs.slice(index, index + this.itemsPerPage)
      return this.filteredLangs.slice(index, index + this.itemsPerPage)
    }
  },
  methods: {
    setPage: function(pageNumber) {
      this.currentPage = pageNumber
    },
    getData: function(){
      axios.post('ajaxfile.php',{
        type: 'get'
      })
      .then(function (response){
        app.langs = response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    selectTypes: function(){
      if(this.selectType === '0'){
        this.getData()
      }
      else if(this.selectType === '1'){
        this.getDataType('1')
      }
      else if(this.selectType === '2'){
        this.getDataType('2')
      }
    },
    getDataType: function(langType){
      axios({
        method: 'post',
        url: 'ajaxfile.php',
        data: {langType, type: 'getType'},
        config: {headers: {'Content-Type': 'multipart/form-data'}}
      })
      .then(function (response){
        app.langs = response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    insert: function(){
      if (!this.th) {
        this.$refs.th.focus();
      }
      else if (!this.type) {
        this.$refs.ref_type.focus();
      }
      else {
        let formData = new FormData();
        formData.append('en', this.en)
        formData.append('th', this.th)
        formData.append('jp', this.jp)
        formData.append('ko', this.ko)
        formData.append('cn', this.cn)
        formData.append('vn', this.vn)
        formData.append('id', this.id)
        formData.append('mm', this.mm)
        formData.append('km', this.km)
        formData.append('la', this.la)
        formData.append('type', this.type)
        var lang = {};
        formData.forEach(function (value, key){
          lang[key] = value;
        })
        var data = [];
        var checkWord = false
        app.langs.forEach(function (value, key) {
          if(value.type === '1' && lang.type === '1'){
            data[key] = value.th
            if(lang.th === data[key]){
              alert("มี คำ นี้แล้ว !!!")
              checkWord = true
              app.resetForm()
            }
          }
          else if(value.type === '2' && lang.type === '2'){
            data[key] = value.th
            if(lang.th === data[key]){
              alert("มี คำ นี้แล้ว !!!")
              checkWord = true
              app.resetForm()
            }
          }
        });
        if(checkWord != true){
          console.log('success')
          axios({
            method: 'post',
            url: 'ajaxfile.php',
            data: {lang, type: 'insert'},
            config: {headers: {'Content-Type': 'multipart/form-data'}}
          })
          .then(function (response){
            app.resetForm();
            app.getData();
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    },
    resetForm: function(){
      this.en = '';
      this.th = '';
      this.jp = '';
      this.ko = '';
      this.cn = '';
      this.vn = '';
      this.id = '';
      this.mm = '';
      this.km = '';
      this.la = '';
      this.type = '1';
    },
    clickRecord: function(lang){
      this.lang_id = lang.lang_id;
      this.en = lang.en;
      this.th = lang.th;
      this.jp = lang.jp;
      this.ko = lang.ko;
      this.cn = lang.cn;
      this.vn = lang.vn;
      this.id = lang.id;
      this.mm = lang.mm;
      this.km = lang.km;
      this.la = lang.la;
      this.type = lang.type;
      this.test = true;
    },
    update: function(){
      if (!this.th) {
        this.$refs.th.focus();
      }
      else if (!this.type) {
        this.$refs.type.focus();
      }
      else {
        let formData = new FormData();
        formData.append('lang_id', this.lang_id)
        formData.append('en', this.en)
        formData.append('th', this.th)
        formData.append('jp', this.jp)
        formData.append('ko', this.ko)
        formData.append('cn', this.cn)
        formData.append('vn', this.vn)
        formData.append('id', this.id)
        formData.append('mm', this.mm)
        formData.append('km', this.km)
        formData.append('la', this.la)
        formData.append('type', this.type)
        var lang = {};
        formData.forEach(function (value, key){
          lang[key] = value;
        })
        axios({
          method: 'post',
          url: 'ajaxfile.php',
          data: {lang, type: 'update'},
          type: 'update',
          config: {headers: {'Content-Type': 'multipart/form-data'}}
        })
        .then(function (response){
          app.resetForm();
          app.getData();
        })
        .catch(function (error) {
          console.log(error);
        });
      }
    },
    updateRecord: function(value){
      var lang = {
        lang_id: value[0],
        en: value[1],
        th: value[2],
        jp: value[3],
        ko: value[4],
        cn: value[5],
        vn: value[6],
        id: value[7],
        mm: value[8],
        km: value[9],
        la: value[10],
        type: value[11],
      }
      axios({
        method: 'post',
        url: 'ajaxfile.php',
        data: {lang, type: 'update'},
        config: {headers: {'Content-Type': 'multipart/form-data'}}
      })
      .then(function (response){
        app.getData();
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    deleteRecord: function(lang_id){
      if(confirm("ต้องการ ลบ หรือไม่ ?")){
        axios({
          method: 'post',
          url: 'ajaxfile.php',
          data: {lang_id, type: 'delete'},
          config: {headers: {'Content-Type': 'multipart/form-data'}}
        })
        .then(function (response){
          app.getData();
        })
        .catch(function (error) {
          console.log(error);
        });
      }
    },
    blurField(text,lang_id,type_lang){
      if(type_lang === 1){
        type_lang = 'en'
      }
      else if(type_lang === 2){
        type_lang = 'th'
      }
      else if(type_lang === 3){
        type_lang = 'jp'
      }
      else if(type_lang === 4){
        type_lang = 'ko'
      }
      else if(type_lang === 5){
        type_lang = 'cn'
      }
      else if(type_lang === 6){
        type_lang = 'vn'
      }
      else if(type_lang === 7){
        type_lang = 'id'
      }
      else if(type_lang === 8){
        type_lang = 'mm'
      }
      else if(type_lang === 9){
        type_lang = 'km'
      }
      else if(type_lang === 10){
        type_lang = 'la'
      }
      axios({
        method: 'post',
        url: 'ajaxfile.php',
        data: {text, lang_id, type_lang, type: 'field'},
        type: 'update',
        config: {headers: {'Content-Type': 'multipart/form-data'}}
      })
      .then(function (response){
        app.resetForm();
        app.getData();
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    exportPHP: function(type_lang){
      axios({
        method: 'post',
        url: 'ajaxfile.php',
        data: {type_lang,type:'exportPHP'},
        config: {headers: {'Content-Type': 'multipart/form-data'}}
      })
      .then(function (response){
        app.resetForm();
        app.getData();
      })
      .catch(function (error) {
        console.log(error);
      });
    },
    checked_lang: function(checked){
      if(this.checked1 === true && checked === 'checked1'){
        return true
      }
      else if(this.checked2 === true && checked === 'checked2'){
        return true
      }
      else if(this.checked3 === true && checked === 'checked3'){
        return true
      }
      else if(this.checked4 === true && checked === 'checked4'){
        return true
      }
      else if(this.checked5 === true && checked === 'checked5'){
        return true
      }
      else if(this.checked6 === true && checked === 'checked6'){
        return true
      }
      else if(this.checked7 === true && checked === 'checked7'){
        return true
      }
      else if(this.checked8 === true && checked === 'checked8'){
        return true
      }
      else if(this.checked9 === true && checked === 'checked9'){
        return true
      }
      else if(this.checked10 === true && checked === 'checked10'){
        return true
      }
      else{
        return false
      }
    },
  }
})
Vue.config.devtools = true
window.__VUE_DEVTOOLS_GLOBAL_HOOK__.Vue = app.constructor;
