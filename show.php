<?php
require_once("inc/config.php");
require_once("inc/header.php");
	if(!$user->is_loggedin())
	{
		$user->redirect('index.php');
	}
?>
		<h2>Reservaties: </h2>
        <br>
        <p>Hier kun je alle informatie vinden over de boekingen.</p>
        <br>
		<table class="table">
			<tr>
				<th>Id</th><th>Klant_ID</th><th>Adres</th><th>Aankomst</th><th>Vertrek</th><th>Kamer_ID</th>
			</tr>
	     <?php
	        $stmt = $db->prepare("SELECT * FROM bookings");
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$id = $row['id'];
				$user_id = $row['user_id'];
				$address = $row['address'];
				$arrival = $row['arrival'];
				$departure = $row['departure'];
				$room_id = $row['room_id'];
			?>
				 <tr>
				 	<td><?php echo $id;?></td><td><?php echo $user_id;?></td><td><?php echo $address;?></td><td><?php echo $arrival;?></td><td><?php echo $departure;?></td><td><?php echo $room_id;?></td>
				 </tr>
			<?php
			}
	     ?>
	    </table>
	    </div>
	</div>
</div>
</body>
</html>      
