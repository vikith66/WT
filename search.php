<?php
// Read the JSON file
$jsonFile = 'emp.json';
$jsonData = file_get_contents($jsonFile);
$employees = json_decode($jsonData, true);

// Get the search query
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Filter employees based on the query
$filteredEmployees = array_filter($employees, function($employee) use ($query) {
    return stripos($employee['name'], $query) !== false;
});

// Check if any employees match the search query
if (count($filteredEmployees) > 0) {
    echo '<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Salary</th>
            </tr>';
    foreach ($filteredEmployees as $employee) {
        echo '<tr>
                <td>' . htmlspecialchars($employee['id']) . '</td>
                <td>' . htmlspecialchars($employee['name']) . '</td>
                <td>' . htmlspecialchars($employee['position']) . '</td>
                <td>' . htmlspecialchars($employee['department']) . '</td>
                <td>' . htmlspecialchars($employee['salary']) . '</td>
              </tr>';
    }
    echo '</table>';
} else {
    echo '<p>No employees found.</p>';
}
?>
