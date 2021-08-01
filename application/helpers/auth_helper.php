<?php

function check_already_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('status');
    if ($user_session) {
        redirect('dashboard', 'refresh');
    }
}

function check_not_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('status');
    if ($user_session != 'login') {
        $CI->session->set_flashdata('error', 'Please login to continue!');
        redirect('auth/login', 'refresh');
    }
}
