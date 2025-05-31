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



function logIn($user,$remember = false)
{

    $_SESSION['user'] =  [
        'id' => $user['user_id'],         // ✅ هذا أهم شيء
        'username' => $user['username'],
        'email' => $user['email'],
        'type' => $user['type']

    ];

    session_regenerate_id(true);

        // إذا طلب المستخدم تذكر بيانات الدخول
    if ($remember) {
        // إنشاء كوكي لتذكر المستخدم
        $cookie_value = [
            'user_id' => $user['user_id'],
            'token' => bin2hex(random_bytes(16)) // توليد رمز عشوائي آمن
        ];
        
        // تخزين الكوكي لمدة 30 يوم (يمكنك تعديل المدة)
        setcookie(
            'remember_me',
            json_encode($cookie_value),
            time() + (86400 * 30), // 30 يوم
            '/',
            '', // اتركه فارغاً ليعمل على النطاق الحالي
            true, // Secure - HTTPS فقط
            true  // HttpOnly - لا يمكن الوصول عبر JavaScript
        );
        
        // هنا يمكنك تخزين الرمز (token) في قاعدة البيانات
        // للتحقق منه لاحقاً
        // saveRememberToken($user['user_id'], $cookie_value['token']);
    }
}



function logOut()
{
    $_SESSION = [];
    $user['email']  = null;
    session_destroy();

    $params =  session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
