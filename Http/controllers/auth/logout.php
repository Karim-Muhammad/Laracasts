<?php

use Http\Auth\Authenticator;

(new Authenticator)->logout();
redirect("/login");