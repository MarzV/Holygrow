<?php
require_once 'inc/config.php';
require_once("inc/header.php");

if($user->is_loggedin()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
 $uname = $_POST['txt_uname_email'];
 $umail = $_POST['txt_uname_email'];
 $upass = $_POST['txt_password'];
  
 if($user->login($uname,$umail,$upass))
 {
  $user->redirect('home.php');
 }
 else
 {
  $error = "Wrong Details !";
 } 
}
?>
     <div class="form-container">
        <form method="post">
            <h2>Log in</h2>
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text" class="form-control" name="txt_uname_email" placeholder="Email" required />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="txt_password" placeholder="Wachtwoord" required />
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
             <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                 &nbsp;Log in
             </button>
            </div>
            <br />
            <center>Nog geen account? <a href="signup.php">Registreer nu!</a></center>
        </form>
       </div>
</div>

</body>
</html>