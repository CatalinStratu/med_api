# User profile

APIs for managing with users data

## Update User information


This endpoint is used to register a new user.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/user/update-user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first":"John.","last":"Doe ."}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/update-user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first": "John.",
    "last": "Doe ."
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (201, OK):

```json

{
{
"message": "User updated successfully!",
"user": {
"id": 1,
"first": "matkks@gmail.comssssa",
"last": "123qweasdaaa",
"role": 1,
"balance": "0.00",
"profile_picture": null,
"email": "catalinstratu45@gmail.com",
"email_verified_at": null,
"created_at": "2020-11-05T12:46:10.000000Z",
"updated_at": "2020-11-06T22:13:26.000000Z"
}
}
```
> Example response (404, Not Found):

```json

{
{
"message": "User not found"
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
<div id="execution-results-PUTapi-v1-user-update-user" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-v1-user-update-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-user-update-user"></code></pre>
</div>
<div id="execution-error-PUTapi-v1-user-update-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-user-update-user"></code></pre>
</div>
<form id="form-PUTapi-v1-user-update-user" data-method="PUT" data-path="api/v1/user/update-user" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-user-update-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-v1-user-update-user" onclick="tryItOut('PUTapi-v1-user-update-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-v1-user-update-user" onclick="cancelTryOut('PUTapi-v1-user-update-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-v1-user-update-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/v1/user/update-user</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first" data-endpoint="PUTapi-v1-user-update-user" data-component="body" required  hidden>
<br>
First Name of the user</p>
<p>
<b><code>last</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last" data-endpoint="PUTapi-v1-user-update-user" data-component="body" required  hidden>
<br>
Last Name of the user</p>

</form>



