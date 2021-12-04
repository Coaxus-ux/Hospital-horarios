<!DOCTYPE html>

<html >

<body>
<form action="../backEnd/users/adminUser.php" method="post">
        <h1>AGREGAR NUEVO USUARIO</h1>
        <table>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="userName" required></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td><input type="text" name="userLastName" required></td>
            </tr>
            <tr>
                <td>Especialidad</td>
                <td><select name="specialtyID">
                <?php
                        include_once('../backEnd/controller/controllerSpecialty.php');
                        include_once('../backEnd/specialty/specialty.php');
                        $specialtyController = new SpecialtyController();
                        $listSpecialties = $specialtyController->showSpecialties();
                        $specialty = new Specialty();
                        foreach($listSpecialties as $specialty){ ?>
                            <option value="<?php echo $specialty->getId() ?>"> <?php echo $specialty->getSpecialtyName() ?> </option>
                        <?php }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td>Numero de licencia profecional</td>
                <td><input type="text" name="professionalLicenseNumber" required></td>
            </tr>
            <tr>
                <td>Identificacion del Usuario</td>
                <td><input type="text" name="citizenshipID" required></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="tel" name="phoneNumber" required></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input type="email" name="userEmail"></td>
            </tr>
            <tr>
                <td>Estado</td>
                <td><input type="radio" name="userAvailability" value="1" checked/>Activo</td>
                <td><input type="radio" name="userAvailability" value="0" />Inactivo</td>
            </tr>
            <input type='hidden' name='agregar' value='agregar'>
        </table>
        <div>
            <input class="btn btn-warning" name="submit" type='submit' value='Guardar' style="margin-right:1%;">
        </div>
    </form>
</body>

</html>