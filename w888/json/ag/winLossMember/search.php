


<?php

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
	/*
	?>
		{"result":{"data":[["ohoj^Joy^A","795216.00","690630.00","-258182.00","3795.41","-254386.59","224240.37","-3281.67","220958.7","-513.74","33427.89"],["ohom^Man^A","216835.00","56240.80","-20435.98","767.66","-19668.32","9779.03","-409.10","9369.93","-358.56","10298.39"],["ohon^\u0e2b\u0e19\u0e48\u0e2d\u0e07^A","7336.00","5901.20","-2282.87","117.75","-2165.12","1953.67","-94.73","1858.94","-23.02","306.18"]],"grouptype":"u","rows":"3","userlist":"9_oho"},"tokenV":"t4s3f54444k494d2b4d244r2r223n2w2u2r22494o3m2a2c49484l494g2y2c2x2o2s2b4z3p2w2n2y2v2s3x3a2g4l4n484v5d2c4d2f4i434w4n374n3x3o3f4c4c4r4c4d4e243a2z2h2k2d2l5w5g4q4i4s4r4y5i5a213a2p4d2x3d2x5o4l4a4k4i213g2n3x3o3i414e4a4h2z2e2v2a2m2h2g484w5u524c474i203s364o2d2t4","tokenT":"x3s3w534d2k2e2m4x5d2y3d2l4l4c2s2d2d4q5n3y3c234l4f2r2b2g4o4a2m2h2c4a4o3y3b2h4l4i2m2s3p5c4d2x3"}

	<?>*/
}else if($_POST["ulv"] == 10)
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
	/*
	?>
		{"status":true,"result":{"data":[["ohoPaj99^\u0e1e\u0e35\u0e48\u0e40\u0e2d\u0e49^M","7013.00","0.00","3812.85","0.00","3812.85","278.12","81.40","359.52","-81.40","-4172.37"]],"grouptype":"u","rows":"1","userlist":"9_ohoPa|10_ohoPaj^Joy^A"},"tokenV":"t4s3f54444k494d2b4d244r2r223n2w2u2r22494o3m2a2c49484l494g2y2c2x2o2s2b4z3p2w2n2x2y2s3x3a2g4l4n484v5d2c4d2f4i434w4n374n5n3y3c2d4j4a4t464g4g2y2c2w2o2d2y3o384n4h4t4i42626g484a223d2y5d2y3d2l4q4l4d4l4g2b4n3o3m2a2n464e464e243a2r2h2k2d2u5j5j4l434f474s3b4a2w2o2e2w4","tokenT":"x3s3w534d2k2e2m4x5d2y3d2l4l4c2s2d2d4q5n3y3c234l4f2r2b2g4o4a2m2h2c4a4o3y3b2h4l4i2m2s3p5c4d2x3"}
	<?
	*/
}else if($_POST["ulv"] == 11)
{
	$member_name = array("sc","st");
	$data = array();
	foreach($member_name as $key => $value){
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
	/*
	?>
		{"status":true,"result":{"data":[["sc","6513.00","0.00","4312.85","0.00","4312.85","278.12","31.40","309.52","-31.40","-4622.37"],["st","500.00","0.00","-500.00","0.00","-500","0.00","50.00","50","-50.00","450.00"]],"grouptype":"g","rows":"2","userlist":"9_ohoPa|10_ohoPaj^Joy^A|11_ohoPaj99^\u0e1e\u0e35\u0e48\u0e40\u0e2d\u0e49^M"},"tokenV":"t4s3f54444k494d2b4d244r2r223n2w2u2r22494o3m2a2c49484l494g2y2c2x2o2s2b4z3p2w2n2x2y2s3x3a2g4l4n484v5d2c4d2f4i434w4n374n5a4b4c2k2h2i4j464q4b4c4c253a2s234o3l2f294q4h436t5k4s4g494d2b4d2z5d2m2f2l4t4m4b4v5n3c4c2a2r2f2n424b4b4a203h2p2d2y3o3h4a4k4o434p5i5a213a2x2r2n3w4","tokenT":"x3s3w534d2k2e2m4x5d2y3d2l4l4c2s2d2d4q5n3y3c234l4f2r2b2g4o4a2m2h2c4a4o3y3b2h4l4i2m2s3p5c4d2x3"}
	<?
	*/

}

 ?>