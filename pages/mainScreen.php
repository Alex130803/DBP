<?php
session_start();

$isVisitor = isset($_GET['visitor']) && $_GET['visitor'] === 'true';

if ($isVisitor) {
    unset($_SESSION['admin']);
}
require_once "config.php";
$sql = "SELECT 
            p.id,
            p.title, 
            p.abstract, 
            GROUP_CONCAT(DISTINCT k.keyword SEPARATOR ', ') AS keywords
        FROM papers p
        LEFT JOIN paper_keywords k ON k.id = p.id
        GROUP BY p.id";

$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FRD</title>
    <link rel="stylesheet" href="../assets/style.css"/>
</head>
<body>
    <div class="mainContainer">
        <div class="searchContainer">
            <div class="searchSubContainer">
                <form>
                    <input type="text" name="searchBar" id="searchBar" placeholder="Search...">
                    <input type="submit" name="searchSubmit" id="searchSubmit">
                </form>
            </div>
            <div class="LogInButton" onclick="togleLL()">
                <img src="../assets/images/user.png" alt="UserIcon">
            </div>
        </div>

        <div class="LLcontainer" style="display: none;" id="LLcontainer">
            <?php if (isset($_SESSION['admin'])): ?>
            <button id="LogOut" onclick="location.href='../'">Log Out</button>
            <?php else: ?>
            <?php if ($isVisitor): ?>
                <button id="LogOut" onclick="location.href='../'">Log Out</button>
            <?php else: ?>
                <button id="LogIn" onclick="location.href='index.php'">Log In</button>
            <?php endif; ?>
            <?php endif; ?>
        </div>


        <div class="bodyContainer">
            <div class="bodyTitleContainer">
                <h1 id="bodyTitle">Welcome</h1>
                <h3>Browse Research Papers</h3>
            </div>

            <div class="bodySearchContainer">
                <div class="searchSubContainer">
                    <form>
                        <input type="text" name="searchBar" id="searchBar" placeholder="Search by title...">
                        <input type="submit" name="searchSubmit" id="searchSubmit">
                    </form>
                </div>
                <?php if (!$isVisitor && isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                    <button id="pnpButton" onclick="location.href='bookEditor.php'">Publish new paper</button> 
                <?php endif; ?>
            </div>

            <div class="bodyResultsContainer">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="resultContainer" onclick="location.href='bookReader.php?id=<?= $row['id'] ?>'">
                        <div class="resultTitle">
                            <h3><?= htmlspecialchars($row['title']) ?></h3>
                        </div>
                        <div class="ResultsSubContainer">
                            <div class="resultTagsConatiner">
                                <?php 
                                    $tags = explode(',', $row['keywords']);
                                    foreach ($tags as $tag): ?>
                                        <div class="resultTag"><?= htmlspecialchars(trim($tag)) ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="abstractContainer">
                            <?= htmlspecialchars($row['abstract']) ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script src="../assets/scripts.js"></script>
</body>
</html>
