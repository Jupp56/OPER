<div id="userdata">
    <div class="row">
        <div class="col-auto myborder">
            <form action="logout.php">
            Benutzer: <?php print($_COOKIE['user']); ?><br>
            <input class="hidden" name="username" value="<?php print($_COOKIE['user']); ?>">
            <button class="mt-1 float-right"type="submit">Abmelden</button>
            </form>
        </div>
    </div>
</div>