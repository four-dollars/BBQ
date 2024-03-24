<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>修改帳號資料</title>
	</head>

    <!--web content-->
    <body>
		<!-- 網頁最上方的標題 -->

        <header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
            <a href="u_view_acc.php">查看個人資料</a>
            <a href="u_mod_acc.php">修改個人資料</a>
            <a href="u_mod_passwd.php">修改密碼</a>
            <a href="u_rent_app.php">場地租借</a>
            <a href="u_cancel_app.php">取消場地申請</a>
            <a href="u_mod_app.php">修改場地申請</a>
            <a href="u_app_state.php">查看歷史紀錄</a>
			<a href="u_receipt_prt.php">列印收據</a>
		</header>

		<div class="usr_info_title">
            <h1>修改密碼</h1>
		</div>

<?php
	    include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";//此處應抓取當前登入的帳號
        //$getName=$_SESSION['usr_acc'];

        //此處使用php7，注意sql語法
        $sql_query="select * from user where account='".$getName."'";
        $result=mysqli_query($link,$sql_query);
        $row=mysqli_fetch_array($result);
?>
	
        <form method="POST" action="mod_usr_info_act.php">
        <table>
            <tr>
                <td><label for="new_passwd">新的密碼：</label></td>
                <td><input type="text" name="new_passwd" id="new_passwd"></td>
            </tr>
        </table>
        <input type="submit" value="確認修改">
        </form>
</body>
</html>