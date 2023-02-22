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
        $emailErr = $phonenumberErr = $zipcodeErr = "";
        $email = $phonenumber = $zipcode = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
                $emailErr = "Please provide your email";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Enter a valid email";
                }
            }

            if (empty($_POST["phonenumber"])) {
                $phonenumberErr = "Please provide a phone number";
            } else {
                $phonenumber = test_input($_POST["phonenumber"]);

                $numbersOnly = preg_replace(`/[^0-9]/`, "", $phonenumber);
                $numbersOnly = preg_replace(`/^1/`, "", $numbersOnly);
                if (strlen($numbersOnly) !== 10) {
                    $phonenumberErr = "Please provide a valid phone number";
                }
            }
        }

        ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="fullname" placeholder="* Full Name">
        <input type="email" name="email" placeholder="* Email">
        <span class="err-mes"><?php echo $emailErr; ?></span>
        <input type="number" name="phonenumber" placeholder="* Phone Number">
        <span class="err-mes"><?php echo $phonenumberErr; ?></span>
        <input type="text" name="straddress" placeholder="* Street Address (123 Main St.)">
        <input type="number" name="zipcode" placeholder="* Zip Code">
        <textarea name="comments" rows="5" placeholder="Tell Us What You Need"></textarea>
        <input type="submit" id="submitform" value="Get a Quote">
        </form>

    </div>

    <p class="hidden" id="respTxt"> <?php echo get_field('form_submitted_text') ?> </p>

</div>

<script>

    let formdata = {
        fullname: "",
        email: "",
        phonenumber: "",
        comments: ""
    };

    document.querySelector('#submitform').addEventListener('click', () => {
        formdata.fullname = document.querySelector('[name="fullname"]').value;
        formdata.email = document.querySelector('[name="email"]').value;
        formdata.phonenumber = document.querySelector('[name="phonenumber"]').value;
        formdata.comments = document.querySelector('[name="comments"]').value;
        console.log(formdata);

        let form = document.querySelector('#main-form');
        let respTxt = document.querySelector('#respTxt');

        form.classList.add('hidden');
        respTxt.classList.remove('hidden');
    })
</script>

<div class="reveiw-container">
    
    <?php if (have_rows('review')) {
        while (have_rows('review')) : the_row();
            echo "<div class='review-block'>
                <p>&rquot;" . get_sub_field('review_text') . "&lquot;</p>
                <div class='name-date'>
                    <h4>" . get_sub_field('review_name') . "</h4>
                    <p>date</p>
                </div>
                <p class='star-rating'>" . get_sub_field('review_star_rating') . "</p>
            </div>";
        endwhile;
    }
    ?>    

</div>

</main>

<?php get_footer(); ?>