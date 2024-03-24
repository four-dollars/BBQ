<!--使用者首頁-->
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>使用者首頁</title>
	</head>

	<!--連接到mysql-->
	<?php
		include("connect.php");
	?>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

        <?php
            $UsrAcc="a1075514";//這裡之後要改成用變數取得登入者帳號
            $sql="SELECT * FROM `user` WHERE `account`='{$UsrAcc}'";
            $result=mysqli_query($link,$sql);
            $usrName=mysqli_fetch_assoc($result);
        ?>

		

		<div>
        		<div><h1>使用者</h1></div>
                <?php
                    echo "".$usrName['name']."<br>";
                    echo "a1075514<br>";
                ?>

		<div>
			<div>
    			<p>選擇要前往的功能頁面</p><br>

				<table>
				<tr>
				<td>
				<!---
				//session_start();
				//$getName=$_SESSION['personName_login'];
				//echo 'name='.$getName
				--->
					<p>
            		<a href="u_view_acc.php">查看個人資料</a>
            		<a href="u_mod_acc.php">修改個人資料</a>
           		 	<a href="u_mod_passwd.php">修改密碼</a>
            		<a href="u_rent_app.php">場地租借</a>
            		<a href="u_cancel_app.php">取消場地申請</a>
            		<a href="u_mod_app.php">修改場地申請</a>
            		<a href="u_app_state.php">查看歷史紀錄</a>
					<a href="u_receipt_prt.php">列印收據</a>
                    </p>
					
				</td>
           		</tr>
            	</table>
				<h2><a href="">返回登入</a></h2>

	</div>

		<!-- 網頁下方的工具列或訊息 -->
		<footer>
			<p>
				© 2015 高雄大學 National University of Kaohsiung<br>
				81148 高雄市楠梓區高雄大學路700號<br>
				700, Kaohsiung University Rd., Nanzih District, Kaohsiung 811, Taiwan, R.O.C.<br>
				高大總機:886-7-5919000 傳真號碼:886-7-5919083<br>
				高大校園緊急聯絡電話:886-7-5917885 高大警衛室:886-7-5919009<br>
			</p>
		</footer>
</body>
</html>