<?php
    session_start();
    include('../resources/connection.php');

    $ID = mysqli_real_escape_string($conn, $_GET['ID']);
    $RemoveArticle = "DELETE FROM omoore94_animerooms.cmsarticles WHERE ID = $ID";
    $RemoveArticleResult = mysqli_query($conn, $RemoveArticle);

    $RemoveArticle = "DELETE FROM omoore94_animerooms.cmsarticlesinfo WHERE ID = $ID";
    $RemoveArticleResult = mysqli_query($conn, $RemoveArticle);

    $RemoveArticle = "DELETE FROM omoore94_animerooms.cmsarticlesimages WHERE ArticleID = $ID";
    $RemoveArticleResult = mysqli_query($conn, $RemoveArticle);

    $RemoveArticle = "DELETE FROM omoore94_animerooms.cmsarticleslinks WHERE ID = $ID";
    $RemoveArticleResult = mysqli_query($conn, $RemoveArticle);

    $RemoveArticle = "DELETE FROM omoore94_animerooms.cmsarticlestags WHERE ID = $ID";
    $RemoveArticleResult = mysqli_query($conn, $RemoveArticle);

    $RemoveArticle = "DELETE FROM omoore94_animerooms.cmsarticlesvideos WHERE ID = $ID";
    $RemoveArticleResult = mysqli_query($conn, $RemoveArticle);

    header('Location: /admin/managePost.php');
    exit();
?>