# Endpoints


## api/teams/invite




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/teams/invite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/teams/invite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/teams/invite',
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

url = 'http://localhost:8000/api/teams/invite'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()
```


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
</form>



