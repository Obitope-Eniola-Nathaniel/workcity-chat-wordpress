<?php
function workcity_chat_shortcode() {
    ob_start(); ?>
    <div id="workcity-chat-widget">
        <div id="chat-messages"></div>
        <textarea id="chat-input"></textarea>
        <button id="chat-send">Send</button>
    </div>
    <script src="<?php echo plugin_dir_url(__FILE__); ?>../assets/js/chat.js"></script>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__); ?>../assets/css/chat.css">
    <?php
    return ob_get_clean();
}
add_shortcode('workcity_chat', 'workcity_chat_shortcode');
