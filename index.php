<?php
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

    function generate_state()
    {
        $mt = microtime();
        $rand = mt_rand();
        return md5($mt . $rand);
    }

    $naver_state = generate_state();
    session_set_cookie_params(0);
    session_start();
    if (!$_SESSION["chk"])
    {
        $_SESSION["chk"] = random_str();
    }
?>
<!DOCTYPE html>
<html>
   <title>openmath</title>
<!-- Global site tag (gtag.js) - Google Ads: 946626398 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-946626398"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-946626398');
</script>
<!-- Event snippet for Website traffic conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-946626398/CRFKCOLnpe4BEN6-scMD',
      'event_callback': callback
  });
  return false;
}
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SNX5BGRM39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SNX5BGRM39');
</script>


<meta property="og:description" content="주로 수학 자작문제를 업로드하고 자신의 풀이 또는 의견을 공유할 수 있는 사이트입니다" />
<meta property="og:title" content="openmath" />
<meta property="og:url" content="https://openmath.co.kr/" />
<meta property="og:image" content="https://openmath.co.kr/logo.png" />
   <script data-ad-client="ca-pub-3061094917765119" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
   <meta name="naver-site-verification" content="f73968e611d984f802e7fe5f0d691da6d14ebef4" />
   <script src="https://cdn.jsdelivr.net/npm/underscore@1.12.0/underscore-min.js"></script>
   <script src="sorttable.js"></script>
   <meta charset="UTF-8">
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
			   <table class="w3-table">
				<tr class="w3-blue">
				  <th>No.</th>
				  <th>공개 시각</th>
				  <th>문항 업로더</th>
				  <th>정답률</th>
				  <th>범위</th>
				</tr>
				
				<?php
    include "cronjob.php";
    $filter = "";
    $andfilter = " WHERE";
    if ($_GET['featured'] == 1)
    {
        $filter = " WHERE featured=1";
        $andfilter = " AND";
    }
    if (isset($_GET['nid']))
    {
        $filter .= $andfilter . " nid=" . intval($_GET['nid']);
    }
    $problemshowlimit = 10;
    $offsetval = max(intval($_GET['page']) , 0) * $problemshowlimit;
    $sql = "SELECT * FROM problems$filter ORDER BY id DESC LIMIT $problemshowlimit OFFSET $offsetval";
    $result = mysqli_query($conn, $sql) or die('?ㅋㅋ');
    while ($row = mysqli_fetch_assoc($result))
    {
        $correctpercentage = round(($row['correctcount'] / ($row['allcount'] + 0.00000000001)) * 100);
        if ($row['time'] > time())
        { ?>
						<tr class="w3-hover-red<?php if ($row['featured'] == 1)
            {
                echo " w3-pale-yellow";
            }
            else
            {
                echo " w3-white";
            } ?>">
						<?php
        }
        else
        { ?>
						<tr class="w3-hover-green<?php if ($row['featured'] == 1)
            {
                echo " w3-pale-yellow";
            }
            else
            {
                echo " w3-white";
            } ?>" onclick="view('https://openmath.co.kr/problem.php?no=<?php echo $row['id'] ?>')">
						<?php
        } ?>
						<td><?php echo $row['id'] ?></td>
						  <td><?php echo date("Y/m/d H:i", $row['time']);

        $commentcount = substr_count($row['community'], "]~!-|-!~[");
        if ($commentcount > 0)
        {
            echo ' <b><span style="color:red">[' . $commentcount . "]</span></b>";
        }

?></td>
						  <td><span onmouseleave="preventing=false;" onmousedown="prevent()" onclick="profile(<?php echo $row['nid']; ?>)"><?php echo $row['madeby'] ?></span></td>
						  <td><?php echo $correctpercentage . '% (' . $row['correctcount'] . '/' . $row['allcount'] . ')' ?></td>
						  <td><?php echo $row['category'] ?></td>
						  </tr>
						<?php
    }
?>
			  </table>
			  <table>
			  <button class="w3-button" onclick="previous();">이전 페이지</button>
			  <button class="w3-button" onclick="next();">다음 페이지</button>
			  <button class="w3-button w3-right w3-pale-yellow" onclick="featured();">고퀄만 보기</button>
			  </table>
			  </div>
			  <hr>
			  <div class="w3-card-4 w3-margin w3-white">
				<div class="w3-container">
      <h3><b>자작문항 업로드</b></h3>
      <h5>여러분의 자작문항을 업로드하세요!</h5>
    </div>
<?php
    //naver_login.php
    $client_id = "4Eu7GCawIZh9QIugb1Rf"; // 위에서 발급받은 Client ID 입력
    $redirectURI = urlencode("https://openmath.co.kr/upload.php?url=URL&answer=ANSWER"); //자신의 Callback URL 입력
    $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=" . $client_id . "&redirect_uri=" . $redirectURI . "&state=" . $naver_state;
?>
    <div class="w3-container">
      <div class="w3-row">
        <div class="w3-col">
		문제 이미지 URL 생성하는 법: <a href="https://postimages.org/" target="_blank">https://postimages.org/</a>에 이미지 업로드 후 '직접 링크' 복사
		<input class="w3-input" id="url" type="text" placeholder="문제 이미지 URL 또는 문제 텍스트" autocomplete=off>
		<input class="w3-input" id="answer" type="number" placeholder="문제의 정답" step="1">
		<select class="w3-select" id="category">
			<option value="" disabled selected>범위</option>
			<option value="수학(상)">수학(상)</option>
			<option value="수학(하)">수학(하)</option>
			<option value="수학I">수학I</option>
			<option value="수학II">수학II</option>
			<option value="확률과 통계">확률과 통계</option>
			<option value="미적분">미적분</option>
			<option value="기하">기하</option>
			<option value="기출">기출</option>
			<option value="기타">기타</option>
		  </select>
          <p><?php
    $chkvar = $_SESSION["chk"];

    $sql4 = "SELECT * FROM users WHERE chk='$chkvar'";
    $result4 = mysqli_query($conn, $sql4) or die('ㄹㅇㅋㅋ');
    if (mysqli_num_rows($result4) > 0)
    {
        while ($row1223 = mysqli_fetch_assoc($result4))
        {
            $session_nid = $row1223['nid'];
            $session_email = $row1223['email'];
        }
?><button class="w3-button" onclick="window.location='https://openmath.co.kr/upload.php?url=URL&answer=ANSWER&category=CATEGORY'.replace('URL', encodeURIComponent(document.getElementById('url').value)).replace('ANSWER', document.getElementById('answer').value).replace('CATEGORY', document.getElementById('category').value);">문제 업로드하기</button><h3><b>닉네임 변경</b></h3>
<input class="w3-input" id="nickname" type="text" placeholder="새 닉네임" autocomplete=off>
<button class="w3-button" onclick="window.location='https://openmath.co.kr/upload.php?nickname=NICKNAME'.replace('NICKNAME', encodeURIComponent(document.getElementById('nickname').value));">닉네임 바꾸기</button>
<?php
    }
    else
    {
?><img height="38px" onclick="window.location='<?php echo $apiURL ?>'.replace('URL', document.getElementById('url').value).replace('ANSWER', document.getElementById('answer').value);" src="https://openmath.co.kr/naver.png"/><?php
    }
?></p>
        </div>
      </div>
    </div>
			  </div>
            </div>
            <!-- Introduction menu -->
            <div class="w3-col l4">
               <!-- About Card -->
               <div class="w3-card w3-margin w3-margin-top">
                  <div class="w3-container w3-white">
                     <h4><b>openmath</b></h4>
                     <p>주로 수학 자작문제를 업로드하고 자신의 풀이 또는 의견을 공유할 수 있는 사이트입니다. 혹시 버그나 개선할점이 있으면 밑에 있는 오픈채팅방 링크로 들어와서 알려주세요!</p>
                  </div>
               </div>
               <hr>
               <!-- Posts -->
               <div class="w3-card w3-margin">
                  <div class="w3-container w3-padding">
                     <h4>랭킹</h4>
                  </div>
                  <ul class="w3-ul w3-hoverable w3-white">
				  <?php
    if ($session_email == "peterhan02@naver.com")
    {
        $additionalq = " OR TRUE";
    }
    else
    {
        $additionalq = "";
    }
    $sql = "SELECT * FROM users WHERE point > 0$additionalq ORDER BY point DESC";
    $result = mysqli_query($conn, $sql) or die('?ㅋㅋ');
    $ivar = 0;
    while ($row = mysqli_fetch_assoc($result))
    {
        $displaylimit = 5;
        $ivar += 1;
        if ($ivar <= $displaylimit || $session_nid == $row['nid'] || $session_email == "peterhan02@naver.com")
        {
            if ($ivar > $displaylimit + 1 && $session_email != "peterhan02@naver.com")
            {
                echo '<li class="w3-padding-16" style="text-align:center">● ● ●</li>';

            }

?>
                     <li class="w3-padding-16<?php
            if ($session_nid == $row['nid'])
            {
                echo " w3-topbar w3-bottombar w3-leftbar w3-rightbar w3-border-yellow w3-black";

            }
?>">
						<span class="w3-left w3-margin-right" style="width:30px;font-size:30px"><?php echo $ivar; ?></span>
                        <span class="w3-large" onclick="profile(<?php echo $row['nid']; ?>)"><?php echo $row['nickname']; ?></span><br>
                        <span><b><span style="color:#ffd700"><?php echo $row['gold']; ?>●</span> <span style="color:#c0c0c0"><?php echo $row['silver']; ?>●</span> <span style="color:#cd7f32"><?php echo $row['bronze']; ?>●</span> <?php echo $row['total']; ?>●</b></span>
                     </li>
					<?php
        }
    }
?>
                  </ul>
               </div>
               <hr>
			   <div class="w3-card w3-margin">
                  <div class="w3-container w3-padding">
                     <h4>오픈채팅방 링크</h4>
                  </div>
                  <div class="w3-container w3-white">
                     <a href="https://open.kakao.com/o/gVGN8KMc">https://open.kakao.com/o/gVGN8KMc</a>
                  </div>
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
			   <div class="w3-card w3-margin">
                  <div class="w3-container w3-padding">
                     <h4>채팅</h4>
                  </div>
                  <iframe src="https://openmath-co-kr.glitch.me/" width="100%" height="600px" frameBorder="0"></iframe>
               </div>
               <hr>
               <!-- END Introduction Menu -->
            </div>
            <!-- END GRID -->
         </div>
         <br>
         <!-- END w3-content -->
      </div>
      <!-- Footer -->
      <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
         <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a><br>Made by Pizzaroot</p>
      </footer>
	  <?php include "modal.php"; ?>
	  <script>
	  const queryString = window.location.search;
	  const urlParams = new URLSearchParams(queryString);
	  var preventing = false;
	  
	  function view(url) {
		  if (preventing) return;
		  window.location = url;
	  }
	  
	  function prevent() {
		  preventing = true;
	  }
	  
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
	  
	  function next() {
		  if (urlParams.has('page')) {
			  urlParams.set("page", Math.max(parseInt(urlParams.get("page")), 0) + 1);
		  } else {
			  urlParams.append("page", 1);
		  }
		  window.location = "https://openmath.co.kr/?" + urlParams.toString();
	  }
	  
	  function previous() {
		  if (urlParams.has('page')) {
			  urlParams.set("page", Math.max(parseInt(urlParams.get("page")) - 1, 0));
			  window.location = "https://openmath.co.kr/?" + urlParams.toString();
		  }
	  }
	  
	  function featured() {
		  if (urlParams.has('featured')) {
			  urlParams.set("featured", 1);
		  } else {
			  urlParams.append("featured", 1);
		  }
		  window.location = "https://openmath.co.kr/?" + urlParams.toString();
	  }
	  </script>
   </body>
</html>
