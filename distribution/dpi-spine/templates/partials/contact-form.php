<div class="forms__container card js-contact-me js-form-container">
    <form class="contact__form">
        <label>
            <p>Full Name*</p>
            <input type="text" name="Name" required>
        </label>
        <label>
            <p>Email*</p>
            <input type="email" name="Email" required>
        </label>
        <label>
            <p>What's up?*</p>
            <textarea cols="30" rows="10" name="Whats up" required></textarea>
        </label>
        <?= get_template_part('partials/recaptcha') ?>
        <input type="submit" value="Submit">
        <input type="hidden" data-ajaxurl value="<?= admin_url('admin-ajax.php') ?>">
    </form>
</div>