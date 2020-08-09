<?
  $qSport = '';
  $qPage  = isset($_GET['page']) ? $_GET['page'] : 'win';
  $qSportId  = '';
  $mActiveSport = $qSport;
  $menuKey = 'lothun';
  $docBodyClass = "removeLoaderOnLoad";

  $addtional_resources = array(

  );
  $filename = 'lothun_doc/lothun_' . $qPage . '.php';
  if(file_exists($filename)){
    include $filename;
  }else{
    echo "404 NOT FOUND";
  }
?>