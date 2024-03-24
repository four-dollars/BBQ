<!--使用者取消申請-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>查看申請狀態</title>
	</head>
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

		<div>
            <h1>查看申請狀態</h1>
		</div>

<?php
	include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";
        //$getName=$_SESSION['usr_acc'];

        #取得此使用者帳號所有的申請
        $all_app="SELECT * FROM `record` WHERE `account`='{$getName}' ORDER BY `record_id` DESC";#只能修改未完成的，且越新的顯示在越上面(DESC)
        $app=mysqli_query($link,$all_app);
        echo "<table>";
            echo "<tr>";
                echo "<td>申請編號</td>";
                echo "<td>申請狀態</td>";
                echo "<td>申請金額</td>";
                echo "<td>申請單位</td>";
                echo "<td>申請日期</td>";
                echo "<td>烤肉台數量</td>";
                echo "<td>露營區數量</td>";
            echo "</tr>";
        while($result=mysqli_fetch_assoc($app)){#尋訪，條列出每筆申請
                echo "<tr>";
                    echo "<td>".$result['record_id']."</td>";
                    if(empty($result['state'])){
                        echo "<td>審核中</td>";
                    }
                    else if((int)$result['state']===1){
                        echo "<td>繳費中</td>";
                    }
                    else if((int)$result['state']===2){
                        echo "<td>完成</td>";
                    }
                    else if((int)$result['state']===3){
                        echo "<td>審核失敗</td>";
                    }
                    else if((int)$result['state']===4){
                        echo "<td>逾期未繳</td>";
                    }
                    else if((int)$result['state']===5){
                        echo "<td>取消申請</td>";
                    }
                    echo "<td>".$result['money']."</td>";
                    echo "<td>".$result['organization']."</td>";
                    echo "<td>".$result['apply_date']."</td>";
                    echo "<td>".$result['bbq_number']."</td>";
                    echo "<td>".$result['camp_number']."</td>";
                echo "</tr>";
        }
        echo "</table>";        
?>

</body>
</html>