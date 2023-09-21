to avoid make our files treated as pages, we can move our index.php in separate file like /public so we cannot access like this ../<filename.php>

should change our document root to be /public folder not root of our project
php -S localhost:30 -t public

`-t <document-root>`

> https://laracasts.com/series/php-for-beginners-2023-edition/episodes/30
