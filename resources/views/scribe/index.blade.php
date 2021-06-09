<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>StrongMinds</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;,&quot;python&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                            <a href="#" data-language-name="php">php</a>
                            <a href="#" data-language-name="python">python</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI (Swagger) spec</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: June 9 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>StrongMinds API</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "http://localhost:8000";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.7.7.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre><h1>Authenticating requests</h1>
<p>Authenticate requests to this API's endpoints by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Countries</h1>
<p>APIs for managing countries</p>
<h2>All Countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/country/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/country/all',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/country/all'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "success",
    "result": [
        {
            "country_id": 1,
            "name": "Afghanistan",
            "dialing_code": "93",
            "active": 1
        },
        {
            "country_id": 2,
            "name": "Aland Islands",
            "dialing_code": "+358-18",
            "active": 1
        },
        {
            "country_id": 3,
            "name": "Albania",
            "dialing_code": "355",
            "active": 1
        },
        {
            "country_id": 4,
            "name": "Algeria",
            "dialing_code": "213",
            "active": 1
        },
        {
            "country_id": 5,
            "name": "American Samoa",
            "dialing_code": "+1-684",
            "active": 1
        },
        {
            "country_id": 6,
            "name": "Andorra",
            "dialing_code": "376",
            "active": 1
        },
        {
            "country_id": 7,
            "name": "Angola",
            "dialing_code": "244",
            "active": 1
        },
        {
            "country_id": 8,
            "name": "Anguilla",
            "dialing_code": "+1-264",
            "active": 1
        },
        {
            "country_id": 9,
            "name": "Antarctica",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 10,
            "name": "Antigua And Barbuda",
            "dialing_code": "+1-268",
            "active": 1
        },
        {
            "country_id": 11,
            "name": "Argentina",
            "dialing_code": "54",
            "active": 1
        },
        {
            "country_id": 12,
            "name": "Armenia",
            "dialing_code": "374",
            "active": 1
        },
        {
            "country_id": 13,
            "name": "Aruba",
            "dialing_code": "297",
            "active": 1
        },
        {
            "country_id": 14,
            "name": "Australia",
            "dialing_code": "61",
            "active": 1
        },
        {
            "country_id": 15,
            "name": "Austria",
            "dialing_code": "43",
            "active": 1
        },
        {
            "country_id": 16,
            "name": "Azerbaijan",
            "dialing_code": "994",
            "active": 1
        },
        {
            "country_id": 17,
            "name": "Bahamas The",
            "dialing_code": "+1-242",
            "active": 1
        },
        {
            "country_id": 18,
            "name": "Bahrain",
            "dialing_code": "973",
            "active": 1
        },
        {
            "country_id": 19,
            "name": "Bangladesh",
            "dialing_code": "880",
            "active": 1
        },
        {
            "country_id": 20,
            "name": "Barbados",
            "dialing_code": "+1-246",
            "active": 1
        },
        {
            "country_id": 21,
            "name": "Belarus",
            "dialing_code": "375",
            "active": 1
        },
        {
            "country_id": 22,
            "name": "Belgium",
            "dialing_code": "32",
            "active": 1
        },
        {
            "country_id": 23,
            "name": "Belize",
            "dialing_code": "501",
            "active": 1
        },
        {
            "country_id": 24,
            "name": "Benin",
            "dialing_code": "229",
            "active": 1
        },
        {
            "country_id": 25,
            "name": "Bermuda",
            "dialing_code": "+1-441",
            "active": 1
        },
        {
            "country_id": 26,
            "name": "Bhutan",
            "dialing_code": "975",
            "active": 1
        },
        {
            "country_id": 27,
            "name": "Bolivia",
            "dialing_code": "591",
            "active": 1
        },
        {
            "country_id": 28,
            "name": "Bosnia and Herzegovina",
            "dialing_code": "387",
            "active": 1
        },
        {
            "country_id": 29,
            "name": "Botswana",
            "dialing_code": "267",
            "active": 1
        },
        {
            "country_id": 30,
            "name": "Bouvet Island",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 31,
            "name": "Brazil",
            "dialing_code": "55",
            "active": 1
        },
        {
            "country_id": 32,
            "name": "British Indian Ocean Territory",
            "dialing_code": "246",
            "active": 1
        },
        {
            "country_id": 33,
            "name": "Brunei",
            "dialing_code": "673",
            "active": 1
        },
        {
            "country_id": 34,
            "name": "Bulgaria",
            "dialing_code": "359",
            "active": 1
        },
        {
            "country_id": 35,
            "name": "Burkina Faso",
            "dialing_code": "226",
            "active": 1
        },
        {
            "country_id": 36,
            "name": "Burundi",
            "dialing_code": "257",
            "active": 1
        },
        {
            "country_id": 37,
            "name": "Cambodia",
            "dialing_code": "855",
            "active": 1
        },
        {
            "country_id": 38,
            "name": "Cameroon",
            "dialing_code": "237",
            "active": 1
        },
        {
            "country_id": 39,
            "name": "Canada",
            "dialing_code": "1",
            "active": 1
        },
        {
            "country_id": 40,
            "name": "Cape Verde",
            "dialing_code": "238",
            "active": 1
        },
        {
            "country_id": 41,
            "name": "Cayman Islands",
            "dialing_code": "+1-345",
            "active": 1
        },
        {
            "country_id": 42,
            "name": "Central African Republic",
            "dialing_code": "236",
            "active": 1
        },
        {
            "country_id": 43,
            "name": "Chad",
            "dialing_code": "235",
            "active": 1
        },
        {
            "country_id": 44,
            "name": "Chile",
            "dialing_code": "56",
            "active": 1
        },
        {
            "country_id": 45,
            "name": "China",
            "dialing_code": "86",
            "active": 1
        },
        {
            "country_id": 46,
            "name": "Christmas Island",
            "dialing_code": "61",
            "active": 1
        },
        {
            "country_id": 47,
            "name": "Cocos (Keeling) Islands",
            "dialing_code": "61",
            "active": 1
        },
        {
            "country_id": 48,
            "name": "Colombia",
            "dialing_code": "57",
            "active": 1
        },
        {
            "country_id": 49,
            "name": "Comoros",
            "dialing_code": "269",
            "active": 1
        },
        {
            "country_id": 50,
            "name": "Congo",
            "dialing_code": "242",
            "active": 1
        },
        {
            "country_id": 51,
            "name": "Congo The Democratic Republic Of The",
            "dialing_code": "243",
            "active": 1
        },
        {
            "country_id": 52,
            "name": "Cook Islands",
            "dialing_code": "682",
            "active": 1
        },
        {
            "country_id": 53,
            "name": "Costa Rica",
            "dialing_code": "506",
            "active": 1
        },
        {
            "country_id": 54,
            "name": "Cote D'Ivoire (Ivory Coast)",
            "dialing_code": "225",
            "active": 1
        },
        {
            "country_id": 55,
            "name": "Croatia (Hrvatska)",
            "dialing_code": "385",
            "active": 1
        },
        {
            "country_id": 56,
            "name": "Cuba",
            "dialing_code": "53",
            "active": 1
        },
        {
            "country_id": 57,
            "name": "Cyprus",
            "dialing_code": "357",
            "active": 1
        },
        {
            "country_id": 58,
            "name": "Czech Republic",
            "dialing_code": "420",
            "active": 1
        },
        {
            "country_id": 59,
            "name": "Denmark",
            "dialing_code": "45",
            "active": 1
        },
        {
            "country_id": 60,
            "name": "Djibouti",
            "dialing_code": "253",
            "active": 1
        },
        {
            "country_id": 61,
            "name": "Dominica",
            "dialing_code": "+1-767",
            "active": 1
        },
        {
            "country_id": 62,
            "name": "Dominican Republic",
            "dialing_code": "+1-809 and 1-829",
            "active": 1
        },
        {
            "country_id": 63,
            "name": "East Timor",
            "dialing_code": "670",
            "active": 1
        },
        {
            "country_id": 64,
            "name": "Ecuador",
            "dialing_code": "593",
            "active": 1
        },
        {
            "country_id": 65,
            "name": "Egypt",
            "dialing_code": "20",
            "active": 1
        },
        {
            "country_id": 66,
            "name": "El Salvador",
            "dialing_code": "503",
            "active": 1
        },
        {
            "country_id": 67,
            "name": "Equatorial Guinea",
            "dialing_code": "240",
            "active": 1
        },
        {
            "country_id": 68,
            "name": "Eritrea",
            "dialing_code": "291",
            "active": 1
        },
        {
            "country_id": 69,
            "name": "Estonia",
            "dialing_code": "372",
            "active": 1
        },
        {
            "country_id": 70,
            "name": "Ethiopia",
            "dialing_code": "251",
            "active": 1
        },
        {
            "country_id": 71,
            "name": "Falkland Islands",
            "dialing_code": "500",
            "active": 1
        },
        {
            "country_id": 72,
            "name": "Faroe Islands",
            "dialing_code": "298",
            "active": 1
        },
        {
            "country_id": 73,
            "name": "Fiji Islands",
            "dialing_code": "679",
            "active": 1
        },
        {
            "country_id": 74,
            "name": "Finland",
            "dialing_code": "358",
            "active": 1
        },
        {
            "country_id": 75,
            "name": "France",
            "dialing_code": "33",
            "active": 1
        },
        {
            "country_id": 76,
            "name": "French Guiana",
            "dialing_code": "594",
            "active": 1
        },
        {
            "country_id": 77,
            "name": "French Polynesia",
            "dialing_code": "689",
            "active": 1
        },
        {
            "country_id": 78,
            "name": "French Southern Territories",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 79,
            "name": "Gabon",
            "dialing_code": "241",
            "active": 1
        },
        {
            "country_id": 80,
            "name": "Gambia The",
            "dialing_code": "220",
            "active": 1
        },
        {
            "country_id": 81,
            "name": "Georgia",
            "dialing_code": "995",
            "active": 1
        },
        {
            "country_id": 82,
            "name": "Germany",
            "dialing_code": "49",
            "active": 1
        },
        {
            "country_id": 83,
            "name": "Ghana",
            "dialing_code": "233",
            "active": 1
        },
        {
            "country_id": 84,
            "name": "Gibraltar",
            "dialing_code": "350",
            "active": 1
        },
        {
            "country_id": 85,
            "name": "Greece",
            "dialing_code": "30",
            "active": 1
        },
        {
            "country_id": 86,
            "name": "Greenland",
            "dialing_code": "299",
            "active": 1
        },
        {
            "country_id": 87,
            "name": "Grenada",
            "dialing_code": "+1-473",
            "active": 1
        },
        {
            "country_id": 88,
            "name": "Guadeloupe",
            "dialing_code": "590",
            "active": 1
        },
        {
            "country_id": 89,
            "name": "Guam",
            "dialing_code": "+1-671",
            "active": 1
        },
        {
            "country_id": 90,
            "name": "Guatemala",
            "dialing_code": "502",
            "active": 1
        },
        {
            "country_id": 91,
            "name": "Guernsey and Alderney",
            "dialing_code": "+44-1481",
            "active": 1
        },
        {
            "country_id": 92,
            "name": "Guinea",
            "dialing_code": "224",
            "active": 1
        },
        {
            "country_id": 93,
            "name": "Guinea-Bissau",
            "dialing_code": "245",
            "active": 1
        },
        {
            "country_id": 94,
            "name": "Guyana",
            "dialing_code": "592",
            "active": 1
        },
        {
            "country_id": 95,
            "name": "Haiti",
            "dialing_code": "509",
            "active": 1
        },
        {
            "country_id": 96,
            "name": "Heard and McDonald Islands",
            "dialing_code": " ",
            "active": 1
        },
        {
            "country_id": 97,
            "name": "Honduras",
            "dialing_code": "504",
            "active": 1
        },
        {
            "country_id": 98,
            "name": "Hong Kong S.A.R.",
            "dialing_code": "852",
            "active": 1
        },
        {
            "country_id": 99,
            "name": "Hungary",
            "dialing_code": "36",
            "active": 1
        },
        {
            "country_id": 100,
            "name": "Iceland",
            "dialing_code": "354",
            "active": 1
        },
        {
            "country_id": 101,
            "name": "India",
            "dialing_code": "91",
            "active": 1
        },
        {
            "country_id": 102,
            "name": "Indonesia",
            "dialing_code": "62",
            "active": 1
        },
        {
            "country_id": 103,
            "name": "Iran",
            "dialing_code": "98",
            "active": 1
        },
        {
            "country_id": 104,
            "name": "Iraq",
            "dialing_code": "964",
            "active": 1
        },
        {
            "country_id": 105,
            "name": "Ireland",
            "dialing_code": "353",
            "active": 1
        },
        {
            "country_id": 106,
            "name": "Israel",
            "dialing_code": "972",
            "active": 1
        },
        {
            "country_id": 107,
            "name": "Italy",
            "dialing_code": "39",
            "active": 1
        },
        {
            "country_id": 108,
            "name": "Jamaica",
            "dialing_code": "+1-876",
            "active": 1
        },
        {
            "country_id": 109,
            "name": "Japan",
            "dialing_code": "81",
            "active": 1
        },
        {
            "country_id": 110,
            "name": "Jersey",
            "dialing_code": "+44-1534",
            "active": 1
        },
        {
            "country_id": 111,
            "name": "Jordan",
            "dialing_code": "962",
            "active": 1
        },
        {
            "country_id": 112,
            "name": "Kazakhstan",
            "dialing_code": "7",
            "active": 1
        },
        {
            "country_id": 113,
            "name": "Kenya",
            "dialing_code": "254",
            "active": 1
        },
        {
            "country_id": 114,
            "name": "Kiribati",
            "dialing_code": "686",
            "active": 1
        },
        {
            "country_id": 115,
            "name": "Korea North\n",
            "dialing_code": "850",
            "active": 1
        },
        {
            "country_id": 116,
            "name": "Korea South",
            "dialing_code": "82",
            "active": 1
        },
        {
            "country_id": 117,
            "name": "Kuwait",
            "dialing_code": "965",
            "active": 1
        },
        {
            "country_id": 118,
            "name": "Kyrgyzstan",
            "dialing_code": "996",
            "active": 1
        },
        {
            "country_id": 119,
            "name": "Laos",
            "dialing_code": "856",
            "active": 1
        },
        {
            "country_id": 120,
            "name": "Latvia",
            "dialing_code": "371",
            "active": 1
        },
        {
            "country_id": 121,
            "name": "Lebanon",
            "dialing_code": "961",
            "active": 1
        },
        {
            "country_id": 122,
            "name": "Lesotho",
            "dialing_code": "266",
            "active": 1
        },
        {
            "country_id": 123,
            "name": "Liberia",
            "dialing_code": "231",
            "active": 1
        },
        {
            "country_id": 124,
            "name": "Libya",
            "dialing_code": "218",
            "active": 1
        },
        {
            "country_id": 125,
            "name": "Liechtenstein",
            "dialing_code": "423",
            "active": 1
        },
        {
            "country_id": 126,
            "name": "Lithuania",
            "dialing_code": "370",
            "active": 1
        },
        {
            "country_id": 127,
            "name": "Luxembourg",
            "dialing_code": "352",
            "active": 1
        },
        {
            "country_id": 128,
            "name": "Macau S.A.R.",
            "dialing_code": "853",
            "active": 1
        },
        {
            "country_id": 129,
            "name": "Macedonia",
            "dialing_code": "389",
            "active": 1
        },
        {
            "country_id": 130,
            "name": "Madagascar",
            "dialing_code": "261",
            "active": 1
        },
        {
            "country_id": 131,
            "name": "Malawi",
            "dialing_code": "265",
            "active": 1
        },
        {
            "country_id": 132,
            "name": "Malaysia",
            "dialing_code": "60",
            "active": 1
        },
        {
            "country_id": 133,
            "name": "Maldives",
            "dialing_code": "960",
            "active": 1
        },
        {
            "country_id": 134,
            "name": "Mali",
            "dialing_code": "223",
            "active": 1
        },
        {
            "country_id": 135,
            "name": "Malta",
            "dialing_code": "356",
            "active": 1
        },
        {
            "country_id": 136,
            "name": "Man (Isle of)",
            "dialing_code": "+44-1624",
            "active": 1
        },
        {
            "country_id": 137,
            "name": "Marshall Islands",
            "dialing_code": "692",
            "active": 1
        },
        {
            "country_id": 138,
            "name": "Martinique",
            "dialing_code": "596",
            "active": 1
        },
        {
            "country_id": 139,
            "name": "Mauritania",
            "dialing_code": "222",
            "active": 1
        },
        {
            "country_id": 140,
            "name": "Mauritius",
            "dialing_code": "230",
            "active": 1
        },
        {
            "country_id": 141,
            "name": "Mayotte",
            "dialing_code": "262",
            "active": 1
        },
        {
            "country_id": 142,
            "name": "Mexico",
            "dialing_code": "52",
            "active": 1
        },
        {
            "country_id": 143,
            "name": "Micronesia",
            "dialing_code": "691",
            "active": 1
        },
        {
            "country_id": 144,
            "name": "Moldova",
            "dialing_code": "373",
            "active": 1
        },
        {
            "country_id": 145,
            "name": "Monaco",
            "dialing_code": "377",
            "active": 1
        },
        {
            "country_id": 146,
            "name": "Mongolia",
            "dialing_code": "976",
            "active": 1
        },
        {
            "country_id": 147,
            "name": "Montenegro",
            "dialing_code": "382",
            "active": 1
        },
        {
            "country_id": 148,
            "name": "Montserrat",
            "dialing_code": "+1-664",
            "active": 1
        },
        {
            "country_id": 149,
            "name": "Morocco",
            "dialing_code": "212",
            "active": 1
        },
        {
            "country_id": 150,
            "name": "Mozambique",
            "dialing_code": "258",
            "active": 1
        },
        {
            "country_id": 151,
            "name": "Myanmar",
            "dialing_code": "95",
            "active": 1
        },
        {
            "country_id": 152,
            "name": "Namibia",
            "dialing_code": "264",
            "active": 1
        },
        {
            "country_id": 153,
            "name": "Nauru",
            "dialing_code": "674",
            "active": 1
        },
        {
            "country_id": 154,
            "name": "Nepal",
            "dialing_code": "977",
            "active": 1
        },
        {
            "country_id": 155,
            "name": "Netherlands Antilles",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 156,
            "name": "Netherlands The",
            "dialing_code": "31",
            "active": 1
        },
        {
            "country_id": 157,
            "name": "New Caledonia",
            "dialing_code": "687",
            "active": 1
        },
        {
            "country_id": 158,
            "name": "New Zealand",
            "dialing_code": "64",
            "active": 1
        },
        {
            "country_id": 159,
            "name": "Nicaragua",
            "dialing_code": "505",
            "active": 1
        },
        {
            "country_id": 160,
            "name": "Niger",
            "dialing_code": "227",
            "active": 1
        },
        {
            "country_id": 161,
            "name": "Nigeria",
            "dialing_code": "234",
            "active": 1
        },
        {
            "country_id": 162,
            "name": "Niue",
            "dialing_code": "683",
            "active": 1
        },
        {
            "country_id": 163,
            "name": "Norfolk Island",
            "dialing_code": "672",
            "active": 1
        },
        {
            "country_id": 164,
            "name": "Northern Mariana Islands",
            "dialing_code": "+1-670",
            "active": 1
        },
        {
            "country_id": 165,
            "name": "Norway",
            "dialing_code": "47",
            "active": 1
        },
        {
            "country_id": 166,
            "name": "Oman",
            "dialing_code": "968",
            "active": 1
        },
        {
            "country_id": 167,
            "name": "Pakistan",
            "dialing_code": "92",
            "active": 1
        },
        {
            "country_id": 168,
            "name": "Palau",
            "dialing_code": "680",
            "active": 1
        },
        {
            "country_id": 169,
            "name": "Palestinian Territory Occupied",
            "dialing_code": "970",
            "active": 1
        },
        {
            "country_id": 170,
            "name": "Panama",
            "dialing_code": "507",
            "active": 1
        },
        {
            "country_id": 171,
            "name": "Papua new Guinea",
            "dialing_code": "675",
            "active": 1
        },
        {
            "country_id": 172,
            "name": "Paraguay",
            "dialing_code": "595",
            "active": 1
        },
        {
            "country_id": 173,
            "name": "Peru",
            "dialing_code": "51",
            "active": 1
        },
        {
            "country_id": 174,
            "name": "Philippines",
            "dialing_code": "63",
            "active": 1
        },
        {
            "country_id": 175,
            "name": "Pitcairn Island",
            "dialing_code": "870",
            "active": 1
        },
        {
            "country_id": 176,
            "name": "Poland",
            "dialing_code": "48",
            "active": 1
        },
        {
            "country_id": 177,
            "name": "Portugal",
            "dialing_code": "351",
            "active": 1
        },
        {
            "country_id": 178,
            "name": "Puerto Rico",
            "dialing_code": "+1-787 and 1-939",
            "active": 1
        },
        {
            "country_id": 179,
            "name": "Qatar",
            "dialing_code": "974",
            "active": 1
        },
        {
            "country_id": 180,
            "name": "Reunion",
            "dialing_code": "262",
            "active": 1
        },
        {
            "country_id": 181,
            "name": "Romania",
            "dialing_code": "40",
            "active": 1
        },
        {
            "country_id": 182,
            "name": "Russia",
            "dialing_code": "7",
            "active": 1
        },
        {
            "country_id": 183,
            "name": "Rwanda",
            "dialing_code": "250",
            "active": 1
        },
        {
            "country_id": 184,
            "name": "Saint Helena",
            "dialing_code": "290",
            "active": 1
        },
        {
            "country_id": 185,
            "name": "Saint Kitts And Nevis",
            "dialing_code": "+1-869",
            "active": 1
        },
        {
            "country_id": 186,
            "name": "Saint Lucia",
            "dialing_code": "+1-758",
            "active": 1
        },
        {
            "country_id": 187,
            "name": "Saint Pierre and Miquelon",
            "dialing_code": "508",
            "active": 1
        },
        {
            "country_id": 188,
            "name": "Saint Vincent And The Grenadines",
            "dialing_code": "+1-784",
            "active": 1
        },
        {
            "country_id": 189,
            "name": "Saint-Barthelemy",
            "dialing_code": "590",
            "active": 1
        },
        {
            "country_id": 190,
            "name": "Saint-Martin (French part)",
            "dialing_code": "590",
            "active": 1
        },
        {
            "country_id": 191,
            "name": "Samoa",
            "dialing_code": "685",
            "active": 1
        },
        {
            "country_id": 192,
            "name": "San Marino",
            "dialing_code": "378",
            "active": 1
        },
        {
            "country_id": 193,
            "name": "Sao Tome and Principe",
            "dialing_code": "239",
            "active": 1
        },
        {
            "country_id": 194,
            "name": "Saudi Arabia",
            "dialing_code": "966",
            "active": 1
        },
        {
            "country_id": 195,
            "name": "Senegal",
            "dialing_code": "221",
            "active": 1
        },
        {
            "country_id": 196,
            "name": "Serbia",
            "dialing_code": "381",
            "active": 1
        },
        {
            "country_id": 197,
            "name": "Seychelles",
            "dialing_code": "248",
            "active": 1
        },
        {
            "country_id": 198,
            "name": "Sierra Leone",
            "dialing_code": "232",
            "active": 1
        },
        {
            "country_id": 199,
            "name": "Singapore",
            "dialing_code": "65",
            "active": 1
        },
        {
            "country_id": 200,
            "name": "Slovakia",
            "dialing_code": "421",
            "active": 1
        },
        {
            "country_id": 201,
            "name": "Slovenia",
            "dialing_code": "386",
            "active": 1
        },
        {
            "country_id": 202,
            "name": "Solomon Islands",
            "dialing_code": "677",
            "active": 1
        },
        {
            "country_id": 203,
            "name": "Somalia",
            "dialing_code": "252",
            "active": 1
        },
        {
            "country_id": 204,
            "name": "South Africa",
            "dialing_code": "27",
            "active": 1
        },
        {
            "country_id": 205,
            "name": "South Georgia",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 206,
            "name": "South Sudan",
            "dialing_code": "211",
            "active": 1
        },
        {
            "country_id": 207,
            "name": "Spain",
            "dialing_code": "34",
            "active": 1
        },
        {
            "country_id": 208,
            "name": "Sri Lanka",
            "dialing_code": "94",
            "active": 1
        },
        {
            "country_id": 209,
            "name": "Sudan",
            "dialing_code": "249",
            "active": 1
        },
        {
            "country_id": 210,
            "name": "Suriname",
            "dialing_code": "597",
            "active": 1
        },
        {
            "country_id": 211,
            "name": "Svalbard And Jan Mayen Islands",
            "dialing_code": "47",
            "active": 1
        },
        {
            "country_id": 212,
            "name": "Swaziland",
            "dialing_code": "268",
            "active": 1
        },
        {
            "country_id": 213,
            "name": "Sweden",
            "dialing_code": "46",
            "active": 1
        },
        {
            "country_id": 214,
            "name": "Switzerland",
            "dialing_code": "41",
            "active": 1
        },
        {
            "country_id": 215,
            "name": "Syria",
            "dialing_code": "963",
            "active": 1
        },
        {
            "country_id": 216,
            "name": "Taiwan",
            "dialing_code": "886",
            "active": 1
        },
        {
            "country_id": 217,
            "name": "Tajikistan",
            "dialing_code": "992",
            "active": 1
        },
        {
            "country_id": 218,
            "name": "Tanzania",
            "dialing_code": "255",
            "active": 1
        },
        {
            "country_id": 219,
            "name": "Thailand",
            "dialing_code": "66",
            "active": 1
        },
        {
            "country_id": 220,
            "name": "Togo",
            "dialing_code": "228",
            "active": 1
        },
        {
            "country_id": 221,
            "name": "Tokelau",
            "dialing_code": "690",
            "active": 1
        },
        {
            "country_id": 222,
            "name": "Tonga",
            "dialing_code": "676",
            "active": 1
        },
        {
            "country_id": 223,
            "name": "Trinidad And Tobago",
            "dialing_code": "+1-868",
            "active": 1
        },
        {
            "country_id": 224,
            "name": "Tunisia",
            "dialing_code": "216",
            "active": 1
        },
        {
            "country_id": 225,
            "name": "Turkey",
            "dialing_code": "90",
            "active": 1
        },
        {
            "country_id": 226,
            "name": "Turkmenistan",
            "dialing_code": "993",
            "active": 1
        },
        {
            "country_id": 227,
            "name": "Turks And Caicos Islands",
            "dialing_code": "+1-649",
            "active": 1
        },
        {
            "country_id": 228,
            "name": "Tuvalu",
            "dialing_code": "688",
            "active": 1
        },
        {
            "country_id": 229,
            "name": "Uganda",
            "dialing_code": "256",
            "active": 1
        },
        {
            "country_id": 230,
            "name": "Ukraine",
            "dialing_code": "380",
            "active": 1
        },
        {
            "country_id": 231,
            "name": "United Arab Emirates",
            "dialing_code": "971",
            "active": 1
        },
        {
            "country_id": 232,
            "name": "United Kingdom",
            "dialing_code": "44",
            "active": 1
        },
        {
            "country_id": 233,
            "name": "United States",
            "dialing_code": "1",
            "active": 1
        },
        {
            "country_id": 234,
            "name": "United States Minor Outlying Islands",
            "dialing_code": "1",
            "active": 1
        },
        {
            "country_id": 235,
            "name": "Uruguay",
            "dialing_code": "598",
            "active": 1
        },
        {
            "country_id": 236,
            "name": "Uzbekistan",
            "dialing_code": "998",
            "active": 1
        },
        {
            "country_id": 237,
            "name": "Vanuatu",
            "dialing_code": "678",
            "active": 1
        },
        {
            "country_id": 238,
            "name": "Vatican City State (Holy See)",
            "dialing_code": "379",
            "active": 1
        },
        {
            "country_id": 239,
            "name": "Venezuela",
            "dialing_code": "58",
            "active": 1
        },
        {
            "country_id": 240,
            "name": "Vietnam",
            "dialing_code": "84",
            "active": 1
        },
        {
            "country_id": 241,
            "name": "Virgin Islands (British)",
            "dialing_code": "+1-284",
            "active": 1
        },
        {
            "country_id": 242,
            "name": "Virgin Islands (US)",
            "dialing_code": "+1-340",
            "active": 1
        },
        {
            "country_id": 243,
            "name": "Wallis And Futuna Islands",
            "dialing_code": "681",
            "active": 1
        },
        {
            "country_id": 244,
            "name": "Western Sahara",
            "dialing_code": "212",
            "active": 1
        },
        {
            "country_id": 245,
            "name": "Yemen",
            "dialing_code": "967",
            "active": 1
        },
        {
            "country_id": 246,
            "name": "Zambia",
            "dialing_code": "260",
            "active": 1
        },
        {
            "country_id": 247,
            "name": "Zimbabwe",
            "dialing_code": "263",
            "active": 1
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-country-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-country-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-country-all"></code></pre>
</div>
<div id="execution-error-GETapi-country-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-country-all"></code></pre>
</div>
<form id="form-GETapi-country-all" data-method="GET" data-path="api/country/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-country-all', this);">
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
<h2>All Active Countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/country/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/active"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/country/active',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/country/active'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "success",
    "result": [
        {
            "country_id": 1,
            "name": "Afghanistan",
            "dialing_code": "93",
            "active": 1
        },
        {
            "country_id": 2,
            "name": "Aland Islands",
            "dialing_code": "+358-18",
            "active": 1
        },
        {
            "country_id": 3,
            "name": "Albania",
            "dialing_code": "355",
            "active": 1
        },
        {
            "country_id": 4,
            "name": "Algeria",
            "dialing_code": "213",
            "active": 1
        },
        {
            "country_id": 5,
            "name": "American Samoa",
            "dialing_code": "+1-684",
            "active": 1
        },
        {
            "country_id": 6,
            "name": "Andorra",
            "dialing_code": "376",
            "active": 1
        },
        {
            "country_id": 7,
            "name": "Angola",
            "dialing_code": "244",
            "active": 1
        },
        {
            "country_id": 8,
            "name": "Anguilla",
            "dialing_code": "+1-264",
            "active": 1
        },
        {
            "country_id": 9,
            "name": "Antarctica",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 10,
            "name": "Antigua And Barbuda",
            "dialing_code": "+1-268",
            "active": 1
        },
        {
            "country_id": 11,
            "name": "Argentina",
            "dialing_code": "54",
            "active": 1
        },
        {
            "country_id": 12,
            "name": "Armenia",
            "dialing_code": "374",
            "active": 1
        },
        {
            "country_id": 13,
            "name": "Aruba",
            "dialing_code": "297",
            "active": 1
        },
        {
            "country_id": 14,
            "name": "Australia",
            "dialing_code": "61",
            "active": 1
        },
        {
            "country_id": 15,
            "name": "Austria",
            "dialing_code": "43",
            "active": 1
        },
        {
            "country_id": 16,
            "name": "Azerbaijan",
            "dialing_code": "994",
            "active": 1
        },
        {
            "country_id": 17,
            "name": "Bahamas The",
            "dialing_code": "+1-242",
            "active": 1
        },
        {
            "country_id": 18,
            "name": "Bahrain",
            "dialing_code": "973",
            "active": 1
        },
        {
            "country_id": 19,
            "name": "Bangladesh",
            "dialing_code": "880",
            "active": 1
        },
        {
            "country_id": 20,
            "name": "Barbados",
            "dialing_code": "+1-246",
            "active": 1
        },
        {
            "country_id": 21,
            "name": "Belarus",
            "dialing_code": "375",
            "active": 1
        },
        {
            "country_id": 22,
            "name": "Belgium",
            "dialing_code": "32",
            "active": 1
        },
        {
            "country_id": 23,
            "name": "Belize",
            "dialing_code": "501",
            "active": 1
        },
        {
            "country_id": 24,
            "name": "Benin",
            "dialing_code": "229",
            "active": 1
        },
        {
            "country_id": 25,
            "name": "Bermuda",
            "dialing_code": "+1-441",
            "active": 1
        },
        {
            "country_id": 26,
            "name": "Bhutan",
            "dialing_code": "975",
            "active": 1
        },
        {
            "country_id": 27,
            "name": "Bolivia",
            "dialing_code": "591",
            "active": 1
        },
        {
            "country_id": 28,
            "name": "Bosnia and Herzegovina",
            "dialing_code": "387",
            "active": 1
        },
        {
            "country_id": 29,
            "name": "Botswana",
            "dialing_code": "267",
            "active": 1
        },
        {
            "country_id": 30,
            "name": "Bouvet Island",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 31,
            "name": "Brazil",
            "dialing_code": "55",
            "active": 1
        },
        {
            "country_id": 32,
            "name": "British Indian Ocean Territory",
            "dialing_code": "246",
            "active": 1
        },
        {
            "country_id": 33,
            "name": "Brunei",
            "dialing_code": "673",
            "active": 1
        },
        {
            "country_id": 34,
            "name": "Bulgaria",
            "dialing_code": "359",
            "active": 1
        },
        {
            "country_id": 35,
            "name": "Burkina Faso",
            "dialing_code": "226",
            "active": 1
        },
        {
            "country_id": 36,
            "name": "Burundi",
            "dialing_code": "257",
            "active": 1
        },
        {
            "country_id": 37,
            "name": "Cambodia",
            "dialing_code": "855",
            "active": 1
        },
        {
            "country_id": 38,
            "name": "Cameroon",
            "dialing_code": "237",
            "active": 1
        },
        {
            "country_id": 39,
            "name": "Canada",
            "dialing_code": "1",
            "active": 1
        },
        {
            "country_id": 40,
            "name": "Cape Verde",
            "dialing_code": "238",
            "active": 1
        },
        {
            "country_id": 41,
            "name": "Cayman Islands",
            "dialing_code": "+1-345",
            "active": 1
        },
        {
            "country_id": 42,
            "name": "Central African Republic",
            "dialing_code": "236",
            "active": 1
        },
        {
            "country_id": 43,
            "name": "Chad",
            "dialing_code": "235",
            "active": 1
        },
        {
            "country_id": 44,
            "name": "Chile",
            "dialing_code": "56",
            "active": 1
        },
        {
            "country_id": 45,
            "name": "China",
            "dialing_code": "86",
            "active": 1
        },
        {
            "country_id": 46,
            "name": "Christmas Island",
            "dialing_code": "61",
            "active": 1
        },
        {
            "country_id": 47,
            "name": "Cocos (Keeling) Islands",
            "dialing_code": "61",
            "active": 1
        },
        {
            "country_id": 48,
            "name": "Colombia",
            "dialing_code": "57",
            "active": 1
        },
        {
            "country_id": 49,
            "name": "Comoros",
            "dialing_code": "269",
            "active": 1
        },
        {
            "country_id": 50,
            "name": "Congo",
            "dialing_code": "242",
            "active": 1
        },
        {
            "country_id": 51,
            "name": "Congo The Democratic Republic Of The",
            "dialing_code": "243",
            "active": 1
        },
        {
            "country_id": 52,
            "name": "Cook Islands",
            "dialing_code": "682",
            "active": 1
        },
        {
            "country_id": 53,
            "name": "Costa Rica",
            "dialing_code": "506",
            "active": 1
        },
        {
            "country_id": 54,
            "name": "Cote D'Ivoire (Ivory Coast)",
            "dialing_code": "225",
            "active": 1
        },
        {
            "country_id": 55,
            "name": "Croatia (Hrvatska)",
            "dialing_code": "385",
            "active": 1
        },
        {
            "country_id": 56,
            "name": "Cuba",
            "dialing_code": "53",
            "active": 1
        },
        {
            "country_id": 57,
            "name": "Cyprus",
            "dialing_code": "357",
            "active": 1
        },
        {
            "country_id": 58,
            "name": "Czech Republic",
            "dialing_code": "420",
            "active": 1
        },
        {
            "country_id": 59,
            "name": "Denmark",
            "dialing_code": "45",
            "active": 1
        },
        {
            "country_id": 60,
            "name": "Djibouti",
            "dialing_code": "253",
            "active": 1
        },
        {
            "country_id": 61,
            "name": "Dominica",
            "dialing_code": "+1-767",
            "active": 1
        },
        {
            "country_id": 62,
            "name": "Dominican Republic",
            "dialing_code": "+1-809 and 1-829",
            "active": 1
        },
        {
            "country_id": 63,
            "name": "East Timor",
            "dialing_code": "670",
            "active": 1
        },
        {
            "country_id": 64,
            "name": "Ecuador",
            "dialing_code": "593",
            "active": 1
        },
        {
            "country_id": 65,
            "name": "Egypt",
            "dialing_code": "20",
            "active": 1
        },
        {
            "country_id": 66,
            "name": "El Salvador",
            "dialing_code": "503",
            "active": 1
        },
        {
            "country_id": 67,
            "name": "Equatorial Guinea",
            "dialing_code": "240",
            "active": 1
        },
        {
            "country_id": 68,
            "name": "Eritrea",
            "dialing_code": "291",
            "active": 1
        },
        {
            "country_id": 69,
            "name": "Estonia",
            "dialing_code": "372",
            "active": 1
        },
        {
            "country_id": 70,
            "name": "Ethiopia",
            "dialing_code": "251",
            "active": 1
        },
        {
            "country_id": 71,
            "name": "Falkland Islands",
            "dialing_code": "500",
            "active": 1
        },
        {
            "country_id": 72,
            "name": "Faroe Islands",
            "dialing_code": "298",
            "active": 1
        },
        {
            "country_id": 73,
            "name": "Fiji Islands",
            "dialing_code": "679",
            "active": 1
        },
        {
            "country_id": 74,
            "name": "Finland",
            "dialing_code": "358",
            "active": 1
        },
        {
            "country_id": 75,
            "name": "France",
            "dialing_code": "33",
            "active": 1
        },
        {
            "country_id": 76,
            "name": "French Guiana",
            "dialing_code": "594",
            "active": 1
        },
        {
            "country_id": 77,
            "name": "French Polynesia",
            "dialing_code": "689",
            "active": 1
        },
        {
            "country_id": 78,
            "name": "French Southern Territories",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 79,
            "name": "Gabon",
            "dialing_code": "241",
            "active": 1
        },
        {
            "country_id": 80,
            "name": "Gambia The",
            "dialing_code": "220",
            "active": 1
        },
        {
            "country_id": 81,
            "name": "Georgia",
            "dialing_code": "995",
            "active": 1
        },
        {
            "country_id": 82,
            "name": "Germany",
            "dialing_code": "49",
            "active": 1
        },
        {
            "country_id": 83,
            "name": "Ghana",
            "dialing_code": "233",
            "active": 1
        },
        {
            "country_id": 84,
            "name": "Gibraltar",
            "dialing_code": "350",
            "active": 1
        },
        {
            "country_id": 85,
            "name": "Greece",
            "dialing_code": "30",
            "active": 1
        },
        {
            "country_id": 86,
            "name": "Greenland",
            "dialing_code": "299",
            "active": 1
        },
        {
            "country_id": 87,
            "name": "Grenada",
            "dialing_code": "+1-473",
            "active": 1
        },
        {
            "country_id": 88,
            "name": "Guadeloupe",
            "dialing_code": "590",
            "active": 1
        },
        {
            "country_id": 89,
            "name": "Guam",
            "dialing_code": "+1-671",
            "active": 1
        },
        {
            "country_id": 90,
            "name": "Guatemala",
            "dialing_code": "502",
            "active": 1
        },
        {
            "country_id": 91,
            "name": "Guernsey and Alderney",
            "dialing_code": "+44-1481",
            "active": 1
        },
        {
            "country_id": 92,
            "name": "Guinea",
            "dialing_code": "224",
            "active": 1
        },
        {
            "country_id": 93,
            "name": "Guinea-Bissau",
            "dialing_code": "245",
            "active": 1
        },
        {
            "country_id": 94,
            "name": "Guyana",
            "dialing_code": "592",
            "active": 1
        },
        {
            "country_id": 95,
            "name": "Haiti",
            "dialing_code": "509",
            "active": 1
        },
        {
            "country_id": 96,
            "name": "Heard and McDonald Islands",
            "dialing_code": " ",
            "active": 1
        },
        {
            "country_id": 97,
            "name": "Honduras",
            "dialing_code": "504",
            "active": 1
        },
        {
            "country_id": 98,
            "name": "Hong Kong S.A.R.",
            "dialing_code": "852",
            "active": 1
        },
        {
            "country_id": 99,
            "name": "Hungary",
            "dialing_code": "36",
            "active": 1
        },
        {
            "country_id": 100,
            "name": "Iceland",
            "dialing_code": "354",
            "active": 1
        },
        {
            "country_id": 101,
            "name": "India",
            "dialing_code": "91",
            "active": 1
        },
        {
            "country_id": 102,
            "name": "Indonesia",
            "dialing_code": "62",
            "active": 1
        },
        {
            "country_id": 103,
            "name": "Iran",
            "dialing_code": "98",
            "active": 1
        },
        {
            "country_id": 104,
            "name": "Iraq",
            "dialing_code": "964",
            "active": 1
        },
        {
            "country_id": 105,
            "name": "Ireland",
            "dialing_code": "353",
            "active": 1
        },
        {
            "country_id": 106,
            "name": "Israel",
            "dialing_code": "972",
            "active": 1
        },
        {
            "country_id": 107,
            "name": "Italy",
            "dialing_code": "39",
            "active": 1
        },
        {
            "country_id": 108,
            "name": "Jamaica",
            "dialing_code": "+1-876",
            "active": 1
        },
        {
            "country_id": 109,
            "name": "Japan",
            "dialing_code": "81",
            "active": 1
        },
        {
            "country_id": 110,
            "name": "Jersey",
            "dialing_code": "+44-1534",
            "active": 1
        },
        {
            "country_id": 111,
            "name": "Jordan",
            "dialing_code": "962",
            "active": 1
        },
        {
            "country_id": 112,
            "name": "Kazakhstan",
            "dialing_code": "7",
            "active": 1
        },
        {
            "country_id": 113,
            "name": "Kenya",
            "dialing_code": "254",
            "active": 1
        },
        {
            "country_id": 114,
            "name": "Kiribati",
            "dialing_code": "686",
            "active": 1
        },
        {
            "country_id": 115,
            "name": "Korea North\n",
            "dialing_code": "850",
            "active": 1
        },
        {
            "country_id": 116,
            "name": "Korea South",
            "dialing_code": "82",
            "active": 1
        },
        {
            "country_id": 117,
            "name": "Kuwait",
            "dialing_code": "965",
            "active": 1
        },
        {
            "country_id": 118,
            "name": "Kyrgyzstan",
            "dialing_code": "996",
            "active": 1
        },
        {
            "country_id": 119,
            "name": "Laos",
            "dialing_code": "856",
            "active": 1
        },
        {
            "country_id": 120,
            "name": "Latvia",
            "dialing_code": "371",
            "active": 1
        },
        {
            "country_id": 121,
            "name": "Lebanon",
            "dialing_code": "961",
            "active": 1
        },
        {
            "country_id": 122,
            "name": "Lesotho",
            "dialing_code": "266",
            "active": 1
        },
        {
            "country_id": 123,
            "name": "Liberia",
            "dialing_code": "231",
            "active": 1
        },
        {
            "country_id": 124,
            "name": "Libya",
            "dialing_code": "218",
            "active": 1
        },
        {
            "country_id": 125,
            "name": "Liechtenstein",
            "dialing_code": "423",
            "active": 1
        },
        {
            "country_id": 126,
            "name": "Lithuania",
            "dialing_code": "370",
            "active": 1
        },
        {
            "country_id": 127,
            "name": "Luxembourg",
            "dialing_code": "352",
            "active": 1
        },
        {
            "country_id": 128,
            "name": "Macau S.A.R.",
            "dialing_code": "853",
            "active": 1
        },
        {
            "country_id": 129,
            "name": "Macedonia",
            "dialing_code": "389",
            "active": 1
        },
        {
            "country_id": 130,
            "name": "Madagascar",
            "dialing_code": "261",
            "active": 1
        },
        {
            "country_id": 131,
            "name": "Malawi",
            "dialing_code": "265",
            "active": 1
        },
        {
            "country_id": 132,
            "name": "Malaysia",
            "dialing_code": "60",
            "active": 1
        },
        {
            "country_id": 133,
            "name": "Maldives",
            "dialing_code": "960",
            "active": 1
        },
        {
            "country_id": 134,
            "name": "Mali",
            "dialing_code": "223",
            "active": 1
        },
        {
            "country_id": 135,
            "name": "Malta",
            "dialing_code": "356",
            "active": 1
        },
        {
            "country_id": 136,
            "name": "Man (Isle of)",
            "dialing_code": "+44-1624",
            "active": 1
        },
        {
            "country_id": 137,
            "name": "Marshall Islands",
            "dialing_code": "692",
            "active": 1
        },
        {
            "country_id": 138,
            "name": "Martinique",
            "dialing_code": "596",
            "active": 1
        },
        {
            "country_id": 139,
            "name": "Mauritania",
            "dialing_code": "222",
            "active": 1
        },
        {
            "country_id": 140,
            "name": "Mauritius",
            "dialing_code": "230",
            "active": 1
        },
        {
            "country_id": 141,
            "name": "Mayotte",
            "dialing_code": "262",
            "active": 1
        },
        {
            "country_id": 142,
            "name": "Mexico",
            "dialing_code": "52",
            "active": 1
        },
        {
            "country_id": 143,
            "name": "Micronesia",
            "dialing_code": "691",
            "active": 1
        },
        {
            "country_id": 144,
            "name": "Moldova",
            "dialing_code": "373",
            "active": 1
        },
        {
            "country_id": 145,
            "name": "Monaco",
            "dialing_code": "377",
            "active": 1
        },
        {
            "country_id": 146,
            "name": "Mongolia",
            "dialing_code": "976",
            "active": 1
        },
        {
            "country_id": 147,
            "name": "Montenegro",
            "dialing_code": "382",
            "active": 1
        },
        {
            "country_id": 148,
            "name": "Montserrat",
            "dialing_code": "+1-664",
            "active": 1
        },
        {
            "country_id": 149,
            "name": "Morocco",
            "dialing_code": "212",
            "active": 1
        },
        {
            "country_id": 150,
            "name": "Mozambique",
            "dialing_code": "258",
            "active": 1
        },
        {
            "country_id": 151,
            "name": "Myanmar",
            "dialing_code": "95",
            "active": 1
        },
        {
            "country_id": 152,
            "name": "Namibia",
            "dialing_code": "264",
            "active": 1
        },
        {
            "country_id": 153,
            "name": "Nauru",
            "dialing_code": "674",
            "active": 1
        },
        {
            "country_id": 154,
            "name": "Nepal",
            "dialing_code": "977",
            "active": 1
        },
        {
            "country_id": 155,
            "name": "Netherlands Antilles",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 156,
            "name": "Netherlands The",
            "dialing_code": "31",
            "active": 1
        },
        {
            "country_id": 157,
            "name": "New Caledonia",
            "dialing_code": "687",
            "active": 1
        },
        {
            "country_id": 158,
            "name": "New Zealand",
            "dialing_code": "64",
            "active": 1
        },
        {
            "country_id": 159,
            "name": "Nicaragua",
            "dialing_code": "505",
            "active": 1
        },
        {
            "country_id": 160,
            "name": "Niger",
            "dialing_code": "227",
            "active": 1
        },
        {
            "country_id": 161,
            "name": "Nigeria",
            "dialing_code": "234",
            "active": 1
        },
        {
            "country_id": 162,
            "name": "Niue",
            "dialing_code": "683",
            "active": 1
        },
        {
            "country_id": 163,
            "name": "Norfolk Island",
            "dialing_code": "672",
            "active": 1
        },
        {
            "country_id": 164,
            "name": "Northern Mariana Islands",
            "dialing_code": "+1-670",
            "active": 1
        },
        {
            "country_id": 165,
            "name": "Norway",
            "dialing_code": "47",
            "active": 1
        },
        {
            "country_id": 166,
            "name": "Oman",
            "dialing_code": "968",
            "active": 1
        },
        {
            "country_id": 167,
            "name": "Pakistan",
            "dialing_code": "92",
            "active": 1
        },
        {
            "country_id": 168,
            "name": "Palau",
            "dialing_code": "680",
            "active": 1
        },
        {
            "country_id": 169,
            "name": "Palestinian Territory Occupied",
            "dialing_code": "970",
            "active": 1
        },
        {
            "country_id": 170,
            "name": "Panama",
            "dialing_code": "507",
            "active": 1
        },
        {
            "country_id": 171,
            "name": "Papua new Guinea",
            "dialing_code": "675",
            "active": 1
        },
        {
            "country_id": 172,
            "name": "Paraguay",
            "dialing_code": "595",
            "active": 1
        },
        {
            "country_id": 173,
            "name": "Peru",
            "dialing_code": "51",
            "active": 1
        },
        {
            "country_id": 174,
            "name": "Philippines",
            "dialing_code": "63",
            "active": 1
        },
        {
            "country_id": 175,
            "name": "Pitcairn Island",
            "dialing_code": "870",
            "active": 1
        },
        {
            "country_id": 176,
            "name": "Poland",
            "dialing_code": "48",
            "active": 1
        },
        {
            "country_id": 177,
            "name": "Portugal",
            "dialing_code": "351",
            "active": 1
        },
        {
            "country_id": 178,
            "name": "Puerto Rico",
            "dialing_code": "+1-787 and 1-939",
            "active": 1
        },
        {
            "country_id": 179,
            "name": "Qatar",
            "dialing_code": "974",
            "active": 1
        },
        {
            "country_id": 180,
            "name": "Reunion",
            "dialing_code": "262",
            "active": 1
        },
        {
            "country_id": 181,
            "name": "Romania",
            "dialing_code": "40",
            "active": 1
        },
        {
            "country_id": 182,
            "name": "Russia",
            "dialing_code": "7",
            "active": 1
        },
        {
            "country_id": 183,
            "name": "Rwanda",
            "dialing_code": "250",
            "active": 1
        },
        {
            "country_id": 184,
            "name": "Saint Helena",
            "dialing_code": "290",
            "active": 1
        },
        {
            "country_id": 185,
            "name": "Saint Kitts And Nevis",
            "dialing_code": "+1-869",
            "active": 1
        },
        {
            "country_id": 186,
            "name": "Saint Lucia",
            "dialing_code": "+1-758",
            "active": 1
        },
        {
            "country_id": 187,
            "name": "Saint Pierre and Miquelon",
            "dialing_code": "508",
            "active": 1
        },
        {
            "country_id": 188,
            "name": "Saint Vincent And The Grenadines",
            "dialing_code": "+1-784",
            "active": 1
        },
        {
            "country_id": 189,
            "name": "Saint-Barthelemy",
            "dialing_code": "590",
            "active": 1
        },
        {
            "country_id": 190,
            "name": "Saint-Martin (French part)",
            "dialing_code": "590",
            "active": 1
        },
        {
            "country_id": 191,
            "name": "Samoa",
            "dialing_code": "685",
            "active": 1
        },
        {
            "country_id": 192,
            "name": "San Marino",
            "dialing_code": "378",
            "active": 1
        },
        {
            "country_id": 193,
            "name": "Sao Tome and Principe",
            "dialing_code": "239",
            "active": 1
        },
        {
            "country_id": 194,
            "name": "Saudi Arabia",
            "dialing_code": "966",
            "active": 1
        },
        {
            "country_id": 195,
            "name": "Senegal",
            "dialing_code": "221",
            "active": 1
        },
        {
            "country_id": 196,
            "name": "Serbia",
            "dialing_code": "381",
            "active": 1
        },
        {
            "country_id": 197,
            "name": "Seychelles",
            "dialing_code": "248",
            "active": 1
        },
        {
            "country_id": 198,
            "name": "Sierra Leone",
            "dialing_code": "232",
            "active": 1
        },
        {
            "country_id": 199,
            "name": "Singapore",
            "dialing_code": "65",
            "active": 1
        },
        {
            "country_id": 200,
            "name": "Slovakia",
            "dialing_code": "421",
            "active": 1
        },
        {
            "country_id": 201,
            "name": "Slovenia",
            "dialing_code": "386",
            "active": 1
        },
        {
            "country_id": 202,
            "name": "Solomon Islands",
            "dialing_code": "677",
            "active": 1
        },
        {
            "country_id": 203,
            "name": "Somalia",
            "dialing_code": "252",
            "active": 1
        },
        {
            "country_id": 204,
            "name": "South Africa",
            "dialing_code": "27",
            "active": 1
        },
        {
            "country_id": 205,
            "name": "South Georgia",
            "dialing_code": "",
            "active": 1
        },
        {
            "country_id": 206,
            "name": "South Sudan",
            "dialing_code": "211",
            "active": 1
        },
        {
            "country_id": 207,
            "name": "Spain",
            "dialing_code": "34",
            "active": 1
        },
        {
            "country_id": 208,
            "name": "Sri Lanka",
            "dialing_code": "94",
            "active": 1
        },
        {
            "country_id": 209,
            "name": "Sudan",
            "dialing_code": "249",
            "active": 1
        },
        {
            "country_id": 210,
            "name": "Suriname",
            "dialing_code": "597",
            "active": 1
        },
        {
            "country_id": 211,
            "name": "Svalbard And Jan Mayen Islands",
            "dialing_code": "47",
            "active": 1
        },
        {
            "country_id": 212,
            "name": "Swaziland",
            "dialing_code": "268",
            "active": 1
        },
        {
            "country_id": 213,
            "name": "Sweden",
            "dialing_code": "46",
            "active": 1
        },
        {
            "country_id": 214,
            "name": "Switzerland",
            "dialing_code": "41",
            "active": 1
        },
        {
            "country_id": 215,
            "name": "Syria",
            "dialing_code": "963",
            "active": 1
        },
        {
            "country_id": 216,
            "name": "Taiwan",
            "dialing_code": "886",
            "active": 1
        },
        {
            "country_id": 217,
            "name": "Tajikistan",
            "dialing_code": "992",
            "active": 1
        },
        {
            "country_id": 218,
            "name": "Tanzania",
            "dialing_code": "255",
            "active": 1
        },
        {
            "country_id": 219,
            "name": "Thailand",
            "dialing_code": "66",
            "active": 1
        },
        {
            "country_id": 220,
            "name": "Togo",
            "dialing_code": "228",
            "active": 1
        },
        {
            "country_id": 221,
            "name": "Tokelau",
            "dialing_code": "690",
            "active": 1
        },
        {
            "country_id": 222,
            "name": "Tonga",
            "dialing_code": "676",
            "active": 1
        },
        {
            "country_id": 223,
            "name": "Trinidad And Tobago",
            "dialing_code": "+1-868",
            "active": 1
        },
        {
            "country_id": 224,
            "name": "Tunisia",
            "dialing_code": "216",
            "active": 1
        },
        {
            "country_id": 225,
            "name": "Turkey",
            "dialing_code": "90",
            "active": 1
        },
        {
            "country_id": 226,
            "name": "Turkmenistan",
            "dialing_code": "993",
            "active": 1
        },
        {
            "country_id": 227,
            "name": "Turks And Caicos Islands",
            "dialing_code": "+1-649",
            "active": 1
        },
        {
            "country_id": 228,
            "name": "Tuvalu",
            "dialing_code": "688",
            "active": 1
        },
        {
            "country_id": 229,
            "name": "Uganda",
            "dialing_code": "256",
            "active": 1
        },
        {
            "country_id": 230,
            "name": "Ukraine",
            "dialing_code": "380",
            "active": 1
        },
        {
            "country_id": 231,
            "name": "United Arab Emirates",
            "dialing_code": "971",
            "active": 1
        },
        {
            "country_id": 232,
            "name": "United Kingdom",
            "dialing_code": "44",
            "active": 1
        },
        {
            "country_id": 233,
            "name": "United States",
            "dialing_code": "1",
            "active": 1
        },
        {
            "country_id": 234,
            "name": "United States Minor Outlying Islands",
            "dialing_code": "1",
            "active": 1
        },
        {
            "country_id": 235,
            "name": "Uruguay",
            "dialing_code": "598",
            "active": 1
        },
        {
            "country_id": 236,
            "name": "Uzbekistan",
            "dialing_code": "998",
            "active": 1
        },
        {
            "country_id": 237,
            "name": "Vanuatu",
            "dialing_code": "678",
            "active": 1
        },
        {
            "country_id": 238,
            "name": "Vatican City State (Holy See)",
            "dialing_code": "379",
            "active": 1
        },
        {
            "country_id": 239,
            "name": "Venezuela",
            "dialing_code": "58",
            "active": 1
        },
        {
            "country_id": 240,
            "name": "Vietnam",
            "dialing_code": "84",
            "active": 1
        },
        {
            "country_id": 241,
            "name": "Virgin Islands (British)",
            "dialing_code": "+1-284",
            "active": 1
        },
        {
            "country_id": 242,
            "name": "Virgin Islands (US)",
            "dialing_code": "+1-340",
            "active": 1
        },
        {
            "country_id": 243,
            "name": "Wallis And Futuna Islands",
            "dialing_code": "681",
            "active": 1
        },
        {
            "country_id": 244,
            "name": "Western Sahara",
            "dialing_code": "212",
            "active": 1
        },
        {
            "country_id": 245,
            "name": "Yemen",
            "dialing_code": "967",
            "active": 1
        },
        {
            "country_id": 246,
            "name": "Zambia",
            "dialing_code": "260",
            "active": 1
        },
        {
            "country_id": 247,
            "name": "Zimbabwe",
            "dialing_code": "263",
            "active": 1
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-country-active" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-country-active"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-country-active"></code></pre>
</div>
<div id="execution-error-GETapi-country-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-country-active"></code></pre>
</div>
<form id="form-GETapi-country-active" data-method="GET" data-path="api/country/active" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-country-active', this);">
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
<h2>Activate or deactivate country</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/country/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":19}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 19
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/country/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'country_id' =&gt; 19,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/country/update'
payload = {
    "country_id": 19
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre>
<div id="execution-results-PUTapi-country-update" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-country-update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-country-update"></code></pre>
</div>
<div id="execution-error-PUTapi-country-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-country-update"></code></pre>
</div>
<form id="form-PUTapi-country-update" data-method="PUT" data-path="api/country/update" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-country-update', this);">
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

</form><h1>Offices</h1>
<p>APIs for managing offices</p>
<h2>All offices</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/office/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/office/all',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/office/all'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "success",
    "result": [
        {
            "id": 2,
            "country_id": 100,
            "country": "Iceland",
            "name": "nemo",
            "member_count": 0,
            "active": 0,
            "created_at": "2021-06-09"
        },
        {
            "id": 1,
            "country_id": 2,
            "country": "Aland Islands",
            "name": "Tutu",
            "member_count": 0,
            "active": 1,
            "created_at": "2021-06-09"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-office-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-office-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-office-all"></code></pre>
</div>
<div id="execution-error-GETapi-office-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-office-all"></code></pre>
</div>
<form id="form-GETapi-office-all" data-method="GET" data-path="api/office/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-office-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-office-all" onclick="tryItOut('GETapi-office-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-office-all" onclick="cancelTryOut('GETapi-office-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-office-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/office/all</code></b>
</p>
</form>
<h2>create office</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/office/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":11,"name":"dolor"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 11,
    "name": "dolor"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/office/create',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'country_id' =&gt; 11,
            'name' =&gt; 'dolor',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/office/create'
payload = {
    "country_id": 11,
    "name": "dolor"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<div id="execution-results-POSTapi-office-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-office-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-office-create"></code></pre>
</div>
<div id="execution-error-POSTapi-office-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-office-create"></code></pre>
</div>
<form id="form-POSTapi-office-create" data-method="POST" data-path="api/office/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-office-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-office-create" onclick="tryItOut('POSTapi-office-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-office-create" onclick="cancelTryOut('POSTapi-office-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-office-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/office/create</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="country_id" data-endpoint="POSTapi-office-create" data-component="body"  hidden>
<br>
County ID .
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-office-create" data-component="body" required  hidden>
<br>
Office Name .
</p>

</form>
<h2>update office</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/office/update/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":1,"name":"quae","active":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/update/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 1,
    "name": "quae",
    "active": 1
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/office/update/1',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'country_id' =&gt; 1,
            'name' =&gt; 'quae',
            'active' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/office/update/1'
payload = {
    "country_id": 1,
    "name": "quae",
    "active": 1
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre>
<div id="execution-results-PUTapi-office-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-office-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-office-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-office-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-office-update--id-"></code></pre>
</div>
<form id="form-PUTapi-office-update--id-" data-method="PUT" data-path="api/office/update/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-office-update--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-office-update--id-" onclick="tryItOut('PUTapi-office-update--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-office-update--id-" onclick="cancelTryOut('PUTapi-office-update--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-office-update--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/office/update/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-office-update--id-" data-component="url" required  hidden>
<br>
The ID of the office.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="country_id" data-endpoint="PUTapi-office-update--id-" data-component="body"  hidden>
<br>
County ID .
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-office-update--id-" data-component="body" required  hidden>
<br>
Office Name .
</p>
<p>
<b><code>active</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="active" data-endpoint="PUTapi-office-update--id-" data-component="body"  hidden>
<br>
Active Status .
</p>

</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="php">php</a>
                                    <a href="#" data-language-name="python">python</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript","php","python"];
        setupLanguages(languages);
    });
</script>
</body>
</html>