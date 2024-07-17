<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MTNService
{
    protected $client;
    protected $apiKey;
    protected $userId;
    protected $apiSecret;
    protected $primaryKey;
    protected $targetEnv;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = config('services.mtn.api_key');
        $this->userId = config('services.mtn.user_id');
        $this->apiSecret = config('services.mtn.api_secret');
        $this->primaryKey = config('services.mtn.primary_key');
        $this->targetEnv = config('services.mtn.target_env');
    }

    public function getToken()
    {
        $response = $this->client->request('POST', 'https://sandbox.momodeveloper.mtn.com/collection/token/', [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->userId . ':' . $this->apiSecret),
                'Ocp-Apim-Subscription-Key' => $this->primaryKey,
            ],
        ]);

        $body = json_decode($response->getBody()->getContents(), true);
        return $body['access_token'];
    }

    public function requestToPay($amount, $currency, $externalId, $payer, $payerMessage, $payeeNote)
    {
        $token = $this->getToken();
        $response = $this->client->request('POST', 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'X-Reference-Id' => $externalId,
                'X-Target-Environment' => $this->targetEnv,
                'Ocp-Apim-Subscription-Key' => $this->primaryKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'amount' => $amount,
                'currency' => $currency,
                'externalId' => $externalId,
                'payer' => [
                    'partyIdType' => 'MSISDN',
                    'partyId' => $payer,
                ],
                'payerMessage' => $payerMessage,
                'payeeNote' => $payeeNote,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getTransactionStatus($referenceId)
    {
        $token = $this->getToken();
        $response = $this->client->request('GET', 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/' . $referenceId, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Ocp-Apim-Subscription-Key' => $this->primaryKey,
                'X-Target-Environment' => $this->targetEnv,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
