<?php
     echo "
        <!-- error starts from here -->
        <style>
            .error{
                width: 100%;
                border: 2px solid rgb(2, 97, 16);
                background-color: rgba(63, 212, 63, 0.785);
                padding: 1rem;
                margin-top: 1rem;
            }
        </style>
        <div id='close'>&times;</div>
        <div class='success'>$alert</div>        
        <script>
            var close = document.getElementById('close');
            var success = document.getElementsByClassName('success')[0];

            close.onclick = function() {
                success.style.display = 'none';
            }
        </script>
        <!-- error ends from here -->
     ";
?>