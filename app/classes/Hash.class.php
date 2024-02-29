<?php

class Hash
{
    //password_hash method will convert our plain text passwords into hash values as per algo specified ...
    public static function make(string $plainText)
    {
        return password_hash($plainText, PASSWORD_BCRYPT);
    }
    public static function verify(string $plainText, string $hash)
    {
        return password_verify($plainText, $hash);
    }
}
