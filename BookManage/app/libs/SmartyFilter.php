<?php

function get_image_url($filename) {
    return THUMBS_PATH. $filename;
}

function is_admin(\App\Models\User $user) {
    return $user->role_id == \App\Models\User::ROLE_ADMIN;
}
