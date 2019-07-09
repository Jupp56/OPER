<div id="userdata" class="row">
    <div class="col myborder">
        <form action="logout.php">
            Benutzer: <?php print($_COOKIE['username']); ?><br>
            <input class="hidden" name="username" value="<?php print($_COOKIE['user']); ?>">
            <button class="mt-1 float-right" type="submit">Abmelden</button>
        </form>
    </div>
</div>