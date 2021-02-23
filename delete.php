<?php
	require_once 'db/conn.php';

	if ( !isset ( $_GET['id'] ) ) {
		include 'includes/errormessage.php';
		header( 'Location: viewrecords.php' );
	} else {
		$id = $_GET['id'];
		//Call delete function
		$result = $crud->deleteAttendee($id);
		//Redirect to list
		if ( $result ) {
			header('Location: viewrecords.php');
		} else {
			include 'includes/errormessage.php';
		}
	}