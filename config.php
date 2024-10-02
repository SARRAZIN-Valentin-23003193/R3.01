<?php

function base_url($path = '') {
    return 'https://' . $_SERVER['HTTP_HOST'] . '/' . trim($path, '/');
}
