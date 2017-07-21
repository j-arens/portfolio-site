<div class="forms__container card hire-me js-hire-me">
    <form class="hire-me__form">
        <label>
            <p>Full Name*</p>
            <input type="text" required>
        </label>
        <label>
            <p>Email*</p>
            <input type="email" required>
        </label>
        <label>
            <p>Phone Number*</p>
            <input type="tel" required>
        </label>
        <label>
            <p>Company</p>
            <input type="text">
        </label>
        <label>
            <p>Tell me about your project*</p>
            <textarea cols="30" rows="10" required></textarea>
        </label>
        <?= get_template_part('partials/recaptcha') ?>
        <input type="submit" value="Submit">
    </form>
</div>