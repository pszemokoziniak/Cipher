<?php
namespace App\Ciphers;

class CaesarCipher implements CiphersContract
{
    private $shift;

    /**
     * Construct a new Caesar cipher with the given shift value.
     *
     * @param int $shift The shift value to use for the cipher.
     */
    public function __construct(int $shift)
    {
        $this->shift = $shift;
    }

    /**
     * Encrypt a string using the Caesar cipher algorithm.
     *
     * @param string $input The string to encrypt.
     *
     * @return string The encrypted string.
     */
    public function encrypt(string $input): string
    {
        return $this->caesarCipher($input, $this->shift);
    }

    /**
     * Decrypt a string using the Caesar cipher algorithm.
     *
     * @param string $input The string to decrypt.
     *
     * @return string The decrypted string.
     */
    public function decrypt(string $input): string
    {
        return $this->caesarCipher($input, 26 - $this->shift);
    }

    /**
     * Apply the Caesar cipher algorithm to a given string.
     *
     * The Caesar cipher is a type of substitution cipher in which each letter in the plaintext is 'shifted' a certain number of places down the alphabet. For example, with a shift of 1, A would be replaced by B, B would become C, and so on.
     *
     * @param string $text The string to encrypt or decrypt.
     *
     * @param int $shift The number of places to shift the letters.
     *
     * @return string The encrypted or decrypted string.
     */
    private function caesarCipher(string $text, int $shift): string
    {
        $result = '';
        $shift = $shift % 26;

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $asciiOffset = ctype_upper($char) ? ord('A') : ord('a');
                $newChar = chr((ord($char) - $asciiOffset + $shift) % 26 + $asciiOffset);
                $result .= $newChar;
            } else {
                $result .= $char;
            }
        }

        return $result;
    }
}

