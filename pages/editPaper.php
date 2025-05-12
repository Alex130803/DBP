<?php
require_once "config.php";

if (!isset($_GET['id'])) {
    die("Paper ID not provided.");
}

$paperId = intval($_GET['id']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $keywords = explode(";", $_POST['keywords']); // Expecting semicolon-separated list

    // Update paper
    $stmt = $conn->prepare("UPDATE papers SET title = ?, abstract = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $abstract, $paperId);
    $stmt->execute();

    // Delete old keywords
    $delStmt = $conn->prepare("DELETE FROM paper_keywords WHERE id = ?");
    $delStmt->bind_param("i", $paperId);
    $delStmt->execute();

    // Insert new keywords
    $insStmt = $conn->prepare("INSERT INTO paper_keywords (id, keyword) VALUES (?, ?)");
    foreach ($keywords as $kw) {
        $kw = trim($kw);
        if (!empty($kw)) {
            $insStmt->bind_param("is", $paperId, $kw);
            $insStmt->execute();
        }
    }

    header("Location: bookReader.php?id=" . $paperId);
    exit();
}

// Fetch current data
$paper = $conn->prepare("SELECT title, abstract FROM papers WHERE id = ?");
$paper->bind_param("i", $paperId);
$paper->execute();
$paperResult = $paper->get_result();
$paperRow = $paperResult->fetch_assoc();

// Fetch keywords
$kstmt = $conn->prepare("SELECT keyword FROM paper_keywords WHERE id = ?");
$kstmt->bind_param("i", $paperId);
$kstmt->execute();
$kres = $kstmt->get_result();
$keywords = [];
while ($krow = $kres->fetch_assoc()) {
    $keywords[] = $krow['keyword'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Paper</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="mainContainer">
        <h1>Edit Paper</h1>
        <form method="POST">
            <div class="editContainer">
                <label for="title"><strong>Title:</strong></label><br>
                <input type="text" id="title" name="title" class="editBookInput" value="<?= htmlspecialchars($paperRow['title']) ?>" required>
            </div>

            <div class="editContainer">
                <label for="keywords"><strong>Keywords (separated by ;):</strong></label><br>
                <input type="text" id="keywords" name="keywords" class="editBookInput" value="<?= htmlspecialchars(implode("; ", $keywords)) ?>">
            </div>

            <div class="editContainer">
                <label for="abstract"><strong>Abstract:</strong></label><br>
                <textarea id="abstract" name="abstract" class="editBookTextArea" required><?= htmlspecialchars($paperRow['abstract']) ?></textarea>
            </div>

            <input type="submit" class="btn" value="Save Changes">
            <a href="bookReader.php?id=<?= $paperId ?>" class="btn" style="background-color: gray;">Cancel</a>
        </form>
    </div>
</body>
</html>
