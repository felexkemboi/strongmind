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

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">
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
            <li>Last updated: October 11 2021</li>
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
    var baseUrl = "http://localhost:8000";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.7.10.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre><h1>Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Auth</h1>
<p>APIs for roles and permissions</p>
<h2>All Permissions</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/permission/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/permission/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>All Roles</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/role/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/role/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Get Role by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/role/view/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/role/view/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Create Role</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/role/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"non","role_code":"consequatur","description":"est","access_permissions":[9,6]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/role/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'non',
            'role_code' =&gt; 'consequatur',
            'description' =&gt; 'est',
            'access_permissions' =&gt; [
                9,
                6,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Update Role</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/role/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"qui","role_code":"voluptatem","description":"voluptatem","access_permissions":[12,19]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/role/update/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'qui',
            'role_code' =&gt; 'voluptatem',
            'description' =&gt; 'voluptatem',
            'access_permissions' =&gt; [
                12,
                19,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Delete Role by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/role/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/role/delete/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Login User</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"earum","password":"earum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/login',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'email' =&gt; 'earum',
            'password' =&gt; 'earum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>User profile</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/auth/profile" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/auth/profile',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Update user profile.</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/auth/profile/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"magnam","email":"voluptatem","phone_number":"eum","timezone_id":2,"gender":"male","region":"East Africa","city":"Nairobi","languages":["laboriosam","voluptas"]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/auth/profile/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'magnam',
            'email' =&gt; 'voluptatem',
            'phone_number' =&gt; 'eum',
            'timezone_id' =&gt; 2,
            'gender' =&gt; 'male',
            'region' =&gt; 'East Africa',
            'city' =&gt; 'Nairobi',
            'languages' =&gt; [
                'laboriosam',
                'voluptas',
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Change a user&#039;s password.</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/auth/change-password" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"current_password":"culpa","new_password":"deleniti"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/auth/change-password',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'current_password' =&gt; 'culpa',
            'new_password' =&gt; 'deleniti',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Set profile photo.</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/profile/set-photo" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -F "profile_pic=@/tmp/phpXInQfE" </code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/profile/set-photo',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'profile_pic',
                'contents' =&gt; fopen('/tmp/phpXInQfE', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Password Reset Link</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/passwords/reset-link" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"et"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/passwords/reset-link',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'email' =&gt; 'et',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Reset Password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/auth/passwords/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"token":"quo","password":"et"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/auth/passwords/reset',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'token' =&gt; 'quo',
            'password' =&gt; 'et',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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

</form><h1>Clients</h1>
<p>APIs for clients</p>
<h2>List|Filter|Search|Paginate|Sort Clients</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/clients/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"eveniet","phone":17,"country":20,"filter":"error","channel":20,"status":11,"client_type":"beatae","pagination_items":5,"records_per_page":3}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/clients/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'eveniet',
            'phone' =&gt; 17,
            'country' =&gt; 20,
            'filter' =&gt; 'error',
            'channel' =&gt; 20,
            'status' =&gt; 11,
            'client_type' =&gt; 'beatae',
            'pagination_items' =&gt; 5,
            'records_per_page' =&gt; 3,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Create Client</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/clients/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"ut","gender":"quia","phone_number":3,"country_id":11,"region":"et","city":"vel","timezone_id":14,"languages":"et","age":7,"status_id":15,"channel_id":9}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/clients/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'ut',
            'gender' =&gt; 'quia',
            'phone_number' =&gt; 3,
            'country_id' =&gt; 11,
            'region' =&gt; 'et',
            'city' =&gt; 'vel',
            'timezone_id' =&gt; 14,
            'languages' =&gt; 'et',
            'age' =&gt; 7,
            'status_id' =&gt; 15,
            'channel_id' =&gt; 9,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Get Client by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/clients/1/details" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/clients/1/details',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Activate  Clients</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/clients/therapy/activate" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"users":"aut"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/clients/therapy/activate',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'users' =&gt; 'aut',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Update Client Profile</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8000/api/clients/10/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"molestiae","gender":"et","phone_number":6,"country_id":10,"region":"enim","city":"fuga","timezone_id":18,"age":3}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://localhost:8000/api/clients/10/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'molestiae',
            'gender' =&gt; 'et',
            'phone_number' =&gt; 6,
            'country_id' =&gt; 10,
            'region' =&gt; 'enim',
            'city' =&gt; 'fuga',
            'timezone_id' =&gt; 18,
            'age' =&gt; 3,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Transfer Client</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8000/api/clients/11/transfer" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"staff_id":18}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://localhost:8000/api/clients/11/transfer',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'staff_id' =&gt; 18,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Bulk Edit Clients</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8000/api/clients/bulk-edit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"client_id":"quam","age":17,"gender":"voluptas","region":"nihil"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://localhost:8000/api/clients/bulk-edit',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'client_id' =&gt; 'quam',
            'age' =&gt; 17,
            'gender' =&gt; 'voluptas',
            'region' =&gt; 'nihil',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Get clients from other sources</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/clients/rerum/activity" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"id":11}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/clients/rerum/activity',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'id' =&gt; 11,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Add Client Notes</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/clients/7/notes/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"private":true,"notes":"voluptas"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/clients/7/notes/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'private' =&gt; true,
            'notes' =&gt; 'voluptas',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>List Client Public Notes</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/clients/19/notes/public" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/clients/19/notes/public',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>List Client Private Notes</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/clients/10/notes/private" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/clients/10/notes/private',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
</form><h1>Misc</h1>
<h2>All Statuses</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/status/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/status/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Create Status</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/status/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"rerum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/status/create"
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
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/status/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'rerum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Update Status</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/status/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"non"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/status/update/1"
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
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/status/update/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'non',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Delete Status by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/status/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/status/delete/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>All Channels</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/channels/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/channels/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Create Channel</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/channels/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"voluptatem"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/channels/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "voluptatem"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/channels/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'voluptatem',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Update Channel</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/channels/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"commodi"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/channels/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "commodi"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/channels/update/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'commodi',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Delete Channel by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/channels/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/channels/delete/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>All Group Types</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/group-types/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/group-types/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Create Group Type</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/group-types/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"rerum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/group-types/create"
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
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/group-types/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'rerum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Update Group Type</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/group-types/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"illum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/group-types/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "illum"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/group-types/update/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'illum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Delete GroupType by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/group-types/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/group-types/delete/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>All Program Types</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/program-types/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/program-types/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
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
<h2>Create Program Type</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/program-types/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"modi"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/program-types/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "modi"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/program-types/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'modi',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Update Program Type</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/program-types/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"dignissimos"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/program-types/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "dignissimos"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/program-types/update/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'dignissimos',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<h2>Delete ProgramType by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/program-types/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/program-types/delete/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
</form><h1>Offices</h1>
<p>APIs for managing offices</p>
<h2>All offices</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/office/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/all"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/office/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-office-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-office-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-office-all"></code></pre>
</div>
<div id="execution-error-GETapi-office-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-office-all"></code></pre>
</div>
<form id="form-GETapi-office-all" data-method="GET" data-path="api/office/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-office-all', this);">
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
<p>
<label id="auth-GETapi-office-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-office-all" data-component="header"></label>
</p>
</form>
<h2>create office</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/office/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"country_id":8,"name":"expedita"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "country_id": 8,
    "name": "expedita"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/office/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'country_id' =&gt; 8,
            'name' =&gt; 'expedita',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-office-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-office-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-office-create"></code></pre>
</div>
<div id="execution-error-POSTapi-office-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-office-create"></code></pre>
</div>
<form id="form-POSTapi-office-create" data-method="POST" data-path="api/office/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-office-create', this);">
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
<p>
<label id="auth-POSTapi-office-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-office-create" data-component="header"></label>
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
Office Name
</p>

</form>
<h2>update office</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/office/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"country_id":14,"name":"iure","active":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "country_id": 14,
    "name": "iure",
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
    'http://localhost:8000/api/office/update/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'country_id' =&gt; 14,
            'name' =&gt; 'iure',
            'active' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-PUTapi-office-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-office-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-office-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-office-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-office-update--id-"></code></pre>
</div>
<form id="form-PUTapi-office-update--id-" data-method="PUT" data-path="api/office/update/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-office-update--id-', this);">
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
<p>
<label id="auth-PUTapi-office-update--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-office-update--id-" data-component="header"></label>
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
<h2>List All Office Users</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/office/1/members" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/1/members"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/office/1/members',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-office--id--members" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-office--id--members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-office--id--members"></code></pre>
</div>
<div id="execution-error-GETapi-office--id--members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-office--id--members"></code></pre>
</div>
<form id="form-GETapi-office--id--members" data-method="GET" data-path="api/office/{id}/members" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-office--id--members', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-office--id--members" onclick="tryItOut('GETapi-office--id--members');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-office--id--members" onclick="cancelTryOut('GETapi-office--id--members');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-office--id--members" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/office/{id}/members</code></b>
</p>
<p>
<label id="auth-GETapi-office--id--members" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-office--id--members" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-office--id--members" data-component="url" required  hidden>
<br>
Office ID .
</p>
</form>
<h2>List All Office Programs</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/office/1/programs" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/1/programs"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/office/1/programs',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-office--id--programs" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-office--id--programs"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-office--id--programs"></code></pre>
</div>
<div id="execution-error-GETapi-office--id--programs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-office--id--programs"></code></pre>
</div>
<form id="form-GETapi-office--id--programs" data-method="GET" data-path="api/office/{id}/programs" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-office--id--programs', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-office--id--programs" onclick="tryItOut('GETapi-office--id--programs');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-office--id--programs" onclick="cancelTryOut('GETapi-office--id--programs');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-office--id--programs" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/office/{id}/programs</code></b>
</p>
<p>
<label id="auth-GETapi-office--id--programs" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-office--id--programs" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-office--id--programs" data-component="url" required  hidden>
<br>
Office ID .
</p>
</form>
<h2>Delete an office</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/office/delete/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/office/delete/1"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/office/delete/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-DELETEapi-office-delete--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-office-delete--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-office-delete--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-office-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-office-delete--id-"></code></pre>
</div>
<form id="form-DELETEapi-office-delete--id-" data-method="DELETE" data-path="api/office/delete/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-office-delete--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-office-delete--id-" onclick="tryItOut('DELETEapi-office-delete--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-office-delete--id-" onclick="cancelTryOut('DELETEapi-office-delete--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-office-delete--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/office/delete/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-office-delete--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-office-delete--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-office-delete--id-" data-component="url" required  hidden>
<br>
Office ID .
</p>
</form><h1>Programs</h1>
<p>API Endpoints for managing programs</p>
<h2>List Programs</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/programs/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/all"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/programs/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-programs-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-programs-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-programs-all"></code></pre>
</div>
<div id="execution-error-GETapi-programs-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-programs-all"></code></pre>
</div>
<form id="form-GETapi-programs-all" data-method="GET" data-path="api/programs/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-programs-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-programs-all" onclick="tryItOut('GETapi-programs-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-programs-all" onclick="cancelTryOut('GETapi-programs-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-programs-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/programs/all</code></b>
</p>
<p>
<label id="auth-GETapi-programs-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-programs-all" data-component="header"></label>
</p>
</form>
<h2>Create Program</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/programs/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"non","office_id":20,"program_code":"qui","program_type_id":4,"colour_option":"quos"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "non",
    "office_id": 20,
    "program_code": "qui",
    "program_type_id": 4,
    "colour_option": "quos"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/programs/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'non',
            'office_id' =&gt; 20,
            'program_code' =&gt; 'qui',
            'program_type_id' =&gt; 4,
            'colour_option' =&gt; 'quos',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-programs-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-programs-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-programs-create"></code></pre>
</div>
<div id="execution-error-POSTapi-programs-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-programs-create"></code></pre>
</div>
<form id="form-POSTapi-programs-create" data-method="POST" data-path="api/programs/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-programs-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-programs-create" onclick="tryItOut('POSTapi-programs-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-programs-create" onclick="cancelTryOut('POSTapi-programs-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-programs-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/programs/create</code></b>
</p>
<p>
<label id="auth-POSTapi-programs-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-programs-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-programs-create" data-component="body" required  hidden>
<br>
Program Name
</p>
<p>
<b><code>office_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="office_id" data-endpoint="POSTapi-programs-create" data-component="body" required  hidden>
<br>
Office ID. Example-1
</p>
<p>
<b><code>program_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="program_code" data-endpoint="POSTapi-programs-create" data-component="body" required  hidden>
<br>
Program Code
</p>
<p>
<b><code>program_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="program_type_id" data-endpoint="POSTapi-programs-create" data-component="body" required  hidden>
<br>
Program Type. Example-1
</p>
<p>
<b><code>colour_option</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="colour_option" data-endpoint="POSTapi-programs-create" data-component="body"  hidden>
<br>
Colour Code
</p>

</form>
<h2>Display Program Details</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/programs/8/details" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/8/details"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/programs/8/details',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-programs--id--details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-programs--id--details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-programs--id--details"></code></pre>
</div>
<div id="execution-error-GETapi-programs--id--details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-programs--id--details"></code></pre>
</div>
<form id="form-GETapi-programs--id--details" data-method="GET" data-path="api/programs/{id}/details" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-programs--id--details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-programs--id--details" onclick="tryItOut('GETapi-programs--id--details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-programs--id--details" onclick="cancelTryOut('GETapi-programs--id--details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-programs--id--details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/programs/{id}/details</code></b>
</p>
<p>
<label id="auth-GETapi-programs--id--details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-programs--id--details" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-programs--id--details" data-component="url" required  hidden>
<br>
The Program ID. Example-1
</p>
</form>
<h2>Update Program</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8000/api/programs/6/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"suscipit","office_id":16,"program_code":"consequuntur","program_type_id":10,"colour_option":"sapiente"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/6/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "suscipit",
    "office_id": 16,
    "program_code": "consequuntur",
    "program_type_id": 10,
    "colour_option": "sapiente"
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://localhost:8000/api/programs/6/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'suscipit',
            'office_id' =&gt; 16,
            'program_code' =&gt; 'consequuntur',
            'program_type_id' =&gt; 10,
            'colour_option' =&gt; 'sapiente',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-PATCHapi-programs--id--update" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-programs--id--update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-programs--id--update"></code></pre>
</div>
<div id="execution-error-PATCHapi-programs--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-programs--id--update"></code></pre>
</div>
<form id="form-PATCHapi-programs--id--update" data-method="PATCH" data-path="api/programs/{id}/update" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-programs--id--update', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-programs--id--update" onclick="tryItOut('PATCHapi-programs--id--update');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-programs--id--update" onclick="cancelTryOut('PATCHapi-programs--id--update');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-programs--id--update" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/programs/{id}/update</code></b>
</p>
<p>
<label id="auth-PATCHapi-programs--id--update" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-programs--id--update" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PATCHapi-programs--id--update" data-component="url" required  hidden>
<br>
the Program ID Example-1
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PATCHapi-programs--id--update" data-component="body" required  hidden>
<br>
The Program Name
</p>
<p>
<b><code>office_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="office_id" data-endpoint="PATCHapi-programs--id--update" data-component="body" required  hidden>
<br>
The Office ID Example-1
</p>
<p>
<b><code>program_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="program_code" data-endpoint="PATCHapi-programs--id--update" data-component="body" required  hidden>
<br>
The Program Code
</p>
<p>
<b><code>program_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="program_type_id" data-endpoint="PATCHapi-programs--id--update" data-component="body" required  hidden>
<br>
The Program Type ID Example-1
</p>
<p>
<b><code>colour_option</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="colour_option" data-endpoint="PATCHapi-programs--id--update" data-component="body" required  hidden>
<br>
the Program Colour Code
</p>

</form>
<h2>Delete Program</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/programs/12/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/12/delete"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/programs/12/delete',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-DELETEapi-programs--id--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-programs--id--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-programs--id--delete"></code></pre>
</div>
<div id="execution-error-DELETEapi-programs--id--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-programs--id--delete"></code></pre>
</div>
<form id="form-DELETEapi-programs--id--delete" data-method="DELETE" data-path="api/programs/{id}/delete" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-programs--id--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-programs--id--delete" onclick="tryItOut('DELETEapi-programs--id--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-programs--id--delete" onclick="cancelTryOut('DELETEapi-programs--id--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-programs--id--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/programs/{id}/delete</code></b>
</p>
<p>
<label id="auth-DELETEapi-programs--id--delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-programs--id--delete" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-programs--id--delete" data-component="url" required  hidden>
<br>
The Program ID Example-1
</p>
</form>
<h2>Send Member Invites</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/programs/invite/8/send" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"et","member_type_id":13}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/invite/8/send"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "email": "et",
    "member_type_id": 13
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/programs/invite/8/send',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'email' =&gt; 'et',
            'member_type_id' =&gt; 13,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-programs-invite--id--send" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-programs-invite--id--send"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-programs-invite--id--send"></code></pre>
</div>
<div id="execution-error-POSTapi-programs-invite--id--send" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-programs-invite--id--send"></code></pre>
</div>
<form id="form-POSTapi-programs-invite--id--send" data-method="POST" data-path="api/programs/invite/{id}/send" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-programs-invite--id--send', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-programs-invite--id--send" onclick="tryItOut('POSTapi-programs-invite--id--send');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-programs-invite--id--send" onclick="cancelTryOut('POSTapi-programs-invite--id--send');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-programs-invite--id--send" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/programs/invite/{id}/send</code></b>
</p>
<p>
<label id="auth-POSTapi-programs-invite--id--send" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-programs-invite--id--send" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-programs-invite--id--send" data-component="url" required  hidden>
<br>
The Program ID
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-programs-invite--id--send" data-component="body" required  hidden>
<br>
The User Email Address
</p>
<p>
<b><code>member_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="member_type_id" data-endpoint="POSTapi-programs-invite--id--send" data-component="body"  hidden>
<br>
The Member Type ID
</p>

</form>
<h2>List Program Member Types</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/programs/member-types" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/member-types"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/programs/member-types',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-programs-member-types" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-programs-member-types"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-programs-member-types"></code></pre>
</div>
<div id="execution-error-GETapi-programs-member-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-programs-member-types"></code></pre>
</div>
<form id="form-GETapi-programs-member-types" data-method="GET" data-path="api/programs/member-types" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-programs-member-types', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-programs-member-types" onclick="tryItOut('GETapi-programs-member-types');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-programs-member-types" onclick="cancelTryOut('GETapi-programs-member-types');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-programs-member-types" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/programs/member-types</code></b>
</p>
<p>
<label id="auth-GETapi-programs-member-types" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-programs-member-types" data-component="header"></label>
</p>
</form>
<h2>Create Program Member Type</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/programs/member-types/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"ea"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/member-types/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "ea"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/programs/member-types/create',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'ea',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-programs-member-types-create" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-programs-member-types-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-programs-member-types-create"></code></pre>
</div>
<div id="execution-error-POSTapi-programs-member-types-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-programs-member-types-create"></code></pre>
</div>
<form id="form-POSTapi-programs-member-types-create" data-method="POST" data-path="api/programs/member-types/create" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-programs-member-types-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-programs-member-types-create" onclick="tryItOut('POSTapi-programs-member-types-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-programs-member-types-create" onclick="cancelTryOut('POSTapi-programs-member-types-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-programs-member-types-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/programs/member-types/create</code></b>
</p>
<p>
<label id="auth-POSTapi-programs-member-types-create" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-programs-member-types-create" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-programs-member-types-create" data-component="body"  hidden>
<br>
required. The Member Type Name
</p>

</form>
<h2>Program Member Type Details</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/programs/member-types/8/details" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/member-types/8/details"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/programs/member-types/8/details',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-programs-member-types--id--details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-programs-member-types--id--details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-programs-member-types--id--details"></code></pre>
</div>
<div id="execution-error-GETapi-programs-member-types--id--details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-programs-member-types--id--details"></code></pre>
</div>
<form id="form-GETapi-programs-member-types--id--details" data-method="GET" data-path="api/programs/member-types/{id}/details" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-programs-member-types--id--details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-programs-member-types--id--details" onclick="tryItOut('GETapi-programs-member-types--id--details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-programs-member-types--id--details" onclick="cancelTryOut('GETapi-programs-member-types--id--details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-programs-member-types--id--details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/programs/member-types/{id}/details</code></b>
</p>
<p>
<label id="auth-GETapi-programs-member-types--id--details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-programs-member-types--id--details" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-programs-member-types--id--details" data-component="url" required  hidden>
<br>
The Member Type ID. Example 1
</p>
</form>
<h2>Update Program Member Type</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8000/api/programs/member-types/voluptas/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"amet"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/member-types/voluptas/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "amet"
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://localhost:8000/api/programs/member-types/voluptas/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'amet',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-PATCHapi-programs-member-types--id--update" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-programs-member-types--id--update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-programs-member-types--id--update"></code></pre>
</div>
<div id="execution-error-PATCHapi-programs-member-types--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-programs-member-types--id--update"></code></pre>
</div>
<form id="form-PATCHapi-programs-member-types--id--update" data-method="PATCH" data-path="api/programs/member-types/{id}/update" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-programs-member-types--id--update', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-programs-member-types--id--update" onclick="tryItOut('PATCHapi-programs-member-types--id--update');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-programs-member-types--id--update" onclick="cancelTryOut('PATCHapi-programs-member-types--id--update');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-programs-member-types--id--update" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/programs/member-types/{id}/update</code></b>
</p>
<p>
<label id="auth-PATCHapi-programs-member-types--id--update" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-programs-member-types--id--update" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PATCHapi-programs-member-types--id--update" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PATCHapi-programs-member-types--id--update" data-component="body" required  hidden>
<br>
The program Member Type Name
</p>

</form>
<h2>Delete Program Member Type</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/programs/member-types/17/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/member-types/17/delete"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/programs/member-types/17/delete',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-DELETEapi-programs-member-types--id--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-programs-member-types--id--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-programs-member-types--id--delete"></code></pre>
</div>
<div id="execution-error-DELETEapi-programs-member-types--id--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-programs-member-types--id--delete"></code></pre>
</div>
<form id="form-DELETEapi-programs-member-types--id--delete" data-method="DELETE" data-path="api/programs/member-types/{id}/delete" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-programs-member-types--id--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-programs-member-types--id--delete" onclick="tryItOut('DELETEapi-programs-member-types--id--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-programs-member-types--id--delete" onclick="cancelTryOut('DELETEapi-programs-member-types--id--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-programs-member-types--id--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/programs/member-types/{id}/delete</code></b>
</p>
<p>
<label id="auth-DELETEapi-programs-member-types--id--delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-programs-member-types--id--delete" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-programs-member-types--id--delete" data-component="url" required  hidden>
<br>
The Program Member Type ID Example , 1
</p>
</form>
<h2>List Program Members</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/programs/1/members" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/1/members"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/programs/1/members',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-programs--id--members" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-programs--id--members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-programs--id--members"></code></pre>
</div>
<div id="execution-error-GETapi-programs--id--members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-programs--id--members"></code></pre>
</div>
<form id="form-GETapi-programs--id--members" data-method="GET" data-path="api/programs/{id}/members" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-programs--id--members', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-programs--id--members" onclick="tryItOut('GETapi-programs--id--members');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-programs--id--members" onclick="cancelTryOut('GETapi-programs--id--members');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-programs--id--members" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/programs/{id}/members</code></b>
</p>
<p>
<label id="auth-GETapi-programs--id--members" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-programs--id--members" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-programs--id--members" data-component="url" required  hidden>
<br>
The Program ID Example-1
</p>
</form>
<h2>Add New Member|Members</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/programs/15/new-members" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"user_id":"nam","member_type_id":17}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/15/new-members"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "user_id": "nam",
    "member_type_id": 17
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/programs/15/new-members',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'user_id' =&gt; 'nam',
            'member_type_id' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-programs--id--new-members" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-programs--id--new-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-programs--id--new-members"></code></pre>
</div>
<div id="execution-error-POSTapi-programs--id--new-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-programs--id--new-members"></code></pre>
</div>
<form id="form-POSTapi-programs--id--new-members" data-method="POST" data-path="api/programs/{id}/new-members" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-programs--id--new-members', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-programs--id--new-members" onclick="tryItOut('POSTapi-programs--id--new-members');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-programs--id--new-members" onclick="cancelTryOut('POSTapi-programs--id--new-members');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-programs--id--new-members" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/programs/{id}/new-members</code></b>
</p>
<p>
<label id="auth-POSTapi-programs--id--new-members" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-programs--id--new-members" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-programs--id--new-members" data-component="url" required  hidden>
<br>
the Program ID
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="user_id" data-endpoint="POSTapi-programs--id--new-members" data-component="body"  hidden>
<br>
User ID Example-1
</p>
<p>
<b><code>member_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="member_type_id" data-endpoint="POSTapi-programs--id--new-members" data-component="body" required  hidden>
<br>
Member Type ID. Example -1
</p>

</form>
<h2>Revoke Program Membership</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/programs/6/revoke-membership" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"user_id":9,"member_type_id":2}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/6/revoke-membership"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "user_id": 9,
    "member_type_id": 2
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/programs/6/revoke-membership',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'user_id' =&gt; 9,
            'member_type_id' =&gt; 2,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-programs--id--revoke-membership" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-programs--id--revoke-membership"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-programs--id--revoke-membership"></code></pre>
</div>
<div id="execution-error-POSTapi-programs--id--revoke-membership" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-programs--id--revoke-membership"></code></pre>
</div>
<form id="form-POSTapi-programs--id--revoke-membership" data-method="POST" data-path="api/programs/{id}/revoke-membership" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-programs--id--revoke-membership', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-programs--id--revoke-membership" onclick="tryItOut('POSTapi-programs--id--revoke-membership');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-programs--id--revoke-membership" onclick="cancelTryOut('POSTapi-programs--id--revoke-membership');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-programs--id--revoke-membership" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/programs/{id}/revoke-membership</code></b>
</p>
<p>
<label id="auth-POSTapi-programs--id--revoke-membership" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-programs--id--revoke-membership" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-programs--id--revoke-membership" data-component="url" required  hidden>
<br>
the program Id.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user_id" data-endpoint="POSTapi-programs--id--revoke-membership" data-component="body" required  hidden>
<br>
User ID
</p>
<p>
<b><code>member_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="member_type_id" data-endpoint="POSTapi-programs--id--revoke-membership" data-component="body" required  hidden>
<br>
The Member Type Id
</p>

</form>
<h2>Activate Program Membership</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/programs/12/activate-membership" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"user_id":2,"member_type_id":11}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/programs/12/activate-membership"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "user_id": 2,
    "member_type_id": 11
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/programs/12/activate-membership',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'user_id' =&gt; 2,
            'member_type_id' =&gt; 11,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-programs--id--activate-membership" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-programs--id--activate-membership"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-programs--id--activate-membership"></code></pre>
</div>
<div id="execution-error-POSTapi-programs--id--activate-membership" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-programs--id--activate-membership"></code></pre>
</div>
<form id="form-POSTapi-programs--id--activate-membership" data-method="POST" data-path="api/programs/{id}/activate-membership" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-programs--id--activate-membership', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-programs--id--activate-membership" onclick="tryItOut('POSTapi-programs--id--activate-membership');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-programs--id--activate-membership" onclick="cancelTryOut('POSTapi-programs--id--activate-membership');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-programs--id--activate-membership" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/programs/{id}/activate-membership</code></b>
</p>
<p>
<label id="auth-POSTapi-programs--id--activate-membership" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-programs--id--activate-membership" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-programs--id--activate-membership" data-component="url" required  hidden>
<br>
the program Id.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user_id" data-endpoint="POSTapi-programs--id--activate-membership" data-component="body" required  hidden>
<br>
User ID
</p>
<p>
<b><code>member_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="member_type_id" data-endpoint="POSTapi-programs--id--activate-membership" data-component="body" required  hidden>
<br>
The Member Type Id
</p>

</form><h1>Shared</h1>
<p>APIs for managing countries</p>
<h2>All Countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/country/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/country/all',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "success",
    "result": {
        "data": [
            {
                "country_id": 1,
                "name": "Afghanistan",
                "dialing_code": "93",
                "country_code": "AF",
                "long_code": "AFG",
                "active": 1
            },
            {
                "country_id": 2,
                "name": "Aland Islands",
                "dialing_code": "+358-18",
                "country_code": "AX",
                "long_code": "ALA",
                "active": 1
            },
            {
                "country_id": 3,
                "name": "Albania",
                "dialing_code": "355",
                "country_code": "AL",
                "long_code": "ALB",
                "active": 1
            },
            {
                "country_id": 4,
                "name": "Algeria",
                "dialing_code": "213",
                "country_code": "DZ",
                "long_code": "DZA",
                "active": 1
            },
            {
                "country_id": 5,
                "name": "American Samoa",
                "dialing_code": "+1-684",
                "country_code": "AS",
                "long_code": "ASM",
                "active": 1
            },
            {
                "country_id": 6,
                "name": "Andorra",
                "dialing_code": "376",
                "country_code": "AD",
                "long_code": "AND",
                "active": 1
            },
            {
                "country_id": 7,
                "name": "Angola",
                "dialing_code": "244",
                "country_code": "AO",
                "long_code": "AGO",
                "active": 1
            },
            {
                "country_id": 8,
                "name": "Anguilla",
                "dialing_code": "+1-264",
                "country_code": "AI",
                "long_code": "AIA",
                "active": 1
            },
            {
                "country_id": 9,
                "name": "Antarctica",
                "dialing_code": "672",
                "country_code": "AQ",
                "long_code": "ATA",
                "active": 1
            },
            {
                "country_id": 10,
                "name": "Antigua And Barbuda",
                "dialing_code": "+1-268",
                "country_code": "AG",
                "long_code": "ATG",
                "active": 1
            }
        ],
        "links": {
            "first": "http:\/\/localhost\/api\/country\/all?page=1",
            "last": "http:\/\/localhost\/api\/country\/all?page=25",
            "prev": null,
            "next": "http:\/\/localhost\/api\/country\/all?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 25,
            "links": [
                {
                    "url": null,
                    "label": "&amp;laquo; Previous",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=2",
                    "label": "2",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=3",
                    "label": "3",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=4",
                    "label": "4",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=5",
                    "label": "5",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=6",
                    "label": "6",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=7",
                    "label": "7",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=8",
                    "label": "8",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=9",
                    "label": "9",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=10",
                    "label": "10",
                    "active": false
                },
                {
                    "url": null,
                    "label": "...",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=24",
                    "label": "24",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=25",
                    "label": "25",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/country\/all?page=2",
                    "label": "Next &amp;raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/country\/all",
            "per_page": 10,
            "to": 10,
            "total": 247
        }
    }
}</code></pre>
<div id="execution-results-GETapi-country-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-country-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-country-all"></code></pre>
</div>
<div id="execution-error-GETapi-country-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-country-all"></code></pre>
</div>
<form id="form-GETapi-country-all" data-method="GET" data-path="api/country/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-country-all', this);">
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
    -G "http://localhost:8000/api/country/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/active"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/country/active',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "success",
    "result": [
        {
            "country_id": 1,
            "name": "Afghanistan",
            "dialing_code": "93",
            "country_code": "AF",
            "long_code": "AFG",
            "active": 1
        },
        {
            "country_id": 2,
            "name": "Aland Islands",
            "dialing_code": "+358-18",
            "country_code": "AX",
            "long_code": "ALA",
            "active": 1
        },
        {
            "country_id": 3,
            "name": "Albania",
            "dialing_code": "355",
            "country_code": "AL",
            "long_code": "ALB",
            "active": 1
        },
        {
            "country_id": 4,
            "name": "Algeria",
            "dialing_code": "213",
            "country_code": "DZ",
            "long_code": "DZA",
            "active": 1
        },
        {
            "country_id": 5,
            "name": "American Samoa",
            "dialing_code": "+1-684",
            "country_code": "AS",
            "long_code": "ASM",
            "active": 1
        },
        {
            "country_id": 6,
            "name": "Andorra",
            "dialing_code": "376",
            "country_code": "AD",
            "long_code": "AND",
            "active": 1
        },
        {
            "country_id": 7,
            "name": "Angola",
            "dialing_code": "244",
            "country_code": "AO",
            "long_code": "AGO",
            "active": 1
        },
        {
            "country_id": 8,
            "name": "Anguilla",
            "dialing_code": "+1-264",
            "country_code": "AI",
            "long_code": "AIA",
            "active": 1
        },
        {
            "country_id": 9,
            "name": "Antarctica",
            "dialing_code": "672",
            "country_code": "AQ",
            "long_code": "ATA",
            "active": 1
        },
        {
            "country_id": 10,
            "name": "Antigua And Barbuda",
            "dialing_code": "+1-268",
            "country_code": "AG",
            "long_code": "ATG",
            "active": 1
        },
        {
            "country_id": 11,
            "name": "Argentina",
            "dialing_code": "54",
            "country_code": "AR",
            "long_code": "ARG",
            "active": 1
        },
        {
            "country_id": 12,
            "name": "Armenia",
            "dialing_code": "374",
            "country_code": "AM",
            "long_code": "ARM",
            "active": 1
        },
        {
            "country_id": 13,
            "name": "Aruba",
            "dialing_code": "297",
            "country_code": "AW",
            "long_code": "ABW",
            "active": 1
        },
        {
            "country_id": 14,
            "name": "Australia",
            "dialing_code": "61",
            "country_code": "AU",
            "long_code": "AUS",
            "active": 1
        },
        {
            "country_id": 15,
            "name": "Austria",
            "dialing_code": "43",
            "country_code": "AT",
            "long_code": "AUT",
            "active": 1
        },
        {
            "country_id": 16,
            "name": "Azerbaijan",
            "dialing_code": "994",
            "country_code": "AZ",
            "long_code": "AZE",
            "active": 1
        },
        {
            "country_id": 17,
            "name": "Bahamas The",
            "dialing_code": "+1-242",
            "country_code": "BS",
            "long_code": "BHS",
            "active": 1
        },
        {
            "country_id": 18,
            "name": "Bahrain",
            "dialing_code": "973",
            "country_code": "BH",
            "long_code": "BHR",
            "active": 1
        },
        {
            "country_id": 19,
            "name": "Bangladesh",
            "dialing_code": "880",
            "country_code": "BD",
            "long_code": "BGD",
            "active": 1
        },
        {
            "country_id": 20,
            "name": "Barbados",
            "dialing_code": "+1-246",
            "country_code": "BB",
            "long_code": "BRB",
            "active": 1
        },
        {
            "country_id": 21,
            "name": "Belarus",
            "dialing_code": "375",
            "country_code": "BY",
            "long_code": "BLR",
            "active": 1
        },
        {
            "country_id": 22,
            "name": "Belgium",
            "dialing_code": "32",
            "country_code": "BE",
            "long_code": "BEL",
            "active": 1
        },
        {
            "country_id": 23,
            "name": "Belize",
            "dialing_code": "501",
            "country_code": "BZ",
            "long_code": "BLZ",
            "active": 1
        },
        {
            "country_id": 24,
            "name": "Benin",
            "dialing_code": "229",
            "country_code": "BJ",
            "long_code": "BEN",
            "active": 1
        },
        {
            "country_id": 25,
            "name": "Bermuda",
            "dialing_code": "+1-441",
            "country_code": "BM",
            "long_code": "BMU",
            "active": 1
        },
        {
            "country_id": 26,
            "name": "Bhutan",
            "dialing_code": "975",
            "country_code": "BT",
            "long_code": "BTN",
            "active": 1
        },
        {
            "country_id": 27,
            "name": "Bolivia",
            "dialing_code": "591",
            "country_code": "BO",
            "long_code": "BOL",
            "active": 1
        },
        {
            "country_id": 28,
            "name": "Bosnia and Herzegovina",
            "dialing_code": "387",
            "country_code": "BA",
            "long_code": "BIH",
            "active": 1
        },
        {
            "country_id": 29,
            "name": "Botswana",
            "dialing_code": "267",
            "country_code": "BW",
            "long_code": "BWA",
            "active": 1
        },
        {
            "country_id": 30,
            "name": "Bouvet Island",
            "dialing_code": "",
            "country_code": "BV",
            "long_code": "BVT",
            "active": 1
        },
        {
            "country_id": 31,
            "name": "Brazil",
            "dialing_code": "55",
            "country_code": "BR",
            "long_code": "BRA",
            "active": 1
        },
        {
            "country_id": 32,
            "name": "British Indian Ocean Territory",
            "dialing_code": "246",
            "country_code": "IO",
            "long_code": "IOT",
            "active": 1
        },
        {
            "country_id": 33,
            "name": "Brunei",
            "dialing_code": "673",
            "country_code": "BN",
            "long_code": "BRN",
            "active": 1
        },
        {
            "country_id": 34,
            "name": "Bulgaria",
            "dialing_code": "359",
            "country_code": "BG",
            "long_code": "BGR",
            "active": 1
        },
        {
            "country_id": 35,
            "name": "Burkina Faso",
            "dialing_code": "226",
            "country_code": "BF",
            "long_code": "BFA",
            "active": 1
        },
        {
            "country_id": 36,
            "name": "Burundi",
            "dialing_code": "257",
            "country_code": "BI",
            "long_code": "BDI",
            "active": 1
        },
        {
            "country_id": 37,
            "name": "Cambodia",
            "dialing_code": "855",
            "country_code": "KH",
            "long_code": "KHM",
            "active": 1
        },
        {
            "country_id": 38,
            "name": "Cameroon",
            "dialing_code": "237",
            "country_code": "CM",
            "long_code": "CMR",
            "active": 1
        },
        {
            "country_id": 39,
            "name": "Canada",
            "dialing_code": "1",
            "country_code": "CA",
            "long_code": "CAN",
            "active": 1
        },
        {
            "country_id": 40,
            "name": "Cape Verde",
            "dialing_code": "238",
            "country_code": "CV",
            "long_code": "CPV",
            "active": 1
        },
        {
            "country_id": 41,
            "name": "Cayman Islands",
            "dialing_code": "+1-345",
            "country_code": "KY",
            "long_code": "CYM",
            "active": 1
        },
        {
            "country_id": 42,
            "name": "Central African Republic",
            "dialing_code": "236",
            "country_code": "CF",
            "long_code": "CAF",
            "active": 1
        },
        {
            "country_id": 43,
            "name": "Chad",
            "dialing_code": "235",
            "country_code": "TD",
            "long_code": "TCD",
            "active": 1
        },
        {
            "country_id": 44,
            "name": "Chile",
            "dialing_code": "56",
            "country_code": "CL",
            "long_code": "CHL",
            "active": 1
        },
        {
            "country_id": 45,
            "name": "China",
            "dialing_code": "86",
            "country_code": "CN",
            "long_code": "CHN",
            "active": 1
        },
        {
            "country_id": 46,
            "name": "Christmas Island",
            "dialing_code": "61",
            "country_code": "CX",
            "long_code": "CXR",
            "active": 1
        },
        {
            "country_id": 47,
            "name": "Cocos (Keeling) Islands",
            "dialing_code": "61",
            "country_code": "CC",
            "long_code": "CCK",
            "active": 1
        },
        {
            "country_id": 48,
            "name": "Colombia",
            "dialing_code": "57",
            "country_code": "CO",
            "long_code": "COL",
            "active": 1
        },
        {
            "country_id": 49,
            "name": "Comoros",
            "dialing_code": "269",
            "country_code": "KM",
            "long_code": "COM",
            "active": 1
        },
        {
            "country_id": 50,
            "name": "Congo",
            "dialing_code": "242",
            "country_code": "CG",
            "long_code": "COG",
            "active": 1
        },
        {
            "country_id": 51,
            "name": "Congo The Democratic Republic Of The",
            "dialing_code": "243",
            "country_code": "CD",
            "long_code": "COD",
            "active": 1
        },
        {
            "country_id": 52,
            "name": "Cook Islands",
            "dialing_code": "682",
            "country_code": "CK",
            "long_code": "COK",
            "active": 1
        },
        {
            "country_id": 53,
            "name": "Costa Rica",
            "dialing_code": "506",
            "country_code": "CR",
            "long_code": "CRI",
            "active": 1
        },
        {
            "country_id": 54,
            "name": "Cote D'Ivoire (Ivory Coast)",
            "dialing_code": "225",
            "country_code": "CI",
            "long_code": "CIV",
            "active": 1
        },
        {
            "country_id": 55,
            "name": "Croatia (Hrvatska)",
            "dialing_code": "385",
            "country_code": "HR",
            "long_code": "HRV",
            "active": 1
        },
        {
            "country_id": 56,
            "name": "Cuba",
            "dialing_code": "53",
            "country_code": "CU",
            "long_code": "CUB",
            "active": 1
        },
        {
            "country_id": 57,
            "name": "Cyprus",
            "dialing_code": "357",
            "country_code": "CY",
            "long_code": "CYP",
            "active": 1
        },
        {
            "country_id": 58,
            "name": "Czech Republic",
            "dialing_code": "420",
            "country_code": "CZ",
            "long_code": "CZE",
            "active": 1
        },
        {
            "country_id": 59,
            "name": "Denmark",
            "dialing_code": "45",
            "country_code": "DK",
            "long_code": "DNK",
            "active": 1
        },
        {
            "country_id": 60,
            "name": "Djibouti",
            "dialing_code": "253",
            "country_code": "DJ",
            "long_code": "DJI",
            "active": 1
        },
        {
            "country_id": 61,
            "name": "Dominica",
            "dialing_code": "+1-767",
            "country_code": "DM",
            "long_code": "DMA",
            "active": 1
        },
        {
            "country_id": 62,
            "name": "Dominican Republic",
            "dialing_code": "+1-809 and 1-829",
            "country_code": "DO",
            "long_code": "DOM",
            "active": 1
        },
        {
            "country_id": 63,
            "name": "East Timor",
            "dialing_code": "670",
            "country_code": "TL",
            "long_code": "TLS",
            "active": 1
        },
        {
            "country_id": 64,
            "name": "Ecuador",
            "dialing_code": "593",
            "country_code": "EC",
            "long_code": "ECU",
            "active": 1
        },
        {
            "country_id": 65,
            "name": "Egypt",
            "dialing_code": "20",
            "country_code": "EG",
            "long_code": "EGY",
            "active": 1
        },
        {
            "country_id": 66,
            "name": "El Salvador",
            "dialing_code": "503",
            "country_code": "SV",
            "long_code": "SLV",
            "active": 1
        },
        {
            "country_id": 67,
            "name": "Equatorial Guinea",
            "dialing_code": "240",
            "country_code": "GQ",
            "long_code": "GNQ",
            "active": 1
        },
        {
            "country_id": 68,
            "name": "Eritrea",
            "dialing_code": "291",
            "country_code": "ER",
            "long_code": "ERI",
            "active": 1
        },
        {
            "country_id": 69,
            "name": "Estonia",
            "dialing_code": "372",
            "country_code": "EE",
            "long_code": "EST",
            "active": 1
        },
        {
            "country_id": 70,
            "name": "Ethiopia",
            "dialing_code": "251",
            "country_code": "ET",
            "long_code": "ETH",
            "active": 1
        },
        {
            "country_id": 71,
            "name": "Falkland Islands",
            "dialing_code": "500",
            "country_code": "FK",
            "long_code": "FLK",
            "active": 1
        },
        {
            "country_id": 72,
            "name": "Faroe Islands",
            "dialing_code": "298",
            "country_code": "FO",
            "long_code": "FRO",
            "active": 1
        },
        {
            "country_id": 73,
            "name": "Fiji Islands",
            "dialing_code": "679",
            "country_code": "FJ",
            "long_code": "FJI",
            "active": 1
        },
        {
            "country_id": 74,
            "name": "Finland",
            "dialing_code": "358",
            "country_code": "FI",
            "long_code": "FIN",
            "active": 1
        },
        {
            "country_id": 75,
            "name": "France",
            "dialing_code": "33",
            "country_code": "FR",
            "long_code": "FRA",
            "active": 1
        },
        {
            "country_id": 76,
            "name": "French Guiana",
            "dialing_code": "594",
            "country_code": "GF",
            "long_code": "GUF",
            "active": 1
        },
        {
            "country_id": 77,
            "name": "French Polynesia",
            "dialing_code": "689",
            "country_code": "PF",
            "long_code": "PYF",
            "active": 1
        },
        {
            "country_id": 78,
            "name": "French Southern Territories",
            "dialing_code": "",
            "country_code": "TF",
            "long_code": "ATF",
            "active": 1
        },
        {
            "country_id": 79,
            "name": "Gabon",
            "dialing_code": "241",
            "country_code": "GA",
            "long_code": "GAB",
            "active": 1
        },
        {
            "country_id": 80,
            "name": "Gambia The",
            "dialing_code": "220",
            "country_code": "GM",
            "long_code": "GMB",
            "active": 1
        },
        {
            "country_id": 81,
            "name": "Georgia",
            "dialing_code": "995",
            "country_code": "GE",
            "long_code": "GEO",
            "active": 1
        },
        {
            "country_id": 82,
            "name": "Germany",
            "dialing_code": "49",
            "country_code": "DE",
            "long_code": "DEU",
            "active": 1
        },
        {
            "country_id": 83,
            "name": "Ghana",
            "dialing_code": "233",
            "country_code": "GH",
            "long_code": "GHA",
            "active": 1
        },
        {
            "country_id": 84,
            "name": "Gibraltar",
            "dialing_code": "350",
            "country_code": "GI",
            "long_code": "GIB",
            "active": 1
        },
        {
            "country_id": 85,
            "name": "Greece",
            "dialing_code": "30",
            "country_code": "GR",
            "long_code": "GRC",
            "active": 1
        },
        {
            "country_id": 86,
            "name": "Greenland",
            "dialing_code": "299",
            "country_code": "GL",
            "long_code": "GRL",
            "active": 1
        },
        {
            "country_id": 87,
            "name": "Grenada",
            "dialing_code": "+1-473",
            "country_code": "GD",
            "long_code": "GRD",
            "active": 1
        },
        {
            "country_id": 88,
            "name": "Guadeloupe",
            "dialing_code": "590",
            "country_code": "GP",
            "long_code": "GLP",
            "active": 1
        },
        {
            "country_id": 89,
            "name": "Guam",
            "dialing_code": "+1-671",
            "country_code": "GU",
            "long_code": "GUM",
            "active": 1
        },
        {
            "country_id": 90,
            "name": "Guatemala",
            "dialing_code": "502",
            "country_code": "GT",
            "long_code": "GTM",
            "active": 1
        },
        {
            "country_id": 91,
            "name": "Guernsey and Alderney",
            "dialing_code": "+44-1481",
            "country_code": "GG",
            "long_code": "GGY",
            "active": 1
        },
        {
            "country_id": 92,
            "name": "Guinea",
            "dialing_code": "224",
            "country_code": "GN",
            "long_code": "GIN",
            "active": 1
        },
        {
            "country_id": 93,
            "name": "Guinea-Bissau",
            "dialing_code": "245",
            "country_code": "GW",
            "long_code": "GNB",
            "active": 1
        },
        {
            "country_id": 94,
            "name": "Guyana",
            "dialing_code": "592",
            "country_code": "GY",
            "long_code": "GUY",
            "active": 1
        },
        {
            "country_id": 95,
            "name": "Haiti",
            "dialing_code": "509",
            "country_code": "HT",
            "long_code": "HTI",
            "active": 1
        },
        {
            "country_id": 96,
            "name": "Heard and McDonald Islands",
            "dialing_code": " ",
            "country_code": "HM",
            "long_code": "HMD",
            "active": 1
        },
        {
            "country_id": 97,
            "name": "Honduras",
            "dialing_code": "504",
            "country_code": "HN",
            "long_code": "HND",
            "active": 1
        },
        {
            "country_id": 98,
            "name": "Hong Kong S.A.R.",
            "dialing_code": "852",
            "country_code": "HK",
            "long_code": "HKG",
            "active": 1
        },
        {
            "country_id": 99,
            "name": "Hungary",
            "dialing_code": "36",
            "country_code": "HU",
            "long_code": "HUN",
            "active": 1
        },
        {
            "country_id": 100,
            "name": "Iceland",
            "dialing_code": "354",
            "country_code": "IS",
            "long_code": "ISL",
            "active": 1
        },
        {
            "country_id": 101,
            "name": "India",
            "dialing_code": "91",
            "country_code": "IN",
            "long_code": "IND",
            "active": 1
        },
        {
            "country_id": 102,
            "name": "Indonesia",
            "dialing_code": "62",
            "country_code": "ID",
            "long_code": "IDN",
            "active": 1
        },
        {
            "country_id": 103,
            "name": "Iran",
            "dialing_code": "98",
            "country_code": "IR",
            "long_code": "IRN",
            "active": 1
        },
        {
            "country_id": 104,
            "name": "Iraq",
            "dialing_code": "964",
            "country_code": "IQ",
            "long_code": "IRQ",
            "active": 1
        },
        {
            "country_id": 105,
            "name": "Ireland",
            "dialing_code": "353",
            "country_code": "IE",
            "long_code": "IRL",
            "active": 1
        },
        {
            "country_id": 106,
            "name": "Israel",
            "dialing_code": "972",
            "country_code": "IL",
            "long_code": "ISR",
            "active": 1
        },
        {
            "country_id": 107,
            "name": "Italy",
            "dialing_code": "39",
            "country_code": "IT",
            "long_code": "ITA",
            "active": 1
        },
        {
            "country_id": 108,
            "name": "Jamaica",
            "dialing_code": "+1-876",
            "country_code": "JM",
            "long_code": "JAM",
            "active": 1
        },
        {
            "country_id": 109,
            "name": "Japan",
            "dialing_code": "81",
            "country_code": "JP",
            "long_code": "JPN",
            "active": 1
        },
        {
            "country_id": 110,
            "name": "Jersey",
            "dialing_code": "+44-1534",
            "country_code": "JE",
            "long_code": "JEY",
            "active": 1
        },
        {
            "country_id": 111,
            "name": "Jordan",
            "dialing_code": "962",
            "country_code": "JO",
            "long_code": "JOR",
            "active": 1
        },
        {
            "country_id": 112,
            "name": "Kazakhstan",
            "dialing_code": "7",
            "country_code": "KZ",
            "long_code": "KAZ",
            "active": 1
        },
        {
            "country_id": 113,
            "name": "Kenya",
            "dialing_code": "254",
            "country_code": "KE",
            "long_code": "KEN",
            "active": 1
        },
        {
            "country_id": 114,
            "name": "Kiribati",
            "dialing_code": "686",
            "country_code": "KI",
            "long_code": "KIR",
            "active": 1
        },
        {
            "country_id": 115,
            "name": "Korea North\n",
            "dialing_code": "850",
            "country_code": "KP",
            "long_code": "PRK",
            "active": 1
        },
        {
            "country_id": 116,
            "name": "Korea South",
            "dialing_code": "82",
            "country_code": "KR",
            "long_code": "KOR",
            "active": 1
        },
        {
            "country_id": 117,
            "name": "Kuwait",
            "dialing_code": "965",
            "country_code": "KW",
            "long_code": "KWT",
            "active": 1
        },
        {
            "country_id": 118,
            "name": "Kyrgyzstan",
            "dialing_code": "996",
            "country_code": "KG",
            "long_code": "KGZ",
            "active": 1
        },
        {
            "country_id": 119,
            "name": "Laos",
            "dialing_code": "856",
            "country_code": "LA",
            "long_code": "LAO",
            "active": 1
        },
        {
            "country_id": 120,
            "name": "Latvia",
            "dialing_code": "371",
            "country_code": "LV",
            "long_code": "LVA",
            "active": 1
        },
        {
            "country_id": 121,
            "name": "Lebanon",
            "dialing_code": "961",
            "country_code": "LB",
            "long_code": "LBN",
            "active": 1
        },
        {
            "country_id": 122,
            "name": "Lesotho",
            "dialing_code": "266",
            "country_code": "LS",
            "long_code": "LSO",
            "active": 1
        },
        {
            "country_id": 123,
            "name": "Liberia",
            "dialing_code": "231",
            "country_code": "LR",
            "long_code": "LBR",
            "active": 1
        },
        {
            "country_id": 124,
            "name": "Libya",
            "dialing_code": "218",
            "country_code": "LY",
            "long_code": "LBY",
            "active": 1
        },
        {
            "country_id": 125,
            "name": "Liechtenstein",
            "dialing_code": "423",
            "country_code": "LI",
            "long_code": "LIE",
            "active": 1
        },
        {
            "country_id": 126,
            "name": "Lithuania",
            "dialing_code": "370",
            "country_code": "LT",
            "long_code": "LTU",
            "active": 1
        },
        {
            "country_id": 127,
            "name": "Luxembourg",
            "dialing_code": "352",
            "country_code": "LU",
            "long_code": "LUX",
            "active": 1
        },
        {
            "country_id": 128,
            "name": "Macau S.A.R.",
            "dialing_code": "853",
            "country_code": "MO",
            "long_code": "MAC",
            "active": 1
        },
        {
            "country_id": 129,
            "name": "Macedonia",
            "dialing_code": "389",
            "country_code": "MK",
            "long_code": "MKD",
            "active": 1
        },
        {
            "country_id": 130,
            "name": "Madagascar",
            "dialing_code": "261",
            "country_code": "MG",
            "long_code": "MDG",
            "active": 1
        },
        {
            "country_id": 131,
            "name": "Malawi",
            "dialing_code": "265",
            "country_code": "MW",
            "long_code": "MWI",
            "active": 1
        },
        {
            "country_id": 132,
            "name": "Malaysia",
            "dialing_code": "60",
            "country_code": "MY",
            "long_code": "MYS",
            "active": 1
        },
        {
            "country_id": 133,
            "name": "Maldives",
            "dialing_code": "960",
            "country_code": "MV",
            "long_code": "MDV",
            "active": 1
        },
        {
            "country_id": 134,
            "name": "Mali",
            "dialing_code": "223",
            "country_code": "ML",
            "long_code": "MLI",
            "active": 1
        },
        {
            "country_id": 135,
            "name": "Malta",
            "dialing_code": "356",
            "country_code": "MT",
            "long_code": "MLT",
            "active": 1
        },
        {
            "country_id": 136,
            "name": "Man (Isle of)",
            "dialing_code": "+44-1624",
            "country_code": "IM",
            "long_code": "IMN",
            "active": 1
        },
        {
            "country_id": 137,
            "name": "Marshall Islands",
            "dialing_code": "692",
            "country_code": "MH",
            "long_code": "MHL",
            "active": 1
        },
        {
            "country_id": 138,
            "name": "Martinique",
            "dialing_code": "596",
            "country_code": "MQ",
            "long_code": "MTQ",
            "active": 1
        },
        {
            "country_id": 139,
            "name": "Mauritania",
            "dialing_code": "222",
            "country_code": "MR",
            "long_code": "MRT",
            "active": 1
        },
        {
            "country_id": 140,
            "name": "Mauritius",
            "dialing_code": "230",
            "country_code": "MU",
            "long_code": "MUS",
            "active": 1
        },
        {
            "country_id": 141,
            "name": "Mayotte",
            "dialing_code": "262",
            "country_code": "YT",
            "long_code": "MYT",
            "active": 1
        },
        {
            "country_id": 142,
            "name": "Mexico",
            "dialing_code": "52",
            "country_code": "MX",
            "long_code": "MEX",
            "active": 1
        },
        {
            "country_id": 143,
            "name": "Micronesia",
            "dialing_code": "691",
            "country_code": "FM",
            "long_code": "FSM",
            "active": 1
        },
        {
            "country_id": 144,
            "name": "Moldova",
            "dialing_code": "373",
            "country_code": "MD",
            "long_code": "MDA",
            "active": 1
        },
        {
            "country_id": 145,
            "name": "Monaco",
            "dialing_code": "377",
            "country_code": "MC",
            "long_code": "MCO",
            "active": 1
        },
        {
            "country_id": 146,
            "name": "Mongolia",
            "dialing_code": "976",
            "country_code": "MN",
            "long_code": "MNG",
            "active": 1
        },
        {
            "country_id": 147,
            "name": "Montenegro",
            "dialing_code": "382",
            "country_code": "ME",
            "long_code": "MNE",
            "active": 1
        },
        {
            "country_id": 148,
            "name": "Montserrat",
            "dialing_code": "+1-664",
            "country_code": "MS",
            "long_code": "MSR",
            "active": 1
        },
        {
            "country_id": 149,
            "name": "Morocco",
            "dialing_code": "212",
            "country_code": "MA",
            "long_code": "MAR",
            "active": 1
        },
        {
            "country_id": 150,
            "name": "Mozambique",
            "dialing_code": "258",
            "country_code": "MZ",
            "long_code": "MOZ",
            "active": 1
        },
        {
            "country_id": 151,
            "name": "Myanmar",
            "dialing_code": "95",
            "country_code": "MM",
            "long_code": "MMR",
            "active": 1
        },
        {
            "country_id": 152,
            "name": "Namibia",
            "dialing_code": "264",
            "country_code": "NA",
            "long_code": "NAM",
            "active": 1
        },
        {
            "country_id": 153,
            "name": "Nauru",
            "dialing_code": "674",
            "country_code": "NR",
            "long_code": "NRU",
            "active": 1
        },
        {
            "country_id": 154,
            "name": "Nepal",
            "dialing_code": "977",
            "country_code": "NP",
            "long_code": "NPL",
            "active": 1
        },
        {
            "country_id": 155,
            "name": "Netherlands Antilles",
            "dialing_code": "",
            "country_code": "AN",
            "long_code": "ANT",
            "active": 1
        },
        {
            "country_id": 156,
            "name": "Netherlands The",
            "dialing_code": "31",
            "country_code": "NL",
            "long_code": "NLD",
            "active": 1
        },
        {
            "country_id": 157,
            "name": "New Caledonia",
            "dialing_code": "687",
            "country_code": "NC",
            "long_code": "NCL",
            "active": 1
        },
        {
            "country_id": 158,
            "name": "New Zealand",
            "dialing_code": "64",
            "country_code": "NZ",
            "long_code": "NZL",
            "active": 1
        },
        {
            "country_id": 159,
            "name": "Nicaragua",
            "dialing_code": "505",
            "country_code": "NI",
            "long_code": "NIC",
            "active": 1
        },
        {
            "country_id": 160,
            "name": "Niger",
            "dialing_code": "227",
            "country_code": "NE",
            "long_code": "NER",
            "active": 1
        },
        {
            "country_id": 161,
            "name": "Nigeria",
            "dialing_code": "234",
            "country_code": "NG",
            "long_code": "NGA",
            "active": 1
        },
        {
            "country_id": 162,
            "name": "Niue",
            "dialing_code": "683",
            "country_code": "NU",
            "long_code": "NIU",
            "active": 1
        },
        {
            "country_id": 163,
            "name": "Norfolk Island",
            "dialing_code": "672",
            "country_code": "NF",
            "long_code": "NFK",
            "active": 1
        },
        {
            "country_id": 164,
            "name": "Northern Mariana Islands",
            "dialing_code": "+1-670",
            "country_code": "MP",
            "long_code": "MNP",
            "active": 1
        },
        {
            "country_id": 165,
            "name": "Norway",
            "dialing_code": "47",
            "country_code": "NO",
            "long_code": "NOR",
            "active": 1
        },
        {
            "country_id": 166,
            "name": "Oman",
            "dialing_code": "968",
            "country_code": "OM",
            "long_code": "OMN",
            "active": 1
        },
        {
            "country_id": 167,
            "name": "Pakistan",
            "dialing_code": "92",
            "country_code": "PK",
            "long_code": "PAK",
            "active": 1
        },
        {
            "country_id": 168,
            "name": "Palau",
            "dialing_code": "680",
            "country_code": "PW",
            "long_code": "PLW",
            "active": 1
        },
        {
            "country_id": 169,
            "name": "Palestinian Territory Occupied",
            "dialing_code": "970",
            "country_code": "PS",
            "long_code": "PSE",
            "active": 1
        },
        {
            "country_id": 170,
            "name": "Panama",
            "dialing_code": "507",
            "country_code": "PA",
            "long_code": "PAN",
            "active": 1
        },
        {
            "country_id": 171,
            "name": "Papua new Guinea",
            "dialing_code": "675",
            "country_code": "PG",
            "long_code": "PNG",
            "active": 1
        },
        {
            "country_id": 172,
            "name": "Paraguay",
            "dialing_code": "595",
            "country_code": "PY",
            "long_code": "PRY",
            "active": 1
        },
        {
            "country_id": 173,
            "name": "Peru",
            "dialing_code": "51",
            "country_code": "PE",
            "long_code": "PER",
            "active": 1
        },
        {
            "country_id": 174,
            "name": "Philippines",
            "dialing_code": "63",
            "country_code": "PH",
            "long_code": "PHL",
            "active": 1
        },
        {
            "country_id": 175,
            "name": "Pitcairn Island",
            "dialing_code": "870",
            "country_code": "PN",
            "long_code": "PCN",
            "active": 1
        },
        {
            "country_id": 176,
            "name": "Poland",
            "dialing_code": "48",
            "country_code": "PL",
            "long_code": "POL",
            "active": 1
        },
        {
            "country_id": 177,
            "name": "Portugal",
            "dialing_code": "351",
            "country_code": "PT",
            "long_code": "PRT",
            "active": 1
        },
        {
            "country_id": 178,
            "name": "Puerto Rico",
            "dialing_code": "+1-787 and 1-939",
            "country_code": "PR",
            "long_code": "PRI",
            "active": 1
        },
        {
            "country_id": 179,
            "name": "Qatar",
            "dialing_code": "974",
            "country_code": "QA",
            "long_code": "QAT",
            "active": 1
        },
        {
            "country_id": 180,
            "name": "Reunion",
            "dialing_code": "262",
            "country_code": "RE",
            "long_code": "REU",
            "active": 1
        },
        {
            "country_id": 181,
            "name": "Romania",
            "dialing_code": "40",
            "country_code": "RO",
            "long_code": "ROU",
            "active": 1
        },
        {
            "country_id": 182,
            "name": "Russia",
            "dialing_code": "7",
            "country_code": "RU",
            "long_code": "RUS",
            "active": 1
        },
        {
            "country_id": 183,
            "name": "Rwanda",
            "dialing_code": "250",
            "country_code": "RW",
            "long_code": "RWA",
            "active": 1
        },
        {
            "country_id": 184,
            "name": "Saint Helena",
            "dialing_code": "290",
            "country_code": "SH",
            "long_code": "SHN",
            "active": 1
        },
        {
            "country_id": 185,
            "name": "Saint Kitts And Nevis",
            "dialing_code": "+1-869",
            "country_code": "KN",
            "long_code": "KNA",
            "active": 1
        },
        {
            "country_id": 186,
            "name": "Saint Lucia",
            "dialing_code": "+1-758",
            "country_code": "LC",
            "long_code": "LCA",
            "active": 1
        },
        {
            "country_id": 187,
            "name": "Saint Pierre and Miquelon",
            "dialing_code": "508",
            "country_code": "PM",
            "long_code": "SPM",
            "active": 1
        },
        {
            "country_id": 188,
            "name": "Saint Vincent And The Grenadines",
            "dialing_code": "+1-784",
            "country_code": "VC",
            "long_code": "VCT",
            "active": 1
        },
        {
            "country_id": 189,
            "name": "Saint-Barthelemy",
            "dialing_code": "590",
            "country_code": "BL",
            "long_code": "BLM",
            "active": 1
        },
        {
            "country_id": 190,
            "name": "Saint-Martin (French part)",
            "dialing_code": "590",
            "country_code": "MF",
            "long_code": "MAF",
            "active": 1
        },
        {
            "country_id": 191,
            "name": "Samoa",
            "dialing_code": "685",
            "country_code": "WS",
            "long_code": "WSM",
            "active": 1
        },
        {
            "country_id": 192,
            "name": "San Marino",
            "dialing_code": "378",
            "country_code": "SM",
            "long_code": "SMR",
            "active": 1
        },
        {
            "country_id": 193,
            "name": "Sao Tome and Principe",
            "dialing_code": "239",
            "country_code": "ST",
            "long_code": "STP",
            "active": 1
        },
        {
            "country_id": 194,
            "name": "Saudi Arabia",
            "dialing_code": "966",
            "country_code": "SA",
            "long_code": "SAU",
            "active": 1
        },
        {
            "country_id": 195,
            "name": "Senegal",
            "dialing_code": "221",
            "country_code": "SN",
            "long_code": "SEN",
            "active": 1
        },
        {
            "country_id": 196,
            "name": "Serbia",
            "dialing_code": "381",
            "country_code": "RS",
            "long_code": "SRB",
            "active": 1
        },
        {
            "country_id": 197,
            "name": "Seychelles",
            "dialing_code": "248",
            "country_code": "SC",
            "long_code": "SYC",
            "active": 1
        },
        {
            "country_id": 198,
            "name": "Sierra Leone",
            "dialing_code": "232",
            "country_code": "SL",
            "long_code": "SLE",
            "active": 1
        },
        {
            "country_id": 199,
            "name": "Singapore",
            "dialing_code": "65",
            "country_code": "SG",
            "long_code": "SGP",
            "active": 1
        },
        {
            "country_id": 200,
            "name": "Slovakia",
            "dialing_code": "421",
            "country_code": "SK",
            "long_code": "SVK",
            "active": 1
        },
        {
            "country_id": 201,
            "name": "Slovenia",
            "dialing_code": "386",
            "country_code": "SI",
            "long_code": "SVN",
            "active": 1
        },
        {
            "country_id": 202,
            "name": "Solomon Islands",
            "dialing_code": "677",
            "country_code": "SB",
            "long_code": "SLB",
            "active": 1
        },
        {
            "country_id": 203,
            "name": "Somalia",
            "dialing_code": "252",
            "country_code": "SO",
            "long_code": "SOM",
            "active": 1
        },
        {
            "country_id": 204,
            "name": "South Africa",
            "dialing_code": "27",
            "country_code": "ZA",
            "long_code": "ZAF",
            "active": 1
        },
        {
            "country_id": 205,
            "name": "South Georgia",
            "dialing_code": "",
            "country_code": "GS",
            "long_code": "SGS",
            "active": 1
        },
        {
            "country_id": 206,
            "name": "South Sudan",
            "dialing_code": "211",
            "country_code": "SS",
            "long_code": "SSD",
            "active": 1
        },
        {
            "country_id": 207,
            "name": "Spain",
            "dialing_code": "34",
            "country_code": "ES",
            "long_code": "ESP",
            "active": 1
        },
        {
            "country_id": 208,
            "name": "Sri Lanka",
            "dialing_code": "94",
            "country_code": "LK",
            "long_code": "LKA",
            "active": 1
        },
        {
            "country_id": 209,
            "name": "Sudan",
            "dialing_code": "249",
            "country_code": "SD",
            "long_code": "SDN",
            "active": 1
        },
        {
            "country_id": 210,
            "name": "Suriname",
            "dialing_code": "597",
            "country_code": "SR",
            "long_code": "SUR",
            "active": 1
        },
        {
            "country_id": 211,
            "name": "Svalbard And Jan Mayen Islands",
            "dialing_code": "47",
            "country_code": "SJ",
            "long_code": "SJM",
            "active": 1
        },
        {
            "country_id": 212,
            "name": "Swaziland",
            "dialing_code": "268",
            "country_code": "SZ",
            "long_code": "SWZ",
            "active": 1
        },
        {
            "country_id": 213,
            "name": "Sweden",
            "dialing_code": "46",
            "country_code": "SE",
            "long_code": "SWE",
            "active": 1
        },
        {
            "country_id": 214,
            "name": "Switzerland",
            "dialing_code": "41",
            "country_code": "CH",
            "long_code": "CHE",
            "active": 1
        },
        {
            "country_id": 215,
            "name": "Syria",
            "dialing_code": "963",
            "country_code": "SY",
            "long_code": "SYR",
            "active": 1
        },
        {
            "country_id": 216,
            "name": "Taiwan",
            "dialing_code": "886",
            "country_code": "TW",
            "long_code": "TWN",
            "active": 1
        },
        {
            "country_id": 217,
            "name": "Tajikistan",
            "dialing_code": "992",
            "country_code": "TJ",
            "long_code": "TJK",
            "active": 1
        },
        {
            "country_id": 218,
            "name": "Tanzania",
            "dialing_code": "255",
            "country_code": "TZ",
            "long_code": "TZA",
            "active": 1
        },
        {
            "country_id": 219,
            "name": "Thailand",
            "dialing_code": "66",
            "country_code": "TH",
            "long_code": "THA",
            "active": 1
        },
        {
            "country_id": 220,
            "name": "Togo",
            "dialing_code": "228",
            "country_code": "TG",
            "long_code": "TGO",
            "active": 1
        },
        {
            "country_id": 221,
            "name": "Tokelau",
            "dialing_code": "690",
            "country_code": "TK",
            "long_code": "TKL",
            "active": 1
        },
        {
            "country_id": 222,
            "name": "Tonga",
            "dialing_code": "676",
            "country_code": "TO",
            "long_code": "TON",
            "active": 1
        },
        {
            "country_id": 223,
            "name": "Trinidad And Tobago",
            "dialing_code": "+1-868",
            "country_code": "TT",
            "long_code": "TTO",
            "active": 1
        },
        {
            "country_id": 224,
            "name": "Tunisia",
            "dialing_code": "216",
            "country_code": "TN",
            "long_code": "TUN",
            "active": 1
        },
        {
            "country_id": 225,
            "name": "Turkey",
            "dialing_code": "90",
            "country_code": "TR",
            "long_code": "TUR",
            "active": 1
        },
        {
            "country_id": 226,
            "name": "Turkmenistan",
            "dialing_code": "993",
            "country_code": "TM",
            "long_code": "TKM",
            "active": 1
        },
        {
            "country_id": 227,
            "name": "Turks And Caicos Islands",
            "dialing_code": "+1-649",
            "country_code": "TC",
            "long_code": "TCA",
            "active": 1
        },
        {
            "country_id": 228,
            "name": "Tuvalu",
            "dialing_code": "688",
            "country_code": "TV",
            "long_code": "TUV",
            "active": 1
        },
        {
            "country_id": 229,
            "name": "Uganda",
            "dialing_code": "256",
            "country_code": "UG",
            "long_code": "UGA",
            "active": 1
        },
        {
            "country_id": 230,
            "name": "Ukraine",
            "dialing_code": "380",
            "country_code": "UA",
            "long_code": "UKR",
            "active": 1
        },
        {
            "country_id": 231,
            "name": "United Arab Emirates",
            "dialing_code": "971",
            "country_code": "AE",
            "long_code": "ARE",
            "active": 1
        },
        {
            "country_id": 232,
            "name": "United Kingdom",
            "dialing_code": "44",
            "country_code": "GB",
            "long_code": "GBR",
            "active": 1
        },
        {
            "country_id": 233,
            "name": "United States",
            "dialing_code": "1",
            "country_code": "US",
            "long_code": "USA",
            "active": 1
        },
        {
            "country_id": 234,
            "name": "United States Minor Outlying Islands",
            "dialing_code": "1",
            "country_code": "UM",
            "long_code": "UMI",
            "active": 1
        },
        {
            "country_id": 235,
            "name": "Uruguay",
            "dialing_code": "598",
            "country_code": "UY",
            "long_code": "URY",
            "active": 1
        },
        {
            "country_id": 236,
            "name": "Uzbekistan",
            "dialing_code": "998",
            "country_code": "UZ",
            "long_code": "UZB",
            "active": 1
        },
        {
            "country_id": 237,
            "name": "Vanuatu",
            "dialing_code": "678",
            "country_code": "VU",
            "long_code": "VUT",
            "active": 1
        },
        {
            "country_id": 238,
            "name": "Vatican City State (Holy See)",
            "dialing_code": "379",
            "country_code": "VA",
            "long_code": "VAT",
            "active": 1
        },
        {
            "country_id": 239,
            "name": "Venezuela",
            "dialing_code": "58",
            "country_code": "VE",
            "long_code": "VEN",
            "active": 1
        },
        {
            "country_id": 240,
            "name": "Vietnam",
            "dialing_code": "84",
            "country_code": "VN",
            "long_code": "VNM",
            "active": 1
        },
        {
            "country_id": 241,
            "name": "Virgin Islands (British)",
            "dialing_code": "+1-284",
            "country_code": "VG",
            "long_code": "VGB",
            "active": 1
        },
        {
            "country_id": 242,
            "name": "Virgin Islands (US)",
            "dialing_code": "+1-340",
            "country_code": "VI",
            "long_code": "VIR",
            "active": 1
        },
        {
            "country_id": 243,
            "name": "Wallis And Futuna Islands",
            "dialing_code": "681",
            "country_code": "WF",
            "long_code": "WLF",
            "active": 1
        },
        {
            "country_id": 244,
            "name": "Western Sahara",
            "dialing_code": "212",
            "country_code": "EH",
            "long_code": "ESH",
            "active": 1
        },
        {
            "country_id": 245,
            "name": "Yemen",
            "dialing_code": "967",
            "country_code": "YE",
            "long_code": "YEM",
            "active": 1
        },
        {
            "country_id": 246,
            "name": "Zambia",
            "dialing_code": "260",
            "country_code": "ZM",
            "long_code": "ZMB",
            "active": 1
        },
        {
            "country_id": 247,
            "name": "Zimbabwe",
            "dialing_code": "263",
            "country_code": "ZW",
            "long_code": "ZWE",
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
<form id="form-GETapi-country-active" data-method="GET" data-path="api/country/active" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-country-active', this);">
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
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/country/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"country_id":12}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "country_id": 12
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/country/update',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'country_id' =&gt; 12,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-PUTapi-country-update" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-country-update"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-country-update"></code></pre>
</div>
<div id="execution-error-PUTapi-country-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-country-update"></code></pre>
</div>
<form id="form-PUTapi-country-update" data-method="PUT" data-path="api/country/update" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-country-update', this);">
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
<p>
<label id="auth-PUTapi-country-update" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-country-update" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country_id" data-endpoint="PUTapi-country-update" data-component="body" required  hidden>
<br>
County ID .
</p>

</form>
<h2>Activate Country</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8000/api/country/activate" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"country_id":19}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/activate"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "country_id": 19
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://localhost:8000/api/country/activate',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'country_id' =&gt; 19,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-PATCHapi-country-activate" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-country-activate"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-country-activate"></code></pre>
</div>
<div id="execution-error-PATCHapi-country-activate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-country-activate"></code></pre>
</div>
<form id="form-PATCHapi-country-activate" data-method="PATCH" data-path="api/country/activate" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-country-activate', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-country-activate" onclick="tryItOut('PATCHapi-country-activate');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-country-activate" onclick="cancelTryOut('PATCHapi-country-activate');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-country-activate" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/country/activate</code></b>
</p>
<p>
<label id="auth-PATCHapi-country-activate" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-country-activate" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country_id" data-endpoint="PATCHapi-country-activate" data-component="body" required  hidden>
<br>
County ID .
</p>

</form>
<h2>Deactivate Country</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8000/api/country/deactivate" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"country_id":20}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/country/deactivate"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "country_id": 20
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://localhost:8000/api/country/deactivate',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'country_id' =&gt; 20,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-PATCHapi-country-deactivate" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-country-deactivate"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-country-deactivate"></code></pre>
</div>
<div id="execution-error-PATCHapi-country-deactivate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-country-deactivate"></code></pre>
</div>
<form id="form-PATCHapi-country-deactivate" data-method="PATCH" data-path="api/country/deactivate" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-country-deactivate', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-country-deactivate" onclick="tryItOut('PATCHapi-country-deactivate');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-country-deactivate" onclick="cancelTryOut('PATCHapi-country-deactivate');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-country-deactivate" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/country/deactivate</code></b>
</p>
<p>
<label id="auth-PATCHapi-country-deactivate" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-country-deactivate" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country_id" data-endpoint="PATCHapi-country-deactivate" data-component="body" required  hidden>
<br>
County ID .
</p>

</form>
<h2>All Timezones</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/timezone/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/timezone/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/timezone/all',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
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
<form id="form-GETapi-timezone-all" data-method="GET" data-path="api/timezone/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-timezone-all', this);">
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
    -G "http://localhost:8000/api/timezone/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/timezone/active"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/timezone/active',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "success",
    "result": [
        {
            "timezone_id": 1,
            "name": "Afghanistan",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 2,
            "name": "Aland Islands",
            "utc": null,
            "active": 1
        },
        {
            "timezone_id": 3,
            "name": "Albania",
            "utc": null,
            "active": 1
        },
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
<form id="form-GETapi-timezone-active" data-method="GET" data-path="api/timezone/active" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-timezone-active', this);">
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
</form><h1>Teams</h1>
<p>Invite Member</p>
<h2>All Users</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/teams/all?role=11&amp;sort=non" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/teams/all"
);

let params = {
    "role": "11",
    "sort": "non",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/teams/all',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'query' =&gt; [
            'role'=&gt; '11',
            'sort'=&gt; 'non',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-teams-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-teams-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams-all"></code></pre>
</div>
<div id="execution-error-GETapi-teams-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams-all"></code></pre>
</div>
<form id="form-GETapi-teams-all" data-method="GET" data-path="api/teams/all" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-teams-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-teams-all" onclick="tryItOut('GETapi-teams-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-teams-all" onclick="cancelTryOut('GETapi-teams-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-teams-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/teams/all</code></b>
</p>
<p>
<label id="auth-GETapi-teams-all" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-teams-all" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-teams-all" data-component="query"  hidden>
<br>
Search by name.
</p>
<p>
<b><code>role</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="role" data-endpoint="GETapi-teams-all" data-component="query"  hidden>
<br>
Filter by role. 1
</p>
<p>
<b><code>sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sort" data-endpoint="GETapi-teams-all" data-component="query"  hidden>
<br>
Filter either by desc or asc order
</p>
</form>
<h2>Get User by Id</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/teams/show/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/teams/show/1"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/teams/show/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-teams-show--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-teams-show--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams-show--id-"></code></pre>
</div>
<div id="execution-error-GETapi-teams-show--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams-show--id-"></code></pre>
</div>
<form id="form-GETapi-teams-show--id-" data-method="GET" data-path="api/teams/show/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-teams-show--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-teams-show--id-" onclick="tryItOut('GETapi-teams-show--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-teams-show--id-" onclick="cancelTryOut('GETapi-teams-show--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-teams-show--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/teams/show/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-teams-show--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-teams-show--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-teams-show--id-" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>
<h2>Update member details.</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/teams/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"nemo","email":"sunt","phone_number":"quisquam","office_id":1,"role_id":1,"timezone_id":2,"gender":"male","region":"East Africa","city":"Nairobi","languages":["minima","consectetur"]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/teams/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "nemo",
    "email": "sunt",
    "phone_number": "quisquam",
    "office_id": 1,
    "role_id": 1,
    "timezone_id": 2,
    "gender": "male",
    "region": "East Africa",
    "city": "Nairobi",
    "languages": [
        "minima",
        "consectetur"
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
    'http://localhost:8000/api/teams/update/1',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'name' =&gt; 'nemo',
            'email' =&gt; 'sunt',
            'phone_number' =&gt; 'quisquam',
            'office_id' =&gt; 1,
            'role_id' =&gt; 1,
            'timezone_id' =&gt; 2,
            'gender' =&gt; 'male',
            'region' =&gt; 'East Africa',
            'city' =&gt; 'Nairobi',
            'languages' =&gt; [
                'minima',
                'consectetur',
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-PUTapi-teams-update--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-teams-update--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-teams-update--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-teams-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-teams-update--id-"></code></pre>
</div>
<form id="form-PUTapi-teams-update--id-" data-method="PUT" data-path="api/teams/update/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-teams-update--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-teams-update--id-" onclick="tryItOut('PUTapi-teams-update--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-teams-update--id-" onclick="cancelTryOut('PUTapi-teams-update--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-teams-update--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/teams/update/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-teams-update--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-teams-update--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-teams-update--id-" data-component="url" required  hidden>
<br>
The User ID.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
Name
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-teams-update--id-" data-component="body" required  hidden>
<br>
Email Address
</p>
<p>
<b><code>phone_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_number" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
Phone Number
</p>
<p>
<b><code>office_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="office_id" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
Office ID.
</p>
<p>
<b><code>role_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="role_id" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
Role ID.
</p>
<p>
<b><code>timezone_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="timezone_id" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
Timezone ID.
</p>
<p>
<b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="gender" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
Gender.
</p>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="region" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
Region.
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<br>
City.
</p>
<p>
<b><code>languages</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="languages.0" data-endpoint="PUTapi-teams-update--id-" data-component="body"  hidden>
<input type="text" name="languages.1" data-endpoint="PUTapi-teams-update--id-" data-component="body" hidden>
<br>
Languages.Example ["English","French"]
</p>

</form>
<h2>Delete User</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/teams/1/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/teams/1/delete"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/teams/1/delete',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-DELETEapi-teams--id--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-teams--id--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-teams--id--delete"></code></pre>
</div>
<div id="execution-error-DELETEapi-teams--id--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-teams--id--delete"></code></pre>
</div>
<form id="form-DELETEapi-teams--id--delete" data-method="DELETE" data-path="api/teams/{id}/delete" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-teams--id--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-teams--id--delete" onclick="tryItOut('DELETEapi-teams--id--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-teams--id--delete" onclick="cancelTryOut('DELETEapi-teams--id--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-teams--id--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/teams/{id}/delete</code></b>
</p>
<p>
<label id="auth-DELETEapi-teams--id--delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-teams--id--delete" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-teams--id--delete" data-component="url" required  hidden>
<br>
The ID of the user.
</p>
</form>
<h2>Invite member</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/teams/invite" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"eius","role_id":12,"office_id":7}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/teams/invite"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "email": "eius",
    "role_id": 12,
    "office_id": 7
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/teams/invite',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'email' =&gt; 'eius',
            'role_id' =&gt; 12,
            'office_id' =&gt; 7,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-teams-invite" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-teams-invite"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teams-invite"></code></pre>
</div>
<div id="execution-error-POSTapi-teams-invite" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teams-invite"></code></pre>
</div>
<form id="form-POSTapi-teams-invite" data-method="POST" data-path="api/teams/invite" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-teams-invite', this);">
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
<p>
<label id="auth-POSTapi-teams-invite" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-teams-invite" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-teams-invite" data-component="body" required  hidden>
<br>
Email Address.
</p>
<p>
<b><code>role_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="role_id" data-endpoint="POSTapi-teams-invite" data-component="body" required  hidden>
<br>
Role Id.
</p>
<p>
<b><code>office_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="office_id" data-endpoint="POSTapi-teams-invite" data-component="body" required  hidden>
<br>
Office Id.
</p>

</form>
<h2>Set Password</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/teams/set-password" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"password":"dolorum","invite":"molestiae","name":"architecto"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/teams/set-password"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "password": "dolorum",
    "invite": "molestiae",
    "name": "architecto"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/teams/set-password',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
            'Access-Control-Allow-Origin' =&gt; '*',
        ],
        'json' =&gt; [
            'password' =&gt; 'dolorum',
            'invite' =&gt; 'molestiae',
            'name' =&gt; 'architecto',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-teams-set-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-teams-set-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teams-set-password"></code></pre>
</div>
<div id="execution-error-POSTapi-teams-set-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teams-set-password"></code></pre>
</div>
<form id="form-POSTapi-teams-set-password" data-method="POST" data-path="api/teams/set-password" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-teams-set-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-teams-set-password" onclick="tryItOut('POSTapi-teams-set-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-teams-set-password" onclick="cancelTryOut('POSTapi-teams-set-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-teams-set-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/teams/set-password</code></b>
</p>
<p>
<label id="auth-POSTapi-teams-set-password" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-teams-set-password" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-teams-set-password" data-component="body" required  hidden>
<br>
User Password
</p>
<p>
<b><code>invite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="invite" data-endpoint="POSTapi-teams-set-password" data-component="body" required  hidden>
<br>
Invite Id
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-teams-set-password" data-component="body" required  hidden>
<br>
Name
</p>

</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="php">php</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript","php"];
        setupLanguages(languages);
    });
</script>
</body>
</html>