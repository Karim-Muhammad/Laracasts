<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <form method="post" action="create">
        <textarea name='note-content' class="w-full p-4 h-[50vh]" placeholder="Enter Your Note Here"></textarea>
        <input type="submit" value="create" class='cursor-pointer px-6 py-3 my-3 bg-green-300 hover:bg-green-400 rounded-lg'/>
      </form>
    </div>
</main>

<?php require('partials/footer.php') ?>
