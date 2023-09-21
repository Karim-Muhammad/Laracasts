<?php require view('partials/head') ?>
<?php require view('partials/nav') ?>
<?php require view('partials/banner') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <form method="post" action="create">
        <input name="user_id" value="1" type="hidden"/>
        <textarea name='note-content' class="w-full p-4 h-[50vh]" placeholder="Enter Your Note Here"></textarea>
        <p class="text-xs text-red-500"><?= $errors["string"] ?? "" ?></p>
        <input type="submit" value="create" class='cursor-pointer px-6 py-3 my-3 bg-green-300 hover:bg-green-400 rounded-lg'/>
      </form>
    </div>
</main>

<?php require view('partials/footer') ?>
