<?php
/*
Plugin Name: xCloud Magic Login
Plugin URI: https://x-cloud.app
Description: Allows users to log in with a magic URL
Version: 1.0.5
Author: xCloud
Author URI: https://x-cloud.app
License: GPL2
*/

// Custom login page to handle the magic URL
function xcloud_magic_url_login_custom_login(): void
{
    if (empty($_GET['xcloud-magic-login-token'])) {
        return;
    }

    $xcloud_url = "https://app.xcloud.host/api/site/remote-login";

    $token = $_GET['xcloud-magic-login-token'];

    $url = "{$xcloud_url}/verify?token=".$token;

    $response = wp_remote_get($url, array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ),
    ));

    if (is_wp_error($response)) {
        error_log('xcloud_magic_url_login_custom_login : '.$response->get_error_message());
        wp_redirect("$xcloud_url/failed");
        exit;
    }

    $data = wp_remote_retrieve_body($response);

    // Check for error
    if (is_wp_error($data)) {
        error_log('xcloud_magic_url_login_custom_login : '.$response->get_error_message());
        wp_redirect("$xcloud_url/failed");
        exit;
    }

    $data = json_decode($data);

    if (empty($data->success)) {
        error_log('xcloud_magic_url_login_custom_login : invalid response. `'.json_encode($data).'`');
        wp_redirect("$xcloud_url/failed");
        exit;
    }

    $user = null;

    if ($data->user) {
        $user = get_user_by('login', $data->user);
    }

    if (!$user) {
        $admins = get_users(array(
            'role' => 'administrator',
            'orderby' => 'user_registered',
            'order' => 'ASC',
            'number' => 1,
        ));

        $user = isset($admins[0]) ? $admins[0] : null;
    }

    if (empty($user)) {
        error_log('xcloud_magic_url_login_custom_login : admin user not found.');
        wp_redirect("$xcloud_url/failed");
        exit;
    }

    wp_set_auth_cookie($user->ID);
    wp_redirect(admin_url());
    exit;
}

add_action('init', 'xcloud_magic_url_login_custom_login');

// register a rest endpoint to handle the magic login
function xcloud_magic_url_login_rest_endpoint()
{
    register_rest_route('xcloud-magic-login/v1', '/plugin-status', array(
        'methods' => 'GET',
        'callback' => 'xcloud_magic_url_login_plugin_status',
        'permission_callback' => '__return_true',
    ));
}

function xcloud_magic_url_login_plugin_status()
{
    return [
        'code' => 'xcloud_magic_login_is_active',
        'version' => "1.0.5",
        'message' => 'Plugin is active',
        'callback_url' => "https://app.xcloud.host/api/site/remote-login",
    ];
}

add_action('rest_api_init', 'xcloud_magic_url_login_rest_endpoint');

