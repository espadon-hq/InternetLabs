<?php
/**
 * Plugin Name: Shimanskyi Vitaliy Feedback Form
 * Description: Простий плагін зворотного зв'язку від Shimanskyi Vitaliy.
 * Version: 1.0
 * Author: Shimanskyi Vitaliy
 */

if (!defined('ABSPATH')) {
    exit;
}

function svf_enqueue_assets() {
    wp_enqueue_style('svf-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('svf-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'svf_enqueue_assets');

function svf_feedback_form_shortcode() {
    ob_start();
    ?>
    <form id="svf-feedback-form" method="post">
        <label for="svf-name">Name</label>
        <input type="text" name="svf_name" required>

        <label for="svf-email">Email</label>
        <input type="email" name="svf_email" required>

        <label for="svf-message">Message</label>
        <textarea name="svf_message" required></textarea>

        <button type="submit">Send</button>
    </form>

    <?php if (isset($_POST['svf_name'])): ?>
        <div class="svf-thank-you">Thank you for your message!</div>
    <?php endif; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['svf_name'])) {
        $name = sanitize_text_field($_POST['svf_name']);
        $email = sanitize_email($_POST['svf_email']);
        $message = sanitize_textarea_field($_POST['svf_message']);

        $to = get_option('admin_email');
        $subject = "New Feedback from $name";
        $headers = array('Content-Type: text/html; charset=UTF-8', "From: $name <$email>");

        wp_mail($to, $subject, $message, $headers);
    }

    return ob_get_clean();
}
add_shortcode('svf_feedback_form', 'svf_feedback_form_shortcode');
