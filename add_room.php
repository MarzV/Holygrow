<?php
require_once("inc/config.php");
require_once("inc/header.php");

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

if (isset($_POST['btn-add_room'])) {
    $room_name = $_POST['room_name'];
    $room_discription = $_POST['room_discription'];
    $image_url = $_POST['image_url'];

    if ($user->add_room($room_name, $room_discription, $image_url)) {
        $user->redirect('home.php');
    } else {
        $error = "Something went wrong!";
    }
}
?>

        <h2>Kamer toevoegen!</h2>
        <form action="#" method="post">
            <?php
            if (isset($error)) {
                ?>
                <div class="alert alert-danger">
                    &nbsp; <?php echo $error; ?> !
                </div>
                <?php
            }
            ?>
            <label>Kamer naam: </label><input type="text" name="room_name" placeholder="Kamer naam" required>
            <label>Kamer beschrijving: </label><textarea type="text" name="room_discription" placeholder="Beschrijving van de kamer" required></textarea>
            <label>Kamer afbeelding:</label><input type="text" name="image_url" placeholder="URL voor image">
            <br>
            <button type="submit" name="btn-add_room">Kamer toevoegen</button>
        </form>
        <a href="home.php">Home</a><br/>
        <a href="show.php">Show reservations</a><br/>
        <a href="show_rooms.php">Show rooms</a><br/>
        <a href="add_room.php">Add a room</a><br/>
        <a href="homepagina.php">Go back to the front page</a>
    </div>
</div>
</body>
</html>      
