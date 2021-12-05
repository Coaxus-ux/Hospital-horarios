<?php
session_start();
include_once('../backEnd/controller/controllerUser.php');
include_once('../backEnd/users/user.php');

$userController = new UserController();
$listUsers = $userController->showUsers();
$user = new User();
?>
<!DOCTYPE html>
<html data-theme=<?php echo $_SESSION['theme'] ?>>
<?php include '../includes/head.php'; ?>

<body>
    <?php
    foreach ($listUsers as $user) {
    ?>
        <div class="inline-block my-auto mx-auto">
            <div class="card bordered w-96 m-4">
                <figure>
                    <img src="data:image/jpg;base64, <?php echo base64_encode($user->getUserImage()); ?>" alt="imagenUsuario" class="rounded-xl">
                </figure>
                <div class="card-body">
                    <h2 class="card-title"><?php echo $user->getUserName() ?> <?php echo $user->getUserLastName() ?>
                        <div class="badge mx-2 badge-secondary"><?php echo $user->getSpecialtyID() ?></div>
                    </h2>
                    <div class="justify-end card-actions">
                        <button class="btn btn-secondary">Mas información</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</body>

</html>