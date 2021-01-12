  <?php
//to start the session"session_start();" function is used --every thime we login to the website we are tracked & the tracking period is called as session
session_start();
 //intitializing variables
 $username = "";
 $email = "";
//errors array to display the user odbc_error
$errors = array();
//connect to SQLiteDatabase
$db = mysqli_connect('localhost','root','','Project') or die("Could not connect to database.");

//registering the usern four input so four variables
//mysqli_real_escape_string -- it escape all the escape characters for security
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

//form validation
if(empty($username)) (array_push($error, "Username is required"));
if(empty($email)) (array_push($error, "Email is required"));
if(empty($password)) (array_push($error, "password is required"));

//check db for existing user with same user xml_set_end_namespace_decl_handler "*" stands for "for all"
$user_check_query ="SELECT * FROM user WHERE username ='$username' OR email = '$email' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
  if($user['username'] === $username){array_push($errors, "Username already exists");}
  if($user['email'] === $username){array_push($errors, "Email already exists");}
}

//register the user if no errors in php we can use md5 to encrypt the password
if(count($error) == 0){
  $password = md5($password);//this will encrypt the password.
  $query = "INSERT INTO user(email, username, password) VALUES ('$email','$username','$password')";
   mysqli_query($db,$query);
   $_SESSION['username'] = $username;
   $_SESSION['success'] = "You are logged in.";
   header('location : 3home.php');
}

//login user
if(isset($_post['lgbtn']));{
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $password = mysqli_real_escape_string($db,$_POST['password']);

  if(empty($username)){
    array_push($errors, "Username is required");
  }
  if(empty($password)){
    array_push($errors, "Password is required");
  }
  if(count($errors) === 0);{
    $password = md5($password);
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
    //fire query on SQLiteDatabase
    $results = mysqli_query($db,$query);
    if(mysqli_num_rows($results)){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Logged in successfully";
      header("location : 3home.php");
    }
     array_push($errors, "Wrong username or password. Please try again.");
  }
}
 ?>
