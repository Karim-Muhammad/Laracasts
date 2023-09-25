<?php require_once base_path("views/partials/head.view.php"); ?>
<?php require_once base_path("views/partials/nav.view.php"); ?>


    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login Account
                    </h1>
                    <?php if (isset($_SESSION['errors']['auth-msg'])): ?>
                        <p class="text-red-500 text-xs"><?= $_SESSION['errors']['auth-msg'] ?></p>
                    <?php endif; ?>
                    <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="name@company.com"
                                   value="<?= $_SESSION["inputs"]["email"] ?? "" ?>"
                                   required
                            >
                        </div>
                        <?php if (isset($_SESSION['errors']['email'])): ?>
                            <p class="text-red-500 text-xs"><?= $_SESSION['errors']['username'] ?></p>
                        <?php endif; ?>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   value="<?= $_SESSION["inputs"]["password"] ?? "" ?>"
                                   required>
                        </div>
                        <?php if (isset($_SESSION['errors']['password'])): ?>
                            <p class="text-red-500 text-xs"><?= $_SESSION['errors']['password'] ?></p>
                        <?php endif; ?>
                        <button type="submit"
                                class="w-full text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Login
                            account
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            have not an account? <a href="/register"
                                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php require_once base_path("views/partials/footer.view.php") ?>