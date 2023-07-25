<?php

interface KeyStorageInterface {
    public function getSecretKey(): string;
}

class FileKeyStorage implements KeyStorageInterface {
    public function getSecretKey(): string {
        // Логика для получения ключа из файла
        return "key_from_file";
    }
}

class DBKeyStorage implements KeyStorageInterface {
    public function getSecretKey(): string {
        // Логика для получения ключа из базы данных
        return "key_from_db";
    }
}

class RedisKeyStorage implements KeyStorageInterface {
    public function getSecretKey(): string {
        // Логика для получения ключа из серверной памяти (например, Redis)
        return "key_from_redis";
    }
}

class CloudKeyStorage implements KeyStorageInterface {
    public function getSecretKey(): string {
        // Логика для получения ключа из облачного хранилища
        return "key_from_cloud";
    }
}

class DataManager {
    private $keyStorage;

    public function __construct(KeyStorageInterface $keyStorage) {
        $this->keyStorage = $keyStorage;
    }

    public function getUserData(): array {
        $token = $this->keyStorage->getSecretKey();
        // Логика для получения данных из внешнего API с использованием $token
        // ...

        // Заглушка для примера, вернем просто какой-то массив данных:
        return ['data' => 'some_data'];
    }
}

$fileKeyStorage = new FileKeyStorage();
$dataManager = new DataManager($fileKeyStorage);
$userData = $dataManager->getUserData();
// Здесь данные будут получены с использованием ключа из файла

// Или, для другого способа хранения ключа:
$redisKeyStorage = new RedisKeyStorage();
$dataManager = new DataManager($redisKeyStorage);
$userData = $dataManager->getUserData();
// Здесь данные будут получены с использованием ключа из Redis (или другой серверной памяти)

