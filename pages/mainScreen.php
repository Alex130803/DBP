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
        <div class="LLcontainer" style="display: none;" id="LLcontainer">
            <!-- If the user is loged in (Professor/Student) only Log out option is displayes otherwise only Log in -->
            <button id="LogIn" onclick="">Log In</button>
            <button id="LogOut" onclick="">Log Out</button>
        </div>
        <div class="bodyContainer">
            <div class="bodyTitleContainer">
                <h1 id="bodyTitle">
                    Welcome professor Tony
                </h1>
                <h3>
                    What do you want to do today?
                </h3>
            </div>
            <div class="bodySearchContainer">
                <div class="searchSubContainer">
                    <form >
                        <input type="text" name="searchBar" id="searchBar" placeholder="bookNameExmaple">
                        <input type="submit" name="searchSubmit" id="searchSubmit">
                    </form>
                </div>
                <button id="pnpButton" value="pnpButton">Publish new paper</button> 
                <!-- We should create this button only when role is Professor, but I don't know how to do that, so I will live it here -->
            </div>
            <div class="bodyResultsContainer">
                <!-- Main container for books, there is a special script createBookElement() for creating one book at a time -->
                <div class="resultContainer" id="bookId" onclick="#" >
                    <div class="resultTitle">
                        <h3>
                            Java textbook N1
                        </h3>
                    </div>
                    <div class="ResultsSubContainer">
                        <div class="resultTagsConatiner">
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
                    <div class="abstractContainer">
                    This textbook offers a thorough introduction to Java programming, covering fundamental concepts such as variables, control structures, object-oriented programming, and exception handling. Each chapter is designed to build on the previous, gradually guiding students from basic syntax to more advanced topics like file I/O, multithreading, and networking.
                    </div>
                </div>
                <div class="resultContainer" id="bookId" onclick="">
                    <div class="resultTitle">
                        <h3>
                            Java textbook N1
                        </h3>
                    </div>
                    <div class="ResultsSubContainer">
                        <div class="resultTagsConatiner">
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
                </div>
                <div class="resultContainer" id="bookId" onclick="">
                    <div class="resultTitle">
                        <h3>
                            Java textbook N1
                        </h3>
                    </div>
                    <div class="ResultsSubContainer">
                        <div class="resultTagsConatiner">
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
                </div>
                <div class="resultContainer" id="bookId" onclick="">
                    <div class="resultTitle">
                        <h3>
                            Java textbook N1
                        </h3>
                    </div>
                    <div class="ResultsSubContainer">
                        <div class="resultTagsConatiner">
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
                </div>
                <div class="resultContainer" id="bookId" onclick="">
                    <div class="resultTitle">
                        <h3>
                            Java textbook N1
                        </h3>
                    </div>
                    <div class="ResultsSubContainer">
                        <div class="resultTagsConatiner">
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>