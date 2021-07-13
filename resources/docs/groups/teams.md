# Teams
Invite Member

## All Users

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/teams/all?role=18" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/teams/all"
);

let params = {
    "role": "18",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
    'http://localhost:8000/api/teams/all',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'query' => [
            'role'=> '18',
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
</form>


## Get User by Id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/teams/show/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *"
```

```javascript
const url = new URL(
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
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/teams/show/1',
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


## Update member details.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/teams/update/1" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"name":"id","email":"consequuntur","phone_number":"dignissimos","office_id":1,"role_id":1,"timezone_id":2,"gender":"male","region":"East Africa","city":"Nairobi","languages":["minima","animi"]}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/teams/update/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "name": "id",
    "email": "consequuntur",
    "phone_number": "dignissimos",
    "office_id": 1,
    "role_id": 1,
    "timezone_id": 2,
    "gender": "male",
    "region": "East Africa",
    "city": "Nairobi",
    "languages": [
        "minima",
        "animi"
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
    'http://localhost:8000/api/teams/update/1',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'name' => 'id',
            'email' => 'consequuntur',
            'phone_number' => 'dignissimos',
            'office_id' => 1,
            'role_id' => 1,
            'timezone_id' => 2,
            'gender' => 'male',
            'region' => 'East Africa',
            'city' => 'Nairobi',
            'languages' => [
                'minima',
                'animi',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Invite member

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/teams/invite" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"email":"blanditiis","role_id":17,"office_id":12}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/teams/invite"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "email": "blanditiis",
    "role_id": 17,
    "office_id": 12
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
    'http://localhost:8000/api/teams/invite',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'email' => 'blanditiis',
            'role_id' => 17,
            'office_id' => 12,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


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


## Set Password




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/teams/set-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -d '{"password":"a","invite":"labore"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/teams/set-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Access-Control-Allow-Origin": "*",
};

let body = {
    "password": "a",
    "invite": "labore"
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
    'http://localhost:8000/api/teams/set-password',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
        ],
        'json' => [
            'password' => 'a',
            'invite' => 'labore',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


<div id="execution-results-POSTapi-teams-set-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-teams-set-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teams-set-password"></code></pre>
</div>
<div id="execution-error-POSTapi-teams-set-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teams-set-password"></code></pre>
</div>
<form id="form-POSTapi-teams-set-password" data-method="POST" data-path="api/teams/set-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Access-Control-Allow-Origin":"*"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-teams-set-password', this);">
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
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-teams-set-password" data-component="body" required  hidden>
<br>
Password.
</p>
<p>
<b><code>invite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="invite" data-endpoint="POSTapi-teams-set-password" data-component="body" required  hidden>
<br>
Invite Id.
</p>

</form>



