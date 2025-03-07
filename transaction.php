<?php
          $server = "localhost";
          $username = "root";
          $password = "";
          $database = "expense_tracker";

          $conn = new mysqli($server, $username, $password, $database);

          if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = rand(1000000, 9999999);
                    $name = $_POST['name'];
                    $amount = $_POST['amount'];
                    $date = date('Y-m-d');

                    $sql = "INSERT INTO transactions (id, name, amount, date) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("isis", $id, $name, $amount, $date);
                    $stmt->execute();
                    $stmt->close();
          }

          $sql = "SELECT * FROM transactions";
          $result = $conn->query($sql);

?>

<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Transactions</title>
          <style>
                    * {
                              font-family: Arial, sans-serif;
                    }
                    table {
                              width: 100%;
                              border-collapse: collapse;
                    }
                    th, td {
                              border: 1px solid black;
                              padding: 8px;
                              text-align: left;
                    }
                    th {
                              background-color: #f2f2f2;
                    }

                    form {
                              margin-bottom: 20px;
                    }
                    label {
                              display: block;
                              margin-bottom: 5px;
                    }
                    form input, form select {
                              margin-bottom: 10px;
                    }
                    button {
                              padding: 5px 10px;
                              background-color: #4CAF50;
                              color: white;
                              border: none;
                              cursor: pointer;
                    }

                    button:hover {
                              background-color: #45a049;
                    }
                    select {
                              padding: 5px;
                    }
                    option {
                              padding: 5px;
                    }
          </style>
</head>
<body>
          <form action="transaction.php" method="post">
                    <h1>Add transaction</h1>
                    <label for="name">transaction name: </label>
                    <select name="name" id="name" required>
                              <option value="salary">Salary</option>
                              <option value="rent">Rent</option>
                              <option value="grocery">Grocery</option>
                              <option value="fuel">Fuel</option>
                    </select>
                    <label for="amount">transaction amount: </label>
                    <input type="number" name="amount" id="amount" required>
                    <button type="submit">Add transaction</button>
          </form>
          <h1>Transactions</h1>
          <table>
                    <tr>
                              <th>Transaction ID</th>
                              <th>Transaction name</th>
                              <th>Transaction amount</th>
                              <th>Transaction date</th>
                    </tr>
                    <?php
                              if($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                                  echo "<tr>";
                                                  echo "<td>" . $row['id'] . "</td>";
                                                  echo "<td>" . $row['name'] . "</td>";
                                                  echo "<td>" . $row['amount'] . "</td>";
                                                  echo "<td>" . $row['date'] . "</td>";
                                                  echo "</tr>";
                                        }
                              } else {
                                        echo "<tr><td colspan='4'>No transactions found</td></tr>";
                              }
                    ?>
          </table>
</body>
</html>