<?php
include('_dbconnection.php');
session_name('TalkSpace_user_session');
session_start();
session_unset();
session_destroy();
header("location: /TalkSpace/");
?>