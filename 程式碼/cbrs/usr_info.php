<!DOCTYPE html>
<!--
    使用者帳號紀錄：
    帳號
    密碼
    姓名
    連絡電話
    電子郵件
    身分別
    身分證字號
    學號/教職員編號
-->
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>查看帳號資料</title>
	</head>

    <!--web content-->
    <body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="usr_info_title">
            <h1>使用者帳號資料</h1>
		</div>
        <button type="button"><a>修改</a></button>

<?php
	include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";
        //$getName=$_SESSION['usr_acc'];

        //此處使用php7，注意sql語法
        $sql_query="select * from user where account='".$getName."'";
        $result=mysqli_query($link,$sql_query);
        $row=mysqli_fetch_array($result);
	
        echo '<table>';
            echo '<tr>';
                echo '<td>使用者帳號：</td>';
                echo '<td>'.$row[0].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>使用者密碼：</td>';
                echo '<td>'.$row[1].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>姓名：</td>';
                echo '<td>'.$row[2].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>連絡電話：</td>';
                echo '<td>'.$row[3].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>電子郵件：</td>';
                echo '<td>'.$row[4].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>身分別：</td>';
                echo '<td>'.$row[5].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>身分證字號：</td>';
                echo '<td>'.$row[6].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>學號/教職員編號：</td>';
                echo '<td>'.$row[7].'</td>';
            echo '</tr>';
        echo '</table>';
    ?>

</body>
</html>