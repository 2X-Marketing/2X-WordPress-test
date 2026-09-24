<?php
/*
Template Post Type: expert
*/
get_header();
$id = get_the_ID();
$expert = get_expert($id);
// $industry_expertises = maybe_unserialize($expert->industry_expertise);
// echo '<pre>';
$page_slug = 'team';
$teams_page = get_page_by_path( $page_slug, OBJECT, 'page' );
$teams_page_url = get_permalink( $teams_page->ID );
?>


<section>
    <div class="container no-pad-gutters">
        <div class="back mb-4 mb-md-5">
            <i class="fa fa-caret-left align-bottom" style="font-size: 22px;" aria-hidden="true"></i> <a
                href="<?php echo $teams_page_url; ?>" class="btn-outline-success text-uppercase px-0 ml-2">Back to team</a>
        </div>
        <!--May implement the expert's profile here -->
        <div class="row">
            <div class="col-md-4 team-left">
                <div class="team-bg-img">
                    <?php 
                    $profile_image = get_field('profile_image', $id);
                    //var_dump($profile_image);
                    //$attachment_id = attachment_url_to_postid( $profile_image );
                    echo wp_get_attachment_image ( 
                        $profile_image['ID'],
                        'full', 
                        false, 
                        [
                            "class" => "single-expert-img",
                            "alt"=> esc_attr($expert->post_title)
                        ] 
                    ); ?>
                </div>
            </div>
            <div class="col-md-8 team-right">
                <div class="profile-title">
                    <h1 class=""><?= $expert->post_title; ?></h1>
                </div>
                <div class="profile-designation">
                    <h6 class=""><?= get_field('title', $id); ?></h6>
                </div>
                <div class="city-title">
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?= get_field('location', $id)->post_title; ?></p>
                </div>
                <div class="social-icon">
                    <ul class="experts-socials">
                        <?php if(get_field('email')){ ?>
                        <li>
                            <a href="mailto:<?php the_field('email'); ?>">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if(get_field('contact_no')){ ?>
                        <li>
                            <a href="tel:<?php the_field('contact_no'); ?>">
                                <i class="fa fa-phone"></i>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if(get_field('linkedin')){ ?>
                        <li>
                            <a href="<?php the_field('linkedin'); ?>" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="team-profile-con">
                    <?php echo $expert->post_content?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-bg-dark py-5 px-5">
    <div class="container no-pad-gutters">
        <h2 class="text-white text-center pb-5">Industry Expertise</h2>
        <div class="row justify-content-center align-items-center">
            <?php foreach(get_field('industry_expertise', $id) as $expertise): ?>
            <div class="col industry_icon text-center">
                <?php
                $icon = get_field('icon', $expertise->ID);
                $icon_id = attachment_url_to_postid( $icon );
                $expertise_name = get_field('name', $expertise->ID);
                echo wp_get_attachment_image ( 
                    $icon_id,
                    'full', 
                    false, 
                    [
                        "loading" => "lazy",
                        "alt"=> esc_attr($expertise_name),
                        'class' => 'img-fluid'
                    ] 
                ); 
                ?>
                <p class="text-white"><?= $expertise_name ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
get_footer();