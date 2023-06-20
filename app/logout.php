<?php
session_start();
session_destroy();
header("location:http://localhost/my_shopping_list/index.php?msg=logout");
?>