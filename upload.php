<!DOCTYPE html>
<html>
<title>openmath</title>
<meta charset="UTF-8">
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1 onclick="window.location='https://openmath.co.kr/'"><b>openmath</b></h1>
  <p>Made by <span class="w3-tag">Pizzaroot</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
		<?php
		session_set_cookie_params(0);
		session_start();
include "connection.php";
$categories = array("수학(상)","수학(하)","수학I","수학II","확률과 통계","미적분","기하","기출","기타");
if (isset($_GET['url']) && isset($_GET["answer"]))
{
		$timestamp = time();
		if (isset($_GET["code"]) && isset($_GET["state"])) {
			$client_id = "4Eu7GCawIZh9QIugb1Rf";
			
			$code = $_GET["code"];
			$state = $_GET["state"];
			$redirectURI = urlencode("https://openmath.co.kr/upload.php"); // 현재 Callback Url 입력
			$url = "https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=" . $client_id . "&client_secret=" . $client_secret . "&redirect_uri=" . $redirectURI . "&code=" . $code . "&state=" . $state;
			$is_post = false;

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, $is_post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$headers = array();
			$response = curl_exec($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			curl_close($ch);

			if ($status_code == 200)
			{
				$response_arr = json_decode($response, true);
				$token = $response_arr['access_token']; // Access Token
				$header = "Bearer " . $token; // Bearer 문자열 다음에 공백을 추가해야 합니다.
				// 네이버 회원 프로필 조회 요청 URL
				$user_profile_url = "https://openapi.naver.com/v1/nid/me";

				$is_post = false;

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $user_profile_url);
				curl_setopt($ch, CURLOPT_POST, $is_post);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$headers = array();
				$headers[] = "Authorization: " . $header;

				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

				$user_profile = curl_exec($ch);
				$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

				curl_close($ch);

				// 네이버 회원 프로필 조회 요청을 성공한 경우
				if ($status == 200)
				{
					$user_profile_arr = json_decode($user_profile, true);

					$naver_user_id = $user_profile_arr['response']['id']; // 네이버 계정 고유 ID
					$naver_user_nickname = $user_profile_arr['response']['nickname']; // 네이버 계정 프로필 이름
					$naver_user_email = $user_profile_arr['response']['email']; // 네이버 계정 프로필 E-mail
					$session_nickname = $naver_user_nickname;
					if ($naver_user_id && $naver_user_nickname && $naver_user_email)
					{
						$setvarkthx = 12230;
						
						if ($_SESSION["chk"]) {
							$chkvar = $_SESSION["chk"];
							
							$sql = "SELECT * FROM users WHERE chk='$chkvar'";
							$result = mysqli_query($conn, $sql) or die('ㄹㅇㅋㅋ');
							if (mysqli_num_rows($result) == 0)
							{
								$sql2 = "SELECT * FROM users WHERE nid='$naver_user_id'";
								$result = mysqli_query($conn, $sql2) or die('ㄹㅇㅋㅋ');
								if (mysqli_num_rows($result) == 0)
								{
									$sql3 = "INSERT INTO users (nid, nickname, email, chk) VALUES ('$naver_user_id', '$naver_user_nickname', '$naver_user_email', '$chkvar')";
									$result3 = mysqli_query($conn, $sql3) or die('ㄹㅇㅋㅋzz');
								} else {
									$sql3 = "UPDATE users SET chk='$chkvar' WHERE nid='$naver_user_id'";
									$result3 = mysqli_query($conn, $sql3) or die('ㄹㅇㅋㅋzz');
								}
								
							}
						}
					}
					else
					{
						// Naver 유저의 고유 ID가 전달되지 않은 경우 종료
						header("Location: https://openmath.co.kr");
						die('ㅇㅇㅋ');
					}
				}
				else
				{
					// 네이버 회원 프로필 조회 요청을 실패한 경우
					
				}
			}
			else
			{
				die('ㅋㅋ루삥뿅');
			}

		} else if ($_SESSION["chk"]) {
			$chkvar = $_SESSION["chk"];
						
			$sql4 = "SELECT * FROM users WHERE chk='$chkvar'";
			$result4 = mysqli_query($conn, $sql4) or die('ㄹㅇㅋㅋ');
			if (mysqli_num_rows($result4) > 0)
			{
				while ($row = mysqli_fetch_assoc($result4))
				{
					$naver_user_nickname = $row['nickname'];
					$naver_user_email = $row['email'];
					$naver_user_id = $row['nid'];
					$session_nickname = $naver_user_nickname;
					$setvarkthx = 12230;
				}
				
			} else {
				header("Location: https://openmath.co.kr");
				die('ㅇㅇㅋ');
			}
		}
		
		 $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
		$regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
		$regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
		$regex .= "(\:[0-9]{2,5})?"; // Port 
		$regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
		$regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
		$regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 
	   
		$urlstring = mysqli_real_escape_string($conn, $_GET["url"]);
		$answer = intval($_GET["answer"]);
		if (strlen($urlstring) < 3 || $_GET["answer"] == "" || strpos($_GET["url"], "<") !== false || strpos($_GET["url"], "\"") !== false || !isset($_GET['category']) || !in_array($_GET['category'], $categories)) {
			header("Location: https://openmath.co.kr");
			die();
		}
		
		if(!preg_match("/^$regex$/i", $_GET["url"])) // `i` flag for case-insensitive
       { 
           $urlstring = mysqli_real_escape_string($conn, '">'.$_GET["url"].'<img class="');
	   }
	   
		$catevar = $_GET['category'];
		if ($setvarkthx == 12230) {
			$sql = "INSERT INTO problems (url, answer, time, madeby, email, nid, category, log) VALUES ('$urlstring', $answer, $timestamp, '$session_nickname', '$naver_user_email', $naver_user_id, '$catevar', ':$naver_user_email')";
			$result = mysqli_query($conn, $sql) or die('ㄹㅇㅋㅋ');
			$resultid = mysqli_insert_id($conn);
			header("Location: https://openmath.co.kr/problem.php?no=$resultid");
		}
} else if (isset($_GET['nickname'])) {
	if ($_SESSION["chk"]) {
		$chkvar = $_SESSION["chk"];
					
		$sql4 = "SELECT * FROM users WHERE chk='$chkvar'";
		$result4 = mysqli_query($conn, $sql4) or die('ㄹㅇㅋㅋ');
		if (mysqli_num_rows($result4) > 0)
		{
			while ($row = mysqli_fetch_assoc($result4))
			{
				$naver_user_id = $row['nid'];
				$naver_user_nickname = $row['nickname'];
				$naver_user_email = $row['email'];
				$session_nickname = $naver_user_nickname;
				$setvarkthx = 943;
			}
			
		} else {
			header("Location: https://openmath.co.kr");
			die('ㅇㅇㅈ>>덜덜');
		}
		if ($setvarkthx == 943) {
			$newnickname = htmlentities(trim($_GET['nickname']));
			if (strpos($newnickname, '~|~') !== false) {
				die('shut');
			}
			if (strlen($newnickname) > 30) {
				die('닉네임 너무 길다이말이야');
			}
			if (strlen($newnickname) < 3) {
				die('닉네임 너무 짧다이말이야');
			}
			$newnickname = mysqli_real_escape_string($conn, $newnickname);
			$sql3 = "UPDATE users SET nickname='$newnickname' WHERE nid='$naver_user_id'";
			mysqli_query($conn, $sql3) or die('ㄹㅇㅋㅋzz');
			echo "닉네임이 변경되었다이말이야";
		}
	} else {
		die('ㅇeㅇㅋ');
	}
} else {
	header("Location: https://openmath.co.kr");
	die('ㅇㅇㅋ');
}
?>
    </div>
  </div>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
    <div class="w3-container w3-white">
      <h4><b>openmath</b></h4>
      <p>주로 수학 자작문제를 업로드하고 자신의 풀이 또는 의견을 공유할 수 있는 사이트입니다. 혹시 버그나 개선할점이 있으면 밑에 있는 오픈채팅방 링크로 들어와서 알려주세요!</p>
    </div>
  </div><hr>
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a><br>Made by Pizzaroot</p>
</footer>

</body>
</html>
