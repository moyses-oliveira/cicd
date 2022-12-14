<?php
require 'init.php';
$level = $argv[1] ?? 'revision';
$vData = get_info();
switch ($level):
    case 'major':
        $vData['major'] += 1;
        $vData['minor'] = 0;
        $vData['build'] = 0;
        $vData['revision'] = 0;
        break;
    case 'minor':
        $vData['minor'] += 1;
        $vData['build'] = 0;
        $vData['revision'] = 0;
        break;
    case 'build':
        $vData['build'] += 1;
        $vData['revision'] = 0;
        break;
    case 'revision':
        $vData['revision'] += 1;
        break;
    default:
        echo 'level must be major, minor, build or revision' . PHP_EOL;
        exit;
        break;
endswitch;
$vData['tag'] = 'v' . implode('.', [$vData['major'], $vData['minor'], $vData['build'], $vData['revision']]);
$json = json_encode($vData);
file_put_contents(VERSION_JSON, json_encode($vData, 128));

echo $vData['tag'];
echo PHP_EOL;

