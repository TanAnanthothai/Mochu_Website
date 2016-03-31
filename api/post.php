<?php
$url = 'http://teerakorn.me/Mochu/api/users/login';
$data = array('email' => 'saris.oph@gmail.com', 'password' => 'smithza');
//$data = array('email' => 'taneiei@ei.com', 'password' => 'gutanA', 'Fname' => 'gutanA', 'Lname' => 'gutanA', 'gender' => 'gutanA','Bday' => '2000-02-04','contact' => '123', 'occupation' => 'hellooo');
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
if ($result == FALSE) { echo "false cannot send POST"; }

var_dump($result);

?>