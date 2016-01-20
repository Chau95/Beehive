<?php
    $db = new PDO ();
    include 'models/datamodels.php';
    $model = new DataModel($db);
    $allRows = $model->getAllRows();
    include 'view/showall.php';
    $db = null;