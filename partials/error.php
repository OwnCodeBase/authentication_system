<?php
     echo "
        <!-- error starts from here -->
        <style>
            .error{
                width: 100%;
                border: 2px solid red;
                background-color: rgb(255, 59, 59);
                padding: 1rem;
                margin-top: 1rem;
            }
            #close{
                float: right;
            }
        </style>
        
        <div class='error'>$alert
            <div id='close'>&times;</div>
        </div>        
        <script>
            var close = document.getElementById('close');
            var error = document.getElementsByClassName('error')[0];

            close.onclick = function() {
                error.style.display = 'none';
            }
        </script>
        <!-- error ends from here -->
     ";
?>