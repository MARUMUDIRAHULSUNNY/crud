v <?php
// Include config file
require_once("db.php");
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];        
    $user = trim($_POST["user"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["pass"]);
   
    // Prepare an update statement
        $sql = "UPDATE table1 SET uname=?, email=?,password=? WHERE sno=?";
         
        if($stmt = mysqli_prepare($pandu, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $f,$l,$e,$param_id);
            
            // Set parameters
            $f = $user;
            $l = $email;
            $e = $pass;
            $param_id= $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                echo 'Records updated successfully. Redirect to landing page' ;
                header("location:file1.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
    
         
        // Close statement
        mysqli_stmt_close($stmt);
     }
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);  
        
        // Prepare a select statement
        $sql = "SELECT * FROM table1 WHERE sno = ?";
 if($stmt = mysqli_prepare($pandu, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    // Retrieve individual field value
                    $first = $row["uname"];
                    $email = $row["email"];
                    $pass = $row["password"];
                   
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: file1.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close panduection
        mysqli_close($pandu);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: file1.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
		            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="user" class="form-control" value="<?php echo $first; ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            
                        </div>
          
                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="pass" class="form-control" value="<?php echo $pass; ?>">
                            
                        </div>
               
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>