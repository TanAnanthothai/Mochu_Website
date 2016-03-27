<?php
	$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $sql = 'SELECT au_ID,au_name,au_file,fl_IMG FROM AudioGuide order by au_ID ASC';
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
      $au_idTemp=$row['au_ID'];
      $au_nameTemp=$row['au_name'];
      $au_fileTemp=$row['au_file'];
      $fl_imgTemp=$row['fl_IMG'];
     $arr[]=array ('au_id'=>$au_idTemp,'au_name'=>$au_nameTemp,'au_file'=> $au_fileTemp ,'fl_IMG'=>$fl_imgTemp);
   }

	echo json_encode($arr, JSON_UNESCAPED_SLASHES);
?>