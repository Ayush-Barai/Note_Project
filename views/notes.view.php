<?php require('partials/head.php')?>
<?php require('partials/nav.php')?> 
<?php require('partials/banner.php')?>
<body>
    <div class = "mx-7 max-w-7xl py-5 m">
        <h1>
            This is Notes Page
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="/note?id=<?=$note['id']?>" class ="text-blue-800 hover:underline">
                        <?= $note['body'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </h1> 
    </div>

</body>
</html>