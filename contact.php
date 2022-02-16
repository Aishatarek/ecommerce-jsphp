<?php
include('dashboard/functions.php');
include('header.php');
?>
<section class="contactSec1">
    <h3>Contacts</h3>
    <div>
        <a href="index.php">Home</a>
        <p> /Contacts</p>
    </div>
</section>
<section class="container contactsec2">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div>
                <h3>Address</h3>
                <p>12 Van Dyke St,</p>
                <p>Brooklyn, NY 11231</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div>

                <h3>Phone</h3>
                <p><a href="tel:1 (800) 123-4567">1 (800) 123-4567</a></p>
                <p><a href="tel:1 (800) 123-4568">1 (800) 123-4568</a></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div>

                <h3>Mail</h3>
                <p><a href="mailto:sales@yoursite.com">sales@yoursite.com</a></p>
                <p><a href="mailto:hr@yoursite.com">hr@yoursite.com</a></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div>

                <h3>Hours</h3>
                <p>Mon - Fri: 8 AM - 6 PM</p>
                <p>Sat: 9 AM - 4 PM</p>
            </div>
        </div>
    </div>

</section>
<section class="container contactsec3">
    <h3>Drop a Line</h3>
    <?php
    include('mail/mail.php');
    ?>
</section>
<section class="contactsec4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7291202.857007517!2d26.381827612091957!3d26.83493778143627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14368976c35c36e9%3A0x2c45a00925c4c444!2sEgypt!5e0!3m2!1sen!2seg!4v1643996487939!5m2!1sen!2seg" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>
<?php
include('footer.php');
?>