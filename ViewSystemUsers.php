<?php
// For loop on apps,join the tables and use the .hidden in rejected apps (optional)
require_once("navbar.php");
require_once("denyaccess.php");
require_once("configurations.php");
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
$system_users = $user->show_all_users_and_recruiters();
?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

    *,
    *:before,
    *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #105469;
        font-family: 'Open Sans', sans-serif;
    }

    table {
        background: #012B39;
        border-radius: 0.25em;
        border-collapse: collapse;
        margin: 1em;
    }

    th {
        border-bottom: 1px solid #364043;
        color: #E2B842;
        font-size: 0.85em;
        font-weight: 600;
        padding: 0.5em 1em;
        text-align: left;
    }

    td {
        color: #fff;
        font-weight: 400;
        padding: 0.65em 1em;
    }

    .disabled td {
        color: #4F5F64;
    }

    tbody tr {
        transition: background 0.25s ease;
    }

    tbody tr:hover {
        background: #014055;
    }
</style>
<center>
    <table style="height: 75px">
        <thead>
            <tr>
                <th>
                <th>User ID
                <th>username
                <th>email
                <th>role

        </thead>
        <tbody>
            <?php foreach ($system_users as $system_user) { ?>
                <tr>
                    <td>
                        <a href="manageban.php?user_id=<?= $system_user['user_id'] ?>&username=<?= $system_user['username'] ?>" class="btn btn-danger btn-sm btn-ban">Ban</a>
                    </td>

                    <td><?= $system_user['user_id'] ?></td>
                    <td><?= $system_user['username'] ?></td>
                    <td><?= $system_user['email'] ?></td>
                    <td><?= $system_user['role'] ?></td>
                </tr>
            <?php } ?>
        </tbody>


    </table>
    <a name="" id="" class="btn btn-primary" href="home.php" role="button">Back to home</a>
</center>