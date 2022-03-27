<?php
session_start();
if(!$_SESSION || $_SESSION['role'] !== 'manager' && $_SESSION['role'] !== 'receptionist'){
    echo "You do not have permission to view this page";
    return;
}

// Define variables and initialize with empty values
$title = "TEST";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
$this->table->set_template(array());
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
            // Set parameters
            $param_username = trim($_POST["username"]);
    
// Prepare a select statement
        $sql = "SELECT id FROM member WHERE name = ?";
    $query = $this->db->query($sql, [$param_username]);
                if($query->num_rows() != 0){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
       //     } else{
         //       echo "Oops! Something went wrong. Please try again later.";
           // }
      //  }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO member(title, name, password, joined) VALUES (?, ?, ?, NOW())";
            // Set parameters
            $param_title = $title;
            $param_name = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

    $query2 = $this->db->query($sql, [$param_title, $param_name, $param_password]);
    
                // Redirect to login page
                header("location: login?x=".$param_password);
 //           } else{
   //             echo "Oops! Something went wrong. Please try again later.";
     //       }
        }
   
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
        <h1>Sign Up</h1>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="<?php echo site_url('main/login')?>">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>