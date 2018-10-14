<?php
namespace Deployer;

require 'recipe/laravel.php';

set('application', 'hacktoberfest');
set('repository', 'git@github.com:niclasleonbock/hacktoberfest-status.git');
set('git_tty', true);

add('shared_files', ['.env', 'database/database.sqlite']);
add('shared_dirs', ['storage']);

add('writable_dirs', ['database', 'storage']);

host('prod')
    ->hostname('hacktober.party')
    ->stage('prod')
    ->set('deploy_path', '/var/www/sites/prod.{{application}}');

host('stage')
    ->hostname('stage.hacktober.party')
    ->stage('stage')
    ->set('deploy_path', '/var/www/sites/stage.{{application}}');

after('deploy:failed', 'deploy:unlock');

before('deploy:symlink', 'artisan:migrate');

