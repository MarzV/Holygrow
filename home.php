<?php
include_once 'inc/config.php';
require_once("inc/header.php");

if(!$user->is_loggedin())
{
	$user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $db->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

		<h2>Admin panel</h2>
	    Welcome: <?php print($userRow['user_name']); ?><br />
        <button onclick="window.location='book.php'">Boek een kamer</button><br />
		<button onclick="window.location='show.php'">Bekijk reserveringen</button><br />
        <button onclick="window.location='show_rooms.php'">Bekijk kamers</button><br />
        <button onclick="window.location='add_room.php'">Kamer toevoegen</button><br />
        <button onclick="window.location='logout.php?logout=true'">log uit</button><br />
	</div>
</div>
</body>
</html>