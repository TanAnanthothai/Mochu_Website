<?php
<<<<<<< HEAD
$url = 'http://teerakorn.me/Mochu/api/users/login';
$data = array('email' => 'taneiei@ei.com', 'password' => 'gutanA');
=======
$url = 'http://teerakorn.me/Mochu/api/users';
$data = array('Fname' => 'value1','Lname' => 'value1','gender' => 'value1');
>>>>>>> origin/master

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
<<<<<<< HEAD
if ($result == FALSE) { echo "false cannot send POST"; }
=======
if ($result == FALSE) { /* Handle error */ }
>>>>>>> origin/master

var_dump($result);

?>