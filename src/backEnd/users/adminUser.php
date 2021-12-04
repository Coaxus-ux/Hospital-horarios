<?php

require_once('../controller/controllerUser.php');
require_once('user.php');

$crud  = new UserController();
$user = new User();

if (isset($_POST['agregar'])) {
    $user->setUserName($_POST['userName']);
    $user->setUserLastName($_POST['userLastName']);
    $user->setSpecialtyID($_POST['specialtyID']);
    $user->setProfessionalLicenseNumber($_POST['professionalLicenseNumber']);
    $user->setCitizenshipId($_POST['citizenshipID']);
    $user->setPhoneNumber($_POST['phoneNumber']);
    $user->setUserEmail($_POST['userEmail']);
    $user->setUserAvailability($_POST['userAvailability']);
    $user->setUserImage('1');

    $crud->registerUser($user);
    header('Location: ../../views/index.php');

}

?>