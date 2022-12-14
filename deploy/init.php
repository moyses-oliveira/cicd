<?php
define('CDIR',  __DIR__ . DIRECTORY_SEPARATOR);
define('VERSION_JSON', CDIR . 'version.json');
define('VERSION', CDIR . 'version');

function get_version() {
    return file_get_contents(VERSION);
}
function get_info():array {
    $content = file_get_contents(VERSION_JSON);
    return json_decode($content, true);
}