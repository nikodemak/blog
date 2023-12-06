<div id="head" style="display:flex;
    justify-items:center;
    justify-content:space-around;
    align-items:center;
    width: auto;
    height: fit-content;
    background-color: orange;
    padding: 1em;">
    <?php if(!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) { ?>
        <a href="login_page.php">login</a>
        <a href="register_page.php">register</a>
    <?php }?>
    <a href="archive_page.php">archive</a>
    <a href=".">Main Page</a>
    <?php if(isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) { ?>
        <?php if($_SESSION["credentials"]["ID"] == 0) { ?> <a href="users_page.php">see all users</a> <?php } ?>
        <a href="add_page.php">add a page</a>
        <a href="logout.php">logout</a>
     <?php }?>
</div>