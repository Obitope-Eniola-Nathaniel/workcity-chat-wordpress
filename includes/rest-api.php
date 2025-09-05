<?php
function workcity_register_rest_routes() {
    register_rest_route('workcity/v1', '/messages', [
        'methods' => 'POST',
        'callback' => 'workcity_save_message',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('workcity/v1', '/messages', [
        'methods' => 'GET',
        'callback' => 'workcity_get_messages',
        'permission_callback' => '__return_true'
    ]);
}
add_action('rest_api_init', 'workcity_register_rest_routes');

// Save new message
function workcity_save_message($request) {
    $msg = sanitize_text_field($request['message']);
    $post_id = wp_insert_post([
        'post_type' => 'chat_session',
        'post_title' => 'Chat '.time(),
        'post_content' => $msg,
        'post_status' => 'publish',
    ]);
    return ['success' => true, 'id' => $post_id, 'message' => $msg];
}

// Get messages
function workcity_get_messages() {
    $posts = get_posts(['post_type' => 'chat_session', 'numberposts' => 10]);
    $messages = [];
    foreach ($posts as $p) {
        $messages[] = ['id' => $p->ID, 'content' => $p->post_content];
    }
    return $messages;
}
