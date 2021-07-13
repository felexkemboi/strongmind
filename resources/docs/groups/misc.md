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
    -d '{"name":"impedit"}'

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
    "name": "impedit"
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
            'name' => 'impedit',
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
    -d '{"name":"non"}'

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
    "name": "non"
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
            'name' => 'non',
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
    -d '{"name":"debitis"}'

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
    "name": "debitis"
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
            'name' => 'debitis',
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
    -d '{"name":"laboriosam"}'

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
    "name": "laboriosam"
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
            'name' => 'laboriosam',
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



