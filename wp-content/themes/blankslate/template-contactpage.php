<?php 

/* Template Name: Contactpage */

get_header(); ?>

<main id="content-cp" role="main">

<div class="main-text-cp">
    
    <h1> <?php echo get_field('h1_title') ?> </h1>
    <p> <?php echo get_field('body_text') ?> </p>

</div>

<div class="form-container">

    <h2> <?php echo get_field('form_title') ?> </h2>

    <div id="main-form" class="">

        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            if ( $form_complete == false ) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phonenumber = $_POST['phonenumber'];
                $straddress = $_POST['straddress'];
                $zipcode = $_POST['zipcode'];
                $comments = $_POST['comments'];

                $form_complete = true;
            } else {
                echo "<script>console.log(" . json_encode($_POST) . ");</script>";
                $hidden_class = "hidden";
                echo "<p class='respTxt'>" . get_field('form_submitted_text') . "</p>"; 
            }
        }
        ?>

        <form method="POST" name="contact" class="<?php $hidden_class; ?>">

        <?php if ( isset( $_POST['fullname'] ) && empty( trim( $_POST['fullname'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $form_complete = false;
        } 
        ?>
        <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="* Full Name" required >

        <?php $email_regex = ' /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
            if ( isset( $_POST['email'] ) && empty( trim( $_POST['email'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $form_complete = false;
        } else if ( isset( $_POST['email'] ) && ! preg_match( $email_regex, $_POST['email'] )) {
            echo "<p class='alert'>Enter a valid email address.</p>";
            $form_complete = false;
        } 
        ?>
        <input type="email" name="email" value="<?php echo $email; ?>" placeholder="* Email" required >

        <?php $phone_regex = '/^([0-9]{10})$/'; 
            if ( isset( $_POST['phonenumber'] ) && empty( trim( $_POST['phonenumber'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $form_complete = false;
        } else if ( isset( $_POST['phonenumber'] ) && ! preg_match( $phone_regex, $_POST['phonenumber'] )) {
            echo "<p class='alert'>Enter a valid 10-digit phone number.</p>";
            $form_complete = false;
        } 
        ?>
        <input type="number" name="phonenumber" value="<?php echo $phonenumber; ?>" placeholder="* Phone Number" required >

        <input type="text" name="straddress" value="<?php echo $straddress; ?>" placeholder="* Street Address (123 Main St.)">
        
        <?php $zipcode_regex = '/^([0-9]{5})$/';
            if ( isset( $_POST['zipcode'] ) && empty( trim( $_POST['zipcode'] ) ) ) {
            echo "<p class='alert'>Required field</p>";
            $form_complete = false;
        } else if ( isset( $_POST['zipcode'] ) && ! preg_match( $zipcode_regex, $_POST['zipcode'] )) {
            echo "<p class='alert'>Enter a valid zip code.</p>";
            $form_complete = false;
        } 
        ?>
        <input type="number" name="zipcode" value="<?php echo $zipcode; ?>" placeholder="* Zip Code" required >

        <textarea name="comments" rows="5" value="<?php echo $comments; ?>" placeholder="Tell Us What You Need"></textarea>

        <input type="submit" name="submit" value="Get a Quote"  
        style="background-color: <?php echo get_field('form_submit_button_background'); ?>; color: <?php echo get_field('form_submit_button_text_color'); ?>">
        </form>

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