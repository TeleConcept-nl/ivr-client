
#Create And Check Per Minute Payment

```
//Start creation
$client = new \Teleconcept\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$request = new \Teleconcept\Ivr\Client\Request\Create\CreatePerMinutePayment($client);

$request
    ->setCountry('NLD')
    ->setIpAddress('192.168.0.1')
    ->setAdult(false)
    ->setReportUrl('https://private-607035-responsetesting.apiary-mock.com/report')
    ->setTariff('90')
    ->setDuration(120)
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135);

$response = $request->send();

echo $response->reference(); //string uuidv4 
echo $response->payline(); //number to call
echo $response->pincode(); //pincode to enter
```
```
//Start check
$client = new \Teleconcept\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$checkRequest = new \Teleconcept\Ivr\Client\Request\Check\CheckPerMinutePayment($client);

$checkRequest
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->setTransactionReference('ae3f8e04-c9d1-431f-a879-f8d1b067e1da');

$response = $checkRequest->send();

echo $response->status(); //string representation of the status of the call
```

#Create and Check Per Call Payment

```
$client = new \Teleconcept\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$request = new \Teleconcept\Ivr\Client\Request\Create\CreatePerCallPayment($client);

$request
    ->setCountry('NLD')
    ->setIpAddress('192.168.0.1')
    ->setAdult(false)
    ->setReportUrl('https://private-607035-responsetesting.apiary-mock.com/report')
    ->setTariff('90')
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135);

$response = $request->send();

echo $response->reference(); //string uuidv4 
echo $response->payline(); //number to call
echo $response->pincode(); //pincode to enter
```
```
//Start check
$client = new \Teleconcept\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$checkRequest = new \Teleconcept\Ivr\Client\Request\Check\CheckPerCallPayment($client);

$checkRequest
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->setTransactionReference('ae3f8e04-c9d1-431f-a879-f8d1b067e1da');

$response = $checkRequest->send();

echo $response->status(); //string representation of the status of the call
```
#Create and Check Per Usage Payment

```
$client = new \Teleconcept\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$request = new \Teleconcept\Ivr\Client\Request\Create\CreatePerUsagePayment($client);

$request
    ->setCountry('NLD')
    ->setIpAddress('192.168.0.1')
    ->setAdult(false)
    ->setReportUrl('https://private-607035-responsetesting.apiary-mock.com/report')
    ->setTariff('90')
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135);

$response = $request->send();

echo $response->reference(); //string uuidv4 
echo $response->payline(); //number to call
echo $response->pincode(); //pincode to enter
```
```
//Start check
$client = new \Teleconcept\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$checkRequest = new \Teleconcept\Ivr\Client\Request\Check\CheckPerUsagePayment($client);

$checkRequest
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->setTransactionReference('ae3f8e04-c9d1-431f-a879-f8d1b067e1da');

$response = $checkRequest->send();

echo $response->status(); //string representation of the status of the call
```

#Consume pincode output Payment
```
$client = new \Teleconcept\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$consumeRequest = new \Teleconcept\Ivr\Client\Request\Pincode\ConsumeRequest($client);

$consumeRequest
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->setPincode('123456');

$response = $consumeRequest->send();

echo $response->reference(); //uuid string of the payment you found
```
