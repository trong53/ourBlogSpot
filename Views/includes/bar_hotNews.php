<nav class="bar_hotNews">

    <div style="font-size:1.2rem; font-weight:600; text-align:center;"> MOST VIEWED </div>

    <?php
    for ($i=0; $i<=9; $i++) { ?>

    <div class="hot_article">

        <a href = "#"> <img src = "<?= $articles_mostviewed[$i]['image'] ?>" alt=""> </a>
        
        <div class="hot_article_content"> 
            <div class="hot_article_title"> 
                <a href = "#"> <?= getString(8, $articles_mostviewed[$i]['title']) ?> </a> 
            </div>

            <div class="hot_article_info">
                <div class="infoDate"> Updated : <?= $articles_mostviewed[$i]['updatedate'] ?> </div>
                <div class="infoPublier"> Published by <?= $articles_mostviewed[$i]['fullname'] ?> </div>
                <span> <ion-icon name="eye-outline"></ion-icon> <?= $articles_mostviewed[$i]['viewed'] ?> views </span>
            </div>
            
        </div>
    </div>
    <?php } ?>

</nav>