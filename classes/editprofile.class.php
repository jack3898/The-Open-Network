<?php

class EditProfile extends dbconn{    
    function __construct(array $data, string $un){
        
        // Edit bio script
        if($data['type'] === 'bio'){
            $conn = $this->connect();

            $sql = "UPDATE `users` SET `bio` = ? WHERE `users`.`username` = '$un'";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                // If failed to prapare the initialised statement
                echo 'Error with SQL statement.';
            } else {
                mysqli_stmt_bind_param($stmt, 's', $data['newbio']);

                mysqli_stmt_execute($stmt);

                if(!mysqli_stmt_execute($stmt)){
                ?>
                <div>
                    <h2>Error!</h2>
                    <p>Database threw an error.</p>
                </div>
                <?php
                } else {
                header('Location: profile.php?user=' . $un);
                }
            }
        }
    }
}
