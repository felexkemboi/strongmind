# Clients
APIs for clients

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
    -d '{"name":"tempore","gender":"et","phone_number":5,"country_id":14,"region":"magni","city":"quis","timezone_id":7,"languages":"velit","age":5,"status_id":9,"channel_id":9,"staff_id":3}'

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
    "name": "tempore",
    "gender": "et",
    "phone_number": 5,
    "country_id": 14,
    "region": "magni",
    "city": "quis",
    "timezone_id": 7,
    "languages": "velit",
    "age": 5,
    "status_id": 9,
    "channel_id": 9,
    "staff_id": 3
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
            'name' => 'tempore',
            'gender' => 'et',
            'phone_number' => 5,
            'country_id' => 14,
            'region' => 'magni',
            'city' => 'quis',
            'timezone_id' => 7,
            'languages' => 'velit',
            'age' => 5,
            'status_id' => 9,
            'channel_id' => 9,
            'staff_id' => 3,
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
<p>
<b><code>staff_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="staff_id" data-endpoint="POSTapi-clients-create" data-component="body" required  hidden>
<br>
. The Staff Assigned to this client . Example 1
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


## Update Client Profile

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/clients/2/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"alias","gender":"fugit","phone_number":1,"region":"adipisci","city":"molestiae","timezone_id":15,"age":19}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/clients/2/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "alias",
    "gender": "fugit",
    "phone_number": 1,
    "region": "adipisci",
    "city": "molestiae",
    "timezone_id": 15,
    "age": 19
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
    'http://localhost:8000/api/clients/2/update',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'alias',
            'gender' => 'fugit',
            'phone_number' => 1,
            'region' => 'adipisci',
            'city' => 'molestiae',
            'timezone_id' => 15,
            'age' => 19,
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



