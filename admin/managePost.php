<?php
// include the website navbar
 include('../navbar.php');
?>

<div class="container">
    <!-- Manage Post Table -->
    <table class="table" id="managePostTable">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Subtitle</th>
            <th scope="col">User</th>
            <th scope="col">Timestamp</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Query to fetch currently available articles
            $FetchArticles = "SELECT * FROM omoore94_animerooms.cmsarticles AS A INNER JOIN omoore94_animerooms.cmsarticlesinfo AS AI ON AI.ID = A.ID ORDER BY A.ID DESC";        
            $FetchArticlesResult = mysqli_query($conn, $FetchArticles);
            while($row = mysqli_fetch_assoc($FetchArticlesResult)){
            ?>
                <tr class="managePostTR" onclick="openModal('<?= $row['ID']; ?>', '<?= $row['ArticleType']; ?>')">
                <th><?= $row['ID']; ?></th>
                <td><?= $row['ArticleName']; ?></td>
                <td><?= $row['ArticleSubTitle']; ?></td>
                <td><?= $row['User']; ?></td>
                <td><?= $row['Timestamp']; ?></td>
                </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
</div>

<!-- Manage Post Modal -->
<div class="modal fade" id="manageModalPost" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="max-width: 80%; margin-top 4rem;" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h5 class="modal-title" id="manageModalPostLabel">Post Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <tr id="ModalPostOutput"></tr>
            </tr>
        </tbody>
        </table>
            <div id="ModalButtonOutput"></div>
      </div>
    </div>
  </div>
</div>

<script>
    // function to open post information  modal
    function openModal(Id, Type){
        $("#manageModalPost").modal("toggle");
        $("#manageModalPost").modal("show");

        var modalInfoArray = [Id, Type];
        var modalPostOutput = "";
        
        // Concate table data to modalpostoutput variable
        for(var i=0; i < modalInfoArray.length; i++){
            modalPostOutput += "<td>" + modalInfoArray[i] + "</td>";
        }
        
        var modalButtonOutput = "";
        var updatePostUrl = 'updatePost.php?ID=' + Id + '&Type=' + Type;
        var removePostUrl = 'removePost.php?ID=' + Id;
        modalButtonOutput += "<a href=" + updatePostUrl + "><button type='button' class='btn btn-secondary'>Update</button></a>";
        modalButtonOutput += "<a href=" + removePostUrl + "><button type='button' class='btn btn-danger ml-3'>Delete</button></a>";

        // Output Post Data to table
        $("#ModalPostOutput").html(modalPostOutput);
        $("#ModalButtonOutput").html(modalButtonOutput);
    }
</script> 