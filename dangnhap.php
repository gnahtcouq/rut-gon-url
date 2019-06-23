<!DOCTYPE html>
<html>
<head>
    <title>Login - Quoc Thang</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="G1pltvWfQoUcVz3B9mXQd-Zih5dPs25V4CJ90DcwgP4"/>
    <meta name="description" content="Owned by Quoc Thang from J2TEAM">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Quoc Thang">
    <meta property="og:url" content="https://gnahtcouq.github.io/">
    <meta property="og:site_name" content="gnahtcouq.github.io">
    <meta property="og:description" content="Owned by Quoc Thang from J2TEAM">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gnahtcouq.css">
</head>
<body>
    <div id="particles-js">
        <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;"></canvas>
    </div>
    <script src="js/loader.js"></script>
    <div class="quocthang" align="center">
        <div style='margin-top:150px;margin-bottom:20px;text-align:center;'>
            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
                <tr>
                    <form action="" method="post">
                        <td>
                            <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                <tr>
                                    <td colspan="3"><strong>ADMIN LOGIN</strong></td>
                                </tr>
                                <tr>
                                    <td width="78">Username</td>
                                    <td width="6">:</td>
                                    <td width="294">
                                        <input type="text" name="name" class="instinput" autocomplete="off"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td>
                                        <input type="password" name="password" class="instinput" autocomplete="off"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="submit" name="submit" value="Login" class="instabutton"/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
    <center style="color:green">
    <?php
    include("connect.php");
    if(isset($_POST["submit"])){
        $name=mysqli_real_escape_string($connect,$_POST['name']);
        $password=mysqli_real_escape_string($connect,$_POST['password']);
        $password=md5($password);
        $sql="SELECT * FROM information WHERE name='$name' and password='$password'";
        $query=mysqli_query($connect,$sql);
        $num_row=mysqli_num_rows($query);
        if($num_row!=0){
            echo "Bạn đã đăng nhập thành công";
        }
        else{
            echo "Tên hoặc mật khẩu không đúng";
        }
    }
    ?>
    </center>
    <br/>
    <div class="w"></div>
    <div class="footer">
        <p>Developed by&ensp;
            <i class='fa fa-heart animation-heart infinite animation-pulse'></i>&ensp;
            <a href="https://facebook.com/100012349937086" data-tooltip='Facebook' href='javascript:void(0);' target="_blank" rel="nofollow">Quoc Thang</a>
        </p>
        <p>Copyright &copy; 2019 
            <a href="https://gnahtcouq.github.io" id='tranvanquocthang' data-tooltip='Website' href='javascript:void(0);' target="_blank" rel="nofollow">Quoc Thang</a>. All rights reserved.
        </p>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/heart-effect.js"></script>
    <script src="js/quocthang.js"></script>
</body>
</html>