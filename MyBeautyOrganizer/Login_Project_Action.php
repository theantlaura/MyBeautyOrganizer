<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<body>

    <?php 
    $username= $password="" ; 
    $postUsername=$_POST[ "username"]; 
    $postPassword=$_POST[ "password"]; 
    $submit=$_POST[ "submit"]; 
    function testInput($input)
    { 
    $input=trim($input); $input=htmlspecialchars($input); 
    return $input;
    } 
    function My_Connect_DB() { 
    $servername="localhost" ; 
    $username="lauraarevaloportfolio"; $password="" ; 
    $dbname="my_lauraarevaloportfolio" ; 
    $conn=mysqli_connect($servername, $username, $password, $dbname); if(!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
    } 
    return $conn; 
    } 
    function My_SQL_Query($conn, $sql) 
    { 
    if($result=mysqli_query($conn, $sql)) 
    { // echo
    "SQL is done successfully!<br/>"; 
    } else 
    { echo "Error in running SQL: " . mysqli_error($conn); 
    }
    return $result; 
    } 
    if(isset($submit)) 
    { 
    $username=testInput($postUsername);
    } 
    ?>

    <?php if(isset($submit)) 
    { 
    $conn=My_Connect_DB(); 
    $sql="SELECT * FROM Grades WHERE username='"
    . $postUsername . "' AND password='" . md5($postPassword) . "';"; $result=My_SQL_Query($conn, $sql); // If login fails 
    if(mysqli_num_rows($result) <=0 ) 
    { 
    echo "<h3>Username or password does not exist.
           <a href='http://lauraarevaloportfolio.altervista.org/Login_Project.php'>Try again.</a>
            </h3>"; // If login successful 
            } 
            else 
            {
    $row=mysqli_fetch_row($result); 
    $_SESSION[ "username"]=$row[0]; 
    $_SESSION[ "password"]=$row[1]; 
    $_SESSION[ "name"]=$row[2]; 
    $_SESSION[ "email"]=$row[3];
    $_SESSION[ "picture"]=$row[4]; 
    $_SESSION[ "grade"]=$row[5]; 
    $_SESSION[ "date"]=$row[6]; 
    $_SESSION[ "time"]=$row[7]; 
    echo "<div>
          <h2 >Welcome, " . $row[0] . "!</h2>
          </div>"; 
          echo "<div>
                <div>
                <img  src='" . $row[4] . "'>
                </div>
                <div>
                <h4> " . $row[2] . " </h4>
                <p>Freemium Account</p>
                </div>
           </div>"; 
           }
           } ?>
</body>

</html>
