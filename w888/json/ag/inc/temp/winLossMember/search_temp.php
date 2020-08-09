<?php

   $list_type = array(); 
   if($_POST["sc"]!= "") { $list_type[] = $_POST["sc"]; }
   if($_POST["sp"]!= "") { $list_type[] = $_POST["sp"]; }
   if($_POST["bx"]!= "") { $list_type[] = $_POST["bx"]; }
   if($_POST["st"]!= "") { $list_type[] = $_POST["st"]; }
   if($_POST["lg"]!= "") { $list_type[] = $_POST["lg"]; }
   if($_POST["ls"]!= "") { $list_type[] = $_POST["ls"]; }
   if($_POST["ll"]!= "") { $list_type[] = $_POST["ll"]; }
   if($_POST["gm"]!= "") { $list_type[] = $_POST["gm"]; }
   if($_POST["cn"]!= "") { $list_type[] = $_POST["cn"]; }



  if($_POST["ulv"] == 9 || $_POST["ulv"] == "")
  {
    $member_name = array("ohoj^Joy^A","ohom^Man^A","ohon^หน่อง^A");
    $data;
    foreach($member_name as $key => $value){
      $data['data'][$key] = [$value, "795216.00","690630.00","-258182.00","3795.41","-254386.59","224240.37","-3281.67","220958.7","-513.74","33427.89"];
    }
    $data['grouptype'] = 'u';
    $data['rows'] = '3';
    $data['userlist'] = '9_oho';
    $datas = array(
      "status"	=> true,
      "result"	=> $data,
      "tokenV" 	=> "t4s3f54444k494d2b4d244r2r223n2w2u2r22494o3m2a2c49484l494g2y2c2x2o2s2b4z3p2w2n2y2v2s3x3a2g4l4n484v5d2c4d2f4i434w4n374n3x3o3f4c4c4r4c4d4e243a2z2h2k2d2l5w5g4q4i4s4r4y5i5a213a2p4d2x3d2x5o4l4a4k4i213g2n3x3o3i414e4a4h2z2e2v2a2m2h2g484w5u524c474i203s364o2d2t4",
      "tokenT"	=> "x3s3w534d2k2e2m4x5d2y3d2l4l4c2s2d2d4q5n3y3c234l4f2r2b2g4o4a2m2h2c4a4o3y3b2h4l4i2m2s3p5c4d2x3"
    );
    echo json_encode($datas);
  }
  else if($_POST["ulv"] == 10)
  {
    $data['data'][] = ["ohoPaj99^พี่เอ้^M","7013.00", "0.00", "3812.85", "0.00", "3812.85", "278.12", "81.40", "359.52","-81.40","-4172.37"];
    $data['grouptype'] = 'u';
    $data['rows'] = '1';
    $data['userlist'] = '9_ohoPa|10_ohoPaj^Joy^A';
    $datas = array(
      "status"	=> true,
      "result"	=> $data,
      "tokenV" 	=> "t4s3f54444k494d2b4d244r2r223n2w2u2r22494o3m2a2c49484l494g2y2c2x2o2s2b4z3p2w2n2y2v2s3x3a2g4l4n484v5d2c4d2f4i434w4n374n3x3o3f4c4c4r4c4d4e243a2z2h2k2d2l5w5g4q4i4s4r4y5i5a213a2p4d2x3d2x5o4l4a4k4i213g2n3x3o3i414e4a4h2z2e2v2a2m2h2g484w5u524c474i203s364o2d2t4",
      "tokenT"	=> "x3s3w534d2k2e2m4x5d2y3d2l4l4c2s2d2d4q5n3y3c234l4f2r2b2g4o4a2m2h2c4a4o3y3b2h4l4i2m2s3p5c4d2x3"
    );
    echo json_encode($datas);
  }
  else if($_POST["ulv"] == 11)
  {
    $data = array();
    foreach($list_type as $key => $value){
      $data['data'][$key] = [$value, "6513.00","0.00","4312.85","0.00","4312.85","278.12","31.40","309.52","31.40","-4622.37"];
    }
    $data['grouptype'] = 'g';
    $data['rows'] = '2';
    $data['userlist'] = '9_ohoPa|10_ohoPaj^Joy^A|11_ohoPaj99^พี่เอ้^M';
    $datas = array(
      "status"	=> true,
      "result"	=> $data,
      "tokenV" 	=> "t4s3f54444k494d2b4d244r2r223n2w2u2r22494o3m2a2c49484l494g2y2c2x2o2s2b4z3p2w2n2y2v2s3x3a2g4l4n484v5d2c4d2f4i434w4n374n3x3o3f4c4c4r4c4d4e243a2z2h2k2d2l5w5g4q4i4s4r4y5i5a213a2p4d2x3d2x5o4l4a4k4i213g2n3x3o3i414e4a4h2z2e2v2a2m2h2g484w5u524c474i203s364o2d2t4",
      "tokenT"	=> "x3s3w534d2k2e2m4x5d2y3d2l4l4c2s2d2d4q5n3y3c234l4f2r2b2g4o4a2m2h2c4a4o3y3b2h4l4i2m2s3p5c4d2x3"
    );
    echo json_encode($datas);
  }
?>


