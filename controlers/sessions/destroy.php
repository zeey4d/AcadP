<?php


logOut();

header("Location: " . $_SERVER["HTTP_REFERER"]);
exit();