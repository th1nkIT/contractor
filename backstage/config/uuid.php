<?php
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\InvalidUuidStringException;

function isValidUuid($uuid) {
    try {
        // Mencoba membuat objek UUID dari string
        $uuidObject = Uuid::fromString($uuid);
        
        // Memastikan bahwa string yang diinput adalah UUID
        return $uuidObject->toString() === $uuid;
    } catch (InvalidUuidStringException $e) {
        return false; // String bukan UUID yang valid
    }
}

function generateUuid() {
    // Membuat UUID
    $uuid = Uuid::uuid4()->toString();
    
    return $uuid;
}
?>