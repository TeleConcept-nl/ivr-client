
#Create And Check Per Minute Payment

```
//Start creation
$client = new \Teleconcept\Packages\Transaction\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$request = new \Teleconcept\Packages\Transaction\Ivr\Client\Request\Create\CreatePerMinutePayment($client);

$request
    ->setCountry('NLD')
    ->setIpAddress('192.168.0.1')
    ->setOutletId(154135)
    ->setAdult(false)
    ->setReportUrl('https://private-607035-responsetesting.apiary-mock.com/report')
    ->setTariff('90')
    ->setDuration(120)
    ->setAuthorizationBearer('40924ec10f3aaed662fe62aac');

$response = $request->send();

echo $response->reference(); //string uuidv4 
echo $response->payline(); //number to call
echo $response->pincode(); //pincode to enter
```
```
//Start check
$client = new \Teleconcept\Packages\Transaction\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$checkRequest = new \Teleconcept\Packages\Transaction\Ivr\Client\Request\Check\CheckPerMinutePayment($client);

$checkRequest
    ->setAuthorizationBearer('40924ec10f3aaed662fe62aac')
    ->setOutletId(154135)
    ->setTransactionReference('ae3f8e04-c9d1-431f-a879-f8d1b067e1da');

$response = $checkRequest->send();

echo $response->status(); //string representation of the status of the call
```

#Create and Check Per Call Payment

```
$client = new \Teleconcept\Packages\Transaction\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$request = new \Teleconcept\Packages\Transaction\Ivr\Client\Request\Create\CreatePerCallPayment($client);

$request
    ->setCountry('NLD')
    ->setIpAddress('192.168.0.1')
    ->setOutletId(154135)
    ->setAdult(false)
    ->setReportUrl('https://private-607035-responsetesting.apiary-mock.com/report')
    ->setTariff('90')
    ->setAuthorizationBearer('40924ec10f3aaed662fe62aac');

$response = $request->send();

echo $response->reference(); //string uuidv4 
echo $response->payline(); //number to call
echo $response->pincode(); //pincode to enter
```
```
//Start check
$client = new \Teleconcept\Packages\Transaction\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$checkRequest = new \Teleconcept\Packages\Transaction\Ivr\Client\Request\Check\CheckPerCallPayment($client);

$checkRequest
    ->setAuthorizationBearer('40924ec10f3aaed662fe62aac')
    ->setOutletId(154135)
    ->setTransactionReference('ae3f8e04-c9d1-431f-a879-f8d1b067e1da');

$response = $checkRequest->send();

echo $response->status(); //string representation of the status of the call
```
#Create and Check Per Usage Payment

```
$client = new \Teleconcept\Packages\Transaction\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$request = new \Teleconcept\Packages\Transaction\Ivr\Client\Request\Create\CreatePerUsagePayment($client);

$request
    ->setCountry('NLD')
    ->setIpAddress('192.168.0.1')
    ->setOutletId(154135)
    ->setAdult(false)
    ->setReportUrl('https://private-607035-responsetesting.apiary-mock.com/report')
    ->setTariff('90')
    ->setAuthorizationBearer('40924ec10f3aaed662fe62aac');

$response = $request->send();

echo $response->reference(); //string uuidv4 
echo $response->payline(); //number to call
echo $response->pincode(); //pincode to enter
```
```
//Start check
$client = new \Teleconcept\Packages\Transaction\Ivr\Client\Client('https://ivr-api.teleconcept.nl');
$checkRequest = new \Teleconcept\Packages\Transaction\Ivr\Client\Request\Check\CheckPerUsagePayment($client);

$checkRequest
    ->setAuthorizationBearer('40924ec10f3aaed662fe62aac')
    ->setOutletId(154135)
    ->setTransactionReference('ae3f8e04-c9d1-431f-a879-f8d1b067e1da');

$response = $checkRequest->send();

echo $response->status(); //string representation of the status of the call
```
