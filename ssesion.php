<?php
    sleep(1);
    session_start();
    session_unset();
    session_destroy();
    $_SESSION = array();