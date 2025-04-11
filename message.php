<?php
// Database credentials
$servername = "localhost"; // Your server name
$username = "root";     // Your database username
$password = "";     // Your database password
$dbname = "nama";  // Your database name 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch comments from the database
$sql = "SELECT comment FROM comments";
$result = $conn->query($sql);
?>

<!-- HTML to display comments -->
<div class="comments-section">
    <h2>Comments</h2>
    <?php
    // Check if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='comment'><p>" . htmlspecialchars($row['comment']) . "</p></div>";
        }
    } else {
        echo "<div class='no-comments'>No comments found.</div>";
    }
    ?>
     <a href="admin.php" class="btn">Back to Home</a>
     <style>
   .btn{
      text-decoration: none;
      background: blue;
      color: white;
   }
</style>
</div>

<!-- CSS for styling -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #eef2f3;
        color: #333;
        margin: 0;
        padding: 20px;
    }

    .comments-section {
        max-width: 700px;
        margin: 30px auto;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .comments-section h2 {
        text-align: center;
        color: #007BFF;
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .comment {
        padding: 15px;
        margin: 15px 0;
        border-left: 5px solid #007BFF;
        border-radius: 5px;
        background-color: #f9f9f9;
        transition: background-color 0.3s, transform 0.2s;
    }

    .comment:hover {
        background-color: #e9f5ff;
        transform: translateY(-2px);
    }

    .comment p {
        margin: 0;
        font-size: 1.1em;
    }

    .no-comments {
        text-align: center;
        color: #888;
        font-style: italic;
    }
</style>