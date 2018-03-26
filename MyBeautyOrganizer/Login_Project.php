<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    
    	
      
  </head>
  
  <body>
  
  	<!-- Embedded functions -->
  	<?php
    	$username = $password = "";
        $postUsername = $_POST["username"];
        $submit = $_POST["submit"];
        
        function testInput($input) {
          $input = trim($input);
          $input = htmlspecialchars($input);
          return $input;
    	}
        
        if(isset($submit)) {
            $username = testInput($postUsername);
        }
    ?>
  
  	<div>
    	<div>
        	
            <!-- Title -->
        	<div>
            	<h1 ></h1>
            </div>
            
            <!-- Form -->
            <div>
            	
                <!-- Action -->
            	<div>
                	<form action="Login_Project_Action.php" method="post">
                    	
                        <!-- Input -->
                        <div>
                          <div>
                          	Information:
                          </div>
                          
                          <div>
                              <input type="name" name="username" value="<?php echo $username; ?>" placeholder="Username">
                          </div>
                          <div class="form-group">
                              <input type="password" name="password" placeholder="Password">
                          </div>
                          
                          <!-- Submission -->
                          <div>
                              <input type="submit" name="submit" value="Log In">
                              <a  href="Login_Project_Signup.php">Sign Up</a>
                          </div>
                        </div>
                    
                    </form>
              	</div>
                
            </div>
        
        </div>
    </div>
    
  </body>
</html>