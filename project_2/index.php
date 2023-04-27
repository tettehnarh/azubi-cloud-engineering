<?php session_start(); /* Starts the session */

if (!isset($_SESSION['UserData']['Username'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Team Agile: Guest Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Set up AWS SDK for PHP
            require 'vendor/autoload.php';
            use Aws\DynamoDb\DynamoDbClient;
            use Aws\DynamoDb\Exception\DynamoDbException;
            use Aws\Common\Aws;

            // Set up the client
            $client = DynamoDbClient::factory(
                array(
                    'region' => 'us-east-1',
                    'version' => '2012-08-10',
                )
            );

            $tableName = "GuestBook";

            $tableRows = '';

            // Try to retrieve table items to check if there's a connection
            try {
                $result = $client->scan([
                    'TableName' => $tableName
                ]);
                $items = $result['Items'];
            } catch (DynamoDbException $e) {
                // If there's an error, show an error message in a table row that spans 3 columns
                header('HTTP/1.1 500 Internal Server Error');
                $tableRows = '<tr><td colspan="3" style="color:red;text-align:center;">
                                Error connecting to DynamoDB:<br> ' . $e->getMessage() . '</td></tr>';
                echo $tableRows;
                exit();
            }

            // If there's no error, continue with your code here
            foreach ($items as $item) {
                $email = $item['Email']['S'];
                $country = $item['Country']['S'];
                $name = $item['Name']['S'];
                $tableRows .= '<tr>' .
                    '<td>' . $name . '</td>' .
                    '<td>' . $email . '</td>' .
                    '<td>' . $country . '</td>' .
                    '</tr>';
            }

            echo $tableRows;
            ?>
        </tbody>
    </table>
    <button style="background:white"><a href="logout.php" rel="dofollow">Log out</a></button>
</body>

</html>