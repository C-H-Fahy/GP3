<?php
if(!$_SESSION || !isset($_SESSION["loggedin"])){
                            header("location: login");
}
 
// Define variables and initialize with empty values
$seat = $performance = $uid = "";
$err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $uid = $_SESSION["id"];

    // Check if seats is empty
    $seat = trim($_POST["seats"]);
    if(empty($seat) || !(is_numeric($seat) && (int)$seat > 0)){
        $err = "Please enter a number of seats.";
        $seat = '1';
    }
     
    // Check if seats is empty
    if(!isset($_GET['pid']) || empty(trim($_GET['pid']))){
        $err = "Invalid Performance";
    } else{
        $performance = trim($_GET['pid']);
    }
     

    // Validate credentials
    if(empty($err)){
        // Prepare a select statement
      $sql = "SELECT id FROM performance WHERE id = ?";

      $query = $this->db->query($sql, [$performance]);                
      
       if($query->num_rows() == 1){                    
             echo 'valid data, TODO: add to db and forward to booking/view/X';

             $sql = "INSERT INTO booking(seats, performance, member) VALUES(?, ?, ?)";
             $query2 = $this->db->query($sql, [$seat, $performance, $uid]); 
	     echo $query2->row();

       } else{
             // Username doesn't exist, display a generic error message
             $err = "Invalid performance id.";
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
        <h1>Create booking</h1>
        <p>How many seats is this booking for?</p>

        <?php 
        if(!empty($err)){
            echo '<div class="alert alert-danger">' . $err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?pid=<?php if(isset($_GET['pid'])) echo $_GET['pid'];?>" method="post">
            <div class="form-group">
                <label>Seats</label>
                <input type="number" name="seats" class="form-control <?php echo (!empty($err)) ? 'is-invalid' : ''; ?>" value="<?php echo $seat; ?>">
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Book">
            </div>
         </form>
    </div>
</body>
</html>