<?php
require('includes/session.php');
if(session_destroy()){
    header("Location: login.php");
}