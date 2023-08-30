<?php

include "./assets/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskSpoon</title>

    <script src="https://kit.fontawesome.com/17b5d12a1c.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Varela+Round&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="public/styles.css">

</head>

<body>

    <div class="jumbotron">
        <h1>TaskSpoon!</h1>

        <h2>A task, one spoon at a time</h2>


    </div>


    <div class="container text-center">

        <table class="table">

        <th>ID</th>
        <th>Difficulty</th>
        <th>Task</th>

            <?php
            foreach (get_all_tasks() as $task) {
            ?>
                <tr>

                    <td> <?php echo $task['ID']; ?> </td>
                    <td> <?php echo $task['difficulty']; ?> </td>
                    <td> <?php echo $task['task']; ?> </td>

                </tr>
            <?php
            }
            ?>

        </table>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="input-group mb-3">

            <input type="number" name="inputID" placeholder="ID" class="form-control" required>
            <button type="submit" name="deleteID" class="btn">delete this ID</button>
        </div>
        </form>


        <?php

        if (isset($_POST['deleteID'])) {
            delete_task($_POST['inputID']);
            echo "deleted!";
        }

        ?>

    </div>
</body>

</html>