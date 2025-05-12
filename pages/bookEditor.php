<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $keywords = explode(';', $_POST['keywords']);
    $facultyId = 1; // hardkodirano, kasnije možeš iz $_SESSION

    // Insert into papers
    $stmt = $conn->prepare("INSERT INTO papers (title, abstract) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $abstract);
    $stmt->execute();
    $paperId = $stmt->insert_id;

    // Insert keywords
    $kstmt = $conn->prepare("INSERT INTO paper_keywords (id, keyword) VALUES (?, ?)");
    foreach ($keywords as $kw) {
        $kw = trim($kw);
        if ($kw !== "") {
            $kstmt->bind_param("is", $paperId, $kw);
            $kstmt->execute();
        }
    }

    // Insert into authorship
    $astmt = $conn->prepare("INSERT INTO authorship (facultyId, paperId) VALUES (?, ?)");
    $astmt->bind_param("ii", $facultyId, $paperId);
    $astmt->execute();

    header("Location: mainScreen.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRD</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/scripts.js"></script>
</head>
<body>
    <div class="mainContainer">
        <div class="searchContainer">
            <button onclick="history.back()" class="backButton" id="backButton">BACK</button>
        </div>
        <div class="bodyContainer">
            <form method="POST" id="editForm">
                <div class="editContainer">
                    <h3>Name of the paper*</h3>
                    <h4>*mandatory field</h4>
                    <input class="editBookInput" type="text" name="title" placeholder="Name of the paper" id="editBookName" required>
                </div>
                <div class="editContainer">
                    <h3>Key words</h3>
                    <h4>Please enter key words separated with a semicolon “;”</h4>
                    <input class="editBookInput" type="text" name="keywords" placeholder="Java; TextBook" id="editBookKeyWords">
                </div>
                <div class="editContainer">
                    <h3>Citations</h3>
                    <h4>Please enter citations separated with a semicolon “;”</h4>
                    <textarea class="editBookTextArea" name="citations" id="citations" placeholder="Smith, T. (2020). The citation manual for students: A quick guide (2nd ed.). Wiley.;"></textarea>
                </div>
                <div class="editContainer">
                    <h3>Paper content*</h3>
                    <h4>*mandatory field</h4>
                    <textarea class="editBookTextArea" name="abstract" id="mainText" placeholder="Once upon a time ..." required></textarea>
                </div>
                <input type="submit" id="editFormSubmit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
