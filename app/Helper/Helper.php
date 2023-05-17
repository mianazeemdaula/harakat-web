<?php
namespace App\Helper;

use Illuminate\Support\Str;
use GuzzleHttp\Client;


class Helper {
    static public function getAddress($latitude, $longitude)
    {
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'key' => env('GOOGLE_MAPS_API_KEY'),
                'latlng' => $latitude . ',' . $longitude,
            ]
        ]);

        $body = json_decode($response->getBody());
        $address = $body->results[0]->formatted_address ?? '';
        return $address;
    }
}