<div class="article_container user_article_container">

    <div class="article_bar user_article_bar">
        
        <div class="addPost">
            <img src="./assets/img/add.png" alt="">
            <a href = "/?controller=AddPost"> Add New Post </a>
        </div>

        <div class="calendar">
            <img src="./assets/img/calendar.png" alt="">
            <a href = "/?controller=AddPost"> Your Calendar </a>
        </div>

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
    if (!empty($articles)) { ?>

        <div class="articles user_articles">
            <?php
            for ($i=0; $i<=$articles_perPage; $i++) { ?>
                
                <div class="article">
                    
                    <a href = "/?controller=Post&id=<?=$articles[$i]['id']?>"> <img src = "<?=$articles[$i]['image']?>" alt=""> </a>
                    
                    <div class="article_info">
                        <div class="infoDate">Updated : <?=$articles[$i]['updatedate']?></div>
                        <div class="infoPublier">Published by <?=$articles[$i]['fullname']?></div>
                        <span style="font-size:0.8rem;"> <ion-icon name="eye-outline"></ion-icon> <?=$articles[$i]['viewed']?> views </span>
                    </div>
                    
                    <div class="article_title"> <a href = "/?controller=Post&id=<?=$articles[$i]['id']?>"> <?= getString(10, $articles[$i]['title']) ?> </a> </div>
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
