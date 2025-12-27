<?php require base_path('views/partials/head.php')?>
<?php require base_path('views/partials/nav.php')?> 
<?php require base_path('views/partials/banner.php')?>
<body>
    <div class = "mx-7 max-w-7xl py-5 m">
        <h1>
            <ul>
                <?php foreach ($notes as $note): ?>
                    <li>
                        <a href="/note?id=<?=$note['id']?>" class ="text-blue-800 hover:underline">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </h1> 

        <p class ="mt-6">
            <a href="/notes/create" class ="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>

</body>
</html>