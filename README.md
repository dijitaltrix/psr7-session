## Session Middleware

This middleware injects your session handler into the Request Object.

## Usage

```php
$app->add(new \Geggleto\Middleware\Session('session_name'));
```

## Example
```php
//In your Session you have
[
    'user' => 1
]

//Then in your Request Object, if you want your User ID...

$request->getAttribute('user') === 1

```