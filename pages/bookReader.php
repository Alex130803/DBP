<?php
session_start();
$isVisitor = isset($_SESSION['visitor']) && $_SESSION['visitor'] === true;

require_once "config.php";

if (!isset($_GET['id'])) {
    die("Paper ID not provided.");
}

$paperId = intval($_GET['id']);

// Dohvati paper + autora
$sql = "SELECT 
            p.title, 
            p.abstract, 
            CONCAT(f.fName, ' ', f.lName) AS authorName
        FROM papers p
        JOIN authorship a ON a.paperId = p.id
        JOIN faculty f ON f.id = a.facultyId
        WHERE p.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $paperId);
$stmt->execute();
$result = $stmt->get_result();
$paper = $result->fetch_assoc();

// Dohvati ključne riječi
$keywords = [];
$keyStmt = $conn->prepare("SELECT keyword FROM paper_keywords WHERE id = ?");
$keyStmt->bind_param("i", $paperId);
$keyStmt->execute();
$keyRes = $keyStmt->get_result();
while ($row = $keyRes->fetch_assoc()) {
    $keywords[] = $row['keyword'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Research Paper</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .tag {
            display: inline-block;
            padding: 6px 12px;
            margin: 4px;
            background-color: #e0e0e0;
            border-radius: 20px;
            font-size: 14px;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            font-family: sans-serif;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .back-link {
            margin-top: 30px;
            display: inline-block;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Research Paper</h1>

    <?php if ($paper): ?>
        <h2><?= htmlspecialchars($paper['title']) ?></h2>
        <p><strong>Author(s):</strong> <?= htmlspecialchars($paper['authorName']) ?></p>
        <p><?= nl2br(htmlspecialchars($paper['abstract'])) ?></p>

        <h4>Keywords:</h4>
        <?php foreach ($keywords as $keyword): ?>
            <span class="tag">#<?= htmlspecialchars($keyword) ?></span>
        <?php endforeach; ?>

        <?php if (!$isVisitor): ?>
            <div style="margin-top: 20px;">
                <a href="editPaper.php?id=<?= $paperId ?>"><i class="fas fa-pen"></i> Edit Paper</a>
                <form action="deletePaper.php" method="POST" style="display:inline;">
                    <input type="hidden" name="paperId" value="<?= $paperId ?>">
                    <button type="submit"><i class="fas fa-trash"></i> Delete Paper</button>
                </form>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <p>Paper not found.</p>
    <?php endif; ?>

    <br><a class="back-link" href="mainScreen.php<?= $isVisitor ? '?visitor=true' : '' ?>">← Back to all papers</a>
</div>
</body>
</html>
