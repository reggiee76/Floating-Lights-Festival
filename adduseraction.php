<?php

/*session_start();
if(!isset($_SESSION['userID']))
{
    include("loginform.php");
    exit();
}*/

include("dbconnect.php");

//Report all errors except warnings.
error_reporting(E_ALL ^ E_WARNING);

//validation
if(isset($_POST['username']))
{
    $error = array();
    $data = array();

    if($_POST['password'] != "")
    {        
        $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
        $data['password'] = $password;
        //var_dump($password);
    }
    else{
        $error[] = "You need to enter a password";
    }

    if($_POST['username'] != "")
    {
        $username = $_POST['username'];
        $data['username'] = $username;
    }
    else
    {
        $error[] = "You need to enter a username";
    }

    if($_POST['firstname'] != "")
    {
        $firstname = $_POST['firstname'];
        $data['firstname'] = $firstname;
    }
    else
    {
        $error[] = "You need to enter a first name";
    }

    if($_POST['lastname'] != "")
    {
        $lastname = $_POST['lastname'];
        $data['lastname'] = $lastname;
    }
    else
    {
        $error[] = "You need to enter a last name";
    }

	if($_POST['email'] != "")
    {
        if(preg_match("/^((([!#$%&'*+\-/?^_`{|}~\w])|([!#$%&'*+\-/?^_`{|}~\w][!#$%&'*+\-/?^_`{|}~\.\w]{0,}[!#$%&'*+\-/?^_`{|}~\w]))*@\w+([-.]\w+)*\.\w+([-.]\w+)*)$/ix", $_POST['email'])){

        
        $email = $_POST['email'];
        $data['email'] = $email;
        }else {
            $error[] = "You need to enter a valid email address";
        }        
    }
    else
    {
        $error[] = "You need to enter an email";
    }

    $data['username'] = $_POST['username'];

    //if no errors, process the form
    if(empty($error))
    {
        
		$query = $dbc->prepare("INSERT INTO floating_lights_festival.users (username, password, firstname, lastname, email) 
                                VALUES (:username, :password, :firstname, :lastname, :email)");
		
        $query -> execute($data);
		header('Location:admin.php');
	}
    else
    {
        include("header.php");
        
		echo "There were errors in your submission";
		
		$message = "<ul>";
        foreach($error as $value)
        {
            $message .= "<li> $value </li>";
        }
        echo($message .= "</ul>"); 
		echo "<p><a href='adduser.php'>Return to form</a></p>";
       //header('Location: adduser.php');
		include("footer.php");
    }
   
}
?>