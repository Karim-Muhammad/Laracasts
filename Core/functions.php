<?php

declare(strict_types=1);

function dd($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";

    die();
}

function purify($input)
{
    return htmlspecialchars(htmlentities(trim($input)));
}

function authorize(bool $condition): bool
{
    if ($condition = false)
        Core\Response::abort(\Core\Response::UNAUTHORIZED);
    return true;
}

function abort($code) {
    return view("errors/error_view.php", ["code" => $code]);
}

function base_path($path)
{
    return ROOT . $path;
}

function redirect($path) {
    header("Location: $path");
    exit();
}

    /** remove all cookies, sessions
     * @return void
     */
function logout() {
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 1, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

function view(string $path, ?array $data = []): void
{
    extract($data);
    require_once base_path("views/$path");
    return;
}