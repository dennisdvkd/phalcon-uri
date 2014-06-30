<?php
namespace app\helpers;

class UniqueId {

    public static function Generate($length = 10) {
        return substr(str_shuffle(md5(uniqid(rand(), true))), 0, $length);
    }

}