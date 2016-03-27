<?php
	$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   
   $sql = 'SELECT e.event_ID, e.start_time, e.Edate, e.end_time, e.contact, e.name, e.description, e.organizer, e.picture, e.type, 
           l.loc_ID, l.loc_name, l.total_seats, l.room_no, l.fl_no, l.bldg
           FROM Events e, Locations l
           WHERE e.loc_ID=l.loc_ID
           ORDER BY e.event_ID ASC';
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
      $e_idTemp=$row['event_ID'];
      $e_startTimeTemp=$row['start_time'];
      $e_dateTemp=$row['Edate'];
      $e_endTimeTemp=$row['end_time'];
      $e_contactTemp=$row['contact'];
      $e_nameTemp=$row['name'];
      $e_descriptionTemp=$row['description'];
      $e_organizerTemp=$row['organizer'];
      $e_pictureTemp=$row['picture'];
      $e_typeTemp=$row['type'];
      $l_idTemp=$row['loc_ID'];
      $l_nameTemp=$row['loc_name'];
      $l_totalSeatsTemp=$row['total_seats'];
      $l_roomNoTemp=$row['room_no'];
      $l_floorNoTemp=$row['fl_no'];
      $l_buildingTemp=$row['bldg'];

     $arr[]=array ('event_ID'=>$e_idTemp,'start_time'=>$e_startTimeTemp, 'Edate'=>$e_dateTemp, 'end_time'=>$e_endTimeTemp, 
                   'contact'=>$e_contactTemp, 'name'=>$e_nameTemp, 'description'=>$e_descriptionTemp, 'organizer'=>$e_organizerTemp,
                   'picture'=> $e_pictureTemp, 'type'=>$e_typeTemp, 'loc_ID'=> $l_idTemp, 'loc_name'=> $l_nameTemp, 
                   'total_seats'=>$l_totalSeatsTemp, 'room_no'=>$l_roomNoTemp, 'fl_no'=>$l_floorNoTemp, 'bldg'=>$l_buildingTemp);
   }

	echo json_encode($arr);
?>