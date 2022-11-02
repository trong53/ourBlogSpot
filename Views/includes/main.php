
    <div class="article_container">

        <div class="article_bar">
            <div class="title">RECENT POSTS</div>
            <form class="search" method="GET" action="/?search=">
                <input type="text" name="search" id="search" placeholder="Search">
                <button> <img src="./assets/img/search.png" alt=""> </button>
            </form>
            <div class="filter">
                <img src="./assets/img/filter.png" alt="">
                <select name="select" id="select" onchange="window.location = '/?page=<?=$page?>&search=<?=$search?>&filter='+this.value">
                    <option value="Date" <?= ($filter == 'Date') ? 'selected' : '' ?> >Date</option>
                    <option value="View" <?= ($filter == 'View') ? 'selected' : '' ?> >View</option>
                    <option value="Title" <?= ($filter == 'Title') ? 'selected' : '' ?> >Title</option>
                </select>
            </div>
        </div>

        <?php
        if (!empty($articles)) {

            if ($page == 1) { ?>
            <div class="first_article">
                
                <a href = "/?controller=Post&id=<?=$articles[0]['id']?>"> <img src = "<?=$articles[0]['image']?>" alt=""> </a>
                
                <div class="first_article_content">
                    <div class="first_article_info">
                        <div class="infoDate"> Updated : <?=$articles[0]['updatedate']?></div>
                        <div class="infoPublier"> Published by <?=$articles[0]['fullname']?></div>
                        <span style="font-size:0.8rem;"> <ion-icon name="eye-outline"></ion-icon> <?=$articles[0]['viewed']?> views </span>
                    </div>

                    <div class="first_article_title"> <a href = "/?controller=Post&id=<?=$articles[0]['id']?>"> <?= getString(7, $articles[0]['title']) ?> </a> </div>
                    <div class="first_article_description"><?= getString(22, $articles[0]['content']) ?> 
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="articles">
            <?php
            for ($i=(1-$j); $i<=$articles_perPage; $i++) { ?>
                
                <div class="article">
                    
                    <a href = "/?controller=Post&id=<?=$articles[$i]['id']?>"> <img src = "<?=$articles[$i]['image']?>" alt=""> </a>
                    
                    <div class="article_info">
                        <div class="infoDate">Updated : <?=$articles[$i]['updatedate']?></div>
                        <div class="infoPublier">Published by <?=$articles[$i]['fullname']?></div>
                        <span style="font-size:0.8rem;"> <ion-icon name="eye-outline"></ion-icon> <?=$articles[$i]['viewed']?> views </span>
                    </div>
                    
                    <div class="article_title"> <a href = "/?controller=Post&id=<?=$articles[$i]['id']?>"> <?= getString(6, $articles[$i]['title']) ?> </a> </div>
                    <div class="article_description"><?= getString(22, $articles[$i]['content']) ?>
                    </div>
                </div>
            <?php } ?>
            </div>

            <ul class="pagination">
                <?php
                if ($backward) { ?>
                    <a href="/?page=<?= $page-1 ?>&search=<?=$search?>&filter=<?= $filter ?>"> << </a>
                <?php } 

                if ($pagination == 2) {
                    for ($i=1; $i<=$pagination; $i++) {  ?>
                
                        <li> <a href="/?page=<?= $i ?>&search=<?=$search?>&filter=<?= $filter ?>" 
                                <?php if ($i == $page) { ?> style="font-weight:800;color:blue;text-decoration: underline" <?php } ?> > <?= $i ?> 
                            </a> 
                        </li>

                <?php } }

                if ($pagination == 3) {
                    if ($page <=3) {
                        for ($i=1; $i<=$pagination; $i++) {  ?>
                
                            <li> <a href="/?page=<?= $i ?>&search=<?=$search?>&filter=<?= $filter ?>"
                                    <?php if ($i == $page) { ?> style="font-weight:800;color:blue;text-decoration: underline;" <?php } ?> > <?= $i ?> 
                                </a> 
                            </li>

                <?php } } else {
                        for ($i=$page-2; $i<=$page; $i++) { ?>
                            <li> <a href="/?page=<?= $i ?>&search=<?=$search?>&filter=<?= $filter ?>"
                                    <?php if ($i == $page) { ?> style="font-weight:800;color:blue;text-decoration: underline" <?php } ?> > <?= $i ?> 
                                </a> 
                            </li>
                <?php } } } 

                if ($forward) { ?>
                    <a href="/?page=<?= $page+1 ?>&search=<?=$search?>&filter=<?= $filter ?>"> >> </a>
                <?php } ?>
            </ul>

        <?php }else{ 
            echo '<div class="nofound"> No article was found. </div>';
        } ?>

    </div>
