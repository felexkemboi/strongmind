# Shared
APIs for managing countries

## All Countries




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/country/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/country/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/country/all',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "result": {
        "data": [
            {
                "country_id": 1,
                "name": "Afghanistan",
                "dialing_code": "93",
                "country_code": "AF",
                "long_code": "AFG",
                "active": 1
            },
            {
                "country_id": 2,
                "name": "Aland Islands",
                "dialing_code": "+358-18",
                "country_code": "AX",
                "long_code": "ALA",
                "active": 1
            },
            {
                "country_id": 3,
                "name": "Albania",
                "dialing_code": "355",
                "country_code": "AL",
                "long_code": "ALB",
                "active": 1
            },
            {
                "country_id": 4,
                "name": "Algeria",
                "dialing_code": "213",
                "country_code": "DZ",
                "long_code": "DZA",
                "active": 1
            },
            {
                "country_id": 5,
                "name": "American Samoa",
                "dialing_code": "+1-684",
                "country_code": "AS",
                "long_code": "ASM",
                "active": 1
            },
            {
                "country_id": 6,
                "name": "Andorra",
                "dialing_code": "376",
                "country_code": "AD",
                "long_code": "AND",
                "active": 1
            },
            {
                "country_id": 7,
                "name": "Angola",
                "dialing_code": "244",
                "country_code": "AO",
                "long_code": "AGO",
                "active": 1
            },
            {
                "country_id": 8,
                "name": "Anguilla",
                "dialing_code": "+1-264",
                "country_code": "AI",
                "long_code": "AIA",
                "active": 1
            },
            {
                "country_id": 9,
                "name": "Antarctica",
                "dialing_code": "",
                "country_code": "AQ",
                "long_code": "ATA",
                "active": 1
            },
            {
                "country_id": 10,
                "name": "Antigua And Barbuda",
                "dialing_code": "+1-268",
                "country_code": "AG",
                "long_code": "ATG",
                "active": 1
            }
        ],
        "links": {
            "first": "http:\/\/localhost\/api\/country\/all?page=1",
            "last": "http:\/\/localhost\/api\/country\/all?page=25",
            "prev": null,
            "next": "http:\/\/localhost\/api\/country\/all?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 25,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=2",
                    "label": "2",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=3",
                    "label": "3",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=4",
                    "label": "4",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=5",
                    "label": "5",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=6",
                    "label": "6",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=7",
                    "label": "7",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=8",
                    "label": "8",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=9",
                    "label": "9",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=10",
                    "label": "10",
                    "active": false
                },
                {
                    "url": null,
                    "label": "...",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=24",
                    "label": "24",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=25",
                    "label": "25",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=2",
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/country\/all",
            "per_page": 10,
            "to": 10,
            "total": 247
        }
    }
}
```
<div id="execution-results-GETapi-country-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-country-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-country-all"></code></pre>
</div>
<div id="execution-error-GETapi-country-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-country-all"></code></pre>
</div>
<form id="form-GETapi-country-all" data-method="GET" data-path="api/country/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-country-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-country-all" onclick="tryItOut('GETapi-country-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-country-all" onclick="cancelTryOut('GETapi-country-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-country-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/country/all</code></b>
</p>
</form>


## All Active Countries




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/country/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/country/active"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/country/active',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "result": [
        {
            "country_id": 1,
            "name": "Afghanistan",
            "dialing_code": "93",
            "country_code": "AF",
            "long_code": "AFG",
            "active": 1
        },
        {
            "country_id": 2,
            "name": "Aland Islands",
            "dialing_code": "+358-18",
            "country_code": "AX",
            "long_code": "ALA",
            "active": 1
        },
        {
            "country_id": 3,
            "name": "Albania",
            "dialing_code": "355",
            "country_code": "AL",
            "long_code": "ALB",
            "active": 1
        },
        {
            "country_id": 4,
            "name": "Algeria",
            "dialing_code": "213",
            "country_code": "DZ",
            "long_code": "DZA",
            "active": 1
        },
        {
            "country_id": 5,
            "name": "American Samoa",
            "dialing_code": "+1-684",
            "country_code": "AS",
            "long_code": "ASM",
            "active": 1
        },
        {
            "country_id": 6,
            "name": "Andorra",
            "dialing_code": "376",
            "country_code": "AD",
            "long_code": "AND",
            "active": 1
        },
        {
            "country_id": 7,
            "name": "Angola",
            "dialing_code": "244",
            "country_code": "AO",
            "long_code": "AGO",
            "active": 1
        },
        {
            "country_id": 8,
            "name": "Anguilla",
            "dialing_code": "+1-264",
            "country_code": "AI",
            "long_code": "AIA",
            "active": 1
        },
        {
            "country_id": 9,
            "name": "Antarctica",
            "dialing_code": "",
            "country_code": "AQ",
            "long_code": "ATA",
            "active": 1
        },
        {
            "country_id": 10,
            "name": "Antigua And Barbuda",
            "dialing_code": "+1-268",
            "country_code": "AG",
            "long_code": "ATG",
            "active": 1
        },
        {
            "country_id": 11,
            "name": "Argentina",
            "dialing_code": "54",
            "country_code": "AR",
            "long_code": "ARG",
            "active": 1
        },
        {
            "country_id": 12,
            "name": "Armenia",
            "dialing_code": "374",
            "country_code": "AM",
            "long_code": "ARM",
            "active": 1
        },
        {
            "country_id": 13,
            "name": "Aruba",
            "dialing_code": "297",
            "country_code": "AW",
            "long_code": "ABW",
            "active": 1
        },
        {
            "country_id": 14,
            "name": "Australia",
            "dialing_code": "61",
            "country_code": "AU",
            "long_code": "AUS",
            "active": 1
        },
        {
            "country_id": 15,
            "name": "Austria",
            "dialing_code": "43",
            "country_code": "AT",
            "long_code": "AUT",
            "active": 1
        },
        {
            "country_id": 16,
            "name": "Azerbaijan",
            "dialing_code": "994",
            "country_code": "AZ",
            "long_code": "AZE",
            "active": 1
        },
        {
            "country_id": 17,
            "name": "Bahamas The",
            "dialing_code": "+1-242",
            "country_code": "BS",
            "long_code": "BHS",
            "active": 1
        },
        {
            "country_id": 18,
            "name": "Bahrain",
            "dialing_code": "973",
            "country_code": "BH",
            "long_code": "BHR",
            "active": 1
        },
        {
            "country_id": 19,
            "name": "Bangladesh",
            "dialing_code": "880",
            "country_code": "BD",
            "long_code": "BGD",
            "active": 1
        },
        {
            "country_id": 20,
            "name": "Barbados",
            "dialing_code": "+1-246",
            "country_code": "BB",
            "long_code": "BRB",
            "active": 1
        },
        {
            "country_id": 21,
            "name": "Belarus",
            "dialing_code": "375",
            "country_code": "BY",
            "long_code": "BLR",
            "active": 1
        },
        {
            "country_id": 22,
            "name": "Belgium",
            "dialing_code": "32",
            "country_code": "BE",
            "long_code": "BEL",
            "active": 1
        },
        {
            "country_id": 23,
            "name": "Belize",
            "dialing_code": "501",
            "country_code": "BZ",
            "long_code": "BLZ",
            "active": 1
        },
        {
            "country_id": 24,
            "name": "Benin",
            "dialing_code": "229",
            "country_code": "BJ",
            "long_code": "BEN",
            "active": 1
        },
        {
            "country_id": 25,
            "name": "Bermuda",
            "dialing_code": "+1-441",
            "country_code": "BM",
            "long_code": "BMU",
            "active": 1
        },
        {
            "country_id": 26,
            "name": "Bhutan",
            "dialing_code": "975",
            "country_code": "BT",
            "long_code": "BTN",
            "active": 1
        },
        {
            "country_id": 27,
            "name": "Bolivia",
            "dialing_code": "591",
            "country_code": "BO",
            "long_code": "BOL",
            "active": 1
        },
        {
            "country_id": 28,
            "name": "Bosnia and Herzegovina",
            "dialing_code": "387",
            "country_code": "BA",
            "long_code": "BIH",
            "active": 1
        },
        {
            "country_id": 29,
            "name": "Botswana",
            "dialing_code": "267",
            "country_code": "BW",
            "long_code": "BWA",
            "active": 1
        },
        {
            "country_id": 30,
            "name": "Bouvet Island",
            "dialing_code": "",
            "country_code": "BV",
            "long_code": "BVT",
            "active": 1
        },
        {
            "country_id": 31,
            "name": "Brazil",
            "dialing_code": "55",
            "country_code": "BR",
            "long_code": "BRA",
            "active": 1
        },
        {
            "country_id": 32,
            "name": "British Indian Ocean Territory",
            "dialing_code": "246",
            "country_code": "IO",
            "long_code": "IOT",
            "active": 1
        },
        {
            "country_id": 33,
            "name": "Brunei",
            "dialing_code": "673",
            "country_code": "BN",
            "long_code": "BRN",
            "active": 1
        },
        {
            "country_id": 34,
            "name": "Bulgaria",
            "dialing_code": "359",
            "country_code": "BG",
            "long_code": "BGR",
            "active": 1
        },
        {
            "country_id": 35,
            "name": "Burkina Faso",
            "dialing_code": "226",
            "country_code": "BF",
            "long_code": "BFA",
            "active": 1
        },
        {
            "country_id": 36,
            "name": "Burundi",
            "dialing_code": "257",
            "country_code": "BI",
            "long_code": "BDI",
            "active": 1
        },
        {
            "country_id": 37,
            "name": "Cambodia",
            "dialing_code": "855",
            "country_code": "KH",
            "long_code": "KHM",
            "active": 1
        },
        {
            "country_id": 38,
            "name": "Cameroon",
            "dialing_code": "237",
            "country_code": "CM",
            "long_code": "CMR",
            "active": 1
        },
        {
            "country_id": 39,
            "name": "Canada",
            "dialing_code": "1",
            "country_code": "CA",
            "long_code": "CAN",
            "active": 1
        },
        {
            "country_id": 40,
            "name": "Cape Verde",
            "dialing_code": "238",
            "country_code": "CV",
            "long_code": "CPV",
            "active": 1
        },
        {
            "country_id": 41,
            "name": "Cayman Islands",
            "dialing_code": "+1-345",
            "country_code": "KY",
            "long_code": "CYM",
            "active": 1
        },
        {
            "country_id": 42,
            "name": "Central African Republic",
            "dialing_code": "236",
            "country_code": "CF",
            "long_code": "CAF",
            "active": 1
        },
        {
            "country_id": 43,
            "name": "Chad",
            "dialing_code": "235",
            "country_code": "TD",
            "long_code": "TCD",
            "active": 1
        },
        {
            "country_id": 44,
            "name": "Chile",
            "dialing_code": "56",
            "country_code": "CL",
            "long_code": "CHL",
            "active": 1
        },
        {
            "country_id": 45,
            "name": "China",
            "dialing_code": "86",
            "country_code": "CN",
            "long_code": "CHN",
            "active": 1
        },
        {
            "country_id": 46,
            "name": "Christmas Island",
            "dialing_code": "61",
            "country_code": "CX",
            "long_code": "CXR",
            "active": 1
        },
        {
            "country_id": 47,
            "name": "Cocos (Keeling) Islands",
            "dialing_code": "61",
            "country_code": "CC",
            "long_code": "CCK",
            "active": 1
        },
        {
            "country_id": 48,
            "name": "Colombia",
            "dialing_code": "57",
            "country_code": "CO",
            "long_code": "COL",
            "active": 1
        },
        {
            "country_id": 49,
            "name": "Comoros",
            "dialing_code": "269",
            "country_code": "KM",
            "long_code": "COM",
            "active": 1
        },
        {
            "country_id": 50,
            "name": "Congo",
            "dialing_code": "242",
            "country_code": "CG",
            "long_code": "COG",
            "active": 1
        },
        {
            "country_id": 51,
            "name": "Congo The Democratic Republic Of The",
            "dialing_code": "243",
            "country_code": "CD",
            "long_code": "COD",
            "active": 1
        },
        {
            "country_id": 52,
            "name": "Cook Islands",
            "dialing_code": "682",
            "country_code": "CK",
            "long_code": "COK",
            "active": 1
        },
        {
            "country_id": 53,
            "name": "Costa Rica",
            "dialing_code": "506",
            "country_code": "CR",
            "long_code": "CRI",
            "active": 1
        },
        {
            "country_id": 54,
            "name": "Cote D'Ivoire (Ivory Coast)",
            "dialing_code": "225",
            "country_code": "CI",
            "long_code": "CIV",
            "active": 1
        },
        {
            "country_id": 55,
            "name": "Croatia (Hrvatska)",
            "dialing_code": "385",
            "country_code": "HR",
            "long_code": "HRV",
            "active": 1
        },
        {
            "country_id": 56,
            "name": "Cuba",
            "dialing_code": "53",
            "country_code": "CU",
            "long_code": "CUB",
            "active": 1
        },
        {
            "country_id": 57,
            "name": "Cyprus",
            "dialing_code": "357",
            "country_code": "CY",
            "long_code": "CYP",
            "active": 1
        },
        {
            "country_id": 58,
            "name": "Czech Republic",
            "dialing_code": "420",
            "country_code": "CZ",
            "long_code": "CZE",
            "active": 1
        },
        {
            "country_id": 59,
            "name": "Denmark",
            "dialing_code": "45",
            "country_code": "DK",
            "long_code": "DNK",
            "active": 1
        },
        {
            "country_id": 60,
            "name": "Djibouti",
            "dialing_code": "253",
            "country_code": "DJ",
            "long_code": "DJI",
            "active": 1
        },
        {
            "country_id": 61,
            "name": "Dominica",
            "dialing_code": "+1-767",
            "country_code": "DM",
            "long_code": "DMA",
            "active": 1
        },
        {
            "country_id": 62,
            "name": "Dominican Republic",
            "dialing_code": "+1-809 and 1-829",
            "country_code": "DO",
            "long_code": "DOM",
            "active": 1
        },
        {
            "country_id": 63,
            "name": "East Timor",
            "dialing_code": "670",
            "country_code": "TL",
            "long_code": "TLS",
            "active": 1
        },
        {
            "country_id": 64,
            "name": "Ecuador",
            "dialing_code": "593",
            "country_code": "EC",
            "long_code": "ECU",
            "active": 1
        },
        {
            "country_id": 65,
            "name": "Egypt",
            "dialing_code": "20",
            "country_code": "EG",
            "long_code": "EGY",
            "active": 1
        },
        {
            "country_id": 66,
            "name": "El Salvador",
            "dialing_code": "503",
            "country_code": "SV",
            "long_code": "SLV",
            "active": 1
        },
        {
            "country_id": 67,
            "name": "Equatorial Guinea",
            "dialing_code": "240",
            "country_code": "GQ",
            "long_code": "GNQ",
            "active": 1
        },
        {
            "country_id": 68,
            "name": "Eritrea",
            "dialing_code": "291",
            "country_code": "ER",
            "long_code": "ERI",
            "active": 1
        },
        {
            "country_id": 69,
            "name": "Estonia",
            "dialing_code": "372",
            "country_code": "EE",
            "long_code": "EST",
            "active": 1
        },
        {
            "country_id": 70,
            "name": "Ethiopia",
            "dialing_code": "251",
            "country_code": "ET",
            "long_code": "ETH",
            "active": 1
        },
        {
            "country_id": 71,
            "name": "Falkland Islands",
            "dialing_code": "500",
            "country_code": "FK",
            "long_code": "FLK",
            "active": 1
        },
        {
            "country_id": 72,
            "name": "Faroe Islands",
            "dialing_code": "298",
            "country_code": "FO",
            "long_code": "FRO",
            "active": 1
        },
        {
            "country_id": 73,
            "name": "Fiji Islands",
            "dialing_code": "679",
            "country_code": "FJ",
            "long_code": "FJI",
            "active": 1
        },
        {
            "country_id": 74,
            "name": "Finland",
            "dialing_code": "358",
            "country_code": "FI",
            "long_code": "FIN",
            "active": 1
        },
        {
            "country_id": 75,
            "name": "France",
            "dialing_code": "33",
            "country_code": "FR",
            "long_code": "FRA",
            "active": 1
        },
        {
            "country_id": 76,
            "name": "French Guiana",
            "dialing_code": "594",
            "country_code": "GF",
            "long_code": "GUF",
            "active": 1
        },
        {
            "country_id": 77,
            "name": "French Polynesia",
            "dialing_code": "689",
            "country_code": "PF",
            "long_code": "PYF",
            "active": 1
        },
        {
            "country_id": 78,
            "name": "French Southern Territories",
            "dialing_code": "",
            "country_code": "TF",
            "long_code": "ATF",
            "active": 1
        },
        {
            "country_id": 79,
            "name": "Gabon",
            "dialing_code": "241",
            "country_code": "GA",
            "long_code": "GAB",
            "active": 1
        },
        {
            "country_id": 80,
            "name": "Gambia The",
            "dialing_code": "220",
            "country_code": "GM",
            "long_code": "GMB",
            "active": 1
        },
        {
            "country_id": 81,
            "name": "Georgia",
            "dialing_code": "995",
            "country_code": "GE",
            "long_code": "GEO",
            "active": 1
        },
        {
            "country_id": 82,
            "name": "Germany",
            "dialing_code": "49",
            "country_code": "DE",
            "long_code": "DEU",
            "active": 1
        },
        {
            "country_id": 83,
            "name": "Ghana",
            "dialing_code": "233",
            "country_code": "GH",
            "long_code": "GHA",
            "active": 1
        },
        {
            "country_id": 84,
            "name": "Gibraltar",
            "dialing_code": "350",
            "country_code": "GI",
            "long_code": "GIB",
            "active": 1
        },
        {
            "country_id": 85,
            "name": "Greece",
            "dialing_code": "30",
            "country_code": "GR",
            "long_code": "GRC",
            "active": 1
        },
        {
            "country_id": 86,
            "name": "Greenland",
            "dialing_code": "299",
            "country_code": "GL",
            "long_code": "GRL",
            "active": 1
        },
        {
            "country_id": 87,
            "name": "Grenada",
            "dialing_code": "+1-473",
            "country_code": "GD",
            "long_code": "GRD",
            "active": 1
        },
        {
            "country_id": 88,
            "name": "Guadeloupe",
            "dialing_code": "590",
            "country_code": "GP",
            "long_code": "GLP",
            "active": 1
        },
        {
            "country_id": 89,
            "name": "Guam",
            "dialing_code": "+1-671",
            "country_code": "GU",
            "long_code": "GUM",
            "active": 1
        },
        {
            "country_id": 90,
            "name": "Guatemala",
            "dialing_code": "502",
            "country_code": "GT",
            "long_code": "GTM",
            "active": 1
        },
        {
            "country_id": 91,
            "name": "Guernsey and Alderney",
            "dialing_code": "+44-1481",
            "country_code": "GG",
            "long_code": "GGY",
            "active": 1
        },
        {
            "country_id": 92,
            "name": "Guinea",
            "dialing_code": "224",
            "country_code": "GN",
            "long_code": "GIN",
            "active": 1
        },
        {
            "country_id": 93,
            "name": "Guinea-Bissau",
            "dialing_code": "245",
            "country_code": "GW",
            "long_code": "GNB",
            "active": 1
        },
        {
            "country_id": 94,
            "name": "Guyana",
            "dialing_code": "592",
            "country_code": "GY",
            "long_code": "GUY",
            "active": 1
        },
        {
            "country_id": 95,
            "name": "Haiti",
            "dialing_code": "509",
            "country_code": "HT",
            "long_code": "HTI",
            "active": 1
        },
        {
            "country_id": 96,
            "name": "Heard and McDonald Islands",
            "dialing_code": " ",
            "country_code": "HM",
            "long_code": "HMD",
            "active": 1
        },
        {
            "country_id": 97,
            "name": "Honduras",
            "dialing_code": "504",
            "country_code": "HN",
            "long_code": "HND",
            "active": 1
        },
        {
            "country_id": 98,
            "name": "Hong Kong S.A.R.",
            "dialing_code": "852",
            "country_code": "HK",
            "long_code": "HKG",
            "active": 1
        },
        {
            "country_id": 99,
            "name": "Hungary",
            "dialing_code": "36",
            "country_code": "HU",
            "long_code": "HUN",
            "active": 1
        },
        {
            "country_id": 100,
            "name": "Iceland",
            "dialing_code": "354",
            "country_code": "IS",
            "long_code": "ISL",
            "active": 1
        },
        {
            "country_id": 101,
            "name": "India",
            "dialing_code": "91",
            "country_code": "IN",
            "long_code": "IND",
            "active": 1
        },
        {
            "country_id": 102,
            "name": "Indonesia",
            "dialing_code": "62",
            "country_code": "ID",
            "long_code": "IDN",
            "active": 1
        },
        {
            "country_id": 103,
            "name": "Iran",
            "dialing_code": "98",
            "country_code": "IR",
            "long_code": "IRN",
            "active": 1
        },
        {
            "country_id": 104,
            "name": "Iraq",
            "dialing_code": "964",
            "country_code": "IQ",
            "long_code": "IRQ",
            "active": 1
        },
        {
            "country_id": 105,
            "name": "Ireland",
            "dialing_code": "353",
            "country_code": "IE",
            "long_code": "IRL",
            "active": 1
        },
        {
            "country_id": 106,
            "name": "Israel",
            "dialing_code": "972",
            "country_code": "IL",
            "long_code": "ISR",
            "active": 1
        },
        {
            "country_id": 107,
            "name": "Italy",
            "dialing_code": "39",
            "country_code": "IT",
            "long_code": "ITA",
            "active": 1
        },
        {
            "country_id": 108,
            "name": "Jamaica",
            "dialing_code": "+1-876",
            "country_code": "JM",
            "long_code": "JAM",
            "active": 1
        },
        {
            "country_id": 109,
            "name": "Japan",
            "dialing_code": "81",
            "country_code": "JP",
            "long_code": "JPN",
            "active": 1
        },
        {
            "country_id": 110,
            "name": "Jersey",
            "dialing_code": "+44-1534",
            "country_code": "JE",
            "long_code": "JEY",
            "active": 1
        },
        {
            "country_id": 111,
            "name": "Jordan",
            "dialing_code": "962",
            "country_code": "JO",
            "long_code": "JOR",
            "active": 1
        },
        {
            "country_id": 112,
            "name": "Kazakhstan",
            "dialing_code": "7",
            "country_code": "KZ",
            "long_code": "KAZ",
            "active": 1
        },
        {
            "country_id": 113,
            "name": "Kenya",
            "dialing_code": "254",
            "country_code": "KE",
            "long_code": "KEN",
            "active": 1
        },
        {
            "country_id": 114,
            "name": "Kiribati",
            "dialing_code": "686",
            "country_code": "KI",
            "long_code": "KIR",
            "active": 1
        },
        {
            "country_id": 115,
            "name": "Korea North\n",
            "dialing_code": "850",
            "country_code": "KP",
            "long_code": "PRK",
            "active": 1
        },
        {
            "country_id": 116,
            "name": "Korea South",
            "dialing_code": "82",
            "country_code": "KR",
            "long_code": "KOR",
            "active": 1
        },
        {
            "country_id": 117,
            "name": "Kuwait",
            "dialing_code": "965",
            "country_code": "KW",
            "long_code": "KWT",
            "active": 1
        },
        {
            "country_id": 118,
            "name": "Kyrgyzstan",
            "dialing_code": "996",
            "country_code": "KG",
            "long_code": "KGZ",
            "active": 1
        },
        {
            "country_id": 119,
            "name": "Laos",
            "dialing_code": "856",
            "country_code": "LA",
            "long_code": "LAO",
            "active": 1
        },
        {
            "country_id": 120,
            "name": "Latvia",
            "dialing_code": "371",
            "country_code": "LV",
            "long_code": "LVA",
            "active": 1
        },
        {
            "country_id": 121,
            "name": "Lebanon",
            "dialing_code": "961",
            "country_code": "LB",
            "long_code": "LBN",
            "active": 1
        },
        {
            "country_id": 122,
            "name": "Lesotho",
            "dialing_code": "266",
            "country_code": "LS",
            "long_code": "LSO",
            "active": 1
        },
        {
            "country_id": 123,
            "name": "Liberia",
            "dialing_code": "231",
            "country_code": "LR",
            "long_code": "LBR",
            "active": 1
        },
        {
            "country_id": 124,
            "name": "Libya",
            "dialing_code": "218",
            "country_code": "LY",
            "long_code": "LBY",
            "active": 1
        },
        {
            "country_id": 125,
            "name": "Liechtenstein",
            "dialing_code": "423",
            "country_code": "LI",
            "long_code": "LIE",
            "active": 1
        },
        {
            "country_id": 126,
            "name": "Lithuania",
            "dialing_code": "370",
            "country_code": "LT",
            "long_code": "LTU",
            "active": 1
        },
        {
            "country_id": 127,
            "name": "Luxembourg",
            "dialing_code": "352",
            "country_code": "LU",
            "long_code": "LUX",
            "active": 1
        },
        {
            "country_id": 128,
            "name": "Macau S.A.R.",
            "dialing_code": "853",
            "country_code": "MO",
            "long_code": "MAC",
            "active": 1
        },
        {
            "country_id": 129,
            "name": "Macedonia",
            "dialing_code": "389",
            "country_code": "MK",
            "long_code": "MKD",
            "active": 1
        },
        {
            "country_id": 130,
            "name": "Madagascar",
            "dialing_code": "261",
            "country_code": "MG",
            "long_code": "MDG",
            "active": 1
        },
        {
            "country_id": 131,
            "name": "Malawi",
            "dialing_code": "265",
            "country_code": "MW",
            "long_code": "MWI",
            "active": 1
        },
        {
            "country_id": 132,
            "name": "Malaysia",
            "dialing_code": "60",
            "country_code": "MY",
            "long_code": "MYS",
            "active": 1
        },
        {
            "country_id": 133,
            "name": "Maldives",
            "dialing_code": "960",
            "country_code": "MV",
            "long_code": "MDV",
            "active": 1
        },
        {
            "country_id": 134,
            "name": "Mali",
            "dialing_code": "223",
            "country_code": "ML",
            "long_code": "MLI",
            "active": 1
        },
        {
            "country_id": 135,
            "name": "Malta",
            "dialing_code": "356",
            "country_code": "MT",
            "long_code": "MLT",
            "active": 1
        },
        {
            "country_id": 136,
            "name": "Man (Isle of)",
            "dialing_code": "+44-1624",
            "country_code": "IM",
            "long_code": "IMN",
            "active": 1
        },
        {
            "country_id": 137,
            "name": "Marshall Islands",
            "dialing_code": "692",
            "country_code": "MH",
            "long_code": "MHL",
            "active": 1
        },
        {
            "country_id": 138,
            "name": "Martinique",
            "dialing_code": "596",
            "country_code": "MQ",
            "long_code": "MTQ",
            "active": 1
        },
        {
            "country_id": 139,
            "name": "Mauritania",
            "dialing_code": "222",
            "country_code": "MR",
            "long_code": "MRT",
            "active": 1
        },
        {
            "country_id": 140,
            "name": "Mauritius",
            "dialing_code": "230",
            "country_code": "MU",
            "long_code": "MUS",
            "active": 1
        },
        {
            "country_id": 141,
            "name": "Mayotte",
            "dialing_code": "262",
            "country_code": "YT",
            "long_code": "MYT",
            "active": 1
        },
        {
            "country_id": 142,
            "name": "Mexico",
            "dialing_code": "52",
            "country_code": "MX",
            "long_code": "MEX",
            "active": 1
        },
        {
            "country_id": 143,
            "name": "Micronesia",
            "dialing_code": "691",
            "country_code": "FM",
            "long_code": "FSM",
            "active": 1
        },
        {
            "country_id": 144,
            "name": "Moldova",
            "dialing_code": "373",
            "country_code": "MD",
            "long_code": "MDA",
            "active": 1
        },
        {
            "country_id": 145,
            "name": "Monaco",
            "dialing_code": "377",
            "country_code": "MC",
            "long_code": "MCO",
            "active": 1
        },
        {
            "country_id": 146,
            "name": "Mongolia",
            "dialing_code": "976",
            "country_code": "MN",
            "long_code": "MNG",
            "active": 1
        },
        {
            "country_id": 147,
            "name": "Montenegro",
            "dialing_code": "382",
            "country_code": "ME",
            "long_code": "MNE",
            "active": 1
        },
        {
            "country_id": 148,
            "name": "Montserrat",
            "dialing_code": "+1-664",
            "country_code": "MS",
            "long_code": "MSR",
            "active": 1
        },
        {
            "country_id": 149,
            "name": "Morocco",
            "dialing_code": "212",
            "country_code": "MA",
            "long_code": "MAR",
            "active": 1
        },
        {
            "country_id": 150,
            "name": "Mozambique",
            "dialing_code": "258",
            "country_code": "MZ",
            "long_code": "MOZ",
            "active": 1
        },
        {
            "country_id": 151,
            "name": "Myanmar",
            "dialing_code": "95",
            "country_code": "MM",
            "long_code": "MMR",
            "active": 1
        },
        {
            "country_id": 152,
            "name": "Namibia",
            "dialing_code": "264",
            "country_code": "NA",
            "long_code": "NAM",
            "active": 1
        },
        {
            "country_id": 153,
            "name": "Nauru",
            "dialing_code": "674",
            "country_code": "NR",
            "long_code": "NRU",
            "active": 1
        },
        {
            "country_id": 154,
            "name": "Nepal",
            "dialing_code": "977",
            "country_code": "NP",
            "long_code": "NPL",
            "active": 1
        },
        {
            "country_id": 155,
            "name": "Netherlands Antilles",
            "dialing_code": "",
            "country_code": "AN",
            "long_code": "ANT",
            "active": 1
        },
        {
            "country_id": 156,
            "name": "Netherlands The",
            "dialing_code": "31",
            "country_code": "NL",
            "long_code": "NLD",
            "active": 1
        },
        {
            "country_id": 157,
            "name": "New Caledonia",
            "dialing_code": "687",
            "country_code": "NC",
            "long_code": "NCL",
            "active": 1
        },
        {
            "country_id": 158,
            "name": "New Zealand",
            "dialing_code": "64",
            "country_code": "NZ",
            "long_code": "NZL",
            "active": 1
        },
        {
            "country_id": 159,
            "name": "Nicaragua",
            "dialing_code": "505",
            "country_code": "NI",
            "long_code": "NIC",
            "active": 1
        },
        {
            "country_id": 160,
            "name": "Niger",
            "dialing_code": "227",
            "country_code": "NE",
            "long_code": "NER",
            "active": 1
        },
        {
            "country_id": 161,
            "name": "Nigeria",
            "dialing_code": "234",
            "country_code": "NG",
            "long_code": "NGA",
            "active": 1
        },
        {
            "country_id": 162,
            "name": "Niue",
            "dialing_code": "683",
            "country_code": "NU",
            "long_code": "NIU",
            "active": 1
        },
        {
            "country_id": 163,
            "name": "Norfolk Island",
            "dialing_code": "672",
            "country_code": "NF",
            "long_code": "NFK",
            "active": 1
        },
        {
            "country_id": 164,
            "name": "Northern Mariana Islands",
            "dialing_code": "+1-670",
            "country_code": "MP",
            "long_code": "MNP",
            "active": 1
        },
        {
            "country_id": 165,
            "name": "Norway",
            "dialing_code": "47",
            "country_code": "NO",
            "long_code": "NOR",
            "active": 1
        },
        {
            "country_id": 166,
            "name": "Oman",
            "dialing_code": "968",
            "country_code": "OM",
            "long_code": "OMN",
            "active": 1
        },
        {
            "country_id": 167,
            "name": "Pakistan",
            "dialing_code": "92",
            "country_code": "PK",
            "long_code": "PAK",
            "active": 1
        },
        {
            "country_id": 168,
            "name": "Palau",
            "dialing_code": "680",
            "country_code": "PW",
            "long_code": "PLW",
            "active": 1
        },
        {
            "country_id": 169,
            "name": "Palestinian Territory Occupied",
            "dialing_code": "970",
            "country_code": "PS",
            "long_code": "PSE",
            "active": 1
        },
        {
            "country_id": 170,
            "name": "Panama",
            "dialing_code": "507",
            "country_code": "PA",
            "long_code": "PAN",
            "active": 1
        },
        {
            "country_id": 171,
            "name": "Papua new Guinea",
            "dialing_code": "675",
            "country_code": "PG",
            "long_code": "PNG",
            "active": 1
        },
        {
            "country_id": 172,
            "name": "Paraguay",
            "dialing_code": "595",
            "country_code": "PY",
            "long_code": "PRY",
            "active": 1
        },
        {
            "country_id": 173,
            "name": "Peru",
            "dialing_code": "51",
            "country_code": "PE",
            "long_code": "PER",
            "active": 1
        },
        {
            "country_id": 174,
            "name": "Philippines",
            "dialing_code": "63",
            "country_code": "PH",
            "long_code": "PHL",
            "active": 1
        },
        {
            "country_id": 175,
            "name": "Pitcairn Island",
            "dialing_code": "870",
            "country_code": "PN",
            "long_code": "PCN",
            "active": 1
        },
        {
            "country_id": 176,
            "name": "Poland",
            "dialing_code": "48",
            "country_code": "PL",
            "long_code": "POL",
            "active": 1
        },
        {
            "country_id": 177,
            "name": "Portugal",
            "dialing_code": "351",
            "country_code": "PT",
            "long_code": "PRT",
            "active": 1
        },
        {
            "country_id": 178,
            "name": "Puerto Rico",
            "dialing_code": "+1-787 and 1-939",
            "country_code": "PR",
            "long_code": "PRI",
            "active": 1
        },
        {
            "country_id": 179,
            "name": "Qatar",
            "dialing_code": "974",
            "country_code": "QA",
            "long_code": "QAT",
            "active": 1
        },
        {
            "country_id": 180,
            "name": "Reunion",
            "dialing_code": "262",
            "country_code": "RE",
            "long_code": "REU",
            "active": 1
        },
        {
            "country_id": 181,
            "name": "Romania",
            "dialing_code": "40",
            "country_code": "RO",
            "long_code": "ROU",
            "active": 1
        },
        {
            "country_id": 182,
            "name": "Russia",
            "dialing_code": "7",
            "country_code": "RU",
            "long_code": "RUS",
            "active": 1
        },
        {
            "country_id": 183,
            "name": "Rwanda",
            "dialing_code": "250",
            "country_code": "RW",
            "long_code": "RWA",
            "active": 1
        },
        {
            "country_id": 184,
            "name": "Saint Helena",
            "dialing_code": "290",
            "country_code": "SH",
            "long_code": "SHN",
            "active": 1
        },
        {
            "country_id": 185,
            "name": "Saint Kitts And Nevis",
            "dialing_code": "+1-869",
            "country_code": "KN",
            "long_code": "KNA",
            "active": 1
        },
        {
            "country_id": 186,
            "name": "Saint Lucia",
            "dialing_code": "+1-758",
            "country_code": "LC",
            "long_code": "LCA",
            "active": 1
        },
        {
            "country_id": 187,
            "name": "Saint Pierre and Miquelon",
            "dialing_code": "508",
            "country_code": "PM",
            "long_code": "SPM",
            "active": 1
        },
        {
            "country_id": 188,
            "name": "Saint Vincent And The Grenadines",
            "dialing_code": "+1-784",
            "country_code": "VC",
            "long_code": "VCT",
            "active": 1
        },
        {
            "country_id": 189,
            "name": "Saint-Barthelemy",
            "dialing_code": "590",
            "country_code": "BL",
            "long_code": "BLM",
            "active": 1
        },
        {
            "country_id": 190,
            "name": "Saint-Martin (French part)",
            "dialing_code": "590",
            "country_code": "MF",
            "long_code": "MAF",
            "active": 1
        },
        {
            "country_id": 191,
            "name": "Samoa",
            "dialing_code": "685",
            "country_code": "WS",
            "long_code": "WSM",
            "active": 1
        },
        {
            "country_id": 192,
            "name": "San Marino",
            "dialing_code": "378",
            "country_code": "SM",
            "long_code": "SMR",
            "active": 1
        },
        {
            "country_id": 193,
            "name": "Sao Tome and Principe",
            "dialing_code": "239",
            "country_code": "ST",
            "long_code": "STP",
            "active": 1
        },
        {
            "country_id": 194,
            "name": "Saudi Arabia",
            "dialing_code": "966",
            "country_code": "SA",
            "long_code": "SAU",
            "active": 1
        },
        {
            "country_id": 195,
            "name": "Senegal",
            "dialing_code": "221",
            "country_code": "SN",
            "long_code": "SEN",
            "active": 1
        },
        {
            "country_id": 196,
            "name": "Serbia",
            "dialing_code": "381",
            "country_code": "RS",
            "long_code": "SRB",
            "active": 1
        },
        {
            "country_id": 197,
            "name": "Seychelles",
            "dialing_code": "248",
            "country_code": "SC",
            "long_code": "SYC",
            "active": 1
        },
        {
            "country_id": 198,
            "name": "Sierra Leone",
            "dialing_code": "232",
            "country_code": "SL",
            "long_code": "SLE",
            "active": 1
        },
        {
            "country_id": 199,
            "name": "Singapore",
            "dialing_code": "65",
            "country_code": "SG",
            "long_code": "SGP",
            "active": 1
        },
        {
            "country_id": 200,
            "name": "Slovakia",
            "dialing_code": "421",
            "country_code": "SK",
            "long_code": "SVK",
            "active": 1
        },
        {
            "country_id": 201,
            "name": "Slovenia",
            "dialing_code": "386",
            "country_code": "SI",
            "long_code": "SVN",
            "active": 1
        },
        {
            "country_id": 202,
            "name": "Solomon Islands",
            "dialing_code": "677",
            "country_code": "SB",
            "long_code": "SLB",
            "active": 1
        },
        {
            "country_id": 203,
            "name": "Somalia",
            "dialing_code": "252",
            "country_code": "SO",
            "long_code": "SOM",
            "active": 1
        },
        {
            "country_id": 204,
            "name": "South Africa",
            "dialing_code": "27",
            "country_code": "ZA",
            "long_code": "ZAF",
            "active": 1
        },
        {
            "country_id": 205,
            "name": "South Georgia",
            "dialing_code": "",
            "country_code": "GS",
            "long_code": "SGS",
            "active": 1
        },
        {
            "country_id": 206,
            "name": "South Sudan",
            "dialing_code": "211",
            "country_code": "SS",
            "long_code": "SSD",
            "active": 1
        },
        {
            "country_id": 207,
            "name": "Spain",
            "dialing_code": "34",
            "country_code": "ES",
            "long_code": "ESP",
            "active": 1
        },
        {
            "country_id": 208,
            "name": "Sri Lanka",
            "dialing_code": "94",
            "country_code": "LK",
            "long_code": "LKA",
            "active": 1
        },
        {
            "country_id": 209,
            "name": "Sudan",
            "dialing_code": "249",
            "country_code": "SD",
            "long_code": "SDN",
            "active": 1
        },
        {
            "country_id": 210,
            "name": "Suriname",
            "dialing_code": "597",
            "country_code": "SR",
            "long_code": "SUR",
            "active": 1
        },
        {
            "country_id": 211,
            "name": "Svalbard And Jan Mayen Islands",
            "dialing_code": "47",
            "country_code": "SJ",
            "long_code": "SJM",
            "active": 1
        },
        {
            "country_id": 212,
            "name": "Swaziland",
            "dialing_code": "268",
            "country_code": "SZ",
            "long_code": "SWZ",
            "active": 1
        },
        {
            "country_id": 213,
            "name": "Sweden",
            "dialing_code": "46",
            "country_code": "SE",
            "long_code": "SWE",
            "active": 1
        },
        {
            "country_id": 214,
            "name": "Switzerland",
            "dialing_code": "41",
            "country_code": "CH",
            "long_code": "CHE",
            "active": 1
        },
        {
            "country_id": 215,
            "name": "Syria",
            "dialing_code": "963",
            "country_code": "SY",
            "long_code": "SYR",
            "active": 1
        },
        {
            "country_id": 216,
            "name": "Taiwan",
            "dialing_code": "886",
            "country_code": "TW",
            "long_code": "TWN",
            "active": 1
        },
        {
            "country_id": 217,
            "name": "Tajikistan",
            "dialing_code": "992",
            "country_code": "TJ",
            "long_code": "TJK",
            "active": 1
        },
        {
            "country_id": 218,
            "name": "Tanzania",
            "dialing_code": "255",
            "country_code": "TZ",
            "long_code": "TZA",
            "active": 1
        },
        {
            "country_id": 219,
            "name": "Thailand",
            "dialing_code": "66",
            "country_code": "TH",
            "long_code": "THA",
            "active": 1
        },
        {
            "country_id": 220,
            "name": "Togo",
            "dialing_code": "228",
            "country_code": "TG",
            "long_code": "TGO",
            "active": 1
        },
        {
            "country_id": 221,
            "name": "Tokelau",
            "dialing_code": "690",
            "country_code": "TK",
            "long_code": "TKL",
            "active": 1
        },
        {
            "country_id": 222,
            "name": "Tonga",
            "dialing_code": "676",
            "country_code": "TO",
            "long_code": "TON",
            "active": 1
        },
        {
            "country_id": 223,
            "name": "Trinidad And Tobago",
            "dialing_code": "+1-868",
            "country_code": "TT",
            "long_code": "TTO",
            "active": 1
        },
        {
            "country_id": 224,
            "name": "Tunisia",
            "dialing_code": "216",
            "country_code": "TN",
            "long_code": "TUN",
            "active": 1
        },
        {
            "country_id": 225,
            "name": "Turkey",
            "dialing_code": "90",
            "country_code": "TR",
            "long_code": "TUR",
            "active": 1
        },
        {
            "country_id": 226,
            "name": "Turkmenistan",
            "dialing_code": "993",
            "country_code": "TM",
            "long_code": "TKM",
            "active": 1
        },
        {
            "country_id": 227,
            "name": "Turks And Caicos Islands",
            "dialing_code": "+1-649",
            "country_code": "TC",
            "long_code": "TCA",
            "active": 1
        },
        {
            "country_id": 228,
            "name": "Tuvalu",
            "dialing_code": "688",
            "country_code": "TV",
            "long_code": "TUV",
            "active": 1
        },
        {
            "country_id": 229,
            "name": "Uganda",
            "dialing_code": "256",
            "country_code": "UG",
            "long_code": "UGA",
            "active": 1
        },
        {
            "country_id": 230,
            "name": "Ukraine",
            "dialing_code": "380",
            "country_code": "UA",
            "long_code": "UKR",
            "active": 1
        },
        {
            "country_id": 231,
            "name": "United Arab Emirates",
            "dialing_code": "971",
            "country_code": "AE",
            "long_code": "ARE",
            "active": 1
        },
        {
            "country_id": 232,
            "name": "United Kingdom",
            "dialing_code": "44",
            "country_code": "GB",
            "long_code": "GBR",
            "active": 1
        },
        {
            "country_id": 233,
            "name": "United States",
            "dialing_code": "1",
            "country_code": "US",
            "long_code": "USA",
            "active": 1
        },
        {
            "country_id": 234,
            "name": "United States Minor Outlying Islands",
            "dialing_code": "1",
            "country_code": "UM",
            "long_code": "UMI",
            "active": 1
        },
        {
            "country_id": 235,
            "name": "Uruguay",
            "dialing_code": "598",
            "country_code": "UY",
            "long_code": "URY",
            "active": 1
        },
        {
            "country_id": 236,
            "name": "Uzbekistan",
            "dialing_code": "998",
            "country_code": "UZ",
            "long_code": "UZB",
            "active": 1
        },
        {
            "country_id": 237,
            "name": "Vanuatu",
            "dialing_code": "678",
            "country_code": "VU",
            "long_code": "VUT",
            "active": 1
        },
        {
            "country_id": 238,
            "name": "Vatican City State (Holy See)",
            "dialing_code": "379",
            "country_code": "VA",
            "long_code": "VAT",
            "active": 1
        },
        {
            "country_id": 239,
            "name": "Venezuela",
            "dialing_code": "58",
            "country_code": "VE",
            "long_code": "VEN",
            "active": 1
        },
        {
            "country_id": 240,
            "name": "Vietnam",
            "dialing_code": "84",
            "country_code": "VN",
            "long_code": "VNM",
            "active": 1
        },
        {
            "country_id": 241,
            "name": "Virgin Islands (British)",
            "dialing_code": "+1-284",
            "country_code": "VG",
            "long_code": "VGB",
            "active": 1
        },
        {
            "country_id": 242,
            "name": "Virgin Islands (US)",
            "dialing_code": "+1-340",
            "country_code": "VI",
            "long_code": "VIR",
            "active": 1
        },
        {
            "country_id": 243,
            "name": "Wallis And Futuna Islands",
            "dialing_code": "681",
            "country_code": "WF",
            "long_code": "WLF",
            "active": 1
        },
        {
            "country_id": 244,
            "name": "Western Sahara",
            "dialing_code": "212",
            "country_code": "EH",
            "long_code": "ESH",
            "active": 1
        },
        {
            "country_id": 245,
            "name": "Yemen",
            "dialing_code": "967",
            "country_code": "YE",
            "long_code": "YEM",
            "active": 1
        },
        {
            "country_id": 246,
            "name": "Zambia",
            "dialing_code": "260",
            "country_code": "ZM",
            "long_code": "ZMB",
            "active": 1
        },
        {
            "country_id": 247,
            "name": "Zimbabwe",
            "dialing_code": "263",
            "country_code": "ZW",
            "long_code": "ZWE",
            "active": 1
        }
    ]
}
```
<div id="execution-results-GETapi-country-active" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-country-active"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-country-active"></code></pre>
</div>
<div id="execution-error-GETapi-country-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-country-active"></code></pre>
</div>
<form id="form-GETapi-country-active" data-method="GET" data-path="api/country/active" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-country-active', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-country-active" onclick="tryItOut('GETapi-country-active');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-country-active" onclick="cancelTryOut('GETapi-country-active');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-country-active" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/country/active</code></b>
</p>
</form>


## Activate or deactivate country

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/country/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"country_id":13}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/country/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "country_id": 13
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/country/update',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'country_id' => 13,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-country-update" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-country-update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-country-update"></code></pre>
</div>
<div id="execution-error-PUTapi-country-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-country-update"></code></pre>
</div>
<form id="form-PUTapi-country-update" data-method="PUT" data-path="api/country/update" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-country-update', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-country-update" onclick="tryItOut('PUTapi-country-update');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-country-update" onclick="cancelTryOut('PUTapi-country-update');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-country-update" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/country/update</code></b>
</p>
<p>
<label id="auth-PUTapi-country-update" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-country-update" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country_id" data-endpoint="PUTapi-country-update" data-component="body" required  hidden>
<br>
County ID .
</p>

</form>


## All Timezones




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/timezone/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/timezone/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/timezone/all',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "result": [
        {
            "timezone_id": 1,
            "name": "Pacific\/Niue",
            "utc": "(GMT-11:00) Niue",
            "active": 1
        },
        {
            "timezone_id": 2,
            "name": "Pacific\/Pago_Pago",
            "utc": "(GMT-11:00) Pago Pago",
            "active": 1
        },
        {
            "timezone_id": 3,
            "name": "Pacific\/Honolulu",
            "utc": "(GMT-10:00) Hawaii Time",
            "active": 1
        },
        {
            "timezone_id": 4,
            "name": "Pacific\/Rarotonga",
            "utc": "(GMT-10:00) Rarotonga",
            "active": 1
        },
        {
            "timezone_id": 5,
            "name": "Pacific\/Tahiti",
            "utc": "(GMT-10:00) Tahiti",
            "active": 1
        },
        {
            "timezone_id": 6,
            "name": "Pacific\/Marquesas",
            "utc": "(GMT-09:30) Marquesas",
            "active": 1
        },
        {
            "timezone_id": 7,
            "name": "America\/Anchorage",
            "utc": "(GMT-09:00) Alaska Time",
            "active": 1
        },
        {
            "timezone_id": 8,
            "name": "Pacific\/Gambier",
            "utc": "(GMT-09:00) Gambier",
            "active": 1
        },
        {
            "timezone_id": 9,
            "name": "America\/Los_Angeles",
            "utc": "(GMT-08:00) Pacific Time",
            "active": 1
        },
        {
            "timezone_id": 10,
            "name": "America\/Tijuana",
            "utc": "(GMT-08:00) Pacific Time - Tijuana",
            "active": 1
        },
        {
            "timezone_id": 11,
            "name": "America\/Vancouver",
            "utc": "(GMT-08:00) Pacific Time - Vancouver",
            "active": 1
        },
        {
            "timezone_id": 12,
            "name": "America\/Whitehorse",
            "utc": "(GMT-08:00) Pacific Time - Whitehorse",
            "active": 1
        },
        {
            "timezone_id": 13,
            "name": "Pacific\/Pitcairn",
            "utc": "(GMT-08:00) Pitcairn",
            "active": 1
        },
        {
            "timezone_id": 14,
            "name": "America\/Dawson_Creek",
            "utc": "(GMT-07:00) Mountain Time - Dawson Creek",
            "active": 1
        },
        {
            "timezone_id": 15,
            "name": "America\/Denver",
            "utc": "(GMT-07:00) Mountain Time",
            "active": 1
        },
        {
            "timezone_id": 16,
            "name": "America\/Edmonton",
            "utc": "(GMT-07:00) Mountain Time - Edmonton",
            "active": 1
        },
        {
            "timezone_id": 17,
            "name": "America\/Hermosillo",
            "utc": "(GMT-07:00) Mountain Time - Hermosillo",
            "active": 1
        },
        {
            "timezone_id": 18,
            "name": "America\/Mazatlan",
            "utc": "(GMT-07:00) Mountain Time - Chihuahua, Mazatlan",
            "active": 1
        },
        {
            "timezone_id": 19,
            "name": "America\/Phoenix",
            "utc": "(GMT-07:00) Mountain Time - Arizona",
            "active": 1
        },
        {
            "timezone_id": 20,
            "name": "America\/Yellowknife",
            "utc": "(GMT-07:00) Mountain Time - Yellowknife",
            "active": 1
        },
        {
            "timezone_id": 21,
            "name": "America\/Belize",
            "utc": "(GMT-06:00) Belize",
            "active": 1
        },
        {
            "timezone_id": 22,
            "name": "America\/Chicago",
            "utc": "(GMT-06:00) Central Time",
            "active": 1
        },
        {
            "timezone_id": 23,
            "name": "America\/Costa_Rica",
            "utc": "(GMT-06:00) Costa Rica",
            "active": 1
        },
        {
            "timezone_id": 24,
            "name": "America\/El_Salvador",
            "utc": "(GMT-06:00) El Salvador",
            "active": 1
        },
        {
            "timezone_id": 25,
            "name": "America\/Guatemala",
            "utc": "(GMT-06:00) Guatemala",
            "active": 1
        },
        {
            "timezone_id": 26,
            "name": "America\/Managua",
            "utc": "(GMT-06:00) Managua",
            "active": 1
        },
        {
            "timezone_id": 27,
            "name": "America\/Mexico_City",
            "utc": "(GMT-06:00) Central Time - Mexico City",
            "active": 1
        },
        {
            "timezone_id": 28,
            "name": "America\/Regina",
            "utc": "(GMT-06:00) Central Time - Regina",
            "active": 1
        },
        {
            "timezone_id": 29,
            "name": "America\/Tegucigalpa",
            "utc": "(GMT-06:00) Central Time - Tegucigalpa",
            "active": 1
        },
        {
            "timezone_id": 30,
            "name": "America\/Winnipeg",
            "utc": "(GMT-06:00) Central Time - Winnipeg",
            "active": 1
        },
        {
            "timezone_id": 31,
            "name": "Pacific\/Galapagos",
            "utc": "(GMT-06:00) Galapagos",
            "active": 1
        },
        {
            "timezone_id": 32,
            "name": "America\/Bogota",
            "utc": "(GMT-05:00) Bogota",
            "active": 1
        },
        {
            "timezone_id": 33,
            "name": "America\/Cancun",
            "utc": "(GMT-05:00) America Cancun",
            "active": 1
        },
        {
            "timezone_id": 34,
            "name": "America\/Cayman",
            "utc": "(GMT-05:00) Cayman",
            "active": 1
        },
        {
            "timezone_id": 35,
            "name": "America\/Guayaquil",
            "utc": "(GMT-05:00) Guayaquil",
            "active": 1
        },
        {
            "timezone_id": 36,
            "name": "America\/Havana",
            "utc": "(GMT-05:00) Havana",
            "active": 1
        },
        {
            "timezone_id": 37,
            "name": "America\/Iqaluit",
            "utc": "(GMT-05:00) Eastern Time - Iqaluit",
            "active": 1
        },
        {
            "timezone_id": 38,
            "name": "America\/Jamaica",
            "utc": "(GMT-05:00) Jamaica",
            "active": 1
        },
        {
            "timezone_id": 39,
            "name": "America\/Lima",
            "utc": "(GMT-05:00) Lima",
            "active": 1
        },
        {
            "timezone_id": 40,
            "name": "America\/Nassau",
            "utc": "(GMT-05:00) Nassau",
            "active": 1
        },
        {
            "timezone_id": 41,
            "name": "America\/New_York",
            "utc": "(GMT-05:00) Eastern Time",
            "active": 1
        },
        {
            "timezone_id": 42,
            "name": "America\/Panama",
            "utc": "(GMT-05:00) Panama",
            "active": 1
        },
        {
            "timezone_id": 43,
            "name": "America\/Port-au-Prince",
            "utc": "(GMT-05:00) Port-au-Prince",
            "active": 1
        },
        {
            "timezone_id": 44,
            "name": "America\/Rio_Branco",
            "utc": "(GMT-05:00) Rio Branco",
            "active": 1
        },
        {
            "timezone_id": 45,
            "name": "America\/Toronto",
            "utc": "(GMT-05:00) Eastern Time - Toronto",
            "active": 1
        },
        {
            "timezone_id": 46,
            "name": "Pacific\/Easter",
            "utc": "(GMT-05:00) Easter Island",
            "active": 1
        },
        {
            "timezone_id": 47,
            "name": "America\/Caracas",
            "utc": "(GMT-04:30) Caracas",
            "active": 1
        },
        {
            "timezone_id": 48,
            "name": "America\/Asuncion",
            "utc": "(GMT-03:00) Asuncion",
            "active": 1
        },
        {
            "timezone_id": 49,
            "name": "America\/Barbados",
            "utc": "(GMT-04:00) Barbados",
            "active": 1
        },
        {
            "timezone_id": 50,
            "name": "America\/Boa_Vista",
            "utc": "(GMT-04:00) Boa Vista",
            "active": 1
        },
        {
            "timezone_id": 51,
            "name": "America\/Campo_Grande",
            "utc": "(GMT-03:00) Campo Grande",
            "active": 1
        },
        {
            "timezone_id": 52,
            "name": "America\/Cuiaba",
            "utc": "(GMT-03:00) Cuiaba",
            "active": 1
        },
        {
            "timezone_id": 53,
            "name": "America\/Curacao",
            "utc": "(GMT-04:00) Curacao",
            "active": 1
        },
        {
            "timezone_id": 54,
            "name": "America\/Grand_Turk",
            "utc": "(GMT-04:00) Grand Turk",
            "active": 1
        },
        {
            "timezone_id": 55,
            "name": "America\/Guyana",
            "utc": "(GMT-04:00) Guyana",
            "active": 1
        },
        {
            "timezone_id": 56,
            "name": "America\/Halifax",
            "utc": "(GMT-04:00) Atlantic Time - Halifax",
            "active": 1
        },
        {
            "timezone_id": 57,
            "name": "America\/La_Paz",
            "utc": "(GMT-04:00) La Paz",
            "active": 1
        },
        {
            "timezone_id": 58,
            "name": "America\/Manaus",
            "utc": "(GMT-04:00) Manaus",
            "active": 1
        },
        {
            "timezone_id": 59,
            "name": "America\/Martinique",
            "utc": "(GMT-04:00) Martinique",
            "active": 1
        },
        {
            "timezone_id": 60,
            "name": "America\/Port_of_Spain",
            "utc": "(GMT-04:00) Port of Spain",
            "active": 1
        },
        {
            "timezone_id": 61,
            "name": "America\/Porto_Velho",
            "utc": "(GMT-04:00) Porto Velho",
            "active": 1
        },
        {
            "timezone_id": 62,
            "name": "America\/Puerto_Rico",
            "utc": "(GMT-04:00) Puerto Rico",
            "active": 1
        },
        {
            "timezone_id": 63,
            "name": "America\/Santo_Domingo",
            "utc": "(GMT-04:00) Santo Domingo",
            "active": 1
        },
        {
            "timezone_id": 64,
            "name": "America\/Thule",
            "utc": "(GMT-04:00) Thule",
            "active": 1
        },
        {
            "timezone_id": 65,
            "name": "Atlantic\/Bermuda",
            "utc": "(GMT-04:00) Bermuda",
            "active": 1
        },
        {
            "timezone_id": 66,
            "name": "America\/St_Johns",
            "utc": "(GMT-03:30) Newfoundland Time - St. Johns",
            "active": 1
        },
        {
            "timezone_id": 67,
            "name": "America\/Araguaina",
            "utc": "(GMT-03:00) Araguaina",
            "active": 1
        },
        {
            "timezone_id": 68,
            "name": "America\/Argentina\/Buenos_Aires",
            "utc": "(GMT-03:00) Buenos Aires",
            "active": 1
        },
        {
            "timezone_id": 69,
            "name": "America\/Bahia",
            "utc": "(GMT-03:00) Salvador",
            "active": 1
        },
        {
            "timezone_id": 70,
            "name": "America\/Belem",
            "utc": "(GMT-03:00) Belem",
            "active": 1
        },
        {
            "timezone_id": 71,
            "name": "America\/Cayenne",
            "utc": "(GMT-03:00) Cayenne",
            "active": 1
        },
        {
            "timezone_id": 72,
            "name": "America\/Fortaleza",
            "utc": "(GMT-03:00) Fortaleza",
            "active": 1
        },
        {
            "timezone_id": 73,
            "name": "America\/Godthab",
            "utc": "(GMT-03:00) Godthab",
            "active": 1
        },
        {
            "timezone_id": 74,
            "name": "America\/Maceio",
            "utc": "(GMT-03:00) Maceio",
            "active": 1
        },
        {
            "timezone_id": 75,
            "name": "America\/Miquelon",
            "utc": "(GMT-03:00) Miquelon",
            "active": 1
        },
        {
            "timezone_id": 76,
            "name": "America\/Montevideo",
            "utc": "(GMT-03:00) Montevideo",
            "active": 1
        },
        {
            "timezone_id": 77,
            "name": "America\/Paramaribo",
            "utc": "(GMT-03:00) Paramaribo",
            "active": 1
        },
        {
            "timezone_id": 78,
            "name": "America\/Recife",
            "utc": "(GMT-03:00) Recife",
            "active": 1
        },
        {
            "timezone_id": 79,
            "name": "America\/Santiago",
            "utc": "(GMT-03:00) Santiago",
            "active": 1
        },
        {
            "timezone_id": 80,
            "name": "America\/Sao_Paulo",
            "utc": "(GMT-02:00) Sao Paulo",
            "active": 1
        },
        {
            "timezone_id": 81,
            "name": "Antarctica\/Palmer",
            "utc": "(GMT-03:00) Palmer",
            "active": 1
        },
        {
            "timezone_id": 82,
            "name": "Antarctica\/Rothera",
            "utc": "(GMT-03:00) Rothera",
            "active": 1
        },
        {
            "timezone_id": 83,
            "name": "Atlantic\/Stanley",
            "utc": "(GMT-03:00) Stanley",
            "active": 1
        },
        {
            "timezone_id": 84,
            "name": "America\/Noronha",
            "utc": "(GMT-02:00) Noronha",
            "active": 1
        },
        {
            "timezone_id": 85,
            "name": "Atlantic\/South_Georgia",
            "utc": "(GMT-02:00) South Georgia",
            "active": 1
        },
        {
            "timezone_id": 86,
            "name": "America\/Scoresbysund",
            "utc": "(GMT-01:00) Scoresbysund",
            "active": 1
        },
        {
            "timezone_id": 87,
            "name": "Atlantic\/Azores",
            "utc": "(GMT-01:00) Azores",
            "active": 1
        },
        {
            "timezone_id": 88,
            "name": "Atlantic\/Cape_Verde",
            "utc": "(GMT-01:00) Cape Verde",
            "active": 1
        },
        {
            "timezone_id": 89,
            "name": "Africa\/Abidjan",
            "utc": "(GMT+00:00) Abidjan",
            "active": 1
        },
        {
            "timezone_id": 90,
            "name": "Africa\/Accra",
            "utc": "(GMT+00:00) Accra",
            "active": 1
        },
        {
            "timezone_id": 91,
            "name": "Africa\/Bissau",
            "utc": "(GMT+00:00) Bissau",
            "active": 1
        },
        {
            "timezone_id": 92,
            "name": "Africa\/Casablanca",
            "utc": "(GMT+00:00) Casablanca",
            "active": 1
        },
        {
            "timezone_id": 93,
            "name": "Africa\/El_Aaiun",
            "utc": "(GMT+00:00) El Aaiun",
            "active": 1
        },
        {
            "timezone_id": 94,
            "name": "Africa\/Monrovia",
            "utc": "(GMT+00:00) Monrovia",
            "active": 1
        },
        {
            "timezone_id": 95,
            "name": "America\/Danmarkshavn",
            "utc": "(GMT+00:00) Danmarkshavn",
            "active": 1
        },
        {
            "timezone_id": 96,
            "name": "Atlantic\/Canary",
            "utc": "(GMT+00:00) Canary Islands",
            "active": 1
        },
        {
            "timezone_id": 97,
            "name": "Atlantic\/Faroe",
            "utc": "(GMT+00:00) Faeroe",
            "active": 1
        },
        {
            "timezone_id": 98,
            "name": "Atlantic\/Reykjavik",
            "utc": "(GMT+00:00) Reykjavik",
            "active": 1
        },
        {
            "timezone_id": 99,
            "name": "Etc\/GMT",
            "utc": "(GMT+00:00) GMT (no daylight saving)",
            "active": 1
        },
        {
            "timezone_id": 100,
            "name": "Europe\/Dublin",
            "utc": "(GMT+00:00) Dublin",
            "active": 1
        },
        {
            "timezone_id": 101,
            "name": "Europe\/Lisbon",
            "utc": "(GMT+00:00) Lisbon",
            "active": 1
        },
        {
            "timezone_id": 102,
            "name": "Europe\/London",
            "utc": "(GMT+00:00) London",
            "active": 1
        },
        {
            "timezone_id": 103,
            "name": "Africa\/Algiers",
            "utc": "(GMT+01:00) Algiers",
            "active": 1
        },
        {
            "timezone_id": 104,
            "name": "Africa\/Ceuta",
            "utc": "(GMT+01:00) Ceuta",
            "active": 1
        },
        {
            "timezone_id": 105,
            "name": "Africa\/Lagos",
            "utc": "(GMT+01:00) Lagos",
            "active": 1
        },
        {
            "timezone_id": 106,
            "name": "Africa\/Ndjamena",
            "utc": "(GMT+01:00) Ndjamena",
            "active": 1
        },
        {
            "timezone_id": 107,
            "name": "Africa\/Tunis",
            "utc": "(GMT+01:00) Tunis",
            "active": 1
        },
        {
            "timezone_id": 108,
            "name": "Africa\/Windhoek",
            "utc": "(GMT+02:00) Windhoek",
            "active": 1
        },
        {
            "timezone_id": 109,
            "name": "Europe\/Amsterdam",
            "utc": "(GMT+01:00) Amsterdam",
            "active": 1
        },
        {
            "timezone_id": 110,
            "name": "Europe\/Andorra",
            "utc": "(GMT+01:00) Andorra",
            "active": 1
        },
        {
            "timezone_id": 111,
            "name": "Europe\/Belgrade",
            "utc": "(GMT+01:00) Central European Time - Belgrade",
            "active": 1
        },
        {
            "timezone_id": 112,
            "name": "Europe\/Berlin",
            "utc": "(GMT+01:00) Berlin",
            "active": 1
        },
        {
            "timezone_id": 113,
            "name": "Europe\/Brussels",
            "utc": "(GMT+01:00) Brussels",
            "active": 1
        },
        {
            "timezone_id": 114,
            "name": "Europe\/Budapest",
            "utc": "(GMT+01:00) Budapest",
            "active": 1
        },
        {
            "timezone_id": 115,
            "name": "Europe\/Copenhagen",
            "utc": "(GMT+01:00) Copenhagen",
            "active": 1
        },
        {
            "timezone_id": 116,
            "name": "Europe\/Gibraltar",
            "utc": "(GMT+01:00) Gibraltar",
            "active": 1
        },
        {
            "timezone_id": 117,
            "name": "Europe\/Luxembourg",
            "utc": "(GMT+01:00) Luxembourg",
            "active": 1
        },
        {
            "timezone_id": 118,
            "name": "Europe\/Madrid",
            "utc": "(GMT+01:00) Madrid",
            "active": 1
        },
        {
            "timezone_id": 119,
            "name": "Europe\/Malta",
            "utc": "(GMT+01:00) Malta",
            "active": 1
        },
        {
            "timezone_id": 120,
            "name": "Europe\/Monaco",
            "utc": "(GMT+01:00) Monaco",
            "active": 1
        },
        {
            "timezone_id": 121,
            "name": "Europe\/Oslo",
            "utc": "(GMT+01:00) Oslo",
            "active": 1
        },
        {
            "timezone_id": 122,
            "name": "Europe\/Paris",
            "utc": "(GMT+01:00) Paris",
            "active": 1
        },
        {
            "timezone_id": 123,
            "name": "Europe\/Prague",
            "utc": "(GMT+01:00) Central European Time - Prague",
            "active": 1
        },
        {
            "timezone_id": 124,
            "name": "Europe\/Rome",
            "utc": "(GMT+01:00) Rome",
            "active": 1
        },
        {
            "timezone_id": 125,
            "name": "Europe\/Stockholm",
            "utc": "(GMT+01:00) Stockholm",
            "active": 1
        },
        {
            "timezone_id": 126,
            "name": "Europe\/Tirane",
            "utc": "(GMT+01:00) Tirane",
            "active": 1
        },
        {
            "timezone_id": 127,
            "name": "Europe\/Vienna",
            "utc": "(GMT+01:00) Vienna",
            "active": 1
        },
        {
            "timezone_id": 128,
            "name": "Europe\/Warsaw",
            "utc": "(GMT+01:00) Warsaw",
            "active": 1
        },
        {
            "timezone_id": 129,
            "name": "Europe\/Zurich",
            "utc": "(GMT+01:00) Zurich",
            "active": 1
        },
        {
            "timezone_id": 130,
            "name": "Africa\/Cairo",
            "utc": "(GMT+02:00) Cairo",
            "active": 1
        },
        {
            "timezone_id": 131,
            "name": "Africa\/Johannesburg",
            "utc": "(GMT+02:00) Johannesburg",
            "active": 1
        },
        {
            "timezone_id": 132,
            "name": "Africa\/Maputo",
            "utc": "(GMT+02:00) Maputo",
            "active": 1
        },
        {
            "timezone_id": 133,
            "name": "Africa\/Tripoli",
            "utc": "(GMT+02:00) Tripoli",
            "active": 1
        },
        {
            "timezone_id": 134,
            "name": "Asia\/Amman",
            "utc": "(GMT+02:00) Amman",
            "active": 1
        },
        {
            "timezone_id": 135,
            "name": "Asia\/Beirut",
            "utc": "(GMT+02:00) Beirut",
            "active": 1
        },
        {
            "timezone_id": 136,
            "name": "Asia\/Damascus",
            "utc": "(GMT+02:00) Damascus",
            "active": 1
        },
        {
            "timezone_id": 137,
            "name": "Asia\/Gaza",
            "utc": "(GMT+02:00) Gaza",
            "active": 1
        },
        {
            "timezone_id": 138,
            "name": "Asia\/Jerusalem",
            "utc": "(GMT+02:00) Jerusalem",
            "active": 1
        },
        {
            "timezone_id": 139,
            "name": "Asia\/Nicosia",
            "utc": "(GMT+02:00) Nicosia",
            "active": 1
        },
        {
            "timezone_id": 140,
            "name": "Europe\/Athens",
            "utc": "(GMT+02:00) Athens",
            "active": 1
        },
        {
            "timezone_id": 141,
            "name": "Europe\/Bucharest",
            "utc": "(GMT+02:00) Bucharest",
            "active": 1
        },
        {
            "timezone_id": 142,
            "name": "Europe\/Chisinau",
            "utc": "(GMT+02:00) Chisinau",
            "active": 1
        },
        {
            "timezone_id": 143,
            "name": "Europe\/Helsinki",
            "utc": "(GMT+02:00) Helsinki",
            "active": 1
        },
        {
            "timezone_id": 144,
            "name": "Europe\/Istanbul",
            "utc": "(GMT+02:00) Istanbul",
            "active": 1
        },
        {
            "timezone_id": 145,
            "name": "Europe\/Kaliningrad",
            "utc": "(GMT+02:00) Moscow-01 - Kaliningrad",
            "active": 1
        },
        {
            "timezone_id": 146,
            "name": "Europe\/Kiev",
            "utc": "(GMT+02:00) Kiev",
            "active": 1
        },
        {
            "timezone_id": 147,
            "name": "Europe\/Riga",
            "utc": "(GMT+02:00) Riga",
            "active": 1
        },
        {
            "timezone_id": 148,
            "name": "Europe\/Sofia",
            "utc": "(GMT+02:00) Sofia",
            "active": 1
        },
        {
            "timezone_id": 149,
            "name": "Europe\/Tallinn",
            "utc": "(GMT+02:00) Tallinn",
            "active": 1
        },
        {
            "timezone_id": 150,
            "name": "Europe\/Vilnius",
            "utc": "(GMT+02:00) Vilnius",
            "active": 1
        },
        {
            "timezone_id": 151,
            "name": "Africa\/Khartoum",
            "utc": "(GMT+03:00) Khartoum",
            "active": 1
        },
        {
            "timezone_id": 152,
            "name": "Africa\/Nairobi",
            "utc": "(GMT+03:00) Nairobi",
            "active": 1
        },
        {
            "timezone_id": 153,
            "name": "Africa\/Kampala",
            "utc": "(GMT+03:00) Kampala",
            "active": 1
        },
        {
            "timezone_id": 154,
            "name": "Africa\/Lusaka",
            "utc": "(GMT+02:00) Lusaka",
            "active": 1
        },
        {
            "timezone_id": 155,
            "name": "Africa\/Dar_es_Salaam",
            "utc": "(GMT+03:00) Dar_es_Salaam",
            "active": 1
        },
        {
            "timezone_id": 156,
            "name": "Antarctica\/Syowa",
            "utc": "(GMT+03:00) Syowa",
            "active": 1
        },
        {
            "timezone_id": 157,
            "name": "Asia\/Baghdad",
            "utc": "(GMT+03:00) Baghdad",
            "active": 1
        },
        {
            "timezone_id": 158,
            "name": "Asia\/Qatar",
            "utc": "(GMT+03:00) Qatar",
            "active": 1
        },
        {
            "timezone_id": 159,
            "name": "Asia\/Riyadh",
            "utc": "(GMT+03:00) Riyadh",
            "active": 1
        },
        {
            "timezone_id": 160,
            "name": "Europe\/Minsk",
            "utc": "(GMT+03:00) Minsk",
            "active": 1
        },
        {
            "timezone_id": 161,
            "name": "Europe\/Moscow",
            "utc": "(GMT+03:00) Moscow+00 - Moscow",
            "active": 1
        },
        {
            "timezone_id": 162,
            "name": "Asia\/Tehran",
            "utc": "(GMT+03:30) Tehran",
            "active": 1
        },
        {
            "timezone_id": 163,
            "name": "Asia\/Baku",
            "utc": "(GMT+04:00) Baku",
            "active": 1
        },
        {
            "timezone_id": 164,
            "name": "Asia\/Dubai",
            "utc": "(GMT+04:00) Dubai",
            "active": 1
        },
        {
            "timezone_id": 165,
            "name": "Asia\/Tbilisi",
            "utc": "(GMT+04:00) Tbilisi",
            "active": 1
        },
        {
            "timezone_id": 166,
            "name": "Asia\/Yerevan",
            "utc": "(GMT+04:00) Yerevan",
            "active": 1
        },
        {
            "timezone_id": 167,
            "name": "Europe\/Samara",
            "utc": "(GMT+04:00) Moscow+01 - Samara",
            "active": 1
        },
        {
            "timezone_id": 168,
            "name": "Indian\/Mahe",
            "utc": "(GMT+04:00) Mahe",
            "active": 1
        },
        {
            "timezone_id": 169,
            "name": "Indian\/Mauritius",
            "utc": "(GMT+04:00) Mauritius",
            "active": 1
        },
        {
            "timezone_id": 170,
            "name": "Indian\/Reunion",
            "utc": "(GMT+04:00) Reunion",
            "active": 1
        },
        {
            "timezone_id": 171,
            "name": "Asia\/Kabul",
            "utc": "(GMT+04:30) Kabul",
            "active": 1
        },
        {
            "timezone_id": 172,
            "name": "Antarctica\/Mawson",
            "utc": "(GMT+05:00) Mawson",
            "active": 1
        },
        {
            "timezone_id": 173,
            "name": "Asia\/Aqtau",
            "utc": "(GMT+05:00) Aqtau",
            "active": 1
        },
        {
            "timezone_id": 174,
            "name": "Asia\/Aqtobe",
            "utc": "(GMT+05:00) Aqtobe",
            "active": 1
        },
        {
            "timezone_id": 175,
            "name": "Asia\/Ashgabat",
            "utc": "(GMT+05:00) Ashgabat",
            "active": 1
        },
        {
            "timezone_id": 176,
            "name": "Asia\/Dushanbe",
            "utc": "(GMT+05:00) Dushanbe",
            "active": 1
        },
        {
            "timezone_id": 177,
            "name": "Asia\/Karachi",
            "utc": "(GMT+05:00) Karachi",
            "active": 1
        },
        {
            "timezone_id": 178,
            "name": "Asia\/Tashkent",
            "utc": "(GMT+05:00) Tashkent",
            "active": 1
        },
        {
            "timezone_id": 179,
            "name": "Asia\/Yekaterinburg",
            "utc": "(GMT+05:00) Moscow+02 - Yekaterinburg",
            "active": 1
        },
        {
            "timezone_id": 180,
            "name": "Indian\/Kerguelen",
            "utc": "(GMT+05:00) Kerguelen",
            "active": 1
        },
        {
            "timezone_id": 181,
            "name": "Indian\/Maldives",
            "utc": "(GMT+05:00) Maldives",
            "active": 1
        },
        {
            "timezone_id": 182,
            "name": "Asia\/Calcutta",
            "utc": "(GMT+05:30) India Standard Time",
            "active": 1
        },
        {
            "timezone_id": 183,
            "name": "Asia\/Colombo",
            "utc": "(GMT+05:30) Colombo",
            "active": 1
        },
        {
            "timezone_id": 184,
            "name": "Asia\/Katmandu",
            "utc": "(GMT+05:45) Katmandu",
            "active": 1
        },
        {
            "timezone_id": 185,
            "name": "Antarctica\/Vostok",
            "utc": "(GMT+06:00) Vostok",
            "active": 1
        },
        {
            "timezone_id": 186,
            "name": "Asia\/Almaty",
            "utc": "(GMT+06:00) Almaty",
            "active": 1
        },
        {
            "timezone_id": 187,
            "name": "Asia\/Bishkek",
            "utc": "(GMT+06:00) Bishkek",
            "active": 1
        },
        {
            "timezone_id": 188,
            "name": "Asia\/Dhaka",
            "utc": "(GMT+06:00) Dhaka",
            "active": 1
        },
        {
            "timezone_id": 189,
            "name": "Asia\/Omsk",
            "utc": "(GMT+06:00) Moscow+03 - Omsk, Novosibirsk",
            "active": 1
        },
        {
            "timezone_id": 190,
            "name": "Asia\/Thimphu",
            "utc": "(GMT+06:00) Thimphu",
            "active": 1
        },
        {
            "timezone_id": 191,
            "name": "Indian\/Chagos",
            "utc": "(GMT+06:00) Chagos",
            "active": 1
        },
        {
            "timezone_id": 192,
            "name": "Asia\/Rangoon",
            "utc": "(GMT+06:30) Rangoon",
            "active": 1
        },
        {
            "timezone_id": 193,
            "name": "Indian\/Cocos",
            "utc": "(GMT+06:30) Cocos",
            "active": 1
        },
        {
            "timezone_id": 194,
            "name": "Antarctica\/Davis",
            "utc": "(GMT+07:00) Davis",
            "active": 1
        },
        {
            "timezone_id": 195,
            "name": "Asia\/Bangkok",
            "utc": "(GMT+07:00) Bangkok",
            "active": 1
        },
        {
            "timezone_id": 196,
            "name": "Asia\/Hovd",
            "utc": "(GMT+07:00) Hovd",
            "active": 1
        },
        {
            "timezone_id": 197,
            "name": "Asia\/Jakarta",
            "utc": "(GMT+07:00) Jakarta",
            "active": 1
        },
        {
            "timezone_id": 198,
            "name": "Asia\/Krasnoyarsk",
            "utc": "(GMT+07:00) Moscow+04 - Krasnoyarsk",
            "active": 1
        },
        {
            "timezone_id": 199,
            "name": "Asia\/Saigon",
            "utc": "(GMT+07:00) Hanoi",
            "active": 1
        },
        {
            "timezone_id": 200,
            "name": "Asia\/Ho_Chi_Minh",
            "utc": "(GMT+07:00) Ho Chi Minh",
            "active": 1
        },
        {
            "timezone_id": 201,
            "name": "Indian\/Christmas",
            "utc": "(GMT+07:00) Christmas",
            "active": 1
        },
        {
            "timezone_id": 202,
            "name": "Antarctica\/Casey",
            "utc": "(GMT+08:00) Casey",
            "active": 1
        },
        {
            "timezone_id": 203,
            "name": "Asia\/Brunei",
            "utc": "(GMT+08:00) Brunei",
            "active": 1
        },
        {
            "timezone_id": 204,
            "name": "Asia\/Choibalsan",
            "utc": "(GMT+08:00) Choibalsan",
            "active": 1
        },
        {
            "timezone_id": 205,
            "name": "Asia\/Hong_Kong",
            "utc": "(GMT+08:00) Hong Kong",
            "active": 1
        },
        {
            "timezone_id": 206,
            "name": "Asia\/Irkutsk",
            "utc": "(GMT+08:00) Moscow+05 - Irkutsk",
            "active": 1
        },
        {
            "timezone_id": 207,
            "name": "Asia\/Kuala_Lumpur",
            "utc": "(GMT+08:00) Kuala Lumpur",
            "active": 1
        },
        {
            "timezone_id": 208,
            "name": "Asia\/Macau",
            "utc": "(GMT+08:00) Macau",
            "active": 1
        },
        {
            "timezone_id": 209,
            "name": "Asia\/Makassar",
            "utc": "(GMT+08:00) Makassar",
            "active": 1
        },
        {
            "timezone_id": 210,
            "name": "Asia\/Manila",
            "utc": "(GMT+08:00) Manila",
            "active": 1
        },
        {
            "timezone_id": 211,
            "name": "Asia\/Shanghai",
            "utc": "(GMT+08:00) China Time - Beijing",
            "active": 1
        },
        {
            "timezone_id": 212,
            "name": "Asia\/Singapore",
            "utc": "(GMT+08:00) Singapore",
            "active": 1
        },
        {
            "timezone_id": 213,
            "name": "Asia\/Taipei",
            "utc": "(GMT+08:00) Taipei",
            "active": 1
        },
        {
            "timezone_id": 214,
            "name": "Asia\/Ulaanbaatar",
            "utc": "(GMT+08:00) Ulaanbaatar",
            "active": 1
        },
        {
            "timezone_id": 215,
            "name": "Australia\/Perth",
            "utc": "(GMT+08:00) Western Time - Perth",
            "active": 1
        },
        {
            "timezone_id": 216,
            "name": "Asia\/Pyongyang",
            "utc": "(GMT+08:30) Pyongyang",
            "active": 1
        },
        {
            "timezone_id": 217,
            "name": "Asia\/Dili",
            "utc": "(GMT+09:00) Dili",
            "active": 1
        },
        {
            "timezone_id": 218,
            "name": "Asia\/Jayapura",
            "utc": "(GMT+09:00) Jayapura",
            "active": 1
        },
        {
            "timezone_id": 219,
            "name": "Asia\/Seoul",
            "utc": "(GMT+09:00) Seoul",
            "active": 1
        },
        {
            "timezone_id": 220,
            "name": "Asia\/Tokyo",
            "utc": "(GMT+09:00) Tokyo",
            "active": 1
        },
        {
            "timezone_id": 221,
            "name": "Asia\/Yakutsk",
            "utc": "(GMT+09:00) Moscow+06 - Yakutsk",
            "active": 1
        },
        {
            "timezone_id": 222,
            "name": "Pacific\/Palau",
            "utc": "(GMT+09:00) Palau",
            "active": 1
        },
        {
            "timezone_id": 223,
            "name": "Australia\/Adelaide",
            "utc": "(GMT+10:30) Central Time - Adelaide",
            "active": 1
        },
        {
            "timezone_id": 224,
            "name": "Australia\/Darwin",
            "utc": "(GMT+09:30) Central Time - Darwin",
            "active": 1
        },
        {
            "timezone_id": 225,
            "name": "Antarctica\/DumontDUrville",
            "utc": "(GMT+10:00) Dumont D'Urville",
            "active": 1
        },
        {
            "timezone_id": 226,
            "name": "Asia\/Magadan",
            "utc": "(GMT+10:00) Moscow+07 - Magadan",
            "active": 1
        },
        {
            "timezone_id": 227,
            "name": "Asia\/Vladivostok",
            "utc": "(GMT+10:00) Moscow+07 - Yuzhno-Sakhalinsk",
            "active": 1
        },
        {
            "timezone_id": 228,
            "name": "Australia\/Brisbane",
            "utc": "(GMT+10:00) Eastern Time - Brisbane",
            "active": 1
        },
        {
            "timezone_id": 229,
            "name": "Australia\/Hobart",
            "utc": "(GMT+11:00) Eastern Time - Hobart",
            "active": 1
        },
        {
            "timezone_id": 230,
            "name": "Australia\/Sydney",
            "utc": "(GMT+11:00) Eastern Time - Melbourne, Sydney",
            "active": 1
        },
        {
            "timezone_id": 231,
            "name": "Pacific\/Chuuk",
            "utc": "(GMT+10:00) Truk",
            "active": 1
        },
        {
            "timezone_id": 232,
            "name": "Pacific\/Guam",
            "utc": "(GMT+10:00) Guam",
            "active": 1
        },
        {
            "timezone_id": 233,
            "name": "Pacific\/Port_Moresby",
            "utc": "(GMT+10:00) Port Moresby",
            "active": 1
        },
        {
            "timezone_id": 234,
            "name": "Pacific\/Efate",
            "utc": "(GMT+11:00) Efate",
            "active": 1
        },
        {
            "timezone_id": 235,
            "name": "Pacific\/Guadalcanal",
            "utc": "(GMT+11:00) Guadalcanal",
            "active": 1
        },
        {
            "timezone_id": 236,
            "name": "Pacific\/Kosrae",
            "utc": "(GMT+11:00) Kosrae",
            "active": 1
        },
        {
            "timezone_id": 237,
            "name": "Pacific\/Norfolk",
            "utc": "(GMT+11:00) Norfolk",
            "active": 1
        },
        {
            "timezone_id": 238,
            "name": "Pacific\/Noumea",
            "utc": "(GMT+11:00) Noumea",
            "active": 1
        },
        {
            "timezone_id": 239,
            "name": "Pacific\/Pohnpei",
            "utc": "(GMT+11:00) Ponape",
            "active": 1
        },
        {
            "timezone_id": 240,
            "name": "Asia\/Kamchatka",
            "utc": "(GMT+12:00) Moscow+09 - Petropavlovsk-Kamchatskiy",
            "active": 1
        },
        {
            "timezone_id": 241,
            "name": "Pacific\/Auckland",
            "utc": "(GMT+13:00) Auckland",
            "active": 1
        },
        {
            "timezone_id": 242,
            "name": "Pacific\/Fiji",
            "utc": "(GMT+13:00) Fiji",
            "active": 1
        },
        {
            "timezone_id": 243,
            "name": "Pacific\/Funafuti",
            "utc": "(GMT+12:00) Funafuti",
            "active": 1
        },
        {
            "timezone_id": 244,
            "name": "Pacific\/Kwajalein",
            "utc": "(GMT+12:00) Kwajalein",
            "active": 1
        },
        {
            "timezone_id": 245,
            "name": "Pacific\/Majuro",
            "utc": "(GMT+12:00) Majuro",
            "active": 1
        },
        {
            "timezone_id": 246,
            "name": "Pacific\/Nauru",
            "utc": "(GMT+12:00) Nauru",
            "active": 1
        },
        {
            "timezone_id": 247,
            "name": "Pacific\/Tarawa",
            "utc": "(GMT+12:00) Tarawa",
            "active": 1
        },
        {
            "timezone_id": 248,
            "name": "Pacific\/Wake",
            "utc": "(GMT+12:00) Wake",
            "active": 1
        },
        {
            "timezone_id": 249,
            "name": "Pacific\/Wallis",
            "utc": "(GMT+12:00) Wallis",
            "active": 1
        },
        {
            "timezone_id": 250,
            "name": "Pacific\/Apia",
            "utc": "(GMT+14:00) Apia",
            "active": 1
        },
        {
            "timezone_id": 251,
            "name": "Pacific\/Enderbury",
            "utc": "(GMT+13:00) Enderbury",
            "active": 1
        },
        {
            "timezone_id": 252,
            "name": "Pacific\/Fakaofo",
            "utc": "(GMT+13:00) Fakaofo",
            "active": 1
        },
        {
            "timezone_id": 253,
            "name": "Pacific\/Tongatapu",
            "utc": "(GMT+13:00) Tongatapu",
            "active": 1
        },
        {
            "timezone_id": 254,
            "name": "Pacific\/Kiritimati",
            "utc": "(GMT+14:00) Kiritimati",
            "active": 1
        }
    ]
}
```
<div id="execution-results-GETapi-timezone-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-timezone-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-timezone-all"></code></pre>
</div>
<div id="execution-error-GETapi-timezone-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-timezone-all"></code></pre>
</div>
<form id="form-GETapi-timezone-all" data-method="GET" data-path="api/timezone/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-timezone-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-timezone-all" onclick="tryItOut('GETapi-timezone-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-timezone-all" onclick="cancelTryOut('GETapi-timezone-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-timezone-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/timezone/all</code></b>
</p>
</form>


## All Active timezones




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/timezone/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/timezone/active"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/timezone/active',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "result": [
        {
            "timezone_id": 1,
            "name": "Afghanistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 2,
            "name": "Aland Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 3,
            "name": "Albania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 4,
            "name": "Algeria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 5,
            "name": "American Samoa",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 6,
            "name": "Andorra",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 7,
            "name": "Angola",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 8,
            "name": "Anguilla",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 9,
            "name": "Antarctica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 10,
            "name": "Antigua And Barbuda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 11,
            "name": "Argentina",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 12,
            "name": "Armenia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 13,
            "name": "Aruba",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 14,
            "name": "Australia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 15,
            "name": "Austria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 16,
            "name": "Azerbaijan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 17,
            "name": "Bahamas The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 18,
            "name": "Bahrain",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 19,
            "name": "Bangladesh",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 20,
            "name": "Barbados",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 21,
            "name": "Belarus",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 22,
            "name": "Belgium",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 23,
            "name": "Belize",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 24,
            "name": "Benin",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 25,
            "name": "Bermuda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 26,
            "name": "Bhutan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 27,
            "name": "Bolivia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 28,
            "name": "Bosnia and Herzegovina",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 29,
            "name": "Botswana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 30,
            "name": "Bouvet Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 31,
            "name": "Brazil",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 32,
            "name": "British Indian Ocean Territory",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 33,
            "name": "Brunei",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 34,
            "name": "Bulgaria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 35,
            "name": "Burkina Faso",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 36,
            "name": "Burundi",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 37,
            "name": "Cambodia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 38,
            "name": "Cameroon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 39,
            "name": "Canada",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 40,
            "name": "Cape Verde",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 41,
            "name": "Cayman Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 42,
            "name": "Central African Republic",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 43,
            "name": "Chad",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 44,
            "name": "Chile",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 45,
            "name": "China",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 46,
            "name": "Christmas Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 47,
            "name": "Cocos (Keeling) Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 48,
            "name": "Colombia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 49,
            "name": "Comoros",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 50,
            "name": "Congo",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 51,
            "name": "Congo The Democratic Republic Of The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 52,
            "name": "Cook Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 53,
            "name": "Costa Rica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 54,
            "name": "Cote D'Ivoire (Ivory Coast)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 55,
            "name": "Croatia (Hrvatska)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 56,
            "name": "Cuba",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 57,
            "name": "Cyprus",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 58,
            "name": "Czech Republic",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 59,
            "name": "Denmark",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 60,
            "name": "Djibouti",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 61,
            "name": "Dominica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 62,
            "name": "Dominican Republic",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 63,
            "name": "East Timor",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 64,
            "name": "Ecuador",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 65,
            "name": "Egypt",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 66,
            "name": "El Salvador",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 67,
            "name": "Equatorial Guinea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 68,
            "name": "Eritrea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 69,
            "name": "Estonia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 70,
            "name": "Ethiopia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 71,
            "name": "Falkland Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 72,
            "name": "Faroe Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 73,
            "name": "Fiji Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 74,
            "name": "Finland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 75,
            "name": "France",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 76,
            "name": "French Guiana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 77,
            "name": "French Polynesia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 78,
            "name": "French Southern Territories",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 79,
            "name": "Gabon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 80,
            "name": "Gambia The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 81,
            "name": "Georgia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 82,
            "name": "Germany",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 83,
            "name": "Ghana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 84,
            "name": "Gibraltar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 85,
            "name": "Greece",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 86,
            "name": "Greenland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 87,
            "name": "Grenada",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 88,
            "name": "Guadeloupe",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 89,
            "name": "Guam",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 90,
            "name": "Guatemala",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 91,
            "name": "Guernsey and Alderney",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 92,
            "name": "Guinea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 93,
            "name": "Guinea-Bissau",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 94,
            "name": "Guyana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 95,
            "name": "Haiti",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 96,
            "name": "Heard and McDonald Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 97,
            "name": "Honduras",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 98,
            "name": "Hong Kong S.A.R.",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 99,
            "name": "Hungary",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 100,
            "name": "Iceland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 101,
            "name": "India",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 102,
            "name": "Indonesia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 103,
            "name": "Iran",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 104,
            "name": "Iraq",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 105,
            "name": "Ireland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 106,
            "name": "Israel",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 107,
            "name": "Italy",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 108,
            "name": "Jamaica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 109,
            "name": "Japan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 110,
            "name": "Jersey",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 111,
            "name": "Jordan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 112,
            "name": "Kazakhstan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 113,
            "name": "Kenya",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 114,
            "name": "Kiribati",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 115,
            "name": "Korea North\n",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 116,
            "name": "Korea South",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 117,
            "name": "Kuwait",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 118,
            "name": "Kyrgyzstan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 119,
            "name": "Laos",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 120,
            "name": "Latvia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 121,
            "name": "Lebanon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 122,
            "name": "Lesotho",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 123,
            "name": "Liberia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 124,
            "name": "Libya",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 125,
            "name": "Liechtenstein",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 126,
            "name": "Lithuania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 127,
            "name": "Luxembourg",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 128,
            "name": "Macau S.A.R.",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 129,
            "name": "Macedonia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 130,
            "name": "Madagascar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 131,
            "name": "Malawi",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 132,
            "name": "Malaysia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 133,
            "name": "Maldives",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 134,
            "name": "Mali",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 135,
            "name": "Malta",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 136,
            "name": "Man (Isle of)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 137,
            "name": "Marshall Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 138,
            "name": "Martinique",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 139,
            "name": "Mauritania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 140,
            "name": "Mauritius",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 141,
            "name": "Mayotte",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 142,
            "name": "Mexico",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 143,
            "name": "Micronesia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 144,
            "name": "Moldova",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 145,
            "name": "Monaco",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 146,
            "name": "Mongolia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 147,
            "name": "Montenegro",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 148,
            "name": "Montserrat",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 149,
            "name": "Morocco",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 150,
            "name": "Mozambique",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 151,
            "name": "Myanmar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 152,
            "name": "Namibia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 153,
            "name": "Nauru",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 154,
            "name": "Nepal",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 155,
            "name": "Netherlands Antilles",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 156,
            "name": "Netherlands The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 157,
            "name": "New Caledonia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 158,
            "name": "New Zealand",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 159,
            "name": "Nicaragua",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 160,
            "name": "Niger",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 161,
            "name": "Nigeria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 162,
            "name": "Niue",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 163,
            "name": "Norfolk Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 164,
            "name": "Northern Mariana Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 165,
            "name": "Norway",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 166,
            "name": "Oman",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 167,
            "name": "Pakistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 168,
            "name": "Palau",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 169,
            "name": "Palestinian Territory Occupied",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 170,
            "name": "Panama",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 171,
            "name": "Papua new Guinea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 172,
            "name": "Paraguay",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 173,
            "name": "Peru",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 174,
            "name": "Philippines",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 175,
            "name": "Pitcairn Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 176,
            "name": "Poland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 177,
            "name": "Portugal",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 178,
            "name": "Puerto Rico",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 179,
            "name": "Qatar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 180,
            "name": "Reunion",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 181,
            "name": "Romania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 182,
            "name": "Russia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 183,
            "name": "Rwanda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 184,
            "name": "Saint Helena",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 185,
            "name": "Saint Kitts And Nevis",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 186,
            "name": "Saint Lucia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 187,
            "name": "Saint Pierre and Miquelon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 188,
            "name": "Saint Vincent And The Grenadines",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 189,
            "name": "Saint-Barthelemy",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 190,
            "name": "Saint-Martin (French part)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 191,
            "name": "Samoa",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 192,
            "name": "San Marino",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 193,
            "name": "Sao Tome and Principe",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 194,
            "name": "Saudi Arabia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 195,
            "name": "Senegal",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 196,
            "name": "Serbia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 197,
            "name": "Seychelles",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 198,
            "name": "Sierra Leone",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 199,
            "name": "Singapore",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 200,
            "name": "Slovakia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 201,
            "name": "Slovenia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 202,
            "name": "Solomon Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 203,
            "name": "Somalia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 204,
            "name": "South Africa",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 205,
            "name": "South Georgia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 206,
            "name": "South Sudan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 207,
            "name": "Spain",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 208,
            "name": "Sri Lanka",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 209,
            "name": "Sudan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 210,
            "name": "Suriname",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 211,
            "name": "Svalbard And Jan Mayen Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 212,
            "name": "Swaziland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 213,
            "name": "Sweden",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 214,
            "name": "Switzerland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 215,
            "name": "Syria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 216,
            "name": "Taiwan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 217,
            "name": "Tajikistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 218,
            "name": "Tanzania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 219,
            "name": "Thailand",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 220,
            "name": "Togo",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 221,
            "name": "Tokelau",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 222,
            "name": "Tonga",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 223,
            "name": "Trinidad And Tobago",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 224,
            "name": "Tunisia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 225,
            "name": "Turkey",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 226,
            "name": "Turkmenistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 227,
            "name": "Turks And Caicos Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 228,
            "name": "Tuvalu",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 229,
            "name": "Uganda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 230,
            "name": "Ukraine",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 231,
            "name": "United Arab Emirates",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 232,
            "name": "United Kingdom",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 233,
            "name": "United States",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 234,
            "name": "United States Minor Outlying Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 235,
            "name": "Uruguay",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 236,
            "name": "Uzbekistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 237,
            "name": "Vanuatu",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 238,
            "name": "Vatican City State (Holy See)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 239,
            "name": "Venezuela",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 240,
            "name": "Vietnam",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 241,
            "name": "Virgin Islands (British)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 242,
            "name": "Virgin Islands (US)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 243,
            "name": "Wallis And Futuna Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 244,
            "name": "Western Sahara",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 245,
            "name": "Yemen",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 246,
            "name": "Zambia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 247,
            "name": "Zimbabwe",
            "utc": null,
            "active": 1
        }
    ]
}
```
<div id="execution-results-GETapi-timezone-active" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-timezone-active"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-timezone-active"></code></pre>
</div>
<div id="execution-error-GETapi-timezone-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-timezone-active"></code></pre>
</div>
<form id="form-GETapi-timezone-active" data-method="GET" data-path="api/timezone/active" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-timezone-active', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-timezone-active" onclick="tryItOut('GETapi-timezone-active');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-timezone-active" onclick="cancelTryOut('GETapi-timezone-active');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-timezone-active" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/timezone/active</code></b>
</p>
</form>



