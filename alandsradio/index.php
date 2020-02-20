<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ålands Nyhetssamling | Ålands Radio</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body>

    <div class="w3-row">
        <div class="w3-col l2 w3-hide-small w3-hide-medium">&nbsp</div>
        <div class="w3-col l8">

            <div class="w3-container w3-blue w3-hide-small"><h1>Ålands Nyhetssamling</h1></div>
            <div class="w3-container w3-blue w3-center w3-hide-large w3-hide-medium"><h1>Ålands Nyhetssamling</h1></div>

            <div class="w3-bar w3-yellow w3-large w3-bar">
                <a href="/~jannt/dev/alands-nyhetssamling" class="w3-bar-item w3-button w3-hover-red">Hem</a>
                <a href="/~jannt/dev/alands-nyhetssamling/alandsradio" class="w3-bar-item w3-button w3-hover-red w3-hide-small w3-red">Ålands Radio</a>
                <a href="/~jannt/dev/alands-nyhetssamling/alandstidningen" class="w3-bar-item w3-button w3-hover-red w3-hide-small">Ålandstidningen</a>
                <a href="/~jannt/dev/alands-nyhetssamling/nyaaland" class="w3-bar-item w3-button w3-hover-red w3-hide-small">Nya Åland</a>
                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
            </div>

            <div id="respnav" class="w3-bar-block w3-yellow w3-hide w3-hide-large w3-hide-medium w3-large">
                <a href="/~jannt/dev/alands-nyhetssamling/alandsradio" class="w3-bar-item w3-button w3-hover-red w3-red">Ålands Radio</a>
                <a href="/~jannt/dev/alands-nyhetssamling/alandstidningen" class="w3-bar-item w3-button w3-hover-red">Ålandstidningen</a>
                <a href="/~jannt/dev/alands-nyhetssamling/nyaaland" class="w3-bar-item w3-button w3-hover-red">Nya Åland</a>
            </div>

            <div>
                <?php
                    //Feed URLs
                    $feeds = array(
                        "https://alandsradio.ax/rss"
                    );
                    
                    //Read each feed's items
                    $entries = array();
                    foreach($feeds as $feed) {
                        $xml = simplexml_load_file($feed);
                        $entries = array_merge($entries, $xml->xpath("//item"));
                    }
                    
                    //Sort feed entries by pubDate
                    usort($entries, function ($feed1, $feed2) {
                        return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
                    });
                    
                    ?>
                    
                    <ul class="w3-ul"><?php
                    //Print all the entries
                    foreach($entries as $entry){
                        ?>
                            <li>
                                <h3><?= $entry->title ?></h2>
                                <p><?= $entry->description ?></p>
                                <p>Läs vidare på <a href="<?= $entry->link ?>" target="_blank"><?= parse_url($entry->link)['host'] ?></a></p>
                                <p><?= strftime('%d/%m/%Y %R', strtotime($entry->pubDate)) ?></p>
                            </li>
                        <?php
                    }
                ?>
                    
            </div>
        
        </div>
        <div class="w3-col l2 w3-hide-small w3-hide-medium w3-right">&nbsp</div>
    </div>

    <div class="w3-row">
        <div class="w3-col l2 w3-hide-small w3-hide-medium">&nbsp</div>
        <div class="w3-col l8">
            <div class="w3-container w3-blue w3-hide-small">
                <h5>Skapad av Jann Tötterman | <a href="mailto:44924@gymnasium.ax" target="_blank">44924@gymnasium.ax</a> | <a href="https://github.com/terper/alands-nyhetssamling" taget="_blank">GitHub</a> för sidan</h5>
            </div>
            <div class="w3-container w3-blue w3-hide-large w3-hide-medium w3-center">
                <h5>Skapad av Jann Tötterman | <a href="mailto:44924@gymnasium.ax" target="_blank">44924@gymnasium.ax</a> | <a href="https://github.com/terper/alands-nyhetssamling" taget="_blank">GitHub</a> för sidan</h5>
            </div>
        </div>
        <div class="w3-col l2 w3-hide-small w3-hide-medium w3-right">&nbsp</div>
    </div>

    <script>
        function myFunction() {
          var x = document.getElementById("respnav");
          if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
          } else { 
            x.className = x.className.replace(" w3-show", "");
          }
        }
    </script>

</body>
</html>