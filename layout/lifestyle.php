<?php
 include('../navbar.php');
?>

<div class="row">
    <div class="container">
        <div class="PageTitleBG">
            <h1 class="PageTitle">Lifestyle</h1>
        </div>
        <div class="ArticlePreviewBG">
        <?php
            $FetchArticles = "
            SELECT 
            DISTINCT
            * 
            FROM omoore94_animerooms.cmsarticles AS A 
            INNER JOIN omoore94_animerooms.cmsarticlesinfo AS B ON A.ID = B.ID 
            INNER JOIN omoore94_animerooms.cmsarticlesimages AS C ON A.ID = C.ArticleID 
            INNER JOIN omoore94_animerooms.cmsarticlestags AS D ON A.ID = D.ID
            WHERE C.ImgNum = '1'
            AND D.TAG = 'Lifestyle'
            ORDER BY Timestamp DESC 
            ";        
            $FetchArticlesResult = mysqli_query($conn, $FetchArticles);
            $ArticleRow = array();
            $RowCount = 0;
            while($row = mysqli_fetch_assoc($FetchArticlesResult)){
                $RowCount ++;
                if($RowCount == 1){
                    ?>
                        <div class="AritclePreviewMainCard">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="ArticlePageMainTitleBG">
                                        <a class="ArticlePreviewMainTitleLink" href="/article.php?ID=<?= $row['ID']; ?>">
                                            <h4 class="ArticlePreviewMainTitle"><?= $row['ArticleName']; ?></h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <!-- First picture for the current article -->
                                    <div class="ArticlePreviewMainPictureBG">
                                        <a href="/article.php?ID=<?= $row['ID']; ?>">
                                            <img src="/images/<?= $row['Img']; ?>" class="ArticlePreviewMainImg">
                                        </a>
                                    </div>
                                    <div class="ArticlePreviewInfoSection">
                                            <p class="ArticlePreviewInfoText"> by <?= $row['User']; ?> | <?= date("F d, Y g:i A",strtotime($row['Timestamp'])); ?></p>
                                            <?php
                                                if(strlen($row['ArticleSubTitle']) > 125){
                                                    $row['ArticleSubTitle'] = substr_replace($row['ArticleSubTitle'], "<span style='font-size:16px; font-weight: 600;'>....</span><a href='/article.php?ID=" . $row['ID'] . "'><span style='font-size:13px; color: #1bb1dc;'> Read More </span></a>", 250);
                                                }
                                            ?>
                                        <p class="ArticlePreviewImgText"><?= $row['ArticleSubTitle']; ?></p>
                                        <a href="/article.php?ID=<?= $row['ID']; ?>">
                                            <p class="ArticlePreviewInfoOptions">Read Article</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-0 col-lg-0">
                                    
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else{
                    ?>
                    <div class="ArticlePreviewCard">
                        <div class="row">
                            <div class="col-sm-12 col-lg-2">
                                <div class="ArticlePreviewImgContainer">
                                    <a href="/article.php?ID=<?= $row['ID']; ?>"><img src="/images/<?= $row['Img']; ?>" style="object-fit: cover;" class="ArticlePreviewImg"></a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <div class="ArticlePreviewContent">
                                    <a href="/article.php?ID=<?= $row['ID']; ?>"><h5 class="ArticlePreviewTitle"><?= $row['ArticleName']; ?></h5></a>
                                    <!-- <h6 class="ArticlePreviewSubTitle"><?= $row['ArticleSubTitle']; ?></h6> -->
                                    <?php
                                        if(strlen($row['Text']) > 250){
                                            $row['Text'] = substr_replace($row['Text'], "<span style='font-size:16px; font-weight: 600;'>....</span><a href='/article.php?ID=" . $row['ID'] . "'><span style='font-size:13px; color: #1bb1dc;'> Read More </span></a>", 250);
                                        }
                                    ?>
                                    <p class="ArticlePreviewText"><?= $row['Text']; ?></p>
                                    <p class="ArticlePreviewInfo"><?= date("F d, Y g:i A",strtotime($row['Timestamp'])); ?> by <span style="font-weight: 600;"><?= $row['User']; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php    
                    }
                }
                ?>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e3cdbca0bdb36bf"></script>
                <?php
                    include('../footer.php');
                ?>
                </div>
            </div>
        </div>
