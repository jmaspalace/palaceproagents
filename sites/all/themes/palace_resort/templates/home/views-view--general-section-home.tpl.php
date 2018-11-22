<?php
$datos = array();
if (!empty($view->result)){
    $datos = $view->result;
}
foreach ($datos AS $key => $dato)
{
    $item = $dato->_field_data["nid"]["entity"];
    $style = $item->field_section_style['und'][0]['tid'];
    $target = '_self';
    if (!empty($item->field_link_home_section) && $item->field_link_home_section['und'][0]['attributes']['target'] === '_blank')
    {
        $target = '_blank';
    }
    $img = $item->field_imagen_home_section;
    if (cdi_custom_is_mobile())
    {
        $img = $item->field_imagen_mobile_home_section;
    }

    if ($style == 3)
    {
    ?>
        <section class='block-green left container-fluid'>
            <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            <article class="content-green">
                <h2 class="line"><span><?= $item->title ?></span></h2>
                <p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
                <a target="<?php print $target?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']); ?>" class="enlace"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
            </article>
        </section>
<?php
    }

    if ($style == 4)
    {
    ?>
        <section class='block-content right container-fluid'>
            <?php if (cdi_custom_is_mobile()): ?>
            <section
                    class="col-md-6 col-sm-12 col-xs-12 image">
                <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            </section>
            <?php endif; ?>
            <section class="col-md-6 col-sm-12 col-xs-12">
                <article class="content">
                    <h2 class="line"><?= $item->title ?></h2>
                    <p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
                    <a target="<?php print $target?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']) ?>" class="enlace enlace-green"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
                </article>
            </section>
            <?php if (!cdi_custom_is_mobile()): ?>
            <section class="col-md-6 col-sm-6 col-xs-12 image">
                <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            </section>
            <?php endif; ?>
        </section>
<?php
    }

    if ($style == 5)
    {
        ?>
        <section class='block-content left container-fluid'>
            <?php if (cdi_custom_is_mobile()): ?>
            <section
                    class="col-md-6 col-sm-12 col-xs-12 image">
                <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            </section>
            <?php endif; ?>
            <section class="col-md-6 col-sm-12 col-xs-12">
                <article class="content">
                    <h2 class="line"><?= $item->title ?></h2>
                    <p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
                    <a target="<?php print $target?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']) ?>" class="enlace enlace-green"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
                </article>
            </section>
            <?php if (!cdi_custom_is_mobile()): ?>
            <section class="col-md-6 col-sm-6 col-xs-12 image">
                <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            </section>
            <?php endif; ?>
        </section>
<?php
    }

    if ($style == 6)
    {
        ?>
        <section class='block-background container-fluid'>
            <img src="<?= file_create_url($img['und'][0]['uri']); ?>" alt="<?= $img['und'][0]['alt'] ?>" title="<?= $img['und'][0]['title'] ?>" class="img-responsive">
            <article class="content-background align-center">
                <h2 class="line center"><?= $item->title ?></h2>
                <p><?= $item->field_description_home_section['und'][0]['value']; ?></p>
                <a target="<?php print $target?>" href="<?= _cdi_custom_get_url($item->field_link_home_section['und'][0]['url']) ?>" class="enlace enlace-white"><?= $item->field_link_home_section['und'][0]['title'] ?></a>
            </article>
        </section>
<?php
    }
?>

<?php } ?>
