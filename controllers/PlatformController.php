<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/PlatForm.php');

function listPlatform()
{
    $model = new PlatForm();
    $platformList = $model->getAll();

    return $platformList;
}
