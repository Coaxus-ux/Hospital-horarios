<?php
session_start();
?>

<!DOCTYPE html>
<html data-theme=<?php echo $_SESSION['theme'] ?>>
<?php include '../includes/head.php'; ?>

<body>
    <form action="../backEnd/users/adminUser.php" method="post">
        <div class=" flex flex-wrap justify-center  md:container md:mx-auto w-screen h-screen">
            <a class="my-auto ">
                <div class="card shadow-xl  ">
                    <h2 class="card-title text-center">AGREGAR NUEVO USUARIO</h2>
                    <hr>
                    </hr>
                    <div class="card-body flex flex-row">

                        &nbsp;
                        <div>
                            <div class="form-control">
                                <label class="input-group input-group-vertical input-group-lg">
                                    <span>Nombres</span>
                                    <input type="text" name="userName" required class="input input-bordered input-lg">

                                </label>
                            </div>
                            &nbsp;

                            <div class="form-control">
                                <label class="input-group input-group-vertical input-group-lg">
                                    <span>Apellidos</span>
                                    <input type="text" name="userLastName" required class="input input-bordered input-lg">
                                </label>
                            </div>
                            &nbsp;

                            <select name="specialtyID" class="select select-bordered w-full max-w-xs">
                                <option disabled="disabled" selected="selected">Seleccione su especialidad</option>
                                < <?php
                                    include_once('../backEnd/controller/controllerSpecialty.php');
                                    include_once('../backEnd/specialty/specialty.php');
                                    $specialtyController = new SpecialtyController();
                                    $listSpecialties = $specialtyController->showSpecialties();
                                    $specialty = new Specialty();
                                    foreach ($listSpecialties as $specialty) { ?> <option value="<?php echo $specialty->getId() ?>"> <?php echo $specialty->getSpecialtyName() ?> </option>
                                <?php }
                                ?>
                            </select>
                            &nbsp;

                            <div class="form-control">
                                <label class="input-group input-group-vertical input-group-lg">
                                    <span>Numero de licencia profecional</span>
                                    <input type="text" name="professionalLicenseNumber" required class="input input-bordered input-lg">
                                </label>
                            </div>
                        </div>

                        <div class="ml-4">
                            <div class="form-control">
                                <label class="input-group input-group-vertical input-group-lg">
                                    <span>Identificacion del Usuario</span>
                                    <input type="text" name="citizenshipID" required class="input input-bordered input-lg">
                                </label>
                            </div>
                            &nbsp;

                            <div class="form-control">
                                <label class="input-group input-group-vertical input-group-lg">
                                    <span>Telefono</span>
                                    <input type="text" name="phoneNumber" required class="input input-bordered input-lg">
                                </label>
                            </div>
                            &nbsp;

                            <div class="form-control">
                                <label class="input-group input-group-vertical input-group-lg">
                                    <span>Correo</span>
                                    <input type="email" name="userEmail" required class="input input-bordered input-lg">
                                </label>
                            </div>
                            <div class="form-control">
                                <label class="cursor-pointer label">
                                    <span class="label-text">Activo</span>
                                    <input type="radio" name="userAvailability" checked="checked"  class="radio" value="1">
                                </label>
                            </div>
                            <div class="form-control">
                            <label class="cursor-pointer label">
                                    <span class="label-text">Inactivo</span>
                                    <input type="radio" name="userAvailability" checked="checked"  class="radio" value="0">
                                </label>
                            </div>

                            
                        </div>
                    </div>
                    <div class="form-control">
                            <label class="cursor-pointer label">
                                    <span class="label-text">Sube una imagen tuya</span>
                                    <input type="file" value="1">
                                </label>
                            </div>
                    <input class="btn btn-block btn-primary " name="submit" type='submit' value='Guardar' >
                </div>
                
                <input type='hidden' name='agregar' value='agregar'>
            </a>

        </div>
    </form>
</body>

</html>