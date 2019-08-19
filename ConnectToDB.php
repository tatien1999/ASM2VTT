<!DOCTYPE html>
<html>

<body>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <h1>DATABASE CONNECTION</h1>

  <?php
  ini_set('display_errors', 1);
  echo "HELLO CLOUD COMPUTING";

  ?>

  <?php


  if (empty(getenv("DATABASE_URL"))) {
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
  } else {
    echo '<p>The DB exists</p>';
    echo getenv("dbname");
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

  $sql = "SELECT * FROM student ORDER BY stuid";
  $stmt = $pdo->prepare($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $stmt->execute();
  $resultSet = $stmt->fetchAll();
  echo '<p>Students information:</p>';
 
  ?>

  <div class="widget-content nopadding">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Classname</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultSet as $key => $value) : ?>
          <tr class="odd gradeX">
            <td><?php echo $value['stuid']; ?></td>
            <td><?php echo $value['fname']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['classname']; ?></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-12">
      <a href="InsertData.php" class="myButton pl-3">Insert data to the database</a>

      <a href="UpdateData.php" class="myButton pl-3">Update data to the database</a>

      <a href="DeleteData.php" class="myButton pl-3">Delete data to the database</a>
    </div>
  </div>
</body>

</html>