<?
	if(isset($_GET['k'])){
		// Khai báo mảng
		$data = array();

		// Lấy dữ liệu hiện tại (nếu có)
		if(file_exists('data.txt')){
			$json = file_get_contents('data.txt');
			$data = json_decode($json, true);
		}

		if(isset($data[$_GET['k']])){ // Có tồn tại link rút gọn
			unset($data[$_GET['k']]);
		}

		// Ghi đè lại dữ liệu
		file_put_contents('data.txt', json_encode($data));
	}

	header('location:https://gnaht.herokuapp.com/');exit;
?>
