<!DOCTYPE html>
<html>
<head>
	<title>Download File From .txt - Quoc Thang</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="d1HiF79L13twZWw1Obz4Mh4VTPvMyh1xSvr_onLWMwI"/>
	<meta name="description" content="Owned by Quoc Thang from J2TEAM">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Quoc Thang">
	<meta property="og:url" content="https://gnahtcouq.github.io/">
	<meta property="og:site_name" content="gnahtcouq.github.io">
	<meta property="og:description" content="Owned by Quoc Thang from J2TEAM.">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/quocthang.css">
	<link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="css/loader.css">
	<link rel="stylesheet" type="text/javascript" href="js/loader.js">
	<link rel="stylesheet" type="text/javascript" href="js/heart-effect.js">
	<link rel="stylesheet" type="text/javascript" href="js/quocthang.js">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
	<!--
	(\___/)
	{• . •}
	//> ♥ "Copyright © 2019 Quoc Thang"-->
    <div id="particles-js">
        <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;"></canvas>
    </div>
    <script src="js/loader.js"></script>
	<div class="quocthang">
		<div id='main' align="center">
			<div class='container'>
				<div  style='margin-top:50px;margin-bottom:30px;text-align:center;'>
					<img src='./images/quocthang.png' style='width: 100px;margin-bottom:15px'>
					<h1><span class="highlight">DOWNLOAD FILE FROM .TXT</span></h1>
				</div>
				<div class="w"></div>
				<form method="post" enctype="multipart/form-data">
					<div align="left">Nhập tệp .txt chứa link ảnh hoặc video (cách nhau xuống dòng):</div>
					<input type="file" class="instinput" name="file" accept=".txt">
					<br/>
					<div align="left">Nhập số dòng muốn bỏ cách (có thể để trống):</div>
					<input type="number" class="instinput" name="number_line">
					<br/>
					<div align="left">Tên thư mục chứa (có thể để trống):</div>
					<input type="text" class="instinput" name="folder" autocomplete="off">
					<br/>
					<button type="submit" class="instabutton">OK</button>
				</form>
	<?php
		ini_set('max_execution_time', 0);
		if(isset($_POST['button_submit'])){
			$file        = $_FILES['file'];
			$number_line = empty($_POST['number_line']) ? 0 : $_POST['number_line'];
			$folder      = empty($_POST['folder']) ? '' : $_POST['folder']."/";
			$data  = file_get_contents($file['tmp_name']);
			$array = preg_split( '/\r\n|\r|\n/', $data );
			$array = array_slice($array, $number_line);
			foreach ($array as $key => $each) {
				$name_file = substr($each, strrpos($each, '/') + 1);
				$fp    = fopen ($folder.$name_file , 'w+');
	            $links = $each;
	            $curls = curl_init();
	            curl_setopt_array($curls, array(
	                CURLOPT_URL => $links,
	                CURLOPT_TIMEOUT => 0,
	                CURLOPT_SSL_VERIFYPEER => false,
	                CURLOPT_SSL_VERIFYHOST => false,
	                CURLOPT_FILE => $fp
	            ));
	            curl_exec($curls);
	            curl_close($curls);
	            fclose($fp);
	            $key++;
	            echo "Đã tải $key ảnh<br>";
			}
		}
	?>
			</div>
		</div>
	</div>
	<br/>
	<div class="w"></div>
</body>
</html>