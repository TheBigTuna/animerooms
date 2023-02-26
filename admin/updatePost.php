<?php
// include the website navbar
include('../navbar.php');
?>

<div class="container">
    <?php
        $ID = mysqli_real_escape_string($conn, $_GET['ID']);
        $FetchArticles = "SELECT * FROM omoore94_animerooms.cmsarticles AS A INNER JOIN omoore94_animerooms.cmsarticlesinfo AS AI ON AI.ID = A.ID WHERE A.ID = $ID ORDER BY A.ID DESC";
        $FetchArticlesResult = mysqli_query($conn, $FetchArticles);
    ?>
    <h3>Current Table</h3>
    <table class="table" id="UpdatePostCurrentValues">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
                <th scope="col">Tag1</th>
                <th scope="col">Tag2</th>
                <th scope="col">Tag3</th>
                <th scope="col">Tag4</th>
                <th scope="col">Tag5</th>
                <th scope="col">Img1</th>
                <th scope="col">Img2</th>
                <th scope="col">Img3</th>
                <th scope="col">Img4</th>
                <th scope="col">Img5</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_assoc($FetchArticlesResult)){
                $PostText = $row['Text'];
            ?>
            <tr>
                <td><?= $row['ID']; ?></td>
                <td><?= $row['ArticleType']; ?></td>
                <td><?= $row['Tag1']; ?></td>
                <td><?= $row['Tag2']; ?></td>
                <td><?= $row['Tag3']; ?></td>
                <td><?= $row['Tag4']; ?></td>
                <td><?= $row['Tag5']; ?></td>
                <td><?= $row['Img1']; ?></td>
                <td><?= $row['Img2']; ?></td>
                <td><?= $row['Img3']; ?></td>
                <td><?= $row['Img4']; ?></td>
                <td><?= $row['Img5']; ?></td>

            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>

    <!-- Output the current Text -->
    <h3>Current Text</h3>
    <p id="ViewCurrentText"><?= $PostText; ?></p>


    <form action="insertPost.php" method="POST">
    <!-- Enter Title -->
        <h3>Enter Title</h3>
        <input type="text" id="UpdatePostEnterTitle" name="Title" class="form-control" placeholder="Enter Title">

        <!-- Enter Subtitle -->
        <h3>Enter Subtitle</h3>
        <input type="text" id="UpdatePostEnterSubtitle" name="SubTitle" class="form-control" placeholder="Enter Subtitle">


    <!-- Select The Type of Post -->
        <h3>Post Type</h3>
            <select class="form-control" name="PostType" id="UpdatePostSelectPostType">
                <option selected disabled></option>
                <option value="Article1">Article Type 1</option>
                <option value="Article2">Article Type 2</option>
                <option value="Article3">Article Type 3</option>
                <option value="Gallery">Gallery</option>
                <option value="Video">Video</option>
                <option value="List">List</option>
            </select>

    
    <!-- Article Content -->
        <h3>Upload Text/Content</h3>
        <textarea id="UpdatePostTextBox" name="PostText" rows="15" cols="130"></textarea>

    <!-- Tag article -->
        <h3>Select Tags</h3>
        <small>Select up to 5 tags</small>
        <?php
        $FetchTags = "SELECT * FROM omoore94_animerooms.cmstags";        
        $FetchTagsResult = mysqli_query($conn, $FetchTags);
        ?>
        <div class="form-check" id="UpdatePostSelectTags">
        <?php
        while($row = mysqli_fetch_assoc($FetchTagsResult)){
        ?>
        <div class="form-check">
            <input class="form-check-input" name="Tags[]" type="checkbox" value="<?= $row['TagName']; ?>">
            <label class="form-check-label"><?= $row['TagName']; ?></label>
        </div>
        <?php
        }
        ?>
        </div>

    <!-- Add Images to article -->
        <h3>Upload Images</h3>
        <input type="file" name="Img[]" enctype="multipart/form-data">
        <input type="file" name="Img[]" enctype="multipart/form-data">
        <input type="file" name="Img[]" enctype="multipart/form-data">
        <input type="file" name="Img[]" enctype="multipart/form-data">
        <input type="file" name="Img[]" enctype="multipart/form-data">
        <btn class="btn btn-primary mb-5 mt-5">Submit</button>
    </form>
</div>