# Auth
APIs for roles and permissions

## All Permissions




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/permission/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/permission/all"
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
    'http://localhost:8000/api/permission/all',
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

url = 'http://localhost:8000/api/permission/all'
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
    "result": {
        "admin": [
            {
                "permission_id": 2,
                "slug": "view-office",
                "module": "admin",
                "title": "View Office"
            },
            {
                "permission_id": 1,
                "slug": "create-office",
                "module": "admin",
                "title": "Create Office"
            }
        ]
    }
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
<form id="form-GETapi-permission-all" data-method="GET" data-path="api/permission/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-permission-all', this);">
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
</form>


## Create Permission




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/permission/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"slug":"et","title":"enim","module":"tempore"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/permission/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "slug": "et",
    "title": "enim",
    "module": "tempore"
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
    'http://localhost:8000/api/permission/create',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'slug' => 'et',
            'title' => 'enim',
            'module' => 'tempore',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/permission/create'
payload = {
    "slug": "et",
    "title": "enim",
    "module": "tempore"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


<div id="execution-results-POSTapi-permission-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-permission-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-permission-create"></code></pre>
</div>
<div id="execution-error-POSTapi-permission-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-permission-create"></code></pre>
</div>
<form id="form-POSTapi-permission-create" data-method="POST" data-path="api/permission/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-permission-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-permission-create" onclick="tryItOut('POSTapi-permission-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-permission-create" onclick="cancelTryOut('POSTapi-permission-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-permission-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/permission/create</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="slug" data-endpoint="POSTapi-permission-create" data-component="body" required  hidden>
<br>
Permission Name e.g create-office.
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-permission-create" data-component="body" required  hidden>
<br>
Title e.g Create Office.
</p>
<p>
<b><code>module</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="module" data-endpoint="POSTapi-permission-create" data-component="body" required  hidden>
<br>
Module Name e.g user.
</p>

</form>


## All Roles




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/role/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/all"
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
    'http://localhost:8000/api/role/all',
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

url = 'http://localhost:8000/api/role/all'
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
            "role_id": 1,
            "slug": "admin",
            "title": "Administrator"
        }
    ]
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
<form id="form-GETapi-role-all" data-method="GET" data-path="api/role/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-role-all', this);">
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
</form>


## Create Role




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/role/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"slug":"nesciunt","title":"aliquid"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "slug": "nesciunt",
    "title": "aliquid"
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
            'Accept' => 'application/json',
        ],
        'json' => [
            'slug' => 'nesciunt',
            'title' => 'aliquid',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/role/create'
payload = {
    "slug": "nesciunt",
    "title": "aliquid"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


<div id="execution-results-POSTapi-role-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-role-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-role-create"></code></pre>
</div>
<div id="execution-error-POSTapi-role-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-role-create"></code></pre>
</div>
<form id="form-POSTapi-role-create" data-method="POST" data-path="api/role/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-role-create', this);">
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
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="slug" data-endpoint="POSTapi-role-create" data-component="body" required  hidden>
<br>
Role Name. Example admin
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-role-create" data-component="body" required  hidden>
<br>
Title. Example Administrator
</p>

</form>


## Assign Permissions to role




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/role/assign-permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"role_id":15,"permissions":[13,15]}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/assign-permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "role_id": 15,
    "permissions": [
        13,
        15
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
    'http://localhost:8000/api/role/assign-permissions',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'role_id' => 15,
            'permissions' => [
                13,
                15,
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/role/assign-permissions'
payload = {
    "role_id": 15,
    "permissions": [
        13,
        15
    ]
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


<div id="execution-results-POSTapi-role-assign-permissions" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-role-assign-permissions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-role-assign-permissions"></code></pre>
</div>
<div id="execution-error-POSTapi-role-assign-permissions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-role-assign-permissions"></code></pre>
</div>
<form id="form-POSTapi-role-assign-permissions" data-method="POST" data-path="api/role/assign-permissions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-role-assign-permissions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-role-assign-permissions" onclick="tryItOut('POSTapi-role-assign-permissions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-role-assign-permissions" onclick="cancelTryOut('POSTapi-role-assign-permissions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-role-assign-permissions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/role/assign-permissions</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>role_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="role_id" data-endpoint="POSTapi-role-assign-permissions" data-component="body" required  hidden>
<br>
Role ID. Example 1
</p>
<p>
<b><code>permissions</code></b>&nbsp;&nbsp;<small>integer[]</small>  &nbsp;
<input type="number" name="permissions.0" data-endpoint="POSTapi-role-assign-permissions" data-component="body" required  hidden>
<input type="number" name="permissions.1" data-endpoint="POSTapi-role-assign-permissions" data-component="body" hidden>
<br>
Permission IDs. Example [1,2]
</p>

</form>



