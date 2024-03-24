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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script  src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
		<title>查看帳號資料</title>
	</head>

    <!--web content-->
    <body>

    <!--測試頁面轉pdf下載-->

        <script type="text/javascript">    
            function screenshot(){

                var doc = new jsPDF();
                html2canvas(document.getElementById('print')).then(function(canvas) {
                    document.body.appendChild(canvas);
                        var a= canvas.toDataURL("image/jpeg");
                        doc.addImage(a, 'JPEG', 0, 0, canvas.width/2, canvas.height/2);
                        doc.save('usr_info.pdf');
                        location.reload();
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
            <h1>使用者帳號資料</h1>
		</div>
        <input type="button" value="修改資料" onclick="location.href='u_mod_acc.php'">
        <input type="button" value="下載" onclick="screenshot()">

<?php
	include("connect.php");//連接到資料庫
   
        session_start();//啟用session
        $getName="a1075514";
        //$getName=$_SESSION['usr_acc'];

        //此處使用php7，注意sql語法
        $sql_query="select * from user where account='".$getName."'";
        $result=mysqli_query($link,$sql_query);
        $row=mysqli_fetch_array($result);

        echo '<div id="print">';
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
        echo '</div>';
    ?>
    
    


</body>
</html>