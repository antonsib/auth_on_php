<?php

require_once __DIR__.'/../helpers.php';

unset($_SESSION['user']['id']);
unset($_SESSION['user']['name']);
session_destroy();

redirect('/index.php');