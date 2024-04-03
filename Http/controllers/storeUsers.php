<?php

use Core\App;
use Core\Role;
use Core\Session;
use Core\Validator;
use Http\Forms\UserCreateForm;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

// authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$roles = $db->query("SELECT id, name FROM role")->get();
// dd($roles);
// $errors = [];

// $validator = new Validator();

// if(! $validator->string($_POST['name'])) {
//     $errors['name'] = "Name is required";
// }

// if(! $validator->email($_POST['email'])) {
//     $errors['email'] = "Invalid email address";
// }

$users = [
            [
            "John Kenneth Teves",
            3,
            "john.teves@pmc.ph",
            "09755315969"
            ],
            [
            "Jennine Eleni B. Aligarbes",
            3,
            "jennine.bausing@pmc.ph",
            "09274392806"
            ],
            [
            "Raiza Marie G. Ramos",
            3,
            "raiza.ramos@pmc.ph",
            "09269828217"
            ],
            [
            "Jennifer R. Borbon",
            3,
            "Jennifer.Borbon@pmc.ph",
            "09330618890"
            ],
            [
            "Grey Mark B. Cortes",
            3,
            "grey.cortes@pmc.ph",
            "09166592761"
            ],
            [
            "Mary Ann S. Magallanes",
            3,
            "maryann.ador@pmc.ph",
            "09383528142"
            ],
            [
            "Meljun F. Carnaje",
            3,
            "meljun.carnaje@pmc.ph",
            "09467086283"
            ],
            [
            "Dea R. Saul",
            3,
            "dea.saul@pmc.ph",
            "09301019072"
            ],
            [
            "Ranghie Mae B. Esona",
            7,
            "ranghie.esona@pmc.ph",
            "09357785446"
            ],
            [
            "Yvonne Irish V. Pagulayan",
            7,
            "yvonne.pagulayan@pmc.ph",
            "09176788595"
            ],
            [
            "Rose Ann G. Pahit",
            7,
            "rose.pahit@pmc.ph",
            "09294057024"
            ],
            [
            "Keith Irish D. Sanchez",
            7,
            "keith.sanchez@pmc.ph",
            "09563650142"
            ],
            [
            "Christoval R. Petalver",
            7,
            "christoval.petalver@pmc.ph",
            "09062924880"
            ],
            [
            "Arlene Q. Roca",
            7,
            "arlene.roca@pmc.ph",
            "09354157994"
            ],
            [
            "Pearly Syde R. Semilla",
            7,
            "pearly.semilla@pmc.ph",
            "09269964020"
            ],
            [
            "Criselda T. Urbano",
            7,
            "criselda.urbano@pmc.ph",
            "09462949445"
            ],
            [
            "Jeanica E. Nunag",
            7,
            "jeanica.nunag@pmc.ph",
            "09458002515"
            ],
            [
            "Liza Mae D. Sanchez",
            7,
            "liza.sanchez@pmc.ph",
            "09054312803"
            ],
            [
            "Claire N. Singh",
            7,
            "claire.singh@pmc.ph",
            "0044-322-91"
            ],
            [
            "Rechen B. Camulte",
            5,
            "rechen.camulte@pmc.ph",
            "09279577875"
            ],
            [
            "Niña Margarita C. Rizardo",
            5,
            "nina.rizardo@pmc.ph",
            "09355497949"
            ],
            [
            "Ivy Joy C. Baldomero",
            5,
            "ivy.baldomero@pmc.ph",
            "09092781595"
            ],
            [
            "Jericho M. Edusma",
            5,
            "jericho.edusma@pmc.ph",
            "09508960327"
            ],
            [
            "Reynaldo S. Gato Jr",
            5,
            "reynaldo.gato@pmc.ph",
            0
            ],
            [
            "Maria Dolores O. Angeles",
            5,
            "dolly.angeles@pmc.ph",
            "09265001310"
            ],
            [
            "Cherelove S. Jumao-As",
            5,
            "cherelove.jumaoas@pmc.ph",
            "09213836581"
            ],
            [
            "Cherry Mae R. Lariosa",
            5,
            "cherry.lariosa@pmc.ph",
            "09382060646"
            ],
            [
            "Ivy May M. Ramil",
            5,
            "ivy.ramil@pmc.ph",
            "09503671598"
            ],
            [
            "Kenan Hess L. Tan",
            5,
            "kenan.tan@pmc.ph",
            "09067807140"
            ],
            [
            "Jeffrey L. Ceniza",
            4,
            "jeffrey.ceniza@pmc.ph",
            "09508260548"
            ],
            [
            "Cedrick Joshua B. Gaspacho",
            4,
            "cedrick.gaspacho@pmc.ph",
            "09686251002"
            ],
            [
            "Louie Jay T. Gelle",
            4,
            "louie.gelle@pmc.ph",
            "09120258915"
            ],
            [
            "Raziel Ann C. Miras",
            4,
            "raziel.miras@pmc.ph",
            "09212411419"
            ],
            [
            "Glesty S. Roldan",
            4,
            "glesty.roldan@pmc.ph",
            "09177750214"
            ],
            [
            "Vince Alfred B. Alviar",
            8,
            "vince.alviar@pmc.ph",
            "09278936350"
            ],
            [
            "Edgar Stephen G. Baltazar",
            8,
            "edgar.baltazar@pmc.ph",
            "09560376115"
            ],
            [
            "Lymariana A. Jose",
            9,
            "lymariana.jose@pmc.ph",
            "09308121909"
            ],
            [
            "Ebenezer G. Ocampo",
            9,
            "ebenezer.ocampo@pmc.ph",
            "09563156341"
            ],
            [
            "Kimberly Rose L. De Guzman",
            10,
            "kimberly.deguzman@pmc.ph",
            "09261933471"
            ],
            [
            "Catherine N. Rodis",
            10,
            "catherine.rodis@pmc.ph",
            "09939348530"
            ],
            [
            "Aljon J. Zaguirre",
            10,
            "aljon.zaguirre@pmc.ph",
            "09670424795"
            ]
];

// foreach($users as $user) {
//     echo $count . " " . $user[3]. '<br>';
//     $count++;
// }

try {
    $db->beginTransaction();

    
$count = 1;
    foreach($users as $user) {
        echo "{$count} {$user[0]} {$user[1]} {$user[2]} {$user[3]} <br>";
        $count++;

        
        // $db->query("INSERT INTO user(name, email, address, phone, password, role_id, team_id) VALUES(:name, :email, :address, :phone, :password, :role_id, :team_id)", [
        //     'name' => $user[0],
        //     'email' => strtolower($user[2]),
        //     'address' => "200 C Reymundo Ave. Brgy Caniogan Pasig City",
        //     'phone' => $user[3],
        //     'password' => password_hash("pmc12345", PASSWORD_BCRYPT),
        //     'role_id' => 1,
        //     'team_id' => $user[1],
        // ]);
    }

    echo "Users added.";
    $db->commit();
} catch(Exception $e) {
    
    // An error occurred, rollback the transaction
    if ($db->connection() !== null) {
        $db->rollback();
    }
    echo $e->getMessage();
    exit;
    throw new Exception('There\'s something wrong happened upon creating user.');
}