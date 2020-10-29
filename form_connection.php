<?php 
if ($showForm) {
	if (!empty($_SESSION['auth'])) {
		require($_SERVER['DOCUMENT_ROOT'] . '/include/form_exit.php');
	} else {
		require($_SERVER['DOCUMENT_ROOT'] . '/include/form_auth.php');
	}
} 
