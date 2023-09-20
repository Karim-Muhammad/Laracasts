<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <li class="p-4 bg-slate-300 cursor-pointer hover:ring block flex justify-between">
                <span><?= $note["content"] ?></span>
                <img src="/views/images/icons8-note-64.png" alt="note icon"/>
            </li>
        </ul>
    </div>
</main>

<?php require('partials/footer.php') ?>
