<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <tilte>申請租借頁面</tilte>
    </head>
    <body>
        <!--網頁最上方的標題-->
        <header><h1><a href="">高雄大學露營區與烤肉台租借系統</a></h1></header>

        <!--連結列表-->

        <!--網頁副標題，為此頁面之功能-->
        <div class="article_title">
            <h1>申請場地租借</h1>
            <p>請填寫以下資料</p>
        </div>
        <div class="apply_form">
            <?php

                //變數，用於設定可選擇的日期
                $startYear=date("Y");
                $endYear=date("Y");
                $startMonth=date("m");
                $endMonth=date("m");
                $startDate=date("d")+7;
                $endDate=date("d")+30;

                //日期問題
                if(date("m")==2&&((date("Y")%4==0&&date("Y")%100!=0)||(date("Y")%400==0))){//閏年
                    if($startDate>29){
                        $startMonth=$startMonth+1;
                        $startDate=($startDate-29);
                    }
                    if($endDate>29){
                        $endMonth=$endMonth+1;
                        $endDate=($endDate-29);
                    }
                }
                else if(date("m")==2){//閏年
                    if($startDate>28){
                        $startMonth=$startMonth+1;
                        $startDate=($startDate-28);
                    }
                    if($endDate>28){//平年
                        $endMonth=$endMonth+1;
                        $endDate=($endDate-28);
                    }
                }
                else if(date("m")==1||date("m")==3||date("m")==5||date("m")==7||date("m")==8||date("m")==10||date("m")==12){//大月
                    if($startDate>31){
                        $startMonth=$startMonth+1;
                        $startDate=($startDate-31);
                    }
                    if($endDate>31){
                        $endMonth=$endMonth+1;
                        $endDate=($endDate-31);
                    }
                }
                else {//小月
                    if($startDate>30){
                        $startMonth=$startMonth+1;
                        $startDate=($startDate-30);
                    }
                    if($endDate>30){
                        $endMonth=$endMonth+1;
                        $endDate=($endDate-30);
                    }
                }

                //月份問題
                if($startMonth>12){
                    $startYear=$startYear+1;
                    $startMonth=1;
                }
                if($endMonth>12){
                    $endYear=$endYear+1;
                    $endMonth=1;
                }

                //租借申請表格
                echo "<form method='POST' action=''>";
                    echo "<table>";
                        echo "<tr>";
                            echo "<td><label for='bbqStartDate'>烤肉台租借起始日期：</label></td>";
                            echo "<td><input type='date' id='bbqStartDate' name='bbqStartDate' max='".$endYear."'-'".$endMonth."'-'".$endDate."' min='".$startYear."'-'".$startMonth."'-'".$startDate."'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='bbqStartTime'>烤肉台租借起始時間：</label></td>";
                            echo "<td><input type='time' id='bbqStartTime' name='bbqStartTime'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='bbqEndDate'>烤肉台租借結束日期：</label></td>";
                            echo "<td><input type='date' id='bbqEndDate' name='bbqEndDate' max='".$endYear."'-'".$endMonth."'-'".$endDate."' min='".$startYear."'-'".$startMonth."'-'".$startDate."'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='bbqEndTime'>烤肉台租借結束時間：</label></td>";
                            echo "<td><input type='time' id='bbqEndTime' name='bbqEndTime'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='bbqNum'>烤肉台租借數量：</label></td>";
                            echo "<td><input type='time' id='bbqNum' name='bbqNum'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='campStartDate'>露營區租借起始日期：</label></td>";
                            echo "<td><input type='date' id='campStartDate' name='campStartDate' max='".$endYear."'-'".$endMonth."'-'".$endDate."' min='".$startYear."'-'".$startMonth."'-'".$startDate."'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='campStartTime'>露營區租借開始時間：</label></td>";
                            echo "<td><input type='time' id='campStartTime' name='campStartTime'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='campEndDate'>露營區租借結束日期：</label></td>";
                            echo "<td><input type='date' id='campEndDate' name='campEndDate' max='".$endYear."'-'".$endMonth."'-'".$endDate."' min='".$startYear."'-'".$startMonth."'-'".$startDate."'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td><label for='campEndTime'>露營區租借結束時間：</label></td>";
                            echo "<td><input type='time' id='campEndTime' name='campEndTime'></td>";
                        echo "</tr>";
                    echo "</table>";
                echo "</form>";
            ?>
        </div>


    </body>
</html>