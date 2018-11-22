<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

?>

<section class='block-resorts right container-fluid'>
    <article class="container">
        <h2 class="line center"><?php print t('Our Resorts')?></h2>
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>
        <?php endforeach; ?>
    </article>
</section>