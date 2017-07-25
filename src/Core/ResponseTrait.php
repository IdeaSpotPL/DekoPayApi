<?php

namespace IdeaSpot\DekoPayApi\Core;

trait ResponseTrait
{
    public function xmlResponseToArray($response)
    {
        if (substr($response, 0, 5) == '<?xml') {
            $xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
            $json = json_encode($xml);
            $data = json_decode($json, true);

            if (isset($data['ERROR'])) {
                throw new \Exception($data['ERROR']);
            }
        } else {
            $data = array('result' => $response);
        }

        return $data;
    }
}