<?php require('partials/head.php')?>
<?php require('partials/nav.php')?> 
<?php require('partials/banner.php')?>
<body>
    <div class = "mx-7 max-w-7xl py-5 m">
        <h1>
            This is Single Note Page
            <li>
                <a href="/note?id=<?=$note['id']?>" class ="hover:underline">
                    <p><?= $note['body'] ?></p>
                </a>
            </li>
        </h1> 
    </div>

</body>
</html>