


$client = new \Teleconcept\Packages\Transaction\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$request = new \Teleconcept\Packages\Transaction\Ivr\Client\Request\Create\CreatePerMinutePayment($client);

$request
    ->setCountry('NLD')
    ->setIpAddress('192.168.0.1')
    ->setOutletId(148319)
    ->setAdult(false)
    ->setReportUrl('https://private-607035-responsetesting.apiary-mock.com/report')
    ->setTariff('90')
    ->setDuration(120)
    ->setAuthorizationBearer('69efad55169d7425595d98827');

$response = $request->send();

echo $response->reference(); //string uuidv4 
echo $response->payline(); //number to call
echo $response->pincode(); //pincode to enter

