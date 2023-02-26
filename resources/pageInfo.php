<?php
// This page hold any information needed for the current page

// Depending on the page apply the appropiate title
if(strpos($_SERVER['REQUEST_URI'],"/admin") > -1){
    $_SESSION['CurrentPage'] = "admin - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
    if(strpos($_SERVER['REQUEST_URI'],"index.php") == False){
        verifyAdmin();
    }
}
else if(strpos($_SERVER['REQUEST_URI'],"/")){
    $_SESSION['CurrentPage'] = "animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/index.php")){
    $_SESSION['CurrentPage'] = "home - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/lifestyle.php")){
    $_SESSION['CurrentPage'] = "lifestyle - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/contact.php")){
    $_SESSION['CurrentPage'] = "contact - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/anime.php")){
    $_SESSION['CurrentPage'] = "anime - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/manga.php")){
    $_SESSION['CurrentPage'] = "manga - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/about.php")){
    $_SESSION['CurrentPage'] = "about - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/news.php")){
    $_SESSION['CurrentPage'] = "news - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/privacyPage.php")){
    $_SESSION['CurrentPage'] = "privacy - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"randomnamegenerator.php")){
    $_SESSION['CurrentPage'] = "random name - animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}
else if(strpos($_SERVER['REQUEST_URI'],"/article.php") > -1){
    // Query to fetch currently available articles
    $ID = mysqli_real_escape_string($conn, $_GET['ID']);

    $FetchArticles = "SELECT * FROM omoore94_animerooms.cmsarticles AS A INNER JOIN omoore94_animerooms.cmsarticlesinfo AS AI ON AI.ID = A.ID WHERE A.ID = $ID ORDER BY A.ID DESC";
    $FetchArticlesResult = mysqli_query($conn, $FetchArticles);
    $ArticleRow = array();
    while($row = mysqli_fetch_assoc($FetchArticlesResult)){
        array_push($ArticleRow, $row);
    }

    $_SESSION['CurrentPage'] = $ArticleRow[0]['ArticleName'];
    $_SESSION['CurrentSubtitle'] = $ArticleRow[0]['ArticleSubTitle'];
    $_SESSION['Description'] = $ArticleRow[0]['ArticleSubTitle'];
    $_SESSION['ArticleAuthor'] = $ArticleRow[0]['User'];

    $ImageArray = array();
    $FetchArticlesImages = "SELECT * FROM omoore94_animerooms.cmsarticlesimages WHERE ArticleID = $ID";
    $FetchArticlesImagesResult = mysqli_query($conn, $FetchArticlesImages);
    while($row = mysqli_fetch_assoc($FetchArticlesImagesResult)){
        array_push($ImageArray, $row);
    }

    $TagsArray = array();
    $FetchArticlesTags = "SELECT * FROM omoore94_animerooms.cmsarticlestags WHERE ID = $ID";
    $FetchArticlesTagsResult = mysqli_query($conn, $FetchArticlesTags);
    while($row = mysqli_fetch_assoc($FetchArticlesTagsResult)){
        array_push($TagsArray, $row);
    }

    $VideoArray = array();
    $FetchArticlesVideos = "SELECT * FROM omoore94_animerooms.cmsarticlesvideos WHERE ID = $ID";
    $FetchArticlesVideosResult = mysqli_query($conn, $FetchArticlesVideos);
    while($row = mysqli_fetch_assoc($FetchArticlesVideosResult)){
        array_push($VideoArray, $row);
    }

    $LinksArray = array();
    $FetchArticlesLinks = "SELECT * FROM omoore94_animerooms.cmsarticleslinks WHERE ID = $ID";
    $FetchArticlesLinksResult = mysqli_query($conn, $FetchArticlesLinks);
    while($row = mysqli_fetch_assoc($FetchArticlesLinksResult)){
        array_push($LinksArray, $row);
    }
}
else{
    $_SESSION['CurrentPage'] = "animerooms";
    $_SESSION['Description'] = "Welcome to animerooms, a place where you can come to learn and talk anything anime and manga related.";
}

// If recent articles have not been stored create a recent articles variable and store the five most recent articles
// unset($_SESSION['RecentArticles']);
if(!isset($_SESSION['RecentArticles'])){
    $_SESSION['RecentArticles'] = array();
    // Query to fetch currently available articles
    $FetchArticles = "
    SELECT 
    DISTINCT
    * 
    FROM omoore94_animerooms.cmsarticles AS A 
    INNER JOIN omoore94_animerooms.cmsarticlesinfo AS B ON A.ID = B.ID 
    INNER JOIN omoore94_animerooms.cmsarticlesimages AS C ON A.ID = C.ArticleID 
    WHERE C.ImgNum = '1'
    ORDER BY Timestamp DESC 
    LIMIT 5
    ";        
    $FetchArticlesResult = mysqli_query($conn, $FetchArticles);
    while($row = mysqli_fetch_assoc($FetchArticlesResult)){
        array_push($_SESSION['RecentArticles'], $row);
    }
}

function createSlug($Url,$Var){
    $Url = strtolower($Url);
    // if(strpos($_SERVER['REQUEST_URI'],"/article.php")){
    //     $Url = substr($Url, 0, strrpos($Url, '?'));
    //     $Url .= "/Article";
    //     $Url .= "/" . $Var['ID'];
    //     $Url .= "/" . $Var['Title'];
    //     $Url = str_replace("_", "-", $Url);
    //     $Url = str_replace("#", "", $Url);
    //     $Url = str_replace("+", "", $Url);
    //     $Url = str_replace(">", "", $Url);
    //     $Url = str_replace("<", "", $Url);
    //     $Url = str_replace("(", "", $Url);
    //     $Url = str_replace(")", "", $Url);
    //     $Url = str_replace("=", "", $Url); 
    //     $Url = str_replace(" ", "-", $Url);
    // }
    // return $Url;





    
    $Slug = array();
    array_push($Slug,$Url);
    array_push($Slug,$Var['ID']);
    array_push($Slug,$Var['Title']);

    return $Slug;
} 

// echo http_build_query(createSlug($_SERVER['REQUEST_URI'],$_GET));
// $Slug = createSlug($_SERVER['REQUEST_URI'],$_GET);
// http_build_query($Slug);

// if(empty($_SESSION['ShowNewsletter'])){
//     $_SESSION['ShowNewsletter'] = false;
// }
// if($_SESSION['ShowNewsletter'] === false){
//     $_SESSION['ShowNewsletter'] = true;
// }
?>