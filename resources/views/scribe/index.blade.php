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
            <li>Last updated: June 21 2021</li>
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
    var baseUrl = "https://api.strongminds.made.ke";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.7.9.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">https://api.strongminds.made.ke</code></pre><h1>Authenticating requests</h1>
<p>This API is authenticated by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Auth</h1>
<p>APIs for roles and permissions</p>
<h2>All Permissions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://api.strongminds.made.ke/api/permission/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/permission/all"
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
    'https://api.strongminds.made.ke/api/permission/all',
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

url = 'https://api.strongminds.made.ke/api/permission/all'
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
}</code></pre>
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
<h2>Create Permission</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://api.strongminds.made.ke/api/permission/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"slug":"enim","title":"eaque","module":"nobis"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/permission/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "slug": "enim",
    "title": "eaque",
    "module": "nobis"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://api.strongminds.made.ke/api/permission/create',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'slug' =&gt; 'enim',
            'title' =&gt; 'eaque',
            'module' =&gt; 'nobis',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'https://api.strongminds.made.ke/api/permission/create'
payload = {
    "slug": "enim",
    "title": "eaque",
    "module": "nobis"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
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
<h2>All Roles</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://api.strongminds.made.ke/api/role/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/role/all"
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
    'https://api.strongminds.made.ke/api/role/all',
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

url = 'https://api.strongminds.made.ke/api/role/all'
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
}</code></pre>
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
<h2>Get Role by Id</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://api.strongminds.made.ke/api/role/view/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/role/view/aut"
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
    'https://api.strongminds.made.ke/api/role/view/aut',
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

url = 'https://api.strongminds.made.ke/api/role/view/aut'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  invalid input syntax for type bigint: \"aut\" (SQL: select * from \"roles\" where \"roles\".\"id\" = aut limit 1)",
    "exception": "Illuminate\\Database\\QueryException",
    "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
    "line": 692,
    "trace": [
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 652,
            "function": "runQueryCallback",
            "class": "Illuminate\\Database\\Connection",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 360,
            "function": "run",
            "class": "Illuminate\\Database\\Connection",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2351,
            "function": "select",
            "class": "Illuminate\\Database\\Connection",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2339,
            "function": "runSelect",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2905,
            "function": "Illuminate\\Database\\Query\\{closure}",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2340,
            "function": "onceWithColumns",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 604,
            "function": "get",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 588,
            "function": "getModels",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\BuildsQueries.php",
            "line": 257,
            "function": "get",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 392,
            "function": "first",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php",
            "line": 23,
            "function": "find",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 1991,
            "function": "forwardCallTo",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 2003,
            "function": "__call",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "-&gt;"
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
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\sentry\\sentry-laravel\\src\\Sentry\\Laravel\\Http\\SetRequestIpMiddleware.php",
            "line": 55,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Sentry\\Laravel\\Http\\SetRequestIpMiddleware",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\sentry\\sentry-laravel\\src\\Sentry\\Laravel\\Http\\SetRequestMiddleware.php",
            "line": 52,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Sentry\\Laravel\\Http\\SetRequestMiddleware",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 52,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\sentry\\sentry-laravel\\src\\Sentry\\Laravel\\Tracing\\Middleware.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Sentry\\Laravel\\Tracing\\Middleware",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
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
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 288,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Application.php",
            "line": 974,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Application.php",
            "line": 291,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "C:\\laragon\\www\\strong-minds\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "-&gt;"
        }
    ]
}</code></pre>
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
<h2>Create Role</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://api.strongminds.made.ke/api/role/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ut","role_code":"officia","description":"eos","access_permissions":[4,11]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/role/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ut",
    "role_code": "officia",
    "description": "eos",
    "access_permissions": [
        4,
        11
    ]
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://api.strongminds.made.ke/api/role/create',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'ut',
            'role_code' =&gt; 'officia',
            'description' =&gt; 'eos',
            'access_permissions' =&gt; [
                4,
                11,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'https://api.strongminds.made.ke/api/role/create'
payload = {
    "name": "ut",
    "role_code": "officia",
    "description": "eos",
    "access_permissions": [
        4,
        11
    ]
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
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
<h2>Update Role</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://api.strongminds.made.ke/api/role/update/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"neque","role_code":"enim","description":"maiores","access_permissions":[6,14]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/role/update/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "neque",
    "role_code": "enim",
    "description": "maiores",
    "access_permissions": [
        6,
        14
    ]
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'https://api.strongminds.made.ke/api/role/update/et',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'neque',
            'role_code' =&gt; 'enim',
            'description' =&gt; 'maiores',
            'access_permissions' =&gt; [
                6,
                14,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'https://api.strongminds.made.ke/api/role/update/et'
payload = {
    "name": "neque",
    "role_code": "enim",
    "description": "maiores",
    "access_permissions": [
        6,
        14
    ]
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre>
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
<h2>Delete Role by Id</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://api.strongminds.made.ke/api/role/delete/sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/role/delete/sit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://api.strongminds.made.ke/api/role/delete/sit',
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

url = 'https://api.strongminds.made.ke/api/role/delete/sit'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>
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
</form><h1>Endpoints</h1>
<h2>api/teams/invite</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://api.strongminds.made.ke/api/teams/invite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/teams/invite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://api.strongminds.made.ke/api/teams/invite',
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

url = 'https://api.strongminds.made.ke/api/teams/invite'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<div id="execution-results-POSTapi-teams-invite" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-teams-invite"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teams-invite"></code></pre>
</div>
<div id="execution-error-POSTapi-teams-invite" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teams-invite"></code></pre>
</div>
<form id="form-POSTapi-teams-invite" data-method="POST" data-path="api/teams/invite" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-teams-invite', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-teams-invite" onclick="tryItOut('POSTapi-teams-invite');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-teams-invite" onclick="cancelTryOut('POSTapi-teams-invite');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-teams-invite" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/teams/invite</code></b>
</p>
</form><h1>Offices</h1>
<p>APIs for managing offices</p>
<h2>All offices</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://api.strongminds.made.ke/api/office/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/office/all"
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
    'https://api.strongminds.made.ke/api/office/all',
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

url = 'https://api.strongminds.made.ke/api/office/all'
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
    "https://api.strongminds.made.ke/api/office/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":19,"name":"et"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/office/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 19,
    "name": "et"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://api.strongminds.made.ke/api/office/create',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'country_id' =&gt; 19,
            'name' =&gt; 'et',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'https://api.strongminds.made.ke/api/office/create'
payload = {
    "country_id": 19,
    "name": "et"
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
    "https://api.strongminds.made.ke/api/office/update/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":9,"name":"nisi","active":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/office/update/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 9,
    "name": "nisi",
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
    'https://api.strongminds.made.ke/api/office/update/1',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'country_id' =&gt; 9,
            'name' =&gt; 'nisi',
            'active' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'https://api.strongminds.made.ke/api/office/update/1'
payload = {
    "country_id": 9,
    "name": "nisi",
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

</form><h1>Shared</h1>
<p>APIs for managing countries</p>
<h2>All Countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://api.strongminds.made.ke/api/country/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/country/all"
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
    'https://api.strongminds.made.ke/api/country/all',
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

url = 'https://api.strongminds.made.ke/api/country/all'
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
            "country_id": 3,
            "name": "Albania",
            "dialing_code": "355",
            "active": 0
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
        },
        {
            "country_id": 1,
            "name": "Afghanistan",
            "dialing_code": "93",
            "active": 0
        },
        {
            "country_id": 2,
            "name": "Aland Islands",
            "dialing_code": "+358-18",
            "active": 0
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
    -G "https://api.strongminds.made.ke/api/country/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/country/active"
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
    'https://api.strongminds.made.ke/api/country/active',
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

url = 'https://api.strongminds.made.ke/api/country/active'
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
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://api.strongminds.made.ke/api/country/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"country_id":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/country/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country_id": 1
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'https://api.strongminds.made.ke/api/country/update',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'country_id' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<pre><code class="language-python">import requests
import json

url = 'https://api.strongminds.made.ke/api/country/update'
payload = {
    "country_id": 1
}
headers = {
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
<form id="form-PUTapi-country-update" data-method="PUT" data-path="api/country/update" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-country-update', this);">
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
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country_id" data-endpoint="PUTapi-country-update" data-component="body" required  hidden>
<br>
County ID .
</p>

</form>
<h2>All Timezones</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://api.strongminds.made.ke/api/timezone/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/timezone/all"
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
    'https://api.strongminds.made.ke/api/timezone/all',
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

url = 'https://api.strongminds.made.ke/api/timezone/all'
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
            "timezone_id": 1,
            "name": "Pacific\/Niue",
            "utc": "(GMT-11:00) Niue",
            "active": 1
        },
        {
            "timezone_id": 2,
            "name": "Pacific\/Pago_Pago",
            "utc": "(GMT-11:00) Pago Pago",
            "active": 1
        },
        {
            "timezone_id": 3,
            "name": "Pacific\/Honolulu",
            "utc": "(GMT-10:00) Hawaii Time",
            "active": 1
        },
        {
            "timezone_id": 4,
            "name": "Pacific\/Rarotonga",
            "utc": "(GMT-10:00) Rarotonga",
            "active": 1
        },
        {
            "timezone_id": 5,
            "name": "Pacific\/Tahiti",
            "utc": "(GMT-10:00) Tahiti",
            "active": 1
        },
        {
            "timezone_id": 6,
            "name": "Pacific\/Marquesas",
            "utc": "(GMT-09:30) Marquesas",
            "active": 1
        },
        {
            "timezone_id": 7,
            "name": "America\/Anchorage",
            "utc": "(GMT-09:00) Alaska Time",
            "active": 1
        },
        {
            "timezone_id": 8,
            "name": "Pacific\/Gambier",
            "utc": "(GMT-09:00) Gambier",
            "active": 1
        },
        {
            "timezone_id": 9,
            "name": "America\/Los_Angeles",
            "utc": "(GMT-08:00) Pacific Time",
            "active": 1
        },
        {
            "timezone_id": 10,
            "name": "America\/Tijuana",
            "utc": "(GMT-08:00) Pacific Time - Tijuana",
            "active": 1
        },
        {
            "timezone_id": 11,
            "name": "America\/Vancouver",
            "utc": "(GMT-08:00) Pacific Time - Vancouver",
            "active": 1
        },
        {
            "timezone_id": 12,
            "name": "America\/Whitehorse",
            "utc": "(GMT-08:00) Pacific Time - Whitehorse",
            "active": 1
        },
        {
            "timezone_id": 13,
            "name": "Pacific\/Pitcairn",
            "utc": "(GMT-08:00) Pitcairn",
            "active": 1
        },
        {
            "timezone_id": 14,
            "name": "America\/Dawson_Creek",
            "utc": "(GMT-07:00) Mountain Time - Dawson Creek",
            "active": 1
        },
        {
            "timezone_id": 15,
            "name": "America\/Denver",
            "utc": "(GMT-07:00) Mountain Time",
            "active": 1
        },
        {
            "timezone_id": 16,
            "name": "America\/Edmonton",
            "utc": "(GMT-07:00) Mountain Time - Edmonton",
            "active": 1
        },
        {
            "timezone_id": 17,
            "name": "America\/Hermosillo",
            "utc": "(GMT-07:00) Mountain Time - Hermosillo",
            "active": 1
        },
        {
            "timezone_id": 18,
            "name": "America\/Mazatlan",
            "utc": "(GMT-07:00) Mountain Time - Chihuahua, Mazatlan",
            "active": 1
        },
        {
            "timezone_id": 19,
            "name": "America\/Phoenix",
            "utc": "(GMT-07:00) Mountain Time - Arizona",
            "active": 1
        },
        {
            "timezone_id": 20,
            "name": "America\/Yellowknife",
            "utc": "(GMT-07:00) Mountain Time - Yellowknife",
            "active": 1
        },
        {
            "timezone_id": 21,
            "name": "America\/Belize",
            "utc": "(GMT-06:00) Belize",
            "active": 1
        },
        {
            "timezone_id": 22,
            "name": "America\/Chicago",
            "utc": "(GMT-06:00) Central Time",
            "active": 1
        },
        {
            "timezone_id": 23,
            "name": "America\/Costa_Rica",
            "utc": "(GMT-06:00) Costa Rica",
            "active": 1
        },
        {
            "timezone_id": 24,
            "name": "America\/El_Salvador",
            "utc": "(GMT-06:00) El Salvador",
            "active": 1
        },
        {
            "timezone_id": 25,
            "name": "America\/Guatemala",
            "utc": "(GMT-06:00) Guatemala",
            "active": 1
        },
        {
            "timezone_id": 26,
            "name": "America\/Managua",
            "utc": "(GMT-06:00) Managua",
            "active": 1
        },
        {
            "timezone_id": 27,
            "name": "America\/Mexico_City",
            "utc": "(GMT-06:00) Central Time - Mexico City",
            "active": 1
        },
        {
            "timezone_id": 28,
            "name": "America\/Regina",
            "utc": "(GMT-06:00) Central Time - Regina",
            "active": 1
        },
        {
            "timezone_id": 29,
            "name": "America\/Tegucigalpa",
            "utc": "(GMT-06:00) Central Time - Tegucigalpa",
            "active": 1
        },
        {
            "timezone_id": 30,
            "name": "America\/Winnipeg",
            "utc": "(GMT-06:00) Central Time - Winnipeg",
            "active": 1
        },
        {
            "timezone_id": 31,
            "name": "Pacific\/Galapagos",
            "utc": "(GMT-06:00) Galapagos",
            "active": 1
        },
        {
            "timezone_id": 32,
            "name": "America\/Bogota",
            "utc": "(GMT-05:00) Bogota",
            "active": 1
        },
        {
            "timezone_id": 33,
            "name": "America\/Cancun",
            "utc": "(GMT-05:00) America Cancun",
            "active": 1
        },
        {
            "timezone_id": 34,
            "name": "America\/Cayman",
            "utc": "(GMT-05:00) Cayman",
            "active": 1
        },
        {
            "timezone_id": 35,
            "name": "America\/Guayaquil",
            "utc": "(GMT-05:00) Guayaquil",
            "active": 1
        },
        {
            "timezone_id": 36,
            "name": "America\/Havana",
            "utc": "(GMT-05:00) Havana",
            "active": 1
        },
        {
            "timezone_id": 37,
            "name": "America\/Iqaluit",
            "utc": "(GMT-05:00) Eastern Time - Iqaluit",
            "active": 1
        },
        {
            "timezone_id": 38,
            "name": "America\/Jamaica",
            "utc": "(GMT-05:00) Jamaica",
            "active": 1
        },
        {
            "timezone_id": 39,
            "name": "America\/Lima",
            "utc": "(GMT-05:00) Lima",
            "active": 1
        },
        {
            "timezone_id": 40,
            "name": "America\/Nassau",
            "utc": "(GMT-05:00) Nassau",
            "active": 1
        },
        {
            "timezone_id": 41,
            "name": "America\/New_York",
            "utc": "(GMT-05:00) Eastern Time",
            "active": 1
        },
        {
            "timezone_id": 42,
            "name": "America\/Panama",
            "utc": "(GMT-05:00) Panama",
            "active": 1
        },
        {
            "timezone_id": 43,
            "name": "America\/Port-au-Prince",
            "utc": "(GMT-05:00) Port-au-Prince",
            "active": 1
        },
        {
            "timezone_id": 44,
            "name": "America\/Rio_Branco",
            "utc": "(GMT-05:00) Rio Branco",
            "active": 1
        },
        {
            "timezone_id": 45,
            "name": "America\/Toronto",
            "utc": "(GMT-05:00) Eastern Time - Toronto",
            "active": 1
        },
        {
            "timezone_id": 46,
            "name": "Pacific\/Easter",
            "utc": "(GMT-05:00) Easter Island",
            "active": 1
        },
        {
            "timezone_id": 47,
            "name": "America\/Caracas",
            "utc": "(GMT-04:30) Caracas",
            "active": 1
        },
        {
            "timezone_id": 48,
            "name": "America\/Asuncion",
            "utc": "(GMT-03:00) Asuncion",
            "active": 1
        },
        {
            "timezone_id": 49,
            "name": "America\/Barbados",
            "utc": "(GMT-04:00) Barbados",
            "active": 1
        },
        {
            "timezone_id": 50,
            "name": "America\/Boa_Vista",
            "utc": "(GMT-04:00) Boa Vista",
            "active": 1
        },
        {
            "timezone_id": 51,
            "name": "America\/Campo_Grande",
            "utc": "(GMT-03:00) Campo Grande",
            "active": 1
        },
        {
            "timezone_id": 52,
            "name": "America\/Cuiaba",
            "utc": "(GMT-03:00) Cuiaba",
            "active": 1
        },
        {
            "timezone_id": 53,
            "name": "America\/Curacao",
            "utc": "(GMT-04:00) Curacao",
            "active": 1
        },
        {
            "timezone_id": 54,
            "name": "America\/Grand_Turk",
            "utc": "(GMT-04:00) Grand Turk",
            "active": 1
        },
        {
            "timezone_id": 55,
            "name": "America\/Guyana",
            "utc": "(GMT-04:00) Guyana",
            "active": 1
        },
        {
            "timezone_id": 56,
            "name": "America\/Halifax",
            "utc": "(GMT-04:00) Atlantic Time - Halifax",
            "active": 1
        },
        {
            "timezone_id": 57,
            "name": "America\/La_Paz",
            "utc": "(GMT-04:00) La Paz",
            "active": 1
        },
        {
            "timezone_id": 58,
            "name": "America\/Manaus",
            "utc": "(GMT-04:00) Manaus",
            "active": 1
        },
        {
            "timezone_id": 59,
            "name": "America\/Martinique",
            "utc": "(GMT-04:00) Martinique",
            "active": 1
        },
        {
            "timezone_id": 60,
            "name": "America\/Port_of_Spain",
            "utc": "(GMT-04:00) Port of Spain",
            "active": 1
        },
        {
            "timezone_id": 61,
            "name": "America\/Porto_Velho",
            "utc": "(GMT-04:00) Porto Velho",
            "active": 1
        },
        {
            "timezone_id": 62,
            "name": "America\/Puerto_Rico",
            "utc": "(GMT-04:00) Puerto Rico",
            "active": 1
        },
        {
            "timezone_id": 63,
            "name": "America\/Santo_Domingo",
            "utc": "(GMT-04:00) Santo Domingo",
            "active": 1
        },
        {
            "timezone_id": 64,
            "name": "America\/Thule",
            "utc": "(GMT-04:00) Thule",
            "active": 1
        },
        {
            "timezone_id": 65,
            "name": "Atlantic\/Bermuda",
            "utc": "(GMT-04:00) Bermuda",
            "active": 1
        },
        {
            "timezone_id": 66,
            "name": "America\/St_Johns",
            "utc": "(GMT-03:30) Newfoundland Time - St. Johns",
            "active": 1
        },
        {
            "timezone_id": 67,
            "name": "America\/Araguaina",
            "utc": "(GMT-03:00) Araguaina",
            "active": 1
        },
        {
            "timezone_id": 68,
            "name": "America\/Argentina\/Buenos_Aires",
            "utc": "(GMT-03:00) Buenos Aires",
            "active": 1
        },
        {
            "timezone_id": 69,
            "name": "America\/Bahia",
            "utc": "(GMT-03:00) Salvador",
            "active": 1
        },
        {
            "timezone_id": 70,
            "name": "America\/Belem",
            "utc": "(GMT-03:00) Belem",
            "active": 1
        },
        {
            "timezone_id": 71,
            "name": "America\/Cayenne",
            "utc": "(GMT-03:00) Cayenne",
            "active": 1
        },
        {
            "timezone_id": 72,
            "name": "America\/Fortaleza",
            "utc": "(GMT-03:00) Fortaleza",
            "active": 1
        },
        {
            "timezone_id": 73,
            "name": "America\/Godthab",
            "utc": "(GMT-03:00) Godthab",
            "active": 1
        },
        {
            "timezone_id": 74,
            "name": "America\/Maceio",
            "utc": "(GMT-03:00) Maceio",
            "active": 1
        },
        {
            "timezone_id": 75,
            "name": "America\/Miquelon",
            "utc": "(GMT-03:00) Miquelon",
            "active": 1
        },
        {
            "timezone_id": 76,
            "name": "America\/Montevideo",
            "utc": "(GMT-03:00) Montevideo",
            "active": 1
        },
        {
            "timezone_id": 77,
            "name": "America\/Paramaribo",
            "utc": "(GMT-03:00) Paramaribo",
            "active": 1
        },
        {
            "timezone_id": 78,
            "name": "America\/Recife",
            "utc": "(GMT-03:00) Recife",
            "active": 1
        },
        {
            "timezone_id": 79,
            "name": "America\/Santiago",
            "utc": "(GMT-03:00) Santiago",
            "active": 1
        },
        {
            "timezone_id": 80,
            "name": "America\/Sao_Paulo",
            "utc": "(GMT-02:00) Sao Paulo",
            "active": 1
        },
        {
            "timezone_id": 81,
            "name": "Antarctica\/Palmer",
            "utc": "(GMT-03:00) Palmer",
            "active": 1
        },
        {
            "timezone_id": 82,
            "name": "Antarctica\/Rothera",
            "utc": "(GMT-03:00) Rothera",
            "active": 1
        },
        {
            "timezone_id": 83,
            "name": "Atlantic\/Stanley",
            "utc": "(GMT-03:00) Stanley",
            "active": 1
        },
        {
            "timezone_id": 84,
            "name": "America\/Noronha",
            "utc": "(GMT-02:00) Noronha",
            "active": 1
        },
        {
            "timezone_id": 85,
            "name": "Atlantic\/South_Georgia",
            "utc": "(GMT-02:00) South Georgia",
            "active": 1
        },
        {
            "timezone_id": 86,
            "name": "America\/Scoresbysund",
            "utc": "(GMT-01:00) Scoresbysund",
            "active": 1
        },
        {
            "timezone_id": 87,
            "name": "Atlantic\/Azores",
            "utc": "(GMT-01:00) Azores",
            "active": 1
        },
        {
            "timezone_id": 88,
            "name": "Atlantic\/Cape_Verde",
            "utc": "(GMT-01:00) Cape Verde",
            "active": 1
        },
        {
            "timezone_id": 89,
            "name": "Africa\/Abidjan",
            "utc": "(GMT+00:00) Abidjan",
            "active": 1
        },
        {
            "timezone_id": 90,
            "name": "Africa\/Accra",
            "utc": "(GMT+00:00) Accra",
            "active": 1
        },
        {
            "timezone_id": 91,
            "name": "Africa\/Bissau",
            "utc": "(GMT+00:00) Bissau",
            "active": 1
        },
        {
            "timezone_id": 92,
            "name": "Africa\/Casablanca",
            "utc": "(GMT+00:00) Casablanca",
            "active": 1
        },
        {
            "timezone_id": 93,
            "name": "Africa\/El_Aaiun",
            "utc": "(GMT+00:00) El Aaiun",
            "active": 1
        },
        {
            "timezone_id": 94,
            "name": "Africa\/Monrovia",
            "utc": "(GMT+00:00) Monrovia",
            "active": 1
        },
        {
            "timezone_id": 95,
            "name": "America\/Danmarkshavn",
            "utc": "(GMT+00:00) Danmarkshavn",
            "active": 1
        },
        {
            "timezone_id": 96,
            "name": "Atlantic\/Canary",
            "utc": "(GMT+00:00) Canary Islands",
            "active": 1
        },
        {
            "timezone_id": 97,
            "name": "Atlantic\/Faroe",
            "utc": "(GMT+00:00) Faeroe",
            "active": 1
        },
        {
            "timezone_id": 98,
            "name": "Atlantic\/Reykjavik",
            "utc": "(GMT+00:00) Reykjavik",
            "active": 1
        },
        {
            "timezone_id": 99,
            "name": "Etc\/GMT",
            "utc": "(GMT+00:00) GMT (no daylight saving)",
            "active": 1
        },
        {
            "timezone_id": 100,
            "name": "Europe\/Dublin",
            "utc": "(GMT+00:00) Dublin",
            "active": 1
        },
        {
            "timezone_id": 101,
            "name": "Europe\/Lisbon",
            "utc": "(GMT+00:00) Lisbon",
            "active": 1
        },
        {
            "timezone_id": 102,
            "name": "Europe\/London",
            "utc": "(GMT+00:00) London",
            "active": 1
        },
        {
            "timezone_id": 103,
            "name": "Africa\/Algiers",
            "utc": "(GMT+01:00) Algiers",
            "active": 1
        },
        {
            "timezone_id": 104,
            "name": "Africa\/Ceuta",
            "utc": "(GMT+01:00) Ceuta",
            "active": 1
        },
        {
            "timezone_id": 105,
            "name": "Africa\/Lagos",
            "utc": "(GMT+01:00) Lagos",
            "active": 1
        },
        {
            "timezone_id": 106,
            "name": "Africa\/Ndjamena",
            "utc": "(GMT+01:00) Ndjamena",
            "active": 1
        },
        {
            "timezone_id": 107,
            "name": "Africa\/Tunis",
            "utc": "(GMT+01:00) Tunis",
            "active": 1
        },
        {
            "timezone_id": 108,
            "name": "Africa\/Windhoek",
            "utc": "(GMT+02:00) Windhoek",
            "active": 1
        },
        {
            "timezone_id": 109,
            "name": "Europe\/Amsterdam",
            "utc": "(GMT+01:00) Amsterdam",
            "active": 1
        },
        {
            "timezone_id": 110,
            "name": "Europe\/Andorra",
            "utc": "(GMT+01:00) Andorra",
            "active": 1
        },
        {
            "timezone_id": 111,
            "name": "Europe\/Belgrade",
            "utc": "(GMT+01:00) Central European Time - Belgrade",
            "active": 1
        },
        {
            "timezone_id": 112,
            "name": "Europe\/Berlin",
            "utc": "(GMT+01:00) Berlin",
            "active": 1
        },
        {
            "timezone_id": 113,
            "name": "Europe\/Brussels",
            "utc": "(GMT+01:00) Brussels",
            "active": 1
        },
        {
            "timezone_id": 114,
            "name": "Europe\/Budapest",
            "utc": "(GMT+01:00) Budapest",
            "active": 1
        },
        {
            "timezone_id": 115,
            "name": "Europe\/Copenhagen",
            "utc": "(GMT+01:00) Copenhagen",
            "active": 1
        },
        {
            "timezone_id": 116,
            "name": "Europe\/Gibraltar",
            "utc": "(GMT+01:00) Gibraltar",
            "active": 1
        },
        {
            "timezone_id": 117,
            "name": "Europe\/Luxembourg",
            "utc": "(GMT+01:00) Luxembourg",
            "active": 1
        },
        {
            "timezone_id": 118,
            "name": "Europe\/Madrid",
            "utc": "(GMT+01:00) Madrid",
            "active": 1
        },
        {
            "timezone_id": 119,
            "name": "Europe\/Malta",
            "utc": "(GMT+01:00) Malta",
            "active": 1
        },
        {
            "timezone_id": 120,
            "name": "Europe\/Monaco",
            "utc": "(GMT+01:00) Monaco",
            "active": 1
        },
        {
            "timezone_id": 121,
            "name": "Europe\/Oslo",
            "utc": "(GMT+01:00) Oslo",
            "active": 1
        },
        {
            "timezone_id": 122,
            "name": "Europe\/Paris",
            "utc": "(GMT+01:00) Paris",
            "active": 1
        },
        {
            "timezone_id": 123,
            "name": "Europe\/Prague",
            "utc": "(GMT+01:00) Central European Time - Prague",
            "active": 1
        },
        {
            "timezone_id": 124,
            "name": "Europe\/Rome",
            "utc": "(GMT+01:00) Rome",
            "active": 1
        },
        {
            "timezone_id": 125,
            "name": "Europe\/Stockholm",
            "utc": "(GMT+01:00) Stockholm",
            "active": 1
        },
        {
            "timezone_id": 126,
            "name": "Europe\/Tirane",
            "utc": "(GMT+01:00) Tirane",
            "active": 1
        },
        {
            "timezone_id": 127,
            "name": "Europe\/Vienna",
            "utc": "(GMT+01:00) Vienna",
            "active": 1
        },
        {
            "timezone_id": 128,
            "name": "Europe\/Warsaw",
            "utc": "(GMT+01:00) Warsaw",
            "active": 1
        },
        {
            "timezone_id": 129,
            "name": "Europe\/Zurich",
            "utc": "(GMT+01:00) Zurich",
            "active": 1
        },
        {
            "timezone_id": 130,
            "name": "Africa\/Cairo",
            "utc": "(GMT+02:00) Cairo",
            "active": 1
        },
        {
            "timezone_id": 131,
            "name": "Africa\/Johannesburg",
            "utc": "(GMT+02:00) Johannesburg",
            "active": 1
        },
        {
            "timezone_id": 132,
            "name": "Africa\/Maputo",
            "utc": "(GMT+02:00) Maputo",
            "active": 1
        },
        {
            "timezone_id": 133,
            "name": "Africa\/Tripoli",
            "utc": "(GMT+02:00) Tripoli",
            "active": 1
        },
        {
            "timezone_id": 134,
            "name": "Asia\/Amman",
            "utc": "(GMT+02:00) Amman",
            "active": 1
        },
        {
            "timezone_id": 135,
            "name": "Asia\/Beirut",
            "utc": "(GMT+02:00) Beirut",
            "active": 1
        },
        {
            "timezone_id": 136,
            "name": "Asia\/Damascus",
            "utc": "(GMT+02:00) Damascus",
            "active": 1
        },
        {
            "timezone_id": 137,
            "name": "Asia\/Gaza",
            "utc": "(GMT+02:00) Gaza",
            "active": 1
        },
        {
            "timezone_id": 138,
            "name": "Asia\/Jerusalem",
            "utc": "(GMT+02:00) Jerusalem",
            "active": 1
        },
        {
            "timezone_id": 139,
            "name": "Asia\/Nicosia",
            "utc": "(GMT+02:00) Nicosia",
            "active": 1
        },
        {
            "timezone_id": 140,
            "name": "Europe\/Athens",
            "utc": "(GMT+02:00) Athens",
            "active": 1
        },
        {
            "timezone_id": 141,
            "name": "Europe\/Bucharest",
            "utc": "(GMT+02:00) Bucharest",
            "active": 1
        },
        {
            "timezone_id": 142,
            "name": "Europe\/Chisinau",
            "utc": "(GMT+02:00) Chisinau",
            "active": 1
        },
        {
            "timezone_id": 143,
            "name": "Europe\/Helsinki",
            "utc": "(GMT+02:00) Helsinki",
            "active": 1
        },
        {
            "timezone_id": 144,
            "name": "Europe\/Istanbul",
            "utc": "(GMT+02:00) Istanbul",
            "active": 1
        },
        {
            "timezone_id": 145,
            "name": "Europe\/Kaliningrad",
            "utc": "(GMT+02:00) Moscow-01 - Kaliningrad",
            "active": 1
        },
        {
            "timezone_id": 146,
            "name": "Europe\/Kiev",
            "utc": "(GMT+02:00) Kiev",
            "active": 1
        },
        {
            "timezone_id": 147,
            "name": "Europe\/Riga",
            "utc": "(GMT+02:00) Riga",
            "active": 1
        },
        {
            "timezone_id": 148,
            "name": "Europe\/Sofia",
            "utc": "(GMT+02:00) Sofia",
            "active": 1
        },
        {
            "timezone_id": 149,
            "name": "Europe\/Tallinn",
            "utc": "(GMT+02:00) Tallinn",
            "active": 1
        },
        {
            "timezone_id": 150,
            "name": "Europe\/Vilnius",
            "utc": "(GMT+02:00) Vilnius",
            "active": 1
        },
        {
            "timezone_id": 151,
            "name": "Africa\/Khartoum",
            "utc": "(GMT+03:00) Khartoum",
            "active": 1
        },
        {
            "timezone_id": 152,
            "name": "Africa\/Nairobi",
            "utc": "(GMT+03:00) Nairobi",
            "active": 1
        },
        {
            "timezone_id": 153,
            "name": "Africa\/Kampala",
            "utc": "(GMT+03:00) Kampala",
            "active": 1
        },
        {
            "timezone_id": 154,
            "name": "Africa\/Lusaka",
            "utc": "(GMT+02:00) Lusaka",
            "active": 1
        },
        {
            "timezone_id": 155,
            "name": "Africa\/Dar_es_Salaam",
            "utc": "(GMT+03:00) Dar_es_Salaam",
            "active": 1
        },
        {
            "timezone_id": 156,
            "name": "Antarctica\/Syowa",
            "utc": "(GMT+03:00) Syowa",
            "active": 1
        },
        {
            "timezone_id": 157,
            "name": "Asia\/Baghdad",
            "utc": "(GMT+03:00) Baghdad",
            "active": 1
        },
        {
            "timezone_id": 158,
            "name": "Asia\/Qatar",
            "utc": "(GMT+03:00) Qatar",
            "active": 1
        },
        {
            "timezone_id": 159,
            "name": "Asia\/Riyadh",
            "utc": "(GMT+03:00) Riyadh",
            "active": 1
        },
        {
            "timezone_id": 160,
            "name": "Europe\/Minsk",
            "utc": "(GMT+03:00) Minsk",
            "active": 1
        },
        {
            "timezone_id": 161,
            "name": "Europe\/Moscow",
            "utc": "(GMT+03:00) Moscow+00 - Moscow",
            "active": 1
        },
        {
            "timezone_id": 162,
            "name": "Asia\/Tehran",
            "utc": "(GMT+03:30) Tehran",
            "active": 1
        },
        {
            "timezone_id": 163,
            "name": "Asia\/Baku",
            "utc": "(GMT+04:00) Baku",
            "active": 1
        },
        {
            "timezone_id": 164,
            "name": "Asia\/Dubai",
            "utc": "(GMT+04:00) Dubai",
            "active": 1
        },
        {
            "timezone_id": 165,
            "name": "Asia\/Tbilisi",
            "utc": "(GMT+04:00) Tbilisi",
            "active": 1
        },
        {
            "timezone_id": 166,
            "name": "Asia\/Yerevan",
            "utc": "(GMT+04:00) Yerevan",
            "active": 1
        },
        {
            "timezone_id": 167,
            "name": "Europe\/Samara",
            "utc": "(GMT+04:00) Moscow+01 - Samara",
            "active": 1
        },
        {
            "timezone_id": 168,
            "name": "Indian\/Mahe",
            "utc": "(GMT+04:00) Mahe",
            "active": 1
        },
        {
            "timezone_id": 169,
            "name": "Indian\/Mauritius",
            "utc": "(GMT+04:00) Mauritius",
            "active": 1
        },
        {
            "timezone_id": 170,
            "name": "Indian\/Reunion",
            "utc": "(GMT+04:00) Reunion",
            "active": 1
        },
        {
            "timezone_id": 171,
            "name": "Asia\/Kabul",
            "utc": "(GMT+04:30) Kabul",
            "active": 1
        },
        {
            "timezone_id": 172,
            "name": "Antarctica\/Mawson",
            "utc": "(GMT+05:00) Mawson",
            "active": 1
        },
        {
            "timezone_id": 173,
            "name": "Asia\/Aqtau",
            "utc": "(GMT+05:00) Aqtau",
            "active": 1
        },
        {
            "timezone_id": 174,
            "name": "Asia\/Aqtobe",
            "utc": "(GMT+05:00) Aqtobe",
            "active": 1
        },
        {
            "timezone_id": 175,
            "name": "Asia\/Ashgabat",
            "utc": "(GMT+05:00) Ashgabat",
            "active": 1
        },
        {
            "timezone_id": 176,
            "name": "Asia\/Dushanbe",
            "utc": "(GMT+05:00) Dushanbe",
            "active": 1
        },
        {
            "timezone_id": 177,
            "name": "Asia\/Karachi",
            "utc": "(GMT+05:00) Karachi",
            "active": 1
        },
        {
            "timezone_id": 178,
            "name": "Asia\/Tashkent",
            "utc": "(GMT+05:00) Tashkent",
            "active": 1
        },
        {
            "timezone_id": 179,
            "name": "Asia\/Yekaterinburg",
            "utc": "(GMT+05:00) Moscow+02 - Yekaterinburg",
            "active": 1
        },
        {
            "timezone_id": 180,
            "name": "Indian\/Kerguelen",
            "utc": "(GMT+05:00) Kerguelen",
            "active": 1
        },
        {
            "timezone_id": 181,
            "name": "Indian\/Maldives",
            "utc": "(GMT+05:00) Maldives",
            "active": 1
        },
        {
            "timezone_id": 182,
            "name": "Asia\/Calcutta",
            "utc": "(GMT+05:30) India Standard Time",
            "active": 1
        },
        {
            "timezone_id": 183,
            "name": "Asia\/Colombo",
            "utc": "(GMT+05:30) Colombo",
            "active": 1
        },
        {
            "timezone_id": 184,
            "name": "Asia\/Katmandu",
            "utc": "(GMT+05:45) Katmandu",
            "active": 1
        },
        {
            "timezone_id": 185,
            "name": "Antarctica\/Vostok",
            "utc": "(GMT+06:00) Vostok",
            "active": 1
        },
        {
            "timezone_id": 186,
            "name": "Asia\/Almaty",
            "utc": "(GMT+06:00) Almaty",
            "active": 1
        },
        {
            "timezone_id": 187,
            "name": "Asia\/Bishkek",
            "utc": "(GMT+06:00) Bishkek",
            "active": 1
        },
        {
            "timezone_id": 188,
            "name": "Asia\/Dhaka",
            "utc": "(GMT+06:00) Dhaka",
            "active": 1
        },
        {
            "timezone_id": 189,
            "name": "Asia\/Omsk",
            "utc": "(GMT+06:00) Moscow+03 - Omsk, Novosibirsk",
            "active": 1
        },
        {
            "timezone_id": 190,
            "name": "Asia\/Thimphu",
            "utc": "(GMT+06:00) Thimphu",
            "active": 1
        },
        {
            "timezone_id": 191,
            "name": "Indian\/Chagos",
            "utc": "(GMT+06:00) Chagos",
            "active": 1
        },
        {
            "timezone_id": 192,
            "name": "Asia\/Rangoon",
            "utc": "(GMT+06:30) Rangoon",
            "active": 1
        },
        {
            "timezone_id": 193,
            "name": "Indian\/Cocos",
            "utc": "(GMT+06:30) Cocos",
            "active": 1
        },
        {
            "timezone_id": 194,
            "name": "Antarctica\/Davis",
            "utc": "(GMT+07:00) Davis",
            "active": 1
        },
        {
            "timezone_id": 195,
            "name": "Asia\/Bangkok",
            "utc": "(GMT+07:00) Bangkok",
            "active": 1
        },
        {
            "timezone_id": 196,
            "name": "Asia\/Hovd",
            "utc": "(GMT+07:00) Hovd",
            "active": 1
        },
        {
            "timezone_id": 197,
            "name": "Asia\/Jakarta",
            "utc": "(GMT+07:00) Jakarta",
            "active": 1
        },
        {
            "timezone_id": 198,
            "name": "Asia\/Krasnoyarsk",
            "utc": "(GMT+07:00) Moscow+04 - Krasnoyarsk",
            "active": 1
        },
        {
            "timezone_id": 199,
            "name": "Asia\/Saigon",
            "utc": "(GMT+07:00) Hanoi",
            "active": 1
        },
        {
            "timezone_id": 200,
            "name": "Asia\/Ho_Chi_Minh",
            "utc": "(GMT+07:00) Ho Chi Minh",
            "active": 1
        },
        {
            "timezone_id": 201,
            "name": "Indian\/Christmas",
            "utc": "(GMT+07:00) Christmas",
            "active": 1
        },
        {
            "timezone_id": 202,
            "name": "Antarctica\/Casey",
            "utc": "(GMT+08:00) Casey",
            "active": 1
        },
        {
            "timezone_id": 203,
            "name": "Asia\/Brunei",
            "utc": "(GMT+08:00) Brunei",
            "active": 1
        },
        {
            "timezone_id": 204,
            "name": "Asia\/Choibalsan",
            "utc": "(GMT+08:00) Choibalsan",
            "active": 1
        },
        {
            "timezone_id": 205,
            "name": "Asia\/Hong_Kong",
            "utc": "(GMT+08:00) Hong Kong",
            "active": 1
        },
        {
            "timezone_id": 206,
            "name": "Asia\/Irkutsk",
            "utc": "(GMT+08:00) Moscow+05 - Irkutsk",
            "active": 1
        },
        {
            "timezone_id": 207,
            "name": "Asia\/Kuala_Lumpur",
            "utc": "(GMT+08:00) Kuala Lumpur",
            "active": 1
        },
        {
            "timezone_id": 208,
            "name": "Asia\/Macau",
            "utc": "(GMT+08:00) Macau",
            "active": 1
        },
        {
            "timezone_id": 209,
            "name": "Asia\/Makassar",
            "utc": "(GMT+08:00) Makassar",
            "active": 1
        },
        {
            "timezone_id": 210,
            "name": "Asia\/Manila",
            "utc": "(GMT+08:00) Manila",
            "active": 1
        },
        {
            "timezone_id": 211,
            "name": "Asia\/Shanghai",
            "utc": "(GMT+08:00) China Time - Beijing",
            "active": 1
        },
        {
            "timezone_id": 212,
            "name": "Asia\/Singapore",
            "utc": "(GMT+08:00) Singapore",
            "active": 1
        },
        {
            "timezone_id": 213,
            "name": "Asia\/Taipei",
            "utc": "(GMT+08:00) Taipei",
            "active": 1
        },
        {
            "timezone_id": 214,
            "name": "Asia\/Ulaanbaatar",
            "utc": "(GMT+08:00) Ulaanbaatar",
            "active": 1
        },
        {
            "timezone_id": 215,
            "name": "Australia\/Perth",
            "utc": "(GMT+08:00) Western Time - Perth",
            "active": 1
        },
        {
            "timezone_id": 216,
            "name": "Asia\/Pyongyang",
            "utc": "(GMT+08:30) Pyongyang",
            "active": 1
        },
        {
            "timezone_id": 217,
            "name": "Asia\/Dili",
            "utc": "(GMT+09:00) Dili",
            "active": 1
        },
        {
            "timezone_id": 218,
            "name": "Asia\/Jayapura",
            "utc": "(GMT+09:00) Jayapura",
            "active": 1
        },
        {
            "timezone_id": 219,
            "name": "Asia\/Seoul",
            "utc": "(GMT+09:00) Seoul",
            "active": 1
        },
        {
            "timezone_id": 220,
            "name": "Asia\/Tokyo",
            "utc": "(GMT+09:00) Tokyo",
            "active": 1
        },
        {
            "timezone_id": 221,
            "name": "Asia\/Yakutsk",
            "utc": "(GMT+09:00) Moscow+06 - Yakutsk",
            "active": 1
        },
        {
            "timezone_id": 222,
            "name": "Pacific\/Palau",
            "utc": "(GMT+09:00) Palau",
            "active": 1
        },
        {
            "timezone_id": 223,
            "name": "Australia\/Adelaide",
            "utc": "(GMT+10:30) Central Time - Adelaide",
            "active": 1
        },
        {
            "timezone_id": 224,
            "name": "Australia\/Darwin",
            "utc": "(GMT+09:30) Central Time - Darwin",
            "active": 1
        },
        {
            "timezone_id": 225,
            "name": "Antarctica\/DumontDUrville",
            "utc": "(GMT+10:00) Dumont D'Urville",
            "active": 1
        },
        {
            "timezone_id": 226,
            "name": "Asia\/Magadan",
            "utc": "(GMT+10:00) Moscow+07 - Magadan",
            "active": 1
        },
        {
            "timezone_id": 227,
            "name": "Asia\/Vladivostok",
            "utc": "(GMT+10:00) Moscow+07 - Yuzhno-Sakhalinsk",
            "active": 1
        },
        {
            "timezone_id": 228,
            "name": "Australia\/Brisbane",
            "utc": "(GMT+10:00) Eastern Time - Brisbane",
            "active": 1
        },
        {
            "timezone_id": 229,
            "name": "Australia\/Hobart",
            "utc": "(GMT+11:00) Eastern Time - Hobart",
            "active": 1
        },
        {
            "timezone_id": 230,
            "name": "Australia\/Sydney",
            "utc": "(GMT+11:00) Eastern Time - Melbourne, Sydney",
            "active": 1
        },
        {
            "timezone_id": 231,
            "name": "Pacific\/Chuuk",
            "utc": "(GMT+10:00) Truk",
            "active": 1
        },
        {
            "timezone_id": 232,
            "name": "Pacific\/Guam",
            "utc": "(GMT+10:00) Guam",
            "active": 1
        },
        {
            "timezone_id": 233,
            "name": "Pacific\/Port_Moresby",
            "utc": "(GMT+10:00) Port Moresby",
            "active": 1
        },
        {
            "timezone_id": 234,
            "name": "Pacific\/Efate",
            "utc": "(GMT+11:00) Efate",
            "active": 1
        },
        {
            "timezone_id": 235,
            "name": "Pacific\/Guadalcanal",
            "utc": "(GMT+11:00) Guadalcanal",
            "active": 1
        },
        {
            "timezone_id": 236,
            "name": "Pacific\/Kosrae",
            "utc": "(GMT+11:00) Kosrae",
            "active": 1
        },
        {
            "timezone_id": 237,
            "name": "Pacific\/Norfolk",
            "utc": "(GMT+11:00) Norfolk",
            "active": 1
        },
        {
            "timezone_id": 238,
            "name": "Pacific\/Noumea",
            "utc": "(GMT+11:00) Noumea",
            "active": 1
        },
        {
            "timezone_id": 239,
            "name": "Pacific\/Pohnpei",
            "utc": "(GMT+11:00) Ponape",
            "active": 1
        },
        {
            "timezone_id": 240,
            "name": "Asia\/Kamchatka",
            "utc": "(GMT+12:00) Moscow+09 - Petropavlovsk-Kamchatskiy",
            "active": 1
        },
        {
            "timezone_id": 241,
            "name": "Pacific\/Auckland",
            "utc": "(GMT+13:00) Auckland",
            "active": 1
        },
        {
            "timezone_id": 242,
            "name": "Pacific\/Fiji",
            "utc": "(GMT+13:00) Fiji",
            "active": 1
        },
        {
            "timezone_id": 243,
            "name": "Pacific\/Funafuti",
            "utc": "(GMT+12:00) Funafuti",
            "active": 1
        },
        {
            "timezone_id": 244,
            "name": "Pacific\/Kwajalein",
            "utc": "(GMT+12:00) Kwajalein",
            "active": 1
        },
        {
            "timezone_id": 245,
            "name": "Pacific\/Majuro",
            "utc": "(GMT+12:00) Majuro",
            "active": 1
        },
        {
            "timezone_id": 246,
            "name": "Pacific\/Nauru",
            "utc": "(GMT+12:00) Nauru",
            "active": 1
        },
        {
            "timezone_id": 247,
            "name": "Pacific\/Tarawa",
            "utc": "(GMT+12:00) Tarawa",
            "active": 1
        },
        {
            "timezone_id": 248,
            "name": "Pacific\/Wake",
            "utc": "(GMT+12:00) Wake",
            "active": 1
        },
        {
            "timezone_id": 249,
            "name": "Pacific\/Wallis",
            "utc": "(GMT+12:00) Wallis",
            "active": 1
        },
        {
            "timezone_id": 250,
            "name": "Pacific\/Apia",
            "utc": "(GMT+14:00) Apia",
            "active": 1
        },
        {
            "timezone_id": 251,
            "name": "Pacific\/Enderbury",
            "utc": "(GMT+13:00) Enderbury",
            "active": 1
        },
        {
            "timezone_id": 252,
            "name": "Pacific\/Fakaofo",
            "utc": "(GMT+13:00) Fakaofo",
            "active": 1
        },
        {
            "timezone_id": 253,
            "name": "Pacific\/Tongatapu",
            "utc": "(GMT+13:00) Tongatapu",
            "active": 1
        },
        {
            "timezone_id": 254,
            "name": "Pacific\/Kiritimati",
            "utc": "(GMT+14:00) Kiritimati",
            "active": 1
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-timezone-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-timezone-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-timezone-all"></code></pre>
</div>
<div id="execution-error-GETapi-timezone-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-timezone-all"></code></pre>
</div>
<form id="form-GETapi-timezone-all" data-method="GET" data-path="api/timezone/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-timezone-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-timezone-all" onclick="tryItOut('GETapi-timezone-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-timezone-all" onclick="cancelTryOut('GETapi-timezone-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-timezone-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/timezone/all</code></b>
</p>
</form>
<h2>All Active timezones</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://api.strongminds.made.ke/api/timezone/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://api.strongminds.made.ke/api/timezone/active"
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
    'https://api.strongminds.made.ke/api/timezone/active',
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

url = 'https://api.strongminds.made.ke/api/timezone/active'
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
            "timezone_id": 4,
            "name": "Algeria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 5,
            "name": "American Samoa",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 6,
            "name": "Andorra",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 7,
            "name": "Angola",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 8,
            "name": "Anguilla",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 9,
            "name": "Antarctica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 10,
            "name": "Antigua And Barbuda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 11,
            "name": "Argentina",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 12,
            "name": "Armenia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 13,
            "name": "Aruba",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 14,
            "name": "Australia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 15,
            "name": "Austria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 16,
            "name": "Azerbaijan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 17,
            "name": "Bahamas The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 18,
            "name": "Bahrain",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 19,
            "name": "Bangladesh",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 20,
            "name": "Barbados",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 21,
            "name": "Belarus",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 22,
            "name": "Belgium",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 23,
            "name": "Belize",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 24,
            "name": "Benin",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 25,
            "name": "Bermuda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 26,
            "name": "Bhutan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 27,
            "name": "Bolivia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 28,
            "name": "Bosnia and Herzegovina",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 29,
            "name": "Botswana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 30,
            "name": "Bouvet Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 31,
            "name": "Brazil",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 32,
            "name": "British Indian Ocean Territory",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 33,
            "name": "Brunei",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 34,
            "name": "Bulgaria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 35,
            "name": "Burkina Faso",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 36,
            "name": "Burundi",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 37,
            "name": "Cambodia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 38,
            "name": "Cameroon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 39,
            "name": "Canada",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 40,
            "name": "Cape Verde",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 41,
            "name": "Cayman Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 42,
            "name": "Central African Republic",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 43,
            "name": "Chad",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 44,
            "name": "Chile",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 45,
            "name": "China",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 46,
            "name": "Christmas Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 47,
            "name": "Cocos (Keeling) Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 48,
            "name": "Colombia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 49,
            "name": "Comoros",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 50,
            "name": "Congo",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 51,
            "name": "Congo The Democratic Republic Of The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 52,
            "name": "Cook Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 53,
            "name": "Costa Rica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 54,
            "name": "Cote D'Ivoire (Ivory Coast)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 55,
            "name": "Croatia (Hrvatska)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 56,
            "name": "Cuba",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 57,
            "name": "Cyprus",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 58,
            "name": "Czech Republic",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 59,
            "name": "Denmark",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 60,
            "name": "Djibouti",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 61,
            "name": "Dominica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 62,
            "name": "Dominican Republic",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 63,
            "name": "East Timor",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 64,
            "name": "Ecuador",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 65,
            "name": "Egypt",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 66,
            "name": "El Salvador",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 67,
            "name": "Equatorial Guinea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 68,
            "name": "Eritrea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 69,
            "name": "Estonia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 70,
            "name": "Ethiopia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 71,
            "name": "Falkland Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 72,
            "name": "Faroe Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 73,
            "name": "Fiji Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 74,
            "name": "Finland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 75,
            "name": "France",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 76,
            "name": "French Guiana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 77,
            "name": "French Polynesia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 78,
            "name": "French Southern Territories",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 79,
            "name": "Gabon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 80,
            "name": "Gambia The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 81,
            "name": "Georgia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 82,
            "name": "Germany",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 83,
            "name": "Ghana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 84,
            "name": "Gibraltar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 85,
            "name": "Greece",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 86,
            "name": "Greenland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 87,
            "name": "Grenada",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 88,
            "name": "Guadeloupe",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 89,
            "name": "Guam",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 90,
            "name": "Guatemala",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 91,
            "name": "Guernsey and Alderney",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 92,
            "name": "Guinea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 93,
            "name": "Guinea-Bissau",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 94,
            "name": "Guyana",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 95,
            "name": "Haiti",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 96,
            "name": "Heard and McDonald Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 97,
            "name": "Honduras",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 98,
            "name": "Hong Kong S.A.R.",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 99,
            "name": "Hungary",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 100,
            "name": "Iceland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 101,
            "name": "India",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 102,
            "name": "Indonesia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 103,
            "name": "Iran",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 104,
            "name": "Iraq",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 105,
            "name": "Ireland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 106,
            "name": "Israel",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 107,
            "name": "Italy",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 108,
            "name": "Jamaica",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 109,
            "name": "Japan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 110,
            "name": "Jersey",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 111,
            "name": "Jordan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 112,
            "name": "Kazakhstan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 113,
            "name": "Kenya",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 114,
            "name": "Kiribati",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 115,
            "name": "Korea North\n",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 116,
            "name": "Korea South",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 117,
            "name": "Kuwait",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 118,
            "name": "Kyrgyzstan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 119,
            "name": "Laos",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 120,
            "name": "Latvia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 121,
            "name": "Lebanon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 122,
            "name": "Lesotho",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 123,
            "name": "Liberia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 124,
            "name": "Libya",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 125,
            "name": "Liechtenstein",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 126,
            "name": "Lithuania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 127,
            "name": "Luxembourg",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 128,
            "name": "Macau S.A.R.",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 129,
            "name": "Macedonia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 130,
            "name": "Madagascar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 131,
            "name": "Malawi",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 132,
            "name": "Malaysia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 133,
            "name": "Maldives",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 134,
            "name": "Mali",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 135,
            "name": "Malta",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 136,
            "name": "Man (Isle of)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 137,
            "name": "Marshall Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 138,
            "name": "Martinique",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 139,
            "name": "Mauritania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 140,
            "name": "Mauritius",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 141,
            "name": "Mayotte",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 142,
            "name": "Mexico",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 143,
            "name": "Micronesia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 144,
            "name": "Moldova",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 145,
            "name": "Monaco",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 146,
            "name": "Mongolia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 147,
            "name": "Montenegro",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 148,
            "name": "Montserrat",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 149,
            "name": "Morocco",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 150,
            "name": "Mozambique",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 151,
            "name": "Myanmar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 152,
            "name": "Namibia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 153,
            "name": "Nauru",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 154,
            "name": "Nepal",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 155,
            "name": "Netherlands Antilles",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 156,
            "name": "Netherlands The",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 157,
            "name": "New Caledonia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 158,
            "name": "New Zealand",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 159,
            "name": "Nicaragua",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 160,
            "name": "Niger",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 161,
            "name": "Nigeria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 162,
            "name": "Niue",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 163,
            "name": "Norfolk Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 164,
            "name": "Northern Mariana Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 165,
            "name": "Norway",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 166,
            "name": "Oman",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 167,
            "name": "Pakistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 168,
            "name": "Palau",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 169,
            "name": "Palestinian Territory Occupied",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 170,
            "name": "Panama",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 171,
            "name": "Papua new Guinea",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 172,
            "name": "Paraguay",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 173,
            "name": "Peru",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 174,
            "name": "Philippines",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 175,
            "name": "Pitcairn Island",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 176,
            "name": "Poland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 177,
            "name": "Portugal",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 178,
            "name": "Puerto Rico",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 179,
            "name": "Qatar",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 180,
            "name": "Reunion",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 181,
            "name": "Romania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 182,
            "name": "Russia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 183,
            "name": "Rwanda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 184,
            "name": "Saint Helena",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 185,
            "name": "Saint Kitts And Nevis",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 186,
            "name": "Saint Lucia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 187,
            "name": "Saint Pierre and Miquelon",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 188,
            "name": "Saint Vincent And The Grenadines",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 189,
            "name": "Saint-Barthelemy",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 190,
            "name": "Saint-Martin (French part)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 191,
            "name": "Samoa",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 192,
            "name": "San Marino",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 193,
            "name": "Sao Tome and Principe",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 194,
            "name": "Saudi Arabia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 195,
            "name": "Senegal",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 196,
            "name": "Serbia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 197,
            "name": "Seychelles",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 198,
            "name": "Sierra Leone",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 199,
            "name": "Singapore",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 200,
            "name": "Slovakia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 201,
            "name": "Slovenia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 202,
            "name": "Solomon Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 203,
            "name": "Somalia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 204,
            "name": "South Africa",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 205,
            "name": "South Georgia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 206,
            "name": "South Sudan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 207,
            "name": "Spain",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 208,
            "name": "Sri Lanka",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 209,
            "name": "Sudan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 210,
            "name": "Suriname",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 211,
            "name": "Svalbard And Jan Mayen Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 212,
            "name": "Swaziland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 213,
            "name": "Sweden",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 214,
            "name": "Switzerland",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 215,
            "name": "Syria",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 216,
            "name": "Taiwan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 217,
            "name": "Tajikistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 218,
            "name": "Tanzania",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 219,
            "name": "Thailand",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 220,
            "name": "Togo",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 221,
            "name": "Tokelau",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 222,
            "name": "Tonga",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 223,
            "name": "Trinidad And Tobago",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 224,
            "name": "Tunisia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 225,
            "name": "Turkey",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 226,
            "name": "Turkmenistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 227,
            "name": "Turks And Caicos Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 228,
            "name": "Tuvalu",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 229,
            "name": "Uganda",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 230,
            "name": "Ukraine",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 231,
            "name": "United Arab Emirates",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 232,
            "name": "United Kingdom",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 233,
            "name": "United States",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 234,
            "name": "United States Minor Outlying Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 235,
            "name": "Uruguay",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 236,
            "name": "Uzbekistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 237,
            "name": "Vanuatu",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 238,
            "name": "Vatican City State (Holy See)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 239,
            "name": "Venezuela",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 240,
            "name": "Vietnam",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 241,
            "name": "Virgin Islands (British)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 242,
            "name": "Virgin Islands (US)",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 243,
            "name": "Wallis And Futuna Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 244,
            "name": "Western Sahara",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 245,
            "name": "Yemen",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 246,
            "name": "Zambia",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 247,
            "name": "Zimbabwe",
            "utc": null,
            "active": 1
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-timezone-active" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-timezone-active"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-timezone-active"></code></pre>
</div>
<div id="execution-error-GETapi-timezone-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-timezone-active"></code></pre>
</div>
<form id="form-GETapi-timezone-active" data-method="GET" data-path="api/timezone/active" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-timezone-active', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-timezone-active" onclick="tryItOut('GETapi-timezone-active');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-timezone-active" onclick="cancelTryOut('GETapi-timezone-active');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-timezone-active" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/timezone/active</code></b>
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