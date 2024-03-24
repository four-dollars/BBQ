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
			<h1><a href="">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="usr_info_title">
            <h1>修改使用者帳號資料</h1>
		</div>
        <button type="button"><a>修改</a></button>

<?php
	include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";//此處應抓取當前登入的帳號
        //$getName=$_SESSION['usr_acc'];

        //此處使用php7，注意sql語法
        $sql_query="select * from user where account='".$getName."'";
        $result=mysqli_query($link,$sql_query);
        $row=mysqli_fetch_array($result);
	
        echo '<table>';
            echo '<tr>';
                echo '<td><label for="usr_acc">使用者帳號：</label></td>';
                echo '<td><input type="text" name="usr_acc" id="usr_acc" value="'.$row[0].'"</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_pswd">使用者密碼：</label></td>';
                echo '<td><input type="text" name="usr_pswd" id="usr_pswd" value="'.$row[1].'"</td>';
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
                echo '<td><input type="text" name="usr_email" id="usr_email" value="'.$row[4].'"</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_type">身分別：</label></td>';
                echo '<td><input type="text" name="usr_type" id="usr_type" value="'.$row[5].'"</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_id">身分證字號：</label></td>';
                echo '<td><input type="text" name="usr_id" id="usr_id" value="'.$row[6].'"</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td><label for="usr_num">學號/教職員編號：</label></td>';
                echo '<td><input type="text" name="usr_num" id="usr_num" value="'.$row[7].'"</td>';
            echo '</tr>';
            echo '</table>';
    ?>

</body>
</html>