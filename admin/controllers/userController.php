<?php
include '../models/user.php';

class UserController
{
    public function Render()
    {
        $data = getAllUser();
        include('views/user.php');
    }
}
