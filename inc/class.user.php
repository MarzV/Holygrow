<?php
class User
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    public function register($fname,$lname,$uname,$umail,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO users(user_name,user_email,user_pass) VALUES(:uname, :umail, :upass)");
              
           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['user_pass']))
             {
                $_SESSION['user_session'] = $userRow['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return isset($_SESSION['user_session']);
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

   public function book($user_id, $address, $arrival, $departure, $room_id)
   {
      try
      {
        $stmt = $this->db->prepare("INSERT INTO bookings(user_id,address,arrival,departure,room_id) VALUES(:user_id, :address, :arrival, :departure, :room_id)");
                  
        $stmt->bindparam(":user_id", $user_id);
        $stmt->bindparam(":address", $address);
        $stmt->bindparam(":arrival", $arrival);      
        $stmt->bindparam(":departure", $departure);
        $stmt->bindparam(":room_id", $room_id);       
        $stmt->execute(); 
       
        return $stmt; 
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }    
   }

   public function add_room($room_name, $room_discription, $image_url){
      $stmt = $this->db->prepare("INSERT INTO rooms(room_name,room_discription,image_url) VALUES (:room_name, :room_discription, :image_url)");

      $stmt->bindparam(":room_name", $room_name);
      $stmt->bindparam(":room_discription", $room_discription);
      $stmt->bindparam(":image_url", $image_url);
      $stmt->execute();

      return $stmt;
   }
}
?>
