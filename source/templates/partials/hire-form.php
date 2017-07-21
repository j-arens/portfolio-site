<div class="forms__container card js-hire-me js-form-container">
    <form class="hire-me__form">
        <label>
            <p>Full Name*</p>
            <input type="text" name="Full Name" required>
        </label>
        <label>
            <p>Email*</p>
            <input type="email" name="Email" required>
        </label>
        <label>
            <p>Phone Number*</p>
            <input type="tel" name="Phone" required>
        </label>
        <label>
            <p>Company</p>
            <input type="text" name="Company">
        </label>
        <label>
            <p>Tell me about your project*</p>
            <textarea cols="30" rows="10" name="Tell me about your project" required></textarea>
        </label>
        <?= get_template_part('partials/recaptcha') ?>
        <input type="submit" value="Submit">
        <input type="hidden" data-ajaxurl value="<?= admin_url('admin-ajax.php') ?>">
    </form>
</div>