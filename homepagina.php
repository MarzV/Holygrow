<?php
require_once("inc/config.php");
require_once("inc/header.php");

?>
<div class="page-home">
    <div class="inhoud">
        <h2>Dit hotel is het hotel van de toekomst!</h2>

        <p>Als je een kamer wilt boeken, heb je wel een account nodig!
            <br>Nog geen account?<br><br>
            <button onclick="window.location='signup.php'">Registreer nu!</button>
        </p>
    </div>
    <br>
    <?php
    $stmt = $db->prepare("SELECT * FROM rooms");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $room_name = $row['room_name'];
        $room_discription = $row['room_discription'];
        $image_url = $row['image_url'];
        ?>
        <div class="room_box">
            <div class="room_content">
                <h4><?php echo $room_name; ?></h4>
                <img src="<?php echo $image_url; ?>" class="room_images">
                <p class="image_paragraph"><?php echo $room_discription; ?>
                    <br/><br/>
                    <button class="btn-book" onclick="window.location='book.php'">Boek deze kamer</button>
                </p>
            </div>
            <br>
        </div>
        <?php
    }
    ?>
</div>
</div>
</div>
</body>
</html>      
