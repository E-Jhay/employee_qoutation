<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

$managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id
                        AND NOT EXISTS (
                            SELECT 1
                            FROM team
                            WHERE team.manager_id = user.id
                        )",
[
    'role_id' => Role::SALES_MANAGER
])->get();
$regions = $db->query("SELECT id, name FROM region")->get();

view("team/create.view.php", [
    'heading' => 'Create Team',
    'managers' => $managers,
    'regions' => $regions,
    'errors' => Session::get('errors')
]);