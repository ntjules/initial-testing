<?php
session_start();

include_once './include/dbcon.php';
$data=pg_escape_string(trim("c"));
$hashed = hash('sha512', $data);


//$hashed2 = hash('sha256', $data);

 echo $hashed;echo "<br>";
 // echo $hashed2;


 /* $result = pg_query($dbcon, "SELECT * FROM users" );
   if ($result) {
    $row = pg_fetch_row($result);
    $rows=pg_fetch_array($result);

echo $rows['names'];
     echo "good";


     $count = pg_num_rows($result);
     echo $count;*/
     
   /* while ($row = pg_fetch_assoc($result)) {
  echo $row['names'];
}
   }*/

/*
$query = "SELECT * FROM users LIMIT 5"; 

$rs = pg_query($dbcon, $query) or die("Cannot execute query: $query\n");

$rst = pg_query($dbcon, "SELECT * FROM users WHERE email='test@test.com' LIMIT 5") or die("Cannot execute query: $query\n");
$count = pg_num_rows($rst);
     echo $count;
$ro=pg_fetch_array($rst);
echo $ro['names'];



 $queryi = pg_query($dbcon, "SELECT * FROM users WHERE email='test@test.com'");
 $row=pg_fetch_array($queryi);
 echo $row['password'];
 




while ($row = pg_fetch_assoc($rs)) {
    echo $row['id'] . " " . $row['names'] . " " . $row['email'];
    echo "\n";
}


pg_close($dbcon);



*/




if(isset($_POST['login']))
{
 /*$emails = $dbcon->real_escape_string(trim($_POST['emails']));
 $passs = $dbcon->real_escape_string(trim($_POST['passs']));*/

 $emails =pg_escape_string(trim($_POST['emails']));
 $passs =pg_escape_string(trim($_POST['passs']));

 $hashpasss=hash('sha512', $passs);
 
 
 $query = pg_query($dbcon, "SELECT * FROM users WHERE email='$emails'");
 $row=pg_fetch_array($query);



  if($hashpasss == $row['password'])
 {
  $_SESSION['user'] = $row['id'];
  header("Location:./pages/home.php");   
 }
 
 
 else
 {
  echo "<h4 style='color: red;font-size: 1.5em;text-align:center;'>Incorrect password or email</h4>";	
   

}
 
pg_close($dbcon);

}


if(isset($_POST["signup"]))
{
      
   $name=pg_escape_string(trim($_POST["names"]));
   $email=pg_escape_string(trim($_POST["email"]));
   $password=pg_escape_string(trim($_POST["pass"]));
   $hashpass=hash('sha512', $password);
   

       $check_email = pg_query($dbcon,"SELECT email FROM users WHERE email='$email'");
 $count=pg_num_rows($check_email);
 
 if($count==0){


          $query = "INSERT INTO users(names,email,password)VALUES('$name','$email','$hashpass')";

                     
 $result = pg_query($dbcon,$query);
				pg_close($dbcon);

          

			
			
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


