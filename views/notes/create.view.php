<?php require base_path('views/partials/head.php')?>
<?php require base_path('views/partials/nav.php')?> 
<?php require base_path('views/partials/banner.php')?>

<body>
    <div class="mx-7 max-w-7xl py-5">

        <form method="POST" action="/notes">
            <div class="space-y-12">
                <div class="border-b border-white/10 pb-12">

                    <div class="col-span-full rounded bg-gray-400 p-4">
                        <li class="m-2">
                            <label for="body" class="block text-sm font-medium text-black">
                                Write Note 
                            </label>
                        </li>

                        <div class="mt-2">
                            <textarea
                                id="body"
                                name="body"
                                rows="3"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-black"
                                placeholder="Here's an idea for a note ... "
                                required
                        ><?= $_POST['body'] ?? '' ?></textarea>
                            <?php if(isset($errors['body'])) :?>
                                <p class = "text-red-500 text-xs mt-2 ">
                                    <?= $errors['body'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <!-- IMPORTANT: Cancel must NOT submit -->
                        <button type="button" class="text-sm font-semibold text-black border-b">
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white"
                        >
                            Save
                        </button>
                    </div>

                </div>
            </div>
        </form>

    </div>
</body>
</html>
