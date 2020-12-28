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
	//first
	$max = 0;
	for ($i=1;$i<count($savedata);$i++) {
		$max = max($max, intval(explode(',', $savedata[$i])[1]));
	}
	$first="";
	$cnid="";
	for ($i=1;$i<count($savedata);$i++) {
		if ($max == intval(explode(',', $savedata[$i])[1])) {
			$first=explode(',', $savedata[$i])[1]."점~|~".explode(',', $savedata[$i])[0];
			$cnid=explode(',', $savedata[$i])[0];
			array_splice($savedata, $i, 1);
			break;
		}
	}
	for ($i=1;$i<count($savedata);$i++) {
		if (explode(',', $savedata[$i])[0] == $cnid) {
			array_splice($savedata, $i, 1);
			$i--;
		}
	}
	//second
	$max = 0;
	$cnid="";
	for ($i=1;$i<count($savedata);$i++) {
		$max = max($max, intval(explode(',', $savedata[$i])[1]));
	}
	$second="";
	for ($i=1;$i<count($savedata);$i++) {
		if ($max == intval(explode(',', $savedata[$i])[1])) {
			$second=explode(',', $savedata[$i])[1]."점~|~".explode(',', $savedata[$i])[0];
			$cnid=explode(',', $savedata[$i])[0];
			array_splice($savedata, $i, 1);
			break;
		}
	}
	for ($i=1;$i<count($savedata);$i++) {
		if (explode(',', $savedata[$i])[0] == $cnid) {
			array_splice($savedata, $i, 1);
			$i--;
		}
	}
	//third
	$max = 0;
	$cnid="";
	for ($i=1;$i<count($savedata);$i++) {
		$max = max($max, intval(explode(',', $savedata[$i])[1]));
	}
	$third="";
	for ($i=1;$i<count($savedata);$i++) {
		if ($max == intval(explode(',', $savedata[$i])[1])) {
			$third=explode(',', $savedata[$i])[1]."점~|~".explode(',', $savedata[$i])[0];
			$cnid=explode(',', $savedata[$i])[0];
			array_splice($savedata, $i, 1);
			break;
		}
	}
	for ($i=1;$i<count($savedata);$i++) {
		if (explode(',', $savedata[$i])[0] == $cnid) {
			array_splice($savedata, $i, 1);
			$i--;
		}
	}
	
	$sql = "UPDATE problems SET first='$first', second='$second', third='$third' WHERE id=$rid";
	mysqli_query($conn, $sql) or die('?ㅋㅋ');
}
?>
