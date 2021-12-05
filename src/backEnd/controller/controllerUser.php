<?php 
    require_once('conection.php');
    class UserController{
        public function __construct(){}

        // method to register a user
        public function registerUser($user){
            $dataBase=conectionDataBase::conection();
            $insert = $dataBase -> prepare('INSERT INTO users VALUES(NULL,:userName,:userLastName,:specialtyID,:professionalLicenseNumber,:citizenshipID,:phoneNumber,:userEmail,:userAvailability,:userImage)');
            $insert -> bindValue('userName',$user->getUserName());
            $insert -> bindValue('userLastName',$user->getUserLastName());
            $insert -> bindValue('specialtyID',$user->getSpecialtyID());
            $insert -> bindValue('professionalLicenseNumber',$user->getProfessionalLicenseNumber());
            $insert -> bindValue('citizenshipID',$user->getCitizenshipID());
            $insert -> bindValue('phoneNumber',$user->getPhoneNumber());
            $insert -> bindValue('userEmail',$user->getUserEmail());
            $insert -> bindValue('userAvailability',$user->getUserAvailability());
            $insert -> bindValue('userImage',$user->getUserImage());
            $res = $insert -> execute();
            return $res;
        }

        // method to show all users
        public function showUsers(){
            $dataBase=conectionDataBase::conection();
            $userList = [];
            $select = $dataBase -> query('SELECT * FROM users');
            
            foreach($select -> fetchAll() as $user){
                $userList = new user();
                
                $userList -> setId($user['id']);
                $userList -> setUserName($user['userName']);
                $userList -> setUserLastName($user['userLastName']);
                $userList -> setSpecialtyID($user['specialtyID']);
                $userList -> setProfessionalLicenseNumber($user['professionalLicenseNumber']);
                $userList -> setCitizenshipID($user['citizenshipID']);
                $userList -> setPhoneNumber($user['phoneNumber']);
                $userList -> setUserEmail($user['userEmail']);
                $userList -> setUserAvailability($user['userAvailability']);
                $userList -> setUserImage($user['userImage']);
                $usersList[] = $userList;
            }
            return $usersList;
        }  
        // method to change user availability
        public function changeAvailability($id){
            $dataBase=conectionDataBase::conection();
            $update = $dataBase -> prepare('UPDATE users SET userAvailability = 0 WHERE id = :id');
            $update -> bindValue('id',$id);
            $update -> execute();
        }
        // method to actualize user
        public function actualizeUser($user){
            $dataBase=conectionDataBase::conection();
            $actualize = $dataBase -> prepare('UPDATE users SET userName = :userName, userLastName = :userLastName, specialtyID = :specialtyID, professionalLicenseNumber = :professionalLicenseNumber, citizenshipID = :citizenshipID, phoneNumber = :phoneNumber, userEmail = :userEmail, userAvailability = :userAvailability WHERE id = :id');
            $actualize -> bindValue('id',$user->getId());
            $actualize -> bindValue('userName',$user->getUserName());
            $actualize -> bindValue('userLastName',$user->getUserLastName());
            $actualize -> bindValue('specialtyID',$user->getSpecialtyID());
            $actualize -> bindValue('professionalLicenseNumber',$user->getProfessionalLicenseNumber());
            $actualize -> bindValue('citizenshipID',$user->getCitizenshipID());
            $actualize -> bindValue('phoneNumber',$user->getPhoneNumber());
            $actualize -> bindValue('userEmail',$user->getUserEmail());
            $actualize -> bindValue('userAvailability',$user->getUserAvailability());
            $actualize -> execute();
        }
        //method to search user by citizenShipID and professionalLicenseNumber
        public function searchUser($citizenShipID, $professionalLicenseNumber){
            $dataBase=conectionDataBase::conection();
            $search = $dataBase -> prepare('SELECT * FROM users WHERE citizenshipID = :citizenshipID OR professionalLicenseNumber = :professionalLicenseNumber');
            $search -> bindValue('citizenshipID',$citizenShipID);
            $search -> bindValue('professionalLicenseNumber',$professionalLicenseNumber);
            $search -> execute();
            $user = $search -> fetch();
            $userList = new user();
            $userList -> setId($user['id']);
            $userList -> setUserName($user['userName']);
            $userList -> setUserLastName($user['userLastName']);
            $userList -> setSpecialtyID($user['specialtyID']);
            $userList -> setProfessionalLicenseNumber($user['professionalLicenseNumber']);
            $userList -> setCitizenshipID($user['citizenshipID']);
            $userList -> setPhoneNumber($user['phoneNumber']);
            $userList -> setUserEmail($user['userEmail']);
            $userList -> setUserAvailability($user['userAvailability']);
            return $userList;
        }
        //method to see the number of users in a specialization
        public function numberUsers($specialtyID){
            $conn = new mysqli("localhost", "root", "", "horariossalud");
            $sql = "SELECT * FROM users WHERE specialtyID = '".$specialtyID ."'";
            $result=mysqli_query($conn,$sql);
            $rowCount = mysqli_num_rows($result);
            return $rowCount;

            /* $dataBase=conectionDataBase::conection();
$sql = $conn = new mysqli($host, $username, $password, $database);
$sql = "SELECT * FROM users";
if ($result=mysqli_query($conn,$sql
            $result=mysqli_query($dataBase, $sql);
            $search = $dataBase -> prepare('SELECT * FROM users WHERE specialtyID = :specialtyID');
            $search -> bindValue('specialtyID',$specialtyID);
            $search -> execute(); */
            
        }
    }
?>

