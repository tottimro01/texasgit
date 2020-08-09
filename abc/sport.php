<?
    $qSport = $_GET['sport'];
    $qPage  = $_GET['page'];
    $qSportId  = isset($_GET['sport_id']) ? $_GET['sport_id'] : '6';
    $mActiveSport = $qSport;
    $menuKey = 'sport';
    $docBodyClass = "";

    if(($qSport) == "" || ($qPage) == "" || ($qSportId) == ""){
        header("Location: sport.php?sport=soccer&sport_id=6&page=hdc_goal");
        die();
    }

    $filename = 'sport_doc/sp_' . $qPage . '.php';
    if(file_exists($filename)){
        include $filename;
    }else{
        echo "404 NOT FOUND";
    }
?>