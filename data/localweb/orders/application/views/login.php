<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === 1){
    session_destroy();
}
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, name, password, role_type, active FROM member WHERE name = ?";
 
        // Set parameters
        $param_username = $username;

      $query = $this->db->query($sql, [$param_username]);                
                // Check if username exists, if yes then verify password
                if($query->num_rows() == 1){                    
                    // Bind result variables
                    $row = $query->row();
                    $id = $row->id;
                    $name = $row->name;
                    $hashed_password = $row->password;
                    $role_type = $row->role_type;
                    $active = $row->active;

                    if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = 1;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;                            
                            $_SESSION["role"] = $role_type;                       
                            $_SESSION["active"] = $active;

                            // Redirect user to welcome page
                            header("location: index");
                    } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password..";
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }

    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font: 1em sans-serif; margin: 8px;}
        h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; margin-bottom: 25px;}
        .wrapper{ width: 360px; margin: auto; margin-top: 21px; padding: 20px; }
        .btn-primary {  padding: 4px 15px; background-color: purple; border: 0px; border-radius: 6px;}
        .btn-secondary { padding: 4px 15px; border-radius: 6px; background: #f2f2f2; color: black; border: 0px;}
        .btn-primary:hover { background-color: black; color: white; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Login</h1>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <!-- <p>Don't have an account? <a href="<?php echo site_url('main/register')?>">Sign up now</a>.</p> -->
        </form>
    </div>
</body>
</html>