<?php
require 'init.php';

// git ls-remote --tags | grep "[0-9]$" | sort -V | sed -r "s#.+(v[0-9\.]+)#\1#g"
$origin = 'https://moyses-oliveira:ATBBSsSUEmrB49MZWxCTYu8MGGsy7BE70ED2@bitbucket.org/moyses-oliveira/emobiliaria-api.git';
$remoteversionCommands = [
    "git -c 'versionsort.suffix=-' ls-remote --tags --sort='v:refname' $origin ",
    "tail -n1",
    "sed -E 's|.*refs/tags/(v[0-9\\.]+).+|\\1|'"
];
$gitversion = exec('git tag -l | sort -V | tail -1');
$remoteversion = exec(implode(' | ', $remoteversionCommands));
$info = get_info();
echo 'remote: ' . $remoteversion . PHP_EOL;
echo 'current: ' . $gitversion . PHP_EOL;
exit;
$gitversion = exec('git tag -l | sort -V | tail -1');
if($gitversion === get_version()):
    echo 'nothing to deploy' . PHP_EOL;
    return;
endif;

echo $gitversion . PHP_EOL;
//echo json_encode($argv) . PHP_EOL;
//echo json_encode($argc) . PHP_EOL;

