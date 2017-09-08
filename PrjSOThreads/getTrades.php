<?php

echo treatResponse(CallAPI("GET", "https://broker.negociecoins.com.br/api/v3/BTCBRL/trades"));

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}


function treatResponse($response)
{
    $data = json_decode($response, true);
    $lastBuy = null;
    $lastSell = null;
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]["type"] == "Buy") {
            $lastBuy = $data[$i];
            break;
        }
    }
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]["type"] == "Sell") {
            $lastSell = $data[$i];
            break;
        }
    }
    date_default_timezone_set("Brazil/East");
    $lastBuy["date"] = date('d-m-Y H:i:s', $lastBuy["date"]);
    $lastBuy["type"] = "Compra";
    $lastSell["date"] = date('d-m-Y H:i:s', $lastSell["date"]);
    $lastSell["type"] = "Venda";

    $data2[] = $lastBuy;
    $data2[] = $lastSell;


    $data3["data"] = $data2;
    return json_encode($data3);
}