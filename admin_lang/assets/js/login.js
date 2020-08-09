var app = new Vue({
  el: '#login',
  data: {
    password: '',
  },
  methods: {
    checkLogin: function(){
      console.log(this.password)
      if(this.password !== null){
        if(this.password === '8888'){
          axios({
            method: 'post',
            url: 'ajaxfile.php',
            data: {type: 'login'},
            config: {headers: {'Content-Type': 'multipart/form-data'}}
          })
          .then(function (response){
            app.resetForm();
            window.location.reload() 
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    },
    resetForm: function(){
      this.password = '';
    },
    logout: function(){
      axios({
        method: 'post',
        url: 'ajaxfile.php',
        data: {type: 'logout'},
        config: {headers: {'Content-Type': 'multipart/form-data'}}
      })
      .then(function (response){
        window.location.reload()
      })
      .catch(function (error) {
        console.log(error);
      });
    },
  }
})