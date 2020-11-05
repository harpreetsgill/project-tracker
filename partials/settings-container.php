<div id="main">

    <!-- Settings section header -->
    <div class="div-section-head">
        <h2>Settings</h2>
    </div>

    <!-- Main Settings -->
    <form id="form-settings" method="POST" action="app/update-settings.php">

        <label>Username</label>
        <input class="input-field" type="text" name="user_new_username">

        <label>Password</label>
        <input class="input-field" type="password" name="user_new_password">

        <label>Retype Password</label>
        <input class="input-field" type="password" name="user_new_password_retype">

        <input class="input-button" type="submit" value="Change" name="btn-change">
    </form>

</div>