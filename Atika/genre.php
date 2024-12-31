<?php
    require_once('dbconnection.php');
    session_start(); 
    
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

    $genre = $_POST['genre'] ?? '';
$data = [];

if (!empty($genre)) {
    $stmt = $conn->prepare("SELECT name FROM manga WHERE genre = ?");
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
}



<?php if (!empty($data)) : ?>
    <div class="results">
        <h2>Results for <?= htmlspecialchars(ucfirst($genre)) ?></h2>
        <ul>
            <?php foreach ($data as $item) : ?>
                <li>
                    
                    <strong>Manga:</strong> <?= htmlspecialchars($item['name']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="results">
            <p>No results found for the selected genre.</p>
        </div>
    <?php endif; ?>