<?php
//    $_POST['sex'] = 'man';
//    $_POST['height'] = 165;
    if (isset($_POST['sex']) && $_POST['sex']!='' && isset($_POST['height']) && $_POST['height']!='' ) {
        $sex = $_POST['sex'];
        $height = $_POST['height'];
        if ($sex =='man') {
            echo "Ідеальна вага для мужчин з ростом $height дорівнює ".($height - 100)*1.15;
        }
        else {
            echo "Ідеальна вага для жінок з ростом $height дорівнює ".($height - 110)*1.15;
        }
    }
    else {
        echo 'Помилка! Виберіть стать і вагу';
    }

?>