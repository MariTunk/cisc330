<?php


echo '
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
        <title>Events</title>
    </head>
    <body>
      
        <div id="initial-text" onclick="initialReact()">
            initial text
        </div>

        <script>

        function initialReact() {
            let div = document.getElementById('initial-text');
            div.innerText = 'added text!';
            div.style.backgroundColor = 'yellow';
        }

        </script>
    </body>
   </html>
 
'
?>
