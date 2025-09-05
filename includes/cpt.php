<?php
function workcity_register_chat_session_cpt() {
    register_post_type('chat_session', [
        'label' => 'Chat Sessions',
        'public' => false,
        'show_ui' => true,
        'supports' => ['title', 'editor', 'author'],
    ]);
}
add_action('init', 'workcity_register_chat_session_cpt');
