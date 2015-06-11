<div id="contents">
    <!--<h2 style="margin-bottom: 0px;">Error Occured</h2>-->

    <?php
        if( !empty( $error_msg )) {
            echo "<h3 class='text-error' style='text-align:center; margin-top: 50px; margin-bottom: 100px;'>";
            echo $error_msg;
            echo "</h3>";
        }
        elseif( !empty( $success_msg ) ) {
            echo "<h3 class='text-success' style='margin-top: 50px; margin-bottom: 100px;'>";
            echo $success_msg;
            echo "</h3>";
        }
        else {
            foreach( $result as $item ) {
                echo $item;
            }
        }
    ?>
    
</div>
