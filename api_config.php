<?php
        $curl = curl_init();
        
        curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                // CURLOPT_URL => "https://api.jikan.moe/v3/anime/1/episodes/2",
                CURLOPT_URL => "https://api.jikan.moe/v3/anime/1/episodes/2",

            ]);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

        $output = curl_exec($curl);

        curl_close($curl);  

        echo $output;
?>

<script>
  $.getJSON("https://api.jikan.moe/v3/anime/1/episodes/2", function(result){
        console.log(result);
  });
</script>