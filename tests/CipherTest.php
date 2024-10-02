<?php

use PHPUnit\Framework\TestCase;
use App\Ciphers\CaesarCipher;
use App\Ciphers\AtbashCipher;
use App\Ciphers\BaconCipher;

class CipherTest extends TestCase
{
    // Testy dla szyfru Cezara
    public function testCaesarCipherEncryption()
    {
        $cipher = new CaesarCipher(3);
        $encrypted = $cipher->encrypt('Hello World');
        $this->assertEquals('Khoor Zruog', $encrypted);
    }

    public function testCaesarCipherDecryption()
    {
        $cipher = new CaesarCipher(3);
        $decrypted = $cipher->decrypt('Khoor Zruog');
        $this->assertEquals('Hello World', $decrypted);
    }

    // Testy dla szyfru Atbash
    public function testAtbashCipherEncryption()
    {
        $cipher = new AtbashCipher();
        $encrypted = $cipher->encrypt('Hello World');
        $this->assertEquals('Svool Dliow', $encrypted);
    }

    public function testAtbashCipherDecryption()
    {
        $cipher = new AtbashCipher();
        $decrypted = $cipher->decrypt('Svool Dliow');
        $this->assertEquals('Hello World', $decrypted);
    }

    // Testy dla szyfru Bacona
    public function testBaconCipherEncryption()
    {
        $cipher = new BaconCipher();
        $encrypted = $cipher->encrypt('Hello');
        $this->assertEquals('AABBB AABAA ABABB ABABB ABBBA', $encrypted);
    }

    public function testBaconCipherDecryption()
    {
        $cipher = new BaconCipher();
        $decrypted = $cipher->decrypt('AABBB AABAA ABABB ABABB ABBBA');
        $this->assertEquals('HELLO', $decrypted);
    }
}
