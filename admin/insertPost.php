<?php
    session_start();
    include('../resources/connection.php');
    
    $Tag = "";
    $Img = "";
    $Vid = "";
    $Url = "";
    $Alt = "";
    $Caption = "";

    $Title = mysqli_real_escape_string($conn, $_POST['Title']);
    $SubTitle = mysqli_real_escape_string($conn, $_POST['SubTitle']);
    $User = mysqli_real_escape_string($conn, "Octavius");
    $CurrentDate = mysqli_real_escape_string($conn, date("Y-m-d H:i:s"));
    $ArticleType = mysqli_real_escape_string($conn, $_POST['PostType']);
    $ArticleText = mysqli_real_escape_string($conn, $_POST['PostText']);
    $Tag = mysqli_real_escape_string($conn, $_POST['Tags'][0]);
    $Img = mysqli_real_escape_string($conn, $_POST['Img'][0]);
    $Vid = mysqli_real_escape_string($conn, $_POST['VideoUrl'][0]);

    // Begin transaction
    // mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);

    $InsertFail = false;

    // Checks for the largest ID available
    $FetchID = "SELECT max(ID) AS ID FROM omoore94_animerooms.cmsarticles";        
    $FetchIDResult = mysqli_query($conn, $FetchID);
    while($row = mysqli_fetch_assoc($FetchIDResult)){
        $ID = $row['ID'];
    }
    // Adds one to the largest ID available
    $ID++;

    $ID = mysqli_real_escape_string($conn, $ID);

    // Insert into article results table
    $InsertArticle = "INSERT INTO omoore94_animerooms.cmsarticles (ID, ArticleName, ArticleSubTitle, User, Timestamp) VALUES ('$ID', '$Title', '$SubTitle', '$User', '$CurrentDate'); ";  
    $InsertArticleResult = mysqli_query($conn, $InsertArticle);

    // Insert into article info table
    $InsertArticleInfo = "INSERT INTO omoore94_animerooms.cmsarticlesinfo (ID, ArticleType, Text) VALUES ('$ID', '$ArticleType', '$ArticleText'); ";  
    $InsertArticleInfoResult = mysqli_query($conn, $InsertArticleInfo);

    for($i = 0; $i < count($_POST['Img']); $i++){
        if(!empty($_POST['Img'][$i])){
            // Grab Image Number
            $FetchImgNum = "              
            SELECT  
            max(ImgNum) AS ImgNum 
            FROM
            (
                SELECT * FROM omoore94_animerooms.cmsarticlesimages WHERE ArticleID = '$ID'
            ) a
            ";        
            $FetchImgNumResult = mysqli_query($conn, $FetchImgNum);
            while($row = mysqli_fetch_assoc($FetchImgNumResult)){
                $ImgNum = $row['ImgNum'];
            }
            $ImgNum ++;

            // Grab Posted images
            $Img = $_POST['Img'][$i];

            // Grab Posted Alt tags
            if(!empty($_POST['Alt'][$i])){
                $Alt = $_POST['Alt'][$i];
            }
            else{
                $Alt = "NULL";
            }

            // Grab Posted Captions
            if(!empty($_POST['Caption'][$i])){
                $Caption = $_POST['Caption'][$i];
            }
            else{
                $Caption = "NULL";
            }
            $InsertArticleImages = "INSERT INTO omoore94_animerooms.cmsarticlesimages (ArticleID, ImgNum, Img, Alt, Caption) VALUES ('$ID', '$ImgNum', '$Img', '$Alt', '$Caption');";  
            $InsertArticleImagesResult = mysqli_query($conn, $InsertArticleImages);
        }
    }

    for($i = 0; $i < count($_POST['VideoUrl']); $i++){
        if(!empty($_POST['VideoUrl'][$i])){
            $FetchVideoNum = "              
            SELECT  
            max(VideoNum) AS VideoNum 
            FROM
            (
                SELECT * FROM omoore94_animerooms.cmsarticlesvideos WHERE ID = '$ID'
            ) a
            ";        
            $FetchVideoNumResult = mysqli_query($conn, $FetchVideoNum);
            while($row = mysqli_fetch_assoc($FetchVideoNumResult)){
                $VideoNum = $row['VideoNum'];
                $VideoNum ++;
            }
            $Url = $_POST['VideoUrl'][$i];
            $InsertArticleVideos = "INSERT INTO omoore94_animerooms.cmsarticlesvideos (ID, VideoNum, Url) VALUES ('$ID', '$VideoNum', '$Url');";  
            $InsertArticleVideosResult = mysqli_query($conn, $InsertArticleVideos);
        }
    }

    for($i = 0; $i < count($_POST['Tags']); $i++){
        if(!empty($_POST['Tags'][$i])){
            $FetchTagNum = "              
            SELECT  
            max(TagNum) AS TagNum 
            FROM
            (
                SELECT * FROM omoore94_animerooms.cmsarticlestags WHERE ID = '$ID'
            ) a
            ";        
            $FetchTagNumResult = mysqli_query($conn, $FetchTagNum);
            while($row = mysqli_fetch_assoc($FetchTagNumResult)){
                $TagNum = $row['TagNum'];
                $TagNum ++;
            }
            $Tags = $_POST['Tags'][$i];
            $InsertArticleTags = "INSERT INTO omoore94_animerooms.cmsarticlestags (ID, TagNum, Tag) VALUES ('$ID', '$TagNum', '$Tags');";  
            $InsertArticleTagsResult = mysqli_query($conn, $InsertArticleTags);
        }
    }

    for($i = 0; $i < count($_POST['LinkUrl']); $i++){
        if(!empty($_POST['LinkUrl'][$i])){
            $FetchUrlNum = "              
            SELECT  
            max(UrlNum) AS UrlNum 
            FROM
            (
                SELECT * FROM omoore94_animerooms.cmsarticleslinks WHERE ID = '$ID'
            ) a
            ";        
            $FetchUrlNumResult = mysqli_query($conn, $FetchUrlNum);
            while($row = mysqli_fetch_assoc($FetchUrlNumResult)){
                $UrlNum = $row['UrlNum'];
                $UrlNum ++;
            }
            $Url = $_POST['LinkUrl'][$i];
            $InsertArticleUrl = "INSERT INTO omoore94_animerooms.cmsarticleslinks (ID, UrlNum, Url) VALUES ('$ID', '$UrlNum', '$Url');";  
            $InsertArticleUrlResult = mysqli_query($conn, $InsertArticleUrl);
        }
    }

    // if($InsertFail == true){
        // $mysqli->rollback();
    // }
    // else{
        // mysqli_commit($link);
    // }

    header("Location: main.php");
?>