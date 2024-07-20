<?php
session_start();
include '../controllers/config.php';

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $columns = getColumns($conn, $table);
    echo json_encode(['columns' => $columns]);
}

function getColumns($conn, $table) {
    $columns = [];
    $query = "SHOW COLUMNS FROM $table";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
    return $columns;
}


if (isset($_GET['table']) && isset($_GET['id'])) {
    $table = $_GET['table'];
    $id = $_GET['id'];

    $query = "SELECT * FROM `$table` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();

    echo json_encode($record);
    
    $stmt->close();

}

?>

<?php
if (isset($_GET['table']) && isset($_GET['id'])) {
    $table = $_GET['table'];
    $id = $_GET['id'];

    $query = "SELECT * FROM `$table` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();

    $recordJson = json_encode($record);
    echo "<script>
            var record = $recordJson;
            document.addEventListener('DOMContentLoaded', function() {
                var form = document.getElementById('dynamic-form');
                for (var key in record) {
                    if (record.hasOwnProperty(key)) {
                        var input = document.createElement('input');
                        input.type = 'text';
                        input.name = key;
                        input.value = record[key];
                        input.placeholder = key;
                        form.appendChild(input);
                        form.appendChild(document.createElement('br'));
                    }
                }
                var submitButton = document.createElement('input');
                submitButton.type = 'submit';
                submitButton.value = 'Submit';
                form.appendChild(submitButton);
            });
          </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #dynamic-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="text"] {
            width: calc(100% - 22px); /* Adjust width to accommodate padding */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form id="dynamic-form" action="../controllers/edicion.php" method="post">
        <!-- Los inputs se insertarán aquí -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="tabla" value="<?php echo $table; ?>">
    </form>
</body>
</html>

