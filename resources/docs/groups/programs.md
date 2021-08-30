# Programs
API Endpoints for managing programs

## List Programs

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/programs/all" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
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
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/programs/all',
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


## Create Program

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/programs/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"deserunt","office_id":7,"program_code":"reiciendis","program_type_id":4,"colour_option":"optio"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "deserunt",
    "office_id": 7,
    "program_code": "reiciendis",
    "program_type_id": 4,
    "colour_option": "optio"
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
    'http://localhost:8000/api/programs/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'deserunt',
            'office_id' => 7,
            'program_code' => 'reiciendis',
            'program_type_id' => 4,
            'colour_option' => 'optio',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Display Program Details

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/programs/3/details" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/3/details"
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
    'http://localhost:8000/api/programs/3/details',
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


## Update Program

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/programs/19/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"et","office_id":1,"program_code":"aut","program_type_id":5,"colour_option":"dolorum"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/19/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "et",
    "office_id": 1,
    "program_code": "aut",
    "program_type_id": 5,
    "colour_option": "dolorum"
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
    'http://localhost:8000/api/programs/19/update',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'et',
            'office_id' => 1,
            'program_code' => 'aut',
            'program_type_id' => 5,
            'colour_option' => 'dolorum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Delete Program

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/programs/2/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/2/delete"
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
    'http://localhost:8000/api/programs/2/delete',
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


## Send Member Invites

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/programs/invite/3/send" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"nemo","member_type_id":7}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/invite/3/send"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "email": "nemo",
    "member_type_id": 7
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
    'http://localhost:8000/api/programs/invite/3/send',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'email' => 'nemo',
            'member_type_id' => 7,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## List Program Member Types

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/programs/member-types" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
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
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/programs/member-types',
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


## Create Program Member Type

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/programs/member-types/create" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"quos"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/member-types/create"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "quos"
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
    'http://localhost:8000/api/programs/member-types/create',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'quos',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Program Member Type Details

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/programs/member-types/13/details" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/member-types/13/details"
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
    'http://localhost:8000/api/programs/member-types/13/details',
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


## Update Program Member Type

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/programs/member-types/porro/update" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"consequatur"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/member-types/porro/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "consequatur"
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
    'http://localhost:8000/api/programs/member-types/porro/update',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'consequatur',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Delete Program Member Type

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/programs/member-types/18/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/member-types/18/delete"
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
    'http://localhost:8000/api/programs/member-types/18/delete',
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


## List Program Members

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/programs/3/members" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/3/members"
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
    'http://localhost:8000/api/programs/3/members',
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


## Add New Member|Members

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/programs/6/new-members" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"user_id":"officia","member_type_id":20}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/6/new-members"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "user_id": "officia",
    "member_type_id": 20
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
    'http://localhost:8000/api/programs/6/new-members',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'user_id' => 'officia',
            'member_type_id' => 20,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Revoke Program Membership

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/programs/2/revoke-membership" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"user_id":7,"member_type_id":7}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/2/revoke-membership"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "user_id": 7,
    "member_type_id": 7
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
    'http://localhost:8000/api/programs/2/revoke-membership',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'user_id' => 7,
            'member_type_id' => 7,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Activate Program Membership

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/programs/1/activate-membership" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"user_id":9,"member_type_id":1}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/programs/1/activate-membership"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "user_id": 9,
    "member_type_id": 1
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
    'http://localhost:8000/api/programs/1/activate-membership',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'user_id' => 9,
            'member_type_id' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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

</form>



