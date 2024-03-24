<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>查看申請結果</title>
	</head>
    <body>
        <!--刪除session-->
        <?php
            
        ?>
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

		<div>
            <h1>申請結果</h1>
		</div>

<?php
	include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";
        //$getName=$_SESSION['usr_acc'];

        //此處使用php7，注意sql語法
        #取得剛剛那筆資料的編號(必定是最新)
        $find_id="SELECT `record_id` FROM `record` ORDER BY `record_id` DESC LIMIT 1";
        $id=mysqli_fetch_row(mysqli_query($link,$find_id));

        #取出此筆資料的內容
        $sql_query="SELECT * FROM `record` WHERE `record_id`='{$id[0]}'";
        $result=mysqli_query($link,$sql_query);
        $row=mysqli_fetch_array($result);

        echo '<table>';
            echo '<tr>';
                echo '<td>申請人帳號：</td>';
                echo '<td>'.$row[9].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>申請編號：</td>';
                echo '<td>'.$row[0].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>申請狀態：</td>';
                if(empty($row[1])){
                    echo "<td>審核中</td>";
                }
                else if($row[1]===1){
                    echo "<td>繳費中</td>";
                }
                else if($row[1]===2){
                    echo "<td>完成</td>";
                }
            echo '</tr>';
            echo '<tr>';
                echo '<td>總金額：</td>';
                echo '<td>'.$row[2].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>申請單位：</td>';
                echo '<td>'.$row[3].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>申請日期：</td>';
                echo '<td>'.$row[4].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>租借的烤肉台數量：</td>';
                echo '<td>'.$row[7].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>租借的露營區數量：</td>';
                echo '<td>'.$row[8].'</td>';
            echo '</tr>';
        echo '</table>';
    ?>
    
    


</body>
</html>