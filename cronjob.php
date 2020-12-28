<?php
// 유저들의 정보를 최신으로 반영하는 스크립트이다.
include_once "connection.php";

flush();
ob_flush();



$sqluser = "SELECT * FROM users ORDER BY id ASC";
$resultuser = mysqli_query($conn, $sqluser) or die('ㄹㅇㅋㅋ');
// 모든 유저에 대하여 실행한다.
while ($row = mysqli_fetch_assoc($resultuser))
{
	$sql = "SELECT * FROM problems WHERE featured=1 ORDER BY id ASC";
	$result = mysqli_query($conn, $sql) or die('?ㅋㅋ');
	
	$gold = 0;
	$silver = 0;
	$bronze = 0;
	$total = 0;
	$nid = $row['nid'];
	$nickname = mysqli_real_escape_string($conn, $row['nickname']);
	while ($row2 = mysqli_fetch_assoc($result))
	{
		if ($row['email'] != "" && (strpos($row2['log'], ";".$row['email']) !== false || $row2['code'] != "") && $nid != $row2['nid']) {
			if (strpos($row2['log'], ";".$row['email']) !== false || strpos($row2['save'], "|".$nid) !== false){
				$total += 1;
			}
			
			if (explode('~|~', $row2['first'])[1] == $nid) {
				$gold += 1;
			}
			if (explode('~|~', $row2['second'])[1] == $nid) {
				$silver += 1;
			}
			if (explode('~|~', $row2['third'])[1] == $nid) {
				$bronze += 1;
			}
		}
	}
	$sql = "UPDATE problems SET madeby='$nickname' WHERE nid=$nid";
	mysqli_query($conn, $sql) or die('?ㅋㅋ');
	$point = 10 * $gold + 5 * $silver + 3 * $bronze + $total;
	$sqlfinal = "UPDATE users SET gold=$gold, silver=$silver, bronze=$bronze, total=$total, point=$point WHERE nid=$nid";
	mysqli_query($conn, $sqlfinal) or die('?ㅋㅋ');
}
?>
