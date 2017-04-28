<?php
session_start();
/* Sends user back to front page and ENDS session */
session_destroy();

header("location:index.php"); 