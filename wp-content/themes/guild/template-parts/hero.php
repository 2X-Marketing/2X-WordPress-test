<?php
$page = $template_args['page'];
// echo '<pre>'.print_r($page).'</pre>';
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($page->ID)); 
?>
<div class="hero-inner" style="background-position: 50% 50%; background-image: url('<?=$feat_image ?>');">
    <div class="gradient-layer"></div>
    <!--
    <div class="standout position-absolute">
        <img src="<?php //echo wp_get_attachment_image_src($page->hero_section_foreground_image, 'full')[0]?>" class="img-fluid">
    </div>
    -->
</div>