<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<section class='slider-entertaiment container-fluid'>
    <section class="container">
        <h2 class="line"><?php print t('ENTERTAINMENT')?></h2>
        <article class="flexslider" id='slider-entertaiment'>
            <ul class="slides">
                <?php foreach ($rows as $id => $row): ?>
                    <?php print $row; ?>
                <?php endforeach; ?>
            </ul>
        </article>
    </section>
</section>