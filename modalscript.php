var currentnid = 0;

function profile(nid) {
	currentnid = nid;
  document.getElementById('profile_data').style.display = 'none';
  
  httpGetAsync('https://openmath.co.kr/profile.php?nid=' + nid, showuserdata);
  document.getElementById('profile_nickname').innerHTML = "";
  document.getElementById('profile_mod').innerHTML = "";
  document.getElementById('achievements').innerHTML = "";
  document.getElementById('profile_nid').innerHTML = nid;
  document.getElementById('profile').style.display = 'block';
}

function showuserdata(responsetext) {
  var userdata = JSON.parse(responsetext);
  document.getElementById('profile_nickname').innerHTML = userdata[2];
  document.getElementById('profile_gold').innerHTML = userdata[3] + "●";
  document.getElementById('profile_silver').innerHTML = userdata[4] + "●";
  document.getElementById('profile_bronze').innerHTML = userdata[5] + "●";
  document.getElementById('profile_total').innerHTML = userdata[6] + "●";
  if (userdata[9]) {
	  document.getElementById('profile_mod').innerHTML = "관리자";
  }
  if (userdata[7] < 1) {
	  document.getElementById('achievements').innerHTML += '<span id="profile_mod" class="w3-tag w3-grey">신입 제작자</span>';
  } else if (userdata[7] < 3) {
	  document.getElementById('achievements').innerHTML += '<span id="profile_mod" class="w3-tag w3-yellow">초보 제작자</span>';
  } else if (userdata[7] < 5) {
	  document.getElementById('achievements').innerHTML += '<span id="profile_mod" class="w3-tag w3-green">중급 제작자</span>';
  } else if (userdata[7] < 10) {
	  document.getElementById('achievements').innerHTML += '<span id="profile_mod" class="w3-tag w3-blue">골드 제작자</span>';
  } else if (userdata[7] < 20) {
	  document.getElementById('achievements').innerHTML += '<span id="profile_mod" class="w3-tag w3-orange">플라티넘 제작자</span>';
  } else if (userdata[7] < 50) {
	  document.getElementById('achievements').innerHTML += '<span id="profile_mod" class="w3-tag w3-red">고퀄 헌터</span>';
  } else {
	  document.getElementById('achievements').innerHTML += '<span id="profile_mod" class="w3-tag w3-black">문만신</span>';
  }
  document.getElementById('profile_data').style.display = 'block';
}

function viewproblems() {
	window.location = "https://openmath.co.kr/?nid=" + currentnid;
}