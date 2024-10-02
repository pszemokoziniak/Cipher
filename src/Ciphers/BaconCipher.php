<?php

namespace App\Ciphers;

class BaconCipher implements CiphersContract
{
    /**
     * Encrypts a given input string using the Bacon cipher.
     *
     * This method takes a string and encrypts it using the Bacon cipher.
     *
     * @param string $input The string to be encrypted.
     *
     * @return string The encrypted string.
     */
    public function encrypt(string $input): string
    {
        return $this->baconCipher($input);
    }

    /**
     * Decrypts a given input string using the Bacon cipher.
     *
     * This method takes a string and decrypts it using the Bacon cipher.
     *
     * @param string $input The string to be decrypted.
     *
     * @return string The decrypted string.
     */
    public function decrypt(string $input): string
    {
        return $this->baconDecipher($input);
    }

    /**
     * Encrypts a given string using the Bacon cipher.
     *
     * This method takes a string, removes any non-letter characters, and converts it to uppercase.
     * It then uses the Bacon cipher to encrypt the string.
     *
     * @param string $text The string to be encrypted.
     *
     * @return string The encrypted string.
     */
    private function baconCipher(string $text): string
    {
        $baconAlphabet = [
            'A' => 'AAAAA', 'B' => 'AAAAB', 'C' => 'AAABA', 'D' => 'AAABB', 'E' => 'AABAA',
            'F' => 'AABAB', 'G' => 'AABBA', 'H' => 'AABBB', 'I' => 'ABAAA', 'J' => 'ABAAB',
            'K' => 'ABABA', 'L' => 'ABABB', 'M' => 'ABBAA', 'N' => 'ABBAB', 'O' => 'ABBBA',
            'P' => 'ABBBB', 'Q' => 'BAAAA', 'R' => 'BAAAB', 'S' => 'BAABA', 'T' => 'BAABB',
            'U' => 'BABAA', 'V' => 'BABAB', 'W' => 'BABBA', 'X' => 'BABBB', 'Y' => 'BBAAA', 'Z' => 'BBAAB'
        ];

        $text = strtoupper(preg_replace('/[^A-Z]/i', '', $text)); // Usuwamy znaki inne niż litery
        $result = '';

        foreach (str_split($text) as $char) {
            $result .= $baconAlphabet[$char] ?? '';
        }

        return $result;
    }

    /**
     * Decrypts a given string using the Bacon cipher.
     *
     * This method takes a string, removes any non-letter characters, and converts it to uppercase.
     * It then uses the Bacon cipher to decrypt the string.
     *
     * @param string $text The string to be decrypted.
     *
     * @return string The decrypted string.
     */
    private function baconDecipher(string $text): string
    {
        $baconAlphabet = array_flip([
            'AAAAA' => 'A', 'AAAAB' => 'B', 'AAABA' => 'C', 'AAABB' => 'D', 'AABAA' => 'E',
            'AABAB' => 'F', 'AABBA' => 'G', 'AABBB' => 'H', 'ABAAA' => 'I', 'ABAAB' => 'J',
            'ABABA' => 'K', 'ABABB' => 'L', 'ABBAA' => 'M', 'ABBAB' => 'N', 'ABBBA' => 'O',
            'ABBBB' => 'P', 'BAAAA' => 'Q', 'BAAAB' => 'R', 'BAABA' => 'S', 'BAABB' => 'T',
            'BABAA' => 'U', 'BABAB' => 'V', 'BABBA' => 'W', 'BABBB' => 'X', 'BBAAA' => 'Y', 'BBAAB' => 'Z'
        ]);

        $text = preg_replace('/[^A-B]/i', '', strtoupper($text)); // Usuwamy inne znaki
        $result = '';

        foreach (str_split($text, 5) as $chunk) {
            $result .= $baconAlphabet[$chunk] ?? '';
        }

        return $result;
    }
}
