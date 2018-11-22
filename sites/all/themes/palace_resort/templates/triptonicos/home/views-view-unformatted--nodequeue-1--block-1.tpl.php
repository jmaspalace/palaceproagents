<?php

?>
<section class='slider-activities container-fluid'>
    <article class="flexslider">
        <ul class="slides">
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>
            <?php endforeach; ?>
        </ul>
    </article>
</section>