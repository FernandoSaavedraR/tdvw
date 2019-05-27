<?php
    sleep(2);
    session_start();
    session_unset();
    session_destroy();
    $_SESSION = array();