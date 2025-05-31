<?php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
function urls($value)
{
    return $_SERVER["REQUEST_URI"] == $value;
}

function routeToControler($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        http_response_code(200);

        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}


function authorize($condition, $status = Response::HTTP_FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}



function logIn($user)
{

    $_SESSION['user'] =  [
        'id' => $user['user_id'],         // ✅ هذا أهم شيء
        'username' => $user['username'],
        'email' => $user['email'],
        'type' => $user['type']

    ];

    session_regenerate_id(true);
}



function logOut()
{
    $_SESSION = [];
    $user['email']  = null;
    session_destroy();

    $params =  session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
