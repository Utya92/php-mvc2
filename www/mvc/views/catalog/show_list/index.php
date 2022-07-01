<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/mvc/views/header.php' ?>

<?php

foreach ($this->data['LIST'] as $sections) {
    echo $sections.'</br>';
}
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mvc/views/footer.php' ?>
