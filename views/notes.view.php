<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul class="group bg-slate-200 p-4 grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-4 gap-3">
        <?php foreach ($notes as $note) : ?>
            <li class="transition-all hover:bg-slate-400 hover:text-slate-100 p-4 bg-slate-300 cursor-pointer hover:ring ring-slate-400">
                <a href="note?id=<?=$note["id"]?>" class="flex justify-between">
                    <span><?= $note["content"] ?></span>
                    <img class='max-w-[24px] object-contain' src="/views/images/icons8-note-64.png" alt="note icon"/>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>

        <a href="/notes/create" class="transition-all block w-fit py-2 px-4 bg-slate-100 rounded-lg shadow-md hover:rounded-xl hover:scale-x-110">Create Note</a>
    </div>
</main>

<?php require('partials/footer.php') ?>
