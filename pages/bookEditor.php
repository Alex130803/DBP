<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRD</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="mainContainer">
        <div class="searchContainer">
            <button class="backButton" id="backButton">BACK</button>
        </div>
        <div class="bodyContainer">
            <form id="editForm">
                <div class="editContainer">
                    <h3>Name of the paper*</h3>
                    <h4>*mandatory field</h4>
                    <input class="editBookInput" type="text" placeholder="Name of the paper" id="editBookName">
                </div>
                <div class="editContainer">
                    <h3>Key words</h3>
                    <h4>Please enter key words separated wit a semicolon and a space“; ”</h4>
                    <input class="editBookInput" type="text" placeholder="Java; TextBook" id="editBookKeyWords">
                </div>
                <div class="editContainer">
                    <h3>Citations</h3>
                    <h4>Please enter citations separated wit a semicolon “;”</h4>
                    <textarea class="editBookTextArea" name="citations" id="citations" placeholder="Smith, T. (2020). The citation manual for students: A quick guide (2nd ed.). Wiley.;"></textarea>
                </div>
                <div class="editContainer">
                    <h3>Name of the paper*</h3>
                    <h4>*mandatory field</h4>
                    <textarea class="editBookTextArea" name="mainText" id="mainText" placeholder="Once upon a time ... " ></textarea>
                </div>
                <input type="submit" id="editFormSubmit" value="Submit">
            </form>

        </div>
    </div>
</body>
</html>