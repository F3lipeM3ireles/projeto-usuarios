<?php

class Validator
{
    public static function validarEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validarSenha(string $senha): bool
    {
        return strlen($senha) >= 8 && preg_match('/[A-Z]/', $senha);
    }
}
