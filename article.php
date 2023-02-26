<?php
 include('navbar.php');
?>
<div class="row">
    <div class="container">
        <div class="ArticlePageBG">
            <!-- Article Title -->
            <div class="ArticlePageTitleBG">
                <h1 class="ArticlePageTitle"><?= $ArticleRow[0]['ArticleName']; ?></h1>
            </div>
            <!-- Article Author -->
            <h6 class="ArticlePageAuthor">By <span style="color: #0B5AA3;"><?= $ArticleRow[0]['User']; ?></span></h6>
            <!-- Timestamp from when the article was created -->
            <h6 class="ArticlePageTimestamp"><?= date("F d, Y",strtotime($ArticleRow[0]['Timestamp'])); ?></h6>
            <div id="ArticleSection">
                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <!-- First picture for the current article -->
                        <div class="ArticleMainPictureBG">
                            <img src="images/<?= $ImageArray[0]['Img']; ?>" class="ArticleImg">
                        </div>
                        <!-- List tagged categories for the current article -->
                        <div class="ArticleListTags">
                            <ul>
                                <?php 
                                    for($i=0; $i < count($TagsArray); $i++){
                                    ?>
                                        <a href="#"><li><?= $TagsArray[$i]['Tag']; ?></li></a>
                                    <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="ArticleBodyContainer">
                                    <!-- Article subtitle -->
                                    <div class="ArticleSubTitleBg">
                                        <h6 class="ArticleSubTitle"><?= $ArticleRow[0]['ArticleSubTitle']; ?></h6>
                                    </div>
                                    <div class="ArticleTextBg">
                                        <p id="ArticleText"><?php SplitArticle($ArticleRow[0]['Text'], $ArticleRow[0]['ArticleType'], $ImageArray, $VideoArray, $LinksArray); ?></p>
                                        <script>
                                            var videoOutput = $(".VideoOutput")
                                            for(var i = 0; i < videoOutput.length; i++){
                                                if($(window).width() < 576){
                                                    videoOutput[i].width = '320';
                                                    videoOutput[i].height = '215';
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="ArticleSuggestedArticlesBG">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="ArticleRecentArticlesTextTop">Recent Articles</h5>
                                <?php
                                    // Loop throught the recent articles session array
                                    foreach($_SESSION['RecentArticles'] as $row){
                                ?>
                                    <a href="/article.php?ID=<?= $row['ID']; ?>">
                                        <div class="row" style="margin: 20px 0px;">
                                            <div class="col-sm-12 col-md-5">
                                                <!-- Recent Article Images -->
                                                <div class="ArticleRecentImagesContainer">
                                                    <img src="images/<?= $row['Img']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <!-- Recent Article Titles -->
                                                <div class="ArticleRecentTitleContainer">
                                                    <h6 class="ArticleRecentTitle"><?= $row['ArticleName']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e3cdbca0bdb36bf"></script>
<?php
    include('footer.php');
?>
