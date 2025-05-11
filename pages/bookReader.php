<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/scripts.js"></script>
    <title>FRD</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="mainContainer">
        <!-- This div should only be created when users role is professor -->
        <div class="popUpBack" id="popUpBack" style="display: none">
            <div class="popUpContainer">
                <h3 style="text-align: center;">Are you sure you want to delete?</h3>
                <div class="popUpButtonContainer">
                    <button id="deleteYes" onclick="closePopUp()">Yes</button>
                    <button id="deleteNo" onclick="closePopUp()">No</button>
                </div>
            </div>
        </div>
        <!-- Container for Log In Log out -->
        <div class="LLcontainer" style="display: none;" id="LLcontainer">
            <!-- If the user is loged in (Professor/Student) only Log out option is displayes otherwise only Log in -->
            <button id="LogIn" onclick="">Log In</button>
            <button id="LogOut" onclick="">Log Out</button>
        </div>
        <div class="searchContainer">
            <button class="backButton" id="backButton">BACK</button>
            <div class="searchSubContainer">
                <form >
                    <input type="text" name="searchBar" id="searchBar" placeholder="bookNameExmaple">
                    <input type="submit" name="searchSubmit" id="searchSubmit">
                </form>
            </div>

            <div class="LogInButton" onclick="togleLL()">
                <img src="../assets/images/user.png" alt="UserIcon">
            </div>
        </div>
        <div class="bodyContainer">
            <div class="bookTitleContainer">
                <div class="bookTitle">
                    <h1>Java textbook N1</h1>
                    <h3>By professor Tony</h3>
                </div>
                <!-- This div should only be created when users role is professor -->
                <div class="bookControls">
                    <button id="deleteButton" value="deleteButton" onclick="openPopUp()">Delete paper</button> 
                    <button id="editButton" value="editButton">Edit paper</button> 
                </div>
            </div>
            <div class="bookTextContainer">
                <h3>Key words:</h3>
                <div class="resultTagsConatiner" id="bookTags">
                    <div class="resultTag">
                        Java
                    </div>
                    <div class="resultTag">
                        Java textbook
                    </div>
                    <div class="resultTag">
                        Programming book
                    </div>
                    <div class="resultTag">
                        Java
                    </div>
                    <div class="resultTag">
                        Java textbook
                    </div>
                    <div class="resultTag">
                        JavaTag
                    </div>
                    <div class="resultTag">
                        Java textbook
                    </div>
                    <div class="resultTag">
                        Programming
                    </div>
                </div>
            </div>
            <div class="bookTextContainer">
                <h3>Abstract</h3>
                <div class="bookText" id="bookAbstract">
                    Dtrfyguhijomnbyfv tybgunhijmon bgyunhijmokp,pmnhbgy unhijomonb ygubinjopkmnhbgu hinjomjnjhbgyu injomjnbguin jopkkmnhbgy 
                    nhuijopknibhuh inojpmnbvf ibgyuinhojpmnob vdrtfubgy ionhbgyt bugnhbvy byuinomn buyugiojm nobyufgun iopjmnbygu inhipojmjnbg 
                    inhojmjnb yuinojmnbuyv bughinonbuy tiuoipojmn bvyfibguoinpojmp nbvbgynhu ij.
                </div>
            </div>

            <div class="bookTextContainer">
                <h3>Citations: </h3>
                <div class="bookText" id="">
"               dfsfdssrsdf sffsfsdfsfs by sfsdfsfdsdfsdf
                aasa adasdad by sfsdfsfdsdfsdf
                asdasdasdad dasdasda by sfsdfsfdsdfsdf
                </div>
            </div>

            <!-- I'm not sure do we have main text of the book in our database or we don't -->
            <div class="bookTextContainer">
                <h3>Main text:</h3>
                <div class="bookText" id="bookText">
                    Dtrfyguhijomnbyfv tybgunhijmon bgyunhijmokp,pmnhbgy unhijomonb ygubinjopkmnhbgu hinjomjnjhbgyu injomjnbguin 
                    jopkkmnhbgy nhuijopknibhuh inojpmnbvf ibgyuinhojpmnob vdrtfubgy ionhbgyt bugnhbvy byuinomn buyugiojm nobyufgun 
                    iopjmnbygu inhipojmjnbg inhojmjnb yuinojmnbuyv bughinonbuy tiuoipojmn bvyfibguoinpojmp nbvbgynhu ij.
                </div>
            </div>
        </div>
    </div>
</body>
</html>