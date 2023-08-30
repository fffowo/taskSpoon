
<?php
function get_database_data()
{
    $data = array(
        'servername' => "localhost",
        'username' => "root",
        'password' => "",
        'dbname' => "taskspoon"
    );
    return $data;
}

function connect()
{
    $servername = get_database_data()['servername'];
    $username = get_database_data()['username'];
    $password = get_database_data()['password'];
    $dbname = get_database_data()['dbname'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function submit_task($task, $difficulty)
{
    $sql = "INSERT INTO taskspoon(task, difficulty) VALUES('" . $task . "', '" . $difficulty . "')";
    connect()->query($sql);
    connect()->close();
}

function get_all_tasks()
{
    $sql = "SELECT * FROM taskspoon";

    $result = connect()->query($sql);

    $result_arr = array();

    if ($result->num_rows > 0) {
        foreach ($result as $task) {
            array_push($result_arr, $task);
        }
    }
    return $result_arr;

    connect()->close();
}

function get_task($difficulty)
{
    $sql = "SELECT ID, task FROM taskspoon WHERE difficulty = $difficulty";

    $result = connect()->query($sql);

    $result_arr = array();

    if ($result->num_rows > 0) {
        foreach ($result as $task) {
            array_push($result_arr, $task);
        }
    }

        $r = rand(0, count($result_arr) -1);

        // echo "<pre>";
        // var_dump($result_arr);
        // echo "</pre>";

        if ($result_arr[$r]) {
            return $result_arr[$r];
        } else {
            return "try again";
        }
    connect()->close();
}

function delete_task($gotten_ID)
{
    $sql = "DELETE FROM taskspoon WHERE ID LIKE $gotten_ID ";
    connect()->query($sql);
    connect()->close();
}

?>