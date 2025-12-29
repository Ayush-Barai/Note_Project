<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<body>
    <div class="mx-7 max-w-7xl py-5 m">
        <h1>
            <p class="mx-auto my-6">
                <a href="/notes" class="text-blue-500 underline"> Back.. </a>
            </p>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="hover:underline">
                    <p><?= htmlspecialchars($note['body']) ?></p>
                </a>

                <div class="mt-4">
                    <a href="/note/edit?id=<?= $note['id'] ?>"
                        class="text-gray-500 border border-current rounded px-2 py-1 ">
                        Edit
                    </a>
                    <!-- <form id="delete-form" class="mt-2" method="POST" action="/note">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?php //$note['id'] ?>">
                        <button type="submit" class="text-red-500 text-sm mt-2 rounded bg-gray-200 py-1 px-1">Delete</button>
                    </form> -->
                </div>


            </li>
        </h1>
    </div>

</body>

</html>