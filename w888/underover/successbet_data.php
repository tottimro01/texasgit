<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('../inc/conn.php');
require('../inc/function.php');

require("../lang/member_lang.php");
require("../lang/function_array.php");


$BPstake = $_POST["BPstake"];
$BPBetKey = $_POST["BPBetKey"];
$btnBPSubmit = $_POST["btnBPSubmit"];
$oddsRequest = $_POST["oddsRequest"];
$sporttype = $_POST["sporttype"];


?>

<script type="text/javascript">
    var Data = { 'lblRefnoValue': '106305974540',
        'lblTypeName': 'ราคาต่อรอง',
        'lblHome': 'แดนดินัง ซิตี้ เอสซี',
        'lblAway': 'โอคไลจ์ แคนนอนส์',
        'lblHomeClass': 'UdrDogTeamClass',
        'lblAwayClass': 'FavTeamClass',
        'lblLeaguename': 'วิคตอเรีย ออสเตรเลีย',
        'lblBetKindValue': '-0.25',
        'lblBetKind': 'ราคาต่อรอง',
        'lblScore': 'สกอร์ ',
        'lblScoreValue': '0 - 0',
        'lblOddsValue': '0.80',
        'lblChoiceValue': 'โอคไลจ์ แคนนอนส์',
        'lblChoiceColorValue': 'FavTeamClass',
        'lblStakeValue': '100',
        'lblStatusValue': 'กำลังรอ',
        'lblPwinningValue': '180.00',
        'hiddenLiveindicator': 'True',
        'lblAOSValue': ''
    };

    parent.SetSuccessBet(Data);
</script>