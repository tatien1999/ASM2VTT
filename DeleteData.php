<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    li {
        list-style: none;
    }
</style>
<script>
    x = document.getElementById("take");
    if (x == "") {
        alert("fuck");
    }
</script>

<body>


    <h1>Delete from database</h1>
    <ul>
        <form name="DeleteData" action="DeleteData.php" method="POST">
            <li>Student ID:</li>
            <li><input type="text" name="stuid" id="take" /></li>
            <li><input type="submit" /></li>
        </form>

    </ul>
    <div class="row">
        <div class="col-12">
            <a href="ConnectToDB.php" class="myButton pl-3">View Data</a>

            <a href="InsertData.php" class="myButton pl-3">Insert data to the database</a>

            <a href="UpdateData.php" class="myButton pl-3">Update data to the database</a>
        </div>
    </div>

    <?php
    // ini_set('display_errors', 1);
    // echo "Insert database!";
    ?>

    <?php



    if (empty(getenv("DATABASE_URL"))) {
        echo '<p>The DB does not exist</p>';
        $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
    } else {

        $db = parse_url(getenv("DATABASE_URL"));
        $pdo = new PDO("pgsql:" . sprintf(
            "host=ec2-174-129-240-67.compute-1.amazonaws.com;
            port=5432;
            user=yltdxmusbntgsw;
            password=dd568e381f91bf009a42dbf85f85febd3a81f0691f6e11320947468b80acd42d;
            dbname=dfcbo08gn57lve",
            $db["host"],
            $db["port"],
            $db["user"],
            $db["pass"],
            ltrim($db["path"], "/")
        ));
    }

    $sql = "DELETE FROM student WHERE stuid = '$_POST[stuid]'";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute() == TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: ";
    }

    ?>
</body>

</html>