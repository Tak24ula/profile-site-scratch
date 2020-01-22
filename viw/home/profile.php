<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PROFILE | Nishiura Takanori - Web engineer - </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
        <?php include_once VIEW_DIR_PATH . DS . "home" . DS . "cmn" . DS . "bootstrap_head.html"; ?>
        <link rel="stylesheet" href="<?= $this->assets; ?>/ionicons-2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= $this->assets; ?>/css/normalize.css">
        <link rel="stylesheet" href="<?= $this->assets; ?>/css/main.css">

    </head>
    <body>
      <div class="page_wrapper mCustomScrollbar" data-mcs-theme="light-thin">
        <header>
            <h1 id="page_title">PROFILE</h1>
        </header>

        <main>
          <section id="works" class="l-sec_large_frame sec_frame">
            <h2>works</h2>
            <article class="web_dev_block">
              <h3>WEB開発における実績について</h3>
              <ul>
                <?php if(true): ?>
                  <?php foreach ($this->categories as $key => $val): ?>
                  <li class="l-workitem_frame">
                    <h4><?= $this->titles[$key]; ?></h4>
                    <span><?= $this->sub_titles[$key]; ?></span>
                    <div class="workitem_view">
                      <img src="<?= $this->assets; ?>/img/works/<?= $this->images[$key]; ?>" alt="<?= $this->titles[$key]; ?>">
                      <div class="over_view">
                        <div class="inner l-inner_context_wrap">
                          <span class="workitem_charge"><b>担当</b><?= $this->charges[$key]; ?></span>
                          <span class="workitem_tools"><b>ツール</b><?= $this->tools[$key]; ?></span>
                          <br>
                          <a href="<?= $this->urls[$key]; ?>" rel="noreferrer" target="_blank">
                            <button type="button" name="button" class="btn btn-info">Link</button>
                          </a>
                          <span class="workitem_date">製作時期：<?= $this->date_texts[$key]; ?></span>
                        </div>
                      </div>
                    </div>

                  </li>
                  <?php endforeach; ?>
                <?php else: ?>
                <li class="l-workitem_frame noitem">
                  準備中
                </li>
                <?php endif; ?>
              </ul>
            </article>
          </section>
          <section id="skillset" class="l-sec_large_frame sec_frame">
            <h2>skill set</h2>
            <article class="skill_list_block">
              <h3>開発に使用する言語やツールについて</h3>

              <ul>
                <?php if(true): ?>
                  <?php foreach ($this->names as $key => $val): ?>
                  <li class="l-skillset_frame">
                    <h4>
                      <?= $this->names[$key]; ?>
                      <span class="experience"><?= $this->experiences[$key];//歴 ?></span>
                    </h4>
                    <span class="achievement"><?= $this->achievements[$key];//実績 ?></span><br>
                    <span class="comment"><?= $this->comments[$key];//コメント ?></span><br>
                    <span class="incident"><?= $this->incidents[$key];//関連 ?></span>
                  </li>
                  <?php endforeach; ?>
                <?php else: ?>
                <li class="l-skillset_frame noitem">
                  準備中
                </li>
                <?php endif; ?>
              </ul>

            </article>
          </section>
          <section id="about" class="l-sec_large_frame sec_frame">
            <img class="prof" src="<?= $this->assets; ?>/img/myface.jpg" alt="">
            <div class="musk"></div>
            <h2>about</h2>
            <article class="">
              <h3>私、Nishiura Takanori - 西浦 孝則 - について</h3>
              <ul class="prof_list_block">
                <li>
                  <span class="col">氏名</span>
                  <span class="val">西浦 孝則（にしうら たかのり）</span>
                </li>
                <li>
                  <span class="col">職業</span>
                  <span class="val">WEBエンジニア [6年目]</span>
                </li>
                <li>
                  <span class="col">生年月日</span>
                  <span class="val">1989年7月10日 30歳</span>
                </li>
                <li>
                  <span class="col">出身地／在住地</span>
                  <span class="val">宮崎県日南市</span>
                </li>
              </ul>
            </article>
          </section>

        </main>
        <!-- **********************************************************************************
            Main Area END
        ********************************************************************************** -->
        <footer>
          <p class="copy">© 2020 Nishiura Takanori Profile</p>
        </footer>
      </div>
      <script src="<?= $this->assets; ?>/bootstrap-337-dist/js/bootstrap.min.js"></script>
      <script>
          var assets_path = '<?= $this->assets; ?>';
          $(window).load(function() {
            $("#mcs_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes");
          });
      </script>


    </body>
</html>
