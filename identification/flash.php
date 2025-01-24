<?php

function messageFlash() : void {
    if(isset($_SESSION['flash'])) {
        foreach($_SESSION['flash'] as $type => $message) {
            echo "<div class='custom-alert custom-alert-$type'>
                    <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span>
                    $message
                  </div>";
        }
        unset($_SESSION['flash']);
    }
}