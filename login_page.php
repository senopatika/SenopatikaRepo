<?php
	session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) { 
		extract($_REQUEST);   
	    $login = $user->check_login($user, $password);
	    if ($login) {
	        // Registration Success
	       header("location:admin.php");
	    } else {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        Senopatika
    </title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script language="javascript" type="text/javascript"> 
            
            function submitlogin() {
                var form = document.login;
				if(form.emailusername.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}	 
			}
		</script>
</head>
<body>

<form action="" method="post" name="login" >
  <h1>Administrator Log in</h1>
  <div class="inset">
  <p>
    <label for="username">USERNAME</label>
    <input type="text" name="emailusername" id="username" required style="color:#FFF">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input type="password" name="password" id="password" required style="color:#FFF">
  </p>
  
  </div>
  <p class="p-container">
    
    <input type="submit" name="submit" id="go" value="Log in" onclick="return(submitlogin());">
  </p>
</form>

</body>
</html>
