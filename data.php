<!-- Including Required module -->
<?php  include './connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Base</title>
  <style>
    html {
      font-size: 62.5%;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-size: 1.6rem;
      font-family: cursive;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-image: linear-gradient(to left top, #ffb703, #fb8500, #e85d04);
    }

    table{
      border: 1px solid;
      border-collapse: collapse;
    }
    
    th,
    td{
      border: 1px solid;
      padding: .4rem .8rem;
    }
    th{
      color: #e3e7af;
      border-color: #000;
      font-size: 2rem;
      font-weight: 100;
    }
  </style>
</head>
<body>
  <table >
    <tr>
      <th>User ID</th>
      <th>User Name</th>
      <th>User Email</th>
      <th>User Password</th>
    </tr>

    <?php
      while($ROW = mysqli_fetch_assoc($result_for_fetch_data)){
        $id = $ROW['id'];
        $name = $ROW['displayName'];
        $email = $ROW['email'];
        $password = $ROW['password'];
        ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $password; ?></td>
        </tr>
        <?php
      }
    ?>

  </table>
</body>
</html>