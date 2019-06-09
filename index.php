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
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="gRAR5UIlxj4N2AnNQYN7YKo1gHMs4w4rEmpBEDcYNxg" />
	<meta name="description" content="Owned by Quoc Thang.">
    	<meta property="og:type" content="website">
    	<meta property="og:title" content="Quoc Thang">
    	<meta property="og:url" content="https://quocthang.gq/">
    	<meta property="og:site_name" content="QUOCTHANG.GQ">
    	<meta property="og:description" content="Owned by Quoc Thang.">

    	<title>Rút Gọn URL - Quoc Thang</title>

    	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    	<link rel="stylesheet" type="text/css" href="css/quocthang.css">
    	<link rel="stylesheet" type="text/javascript" href="js/nanobar.js">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
	
<body>
  <!--
  (\___/)
  {• . •}
   //> ♥ "Copyright © 2019 Quoc Thang"-->
  	<script src="js/nanobar.js"></script>
  	<style>#footer {font-size:15px;line-height:1.5;list-style:none}</style>
  	<div id='main'>
	    <div class='container'>
	    	<div  style='margin-top:150px;margin-bottom:30px;text-align:center;'>
	    		<img src='../images/quocthang.png' style='width: 100px;margin-bottom:15px'>
	    		<h1>RUT GON URL</h1>
	    	</div>
	    	<br />
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
        	<button type="submit" class="instabutton">Rút gọn</button>
        </form>
      </div>
    </div>
    <br />
    <div align="center">
    	<table cellpadding="30px" cellspacing="0px" width="50%" id="table">
		<tr>
			<th>STT</th>
			<th>Liên kết rút gọn</th>
			<th>Liên kết gốc</th>
			<th>Quản lí</th>
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
    			<td colspan="4" align="center"><center>Oops, chưa có dữ liệu !!</center></td>
    		</tr>
    		<?else:?>
    		    <? $stt = 1; ?>
    		    <?foreach($data as $k=>$v):?>
    		    <tr>
    		    	<td><?=$stt?></td>
    		    	<td>quocthang.herokuapp.com/?k=<?=$k?></td>
    		    	<td><?=$v?></td>
    		    	<td>
                <a href="delete.php?k=<?=$k?>" title="Xóa" onclick="return confirm('Bạn có thật sự muốn xóa?')">
                  <i class="far fa-trash-alt"></i>
                </a>
    		    	</td>
    		    	<? $stt++; ?>
    		    </tr>
    		    <?endforeach?>
    		<?endif?>
    	</table>
    </div>
    <br />
    <br />
    <br />
    <div class="w"></div>
    <div align="center">
    	<div id="footer">
    		<p>Developed by&ensp;<i class='fa fa-heart animation-heart infinite animation-pulse'></i>&ensp;<a href="https://facebook.com/100012349937086" data-tooltip='Facebook' href='javascript:void(0);' target="_blank" rel="nofollow">Quoc Thang</a></p>
    		<p>Copyright © 2019 <a href="https://quocthang.gq/" data-tooltip='Website' href='javascript:void(0);' target="_blank" rel="nofollow">Quoc Thang</a>. All rights reserved.</p>
    	</div>
    </div>
</body>
</html>
