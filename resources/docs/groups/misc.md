# Misc


## All Statuses

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/status/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/status/all"
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
    'http://localhost:8000/api/status/all',
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
<div id="execution-results-GETapi-status-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-status-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-status-all"></code></pre>
</div>
<div id="execution-error-GETapi-status-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-status-all"></code></pre>
</div>
<form id="form-GETapi-status-all" data-method="GET" data-path="api/status/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-status-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-status-all" onclick="tryItOut('GETapi-status-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-status-all" onclick="cancelTryOut('GETapi-status-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-status-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/status/all</code></b>
</p>
<p>
<label id="auth-GETapi-status-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-status-all" data-component="header"></label>
</p>
</form>


## Create Status

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/status/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"molestias"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/status/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "molestias"
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
    'http://localhost:8000/api/status/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'molestias',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-status-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-status-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-status-create"></code></pre>
</div>
<div id="execution-error-POSTapi-status-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-status-create"></code></pre>
</div>
<form id="form-POSTapi-status-create" data-method="POST" data-path="api/status/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-status-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-status-create" onclick="tryItOut('POSTapi-status-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-status-create" onclick="cancelTryOut('POSTapi-status-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-status-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/status/create</code></b>
</p>
<p>
<label id="auth-POSTapi-status-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-status-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-status-create" data-component="body" required  hidden>
<br>
Status Name
</p>

</form>


## Update Status

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/status/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"est"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/status/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "est"
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
    'http://localhost:8000/api/status/update/1',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'est',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-status-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-status-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-status-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-status-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-status-update--id-"></code></pre>
</div>
<form id="form-PUTapi-status-update--id-" data-method="PUT" data-path="api/status/update/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-status-update--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-status-update--id-" onclick="tryItOut('PUTapi-status-update--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-status-update--id-" onclick="cancelTryOut('PUTapi-status-update--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-status-update--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/status/update/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-status-update--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-status-update--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-status-update--id-" data-component="url" required  hidden>
<br>
The ID of the status.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-status-update--id-" data-component="body" required  hidden>
<br>
Status Name.
</p>

</form>


## Delete Status by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/status/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/status/delete/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/status/delete/1',
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


<div id="execution-results-DELETEapi-status-delete--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-status-delete--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-status-delete--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-status-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-status-delete--id-"></code></pre>
</div>
<form id="form-DELETEapi-status-delete--id-" data-method="DELETE" data-path="api/status/delete/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-status-delete--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-status-delete--id-" onclick="tryItOut('DELETEapi-status-delete--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-status-delete--id-" onclick="cancelTryOut('DELETEapi-status-delete--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-status-delete--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/status/delete/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-status-delete--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-status-delete--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-status-delete--id-" data-component="url" required  hidden>
<br>
The ID of the status.
</p>
</form>


## All Channels

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/channels/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/channels/all"
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
    'http://localhost:8000/api/channels/all',
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
<div id="execution-results-GETapi-channels-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-channels-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-channels-all"></code></pre>
</div>
<div id="execution-error-GETapi-channels-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-channels-all"></code></pre>
</div>
<form id="form-GETapi-channels-all" data-method="GET" data-path="api/channels/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-channels-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-channels-all" onclick="tryItOut('GETapi-channels-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-channels-all" onclick="cancelTryOut('GETapi-channels-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-channels-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/channels/all</code></b>
</p>
<p>
<label id="auth-GETapi-channels-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-channels-all" data-component="header"></label>
</p>
</form>


## Create Channel

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/channels/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"vitae"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/channels/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "vitae"
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
    'http://localhost:8000/api/channels/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'vitae',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-channels-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-channels-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-channels-create"></code></pre>
</div>
<div id="execution-error-POSTapi-channels-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-channels-create"></code></pre>
</div>
<form id="form-POSTapi-channels-create" data-method="POST" data-path="api/channels/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-channels-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-channels-create" onclick="tryItOut('POSTapi-channels-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-channels-create" onclick="cancelTryOut('POSTapi-channels-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-channels-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/channels/create</code></b>
</p>
<p>
<label id="auth-POSTapi-channels-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-channels-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-channels-create" data-component="body" required  hidden>
<br>
Channel Name.Example web channel
</p>

</form>


## Update Channel

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/channels/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"ut"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/channels/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "ut"
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
    'http://localhost:8000/api/channels/update/1',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'ut',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-channels-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-channels-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-channels-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-channels-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-channels-update--id-"></code></pre>
</div>
<form id="form-PUTapi-channels-update--id-" data-method="PUT" data-path="api/channels/update/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-channels-update--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-channels-update--id-" onclick="tryItOut('PUTapi-channels-update--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-channels-update--id-" onclick="cancelTryOut('PUTapi-channels-update--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-channels-update--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/channels/update/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-channels-update--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-channels-update--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-channels-update--id-" data-component="url" required  hidden>
<br>
The ID of the channel.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-channels-update--id-" data-component="body" required  hidden>
<br>
Channel Name.
</p>

</form>


## Delete Channel by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/channels/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/channels/delete/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/channels/delete/1',
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


<div id="execution-results-DELETEapi-channels-delete--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-channels-delete--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-channels-delete--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-channels-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-channels-delete--id-"></code></pre>
</div>
<form id="form-DELETEapi-channels-delete--id-" data-method="DELETE" data-path="api/channels/delete/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-channels-delete--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-channels-delete--id-" onclick="tryItOut('DELETEapi-channels-delete--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-channels-delete--id-" onclick="cancelTryOut('DELETEapi-channels-delete--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-channels-delete--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/channels/delete/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-channels-delete--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-channels-delete--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-channels-delete--id-" data-component="url" required  hidden>
<br>
The ID of the channel.
</p>
</form>


## All Group Types

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/group-types/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/group-types/all"
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
    'http://localhost:8000/api/group-types/all',
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
<div id="execution-results-GETapi-group-types-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-group-types-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-group-types-all"></code></pre>
</div>
<div id="execution-error-GETapi-group-types-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-group-types-all"></code></pre>
</div>
<form id="form-GETapi-group-types-all" data-method="GET" data-path="api/group-types/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-group-types-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-group-types-all" onclick="tryItOut('GETapi-group-types-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-group-types-all" onclick="cancelTryOut('GETapi-group-types-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-group-types-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/group-types/all</code></b>
</p>
<p>
<label id="auth-GETapi-group-types-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-group-types-all" data-component="header"></label>
</p>
</form>


## Create Group Type

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/group-types/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"ut"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/group-types/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "ut"
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
    'http://localhost:8000/api/group-types/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'ut',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-group-types-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-group-types-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-group-types-create"></code></pre>
</div>
<div id="execution-error-POSTapi-group-types-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-group-types-create"></code></pre>
</div>
<form id="form-POSTapi-group-types-create" data-method="POST" data-path="api/group-types/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-group-types-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-group-types-create" onclick="tryItOut('POSTapi-group-types-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-group-types-create" onclick="cancelTryOut('POSTapi-group-types-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-group-types-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/group-types/create</code></b>
</p>
<p>
<label id="auth-POSTapi-group-types-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-group-types-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-group-types-create" data-component="body" required  hidden>
<br>
GroupType Name
</p>

</form>


## Update Group Type

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/group-types/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"excepturi"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/group-types/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "excepturi"
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
    'http://localhost:8000/api/group-types/update/1',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'excepturi',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-group-types-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-group-types-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-group-types-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-group-types-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-group-types-update--id-"></code></pre>
</div>
<form id="form-PUTapi-group-types-update--id-" data-method="PUT" data-path="api/group-types/update/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-group-types-update--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-group-types-update--id-" onclick="tryItOut('PUTapi-group-types-update--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-group-types-update--id-" onclick="cancelTryOut('PUTapi-group-types-update--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-group-types-update--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/group-types/update/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-group-types-update--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-group-types-update--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-group-types-update--id-" data-component="url" required  hidden>
<br>
The ID of the group type.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-group-types-update--id-" data-component="body" required  hidden>
<br>
GroupType Name.
</p>

</form>


## Delete GroupType by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/group-types/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/group-types/delete/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/group-types/delete/1',
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


<div id="execution-results-DELETEapi-group-types-delete--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-group-types-delete--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-group-types-delete--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-group-types-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-group-types-delete--id-"></code></pre>
</div>
<form id="form-DELETEapi-group-types-delete--id-" data-method="DELETE" data-path="api/group-types/delete/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-group-types-delete--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-group-types-delete--id-" onclick="tryItOut('DELETEapi-group-types-delete--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-group-types-delete--id-" onclick="cancelTryOut('DELETEapi-group-types-delete--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-group-types-delete--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/group-types/delete/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-group-types-delete--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-group-types-delete--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-group-types-delete--id-" data-component="url" required  hidden>
<br>
The ID of the GroupType.
</p>
</form>


## All Program Types

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/program-types/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/program-types/all"
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
    'http://localhost:8000/api/program-types/all',
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
<div id="execution-results-GETapi-program-types-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-program-types-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-program-types-all"></code></pre>
</div>
<div id="execution-error-GETapi-program-types-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-program-types-all"></code></pre>
</div>
<form id="form-GETapi-program-types-all" data-method="GET" data-path="api/program-types/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-program-types-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-program-types-all" onclick="tryItOut('GETapi-program-types-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-program-types-all" onclick="cancelTryOut('GETapi-program-types-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-program-types-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/program-types/all</code></b>
</p>
<p>
<label id="auth-GETapi-program-types-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-program-types-all" data-component="header"></label>
</p>
</form>


## Create Program Type

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/program-types/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"sunt"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/program-types/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "sunt"
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
    'http://localhost:8000/api/program-types/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'sunt',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-program-types-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-program-types-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-program-types-create"></code></pre>
</div>
<div id="execution-error-POSTapi-program-types-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-program-types-create"></code></pre>
</div>
<form id="form-POSTapi-program-types-create" data-method="POST" data-path="api/program-types/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-program-types-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-program-types-create" onclick="tryItOut('POSTapi-program-types-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-program-types-create" onclick="cancelTryOut('POSTapi-program-types-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-program-types-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/program-types/create</code></b>
</p>
<p>
<label id="auth-POSTapi-program-types-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-program-types-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-program-types-create" data-component="body" required  hidden>
<br>
ProgramType Name
</p>

</form>


## Update Program Type

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/program-types/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"rerum"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/program-types/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "rerum"
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
    'http://localhost:8000/api/program-types/update/1',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'rerum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-program-types-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-program-types-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-program-types-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-program-types-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-program-types-update--id-"></code></pre>
</div>
<form id="form-PUTapi-program-types-update--id-" data-method="PUT" data-path="api/program-types/update/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-program-types-update--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-program-types-update--id-" onclick="tryItOut('PUTapi-program-types-update--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-program-types-update--id-" onclick="cancelTryOut('PUTapi-program-types-update--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-program-types-update--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/program-types/update/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-program-types-update--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-program-types-update--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-program-types-update--id-" data-component="url" required  hidden>
<br>
The ID of the program type.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-program-types-update--id-" data-component="body" required  hidden>
<br>
ProgramType Name.
</p>

</form>


## Delete ProgramType by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/program-types/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/program-types/delete/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/program-types/delete/1',
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


<div id="execution-results-DELETEapi-program-types-delete--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-program-types-delete--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-program-types-delete--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-program-types-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-program-types-delete--id-"></code></pre>
</div>
<form id="form-DELETEapi-program-types-delete--id-" data-method="DELETE" data-path="api/program-types/delete/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-program-types-delete--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-program-types-delete--id-" onclick="tryItOut('DELETEapi-program-types-delete--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-program-types-delete--id-" onclick="cancelTryOut('DELETEapi-program-types-delete--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-program-types-delete--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/program-types/delete/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-program-types-delete--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-program-types-delete--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-program-types-delete--id-" data-component="url" required  hidden>
<br>
The ID of the ProgramType.
</p>
</form>



