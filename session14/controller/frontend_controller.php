<?php 
	class FrontendController {

		function handleRequestFrontend() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'home_page';
			$action = isset($_GET['action'])?$_GET['action']:'list_product';
			echo "o day chua?";
		}

	}
?>