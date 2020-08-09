<div class="sivenav-back-cover" id="bgToggleSidenav">
  
</div>
<aside class="sidenav">
  <div class="h-100">
    <label for="toggleSidenav" class="toggle-sidenav">
      <input type="checkbox" id="toggleSidenav" />
      <i class="fas fa-bars"></i>
    </label>
    
    <div class="all-sport-list">
      <div class="form-search-sport-league">
        <form action="#" id="formSearchSportLeague">
          <fieldset>
            <input type="text" name="inputSearchSportLeague" id="inputSearchSportLeague" placeholder="ค้นหา..." class="w-100" />
          </fieldset>
        </form>
      </div>

      <ul class="sport-list-league hide-order">
        <li>
          <div class="head">
            <label for="toggle-league-all" class="sport-list-toggle">
              <span class="lg-name">เลือกทั้งหมด</span>
            </label>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="enableSportListAll" class="custom-control-input" id="switch-league-all" value="1" disabled="disabled" />
              <label class="custom-control-label" for="switch-league-all"></label>
            </div>
          </div>
        </li>
      </ul>

      <ul class="sport-list-league hide-order" id="SportListContainer">
      </ul>

    </div>
  </div>
</aside>
<form action="#" name="FormSelectLeague" id="FormSelectLeague"></form>
<form action="#" name="FormIgnoreMatch" id="FormIgnoreMatch"></form>
<script>
  $(document).ready(function($){
    $(document).on('change', '#toggleSidenav', function(event){
        event.preventDefault();
        if($(this).is(':checked'))
            $('body').addClass('sidenav-open');
        else
            $('body').removeClass('sidenav-open');
    });

    $(document).on('click', '#bgToggleSidenav', function(event){
      $('#toggleSidenav').prop('checked', false);
      $('#toggleSidenav').trigger('change');
    });
  });
</script>

<?
  include 'sport_table_tmpl.html';
  include 'sport_tmpl.html';
?>