<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<button type="button" class="js-logOut">Log out</button>
<div class="tableMain">

        <text class="sign">Welcome to Admin page<br></text>
        <text>List of enabled tasks</text>

    <select class="selectAdmin" >
        <?php foreach ($tasks as $task) : ?>
            <option class="option"> <?= $task['to_do'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" class="newTask" placeholder='Add new task to list'>
    <button type="button" class="js-saveTask">Add task</button>
    <div class="messageAdmin"></div>
    <table class="tableUser" width="100%">
        <h2 class="header">Users DataBase</h2>
        <div class="borders">
            <tr>
                <th>№</th>
                <th>First Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="user_id" ><?= $user['id'] ?></td>

                    <td contenteditable='true' class="user_first_name">
                        <?= $user['first_name'] ?>
                    </td>

                    <td contenteditable='true' class="user_username">
                        <?= $user['username'] ?>
                    </td>

                    <td contenteditable='true' class="user_email">
                        <?= $user['email'] ?>
                    </td>
                    <td>
                        <select class="select"  class="select" size="2" name="list">
                            <?php foreach ($tasks as $task) : ?>
                                <option class="option"> <?= $task['to_do'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="js-editRow">Edit</button>
                        <button class="js-deleteRow">Delete</button>
                        <button type="button" class="js-saveList">Add task</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </div>
        <div class="user_message"></div>
    </table>
</div>
<script src='admin.js'></script>
<script src='table.js'></script>