<!DOCTYPE html>
<html>
<body>
<form action="../backEnd/specialty/adminSpecialty.php" method="post">
<h1>AGREGAR NUEVA ESPECIALIZACION</h1>
        <table>
            <tr>
                <td>Nombre de la especializacion</td>
                <td><input type="text" name="specialtyName" required></td>
            </tr>
            <tr>
                <td>Disponibilidad</td>
                <td><input type="radio" name="specialtyAvailability" value="1" checked/>Disponible</td>
                <td><input type="radio" name="specialtyAvailability" value="0" />No Disponible</td>
            </tr>
            <input type='hidden' name='agregar' value='agregar'>
        </table>
        <div>
            <input name="submit" type='submit' value='Guardar'>
        </div>
</form>
</body>
</html>