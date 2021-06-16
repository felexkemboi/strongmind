# Auth
APIs for roles and permissions

## All Permissions




> Example request:

```bash
curl -X GET \
    -G "https://api.strongminds.made.ke/api/permission/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.strongminds.made.ke/api/permission/all"
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
    'https://api.strongminds.made.ke/api/permission/all',
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

url = 'https://api.strongminds.made.ke/api/permission/all'
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
    "https://api.strongminds.made.ke/api/permission/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"slug":"vel","title":"ipsa","module":"repellat"}'

```

```javascript
const url = new URL(
    "https://api.strongminds.made.ke/api/permission/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "slug": "vel",
    "title": "ipsa",
    "module": "repellat"
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
    'https://api.strongminds.made.ke/api/permission/create',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'slug' => 'vel',
            'title' => 'ipsa',
            'module' => 'repellat',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'https://api.strongminds.made.ke/api/permission/create'
payload = {
    "slug": "vel",
    "title": "ipsa",
    "module": "repellat"
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
    -G "https://api.strongminds.made.ke/api/role/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://api.strongminds.made.ke/api/role/all"
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
    'https://api.strongminds.made.ke/api/role/all',
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

url = 'https://api.strongminds.made.ke/api/role/all'
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
            "role_id": 3,
            "name": "Business Developer",
            "role_code": "BD",
            "description": "Business Developer"
        },
        {
            "role_id": 2,
            "name": "Business Executive",
            "role_code": null,
            "description": null
        },
        {
            "role_id": 1,
            "name": "Administrator",
            "role_code": null,
            "description": null
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
    "https://api.strongminds.made.ke/api/role/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"totam","role_code":"laudantium","description":"facere","access_permissions":[18,5]}'

```

```javascript
const url = new URL(
    "https://api.strongminds.made.ke/api/role/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "totam",
    "role_code": "laudantium",
    "description": "facere",
    "access_permissions": [
        18,
        5
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
    'https://api.strongminds.made.ke/api/role/create',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'totam',
            'role_code' => 'laudantium',
            'description' => 'facere',
            'access_permissions' => [
                18,
                5,
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

url = 'https://api.strongminds.made.ke/api/role/create'
payload = {
    "name": "totam",
    "role_code": "laudantium",
    "description": "facere",
    "access_permissions": [
        18,
        5
    ]
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



