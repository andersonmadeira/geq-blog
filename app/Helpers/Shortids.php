<?php

class Shortids {
    public static $salt = 'cfe24c821350458aee17510fef9153db88a8bead';

    public static function encode($id)
    {
        $hashids = new \Hashids\Hashids(Shortids::$salt, 10);
        return $hashids->encode($id);
    }

    public static function decode($id)
    {
        $hashids = new \Hashids\Hashids(Shortids::$salt, 10);
        return $hashids->decode($id);
    }
}