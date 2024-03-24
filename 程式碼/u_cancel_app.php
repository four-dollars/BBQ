<!--使用者取消申請-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>取消申請</title>
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
            <h1>取消申請</h1>
		</div>

<?php
	include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";
        //$getName=$_SESSION['usr_acc'];

        #取得此使用者帳號所有的申請
        $all_app="SELECT * FROM `record` WHERE `account`='{$getName}' AND (`state`=0 OR `state`=1)";#只能取消未完成的
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
                    echo "<td>".$result['state']."</td>";
                    echo "<td>".$result['money']."</td>";
                    echo "<td>".$result['organization']."</td>";
                    echo "<td>".$result['apply_date']."</td>";
                    echo "<td>".$result['bbq_number']."</td>";
                    echo "<td>".$result['camp_number']."</td>";
                echo "</tr>";
        }
        echo "</table>";        
?>
<br>
<form method="POST" action="">
        <label for="del_id">請選擇要取消的申請編號</label>
        <select name="del_id" id="del_id">
        <?php
            $all_app="SELECT * FROM `record` WHERE `account`='{$getName}' AND (`state`=0 OR `state`=1)";#只能取消未完成的
            $app=mysqli_query($link,$all_app);
            while($result2=mysqli_fetch_assoc($app)){
                echo "<option value=".$result2['record_id'].">".$result2['record_id']."</option>";
            }
        ?>
        </select>
        <input type="submit" value="submit" id="del_btn" name="del_btn">
</form>

<?php
    if(isset($_POST["del_btn"])){#使用者按下submit後
        
        #更改指定編號的申請狀態
        $id=$_POST["del_id"];
        $cancel="UPDATE `record` SET `state`=5 WHERE `record_id`='{$id}'";
        mysqli_query($link,$cancel);

        #刪除apply中此申請租借的場地
        $app_place="DELETE FROM `apply` WHERE `record_id`='{$id}'";
        mysqli_query($link,$app_place);

        header("Location:u_cancel_app.php");#刷新頁面
    }
?>
    
    


</body>
</html>