<?php
	require_once('inc/config.php');

	$action = $_GET['action'];
	$id = $_GET['id'];

	if($action == "delete")
	{
		try
		{
			$stmt=$db->prepare("
								DELETE FROM `rooms` WHERE `id` = :id");
			$stmt->execute([':id' => $id]);
			header('location: show_rooms.php');
		}
		catch(PDOException $e)
		{
			$sMsg = '<p>
	                    Regelnummer: '.$e->getLine().'<br />
	                    Bestand: '.$e->getFile().'<br />
	                    Foutmelding: '.$e->getMessage().'
	                </p>';

            trigger_error($sMsg);
		}

	}

?>