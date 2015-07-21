<?php

if (is_array($result)) {

    for ($i = count($result) - 1; $i >= 0; $i--) {

       if (is_array($result[$i])) {

           print_r('
                    <div class="row">
                        <div class="info">
                            <p class="date"><i>Date:</i> '.$result[$i][4].'</p>
                            <p class="name"><i>Name:</i> <b>'.$result[$i][0].'</b></p>
                        </div>
                        <div class="bottom-comment">
                            <div class="comments">'.$result[$i][3].'</div>
                        </div>
                    </div>
           ');

       }

    }

}

?>

