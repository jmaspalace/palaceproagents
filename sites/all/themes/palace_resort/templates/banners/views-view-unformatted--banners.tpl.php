<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<section class='bloque-slider container-fluid'>
    <div class="flexslider" id='slider-home'>
        <ul class="slides">
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- <section class='bloque-booking'>
        <div class="booking-btn booking-btn-resort active">
            <span class='active'></span>
        </div>
        <div class="booking-btn booking-btn-flight">
            <span></span>
        </div>
        <div class="booking-form">
        </div>
    </section> -->
</section>