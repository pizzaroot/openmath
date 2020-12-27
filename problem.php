<?php
error_reporting(E_ERROR | E_PARSE);

include "connection.php";

function random_str(int $length = 64, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'):
    string
    {
        if ($length < 1)
        {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0;$i < $length;++$i)
        {
            $pieces[] = $keyspace[random_int(0, $max) ];
        }
        return implode('', $pieces);
    }
    session_set_cookie_params(0);
    session_start();
    if (!$_SESSION["chk"])
    {
        $_SESSION["chk"] = random_str();
    }
	
	
$id = $_GET['no'];
//$ipaddress = explode(':', explode(';', getUserIP()) [0]) [0];
if (!is_numeric($id))
{
	header("Location: https://openmath.co.kr");
    die('ㅇㅇㅋ');
}
?>

<!DOCTYPE html>
<html>
<title>openmath | <?php echo $id; ?></title>
<meta charset="UTF-8">
   <!-- Event snippet for Website traffic conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-946626398/CRFKCOLnpe4BEN6-scMD'});
</script>
<!-- Global site tag (gtag.js) - Google Ads: 946626398 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-946626398"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-946626398');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SNX5BGRM39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SNX5BGRM39');
</script>
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
    function getUserIP()
    {
        $ipaddr1ess = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) $ipaddr1ess = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ipaddr1ess = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED'])) $ipaddr1ess = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) $ipaddr1ess = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) $ipaddr1ess = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED'])) $ipaddr1ess = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR'])) $ipaddr1ess = $_SERVER['REMOTE_ADDR'];
        else $ipaddr1ess = 'UNKNOWN';
        return $ipaddr1ess;
    }
    
    $sql = "SELECT * FROM problems WHERE id=$id";
    $result = mysqli_query($conn, $sql) or die('?ㅋㅋ');
    if (mysqli_num_rows($result) == 0)
    {
        die('ㅋㅋ루삥빵');
    }

    $chkvar = $_SESSION["chk"];

    $sql4 = "SELECT * FROM users WHERE chk='$chkvar'";
    $result4 = mysqli_query($conn, $sql4) or die('ㄹㅇㅋㅋ');
    if (mysqli_num_rows($result4) > 0)
    {
        while ($row = mysqli_fetch_assoc($result4))
        {
			$session_nid = $row['nid'];
            $session_nickname = $row['nickname'];
            $session_email = $row['email'];
			$session_1 = $row['gold'];
			$session_2 = $row['silver'];
			$session_3 = $row['bronze'];
        }
    }
    else
    {

    }

    while ($row = mysqli_fetch_assoc($result))
    {
        if ($row['time'] > time())
        {
            $lefttime = $row['time'] - time();
            die("<div class=\"w3-container\" style=\"font-size:30px\">너무 빨리오셨네 ㅋㅋ<br>문제는 $lefttime 초 후에 공개됩니다</div>");
        }
        else
        {
?>
		<img src="<?php echo $row['url'] ?>" width="100%"><br><hr></div>
		<div class="w3-container">
      <div class="w3-row">
		<?php
            $firstname = $row['first'];
            $secondname = $row['second'];
            $thirdname = $row['third'];

            $answer = $row['answer'];
            $correctpercentage = round(($row['correctcount'] / ($row['allcount'] + 0.00000000001)) * 100);
            $correctcount = $row['correctcount'] + 1;
            $allcount = $row['allcount'] + 1;
            $logstr = $row['log'];
            $catestr = $row['category'];
            $cemail = $row['email'];
			$featuredval = $row['featured'];
			$communitystr = $row['community'];
			$codepath = $row['code'];
		 	$codesave = $row['save'];
            if (strlen($row['first']) > 0)
            {
                if (strlen($row['second']) > 0)
                {
                    if (strlen($row['third']) > 0)
                    {
                        $inrankstring = "no";
                    }
                    else
                    {
                        $inrankstring = 'third';
                    }
                }
                else
                {
                    $inrankstring = 'second';
                }
            }
            else
            {
                $inrankstring = 'first';
            }
        }
    }
	$alreadywrote = false;
	if (strpos($communitystr.' ', ':<]|[>:'.$session_nid) !== false) {
		$alreadywrote = true;
	}
	
function startsWithNumber($str) {
    return preg_match('/^\d/', $str) === 1;
}


	if (isset($_POST['comment'])) {
		// 여기 htmlentities 잘봐노셈 ㅋㅋ ㄹㅇ
		if (strlen($_POST['comment']) <= 1000 /* && strpos($communitystr.' ', htmlentities($_POST['comment'])) === false*/&& strpos(htmlentities($_POST['comment']).' ', ':<]|[>:') === false && strpos(htmlentities($_POST['comment']).' ', ']~!-|-!~[') === false)
		{
			$extrastr = "";
			$extrastr2 = "";
			if (startsWithNumber(trim($_POST['comment']))) {
				$extrastr = " ";
			}
			
			if ($_SESSION["chk"])
            {
                $chkvar = $_SESSION["chk"];

                $sql49 = "SELECT * FROM users WHERE chk='$chkvar'";
                $result49 = mysqli_query($conn, $sql49) or die('ㄹㅇㅋㅋ123123');
                if (mysqli_num_rows($result49) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result49))
                    {
                        $session_nickname = $row['nickname'];
                        $session_email = $row['email'];
						$session_nid = $row['nid'];
                        $setvarkthx = 958730;
						if (startsWithNumber($session_nickname)) {
							$extrastr2 = " ";
						}
                    }
                }
                else
                {
					header("Location: https://openmath.co.kr/problem.php?no=$id");
                    die('ㅇㅇㅋ');
                }
            }
			if ($setvarkthx == 958730 && strpos($logstr.' ', $session_email) !== false) {
				if (strpos($communitystr.' ', ':<]|[>:'.$session_nid) !== false) {
					if (strlen(trim($_POST['comment'])) == 0) {
						$explodebeforestrarr = explode(':<]|[>:'.$session_nid, $communitystr);
						
						$parts = explode(']~!-|-!~[', $explodebeforestrarr[0]);
						$last = array_pop($parts);
						
						$newcomstr = mysqli_real_escape_string($conn, implode(']~!-|-!~[', $parts).$explodebeforestrarr[1]);
						$sql49 = "UPDATE problems SET community='$newcomstr' WHERE id=$id";
						$result49 = mysqli_query($conn, $sql49) or die('ㄹㅇㅋㅋ');
						$alreadywrote = false;
					} else {
						$explodebeforestrarr = explode(':<]|[>:'.$session_nid, $communitystr);
						
						$parts = explode(']~!-|-!~[', $explodebeforestrarr[0]);
						$last = array_pop($parts);
						
						$newcomstr = mysqli_real_escape_string($conn, implode(']~!-|-!~[', $parts).$explodebeforestrarr[1].']~!-|-!~['.$extrastr2.$session_nickname.":<]|[>:".time().":<]|[>:".$extrastr.htmlentities(trim($_POST['comment'])).":<]|[>:".$session_nid);
						$sql49 = "UPDATE problems SET community='$newcomstr' WHERE id=$id";
						$result49 = mysqli_query($conn, $sql49) or die('ㄹㅇㅋㅋ');
						$alreadywrote = true;
					}
				} else if (strlen(trim($_POST['comment'])) > 0) {
					$newcomstr = mysqli_real_escape_string($conn, $communitystr.']~!-|-!~['.$extrastr2.$session_nickname.":<]|[>:".time().":<]|[>:".$extrastr.htmlentities(trim($_POST['comment'])).":<]|[>:".$session_nid);
					$sql49 = "UPDATE problems SET community='$newcomstr' WHERE id=$id";
					$result49 = mysqli_query($conn, $sql49) or die('ㄹㅇㅋㅋ');
					$alreadywrote = true;
				}
			}
		}
	}
	
    if (isset($_GET['answer']))
    {
        if ($_GET['answer'] == "")
        {
            echo '정답을 입력한 뒤 로그인해주세요.<br>';
        }
        else
        {

            if (isset($_GET["code"]) && isset($_GET["state"]))
            {
                $client_id = "4Eu7GCawIZh9QIugb1Rf";

                $code = $_GET["code"];
                $state = $_GET["state"];
                $redirectURI = urlencode("https://openmath.co.kr/problem.php?no=$id"); // 현재 Callback Url 입력
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
						$session_email = $naver_user_email;
						$session_nickname = $naver_user_nickname;
                        if ($naver_user_id && $naver_user_nickname && $naver_user_email)
                        {
                            $setvarkthx = 12230;
                            if ($_SESSION["chk"])
                            {
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
                                    }
                                    else
                                    {
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
                if ($naver_user_nickname == "")
                {
                    $naver_user_nickname = " ";
                }
            }
            else if ($_SESSION["chk"])
            {
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

                }
                else
                {
					header("Location: https://openmath.co.kr/problem.php?no=$id");
                    die('ㅇㅇㅋ');
                }
            }
if ($codepath == "") {
            if ($setvarkthx == 12230 && strpos($logstr.' ', $naver_user_email) !== false && strpos($catestr.' ', "컴퓨터") === false)
            {
                echo "이미 참여하였습니다.<br>";
                if ($thirdname != "")
                {
                    if (intval($_GET['answer']) == $answer)
                    {
                        echo "하지만 정답입니다.<br>";
                    }
                    else
                    {
                        echo "게다가 오답입니다.<br>";
                    }
                }
                if ($_GET['answer'] == "삭제" && ($naver_user_email == $cemail || $naver_user_email == "peterhan02@naver.com"))
                {
                    $sql9 = "DELETE FROM problems WHERE id=$id";
                    $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');
                    header("Location: https://openmath.co.kr");
                }
                else if ($_GET['answer'] == "고퀄" && ($naver_user_email == "peterhan02@naver.com"  || (in_array($session_email, $moderatoremails) && !in_array($cemail, $moderatoremails))))
                {
                    $sql9 = "UPDATE problems SET featured=1 WHERE id=$id";
                    $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');
                    echo "featured=1<br>";
                }
                else if ($_GET['answer'] == "고퀄 취소" && ($naver_user_email == "peterhan02@naver.com" || (in_array($session_email, $moderatoremails) && !in_array($cemail, $moderatoremails))))
                {
                    $sql9 = "UPDATE problems SET featured=0 WHERE id=$id";
                    $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');
                    echo "featured=0<br>";
                }
            }
            else if ($setvarkthx == 12230)
            {
                if (intval($_GET['answer']) == $answer)
                {
                    if (strpos($logstr, $naver_user_email) !== false)
                    {
                        $allcount -= 1;
                    }
                    if (strpos($logstr, ";" . $naver_user_email) !== false)
                    {
                        $correctcount -= 1;
                        $inrankstring = "no";
                    }
                    echo "정답입니다.<br>";
                    if ($inrankstring == "no")
                    {
                        if (strpos($logstr, ";" . $naver_user_email) === false)
                        {
                            $logstr .= ";" . $naver_user_email;
                        }
                        $sql9 = "UPDATE problems SET correctcount=$correctcount, allcount=$allcount, log='$logstr' WHERE id=$id";
                        $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');

                    }
                    else
                    {
                        $logstr .= ";" . $naver_user_email;
                        $sql9 = "UPDATE problems SET $inrankstring='$session_nickname"."~|~".$naver_user_id."', correctcount=$correctcount, allcount=$allcount, log='$logstr' WHERE id=$id";
                        $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');

                    }
                    if (strpos($logstr, ";" . $naver_user_email) === false)
                    {
                        echo substr_count($logstr, ";") . "등입니다.<br>";
                    }
                }
                else if ($_GET['answer'] == "삭제" && ($naver_user_email == $cemail || $naver_user_email == "peterhan02@naver.com"))
                {
                    $sql9 = "DELETE FROM problems WHERE id=$id";
                    $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');
                    header("Location: https://openmath.co.kr");
                }
                else if ($_GET['answer'] == "고퀄" && $naver_user_email == "peterhan02@naver.com")
                {
                    $sql9 = "UPDATE problems SET featured=1 WHERE id=$id";
                    $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');
                    echo "featured=1<br>";
                }
                else if ($_GET['answer'] == "고퀄 취소" && $naver_user_email == "peterhan02@naver.com")
                {
                    $sql9 = "UPDATE problems SET featured=0 WHERE id=$id";
                    $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');
                    echo "featured=0<br>";
                }
                else
                {
                    if (strpos($logstr, $naver_user_email) !== false)
                    {
                        $allcount -= 1;
                    }
                    $logstr .= ":" . $naver_user_email;
                    $correctcount -= 1;
                    $sql9 = "UPDATE problems SET correctcount=$correctcount, allcount=$allcount, log='$logstr' WHERE id=$id";
                    $result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루');
                    echo "오답입니다. 다시 풀어보세요.<br>";
                }
            }
} else if ($setvarkthx == 12230) {
	include_once "api.php";
	$execresult = executeCode($codepath, $_GET['answer']);
	if ($execresult["statusCode"]==200) {
		$execscore = $execresult["output"];
		$codesave .= "|".$naver_user_id.",".$execscore;
		$sql9 = "UPDATE problems SET save='$codesave' WHERE id=$id";
		$result = mysqli_query($conn, $sql9) or die('?ㅋㅋ루e');
	} else {
		// error
	}
}
        }
    }
?>
		<?php
    
    $client_id = "4Eu7GCawIZh9QIugb1Rf";
    $redirectURI = urlencode("https://openmath.co.kr/problem.php?no=$id&answer=ANSWER");
    $state = "RAMDOM_STATE";
    $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=" . $client_id . "&redirect_uri=" . $redirectURI . "&state=" . $state;
?>	  
		  
		  <?php
    $chkvar = $_SESSION["chk"];
	///////////////////
	////////////////////
	$sql = "SELECT * FROM problems WHERE id=$id";
    $result = mysqli_query($conn, $sql) or die('?ㅋㅋ');
	
	while ($row = mysqli_fetch_assoc($result))
    {
		$firstname = $row['first'];
		$secondname = $row['second'];
		$thirdname = $row['third'];
		$correctpercentage = round(($row['correctcount'] / ($row['allcount'] + 0.00000000001)) * 100);
		$featuredval = $row['featured'];
		$communitystr = $row['community'];
	}
	
	
	/////////

    if (strpos($logstr, $session_email) === false || (strpos($catestr, "컴퓨터") !== false && strpos($logstr, ';' . $session_email) === false))
    {
        $sql4 = "SELECT * FROM users WHERE chk='$chkvar'";
        $result4 = mysqli_query($conn, $sql4) or die('ㄹㅇㅋㅋ');
        if (mysqli_num_rows($result4) > 0)
        {
?><span style="color:red">주의: 1~3등은 네이버 닉네임이 공개됩니다.</span>
<input class="w3-input" id="answer" type="text" placeholder="정답 입력">
        <div class="w3-col m12 s12">
          <p><button class="w3-button" onclick="window.location='https://openmath.co.kr/problem.php?no=<?php echo $id ?>&answer=ANSWER'.replace('ANSWER', document.getElementById('answer').value)">제출</button><?php
        }
        else
        {
?><span style="color:red">주의: 1~3등은 네이버 닉네임이 공개됩니다.</span>
<input class="w3-input" id="answer" type="text" placeholder="정답 입력">
        <div class="w3-col m12 s12">
          <p><img height="38px" onclick="window.location='<?php echo $apiURL ?>'.replace('ANSWER', document.getElementById('answer').value)" src="https://openmath.co.kr/naver.png"/><?php
        }
		?><span class="w3-right"><?php
		if ($cemail == $session_email) {
			echo " <span class=\"w3-tag w3-red\" ondblclick=\"window.location='https://openmath.co.kr/problem.php?no=$id&answer=삭제'\">문제 삭제</span>";
		}
    }
    else
    {
		?><div class="w3-col m12 s12">
          <p><?php
        if (strpos($logstr, ';' . $session_email) !== false)
        {
            echo "<span class=\"w3-tag w3-green\">정답 ".$answer."</span>";
            $communitytab = true;
        }
        else
        {
			if ($thirdname != "" || $session_email == "peterhan02@naver.com" || $session_email == $cemail) {
				$answershown = $answer;
			} else {
				$answershown = "비공개";
			}
            echo "<span class=\"w3-tag w3-red\">오답</span> <span class=\"w3-tag w3-blue\">정답 ".$answershown."</span>";
            $communitytab = true;
        }
		?><span class="w3-right"><?php
		if ($cemail == $session_email) {
			echo " <span class=\"w3-tag w3-red\" ondblclick=\"window.location='https://openmath.co.kr/problem.php?no=$id&answer=삭제'\">문제 삭제</span>";
		}
		
		if ($session_email == "peterhan02@naver.com" || (in_array($session_email, $moderatoremails) && !in_array($cemail, $moderatoremails))) {
			if ($featuredval != 1) {
				echo " <span class=\"w3-tag w3-pale-yellow\" ondblclick=\"window.location='https://openmath.co.kr/problem.php?no=$id&answer=고퀄'\">고퀄</span>";
			} else {
				echo " <span class=\"w3-tag w3-white\" ondblclick=\"window.location='https://openmath.co.kr/problem.php?no=$id&answer=고퀄%20취소'\">고퀄 취소</span>";
			}
		}
    }
?>
		  <span class="w3-tag">정답률 <?php echo $correctpercentage ?>%</span></span></p>
        </div>
      </div>
    </div>
  </div>
  
  <hr>
  <?php
  if ($communitytab) {
	  ?>
	  <form action="https://openmath.co.kr/problem.php?no=<?php echo $id; ?>" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
	<h2 class="w3-center">토론</h2>
	<div class="w3-row w3-section">
		<div class="w3-rest">
		
		<textarea class="w3-input w3-border" name="comment" type="text" placeholder="<?php
		if ($alreadywrote) {
			echo "수정할 댓글을 입력하세요. 기존의 댓글을 삭제하려면 빈칸으로 제출하세요.";
		} else {
			echo "풀이 또는 문제 의견을 입력하세요. 댓글은 한 문제에 한개씩만 달 수 있고, 수정 또는 삭제할 수 있습니다.";
		}
		?>
		"></textarea>
		</div>
	</div>
	<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding"><?php
	if ($alreadywrote) {
			echo "수정 또는 삭제";
		} else {
			echo "글쓰기";
		}
	?></button>
	</form>
	  <?php
	  $communityentries = explode("]~!-|-!~[", $communitystr);
	  
	  foreach ($communityentries as $centry) {
		  if ($centry != "") {
			  $centryprops = explode(":<]|[>:", $centry);
			  // 0: author, 1: unixtimestamp, 2: contents, 3: nid
			  
	  ?>
		<div class="w3-card-4 w3-margin w3-white">
			<div class="w3-container">
				<h3><b onclick="profile(<?php echo $centryprops[3]; ?>)"><?php echo $centryprops[0]; ?></b></h3> <?php echo date("Y/m/d H:i", $centryprops[1]); ?>
			</div>
			<div class="w3-container">
				<div class="w3-row">
					<div class="w3-col">
						<p><?php echo $centryprops[2]; ?></p>
					</div>
				</div>
			</div>
		</div>
	  <?php
		  }
	  }
	  
  }
  ?>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
    <div class="w3-container w3-white">
      <h4><b>openmath</b></h4>
      <p>﻿주로 수학 자작문제를 업로드하고 자신의 풀이 또는 의견을 공유할 수 있는 사이트입니다. 혹시 버그나 개선할점이 있으면 밑에 있는 오픈채팅방 링크로 들어와서 알려주세요!</p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>랭킹</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
      <li class="w3-padding-16">
        <span class="w3-large">1등</span><br>
        <span onclick="profile(<?php echo explode("~|~", $firstname)[1] ?>)"><?php echo explode("~|~", $firstname)[0] ?></span>
      </li>
	  <li class="w3-padding-16">
        <span class="w3-large">2등</span><br>
        <span onclick="profile(<?php echo explode("~|~", $secondname)[1] ?>)"><?php echo explode("~|~", $secondname)[0] ?></span>
      </li>
	  <li class="w3-padding-16">
        <span class="w3-large">3등</span><br>
        <span onclick="profile(<?php echo explode("~|~", $thirdname)[1] ?>)"><?php echo explode("~|~", $thirdname)[0] ?></span>
      </li>
    </ul>
  </div>
  <hr>
   <div class="w3-card w3-margin">
	  <div class="w3-container w3-padding">
		 <h4>광고</h4>
	  </div>
	  <div class="w3-container w3-white">
		 <ins class="kakao_ad_area" style="display:none;" 
 data-ad-unit    = "DAN-TF1vAvaNAXdhDdQt" 
 data-ad-width   = "300" 
 data-ad-height  = "250"></ins> 
<script type="text/javascript" src="//t1.daumcdn.net/kas/static/ba.min.js" async></script>
	  </div>
   </div>
  <hr>
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
<?php include "modal.php"; ?>
<script>
function httpGetAsync(theUrl, callback)
{
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function() { 
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
			callback(xmlHttp.responseText);
	}
	xmlHttp.open("GET", theUrl, true); // true for asynchronous 
	xmlHttp.send(null);
}

<?php include "modalscript.php"; ?>
</script>
</body>
</html>
