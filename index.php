<?php

include_once 'dbcon.php';

if(isset($_POST['login']))
{
 $emails = $MySQLi_CON->real_escape_string(trim($_POST['emails']));
 $passs = $MySQLi_CON->real_escape_string(trim($_POST['passs']));
 
 $query = $MySQLi_CON->query("SELECT * FROM users WHERE email='$emails'");
 $row=$query->fetch_array();



  if($passs == $row['password'])
 {
 
  
  header("Location:home.php");
      
}
 
 
 else
 {
  echo "Incorrect password or email";	
   

}
 
 $MySQLi_CON->close();
 



}










if(isset($_POST["signup"]))
{
      
   $name=$_POST["names"];
   $email=$_POST["email"];
   $password=$_POST["pass"];
   

       $check_email = $MySQLi_CON->query("SELECT email FROM users WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if($count==0){


          $query = "INSERT INTO users(names,email,password)VALUES('$name','$email','$password')";

                     
 $result = mysqli_query($MySQLi_CON,$query);
				mysqli_close($MySQLi_CON);

          

			
			
                if($result)
				 {echo"successfully registered ";}

				  else{echo"error";}
        
             }

		else{
 echo"the email you entered exist in the sysyem ";
    
            }

}
?>

<h3 class="white">Sign In</h3>
				     
				<form action="index.php" method="post">
				
					<input type="email" placeholder="Email address" name="emails" required>
					<input type="password"  placeholder="Password" name="passs" required>
				 
					<button type="submit" name="login">login</button>
          
					
					
				</form>




<form action="index.php" method="post" >
      
        <h2>Sign Up</h2><hr />
      
  

 
      
        <input type="text"  placeholder="names" name="names" required  />
      
        <input type="email"  placeholder="Email address" name="email" required  />
        <input type="password" placeholder="Password" name="pass" required  />
                      
 

            

          <button type="submit" name="signup">Create Account</button> 
            
            
            
        </div> 
      
      </form>