<?php
session_start();
include_once('../backEnd/controller/controllerUser.php');
include_once('../backEnd/specialty/specialty.php');
include_once('../backEnd/controller/controllerSpecialty.php');
$specialtyController = new SpecialtyController();
$listSpecialties = $specialtyController->showSpecialties();
$specialty = new Specialty();
$userController = new UserController();
?>
<html data-theme=<?php echo $_SESSION['theme'] ?>>
<?php include '../includes/head.php'; ?>

<body>

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad de Medicos</th>
                        <th>Disponibilidad</th>

                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listSpecialties as $specialty) { ?>
                    <tr>
                        <th>
                            <label>
                                <div class="flex items-center space-x-3">
                                    <div>
                                        <div class="font-bold">
                                            <?php echo $specialty->getSpecialtyName() ?>
                                        </div>
                                        <div class="text-sm opacity-50"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="font-bold justify-center">
                                        <?php echo $userController->numberUsers($specialty->getId()) ?>
                                    </div>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?php if($specialty->getSpecialtyAvailability()==1){echo "Disponible";}else{echo "No disponible";} ?>
                        </td>
                    </tr>
                    <?php }
    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad de Medicos</th>
                        <th>Disponibilidad</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    
</body>
</html>