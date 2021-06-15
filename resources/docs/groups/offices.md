# Offices
APIs for managing offices

## All offices




> Example request:

```bash
curl -X GET \
    -G "https://api.strongminds.made.ke/api/office/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.strongminds.made.ke/api/office/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://api.strongminds.made.ke/api/office/all',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://api.strongminds.made.ke/api/office/all'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
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
}
```
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


## create office




> Example request:

```bash
curl -X POST \
    "https://api.strongminds.made.ke/api/office/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":15,"name":"molestiae"}'

```

```javascript
const url = new URL(
    "https://api.strongminds.made.ke/api/office/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 15,
    "name": "molestiae"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://api.strongminds.made.ke/api/office/create',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'country_id' => 15,
            'name' => 'molestiae',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://api.strongminds.made.ke/api/office/create'
payload = {
    "country_id": 15,
    "name": "molestiae"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


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


## update office




> Example request:

```bash
curl -X PUT \
    "https://api.strongminds.made.ke/api/office/update/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":18,"name":"sed","active":1}'

```

```javascript
const url = new URL(
    "https://api.strongminds.made.ke/api/office/update/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 18,
    "name": "sed",
    "active": 1
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
    'https://api.strongminds.made.ke/api/office/update/1',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'country_id' => 18,
            'name' => 'sed',
            'active' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://api.strongminds.made.ke/api/office/update/1'
payload = {
    "country_id": 18,
    "name": "sed",
    "active": 1
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```


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



