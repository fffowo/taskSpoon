<!DOCTYPE html>
<html lang="en">

<?php
include "./assets/functions.php";
?>

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
        <div class="row">
            <div class="col-sm">
                How many spoons do you have?

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <p>
                        <input type="radio" name="diffGet" value="1"> <i class="fa-sharp fa-solid fa-spoon"></i> &emsp;
                        <input type="radio" name="diffGet" value="2"> <i class="fa-sharp fa-solid fa-spoon"></i><i class="fa-sharp fa-solid fa-spoon"></i> &emsp;
                        <input type="radio" name="diffGet" value="3"> <i class="fa-sharp fa-solid fa-spoon"></i><i class="fa-sharp fa-solid fa-spoon"></i><i class="fa-sharp fa-solid fa-spoon"></i>
                    </p>
                    <p>
                        <button type="submit" name="getTask" class="btn" id="getTaskBtn">give me a task!</button>
                    </p>
                </form>
            </div>

            <div class="col-sm">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <label for="inputText">Task: </label>
                    <input type="text" name="inputText" id="inputText" required>

                    <p>
                        <label for="difficulty">Spoons: </label>
                        <input type="radio" name="diffPost" value="1"> <i class="fa-sharp fa-solid fa-spoon"></i> &emsp;
                        <input type="radio" name="diffPost" value="2"> <i class="fa-sharp fa-solid fa-spoon"></i><i class="fa-sharp fa-solid fa-spoon"></i> &emsp;
                        <input type="radio" name="diffPost" value="3"> <i class="fa-sharp fa-solid fa-spoon"></i><i class="fa-sharp fa-solid fa-spoon"></i><i class="fa-sharp fa-solid fa-spoon"></i>

                    <p>
                        <button type="submit" name="submitTask" class="btn" id="submitTaskBtn">submit a task!</button>
                    </p>
                    </p>
                </form>
            </div>


        </div>
    </div>


    <div class="container text-center">
        <?php
        // SUBMIT TASK TO DATABASE ----------------------------------------------------------------------------
        $submitted_task = $_POST["inputText"];
        $submitted_difficulty = $_POST["diffPost"];

        if (isset($_POST['submitTask'])) {
            submit_task($submitted_task, $submitted_difficulty);
            echo "<h2>";
            echo $submitted_task . " (" . $submitted_difficulty . ")";
            echo " submitted!";
            echo "</h2>";
        }

        // GET TASK FROM DATABASE ----------------------------------------------------------------------------
        $get_difficulty = $_POST["diffGet"];
        $got_task = false;


        if (isset($_POST['getTask'])) {
            $got_task = true;
            $results = get_task($get_difficulty);

            $gotten_task = $results["task"];
            $gotten_task_id = $results["ID"];


        ?>
            <h2><?php echo $gotten_task . $gotten_task_id; ?></h2>

        <?php
        }
        ?>



        <form action="<?php echo htmlspecialchars('./delete_task.php'); ?>" method="post">
            <button type="submit" class="btn" name="deleteTask">delete a task</button>
        </form>



        <?php
        ?>
    </div>



    <footer>Fo made this in August 2023 for Sam <i class="fa-solid fa-heart fa-beat"></i></footer>


</body>

</html>