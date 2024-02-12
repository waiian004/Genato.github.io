<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        //validate the submit button
        if(isset($_POST["submit"])){
            $last_Name = $_POST["last_Name"];
            $first_Name = $_POST["firstName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $RepeatPassword = $_POST["repeat_password"];
 
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
        // validate if all fields are empty
            if (empty($last_Name) OR empty($first_Name) OR empty($email) OR empty($password) OR empty($RepeatPassword)) {
                array_push($errors, "All fields are required");
            }
        //validate if the email is not validated
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors, "Email is not valid");
            }
        // password should not be less than 8
            if(strlen($password)<8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
        // check if password is the same
            if($password!= $RepeatPassword){
                array_push($errors, "Password does not match");
            }
            require_once "database.php";
            $sql = "SELECT * FROM user_table WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors, "Email Already Exist!");
            }
 
            if (count($errors)>0){
                foreach($errors as $error) {
                    echo"<div class='alert alert-danger'>$error</div>";
                    }
                }else{
                    require_once "database.php";
                    $sql = "INSERT INTO user_table (last_Name, first_Name, email, password) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn); // initializes a statement and returns an object suitable for mysqli_stmt_prepare()
                   $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($preparestmt){
                        mysqli_stmt_bind_param($stmt, "ssss", $last_Name, $first_Name, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class = 'alert alert-success'> You are Registered Successfully! </div>";
                    } else {
                        die("Something went wrong");
                    }
                }
            }
 
        ?>  
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="last_Name" placeholder="LastName: ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="firstName" placeholder="FirstName: ">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email: ">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Input Password: ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="repeat_password" placeholder="Repeat Password: ">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div><p>Already registered? <a href="login.php"> Login Here</a></div>
    </div>
    

    <script src="script.js"></script>
    
</body>
</html>
