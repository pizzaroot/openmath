<?php
// 유저들의 정보를 최신으로 반영하는 스크립트이다.
include_once "connection.php";

flush();
ob_flush();

$sql = "SELECT * FROM problems WHERE code<>'' ORDER BY id ASC";
$result = mysqli_query($conn, $sql) or die('?ㅋㅋ');
while ($row2 = mysqli_fetch_assoc($result))
{
	$rid = $row2['id'];
	$save = $row2['save'];
	$savedata = explode('|',$save);
	$max = 0;
	for ($i=1;$i<count($savedata);$i++) {
		$max = max($max, intval(explode(',', $savedata[$i])[1]));
	}
	$first="";
	for ($i=1;$i<count($savedata);$i++) {
		if ($max == intval(explode(',', $savedata[$i])[1])) {
			$first=$max."~|~".explode(',', $savedata[$i])[0];
		}
	}
	$sql = "UPDATE problems SET first='$first' WHERE id=$rid";
	mysqli_query($conn, $sql) or die('?ㅋㅋ');
}
?>
