<!-- PHP code to fetch and display user information in table rows -->
<?php
// Establish database connection (You should have this part already in your code)

// SQL query to fetch user information
$sql = "SELECT * FROM CommuniKitUsers";
$result = $conn->query($sql);

// Check if there are any rows returned by the query
if ($result->num_rows > 0) {
    // Loop through each row of the result set
    while($row = $result->fetch_assoc()) {
        // Output the data of each row in table rows
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["birthday"] . "</td>";
        echo "<td>" . $row["school"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["about_message"] . "</td>";
        // Add other table data cells as needed
        echo "<td>";
        echo "<a href='modify.php?id=" . $row["id"] . "' class='btn btn-primary'>Modify</a>";
        echo "<a href='process_form.php?delete_id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Output a message if no records found
    echo "<tr><td colspan='7'>No records found</td></tr>";
}
?>
