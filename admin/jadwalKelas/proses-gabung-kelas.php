<?php
if(!empty($_POST['pilih'])) {
    foreach($_POST['pilih'] as $check) {
            echo $check; 
    }
}
?>