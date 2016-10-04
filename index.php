<?php 
include("inc/data.php");
include("inc/functions.php");

$pageTitle = "Personal Media Library";
$section = null;

include("inc/header.php"); ?>
    <div class="container thumbnail">
        <h2>&nbsp;May we suggest something?</h2>
        <div class="row">
            <?php
            $random = array_rand($catalog,4);
            foreach ($random as $id) {
                echo get_item_html($id,$catalog[$id]);
            }
            ?>
        </div>
    </div>
    <?php include("inc/footer.php"); ?>