<?
################StepZX
$a_server=array(
"173.249.52.17","173.249.1.168","207.180.201.36","173.249.1.168","207.180.243.69","173.249.21.69"
);
$a_server8=array(
"173.249.52.17","207.180.206.85","5.189.188.130"
);
$a_web=array(
"http://w6.stepzx.com/login.php","http://w1.stepzx.com/login.php","http://w3.stepzx.com/login.php","http://w1.stepzx.com/login.php","http://w2.stepzx.com/login.php","http://w7.stepzx.com/login.php"
);
$row=60;

################LiveZX
$a_server2=array(
"207.180.201.36","173.249.52.17","173.249.1.168","207.180.243.69","173.249.1.168","173.249.21.69"
);
$a_web2=array(
"http://w3.livezx.com/login.php","http://w6.livezx.com/login.php","http://w1.livezx.com/login.php","http://w2.livezx.com/login.php","http://w1.livezx.com/login.php","http://w7.livezx.com/login.php"
);
$row2=40;


$user='root';
$pass='!Bomload9632';





function file_get_contents2($url)
{
$context = stream_context_create(
    array(
        'http' => array(
            'max_redirects' => 101
        )
    )
);
$output=file_get_contents($url, false, $context);
    return $output;
}

?>