<?php

use Illuminate\Support\Facades\Config;

function get_languages(){

    return \App\Models\Language::active() -> Selection() -> get();

}

function getDefLang(){

    return config::get('app.locale');
}

function uploadImage(){
    if(isset($_FILES['photo'])) {
        $err = array();
        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileTmp = $_FILES['photo']['tmp_name'];
        $fileType = $_FILES['photo']['type'];


        $Str = explode('.', $_FILES['photo']['name']);
        $fileExt = strtolower(end($Str));

        $extensions = array("jpg", "jpeg", "png", "gif", "bmp");

        if (in_array($fileExt, $extensions) === false) {
            $err = "extension not allowed. Please choose a jpg, jpeg...";
        }

        if ($fileSize > 3594975) {
            $err = $err . "Filel Can't Exceed 3.5 MB!";
        }

        if (empty($err) === true) {
            move_uploaded_file($fileTmp, 'images/' . $fileName);
            }
        }
    }




