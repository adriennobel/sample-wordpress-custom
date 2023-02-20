# Three Ships(3S) Developer Evaluation

![alt](https://3shome.three-ships.com/wp-content/uploads/2021/10/3s-dev-eval-header.png, '3S Dev Evaluation')

This WordPress repository is set up to evaluate 3S Developer candidates. This is not meant to be difficult, and it should not take an inordinate amount of time. Therefore, there is no flashy, nor ground shattering development happening here. Rather, we use this as a tool to evaluate that a candidate understands WordPress and demonstrates front-end development best practices.  If you feel you have spent a significant amount of time on the evaluation and have yet to complete it, please push up what you have completed and send us an email. 

You will use a simple WordPress theme called Blank Slate. This is a bare bones themes to build from the ground up. If any updates are needed to the WP Core, theme or plugins, please do so.  Below are several tasks to perform before pushing your code back up to the repository. Once completed, please let the requestor know you have finished.     

## 1. Create Your Own Branch

Download this repository and create your own branch.

## 2. Setup and Run WordPress Locally

After setting up your own branch, use wp-config-local.php to establish your database connection. Using this file may be slightly different than you're used to, but our host, Pantheon, recommends this additional file to leave wp-config.php untouched.  Once your site is running locally proceed to the next step.  

## 3. Create a Two Page Site

For this site you will create two page templates.  We will populate the content on these pages utilizing the plugin Advanced Custom Fields Pro which has been included in this project.  You can disable the default page/post editor for each page.  Style the site as close to the design images as possible. You will find the design and content assets in the /wp-content/assets folder of this project.

### Global Settings
> Shared settings across the site
* Default font - https://fonts.google.com/noto/specimen/Noto+Sans
* Footer should have the copyright year update automatically
* Using ACF, create an options page called Global Settings.  For this options page create an ACF field group with the following fields
    * Header Logo (image upload)
    * Favicon (image upload)
    * Enable Sticky Header (true/false)
    * Sticky Header Call to Action (text)
    * Sticky Header Link (text or URL)

### Page Requirements
> Using the Global Settings defined above, populate these fields on each page
* Header logo
* Favicon
* Meta Title
* Meta Description
* Sticky header (if enabled)
* Navigation

> Create the following page templates 
* Homepage
    * Create a custom field group with ACF to populate each section on the homepage and meta fields
        * Meta Title (text)
        * Meta Description (text)
        * H1 Title (text)
        * Body Text (wysiwyg)
        * H2 Why Us Title (text)
        * Why Us Bulleted List (this should be a repeater field allowing the admin to add as many list items as they need)
        * Service Image
    * Create the template by referencing the Home ACF fields
    * The location text (e.g. Raleigh in the design image) should default to "Your Area", but will automatically update to the user's location based on their IP address.  Use the following API to determine the user's location: https://ipapi.co/api/.  Any location content(Your Area, Area) that is underlined should update to the location returned from this API.  In some instances, it may only be the city.  In other occurrences it could be the city and state. 
    * For the Why Us Bulleted List, loop through the ACF field to build this list. 
* Contact Us
    * Create a custom field group with ACF to populate each section on the contact us page and meta fields
        * Meta Title (text)
        * Meta Description (text)
        * H1 Title (text)
        * Body Text (wysiwyg)
        * Review (repeater)
            * Review Text (text)
            * Review Name (text)
            * Review Star Rating (number)
        * Form Title (text)
        * Form Submit Button Text (text)
        * Form Submit Button Background (color picker)
        * Form Submit Button Text Color (color picker)
        * Form Submitted Text (text area)
    * Create the template by referencing the Contact Us ACF fields
    * For the star ratings, using [Font Awesome](https://fontawesome.com/v5.15/how-to-use/on-the-web/setup/hosting-font-awesome-yourself), show the appropriate number of star icons to represent the Review Star Rating ACF setting
    * Form Info
        * Validate the following form fields
            * Email
            * Phone Number
            * Zip Code
        * Upon validation and submission, replace the form with the ACF Form Submitted Text.  Also, provide a log to the console, in an array format, with the following fields:
            * First Name
            * Last Name
            * Email
            * Phone
            * Comments

## 4. Optimization

While this is a minimal site, ensure that your pages are optimized for performance on both mobile and desktop.  You can use a plugin, minifier, preprocessors or whatever else you may have experience with.

## 5. Push Your Branch

Once completed, export your local database and include the file in the /wp-content/assets folder.  Then push your branch to the repository.  Let the requestor know you have finished and our team will follow up with you shortly.  

- - - -
