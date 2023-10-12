<h1 class="section-title">If you like what you see, do get in touch!</h1>
<h3>You can either reach me at <a class="about-link" href="mailto:someone@yoursite.com">hello@alex-mccaughran.net</a>, or use the form below to get in touch.</h3>
<form id="contact-form" method="POST">
    <div class="contact-row">
        <label for="name">Name:</label>
        <input type="text" id="form-name" name="name" required>
    </div>

    <div class="contact-row">
        <label for="contact">Email Address or Phone Number:</label>
        <input type="text" id="contact" name="contact" required>
    </div>

    <div class="contact-row">
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
    </div>

    <div class="contact-row">
        <label for="purpose">Purpose for Contact:</label>
        <select id="purpose" name="purpose">
            <option value="Career Opportunity">Career Opportunity</option>
            <option value="Feedback">Feedback</option>
            <option value="Collaboration">Collaboration</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <button type="submit" onclick="">Submit</button>
</form>