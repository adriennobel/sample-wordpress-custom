<?php 

/* Template Name: Contactpage */

get_header(); 

$fullname_ver = $email_ver = $phone_ver = $zipcode_ver = "PASSED";

?>

<main id="content-cp" role="main">

<div class="main-text-cp">
    
    <h1> <?php echo get_field('h1_title') ?> </h1>
    <p> <?php echo get_field('body_text') ?> </p>

</div>

<div class="form-container">

    <div class="form-header">
        <span style="background-color: <?php echo get_field('form_submit_button_background'); ?>;"></span>
        <h2> <?php echo get_field('form_title') ?> </h2>
    </div>

    <div id="main-form" class="">

        <form method="POST" name="contact" class="<?php echo $hidden_class; ?>">

        <?php if ( isset( $_POST['fullname'] ) && empty( trim( $_POST['fullname'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $fullname_ver = "FAILED";
        } 
        ?>
        <input type="text" name="fullname" value="<?php echo $_POST['fullname']; ?>" placeholder="* Full Name" required >

        <?php $email_regex = ' /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
            if ( isset( $_POST['email'] ) && empty( trim( $_POST['email'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $email_ver = "FAILED";
        } else if ( isset( $_POST['email'] ) && ! preg_match( $email_regex, $_POST['email'] )) {
            echo "<p class='alert'>Enter a valid email address.</p>";
            $email_ver = "FAILED";
        } 
        ?>
        <input type="email" name="email" value="<?php echo $_POST['email']; ?>" placeholder="* Email" required >

        <?php $phone_regex = '/^([0-9]{10})$/'; 
            if ( isset( $_POST['phonenumber'] ) && empty( trim( $_POST['phonenumber'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $phone_ver = "FAILED";
        } else if ( isset( $_POST['phonenumber'] ) && ! preg_match( $phone_regex, $_POST['phonenumber'] )) {
            echo "<p class='alert'>Enter a valid 10-digit phone number.</p>";
            $phone_ver = "FAILED";
        } 
        ?>
        <input type="number" name="phonenumber" value="<?php echo $_POST['phonenumber']; ?>" placeholder="* Phone Number" required >

        <input type="text" name="straddress" value="<?php echo $_POST['straddress']; ?>" placeholder="* Street Address (123 Main St.)">
        
        <?php $zipcode_regex = '/^([0-9]{5})$/';
            if ( isset( $_POST['zipcode'] ) && empty( trim( $_POST['zipcode'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $zipcode_ver = "FAILED";
        } else if ( isset( $_POST['zipcode'] ) && ! preg_match( $zipcode_regex, $_POST['zipcode'] )) {
            echo "<p class='alert'>Enter a valid zip code.</p>";
            $zipcode_ver = "FAILED";
        } 
        ?>
        <input type="number" name="zipcode" value="<?php echo $_POST['zipcode']; ?>" placeholder="* Zip Code" required >

        <textarea name="comments" rows="5" value="<?php echo $_POST['comments']; ?>" placeholder="Tell Us What You Need"></textarea>

        <input type="submit" name="submit" value="Get a Quote"  
        style="background-color: <?php echo get_field('form_submit_button_background'); ?>; color: <?php echo get_field('form_submit_button_text_color'); ?>">

        <input type="hidden" name="validate" value="<?php echo $email_ver; ?>">
        </form>


        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            if ( $fullname_ver == "PASSED" && $email_ver == "PASSED" && $phone_ver == "PASSED" && $zipcode_ver == "PASSED" ) {
                echo "<p class='respTxt'>" . get_field('form_submitted_text') . "</p>"; 
                echo "<script>document.querySelector('form[name=\"contact\"]').classList.add('hidden');</script>";
                echo "<script>console.log(" . json_encode($_POST) . ");</script>";
            }
        }
        ?>

        <?php echo "<script>console.log('name: " . $fullname_ver . " email: " . $email_ver . " phone: " . $phone_ver . " zip: " . $zipcode_ver . "');</script>"; ?>

    </div>

</div>

<div class="reveiw-container">
    
    <?php if (have_rows('review')) {
        while (have_rows('review')) : the_row();
        $rating = get_sub_field('review_star_rating') * 20;
            echo "<div class='review-block'>
                <p>\"" . get_sub_field('review_text') . "\"</p>
                <div class='name-date'>
                    <h4>" . get_sub_field('review_name') . "</h4>
                    <p>" . date("F j, Y", strtotime("-6 days")) . "</p>
                </div>
                <div class='stars-outer'>
                <div class='stars-inner' style='width: " . $rating . "%;'></div>
                </div>
            </div>";
            
        endwhile;
    }
    ?>  

</div>

</main>

<?php get_footer(); ?>