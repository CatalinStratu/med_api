# Authentication

APIs for managing users

## Login


This endpoint is used to authenticate a user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"john.doe@mailinator.com","password":"********"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john.doe@mailinator.com",
    "password": "********"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, OK):

```json
{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john.doe@mailinator.com",
        "email_verified_at": null,
        "created_at": "2020-11-04T01:48:03.000000Z",
        "updated_at": "2020-11-04T01:48:03.000000Z"
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNTUzOGFjYjRjYjFjN2E4OTI2ZDVhNDc5NTIxYmZiM2IzYTlmYzgwOTQ0MjI1MDY3ODMzY2FhYTRhZmQ5YmM3N2UwMTBhMjg5YmQ4YWNjOTMiLCJpYXQiOjE2MDQ0ODAyNjYsIm5iZiI6MTYwNDQ4MDI2NiwiZXhwIjoxNjA0NTY2NjY1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.kh8iMbKMpeSrLywBV9t734Zh_K6llrQxeBUt2aJnUfLw-G-rQw6o67MqdVAXtM74OsqDX-InveY8laIKGw50oniZ2YzVzqHOIbbuN3ZVe7kq8HFPziDD73296QRs0LGZxAADyZsJIU05_aLgOGvtBOz4dXXkfOlAyQ7T3p7w_JqWoBMd8PCxWn7wtN6EC8hmUQ9mAVJYLT85ucjVWEgaLeSjpWTN9g9aIUFKwtiw7sFNTSow76855rbao3u59O3rE_nKD7C9F2TC7XbuUcb1swmuo4zI_-uxVmt7qO9EsmbAjr78eps_3XZEpYxpt-RnQWSPs50K4y9pQzvmscauc1vD8ZXpEff_NR4uMTfhLockazZiM7G2O7-_RPqdELfubFSkTwb2CPklPAy6atVtwcBPULgZUa7olPP9Fs4CJvZn4rWV8rUJnou4wD2iEWwHLq5UN8wuRupUKoKPIlyPgHFVIZglXVvhlDo-FGwuprVmiNfF6xpEFKmeqnX5SjTuBKZ04tPGraclRn9PR89k_Dcw1mHFW6vVtX2iPj6ZXFx3tJVSpvmtpb67JiGK41vocd48XFMAdT5qQf2miOxRQjr-Qsp5c9Zk_Zm26ip8HasDjPk5IKgOYzXB1x4bLIqRKslUUPPdhE-NBUzapOEFr5Zb7K2kkyZE4VVXRPT4RjY",
    "token_type": "Bearer",
    "expires_at": "2020-11-05 08:57:45"
}
```
> Example response (422, Unprocessable entity):

```json

{
 "message": "The given data was invalid.",
 "errors": {
   "field": [
       "The field is required."
   ],
   ...
 }
}
```
<div id="execution-results-POSTapi-v1-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-login"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-login"></code></pre>
</div>
<form id="form-POSTapi-v1-login" data-method="POST" data-path="api/v1/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-login" onclick="tryItOut('POSTapi-v1-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-login" onclick="cancelTryOut('POSTapi-v1-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-login" data-component="body" required  hidden>
<br>
Email address of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-login" data-component="body" required  hidden>
<br>
Password.</p>

</form>


## Register new user


This endpoint is used to register a new user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first":"John.","last":"Doe .","email":"john.doe@mailinator.com","password":"********","password_confirmation":"********"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first": "John.",
    "last": "Doe .",
    "email": "john.doe@mailinator.com",
    "password": "********",
    "password_confirmation": "********"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (201, OK):

```json

{
 {
"message": "User successfully registered",
 "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvcmVnaXN0ZXIiLCJpYXQiOjE2MDQ2NjkyOTgsImV4cCI6MTYwNDY3Mjg5OCwibmJmIjoxNjA0NjY5Mjk4LCJqdGkiOiJQNnZIVzZ4aEIyODR5MFVhIiwic3ViIjo0LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.GXmKChKDsG-SXRaDl39LfNz_Ip4pY80Zmkp6qfFB4fs",
 "token_type": "bearer",
 "expires_in": 3600,
 "user": {
     "first": "Catalin",
     "last": "Stratu",
     "role": "1",
     "email": "test@gmail.com",
     "updated_at": "2020-11-05T13:38:40.000000Z",
     "created_at": "2020-11-05T13:38:40.000000Z",
     "id": 2
     }
 }
```
> Example response (422, Unprocessable entity):

```json

{
 "message": "The given data was invalid.",
 "errors": {
   "field": [
       "The field is required."
   ],
   ...
 }
}
```
<div id="execution-results-POSTapi-v1-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-register"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-register"></code></pre>
</div>
<form id="form-POSTapi-v1-register" data-method="POST" data-path="api/v1/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-register" onclick="tryItOut('POSTapi-v1-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-register" onclick="cancelTryOut('POSTapi-v1-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
First Name of the user</p>
<p>
<b><code>last</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
Last Name of the user</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
Email address of the user.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
Password.</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password_confirmation" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
Confirm password.</p>

</form>


## Logout


This endpoint is used to revoke user's access token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/logout"
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


> Example response (200, OK):

```json
{
    "message": "Token successfully revoked"
}
```
<div id="execution-results-POSTapi-v1-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-logout"></code></pre>
</div>
<form id="form-POSTapi-v1-logout" data-method="POST" data-path="api/v1/logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-logout" onclick="tryItOut('POSTapi-v1-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-logout" onclick="cancelTryOut('POSTapi-v1-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/logout</code></b>
</p>
</form>


## Refresh a token.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/refresh"
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


<div id="execution-results-POSTapi-v1-refresh" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-refresh"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-refresh"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-refresh"></code></pre>
</div>
<form id="form-POSTapi-v1-refresh" data-method="POST" data-path="api/v1/refresh" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-refresh', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-refresh" onclick="tryItOut('POSTapi-v1-refresh');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-refresh" onclick="cancelTryOut('POSTapi-v1-refresh');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-refresh" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/refresh</code></b>
</p>
</form>


## Get the authenticated User.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/user-profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user-profile"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-user-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-user-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user-profile"></code></pre>
</div>
<div id="execution-error-GETapi-v1-user-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user-profile"></code></pre>
</div>
<form id="form-GETapi-v1-user-profile" data-method="GET" data-path="api/v1/user-profile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-user-profile" onclick="tryItOut('GETapi-v1-user-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-user-profile" onclick="cancelTryOut('GETapi-v1-user-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-user-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/user-profile</code></b>
</p>
</form>



