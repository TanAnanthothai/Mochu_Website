<?php
	$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $sql = 'SELECT Questions.q_ID, q_content, q_img, ch_ID, ch_content, is_key FROM Questions left join Choices on Questions.q_ID=Choices.q_ID order by q_ID ASC';
   mysql_select_db('Mochu');
   $retval = mysql_query( $sql, $conn );

   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
  //  while($row = mysql_fetch_array($retval)) {
  //     echo "EMP ID :{$row['q_ID']}  <br> ".
  //        "EMP NAME : {$row['q_content']} <br> ".
  //        "EMP SALARY : {$row['q_img']} <br> ".
  //        "EMP ID :{$row['ch_ID']}  <br> ".
  //        "EMP NAME : {$row['ch_content']} <br> ".
  //        "EMP SALARY : {$row['is_key']} <br> ".
  //        "--------------------------------<br>";
  // }
  // while($row = mysql_fetch_array($retval)) {
  //     echo $row['q_ID'];
  // }
   $arr = array();
   while($row = mysql_fetch_array($retval)) {
      $q_idTemp=$row['q_ID'];
      $q_contentTemp=$row['q_content'];
      $q_imgTemp=$row['q_img'];
      $ch_idTemp=$row['ch_ID'];
      $ch_contentTemp=$row['ch_content'];
      $is_keyTemp=$row['is_key'];
     $arr[]=array ('q_id'=>$q_idTemp,'q_content'=>$q_contentTemp,'q_img'=> $q_imgTemp ,'ch_ID'=>$ch_idTemp,'ch_content'=>$ch_contentTemp,'is_key'=>$is_keyTemp );
   }

	echo json_encode($arr);
?>