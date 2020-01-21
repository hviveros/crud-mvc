<?php

require_once 'models/admin.php';

class AdminController {

	public function dashboard() {
		session_start();
		if ($_SESSION['id_rol'] != 1) {
			header('Location: index.php?page=login');
			die();
		} else {
			require_once('./views/includes/cabecera.php');
    		require_once('./views/admin/dashboard.php');
			require_once('./views/includes/pie.php');
		}
	}


}