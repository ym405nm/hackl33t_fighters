<?php
if(array_key_exists("myfile", $_FILES)){
    $tmp_file_name = $_FILES['myfile']['tmp_name'];
    $target_up_dir = './upload/';
    copy($tmp_file_name, $target_up_dir . $_FILES['myfile']['name']);
    echo "<p>アップロード完了しました</p><p><a href='/wp-admin'>戻る</a></p>";
}

