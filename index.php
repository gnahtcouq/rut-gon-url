<?
// Chuyển từ rút gọn đến link gốc
if(isset($_GET['k'])){
	// Khai báo mảng
	$data = array();
	// Lấy dữ liệu hiện tại (nếu có)
	if(file_exists('data.txt')){
			$json = file_get_contents('data.txt');
			$data = json_decode($json, true);
	}
	if(isset($data[$_GET['k']])){ // Có tồn tại link rút gọn
			header('location:'.$data[$_GET['k']]);
	}else{ // Không tồn tại link rút gọn
			header('location:https://quocthang.best/');
	}
	exit;
}
// Khai báo biến
$post = array(
	'url'=>''
);
// Khi người dùng submit
if(count($_POST)){
	// 1. Lấy dữ liệu nhập
	$post['url'] = trim($_POST['url']);
	// 2. Kiểm tra dữ liệu
	if(!$post['url']){
			$errors['url'] = 'Chưa nhập liên kết';
	}elseif(!filter_var($post['url'], FILTER_VALIDATE_URL)){
			$errors['url'] = 'Chỉ cho phép nhận liên kết URL';
	}
	// 3. Nếu dữ liệu đúng thì xử lý
	if(!isset($errors)){
			// Khai báo mảng
			$data = array();
			// Lấy dữ liệu hiện tại (nếu có)
			if(file_exists('data.txt')){
				$json = file_get_contents('data.txt');
				$data = json_decode($json, true);
			}
			// Thêm phần tử vào mảng
				$key = substr(md5(time().'-'.rand(100000, 999999)), 0, 6);
				$data[$key] = $post['url'];
			// Chuyển mảng thành JSON và lưu vào file TXT
			file_put_contents('data.txt', json_encode($data));
			// Thành công
			$success = '<a href="https://quocthang.best/?k='.$key.'" target="_blank">https://quocthang.best/?k='.$key.'</a>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rút Gọn URL - Quoc Thang</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="d1HiF79L13twZWw1Obz4Mh4VTPvMyh1xSvr_onLWMwI"/>
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel='stylesheet' href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel='stylesheet' href="assets/css/style.css">
</head>
<body>
    <div id="particles-js">
        <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;"></canvas>
    </div>
	<div class="user-input">
		<div id='main' align="center">
			<div class='container'>
				<div style='margin-top:50px;margin-bottom:30px;text-align:center;'>
				<img src='assets/images/quocthang.png' style='width: 100px;margin-bottom:15px'>
				<h3><span class="highlight">RÚT GỌN URL</span></h3>
			</div>
			<div class="line"></div>
			<form method="post" action="">
				<?
				if(isset($errors['url'])){
					echo '<div class="error">'.$errors['url'].'</div>';
				}elseif(isset($success)){
					echo '<div class="success">'.$success.'</div>';
				}
				?>
				<input type="text" name="url" value="" class="instinput" placeholder="Liên kết cần rút gọn" autocomplete="off">
				<button type="submit" class="instabutton">Rút gọn đi chờ gì nữa ^^ ~</button>
			</form>
		</div>
	</div>

	<br/>

	<div class="line"></div>

	<div align="center">
		<table cellpadding="30px" cellspacing="0px" width="95%" id="table">
			<tr>
				<th>//</th>
				<th>Liên kết rút gọn</th>
				<th>Liên kết gốc</th>
				<th>Xóa</th>
			</tr>

			<?
			// Khai báo biến
			$data = array();
			// Lấy dữ liệu ra (nếu có)
			if(file_exists('data.txt')){
				$json = file_get_contents('data.txt');
				$data = json_decode($json, true);
			}
			// Đảo mảng
			$data = array_reverse($data, TRUE);
			?>

			<?if(!count($data)):?>
				<tr>
					<td colspan="4" align="center"><br/><center>Oops, chưa có dữ liệu !!</center><br/></td>
				</tr>
				
				<?else:?>
					<? $stt = 1; ?>
					<?foreach($data as $k=>$v):?>
						<tr>
							<td><?=$stt?></td>
							<td>quocthang.best/?k=<?=$k?></td>
							<td><?=$v?></td>
							<td><a href="delete.php?k=<?=$k?>" title="Xóa" onclick="return confirm('Bạn có thật sự muốn xóa?')"><i class="far fa-trash-alt"></i></a></td>
							<? $stt++; ?>
						</tr>
					<?endforeach?>
			<?endif?>
		</table>
	</div>

	<br/>

	<div class="line"></div>
	<div class="footer">
		&copy; 2020 made with by <a href="https://facebook.com/100012349937086" target="_blank" rel="nofollow">Quoc Thang</a>.
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/index.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	<script src="assets/js/particles.js"></script>
</body>
</html>
