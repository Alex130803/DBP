<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['paperId'])) {
    $paperId = intval($_POST['paperId']);

    $conn->begin_transaction(); 

    try {
        $stmt = $conn->prepare("DELETE FROM paper_keywords WHERE id = ?");
        $stmt->bind_param("i", $paperId);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM authorship WHERE paperId = ?");
        $stmt->bind_param("i", $paperId);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM papers WHERE id = ?");
        $stmt->bind_param("i", $paperId);
        $stmt->execute();

        $conn->commit();
        header("Location: mainScreen.php");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error deleting paper: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
