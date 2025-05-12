<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Delete keywords
    $conn->prepare("DELETE FROM paper_keywords WHERE id = ?")->execute([$id]);

    // Delete authorship
    $conn->prepare("DELETE FROM authorship WHERE paperId = ?")->execute([$id]);

    // Delete paper
    $stmt = $conn->prepare("DELETE FROM papers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: mainScreen.php");
    exit();
}
?>
