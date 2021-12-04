<?php

require_once('../controller/controllerSpecialty.php');
require_once('specialty.php');

$crud  = new SpecialtyController();
$specialty = new Specialty();

if (isset($_POST['agregar'])) {
    $specialty->setSpecialtyName($_POST['specialtyName']);
    $specialty->setSpecialtyAvailability($_POST['specialtyAvailability']);

    $crud->registerSpecialty($specialty);
    header('Location: ../../views/index.php');

}

?>