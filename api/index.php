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
$app->get('/users/:email','getUser');
$app->post('/users/login', 'login');
$app->post('/users', 'addUser');
$app->post('/users/forgetPW', 'forget_password');
$app->post('/tests', 'addTest');
$app->put('/users/:id', 'updateUser');
$app->post('/users/cusquiz/:id', 'updateQuizScore');
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
	$dbuser="teerakornm_Mochu";
	$dbpass="root";
	$dbname="teerakornm_Mochu";
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
	//$sql = "SELECT Members.user_ID,Fname,Lname,gender,email,password,contact,Bday,last_login,occupation,quiz_score,fb_ID,register_date,avatar FROM Users left join Members on Users.user_ID=Members.user_ID order by user_ID ASC";
	$sql = "SELECT Members.user_ID,Fname,Lname,gender,email,password,contact,Bday,last_login,occupation,quiz_score,register_date FROM Users left join Members on Users.user_ID=Members.user_ID order by user_ID ASC";

	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($users);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getUser($email) {
	$sql = "SELECT Members.user_ID,Fname,Lname,gender,email,password,contact,Bday,last_login,occupation,quiz_score,register_date FROM Users left join Members on Users.user_ID = Members.user_ID WHERE email=:email";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("email", $email);
		$stmt->execute();
		$users = $stmt->fetchObject();  
		$db = null;
		echo json_encode($users); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function login() {
	$request = Slim::getInstance()->request();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM Users left join Members on Users.user_ID = Members.user_ID WHERE Users.email='$email' AND Users.password='$password'";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("email", $email);
		$stmt->execute();
		$users = $stmt->fetchObject();
		echo json_encode($users); 
		$db = null;
		
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function addUser() {
	error_log('addUser\n', 3, '/var/tmp/php.log');
	$request = Slim::getInstance()->request();
	//$users = json_decode($request->getBody());
	$email=$_POST['email'];
	$password=$_POST['password'];
	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	$gender = $_POST['gender'];
	$Bday=$_POST['Bday'];
	$contact=$_POST['contact'];
	echo "EIIEIEIEIEIEIEIIIIEIEIEIEI".$email.$password;
	//for members
	$occupation=$_POST['occupation'];
	$sql = "INSERT INTO Users (email,password,Fname,Lname,gender,Bday,contact) VALUES ('$email','$password','$Fname', '$Lname', '$gender','$Bday','$contact')" ;

	try {
		$db = getConnection();
		$stmt = $db->prepare($sql); 
		$stmt->bindParam("email", $users->email);
		$stmt->bindParam("password", $users->password); 
		$stmt->bindParam("Fname", $users->Fname);
		$stmt->bindParam("Lname", $users->Lname);
		$stmt->bindParam("gender", $users->gender);
		$stmt->bindParam("Bday", $users->Bday);
		$stmt->bindParam("contact", $users->contact);
		$stmt->execute();
		$users->id = $db->lastInsertId();
		echo json_encode($stmt); 
		$last_ID = $db->lastInsertId();
		echo "Last ID: ".$last_ID;
		$db = null;
		$db1 = getConnection();
		$sql1="INSERT INTO Members (user_ID,occupation) VALUES('$last_ID','$occupation')";
		$stmt1 = $db1->prepare($sql1); 
		$stmt1->bindParam("occupation", $members->occupation);
		$stmt1->execute();
		$db1 = null;
		
		//echo '{"Success":{"text":'. "POST success" .'}}'; 
	} catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}

	// $sql1="INSERT INTO Members (occupation) VALUES('$occupation', (SELECT user_ID from Users where user_ID='$user_ID'))";
	// try {
	// 	$db = getConnection();
	// 	$stmt = $db->prepare($sql1); 
	// 	$stmt->bindParam("occupation", $members->occupation);
	// 	$stmt->execute();
	// 	// $members->id = $db->lastInsertId();
	// 	$db = null;
	// 	echo json_encode($members); 
	// 	//echo '{"Success":{"text":'. "POST success" .'}}'; 
	// } catch(PDOException $e) {
	// 	error_log($e->getMessage(), 3, '/var/tmp/php.log');
	// 	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	// }
}
function addTest() {
	error_log('addTest\n', 3, '/var/tmp/php.log');
	$request = Slim::getInstance()->request();
	$users = json_decode($request->getBody());
	//$sql = "INSERT INTO wine (name, grapes, country, region, year, description) 
	//VALUES (:name, :grapes, :country, :region, :year, :description)";
	$sql = "INSERT INTO post (test) VALUES (:test)" ;

	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("test", $users->test);
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
		$stmt->bindParam("Fname", $users->Fname);
		$stmt->bindParam("email", $users->email);
		$stmt->bindParam("Lname", $users->Lname);
		$stmt->bindParam("gender", $users->gender);
		$stmt->bindParam("contact", $users->contact);
		$stmt->bindParam("Bday", $users->Bday);
		$stmt->bindParam("user_ID", $user_ID);
		$stmt->execute();
		$db = null;
		echo json_encode($users); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updateQuizScore($id) {

	$request = Slim::getInstance()->request();
	$user_ID = $_POST['user_ID'];
	$quiz_score = $_POST['quiz_score'];
	$sql = "UPDATE Members SET quiz_score='$quiz_score' WHERE user_ID='$user_ID'";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql); 
		// $stmt->bindParam("quiz_score", $users->Bday);
		// $stmt->bindParam("user_ID", $user_ID);
		$stmt->execute();
		$db = null;
		echo "success";
		
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

function forget_password() {
    $request = Slim::getInstance()->request();
    $email = $_POST['email'];
    $sql = "SELECT * FROM Users WHERE email='$email'";
    echo "EMAIL: ".$email;
    try {

    	$server = 'localhost';
		$user = 'teerakornm_Mochu';
		$password = 'root';
		$db = 'teerakornm_Mochu';

		$conn = mysqli_connect($server, $user, $password, $db);

		if(!$conn){
			echo "Connection Fialed!";
			die("Connection Fialed!:".mysqli_connect_error());
		} else{
		//echo "Connection to a database ".$db." success" ;
		}
		$strHeader = "From: mochu@teerakorn.me";
		$strMessage = "Helloooo from Mochu";
        $email=mysqli_real_escape_string($conn, $email);
        $query="SELECT * FROM Users WHERE email='$email'";
        $result = $conn->query($query);
        if($row=$result->fetch_assoc()){
            $password=$row['password'];
            if(mail($email, 'Forgot Password', "Your Password is: $password", $strHeader)){
            	echo "Your Password has been sent to your email!!";
                exit();
            } else {
                echo "Sorry we cannot send your password at this time.";
                exit();
            }
        }
        else {
            echo "Sorry there is no user with the password exist.";
            exit();
        }
       
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
		echo json_encode($users);
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
		echo json_encode($users);
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
		echo json_encode($users, JSON_UNESCAPED_SLASHES);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

?>