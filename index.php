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
              header('location:https://quocthang.herokuapp.com/');
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
              $success = '<a href="https://quocthang.herokuapp.com/?k='.$key.'" target="_blank">https://quocthang.herokuapp.com/?k='.$key.'</a>';
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
</head>
<body>
	<!--
	(\___/)
	{• . •}
	//> ♥ "Copyright © 2019 Quoc Thang"-->
	<script src="js/loader.js"></script>
	<div id='main' align="center">
	<div class='container'>
	  <div  style='margin-top:50px;margin-bottom:30px;text-align:center;'>
	    <img src='./images/quocthang.png' style='width: 100px;margin-bottom:15px'>
	    <h1><span class="highlight">RÚT GỌN URL</span></h1>
	  </div>
	  <div class="w"></div>
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
	    <td>quocthang.herokuapp.com/?k=<?=$k?></td>
	    <td><?=$v?></td>
	    <td>
	      <div align="center">
	        <a href="delete.php?k=<?=$k?>" title="Xóa" onclick="return confirm('Bạn có thật sự muốn xóa?')">
	          <i class="far fa-trash-alt"></i>
	        </a>
	      </div>
	    </td>
	    <? $stt++; ?>
	  </tr>
	  <?endforeach?>
	  <?endif?>
	</table>
	</div>
	<br/>
	<div class="w"></div>
	<div class="footer">
	  <p>Developed by&ensp;
	      <i class='fa fa-heart animation-heart infinite animation-pulse'></i>&ensp;
	      <a href="https://facebook.com/100012349937086" data-tooltip='Facebook' href='javascript:void(0);' target="_blank" rel="nofollow">Quoc Thang</a>
	  </p>
	  <p>Copyright © 2019 
	      <a href="https://gnahtcouq.github.io" id='tranvanquocthang' data-tooltip='Website' href='javascript:void(0);' target="_blank" rel="nofollow">Quoc Thang</a>. All rights reserved.
	  </p>
	</div>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/quocthang.js"></script>
</body>
</html>
