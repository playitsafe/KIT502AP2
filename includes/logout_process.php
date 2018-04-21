<?php

if ($_GET["link"] == "logout") {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
