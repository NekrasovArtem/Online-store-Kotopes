<?php
session_start();
unset($_SESSION['login']);
session_destroy();
Header('Location: /');
die();