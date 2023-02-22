<?php 

/* Template Name: Homepage */

get_header(); ?>

<main id="content" role="main">

<?php

$h1_title = get_field('h1_title');
$body_text = get_field('body_text');
$h2_why_us_title = get_field('h2_why_us_title');

function get_user_ip() {
    $user_ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) { $user_ip = $_SERVER['HTTP_CLIENT_IP']; }
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
    else if (isset($_SERVER['HTTP_X_FORWARDED'])) { $user_ip = $_SERVER['HTTP_X_FORWARDED']; }
    else if (isset($_SERVER['REMOTE_ADDR'])) { $user_ip = $_SERVER['REMOTE_ADDR']; }
    else $user_ip = 'UNKNOWN';
    return $user_ip;
};

$city = file_get_contents('https://ipapi.co/' . $user_ip . '/city');
$region_code = file_get_contents('https://ipapi.co/' . $user_ip . '/region_code');
$city_state = $city . ", " . $region_code;

?>

<div class="main-text">
    
    <h1> <?php echo str_replace('Your Area(city)', $city, $h1_title) ?> </h1>
    
    <?php echo str_ireplace(
        ['Your Area(city)', 'your area(city, state abbr.)'],
        [$city, $city_state],
        $body_text
    ) ?>
    
    <h2> <?php echo $h2_why_us_title ?> </h2>
    
    <?php if (have_rows('why_us_bulleted_list')) {
        echo "<ul>";
        while (have_rows('why_us_bulleted_list')) : the_row();
            echo "<li>" . get_sub_field('why_us_bulleted_list_list') . "</li>";
        endwhile;
        echo "</ul>";
    }
    ?>

</div>

<div class="main-image">

    <?php $service_image = get_field('service_image'); ?>
    <img src="<?php echo $service_image; ?>" alt="">

</div>

</main>

<?php get_footer(); ?>