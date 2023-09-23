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

function base_path($path)
{
    return ROOT . $path;
}

function controller(string $path)
{
    // require_once base_path("controllers/$path.php");
    return base_path($path);
}

function view(string $path, ?array $data = []): void
{
    extract($data);
    require_once base_path("views/$path");
    return;
}