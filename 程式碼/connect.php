<html>
<head>
<title>connect</title>
</head>

<!--連接到mysql-->
<?php
	$location="localhost";//連到本機
	$account="a1075514";
	$password="1075514";
	$dbname="cbrs";
	if(isset($location)&&isset($account)&&isset($password))//確認三個都有值
	{
		$link=mysqli_connect($location,$account,$password,$dbname);
		if(!$link)
		{
			echo '無法連接資料庫';
			exit();
        }
	}
?>

<body>
</body>
</html>