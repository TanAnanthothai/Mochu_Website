<?php
	$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $sql = 'SELECT Members.user_ID,Fname,Lname,gender,email,password,contact,Bday,last_login,occupation,quiz_score,fb_ID,register_date,avatar FROM Users left join Members on Users.user_ID=Members.user_ID order by user_ID ASC';
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
      $Temp1=$row['user_ID'];
      $Temp2=$row['Fname'];
      $Temp3=$row['Lname'];
      $Temp4=$row['gender'];
      $Temp5=$row['email'];
      $Temp6=$row['password'];
      $Temp7=$row['contact'];
      $Temp8=$row['Bday'];
      $Temp9=$row['last_login'];
      $Temp10=$row['occupation'];
      $Temp11=$row['quiz_score'];
      $Temp12=$row['fb_ID'];
      $Temp13=$row['register_date'];
      $Temp14=$row['avatar'];
     $arr[]=array ('user_ID'=>$Temp1,'Fname'=>$Temp2,'Lname'=> $Temp3 ,
      'gender'=>$Temp4,'email'=>$Temp5,'password'=>$Temp6,'contact'=>$Temp7,'Bday'=>$Temp8,'last_login'=>$Temp9,
      'occupation'=>$Temp10,'quiz_score'=>$Temp11,'fb_ID'=>$Temp12,'register_date'=>$Temp13,'avatar'=>$Temp14);
   }

	echo json_encode($arr, JSON_UNESCAPED_SLASHES);
?>