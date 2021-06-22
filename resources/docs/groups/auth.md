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
        ],
        "": [
            {
                "permission_id": 3,
                "slug": "*",
                "module": null,
                "title": "Manage everything owned"
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
    -d '{"slug":"assumenda","title":"minima","module":"animi"}'

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
    "slug": "assumenda",
    "title": "minima",
    "module": "animi"
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
            'slug' => 'assumenda',
            'title' => 'minima',
            'module' => 'animi',
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
    "slug": "assumenda",
    "title": "minima",
    "module": "animi"
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
            "role_id": 4,
            "name": "System Administrator",
            "role_code": "SAD",
            "description": "System admin role",
            "access_permissions": {
                "admin": [
                    {
                        "permission_id": 2,
                        "slug": "view-office",
                        "description": "View Office",
                        "module": "admin"
                    },
                    {
                        "permission_id": 1,
                        "slug": "create-office",
                        "description": "Create Office",
                        "module": "admin"
                    }
                ]
            }
        },
        {
            "role_id": 3,
            "name": "Business Developer",
            "role_code": "BD",
            "description": "Business Developer",
            "access_permissions": {
                "admin": [
                    {
                        "permission_id": 1,
                        "slug": "create-office",
                        "description": "Create Office",
                        "module": "admin"
                    },
                    {
                        "permission_id": 2,
                        "slug": "view-office",
                        "description": "View Office",
                        "module": "admin"
                    }
                ]
            }
        },
        {
            "role_id": 1,
            "name": "Administrator",
            "role_code": "ADM",
            "description": "Administrator role",
            "access_permissions": {
                "": [
                    {
                        "permission_id": 3,
                        "slug": "*",
                        "description": "Manage everything owned",
                        "module": null
                    }
                ],
                "admin": [
                    {
                        "permission_id": 2,
                        "slug": "view-office",
                        "description": "View Office",
                        "module": "admin"
                    }
                ]
            }
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


## Get Role by Id




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/role/view/officiis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/view/officiis"
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
    'http://localhost:8000/api/role/view/officiis',
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

url = 'http://localhost:8000/api/role/view/officiis'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (500):

```json
{
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  invalid input syntax for type bigint: \"officiis\" (SQL: select * from \"roles\" where \"roles\".\"id\" = officiis limit 1)",
    "exception": "Illuminate\\Database\\QueryException",
    "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
    "line": 692,
    "trace": [
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 652,
            "function": "runQueryCallback",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 360,
            "function": "run",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2351,
            "function": "select",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2339,
            "function": "runSelect",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2905,
            "function": "Illuminate\\Database\\Query\\{closure}",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2340,
            "function": "onceWithColumns",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 604,
            "function": "get",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 588,
            "function": "getModels",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\BuildsQueries.php",
            "line": 257,
            "function": "get",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 392,
            "function": "first",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php",
            "line": 23,
            "function": "find",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 1991,
            "function": "forwardCallTo",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 2003,
            "function": "__call",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\app\\Http\\Controllers\\RoleController.php",
            "line": 97,
            "function": "__callStatic",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "showRole",
            "class": "App\\Http\\Controllers\\RoleController",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\sentry\\sentry-laravel\\src\\Sentry\\Laravel\\Http\\SetRequestIpMiddleware.php",
            "line": 55,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Sentry\\Laravel\\Http\\SetRequestIpMiddleware",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\sentry\\sentry-laravel\\src\\Sentry\\Laravel\\Http\\SetRequestMiddleware.php",
            "line": 52,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Sentry\\Laravel\\Http\\SetRequestMiddleware",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 52,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\sentry\\sentry-laravel\\src\\Sentry\\Laravel\\Tracing\\Middleware.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Sentry\\Laravel\\Tracing\\Middleware",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 651,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 288,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Application.php",
            "line": 974,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Application.php",
            "line": 291,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
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
<form id="form-GETapi-role-view--id-" data-method="GET" data-path="api/role/view/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-role-view--id-', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-role-view--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Create Role




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/role/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"eos","role_code":"cumque","description":"vero","access_permissions":[20,17]}'

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
    "name": "eos",
    "role_code": "cumque",
    "description": "vero",
    "access_permissions": [
        20,
        17
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
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'eos',
            'role_code' => 'cumque',
            'description' => 'vero',
            'access_permissions' => [
                20,
                17,
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

url = 'http://localhost:8000/api/role/create'
payload = {
    "name": "eos",
    "role_code": "cumque",
    "description": "vero",
    "access_permissions": [
        20,
        17
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


## Update Role




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/role/update/ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"animi","role_code":"est","description":"quas","access_permissions":[15,1]}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/update/ab"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "animi",
    "role_code": "est",
    "description": "quas",
    "access_permissions": [
        15,
        1
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
    'http://localhost:8000/api/role/update/ab',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'animi',
            'role_code' => 'est',
            'description' => 'quas',
            'access_permissions' => [
                15,
                1,
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

url = 'http://localhost:8000/api/role/update/ab'
payload = {
    "name": "animi",
    "role_code": "est",
    "description": "quas",
    "access_permissions": [
        15,
        1
    ]
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```


<div id="execution-results-PUTapi-role-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-role-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-role-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-role-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-role-update--id-"></code></pre>
</div>
<form id="form-PUTapi-role-update--id-" data-method="PUT" data-path="api/role/update/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-role-update--id-', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-role-update--id-" data-component="url" required  hidden>
<br>

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




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/role/delete/eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/role/delete/eum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/role/delete/eum',
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

url = 'http://localhost:8000/api/role/delete/eum'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```


<div id="execution-results-DELETEapi-role-delete--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-role-delete--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-role-delete--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-role-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-role-delete--id-"></code></pre>
</div>
<form id="form-DELETEapi-role-delete--id-" data-method="DELETE" data-path="api/role/delete/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-role-delete--id-', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-role-delete--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Authenticate user




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"excepturi","password":"sequi"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "excepturi",
    "password": "sequi"
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
        ],
        'json' => [
            'email' => 'excepturi',
            'password' => 'sequi',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost:8000/api/auth/login'
payload = {
    "email": "excepturi",
    "password": "sequi"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


<div id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</div>
<form id="form-POSTapi-auth-login" data-method="POST" data-path="api/auth/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
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



