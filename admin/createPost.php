<?php
// include the website navbar
include('../navbar.php');
?>

<div class="container">
    <form action="insertPost.php" method="POST">
    <!-- Enter Title -->
        <h4 class="createPostLabel">Enter Title</h4>
        <input type="text" id="createPostEnterTitle" name="Title" class="form-control" placeholder="Enter Title">

        <!-- Enter Subtitle -->
        <h4 class="createPostLabel">Enter Subtitle</h4>
        <input type="text" id="CreatePostEnterSubtitle" name="SubTitle" class="form-control" placeholder="Enter Subtitle">


    <!-- Select The Type of Post -->
        <h4 class="createPostLabel">Post Type</h4>
            <select class="form-control" name="PostType" id="CreatePostSelectPostType">
                <option selected disabled></option>
                <option value="1">Article Type 1</option>
                <option value="2">Article Type 2</option>
                <option value="3">Article Type 3</option>
                <option value="4">Gallery</option>
                <option value="5">Video</option>
                <option value="6">List</option>
            </select>

    
    <!-- Article Content -->
        <h4 class="createPostLabel">Upload Text/Content</h4>
        <textarea id="createPostTextBox" name="PostText" rows="15" cols="130"></textarea>

    <!-- Tag article -->
        <h4 class="createPostLabel">Select Tags</h4>
        <small>Select up to 5 tags</small>
        <?php
        $FetchTags = "SELECT * FROM omoore94_animerooms.cmstags";        
        $FetchTagsResult = mysqli_query($conn, $FetchTags);
        ?>
        <div class="form-check" id="CreatePostSelectTags">
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
        <h4 class="createPostLabel">Upload Images</h4>
        <div id="CreatePostUploadFiles">
            <label>Image 1</label>
            <input type="file" name="Img[]" enctype="multipart/form-data">
            <input type="text" name="Alt[]" class="form-control createPostAltTag" placeholder="Enter Alt Description">
            <input type="text" name="Caption[]" class="form-control createPostCaption" placeholder="Enter Image Caption(Optional)">
            <br>
            <label>Image 2</label>
            <input type="file" name="Img[]" enctype="multipart/form-data">
            <input type="text" name="Alt[]" class="form-control createPostAltTag" placeholder="Enter Alt Description">
            <input type="text" name="Caption[]" class="form-control createPostCaption" placeholder="Enter Image Caption(Optional)">
            <br>
            <label>Image 3</label>
            <input type="file" name="Img[]" enctype="multipart/form-data">
            <input type="text" name="Alt[]" class="form-control createPostAltTag" placeholder="Enter Alt Description">
            <input type="text" name="Caption[]" class="form-control createPostCaption" placeholder="Enter Image Caption(Optional)">
            <br>
            <label>Image 4</label>
            <input type="file" name="Img[]" enctype="multipart/form-data">
            <input type="text" name="Alt[]" class="form-control createPostAltTag" placeholder="Enter Alt Description">
            <input type="text" name="Caption[]" class="form-control createPostCaption" placeholder="Enter Image Caption(Optional)">
            <br>
            <label>Image 5</label>
            <input type="file" name="Img[]" enctype="multipart/form-data">
            <input type="text" name="Alt[]" class="form-control createPostAltTag" placeholder="Enter Alt Description">
            <input type="text" name="Caption[]" class="form-control createPostCaption" placeholder="Enter Image Caption(Optional)">
        </div>

        <h4 class="createPostLabel">Upload Youtube Videos</h4>
        <small>Need to use the Youtube video's embeded Url</small>
        <input type="text" name="VideoUrl[]" class="form-control createPostUploadVideo" placeholder="Enter Video Url">
        <input type="text" name="VideoUrl[]" class="form-control createPostUploadVideo" placeholder="Enter Video Url">
        <input type="text" name="VideoUrl[]" class="form-control createPostUploadVideo" placeholder="Enter Video Url">
        <input type="text" name="VideoUrl[]" class="form-control createPostUploadVideo" placeholder="Enter Video Url">
        <input type="text" name="VideoUrl[]" class="form-control createPostUploadVideo" placeholder="Enter Video Url">

        <h4 class="createPostLabel">Upload Page Links</h4>
        <input type="text" name="LinkUrl[]" class="form-control createPostUploadLink" placeholder="Enter link Url">
        <input type="text" name="LinkUrl[]" class="form-control createPostUploadLink" placeholder="Enter link Url">
        <input type="text" name="LinkUrl[]" class="form-control createPostUploadLink" placeholder="Enter link Url">
        <input type="text" name="LinkUrl[]" class="form-control createPostUploadLink" placeholder="Enter link Url">
        <input type="text" name="LinkUrl[]" class="form-control createPostUploadLink" placeholder="Enter link Url">


        <button class="btn btn-primary mb-5 mt-5">Submit</button>
    </form>
</div>