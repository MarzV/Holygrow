<?php
require_once 'inc/config.php';
require_once("inc/header.php");

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
   $uname = trim($_POST['txt_uname']);
   $umail = trim($_POST['txt_umail']);
   $upass = trim($_POST['txt_upass']); 
 
   if($uname=="") {
      $errors[] = "Inlog naam!";
   }
   else if($umail=="") {
      $errors[] = "provide email id !"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Dit Email adress is niet geldig !';
   }
   else if($upass=="") {
      $errors[] = "provide password !";
   }
   else if(strlen($upass) < 6){
      $errors[] = "Wachtwoord moet 6 tekens lang zijn";
   }
   else
   {
      try
      {
         $stmt = $db->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['user_name']==$uname) {
            $errors[] = "Inlog naam is al in gebruik !";
         }
         else if($row['user_email']==$umail) {
            $errors[] = "Dit email is al in gebruik!";
         }
         else
         {
            if($user->register($fname,$lname,$uname,$umail,$upass)) 
            {
                $user->redirect('signup.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>
     <div class="form-container">
        <form method="post">
            <h2>Registreren</h2>
            <br><center>
            <?php
            if(isset($errors))
            {
               foreach($errors as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                    &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                    &nbsp; Account succesvol aangemaakt <a href='index.php'>login</a> hier
                 </div>
                 <?php
            }
            ?>
            </center><br>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="John Doe" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="johndoe@gmail.com" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="txt_upass" placeholder="Wachtwoord" />
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                &nbsp;Registreer
             </button>
            </div>
            <br />
            <center>Heb je al een account? <a href="index.php">Login</a></center>
        </form>
       </div>
</div>

</body>
</html>