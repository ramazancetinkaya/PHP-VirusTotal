<?php

/**
 * AutoLoader Class
 *
 * @author Ramazan Çetinkaya
 * @date 2023-02-02
 */
class VirusTotal
{
    protected $apiKey;
    protected $baseUrl = 'https://www.virustotal.com/api/v3/';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function fileScan(string $filePath): array
    {
        $url = $this->baseUrl . 'files';
        $headers = [
            'x-apikey: ' . $this->apiKey
        ];

        $postData = [
            'file' => new CURLFile($filePath)
        ];

        $response = $this->sendRequest($url, $headers, $postData);

        return json_decode($response, true);
    }

    public function fileReport(string $fileHash): array
    {
        $url = $this->baseUrl . 'files/' . $fileHash;
        $headers = [
            'x-apikey: ' . $this->apiKey
        ];

        $response = $this->sendRequest($url, $headers);

        return json_decode($response, true);
    }

    protected function sendRequest(string $url, array $headers, array $postData = []): string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
