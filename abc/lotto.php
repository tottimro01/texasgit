<?
  $qSport = '';
  $qPage  = isset($_GET['page']) ? $_GET['page'] : 'win';
  $qSportId  = '';
  $mActiveSport = $qSport;
  $menuKey = 'lotto';
  $docBodyClass = "removeLoaderOnLoad";

  $addtional_resources = array(

  );
  $filename = 'lotto_doc/lotto_' . $qPage . '.php';
  if(file_exists($filename)){
    include $filename;
  }else{
    echo "404 NOT FOUND";
  }
?>