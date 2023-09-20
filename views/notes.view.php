<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul class="group bg-slate-200 p-4 space-y-3">
        <?php foreach ($notes as $note) : ?>
            <li class="transition-all group-hover:bg-slate-400 group-hover:text-slate-100 p-4 bg-slate-300 cursor-pointer hover:ring ring-slate-400">
                <a href="note?id=<?=$note["id"]?>" class="flex justify-between">
                    <span><?= $note["content"] ?></span>
                    <img src="/views/images/icons8-note-64.png" alt="note icon"/>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>

        <a href="/notes/create" class="transition-all block w-fit py-2 px-4 bg-slate-100 rounded-lg shadow-md hover:rounded-xl hover:scale-x-110">Create Note</a>
    </div>
</main>

<?php require('partials/footer.php') ?>
