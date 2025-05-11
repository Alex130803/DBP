
/**
 * Creates a DOM element representing a book with its details.
 *
 * @param {string} bookId - The unique identifier for the book.
 * @param {string} title - The title of the book.
 * @param {string[]} tags - An array of tags associated with the book.
 * @param {string} abstractText - A brief abstract or description of the book.
 * @returns {HTMLDivElement} A DOM element containing the book's details.
 */
function createBookElement(bookId, title, tags, abstractText) {
    const container = document.createElement("div");
    container.className = "resultContainer";
    container.id = bookId;
    container.setAttribute("onclick", "#");

    // Title
    const titleDiv = document.createElement("div");
    titleDiv.className = "resultTitle";
    const h3 = document.createElement("h3");
    h3.textContent = title;
    titleDiv.appendChild(h3);
    container.appendChild(titleDiv);

    // Tags
    const subContainer = document.createElement("div");
    subContainer.className = "ResultsSubContainer";

    const tagsContainer = document.createElement("div");
    tagsContainer.className = "resultTagsConatiner";

    tags.forEach(tag => {
        const tagDiv = document.createElement("div");
        tagDiv.className = "resultTag";
        tagDiv.textContent = tag;
        tagsContainer.appendChild(tagDiv);
    });

    subContainer.appendChild(tagsContainer);
    container.appendChild(subContainer);

    // Abstract
    const abstractDiv = document.createElement("div");
    abstractDiv.className = "abstractContainer";
    abstractDiv.textContent = abstractText;
    container.appendChild(abstractDiv);

    return container;
}


function openPopUp(){
    document.getElementById("popUpBack").style.display = "block";
}

function closePopUp(){
    document.getElementById("popUpBack").style.display = "none";
}

function togleLL(){
    if (document.getElementById("LLcontainer").style.display == "none"){
        document.getElementById("LLcontainer").style.display = "block";
    }else{
        document.getElementById("LLcontainer").style.display = "none";
    }
}