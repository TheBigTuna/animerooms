<?php
 include('../navbar.php');
?>

<style>
.quotewrap {
  height: 120px;
}

.btn-quote:focus, .btn-tweet:focus {
  outline: none;
}

.buttonhover:hover {
  background-color: #64c4d4;
  color: #ffffff;
}

.instructions {
  color: #64c4d4;
}

</style>
<div class="row top mb-5">
<div class="container text-center">
  <div class="col-md-12">
    <h1 class="mb-5">Random Name Generator</h1>
    <img id="characterImage" style="max-height: 240px;" />
  </div>
  <div class="col-md-12 quotewrap">
    <h2 id="characterName" class="mt-5"></h2>
  <!-- <p id="quote" class="h2">Life shrinks or expands in proportion to one’s courage.</p> -->
  <!-- <p id="author">Anais Nin</p> -->
  </div>
  <div class="col-md-12">
    <button id="newQuote" class="btn btn-info" onclick="generateCharacter();"><i class="fa fa-refresh"></i> Generate</button>
  </div>
</div>
</div>


<script>
    function generateCharacter(){
        var randomNumber = Math.random() * (41000 - 1) + 1;
        var randomNumber = Math.floor(randomNumber);

        // $.getJSON("https://api.jikan.moe/v3/anime/73", function(result){ 
        //     console.log(result);
        // });
        $.getJSON("https://api.jikan.moe/v3/character/" + randomNumber + "/pictures", function(result){ 
            document.getElementById("characterImage").src = result.pictures[0].large;
        });
        $.getJSON("https://api.jikan.moe/v3/character/" + randomNumber, function(result){ 
            document.getElementById("characterName").innerHTML = result.name;
        });
    }

    generateCharacter();
</script>

<?php
//  include('../footer.php');
?>
