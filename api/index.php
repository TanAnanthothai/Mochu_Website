<?php

require 'Slim/Slim.php';

$app = new Slim();

/*
------------------------------------
URL for accessing to Mochu's API
------------------------------------
*/
$app->get('/', 'firstPage');
$app->get('/users', 'getUsers');
$app->get('/users/:user_ID','getUser');
$app->post('/users', 'addUser');
$app->put('/users/:id', 'updateUser');
$app->delete('/users/:id',	'deleteUser');
$app->get('/events', 'getEvents');
$app->get('/questions', 'getQuestions');
$app->get('/audioGuides', 'getAudioGuides');
$app->run();

/*
-----------------------------
connect with the database
-----------------------------
*/
function getConnection() {
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="Mochu";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}
function firstPage() {
	echo 'Hello<br>';
	echo '<a href="http://mochu.api-docs.io/"> Please refer to this Mochu API Doc</a>';
}
/*
-----------
Users API
-----------
*/
 
function getUsers() {
	$sql = "SELECT Members.user_ID,Fname,Lname,gender,email,password,contact,Bday,last_login,occupation,quiz_score,fb_ID,register_date,avatar FROM Users left join Members on Users.user_ID=Members.user_ID order by user_ID ASC";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"user": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getUser($user_ID) {
	$sql = "SELECT * FROM Users WHERE user_ID=:user_ID";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("user_ID", $user_ID);
		$stmt->execute();
		$users = $stmt->fetchObject();  
		$db = null;
		echo json_encode($users); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function addUser() {
	error_log('addUser\n', 3, '/var/tmp/php.log');
	$request = Slim::getInstance()->request();
	$users = json_decode($request->getBody());
	//$sql = "INSERT INTO wine (name, grapes, country, region, year, description) 
	//VALUES (:name, :grapes, :country, :region, :year, :description)";
	$sql = "INSERT INTO Users (Fname,email,Lname,gender,contact,Bday) VALUES (:Fname, :email, :Lname, :gender, :contact, :Bday)" ;

	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("Fname", $wine->Fname);
		$stmt->bindParam("email", $wine->email);
		$stmt->bindParam("Lname", $wine->Lname);
		$stmt->bindParam("gender", $wine->gender);
		$stmt->bindParam("contact", $wine->contact);
		$stmt->bindParam("Bday", $wine->Bday);
		$stmt->execute();
		$users->id = $db->lastInsertId();
		$db = null;
		echo json_encode($users); 
	} catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updateUser($id) {
	$request = Slim::getInstance()->request();
	$body = $request->getBody();
	$users = json_decode($body);
	$sql = "UPDATE Users SET Fname=:Fname, email=:email, Lname=:Lname, gender=:gender, contact=:contact, Bday=:Bday WHERE user_ID = :user_ID " ;
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("Fname", $wine->Fname);
		$stmt->bindParam("email", $wine->email);
		$stmt->bindParam("Lname", $wine->Lname);
		$stmt->bindParam("gender", $wine->gender);
		$stmt->bindParam("contact", $wine->contact);
		$stmt->bindParam("Bday", $wine->Bday);
		$stmt->bindParam("user_ID", $user_ID);
		$stmt->execute();
		$db = null;
		echo json_encode($users); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function deleteUser($id) {
	$sql = "DELETE FROM Users WHERE user_ID=:user_ID";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("user_ID", $user_ID);
		$stmt->execute();
		$db = null;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

/*
-----------
Events API
-----------
*/
function getEvents() {
	$sql = 'SELECT e.event_ID, e.start_time, e.Edate, e.end_time, e.contact, e.name, e.description, e.organizer, e.picture, e.type, 
           l.loc_ID, l.loc_name, l.total_seats, l.room_no, l.fl_no, l.bldg
           FROM Events e, Locations l
           WHERE e.loc_ID=l.loc_ID
           ORDER BY e.event_ID ASC';
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"event": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/*
---------------
Questions API
---------------
*/
function getQuestions() {
	$sql = 'SELECT Questions.q_ID, q_content, q_img, ch_ID, ch_content, is_key FROM Questions left join Choices on Questions.q_ID=Choices.q_ID order by q_ID ASC';
   
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"question": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/*
---------------------
Personal Guide API
---------------------
*/
function getAudioGuides() {
	$sql = 'SELECT au_ID,au_name,au_file,fl_IMG FROM AudioGuide order by au_ID ASC';
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"audioGuide": ' . json_encode($users, JSON_UNESCAPED_SLASHES) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

?>