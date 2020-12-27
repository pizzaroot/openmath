<?php
include_once "cronjob.php";
$nid=intval($_GET['nid']);
$sqluser = "SELECT * FROM users WHERE nid=$nid";
$resultuser = mysqli_query($conn, $sqluser) or die('ㄹㅇㅋㅋ');
if (mysqli_num_rows($resultuser) == 0)
{
	die('0');
}
while ($row = mysqli_fetch_assoc($resultuser))
{
	$sqlproblems = "SELECT id FROM problems WHERE nid=$nid AND featured=1";
	$resultproblems = mysqli_query($conn, $sqlproblems) or die('ㄹㅇㅋㅋ');
	$featuredcount = mysqli_num_rows($resultproblems);
	$problemnos = array();
	$sqlproblems = "SELECT id FROM problems WHERE nid=$nid ORDER BY featured DESC, id ASC";
	$resultproblems = mysqli_query($conn, $sqlproblems) or die('ㄹㅇㅋㅋ');
	$createdcount = mysqli_num_rows($resultproblems);
	while ($rowpro = mysqli_fetch_assoc($resultproblems))
	{
		array_push($problemnos, $rowpro["id"]);
	}
	$resultarr = array($row['id'], $row['nid'], $row['nickname'], $row['gold'], $row['silver'], $row['bronze'], $row['total'], $featuredcount, $createdcount, in_array($row['email'], $moderatoremails), $problemnos);
	
	echo json_encode($resultarr);
}
?>
