<?php

namespace App\Ciphers;

class AtbashCipher implements CiphersContract
{
    /**
     * Encrypts a string using the Atbash cipher.
     *
     * This cipher replaces each letter with the corresponding letter at the
     * opposite end of the alphabet.  For example, 'a' becomes 'z', 'b' becomes
     * 'y', and so on.
     *
     * @param string $input The string to encrypt
     * @return string The encrypted string
     */
    public function encrypt(string $input): string
    {
        return $this->atbashCipher($input);
    }

    /**
     * Decrypts a string that was previously encrypted with the Atbash cipher.
     *
     * This method is the inverse of `encrypt`, and can be used to decrypt
     * strings that were previously encrypted with `encrypt`.
     *
     * @param string $input The string to decrypt
     * @return string The decrypted string
     */
    public function decrypt(string $input): string
    {
        return $this->atbashCipher($input);
    }

    /**
     * Replaces each letter in the input string with the corresponding letter at
     * the opposite end of the alphabet.
     *
     * This method is used internally by `encrypt` and `decrypt` to perform the
     * actual encryption and decryption.
     *
     * @param string $text The string to encrypt or decrypt
     * @return string The encrypted or decrypted string
     */
    private function atbashCipher(string $text): string
    {
        $result = '';

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $asciiOffset = ctype_upper($char) ? ord('A') : ord('a');
                $newChar = chr($asciiOffset + (25 - (ord($char) - $asciiOffset)));
                $result .= $newChar;
            } else {
                $result .= $char;
            }
        }

        return $result;
    }
}
