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
            <h1>修改使用者帳號資料</h1>
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
	
        echo '<form method="POST" action="u_mod_acc_act.php">';//使用者送出的資料將在當前頁面進行處理
        echo '<table>';
            echo '<tr>';
                echo '<td><label for="usr_acc">使用者帳號：</label></td>';
                echo '<td>'.$row[0].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_name">姓名：</label></td>';
                echo '<td><input type="text" name="usr_name" id="usr_name" value="'.$row[2].'"</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_tel">連絡電話：</label></td>';
                echo '<td><input type="text" name="usr_tel" id="usr_tel" value="'.$row[3].'"</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_email">電子郵件：</label></td>';
                echo '<td><input type="email" name="usr_email" id="usr_email" value="'.$row[4].'"</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_type">身分別：</label></td>';
                echo '<td>'.$row[5].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_id">身分證字號：</label></td>';
                echo '<td>'.$row[6].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_num">學號/教職員編號：</label></td>';
                echo '<td>'.$row[7].'</td>';
            echo '</tr>';
        echo '</table>';
        echo '<input type="submit" value="送出">';
        echo '</form>';
?>
</body>
</html>