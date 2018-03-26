<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  
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
            
                echo "<h3>
                		Your file is too large.
                	  </h3>";
              
            $uploadOK = 0;
          }
          // Allow certain file formats
          $myFormats = $formats;
          if(stristr($myFormats, $fileType) == FALSE) {
            
                echo "<h3>
                		Your format is not allowed.
                	  </h3>";
              
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
          $username = "lauraarevaloportfolio";
          $password = "";
          $dbname = "my_lauraarevaloportfolio";
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
  
  	<div>
    	<div>
        	
            <!-- Title -->
        	<div>
            	<h1>Sign Up My Beauty Organizer</h1>
            </div>
            
            <!-- Form -->
            <div>
            	
                <!-- Action -->
            	<div>
                	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    	
                        <!-- Input -->
                        <div>
                          <div>
                          	Information:
                          </div>
                          
                          <div>
                              <input type="name" name="username" value="<?php echo $username; ?>" placeholder="Username">
                          </div>
                          <div>
                              <input type="password" name="password" placeholder="Password">
                          </div>
                          <div>
                              <input type="password" name="passwordConfirm" placeholder="Confirm password">
                          </div>
                          <div>
                              <input type="name" name="name" value="<?php echo $name; ?>" placeholder="Full name">
                          </div>
                          <div>
                              <input  type="email" name="email" value="<?php echo $email; ?>" placeholder="Email address">
                          </div>
                          <div>
                          	<input id="file"  type="file" name="picture" data-multiple-caption="{count} files selected" multiple>
                            <label for="file" class="btn btn-secondary btn-file">
                            	
                            	<span> Choose a file...</span>
                             </label>
                          </div>
                          
                          <!-- Submission -->
                          <div>
                              <input  type="submit" name="submit" value="Sign Up">
                              <a class="btn btn-primary" href="Login_Project.php">Log In</a>
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
                              
                      				echo "<h3>
                              				The passwords don't match.
                                          </h3>";
                                
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
                              			window.location.href = 'Login_Project.php';
                                    </script>";
                          } else {
                              
                      				echo "<h3>
                              				The username already exists.
                                          </h3>";
                               
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