<div class="forms__container card js-contact-me js-form-container">
    <button class="forms__toggle forms__toggle-mb btn js-forms-toggle">
        <?= get_template_part('svg/x') ?>
    </button>
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
    </form>
</div>