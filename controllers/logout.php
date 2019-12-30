<?php 
    session_start();

    // Terminate session
    session_unset();
    session_destroy();

    echo json_decode(
        array('message' => 'Logged Out!')
    );
?>