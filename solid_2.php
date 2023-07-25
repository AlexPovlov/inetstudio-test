<?php

interface HttpServiceInterface {
    public function request(string $url, string $method, array $options): void;
}

class XMLHttpService implements HttpServiceInterface {
    public function request(string $url, string $method, array $options): void {
        // Implement the XML HTTP request logic here
        // ...
        echo "Sending $method request to $url" . PHP_EOL;
    }
}

class Http {
    private $service;

    public function __construct(HttpServiceInterface $httpService) {
        $this->service = $httpService;
    }

    public function get(string $url, array $options): void {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url, array $options): void {
        $this->service->request($url, 'POST', $options);
    }
}

// Пример использования
$xmlHttpService = new XMLHttpService();
$http = new Http($xmlHttpService);

$http->get('https://example.com/api', ['param' => 'value']);
$http->post('https://example.com/api', ['data' => 'some_data']);
