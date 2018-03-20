<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Christan de Luna - Project 5 - Sign Up</title>
    <!-- Favicon and Core CSS files -->
    <link type="image/png" rel="shortcut icon" href="../images/favicon.png" />
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Embedded styles -->
    <style type="text/css">
    	@import url('https://fonts.googleapis.com/css?family=Raleway:900|Montserrat');
    	
        body {
        	color: #575454;
        	font-family: 'Montserrat', sans-serif;
            text-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
        	background: white;
        }
        
        input[type=file] {
        	width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        
    	.project-5-wrapper {
        	text-align: center;
            display: block;
            margin: 0 auto;
        }
        
    	.system-title-wrapper {
            margin: 50px 0;
        }
        
        .system-title {
        	color: #fff;
        	font-family: 'Raleway', sans-serif;
            letter-spacing: 1px;
            text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
        }
        
        .form-wrapper {
        	width: 350px;
            max-width: 90%;
            height: auto;
            margin: 0 auto;
        }
        
        .form-line {
        	border: 2px solid pink;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        
        .form-info-title {
        	margin: 5px 0;
        }
        
        .form-control {
        	border: 0;
            border-bottom: 2px solid pink;
            border-radius: 0;
            outline: 0;
            box-shadow: none;
        }
        
        textarea:focus,
        input[type="name"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus,
        .uneditable-input:focus {
       		border: 0;
          	border-bottom: 2px solid purple;
            border-radius: 0;
          	outline: 0;
            box-shadow: none;
            transition: all 300ms ease-in-out;
        }
        
        .card {
        	background: light-pink;
            border-radius: 20px 5px 20px 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2),
              			0 10px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            margin: 60px 0;
            padding: 20px;
        }
        
        .glyphicon {
        	margin: 0 5px 0 0;
        }
        
        .btn {
        	color: #fff;
        	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            border: 0;
            border-radius: 10px 5px 10px 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            width: 100px;
            margin: 15px 2.5px 0;
            padding: 5px 0;
            transition: background 300ms ease-in-out;
            background-color:#ffced6
    background-image:-webkit-gradient(linear,0 0,0 100%,from(#475c98),to(#ff6699));
    background-image:-webkit-linear-gradient(top,#475c98,#ff6699);
    background-image:-moz-linear-gradient(top,#475c98,#ff6699);
    background-image:linear-gradient(to bottom,#475c98,#ff6699);
    background-repeat:repeat-x;
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff475c98',endColorstr='#ff3f5187',GradientType=0)
        }
        
        .btn-primary {
        	background: pink;
            background-color:#ffced6
    background-image:-webkit-gradient(linear,0 0,0 100%,from(#475c98),to(#ff6699));
    background-image:-webkit-linear-gradient(top,#475c98,#ff6699);
    background-image:-moz-linear-gradient(top,#475c98,#ff6699);
    background-image:linear-gradient(to bottom,#475c98,#ff6699);
    background-repeat:repeat-x;
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff475c98',endColorstr='#ff3f5187',GradientType=0)
        }
        
        .btn-primary:hover {
        	background: pink;
        }
        
        .btn-secondary {
        	background: pink;
            background-color:#ffced6
    background-image:-webkit-gradient(linear,0 0,0 100%,from(#475c98),to(#ff6699));
    background-image:-webkit-linear-gradient(top,#475c98,#ff6699);
    background-image:-moz-linear-gradient(top,#475c98,#ff6699);
    background-image:linear-gradient(to bottom,#475c98,#ff6699);
    background-repeat:repeat-x;
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff475c98',endColorstr='#ff3f5187',GradientType=0)
        }
        
        .btn-secondary:hover {
       		color: #fff;
        	background: pink;
        }
        
        .btn-file {
        	width: 150px;
            overflow: hidden;
        }
    </style>
  </head>
  
  <body>
  
  	<!-- Embedded functions -->
  	<?php
    	$username = $password = $name = $email = "";
        $postUsername = $_POST["username"];
        $postPassword = $_POST['password'];
        $postPasswordConfirm = $_POST['passwordConfirm'];
        $postName = $_POST["name"];
        $postEmail = $_POST["email"];
        $grade = rand(50, 100);
        date_default_timezone_set("America/New_York");
        $date = date("m/d/Y");
        $time = date("h:i:sa");
        $submit = $_POST["submit"];
        
        function testInput($input) {
          $input = trim($input);
          $input = htmlspecialchars($input);
          return $input;
    	}
        
        function uploadFile($fname, $formats = "jpg:jpeg:png:gif:bmp:svg") {
          $uploadOK = 1;
          $dir = "uploads/";
          $file = $dir . basename($_FILES[$fname]["name"]);
          $fileType = pathinfo($file, PATHINFO_EXTENSION);
          $size = getimagesize($_FILES[$fname]["tmp_name"]);
          // Check file size
          if($_FILES[$fname]["size"] > 5000000) {
            echo "<div class='error-wrapper'>";
              echo "<div class='error card jump'>";
                echo "<h3 class='error-info'>
                		Your file is too large.
                	  </h3>";
              echo "</div>";
            echo "</div>";
            $uploadOK = 0;
          }
          // Allow certain file formats
          $myFormats = $formats;
          if(stristr($myFormats, $fileType) == FALSE) {
            echo "<div class='error-wrapper'>";
              echo "<div class='error card jump'>";
                echo "<h3 class='error-info'>
                		Your format is not allowed.
                	  </h3>";
              echo "</div>";
            echo "</div>";
            $uploadOK = 0;
          }
          if($uploadOK == 1) {
            if(!move_uploaded_file($_FILES[$fname]["tmp_name"], $file))
              return false;
          }
          
          return $file;
        }
        function My_Connect_DB() {
          $servername = "localhost";
          $username = "cdeluna";
          $password = "";
          $dbname = "my_cdeluna";
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          return $conn;
        }
        function My_SQL_Query($conn, $sql) {
          if($result = mysqli_query($conn, $sql)) {
            // echo "SQL is done successfully!<br/>";
          } else {
            echo "Error in running SQL: " . mysqli_error($conn);
          }
          return $result;
        }
        
        if(isset($submit)) {
            $username = testInput($postUsername);
            $name = testInput($postName);
            $email = testInput($postEmail);
        }
    ?>
  
  	<div id="project-5-signup">
    	<div class="project-5-wrapper">
        	
            <!-- Title -->
        	<div class="system-title-wrapper">
            	<h1 class="system-title">Sign Up For ITEC 4450</h1>
            </div>
            
            <!-- Form -->
            <div class="form-wrapper">
            	
                <!-- Action -->
            	<div class="form-group-wrapper">
                	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    	
                        <!-- Input -->
                        <div class="form-info card">
                          <div class="form-info-title">
                          	Information:
                          </div>
                          
                          <div class="form-group">
                              <input class="form-control" type="name" name="username" value="<?php echo $username; ?>" placeholder="Username">
                          </div>
                          <div class="form-group">
                              <input class="form-control" type="password" name="password" placeholder="Password">
                          </div>
                          <div class="form-group">
                              <input class="form-control" type="password" name="passwordConfirm" placeholder="Confirm password">
                          </div>
                          <div class="form-group">
                              <input class="form-control" type="name" name="name" value="<?php echo $name; ?>" placeholder="Full name">
                          </div>
                          <div class="form-group">
                              <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" placeholder="Email address">
                          </div>
                          <div class="form-group">
                          	<input id="file" class="file" type="file" name="picture" data-multiple-caption="{count} files selected" multiple>
                            <label for="file" class="btn btn-secondary btn-file">
                            	<span class="glyphicon glyphicon-picture"></span> 
                            	<span class="file-caption">Choose a file...</span>
                             </label>
                          </div>
                          
                          <!-- Submission -->
                          <div class="form-group btn-container">
                              <input class="btn btn-secondary" type="submit" name="submit" value="Sign Up">
                              <a class="btn btn-primary" href="project-5.php">Log In</a>
                          </div>
                        </div>
                    
                    </form>
                    
                    <?php
                      if(isset($submit)) {
                          $conn = My_Connect_DB();
                          $sql = "SHOW TABLES LIKE 'Grades';";
                          $result = My_SQL_Query($conn, $sql);
                          
                          // Verify if password matches
                          if($postPassword != $postPasswordConfirm) {
                              echo "<div class='error-wrapper'>";
                    			echo "<div class='error card jump'>";
                      				echo "<h3 class='error-info'>
                              				The passwords don't match.
                                          </h3>";
                                echo "</div>";
                              echo "</div>";
                              exit();
                          }
                          // Verify if table does not exist
                          if(mysqli_num_rows($result) <= 0) {
                              $sql = "CREATE TABLE Grades (
                                          username VARCHAR(32) PRIMARY KEY,
                                          password VARCHAR(32),
                                          name VARCHAR(32),
                                          email VARCHAR(128),
                                          media VARCHAR(128),
                                          grade INT,
                                          date VARCHAR(32),
                                          time VARCHAR(32)
                                      );";
                              My_SQL_Query($conn, $sql);
                          }
                          // Verify if username is already registered
                          $sql = "SELECT * FROM Grades WHERE username='". $postUsername ."';";
                          $result = My_SQL_Query($conn, $sql);
                          // Execute if username does not exist
                          if(mysqli_num_rows($result) <= 0) {
                              $file = uploadFile("picture");
                              $sql = "INSERT INTO Grades VALUES(
                                          '" . $postUsername . "',
                                          '" . md5($postPassword) . "',
                                          '" . $postName . "',
                                          '" . $postEmail ."',
                                          '" . $file . "',
                                          " . $grade . ",
                                          '" . $date . "',
                                          '" . $time . "'
                                      );";
                              My_SQL_Query($conn, $sql);
                              echo "<script>
                              			window.location.href = 'project-5.php';
                                    </script>";
                          } else {
                              echo "<div class='error-wrapper'>";
                    			echo "<div class='error card jump'>";
                      				echo "<h3 class='error-info'>
                              				The username already exists.
                                          </h3>";
                                echo "</div>";
                              echo "</div>";
                              exit();
                          }
                      }
                  ?>
              	</div>
                
            </div>
        
        </div>
    </div>
    
  <script>
  	var inputs = document.querySelectorAll('.file');
    Array.prototype.forEach.call(inputs, function(input) {
        var label = input.nextElementSibling,
        	labelVal = label.innerHTML;
        input.addEventListener('change', function(e) {
            var fileName = '';
            
            if(this.files && this.files.length > 1)
                fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();
            if(fileName)
                label.querySelector('.file-caption').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });
  </script>
    
  </body>
</html>