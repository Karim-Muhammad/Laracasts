### Service Container
- [ ] [Service Container](https://laravel.com/docs/5.8/container)

##### What is a Service Container?
> The Laravel service container is a powerful tool for managing class dependencies and performing dependency injection. Dependency injection is a fancy phrase that essentially means this: class dependencies are "injected" into the class via the constructor or, in some cases, "setter" methods.

###### What is Dependency Injection?
> A dependency is an object that can be used (a service). An injection is the passing of a dependency to a dependent object (a client) that would use it. The service is made part of the client's state. Passing the service to the client, rather than allowing a client to build or find the service, is the fundamental requirement of the pattern.

##### Binding
> Binding is the process of associating a service container with a builder function or refactory function, we call it like this because this function return object configured and ready to use.

##### Resolving
> Resolving is the process of retrieving an instance from the container. You may resolve instances of objects

##### What is Bootstrapping?
> Bootstrapping is the process of initializing a service. The service container is responsible for bootstrapping all of the various Laravel services, such as the database, queue, validation, and routing components.

###### What is a Service Provider?
> Service providers are the central place of all Laravel application bootstrapping. Your own application, as well as all of Laravel's core services are bootstrapped via service providers.


اي هو ال Service Container ؟
هو ببساطة class بيخزن ال services علي هيئة key-value pair الkey بيكون هو اسم الservice وال value هو ال initate بتاعت ال service دي

طب هو اي معني ال init دي

تخيل معايا لو عندنا في الapplication مجموعة classes عددها 10 مثلاً وكلهم محتاجين config object 
هنعمل ايه ؟
هنعمل config object ونعمل init لل 10 classes دي ونبعت ال config object لكل واحد منهم ؟
طبعاً دي مش مشكلة لو ال classes دي عددهم 10 ولكن لو عددهم 1000 ؟
هنعمل ايه ؟
هنعمل config object ونعمل init لل 1000 classes دي ونبعت ال config object لكل واحد منهم ؟
طبعاً دا هياخد وقت جامد جداً مننا وهيبقي مش عملي علي الإطلاق
طب اي الحل؟
الحل هو اننا نعمل config object ونبعته لل service container وال service container يعمل init لل 1000 classes دي ويبعت ال config object لكل واحد منهم 
بشكل اخر انا بدل ما اروح علي كل فايل واعمل الinit بإيدي وأستدعي الفايلات اللازمة عشان اقوم بالحوار دا انا هنادي فقط علي الcontainer
وهبعتلك الservice الي انا عاوز اقوم بيها مثلاً Database

وهو مباشرة هيعمل initiate ويظبط الconfig وبعدين يرجعلي ال Database Object في الحالة دي

طب ايه الفايدة من الحوار دا ؟
الفايدة هي اننا هنقدر نعمل dependency injection بشكل سهل جداً وهنقدر نعمل resolve لل dependencies بشكل سهل جداً

تاني هو يعني اي dependency injection، همم؟
هو اني بدل ما أكرر خطوات الconfiguration انا ببعت الconfig object (dependency) ببعته لل class كـ عملية (Inject) وهو يقوم بالخطوات دي بدل مني



I created a Container Class and made an object in `bootstrap.php` file and put this file in `public/index.php` 
but still this Container doesn't appear in Controllers Functions, because  we require theier files in `router->route` method not require thier files in `public/index.php` file!

so now scope is changed entirly, so what next? we need repeat what we did in `bootstrap.php` file again in all Controllers functions again??!!
so why we routed this path at the beginning?! right? YES, next branch we will explore `App` Class and how it works and how it can help us to solve this problem.


### App Class
App class will help us to solve the problem of scope, so we will not repeat what we did in `bootstrap.php` file again in all Controllers functions again.
we just `App::container(<name-of-container>)` and will grap this container in any place in our application.

but before that we need do multiple things

after we bind container we need `App::setContainer(container)`;
after that we can use this App in Whole Application and resolve what we want