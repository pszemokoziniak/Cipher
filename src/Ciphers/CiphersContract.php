<?php

namespace App\Ciphers;
interface CiphersContract
{
    /**
     * Encrypts a given input string using the cipher.
     *
     * @param string $input The string to be encrypted.
     *
     * @return string The encrypted string.
     */
    public function encrypt(string $input): string;

    public function decrypt(string $input): string;
}