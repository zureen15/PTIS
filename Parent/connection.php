<?php
$con  = mysqli_connect('localhost','root','','user_db');
if(mysqli_connect_errno())
{
    echo 'Database Connection Error';
}
