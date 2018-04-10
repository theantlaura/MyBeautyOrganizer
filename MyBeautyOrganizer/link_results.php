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
    <title>Search Bar</title>
    <!-- Favicon and Core CSS files -->
    <link type="image/png" rel="shortcut icon" href="../images/favicon.png" />
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Embedded styles -->
    <style type="text/css">
    	@import url('https://fonts.googleapis.com/css?family=Raleway:900|Montserrat');
    	
        </style>
  </head>
  
  <body>
  
  	<!-- Embedded functions -->
  	<?php
    	$link = "";
        $postlink = $_GET['link'];
        $submit = $_POST["submit"];
        
        function testInput($input) {
          $input = trim($input);
          $input = htmlspecialchars($input);
          return $input;
    	}     
            
        function My_Connect_DB() {
          $servername = "localhost";
          $username = "mybeautyorganizer";
          $password = "";
          $dbname = "my_mybeautyorganizer";
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
           $search_link = testInput($search_link);
        }
    ?>
  
  	<div>
    	<div>
        	
            
            
            <!-- Form -->
            <div>
            	
                <!-- Action -->
            	<div>
                	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get" enctype="multipart/form-data">
                    	
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
                              <a class="btn btn-primary" href="Login.php">Log In</a>
                          </div>
                        </div>
                    
                    </form>
                    
                    <?php
                      
                          // Verify if table does not exist
                          if(mysqli_num_rows($result) <= 0) {
                              $sql = "CREATE TABLE link_search(link_id int NOT NULL,
                         link varchar (255) NOT NULL,
                         link_tewt longtext NOT NULL,
                         PRIMARY KEY (link_id)
                                          
                                      );";
                              My_SQL_Query($conn, $sql);
                          }
                                       
                             
                              exit();
                          }
                      }
                  ?>
              	</div>
                
            </div>
        
        </div>
    </div>
    
  </body>
</html>
