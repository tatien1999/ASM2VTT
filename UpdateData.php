<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<style>
    li {
        list-style: none;
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script>
    function CheckClass() {
        var CheckClassName = document.getElementById("Class1").value;
        var checkFullName = document.getElementById("Name1").value;
        var checkEmail = document.getElementById("Email1").value;
        if (CheckClassName == "GCD0818") {
            return true;
        } else if (checkFullName == "") {
            alert("FullName should have Data");
            return false;
        } else if (checkEmail == "") {
            alert("Email should have Data");
            return false;
        } else {
            alert("ClassName should equal GCD0818");
            return false;
        }
    }
</script>

<body>

    <h1>Update to the database</h1>
    <ul>
        <form name="UpdateData" action="UpdateData.php" method="POST">
            <li>Student ID:</li>
            <li><input type="text" name="stuid" id= /></li>
            <li>Full Name:</li>
            <li><input type="text" name="fname" id="Name1" /></li>
            <li>Email:</li>
            <li><input type="text" name="email" id="Email1" /></li>
            <li>Class:</li>
            <li><input type="text" name="classname" id="Class1" /></li>
            <li><input type="submit" onclick="CheckClass()" /></li>
        </form>

    </ul>
    <div class="row">
        <div class="col-12">
            <a href="ConnectToDB.php" class="myButton pl-3">View Data</a>

            <a href="InsertData.php" class="myButton pl-3">Insert data to the database</a>

            <a href="DeleteData.php" class="myButton pl-3">Delete data to the database</a>
        </div>
    </div>
    <?php
    // ini_set('display_errors', 1);
    // echo "Update database!";
    ?>

    <?php


    if (empty(getenv("DATABASE_URL"))) {
        echo '<p>The DB does not exist</p>';
        $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
    } else {

        $db = parse_url(getenv("DATABASE_URL"));
        $pdo = new PDO("pgsql:" . sprintf(
            "host=ec2-107-20-230-70.compute-1.amazonaws.com;port=5432;user=eirmniiakxyqoe;password=3e07e3615308dc1f376f5cd4effa6c325e0288742205be8c3e6e0978ce59482b;dbname=d6r6sqblr6dakr",
            $db["host"],
            $db["port"],
            $db["user"],
            $db["pass"],
            ltrim($db["path"], "/")
        ));
    }

    $sql = "UPDATE student SET fname = '$_POST[fname]', email = '$_POST[email]', classname = '$_POST[classname]'
        WHERE stuid = '$_POST[stuid]'";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute() == TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record. ";
    }

    ?>
</body>

</html>