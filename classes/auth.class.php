<?php
class Auth extends dbconn{
    function __construct($un, $pw, $fn = null, $sn = null, $mail = null, $method){
        if($method === 'login'){
            // Query template
            $sql = "SELECT * FROM users WHERE username=? LIMIT 1;";
            // $sql_getpendingrequests = "SELECT users.username, users.forename, users.surname, pendingfriends.pendingfriend FROM pendingfriends JOIN users ON users.? = pendingfriends.username;";
            //SELECT users.username, users.forename, users.surname, pendingfriends.pendingfriend FROM pendingfriends JOIN users ON users.username = pendingfriends.username 

            // Get the connection details of the database
            $conn = $this->connect();

            // initialise the prepared statement (make it known to the DB)
            $stmt = mysqli_stmt_init($conn);

            // Prepare the initialised statement for execution
            if(!mysqli_stmt_prepare($stmt, $sql) && mysqli_stmt_prepare($stmt_pendingfriends)){
                // If failed to prapare the initialised statement
                echo 'Error with SQL statement.';
            } else {

                $password_verify = password_verify($pw, PASSWORD_DEFAULT);

                // Bind the question mark in the statement template to 'ss' (string, string)
                mysqli_stmt_bind_param($stmt, 's', $un);

                // Get the prepared statement and execute the query
                mysqli_stmt_execute($stmt);

                // Assign the result of $stmt to $data
                $data = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($data) > 0){
                    $result = mysqli_fetch_assoc($data);
                    if(password_verify($pw, $result['password'])){
                        $_SESSION['logged_in'] = $result;
                        header('Location: index.php');
                        die;
                    } else {
                        $error = 'Unable to log in. Try again.';
                        header('Location: login.php?error=' . $error);
                        die;
                    } 
                }
            }
        } else if ($method === 'create'){
            
            // Check if fields have data
            if(empty($fn) || empty($sn) || empty($un) || empty($pw) || empty($mail)){
                $error = 'Some or all fields are empty. Please try again.';
                header('Location: login.php?error=' . $error);
                die;
            }

            // Check if the fields are of required length
            if(strlen($un) < 8 || strlen($pw) < 8){
                $error = 'Length of fields are invalid. Username or password is too short.';
                header('Location: login.php?error=' . $error);
                die;
            }

            // Check if there are no spaces
            if(preg_match("/\\s/", $un) || preg_match("/\\s/", $pw) || preg_match("/\\s/", $fn) || preg_match("/\\s/", $sn)){
                $error = 'Some items are invalid. Check for spaces!';
                header('Location: login.php?error=' . $error);
                die;
            }

            // Check is username, forename or surname have no special characters
            if(!preg_match("/^[a-zA-Z0-9]*$/", $un) || !preg_match("/^[a-zA-Z0-9]*$/", $fn) || !preg_match("/^[a-zA-Z0-9]*$/", $sn)){
                $error = 'Illegal characters in username, forename or surname.';
                header('Location: login.php?error=' . $error);
                die;
            }

            // Check if the email format is correct
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/")){
                $error = 'Email provided is in an incorrect format!';
                header('Location: login.php?error=' . $error);
                die;
            }
            
            // If all above checks pass, the following will execute. Else, the script stops and the user is redirected.

            // Query template
            $sql = "INSERT INTO `users`(`forename`, `surname`, `username`, `password`, `email`) VALUES (?, ?, ?, ?, ?);";

            // Get the connection details of the database
            $conn = $this->connect();

            // initialise the prepared statement (make it known to the DB)
            $stmt = mysqli_stmt_init($conn);

            $password_hash = password_hash($pw, PASSWORD_DEFAULT);

            // Prepare the initialised statement for execution
            if(!mysqli_stmt_prepare($stmt, $sql) && mysqli_stmt_prepare($stmt_pendingfriends)){
                // If failed to prapare the initialised statement
                echo 'Error with SQL statement.';
            } else {
                // Bind the question mark in the statement template to 'ss' (string, string)
                mysqli_stmt_bind_param($stmt, 'sssss', $fn, $sn, $un, $password_hash, $mail);

                // Get the prepared statement and execute the query
                if(!mysqli_stmt_execute($stmt)){
                    $error = 'Database threw an error! Details already exist or something else.';
                    header('Location: login.php?error=' . $error);
                    die;
                };

                header('Location: login.php?success=' . $un);
            }
        }
    }
}