<?php   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION)){
    session_start();
}
    include('config/dbcon.php');

    if(isset($_POST['register_btn']))
    {
        $nom = mysqli_real_escape_string($con,$_POST['nom']);
        $prenom = mysqli_real_escape_string($con,$_POST['prenom']);
        
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
        
        //Check if  email already Registred

        $check_email_query = "SELECT email From enseignants WHERE email='$email'";
        $check_email_query_run = mysqli_query($con, $check_email_query);
        if(mysqli_num_rows($check_email_query_run))
        {
                $_SESSION['message'] = "Email Already registred";
                header('Location: register.php');

        }
        else 
        {
        
        if($password == $cpassword)
            {
            //insert data
            $insert_query = "INSERT INTO enseignants (nom,prenom, email,password,role) VALUES('$nom','$prenom' ,'$email','$password',0)";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run){
                $_SESSION['message'] = 'Register Successfuly';
                header('Location: login.php');
            }
            else{
                $_SESSION['message'] = 'Something Went wrong';
                header('Location: register.php');
            }
            }
        else 
        {
            $_SESSION['message'] = "Password do not match";
            header('Location: register.php');
        }
        }
    }
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT * FROM enseignants WHERE email ='$email' AND password ='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    { 
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        
           
       // Set the cookies with user information

       $userid = $userdata['id'];
       $role_as = $userdata['role'];
        setcookie("user_id", $userid, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("auth", "true", time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("role", $role_as, time() + (86400 * 30), "/");
        


       

        if($role_as == 1) {
            
        header('Location: admin/enseignant.php');
        }
        else {

        $_SESSION['message'] = "Logged In Successfully";
        header('Location: index.php');
    }
}
    else
    {
        $_SESSION['message'] = 'invalid email or password';
        header('Location: login.php');
    }
}


?>