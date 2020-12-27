CREATE TABLE `problems` (
  `id` int(11) NOT NULL,						-- 문제 id
  `url` text NOT NULL,							-- 이미지 url
  `urlen` text,									-- 사용 X
  `answer` bigint(20) NOT NULL,					-- 문제의 정답
  `answer2` text,								-- 사용 X
  `time` int(11) NOT NULL,						-- 문제 time()
  `correctcount` int(11) NOT NULL DEFAULT '0',	-- 맞은 사람 수
  `allcount` int(11) NOT NULL DEFAULT '0',		-- 답을 제출한 사람 수
  `first` varchar(500) DEFAULT '',				-- 1등 닉네임
  `second` varchar(500) DEFAULT '',				-- 2등 닉네임
  `third` varchar(500) DEFAULT '',				-- 3등 닉네임
  `log` text,									-- 답을 제출할 때마다 유저의 이메일이 여기에 모두 저장됨
  `madeby` varchar(100) NOT NULL,				-- 문제 제작자 닉네임
  `email` varchar(100) NOT NULL,				-- 문제 제작자 이메일
  `nid` int(11) NOT NULL,						-- 문제 제작자 nid
  `category` varchar(100) DEFAULT '',			-- 문제 범위
  `featured` int(11) NOT NULL DEFAULT '0',		-- 문제 고퀄 여부
  `community` text,								-- 문제의 댓글
  `code` text,									-- 사용 X
  `codelog` text,								-- 사용 X
  `save` text									-- 사용 X
);