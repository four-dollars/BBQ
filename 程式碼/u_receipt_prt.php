<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script  src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
		<title>列印收據</title>
	</head>

    <!--web content-->
    <body>

    <!--頁面轉pdf下載-->

        <script type="text/javascript">    
            function screenshot(){
                var doc = new jsPDF();
                html2canvas(document.getElementById('print')).then(function(canvas) {
                    document.body.appendChild(canvas);
                        var a= canvas.toDataURL("image/jpeg");
                        doc.addImage(a, 'JPEG', 0, 0, canvas.width/3, canvas.height/3);
                        doc.save('receipt.pdf');
                        //location.reload();
                        //a.click();
                });

                // html2canvas(document.getElementById('print')).then(function(canvas) {
                //     document.body.appendChild(canvas);
                //         var a = document.createElement('a');
                //         a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
                //         a.download = 'usr_info.jpg';
                //         a.click();
                // });
            }
        </script> 

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
            <h1>收據列印</h1>
		</div>

<?php
	include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";
        //$getName=$_SESSION['usr_acc'];

        //此處使用php7，注意sql語法
        $sql_query="SELECT `record_id` FROM `record` WHERE `account`='{$getName}' AND `state`=2";#取出此使用者已完成(審核通過且已繳費)的申請編號
        $result=mysqli_query($link,$sql_query);
?>

    <form action="" method="POST">
    <label for="receipt_id">請選擇要列印收據的申請編號：</label>
    <select name="receipt_id" id="receipt_id">

<?php
        while($row=mysqli_fetch_row($result)){
            echo "<option value=".$row[0].">".$row[0]."</option>";
        }
?>
    </select>
    <input type="submit" value="receipt" id="receipt_btn" name="receipt_btn">
    </form>

<?php
    if(isset($_POST["receipt_btn"])){
        $rid=$_POST["receipt_id"];
        $usrName='a1075514';#取紀錄登入帳號的session
        $SY=Date("Y");
        $SM=Date("m");
        $SD=Date("d");//獲得今日日期

        $id_data="SELECT * FROM `record` WHERE `record_id`='{$rid}'";#取出此申請編號相關之所有資料
        $rec=mysqli_fetch_assoc(mysqli_query($link,$id_data));

        $usr_data="SELECT * FROM `user` WHERE `account`='{$usrName}'";#取出此申請編號相關之所有資料
        $usr=mysqli_fetch_assoc(mysqli_query($link,$usr_data));

        echo "<div id='print'>";
            echo "<h1>收款收據</h1>";
            echo "<p>今收到</p><br>";
            echo "<p>".$usr['name']." 先生/小姐</p><br>";
            echo "<p>場地租借 (申請編號: ".$rec['record_id'].") 費用 ".$rec['money']." 元整。此據。</p><br>";
            echo "<br>";
            echo "<p>日期: ".$rec['pay_date']."</p><br>";
        echo "</div>";

        unset($_POST["receipt_btn"]);
        unset($_POST["receipt_id"]);

        echo "<script type='text/javascript'>";
            echo "screenshot()";
        echo "</script>";
    }
?>
    


</body>
</html>