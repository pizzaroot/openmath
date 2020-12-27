<!-- MODAL -->
<div id="profile" class="w3-modal w3-animate-opacity">
   <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal">
         <span onclick="document.getElementById('profile').style.display='none'" 
            class="w3-button w3-display-topright">&times;</span>
         <h2>프로필</h2>
      </header>
      <div class="w3-container">
         <p><span id="profile_nickname"></span> <span id="profile_nid" class="w3-tag" style="color:#D3D3D3;"></span> <span id="profile_mod" class="w3-tag w3-green"></span></p>
         <p id="profile_data"><b><span id="profile_gold" style="color:#ffd700"></span> <span id="profile_silver" style="color:#c0c0c0"></span> <span id="profile_bronze" style="color:#cd7f32"></span> <span id="profile_total"></span></b></p>
		 <hr>
         <h4>업적</h4>
         <p id="achievements"></p><hr>
		 <p><button class="w3-button w3-yellow" onclick="viewproblems()">문제 보기</button></p>
      </div>
   </div>
</div>