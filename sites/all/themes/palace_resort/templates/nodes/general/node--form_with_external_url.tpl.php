<?php
$imgUri = $node->field_banner_image;
if (cdi_custom_is_mobile())
{
    $imgUri = $node->field_banner_image_mobile;
}
?>
<section class="container-fluid bloque-banner">
    <img src="<?php print file_create_url($imgUri['und'][0]['uri']); ?>" alt="<?= $imgUri['und'][0]['alt'] ?>" title="<?= $imgUri['und'][0]['title'] ?>" class="img-responsive">
    <section class="content">
        <h1><?= $node->field_title_form['und'][0]['value']; ?></h1>
    </section>
</section>
<?php
if (cdi_custom_get_market_by_language() === 'US'):
    $block = module_invoke('booking', 'block_view', 'proagents_booking');
    print render($block['content']);
endif;
?>
<?php
$block_cdi_bradcrum = module_invoke('cdi_breadcrumb', 'block_view', 'cdi_breadcrumb');
print render($block_cdi_bradcrum['content']);
?>
<section class="block-background container-fluid">
    <div id="form" style="width: 100%;">
        <?php
        $iframe = $node->field_url_iframe['und'][0]['value'];
        if (cdi_custom_get_market_by_language() == 'CA' && $node->field_url_iframe_ca['und'][0]['value'] != '')
        {
            $iframe = $node->field_url_iframe_ca['und'][0]['value'];
        }
        else if (cdi_custom_get_market_by_language() == 'LATAM' && $node->field_url_iframe_latam['und'][0]['value'] != '')
        {
            $iframe = $node->field_url_iframe_latam['und'][0]['value'];
        }

        if (strpos($iframe, '/WFrmPasswordValidation_iframe.aspx') !== FALSE && isset($_GET['hs']))
        {
            $iframe = $iframe.'?hs='.$_GET['hs'];
        }
        elseif (strpos($iframe, '/TA_LOGIN_WS.ENTRY?') !== FALSE)
        {
            $usr = $_SESSION['agent_id'];
            $agency = $_SESSION['agency_id'];
            $iframe = $iframe.'USR='.$usr.'&HGROUP=PALACE&AGENCY='.$agency;
        }
        elseif (isset($_SESSION['dataEncrypt']))
        {
            $iframe = $iframe.'?crypt='.base64_encode($_SESSION['dataEncrypt']);
        }

        ?>
        <iframe src="<?= $iframe ?>" width="100%" height="2000px" scrolling="no"></iframe>
    </div>
</section>

