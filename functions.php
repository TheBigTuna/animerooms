<?php
    // Function to verify admins 
    function verifyAdmin(){
        if($_SESSION['IsAdmin'] != True){
            echo "<script>window.location.href = '/index.php';</script>";
        }
    }

    function createSlugLink($Url){
        // $Url = strtolower(trim($Url));
        // $Url = preg_replace('/[^a-z0-9-]/', '-', $Url);
        // $Url = preg_replace('/-+/', "-", $Url);
        // return rtrim($Url, '-');
    }

    function splitArticle($Article, $Type, $Images, $Videos, $Links){
        // $Article = substr_replace($Article, "<span style='font-size:16px; font-weight: 600;'>....</span><a href='/article.php?ID=" . $Article . "'><span style='font-size:13px; color: #1bb1dc;'> Read More </span></a>", 250);
        // Creates break tags in between paragraphs
        $Article = str_replace( "\n", '<br />', $Article);
        $Article = str_replace( "<b>", "<b>", $Article);
        $Article = str_replace( "</b>", "</b>", $Article);
        $Article = str_replace( "<i>", "<i>", $Article);
        $Article = str_replace( "</i>", "</i>", $Article);
        $Article = str_replace( "!Subheader", "<span style='font-size: 30px; font-weight: 700;'>", $Article);
        $Article = str_replace( "Subheader!", "</span>", $Article);
        for($i=0; $i < count($Links); $i++){
            $FindLink = "!Link" . $i;
            $Article = str_replace($FindLink, "<a href='" . $Links[$i]['Url'] . "'>", $Article); 
        }
        $Article = str_replace( "Link!", "</a>", $Article);
        
        switch ($Type){
            case "1":
                if(strpos($Article, "!Image2!") > -1){
                    $Article = str_replace( "!Image2!", "<img src='images/" . $Images[1]['Img'] . "'style='height: 440px; width: 520px; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image3!") > -1){
                    $Article = str_replace( "!Image3!", "<img src='images/" . $Images[2]['Img'] . "'style='height: 250px; width: 120px; float: right; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image4!") > -1){
                    $Article = str_replace( "!Image4!", "<img src='images/" . $Images[3]['Img'] . "'style='height: 200px; width: 80%; display: block; margin: 0 auto; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Video1!") > -1){
                    $Article = str_replace( "!Video1!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[0]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video2!") > -1){
                    $Article = str_replace( "!Video2!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[1]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video3!") > -1){
                    $Article = str_replace( "!Video3!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[2]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video4!") > -1){
                    $Article = str_replace( "!Video4!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[3]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video5!") > -1){
                    $Article = str_replace( "!Video5!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[4]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video6!") > -1){
                    $Article = str_replace( "!Video6!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[5]['Url'] . "'></iframe>", $Article);
                }
                break;
            case "2":
                if(strpos($Article, "!Image2!") > -1){
                    $Article = str_replace( "!Image2!", "<img src='images/" . $Images[1]['Img'] . "'style='height: 440px; width: 90%; display: block; margin: 0 auto; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image3!") > -1){
                    $Article = str_replace( "!Image3!", "<img src='images/" . $Images[2]['Img'] . "'style='height: 440px; width: 90%; display: block; margin: 0 auto; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image4!") > -1 ){
                    $Article = str_replace( "!Image4!", "<img src='images/" . $Images[3]['Img'] . "'style='height: 440px; width: 90%; display: block; margin: 0 auto; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Video1!") > -1){
                    $Article = str_replace( "!Video1!", "<iframe class='VideoOutput' width='460' height='330' src='" . $Videos[0]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video2!") > -1){
                    $Article = str_replace( "!Video2!", "<iframe class='VideoOutput' width='460' height='330' src='" . $Videos[1]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video3!") > -1){
                    $Article = str_replace( "!Video3!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[2]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video4!") > -1){
                    $Article = str_replace( "!Video4!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[3]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video5!") > -1){
                    $Article = str_replace( "!Video5!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[4]['Url'] . "'></iframe>", $Article);
                }
                if(strpos($Article, "!Video6!") > -1){
                    $Article = str_replace( "!Video6!", "<iframe class='VideoOutput' width='420' height='315' src='" . $Videos[5]['Url'] . "'></iframe>", $Article);
                }
                break;
            case "3":
                break;
            case "4":
                break;
            case "5":
                break;
            case "6":
                if(strpos($Article, "!Image1!") == true){
                    $Article = str_replace( "!Image1!", "<img src='images/" . $Images[0]['Img'] . "'style='height: 280px; width: 60%; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image2!") == true){
                    $Article = str_replace( "!Image2!", "<img src='images/" . $Images[1]['Img'] . "'style='height: 280px; width: 60%; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image3!") == true){
                    $Article = str_replace( "!Image3!", "<img src='images/" . $Images[2]['Img'] . "'style='height: 280px; width: 60%; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image4!") == true){
                    $Article = str_replace( "!Image4!", "<img src='images/" . $Images[3]['Img'] . "'style='height: 280px; width: 60%; object-fit: scale-down;'>", $Article);
                }
                if(strpos($Article, "!Image5!") == true){
                    $Article = str_replace( "!Image5!", "<img src='images/" . $Images[4]['Img'] . "'style='height: 280px; width: 60%; object-fit: scale-down;'>", $Article);
                }
                break;
        }

        echo $Article;
    }


?>