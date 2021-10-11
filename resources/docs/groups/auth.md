# Auth
APIs for roles and permissions

## All Permissions

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/permission/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/permission/all"
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
    'http://localhost:8000/api/permission/all',
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
<div id="execution-results-GETapi-permission-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-permission-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permission-all"></code></pre>
</div>
<div id="execution-error-GETapi-permission-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permission-all"></code></pre>
</div>
<form id="form-GETapi-permission-all" data-method="GET" data-path="api/permission/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-permission-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-permission-all" onclick="tryItOut('GETapi-permission-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-permission-all" onclick="cancelTryOut('GETapi-permission-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-permission-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/permission/all</code></b>
</p>
<p>
<label id="auth-GETapi-permission-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-permission-all" data-component="header"></label>
</p>
</form>


## All Roles

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/role/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/all"
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
    'http://localhost:8000/api/role/all',
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
<div id="execution-results-GETapi-role-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-role-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-role-all"></code></pre>
</div>
<div id="execution-error-GETapi-role-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-role-all"></code></pre>
</div>
<form id="form-GETapi-role-all" data-method="GET" data-path="api/role/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-role-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-role-all" onclick="tryItOut('GETapi-role-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-role-all" onclick="cancelTryOut('GETapi-role-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-role-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/role/all</code></b>
</p>
<p>
<label id="auth-GETapi-role-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-role-all" data-component="header"></label>
</p>
</form>


## Get Role by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/role/view/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/view/1"
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
    'http://localhost:8000/api/role/view/1',
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
<div id="execution-results-GETapi-role-view--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-role-view--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-role-view--id-"></code></pre>
</div>
<div id="execution-error-GETapi-role-view--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-role-view--id-"></code></pre>
</div>
<form id="form-GETapi-role-view--id-" data-method="GET" data-path="api/role/view/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-role-view--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-role-view--id-" onclick="tryItOut('GETapi-role-view--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-role-view--id-" onclick="cancelTryOut('GETapi-role-view--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-role-view--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/role/view/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-role-view--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-role-view--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-role-view--id-" data-component="url" required  hidden>
<br>
The ID of the role.
</p>
</form>


## Create Role

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/role/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"non","role_code":"consequatur","description":"est","access_permissions":[9,6]}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "non",
    "role_code": "consequatur",
    "description": "est",
    "access_permissions": [
        9,
        6
    ]
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
    'http://localhost:8000/api/role/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'non',
            'role_code' => 'consequatur',
            'description' => 'est',
            'access_permissions' => [
                9,
                6,
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-role-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-role-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-role-create"></code></pre>
</div>
<div id="execution-error-POSTapi-role-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-role-create"></code></pre>
</div>
<form id="form-POSTapi-role-create" data-method="POST" data-path="api/role/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-role-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-role-create" onclick="tryItOut('POSTapi-role-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-role-create" onclick="cancelTryOut('POSTapi-role-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-role-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/role/create</code></b>
</p>
<p>
<label id="auth-POSTapi-role-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-role-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-role-create" data-component="body" required  hidden>
<br>
Role Name. Example admin
</p>
<p>
<b><code>role_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="role_code" data-endpoint="POSTapi-role-create" data-component="body" required  hidden>
<br>
Code. Example Administrator
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-role-create" data-component="body"  hidden>
<br>
Description. Example This is Administrator
</p>
<p>
<b><code>access_permissions</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
<input type="number" name="access_permissions.0" data-endpoint="POSTapi-role-create" data-component="body" required  hidden>
<input type="number" name="access_permissions.1" data-endpoint="POSTapi-role-create" data-component="body" hidden>
<br>
Permission IDs. Example [1,2]
</p>

</form>


## Update Role

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/role/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"qui","role_code":"voluptatem","description":"voluptatem","access_permissions":[12,19]}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "qui",
    "role_code": "voluptatem",
    "description": "voluptatem",
    "access_permissions": [
        12,
        19
    ]
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
    'http://localhost:8000/api/role/update/1',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'qui',
            'role_code' => 'voluptatem',
            'description' => 'voluptatem',
            'access_permissions' => [
                12,
                19,
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-role-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-role-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-role-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-role-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-role-update--id-"></code></pre>
</div>
<form id="form-PUTapi-role-update--id-" data-method="PUT" data-path="api/role/update/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-role-update--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-role-update--id-" onclick="tryItOut('PUTapi-role-update--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-role-update--id-" onclick="cancelTryOut('PUTapi-role-update--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-role-update--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/role/update/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-role-update--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-role-update--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-role-update--id-" data-component="url" required  hidden>
<br>
The ID of the role.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-role-update--id-" data-component="body" required  hidden>
<br>
Role Name. Example admin
</p>
<p>
<b><code>role_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="role_code" data-endpoint="PUTapi-role-update--id-" data-component="body" required  hidden>
<br>
Code. Example Administrator
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-role-update--id-" data-component="body"  hidden>
<br>
Description. Example This is Administrator
</p>
<p>
<b><code>access_permissions</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
<input type="number" name="access_permissions.0" data-endpoint="PUTapi-role-update--id-" data-component="body" required  hidden>
<input type="number" name="access_permissions.1" data-endpoint="PUTapi-role-update--id-" data-component="body" hidden>
<br>
Permission IDs. Example [1,2]
</p>

</form>


## Delete Role by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/role/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/delete/1"
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
    'http://localhost:8000/api/role/delete/1',
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


<div id="execution-results-DELETEapi-role-delete--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-role-delete--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-role-delete--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-role-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-role-delete--id-"></code></pre>
</div>
<form id="form-DELETEapi-role-delete--id-" data-method="DELETE" data-path="api/role/delete/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-role-delete--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-role-delete--id-" onclick="tryItOut('DELETEapi-role-delete--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-role-delete--id-" onclick="cancelTryOut('DELETEapi-role-delete--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-role-delete--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/role/delete/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-role-delete--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-role-delete--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-role-delete--id-" data-component="url" required  hidden>
<br>
The ID of the role.
</p>
</form>


## Login User




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"earum","password":"earum"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "email": "earum",
    "password": "earum"
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
    'http://localhost:8000/api/auth/login',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'email' => 'earum',
            'password' => 'earum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</div>
<form id="form-POSTapi-auth-login" data-method="POST" data-path="api/auth/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-login" onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-login" onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
Email Address.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
Password.
</p>

</form>


## User profile

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/auth/profile" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/profile"
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
    'http://localhost:8000/api/auth/profile',
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
<div id="execution-results-GETapi-auth-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-auth-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-profile"></code></pre>
</div>
<div id="execution-error-GETapi-auth-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-profile"></code></pre>
</div>
<form id="form-GETapi-auth-profile" data-method="GET" data-path="api/auth/profile" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-auth-profile" onclick="tryItOut('GETapi-auth-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-auth-profile" onclick="cancelTryOut('GETapi-auth-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-auth-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/auth/profile</code></b>
</p>
<p>
<label id="auth-GETapi-auth-profile" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-auth-profile" data-component="header"></label>
</p>
</form>


## Update user profile.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/auth/profile/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"magnam","email":"voluptatem","phone_number":"eum","timezone_id":2,"gender":"male","region":"East Africa","city":"Nairobi","languages":["laboriosam","voluptas"]}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/profile/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "magnam",
    "email": "voluptatem",
    "phone_number": "eum",
    "timezone_id": 2,
    "gender": "male",
    "region": "East Africa",
    "city": "Nairobi",
    "languages": [
        "laboriosam",
        "voluptas"
    ]
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
    'http://localhost:8000/api/auth/profile/update',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'magnam',
            'email' => 'voluptatem',
            'phone_number' => 'eum',
            'timezone_id' => 2,
            'gender' => 'male',
            'region' => 'East Africa',
            'city' => 'Nairobi',
            'languages' => [
                'laboriosam',
                'voluptas',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-auth-profile-update" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-auth-profile-update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-auth-profile-update"></code></pre>
</div>
<div id="execution-error-PUTapi-auth-profile-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-auth-profile-update"></code></pre>
</div>
<form id="form-PUTapi-auth-profile-update" data-method="PUT" data-path="api/auth/profile/update" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-auth-profile-update', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-auth-profile-update" onclick="tryItOut('PUTapi-auth-profile-update');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-auth-profile-update" onclick="cancelTryOut('PUTapi-auth-profile-update');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-auth-profile-update" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/auth/profile/update</code></b>
</p>
<p>
<label id="auth-PUTapi-auth-profile-update" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-auth-profile-update" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-auth-profile-update" data-component="body"  hidden>
<br>
Name
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-auth-profile-update" data-component="body" required  hidden>
<br>
Email Address
</p>
<p>
<b><code>phone_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_number" data-endpoint="PUTapi-auth-profile-update" data-component="body"  hidden>
<br>
Phone Number
</p>
<p>
<b><code>timezone_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="timezone_id" data-endpoint="PUTapi-auth-profile-update" data-component="body"  hidden>
<br>
Timezone ID.
</p>
<p>
<b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="gender" data-endpoint="PUTapi-auth-profile-update" data-component="body"  hidden>
<br>
Gender.
</p>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="region" data-endpoint="PUTapi-auth-profile-update" data-component="body"  hidden>
<br>
Region.
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="PUTapi-auth-profile-update" data-component="body"  hidden>
<br>
City.
</p>
<p>
<b><code>languages</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="languages.0" data-endpoint="PUTapi-auth-profile-update" data-component="body"  hidden>
<input type="text" name="languages.1" data-endpoint="PUTapi-auth-profile-update" data-component="body" hidden>
<br>
Languages.Example ["English","French"]
</p>

</form>


## Change a user&#039;s password.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/auth/change-password" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"current_password":"culpa","new_password":"deleniti"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/change-password"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "current_password": "culpa",
    "new_password": "deleniti"
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
    'http://localhost:8000/api/auth/change-password',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'current_password' => 'culpa',
            'new_password' => 'deleniti',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-PUTapi-auth-change-password" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-auth-change-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-auth-change-password"></code></pre>
</div>
<div id="execution-error-PUTapi-auth-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-auth-change-password"></code></pre>
</div>
<form id="form-PUTapi-auth-change-password" data-method="PUT" data-path="api/auth/change-password" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-auth-change-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-auth-change-password" onclick="tryItOut('PUTapi-auth-change-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-auth-change-password" onclick="cancelTryOut('PUTapi-auth-change-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-auth-change-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/auth/change-password</code></b>
</p>
<p>
<label id="auth-PUTapi-auth-change-password" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-auth-change-password" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>current_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="current_password" data-endpoint="PUTapi-auth-change-password" data-component="body" required  hidden>
<br>
Current Password
</p>
<p>
<b><code>new_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="new_password" data-endpoint="PUTapi-auth-change-password" data-component="body" required  hidden>
<br>
New Password
</p>

</form>


## Set profile photo.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/profile/set-photo" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -F "profile_pic=@/tmp/phpXInQfE" 
```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/profile/set-photo"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

const body = new FormData();
body.append('profile_pic', document.querySelector('input[name="profile_pic"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/auth/profile/set-photo',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'multipart' => [
            [
                'name' => 'profile_pic',
                'contents' => fopen('/tmp/phpXInQfE', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-auth-profile-set-photo" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-profile-set-photo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-profile-set-photo"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-profile-set-photo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-profile-set-photo"></code></pre>
</div>
<form id="form-POSTapi-auth-profile-set-photo" data-method="POST" data-path="api/auth/profile/set-photo" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-profile-set-photo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-profile-set-photo" onclick="tryItOut('POSTapi-auth-profile-set-photo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-profile-set-photo" onclick="cancelTryOut('POSTapi-auth-profile-set-photo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-profile-set-photo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/profile/set-photo</code></b>
</p>
<p>
<label id="auth-POSTapi-auth-profile-set-photo" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-auth-profile-set-photo" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>profile_pic</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="profile_pic" data-endpoint="POSTapi-auth-profile-set-photo" data-component="body" required  hidden>
<br>
Profile photo
</p>

</form>


## Password Reset Link




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/passwords/reset-link" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"et"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/passwords/reset-link"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "email": "et"
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
    'http://localhost:8000/api/auth/passwords/reset-link',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'email' => 'et',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-auth-passwords-reset-link" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-passwords-reset-link"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-passwords-reset-link"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-passwords-reset-link" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-passwords-reset-link"></code></pre>
</div>
<form id="form-POSTapi-auth-passwords-reset-link" data-method="POST" data-path="api/auth/passwords/reset-link" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-passwords-reset-link', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-passwords-reset-link" onclick="tryItOut('POSTapi-auth-passwords-reset-link');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-passwords-reset-link" onclick="cancelTryOut('POSTapi-auth-passwords-reset-link');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-passwords-reset-link" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/passwords/reset-link</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-auth-passwords-reset-link" data-component="body"  hidden>
<br>
. User Email
</p>

</form>


## Reset Password




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/passwords/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"token":"quo","password":"et"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/passwords/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "token": "quo",
    "password": "et"
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
    'http://localhost:8000/api/auth/passwords/reset',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'token' => 'quo',
            'password' => 'et',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-auth-passwords-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-passwords-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-passwords-reset"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-passwords-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-passwords-reset"></code></pre>
</div>
<form id="form-POSTapi-auth-passwords-reset" data-method="POST" data-path="api/auth/passwords/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-passwords-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-passwords-reset" onclick="tryItOut('POSTapi-auth-passwords-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-passwords-reset" onclick="cancelTryOut('POSTapi-auth-passwords-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-passwords-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/passwords/reset</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="token" data-endpoint="POSTapi-auth-passwords-reset" data-component="body" required  hidden>
<br>
. The User Token
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>password</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-auth-passwords-reset" data-component="body" required  hidden>
<br>
. The New Password
</p>

</form>



