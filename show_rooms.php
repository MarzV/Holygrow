<?php
require_once("inc/config.php");
require_once("inc/header.php");
	if(!$user->is_loggedin())
	{
		$user->redirect('index.php');
	}
?>
		<h2>Kamers: </h2>
		<table class="rooms">
			<tr>
				<th>Id</th><th>Kamer naam</th><th>Delete/update</th>
			</tr>
	     <?php
	        $stmt = $db->prepare("SELECT * FROM rooms");
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$id = $row['id'];
				$room_name = $row['room_name'];
			?>
				 <tr>
				 	<td><?php echo $id;?></td><td><?php echo $room_name;?></td><td> <?= '<a href="delete_room.php?action=delete&id='.$id.'">';?>Delete</a></td>
				 </tr>
			<?php
			}
	     ?>
	    </table>
		<a href="home.php">Home</a><br />
		<a href="show.php">Bekijk reservaties</a><br />
		<a href="show_rooms.php">Bekijk kamers</a><br />
		<a href="add_room.php">Voeg een kamer toe</a><br />
		<a href="homepagina.php">Terug naar index</a>
	    </div>
	</div>
</div>
</body>
</html>      
