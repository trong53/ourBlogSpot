<div class="post_container ">

    <?php
    if (!empty($_SESSION)) { ?>

    <div class="post_bar">
        <div class="Post">
            <img src="./assets/img/add.png" alt="">
            <a href = "/?controller=AddPost"> Modify article </a>
        </div>
        <div class="Post">
            <img src="./assets/img/add.png" alt="">
            <a href = "/?controller=AddPost"> Delete article </a>
        </div>
    </div>

    <?php } ?>

    <img src = "<?= $selected_article[0]['image'] ?>" alt="">

    <div class="article_main">
        
        <div class="post_article">
            <div class="article_info post_article_info">
                <div class="infoDate">Updated : <?= $selected_article[0]['updatedate'] ?></div>
                <div class="infoPublier">Published by <?= $selected_article[0]['fullname'] ?></div>
                <span style="font-size:0.8rem;"> <ion-icon name="eye-outline"></ion-icon> <?= $selected_article[0]['viewed'] ?> viewed </span>
            </div>
            <div class="article_title post_article_title"> <?= $selected_article[0]['title'] ?> </div>
            <div class="article_description post_article_description"> <?= $selected_article[0]['content'] ?> </div>
        </div>

        <div class="recent_articles">
            <div class="recent_article_title">RECENT ARTICLES</div>
            
            <?php
            foreach ($recent_articles as $recent_article) { ?>

            <div class="recent_article">
            
                <a href = "/?controller=Post&id=<?= $recent_article['id'] ?>"> <img src = " <?= $recent_article['image'] ?> "> </a>
        
                <div class="hot_article_content">
                    <div class="hot_article_title">
                        <a href = "/?controller=Post&id=<?= $recent_article['id'] ?>"> <?= getString(8, $recent_article['title']) ?>  </a>
                    </div>

                    <div class="hot_article_info">
                        <div class="infoDate"> Updated : <?= $recent_article['updatedate'] ?> </div>
                        <div class="infoPublier"> Published by <?= $recent_article['fullname'] ?>  </div>
                        <span> <ion-icon name="eye-outline"></ion-icon> <?= $recent_article['viewed'] ?> views </span>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>

</div>