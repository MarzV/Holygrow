<?php
require_once("inc/config.php");
require_once("inc/header.php");

	if(!$user->is_loggedin())
	{
		$user->redirect('index.php');
	}

	if(isset($_POST['btn-book']))
	{	
		$user_id = $_SESSION['user_session'];
		$stmt = $db->prepare("SELECT `user_id` FROM users WHERE user_id=:user_id");
		$stmt->execute(array(":user_id"=>$user_id));
		$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

		$address = $_POST['address'];
		$arrival = $_POST['arrival'];
		$departure = $_POST['departure'];
		$room = $_POST['room'];

		if($user->book($user_id, $address, $arrival, $departure, $room))
		{
			$user->redirect('home.php');
		}
		else
		{
			$error = "Something went wrong!";
		} 
	}
?>
        <h2>Boek een kamer!</h2>
         <br>
        <form action="#" method="post">
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
		<label>Adres: </label><input type="text" name="address" placeholder="Adres" required>
		<label>Aankomst: </label><input type="date" name="arrival" placeholder="[DD-MM-JJJJ]" required>
		<label>Vertrek: </label><input type="date" name="departure" placeholder="[DD-MM-JJJJ]" required>
		<label>Kamer: </label><select name="room" required>
			<?php
				$rooms=$db->prepare("SELECT * FROM rooms");
				$rooms->execute();
				while($row = $rooms->fetch(PDO::FETCH_ASSOC)){
					$room_id = $row['id'];
					$room_name = $row['room_name'];

					echo "<option value='$room_id'>$room_name</option>";
				}
			?>
		</select><br />
            <table class="hoogseizoen">
                <tr>
                    <td colspan="2">Hoogseizoen</td>
                </tr>
                <tr>
                    <td>Lente</td>
                    <td>11-1-11</td>
                </tr>
                <tr>
                    <td>Zomer</td>
                    <td>22-2-22</td>
                </tr>
                <tr>
                    <td>Hersft</td>
                    <td>33-3-33</td>
                </tr>
                <tr>
                    <td>Winter</td>
                    <td>44-4-44</td>
                </tr>
            </table>
		<button type="submit" name="btn-book">Boek!</button>
	</form>
    </div>
</div>
</body>
</html>      
