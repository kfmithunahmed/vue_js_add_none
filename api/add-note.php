<?php

include '../Note.php';

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['author_id'])) {
	
	$note = new Note();
	if ($note->addNote($_POST['title'], $_POST['description'], $_POST['author_id'])) {
		echo json_encode(['status' => 'success']);
	}else{
		echo json_encode(['status' => 'error', 'message' => 'Query not working !!']);
	}
}else{
	echo json_encode(['status' => 'error', 'message' => 'Not isset Everything !!']);
}