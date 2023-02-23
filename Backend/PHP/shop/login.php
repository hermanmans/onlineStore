
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/CSS/stylesheet.css">
    <script src="/JS/login.js" defer></script>
    <script src="https://kit.fontawesome.com/76ccc9430c.js" crossorigin="anonymous"></script>
    <title>Login/Register</title>
    
</head>
<body class='index'>
  <div class="indexPage">
    <div class="indexPageRegister">
            <form class="register" action="login.php" method="POST" enctype="multipart/form-data">
                <h5 id='registerHead'>Register</h5>
                <label for="name">Username</label>
                <input type="text" name="name" id="name">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="createPassword">Create Password</label>
                <input type="text" name="createPassword" id="createPassword">
                <label for="conPassword">Confirm Password</label>
                <input type="text" name="conPassword" id="conPassword">
                <br>
                <input type="submit" name="submitNew" id="submitNew">
                <br>
                <h5>Go to <a id="loginLink" href="#loginHead" style="color:#e2e20e">Login</a></h5>
            </form>
    </div>
    <div class="indexPageLogin" style='display:none'>
            <form class="login" action="login.php" method="POST" enctype="multipart/form-data">
                <h5 id='loginHead'>Login</h5>
                <label for="logName">Username</label>
                <input type="text" name="logName" id="logName">
                <label for="logPassword">Password</label>
                <input type="text" name="logPassword" id="logPassword">
                <br>
                <input type="submit" name="submitLogin" value="Login" id="submitLogin">
                <br>
                <h5>Go to <a id="registerLink" href="#registerHead" style="color:#e2e20e">Register</a></h5>
                <a id="forgot" href="forgot.php" style="color:black;font-size:small">Forgot Password?</a>
            </form>
    </div>
  </div>
</body>
</html>

<?php
include ('connect.php');
if(isset($_POST['submitNew'])){
  /////Register////////////////////
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $currentYear= date('Y');
  $dob =date("Y",strtotime($_POST['dob']));
  $age =$currentYear-$dob;
  $email = $_POST['email'];
  $passkey =$_POST['conPassword'];
  ///rethink this
  /*if($_POST['conPassword']===$_POST['createPassword']){
    $passkey =$_POST['conPassword'];
    echo 'Password Successfully Created';
  }else{
    echo 'Password does not match';
  };
  echo $passkey;
  */

  $sql = "INSERT INTO user(member_name,member_surname,member_age,member_email,member_password)
  VALUES ('$name','$surname','$age','$email','$passkey')";

  // Check whether insert was successful
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  };
};

//////LOGIN////////////
if(isset($_POST['submitLogin'])){
  $user = $_POST['logName'];
  $userPassword = $_POST['logPassword'];
  $loginQuery = "SELECT member_name,member_password FROM user WHERE member_name ='$user' AND member_password ='$userPassword'";
  $result = $conn->query($loginQuery);
  if ($result->num_rows > 0) {
        echo 'found!';
        header("Location: index.php"); 
    } else {
        echo 'Password or username incorrect!';
    };
};
?>
