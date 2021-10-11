# Clients
APIs for clients

## List|Filter|Search|Paginate|Sort Clients

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/clients/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"eveniet","phone":17,"country":20,"filter":"error","channel":20,"status":11,"client_type":"beatae","pagination_items":5,"records_per_page":3}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/all"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "eveniet",
    "phone": 17,
    "country": 20,
    "filter": "error",
    "channel": 20,
    "status": 11,
    "client_type": "beatae",
    "pagination_items": 5,
    "records_per_page": 3
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/clients/all',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'eveniet',
            'phone' => 17,
            'country' => 20,
            'filter' => 'error',
            'channel' => 20,
            'status' => 11,
            'client_type' => 'beatae',
            'pagination_items' => 5,
            'records_per_page' => 3,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-clients-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-clients-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-clients-all"></code></pre>
</div>
<div id="execution-error-GETapi-clients-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-clients-all"></code></pre>
</div>
<form id="form-GETapi-clients-all" data-method="GET" data-path="api/clients/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-clients-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-clients-all" onclick="tryItOut('GETapi-clients-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-clients-all" onclick="cancelTryOut('GETapi-clients-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-clients-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/clients/all</code></b>
</p>
<p>
<label id="auth-GETapi-clients-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-clients-all" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. Search by name
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="phone" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. Search by phone
</p>
<p>
<b><code>country</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="country" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. Search by country_id
</p>
<p>
<b><code>filter</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="filter" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. i.e filter by status,channel,screening,therapy
</p>
<p>
<b><code>channel</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="channel" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. search by channel id
</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="status" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. search by status_id
</p>
<p>
<b><code>client_type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="client_type" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. filter by either screening or therapy
</p>
<p>
<b><code>pagination_items</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="pagination_items" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. specify number of records per page
</p>
<p>
<b><code>records_per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="records_per_page" data-endpoint="GETapi-clients-all" data-component="body"  hidden>
<br>
. specify the number of records to pull from database
</p>

</form>


## Create Client

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/clients/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"ut","gender":"quia","phone_number":3,"country_id":11,"region":"et","city":"vel","timezone_id":14,"languages":"et","age":7,"status_id":15,"channel_id":9}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "ut",
    "gender": "quia",
    "phone_number": 3,
    "country_id": 11,
    "region": "et",
    "city": "vel",
    "timezone_id": 14,
    "languages": "et",
    "age": 7,
    "status_id": 15,
    "channel_id": 9
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
    'http://localhost:8000/api/clients/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'ut',
            'gender' => 'quia',
            'phone_number' => 3,
            'country_id' => 11,
            'region' => 'et',
            'city' => 'vel',
            'timezone_id' => 14,
            'languages' => 'et',
            'age' => 7,
            'status_id' => 15,
            'channel_id' => 9,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-clients-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-clients-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-clients-create"></code></pre>
</div>
<div id="execution-error-POSTapi-clients-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-clients-create"></code></pre>
</div>
<form id="form-POSTapi-clients-create" data-method="POST" data-path="api/clients/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-clients-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-clients-create" onclick="tryItOut('POSTapi-clients-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-clients-create" onclick="cancelTryOut('POSTapi-clients-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-clients-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/clients/create</code></b>
</p>
<p>
<label id="auth-POSTapi-clients-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-clients-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Name
</p>
<p>
<b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="gender" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Gender
</p>
<p>
<b><code>phone_number</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="phone_number" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Phone Number
</p>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country_id" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Country . Example 1
</p>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="region" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Region
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's City
</p>
<p>
<b><code>timezone_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="timezone_id" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's TimeZone . Example 1
</p>
<p>
<b><code>languages</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="languages" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Languages(comma separated)
</p>
<p>
<b><code>age</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="age" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Age
</p>
<p>
<b><code>status_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="status_id" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Status . Example 1
</p>
<p>
<b><code>channel_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="channel_id" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Client's Channel . Example 1
</p>

</form>


## Get Client by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/clients/1/details" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/1/details"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    'http://localhost:8000/api/clients/1/details',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-clients--id--details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-clients--id--details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-clients--id--details"></code></pre>
</div>
<div id="execution-error-GETapi-clients--id--details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-clients--id--details"></code></pre>
</div>
<form id="form-GETapi-clients--id--details" data-method="GET" data-path="api/clients/{id}/details" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-clients--id--details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-clients--id--details" onclick="tryItOut('GETapi-clients--id--details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-clients--id--details" onclick="cancelTryOut('GETapi-clients--id--details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-clients--id--details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/clients/{id}/details</code></b>
</p>
<p>
<label id="auth-GETapi-clients--id--details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-clients--id--details" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-clients--id--details" data-component="url" required  hidden>
<br>
The ID of the client.
</p>
</form>


## Activate  Clients

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/clients/therapy/activate" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"users":"aut"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/therapy/activate"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "users": "aut"
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
    'http://localhost:8000/api/clients/therapy/activate',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'users' => 'aut',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-clients-therapy-activate" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-clients-therapy-activate"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-clients-therapy-activate"></code></pre>
</div>
<div id="execution-error-POSTapi-clients-therapy-activate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-clients-therapy-activate"></code></pre>
</div>
<form id="form-POSTapi-clients-therapy-activate" data-method="POST" data-path="api/clients/therapy/activate" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-clients-therapy-activate', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-clients-therapy-activate" onclick="tryItOut('POSTapi-clients-therapy-activate');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-clients-therapy-activate" onclick="cancelTryOut('POSTapi-clients-therapy-activate');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-clients-therapy-activate" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/clients/therapy/activate</code></b>
</p>
<p>
<label id="auth-POSTapi-clients-therapy-activate" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-clients-therapy-activate" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>users</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="users" data-endpoint="POSTapi-clients-therapy-activate" data-component="body"  hidden>
<br>
. The Client IDs . Example [1,2]
</p>

</form>


## Update Client Profile

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/clients/10/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"molestiae","gender":"et","phone_number":6,"country_id":10,"region":"enim","city":"fuga","timezone_id":18,"age":3}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/10/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "molestiae",
    "gender": "et",
    "phone_number": 6,
    "country_id": 10,
    "region": "enim",
    "city": "fuga",
    "timezone_id": 18,
    "age": 3
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://localhost:8000/api/clients/10/update',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'molestiae',
            'gender' => 'et',
            'phone_number' => 6,
            'country_id' => 10,
            'region' => 'enim',
            'city' => 'fuga',
            'timezone_id' => 18,
            'age' => 3,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PATCHapi-clients--id--update" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-clients--id--update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-clients--id--update"></code></pre>
</div>
<div id="execution-error-PATCHapi-clients--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-clients--id--update"></code></pre>
</div>
<form id="form-PATCHapi-clients--id--update" data-method="PATCH" data-path="api/clients/{id}/update" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-clients--id--update', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-clients--id--update" onclick="tryItOut('PATCHapi-clients--id--update');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-clients--id--update" onclick="cancelTryOut('PATCHapi-clients--id--update');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-clients--id--update" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/clients/{id}/update</code></b>
</p>
<p>
<label id="auth-PATCHapi-clients--id--update" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-clients--id--update" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PATCHapi-clients--id--update" data-component="url" required  hidden>
<br>
. The client ID . Example 1
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PATCHapi-clients--id--update" data-component="body" required  hidden>
<br>
. The Client's Name
</p>
<p>
<b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="gender" data-endpoint="PATCHapi-clients--id--update" data-component="body" required  hidden>
<br>
. The Client's Gender
</p>
<p>
<b><code>phone_number</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="phone_number" data-endpoint="PATCHapi-clients--id--update" data-component="body" required  hidden>
<br>
. Thr Client's Phone Number
</p>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country_id" data-endpoint="PATCHapi-clients--id--update" data-component="body" required  hidden>
<br>
. The Client's Country . Example 1
</p>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="region" data-endpoint="PATCHapi-clients--id--update" data-component="body" required  hidden>
<br>
. The Client's Region
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="PATCHapi-clients--id--update" data-component="body" required  hidden>
<br>
. The Client's City
</p>
<p>
<b><code>timezone_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="timezone_id" data-endpoint="PATCHapi-clients--id--update" data-component="body"  hidden>
<br>
required. The Clients' TimeZone
</p>
<p>
<b><code>age</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="age" data-endpoint="PATCHapi-clients--id--update" data-component="body"  hidden>
<br>
required. The Client's Age
</p>

</form>


## Transfer Client

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/clients/11/transfer" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"staff_id":18}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/11/transfer"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "staff_id": 18
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://localhost:8000/api/clients/11/transfer',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'staff_id' => 18,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PATCHapi-clients--id--transfer" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-clients--id--transfer"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-clients--id--transfer"></code></pre>
</div>
<div id="execution-error-PATCHapi-clients--id--transfer" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-clients--id--transfer"></code></pre>
</div>
<form id="form-PATCHapi-clients--id--transfer" data-method="PATCH" data-path="api/clients/{id}/transfer" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-clients--id--transfer', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-clients--id--transfer" onclick="tryItOut('PATCHapi-clients--id--transfer');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-clients--id--transfer" onclick="cancelTryOut('PATCHapi-clients--id--transfer');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-clients--id--transfer" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/clients/{id}/transfer</code></b>
</p>
<p>
<label id="auth-PATCHapi-clients--id--transfer" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-clients--id--transfer" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PATCHapi-clients--id--transfer" data-component="url" required  hidden>
<br>
. The Client ID . Example - 1
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>staff_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="staff_id" data-endpoint="PATCHapi-clients--id--transfer" data-component="body" required  hidden>
<br>
. The Staff ID (user in this case)
</p>

</form>


## Bulk Edit Clients

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/clients/bulk-edit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"client_id":"quam","age":17,"gender":"voluptas","region":"nihil"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/bulk-edit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "client_id": "quam",
    "age": 17,
    "gender": "voluptas",
    "region": "nihil"
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://localhost:8000/api/clients/bulk-edit',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'client_id' => 'quam',
            'age' => 17,
            'gender' => 'voluptas',
            'region' => 'nihil',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PATCHapi-clients-bulk-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-clients-bulk-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-clients-bulk-edit"></code></pre>
</div>
<div id="execution-error-PATCHapi-clients-bulk-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-clients-bulk-edit"></code></pre>
</div>
<form id="form-PATCHapi-clients-bulk-edit" data-method="PATCH" data-path="api/clients/bulk-edit" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-clients-bulk-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-clients-bulk-edit" onclick="tryItOut('PATCHapi-clients-bulk-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-clients-bulk-edit" onclick="cancelTryOut('PATCHapi-clients-bulk-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-clients-bulk-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/clients/bulk-edit</code></b>
</p>
<p>
<label id="auth-PATCHapi-clients-bulk-edit" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-clients-bulk-edit" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>client_id</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="client_id" data-endpoint="PATCHapi-clients-bulk-edit" data-component="body"  hidden>
<br>
. The Client IDs . Example (1,2)
</p>
<p>
<b><code>age</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="age" data-endpoint="PATCHapi-clients-bulk-edit" data-component="body"  hidden>
<br>
. The Clients' ages
</p>
<p>
<b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="gender" data-endpoint="PATCHapi-clients-bulk-edit" data-component="body"  hidden>
<br>
. The Clients' genders
</p>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="region" data-endpoint="PATCHapi-clients-bulk-edit" data-component="body"  hidden>
<br>
. The Clients' regions
</p>

</form>


## Get clients from other sources

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/clients/rerum/activity" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"id":11}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/rerum/activity"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "id": 11
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/clients/rerum/activity',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'id' => 11,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-clients--id--activity" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-clients--id--activity"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-clients--id--activity"></code></pre>
</div>
<div id="execution-error-GETapi-clients--id--activity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-clients--id--activity"></code></pre>
</div>
<form id="form-GETapi-clients--id--activity" data-method="GET" data-path="api/clients/{id}/activity" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-clients--id--activity', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-clients--id--activity" onclick="tryItOut('GETapi-clients--id--activity');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-clients--id--activity" onclick="cancelTryOut('GETapi-clients--id--activity');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-clients--id--activity" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/clients/{id}/activity</code></b>
</p>
<p>
<label id="auth-GETapi-clients--id--activity" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-clients--id--activity" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-clients--id--activity" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-clients--id--activity" data-component="body" required  hidden>
<br>
. The Client's id
</p>

</form>


## Add Client Notes

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/clients/7/notes/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"private":true,"notes":"voluptas"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/7/notes/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "private": true,
    "notes": "voluptas"
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
    'http://localhost:8000/api/clients/7/notes/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'private' => true,
            'notes' => 'voluptas',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-clients--id--notes-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-clients--id--notes-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-clients--id--notes-create"></code></pre>
</div>
<div id="execution-error-POSTapi-clients--id--notes-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-clients--id--notes-create"></code></pre>
</div>
<form id="form-POSTapi-clients--id--notes-create" data-method="POST" data-path="api/clients/{id}/notes/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-clients--id--notes-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-clients--id--notes-create" onclick="tryItOut('POSTapi-clients--id--notes-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-clients--id--notes-create" onclick="cancelTryOut('POSTapi-clients--id--notes-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-clients--id--notes-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/clients/{id}/notes/create</code></b>
</p>
<p>
<label id="auth-POSTapi-clients--id--notes-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-clients--id--notes-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-clients--id--notes-create" data-component="url" required  hidden>
<br>
. The Client ID
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>private</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-clients--id--notes-create" hidden><input type="radio" name="private" value="true" data-endpoint="POSTapi-clients--id--notes-create" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-clients--id--notes-create" hidden><input type="radio" name="private" value="false" data-endpoint="POSTapi-clients--id--notes-create" data-component="body" required ><code>false</code></label>
<br>
. Specify whether true or false
</p>
<p>
<b><code>notes</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="notes" data-endpoint="POSTapi-clients--id--notes-create" data-component="body" required  hidden>
<br>
. The specific notes about this client
</p>

</form>


## List Client Public Notes

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/clients/19/notes/public" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/19/notes/public"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    'http://localhost:8000/api/clients/19/notes/public',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-clients--id--notes-public" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-clients--id--notes-public"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-clients--id--notes-public"></code></pre>
</div>
<div id="execution-error-GETapi-clients--id--notes-public" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-clients--id--notes-public"></code></pre>
</div>
<form id="form-GETapi-clients--id--notes-public" data-method="GET" data-path="api/clients/{id}/notes/public" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-clients--id--notes-public', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-clients--id--notes-public" onclick="tryItOut('GETapi-clients--id--notes-public');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-clients--id--notes-public" onclick="cancelTryOut('GETapi-clients--id--notes-public');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-clients--id--notes-public" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/clients/{id}/notes/public</code></b>
</p>
<p>
<label id="auth-GETapi-clients--id--notes-public" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-clients--id--notes-public" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-clients--id--notes-public" data-component="url" required  hidden>
<br>
. The Client ID
</p>
</form>


## List Client Private Notes

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/clients/10/notes/private" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/10/notes/private"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    'http://localhost:8000/api/clients/10/notes/private',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-clients--id--notes-private" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-clients--id--notes-private"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-clients--id--notes-private"></code></pre>
</div>
<div id="execution-error-GETapi-clients--id--notes-private" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-clients--id--notes-private"></code></pre>
</div>
<form id="form-GETapi-clients--id--notes-private" data-method="GET" data-path="api/clients/{id}/notes/private" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-clients--id--notes-private', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-clients--id--notes-private" onclick="tryItOut('GETapi-clients--id--notes-private');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-clients--id--notes-private" onclick="cancelTryOut('GETapi-clients--id--notes-private');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-clients--id--notes-private" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/clients/{id}/notes/private</code></b>
</p>
<p>
<label id="auth-GETapi-clients--id--notes-private" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-clients--id--notes-private" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-clients--id--notes-private" data-component="url"  hidden>
<br>
required. The Client's ID
</p>
</form>



