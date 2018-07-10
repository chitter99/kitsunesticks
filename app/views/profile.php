<?php require("layout/head.php"); ?>

<h1>Welcome <?=AuthService::getCurrentUser()["vorname"]?></h1>

<!--
<pre>
    <?php print_r($_SESSION); ?>
</pre>
-->

<?php require("layout/foot.php"); ?>