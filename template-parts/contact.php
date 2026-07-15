<div class="section">
<h2><?php echo esc_html(get_theme_mod('contact_title', 'Non esitare a contattarci!')); ?></h2>
<form method="post" action="">
    <?php wp_nonce_field('sunnee_contact_form', 'sunnee_contact_nonce'); ?>
    <label for="nome">Nome*</label>
    <input type="text" id="nome" name="nome" required>
    <label for="cognome">Cognome*</label>
    <input type="text" id="cognome" name="cognome" required>
    <label for="email">Email*</label>
    <input type="email" id="email" name="email" required>
    <label for="messaggio">Messaggio*</label>
    <textarea id="messaggio" name="messaggio" required></textarea>
    <button type="submit" name="sunnee_contact_submit">Invia</button>
</form>
</div>
