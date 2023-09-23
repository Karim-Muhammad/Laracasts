# Refactoring (One Controller) in ONE endpoint One Request type!

In This Refactoring, we made these controllers like a RESTFUL endpoints.  
We have a controller for each of the resources that we have in our application.

so in this case we made a controller for destroying, creating, updating, showing and controllers for showing all the resources to to operations on them.

in this refactoring, it didn't take time, we just changed some code from the controllers and routes and we made a new controller for each of the resources.

instead of one controller may do multiple operations, like in case [U]pdate operation before, we was doing the `GET notes/edit` execute `edit.php` which show just form and `POST(_PUT) notes/edit` (in same route) execute `edit.php` (same controller), and we was doing the same for the some  
other operations, there are handle some different routes but execute the same controller as well

in this refactoring, we made a controller for each of the resources, so we have a controller for showing all the notes, and another controller for showing a specific note, and another controller for creating a note, and another controller for updating a note, and another controller for deleting a note, etc...

```php  
    global $router;

    // ============================== Home ==============================
    $router->get("/", "controllers/index.php", routable: true, name: "Home");
    $router->get("/about", "controllers/about.php", routable: true, name: "About");
    $router->get("/contact", "controllers/contact.php", routable: true, name: "Contact");

    // ============================== Notes ==============================
    $router->get("/notes", "controllers/notes/index.php", routable: true, name: "Notes");

    $router->get("/notes/create", "controllers/notes/create.php");
    $router->post("/notes", "controllers/notes/store.php");

    $router->get("/notes/edit", "controllers/notes/edit.php");
    $router->put("/notes", "controllers/notes/update.php");

    $router->delete("/notes", "controllers/notes/destroy.php");

    // ============================== Note ==============================
    $router->get("/note", "controllers/notes/show.php");

    return $router->getRoutes();
```