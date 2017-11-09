<?php

include_once 'dbcon.php';
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
 
  
  header("Location:home.php");
      
}
 
 
 else
 {
  echo "<h4 style='color: red;font-size: 1.5em;'>Incorrect password or email</h4>";	
   

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

				  else{echo"<h4 style='color: red;font-size: 1.5em;'>error</h4>";}
        
             }

		else{
 echo" <h4 style='color: red;font-size: 1.5em;'>the email you entered exist in the sysyem </h4>";
    
            }

}
?>
<link rel ="stylesheet" type="text/css" href="home.css">

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


<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>

<section name>

<form  class="form" action="index.php" method="post" >
      
     <a name="singup">   <h2 class="title">Sign Up</h2><hr/> </a>
      
  

 
      
        <input class="inputs"  type="text"  placeholder="names" name="names" required  />
      
        <input class="inputs" type="email"  placeholder="Email address" name="email" required  />
        <input class="inputs" type="password" placeholder="Password" name="pass" required  />
                      
 

            

          <input type="submit" name="signup" value="Create Account">
            
            
            
        </div> 
      
      </form>

</section>





<style type="text/css">
body{
  background-color: #000000;
}
.form {
  background:  #050505;
  border: 2px solid #37a69b;
  border-radius: 6px;
  height: auto;
  margin: 20px auto 0;
  width: 298px;
  padding-bottom: 10px;
}

input[type="submit"] {
  width:240px;
  height:35px;
  font-size:16px;
  font-weight:bold;
  color:#fff;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  padding-top:6px;
  margin: 29px 0 0 29px;
  border-color:#16A085;
  background-color: #37a69b;
  
}


.inputs{
color:#fff;
  
  border: 2px solid #37a69b;
  border-radius: 4px;
  
   /*box-sizing: border-box;*/
  color: #000;
  height: 39px;
  margin: 31px 0 0 29px;
  font-size: 1.3em;
  width: 240px;
}
.title{
  font-size: 2em;
  text-align: center;
  color: #37a69b;
}
.tmenu{
  position: fixed;

}
.navtop{

  padding: 50px 0px 30px 0px;
    }
.navtop ul li { 
  padding:20px 2  0px;
  display:inline-block;
  margin-right: 2px;
  
 }
.navtop li a{
  background-color:#37a69b;
  text-decoration: none;
  color:#FFF;
  font-size:1.5em;
  padding:20px 40px;
  transition: all 0.5s ease-in-out;  
}
h1{
  color:#fff;
  padding: 50px;
  text-align: center;
  /*font-size: 3em; */
  
}

      </style>