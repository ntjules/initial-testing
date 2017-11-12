<?php
session_start();

include_once './include/dbcon.php';
/*$data="pass";
$hashed = hash('sha512', $data);
$hashed2 = hash('sha256', $data);

 echo $hashed;echo "<br>";
 echo $hashed2;*/

if(isset($_POST['login']))
{
 $emails = $MySQLi_CON->real_escape_string(trim($_POST['emails']));
 $passs = $MySQLi_CON->real_escape_string(trim($_POST['passs']));
 $hashpasss=hash('sha512', $passs);
 
 
 $query = $MySQLi_CON->query("SELECT * FROM users WHERE email='$emails'");
 $row=$query->fetch_array();



  if($hashpasss == $row['password'])
 {
  $_SESSION['user'] = $row['id'];
  header("Location:./pages/home.php");   
 }
 
 
 else
 {
  echo "<h4 style='color: red;font-size: 1.5em;text-align:center;'>Incorrect password or email</h4>";	
   

}
 
 $MySQLi_CON->close();

}


if(isset($_POST["signup"]))
{
      
   $name=$_POST["names"];
   $email=$_POST["email"];
   $password=$_POST["pass"];
   $hashpass=hash('sha256', $password);
   

       $check_email = $MySQLi_CON->query("SELECT email FROM users WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if($count==0){


          $query = "INSERT INTO users(names,email,password)VALUES('$name','$email','$hashpass')";

                     
 $result = mysqli_query($MySQLi_CON,$query);
				mysqli_close($MySQLi_CON);

          

			
			
                if($result)
				 {echo"successfully registered ";}

				  else{echo"<h4 style='color: red;font-size: 1.5em;text-align:center;'>error</h4>";}
        
             }

		else{
 echo" <h4 style='color: red;font-size: 1.5em;text-align:center;'>the email you entered exist in the sysyem </h4>";
    
            }

}
?>
<link rel ="stylesheet" type="text/css" href="./css/css.css">

<!-- <A HREF="#singin">sign in</A>
<A HREF="#singup">sign up</A> -->
<div class="tmenu">
    <nav class="navtop">
       <ul class="top_menu clearfix">
          <li><a href="#signin">sign in</a></li>
          <li><a href="#singup">sign up</a></li>
    </ul>
      </nav>
    </div><a name="signin">
    <h1>welcome, <br>this is just testing app</h1>
</a>
<div class="form">
<a name="signins"><h2 class="title">Sign In</h2><hr/></a>
				     
				<form action="index.php" method="post">
				
					<input class="inputs" type="email" placeholder="Email address" name="emails" required>
					<input class="inputs" type="password"  placeholder="Password" name="passs" required>
				 
					<input  type="submit" name="login" value="login"/>
          
					
					
				</form>

</div>





 
     <a name="singup"> <center><h1 style="padding-bottom: 25px;padding-top: 180px;">please use a valid and unused email</h1></center></a>
<form  class="form" action="index.php" method="post" >
       <h2 class="title">Sign Up</h2><hr/>  
      
  

 
      
        <input class="inputs"  type="text"  placeholder="names" name="names" required  />
        <input class="inputs" type="email"  placeholder="Email address" name="email" required  />
        <input class="inputs" type="password" placeholder="Password" name="pass" required  />        

          <input type="submit" name="signup" value="Create Account">
        
      </form>


