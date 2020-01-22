CREATE TABLE development_works (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `category` VARCHAR(255),
 `title` VARCHAR(255),
 `sub_title` VARCHAR(255),
 `url` VARCHAR(255),
 `charge` VARCHAR(255),
 `tools` VARCHAR(255),
 `image` VARCHAR(255),
 `date_text` VARCHAR(255),
 `keywords` TEXT,
 `up` TIMESTAMP,
 FULLTEXT idx ( `keywords` )
) ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT 'PROFILE SITE (SCRATCH) DB';

CREATE TABLE skillsets (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `name` VARCHAR(255),
 `experience` VARCHAR(255),
 `experience_value` int(11),
 `comment` VARCHAR(255),
 `achievement` VARCHAR(255),
 `incident` VARCHAR(255),
 `image` VARCHAR(255),
 `keywords` TEXT,
 `up` TIMESTAMP,
 FULLTEXT idx ( `keywords` )
) ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT 'PROFILE SITE (SCRATCH) DB';

-- CREATE TABLE messages (
--  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--  `context` TEXT,
--  `up` TIMESTAMP
-- ) ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT 'PROFILE SITE (SCRATCH) DB';


INSERT INTO `development_works` (
  `category`, `title`, `sub_title`, `url`, `charge`, `tools`, `image`, `date_text`
)values(
  'web', 'お土産販売', '博多の本格豚骨ラーメン店様の通信販売', 'https://ikkousha.net/', 'デザイン／マネジメント', 'Illustrator, Photoshop, Lunacy', 'ramen_ec.png', '2018年秋頃'
),(
  'web', '求人向けサイト', '博多の本格豚骨ラーメン店様の求人', 'https://ikkousha.info/', 'PHP（スクラッチ）／HTML／CSS／JS', 'Atom Editor, Illustrator, Photoshop', 'ramen_recruit.png', '2018年夏頃'
),(
  'web', 'コーポレートサイト', 'ベンチャーIT企業ホームページ', 'https://molers.me/', 'PHP（WordPress）／HTML／CSS／JS', 'Atom Editor, Illustrator, Photoshop', 'corp_1.png', '2019年春頃'
),(
  'web', 'コーポレートサイト', 'IT企業様のホームページ', 'https://studist.jp/', 'PHP（WordPress）／HTML／CSS／JS／デザイン', 'Atom Editor, Illustrator, Photoshop, Lunacy', 'corp_2.png', '2019年春頃'
),(
  'web', '個人様HP', '仕事関係者の個人事業主様へご提案', 'http://yoshimura.wetz.work/', 'PHP（WordPress）／HTML／CSS／JS／デザイン', 'Atom Editor, Illustrator, Photoshop', 'yoshimura.png', '2018年秋頃'
),(
  'web', 'コーポレートサイト（仮）', '新規事業事業立ち上げにつきご開設', 'http://imcg.wetz.work/', 'PHP（WordPress）／HTML／CSS／JS', 'Atom Editor, Illustrator, Photoshop', 'corp_3.png', '2019年始頃'
),(
  'web', 'おもいでごはん（仮）', '関係会社様の企画にて作成', 'http://omoide.wetz.work/', 'PHP（WordPress）／HTML／CSS／JS／デザイン', 'Atom Editor, Illustrator, Photoshop', 'omoide.png', '2018年秋頃'
),(
  'web', '企画ラーメンBOX（LP）', '福岡を代表するラーメン屋とアイドル', 'https://ikkousha.info/general/linq-premium-ramenbox/', 'HTML／CSS／JS', 'Atom Editor, Illustrator, Photoshop', 'linq_premium.png', '2019年春頃'
),(
  'web', '怒涛の新店舗祭り（LP）', '新店舗オープンにつき', 'https://ikkousha.info/general/lp/cp30801/', 'デザイン／HTML／CSS／JS', 'Atom Editor, Illustrator, Photoshop', 'lp_newopen1.png', '2018年夏頃'
),(
  'web', '新店舗OPEN（LP）', '博多の本格豚骨ラーメン店様', 'https://ikkousha.info/general/lp/cp312kno/', 'デザイン／マネジメント', 'Atom Editor, Illustrator, Photoshop', 'lp_newopen2.png', '2019年春頃'
);



INSERT INTO `skillsets` (
  `name`, `experience`, `comment`, `achievement`, `incident`
)values(
  'PHP', '約５年', '主に使用している言語です。', 'コーポレートサイト、WEBシステム', 'スクラッチ開発、WordPress、Laravel'
),(
  'Javascript', '約５年', 'もっと極めたい分野でもあります。', 'コーポレートサイト、WEBシステム、プロトタイプ製作', 'Node.js、React、ES6、TypeScript、Socket.IO、Electron'
),(
  'HTML/CSS', '約５年', 'WEBの基本なので大事にしたいです。', 'コーポレートサイト、WEBシステム', 'HTML5、CSS3、SCSS、SMACSS、BEM'
),(
  'WordPress', '約５年', '初めてのフレームワークとして', 'コーポレートサイト、WEBシステム', 'gem、ERB、ActiveRecord'
),(
  'Ruby on Rails', '約半年', '初めてのフレームワークとして', '自社内WEBシステム', 'gem、ERB、ActiveRecord'
),(
  'Python', '約半年', 'プロトタイプの製作（実験）として', 'プロトタイプ製作', 'Flask、Bottle'
),(
  'MySQL', '約３年', '私にとって一番身近なRDBです。', 'コーポレートサイト、WEBシステム', 'Mroonga'
)
