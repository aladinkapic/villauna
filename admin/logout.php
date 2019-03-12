<?php
require_once 'classes/db.php';
// destroy all sessions //
session_destroy();

// redirect to login page //
Redirect::to('index.php');
