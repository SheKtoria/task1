<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="../../style.css">


<div class="tableMain">
    <table class="tableUser" width="100%">
        <h2 class="header">Users DataBase</h2>
        <div class="borders">
            <tr>
                <th>№</th>
                <th>First Name</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="user_id" ><?= $user['id'] ?></td>

                    <td class="user_first_name">
                        <?= $user['first_name'] ?>
                    </td>

                    <td class="user_username">
                        <?= $user['username'] ?>
                    </td>

                    <td class="user_email">
                        <?= $user['email'] ?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </div>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src='table.js'></script>