<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<section class='slider-activities container-fluid'>
    <article class="flexslider" id='slider-entertaiment'>
        <ul class="slides">
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>
            <?php endforeach; ?>
        </ul>
    </article>
</section>