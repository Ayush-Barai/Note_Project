<?php require('partials/head.php')?>
<body>
    <?php require('partials/nav.php')?> 
    <?php require('partials/banner.php')?>
    <div class = "p-4">
        <h1>
            Hello <?php echo $_SESSION['user']['email'] ?? 'Guest'?> Welcome to home page.  
        </h1> 
    </div>

</body>
</html>