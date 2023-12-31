<?php require_once base_path("views/partials/head.view.php"); ?>
<?php require_once base_path("views/partials/nav.view.php"); ?>
<?php require_once base_path("views/partials/banner.view.php"); ?>


<main class="">
    <div class="mx-auto sm:flex items-center max-w-screen-xl">
        <div class="sm:w-1/2 p-10">
            <div class="image object-center text-center">
                <img src="/images/Ninja.svg">
            </div>
        </div>
        <div class="sm:w-1/2 p-5">
            <div class="text">
                <span class="text-lg text-gray-800 border-b-2 border-indigo-600 uppercase">About us</span>
                <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="inline-block text-[#EE3B44]">Notes Guards</span> <img class="inline-block w-10" src="/images/warrior.svg" />
                </h2>
                <p class="text-gray-700">
                    Save your notes, and don't worry about losing them, we will keep them in danger.
                </p>
            </div>
        </div>
    </div>
</main>

<?php
    require_once base_path("views/partials/footer.view.php")
?>

