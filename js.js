var counter = 0;

function addMoreFields() {
    if (counter >= 3) {
        alert("only 3 fields are allowed");
        return false;
    }
    var parent = document.getElementById("moreFields");
    var child = document.createElement("div");
    child.className = "newFields";
    var newField = document.createElement("input");
    newField.type = "text";
    newField.name = "newFields[]";
    newField.className = "fields";
    newField.value = "Test-" + counter;
    newField.placeholder = "Additional value";
    var deleteButton = document.createElement("button");
    deleteButton.innerText = "X";
    deleteButton.type = "button";
    deleteButton.onclick = function () {
        parent.removeChild(child);
        counter--;
    };
    child.appendChild(newField);
    child.appendChild(deleteButton);
    parent.appendChild(child);
    counter++;
}

function printData() {
    var output = document.getElementById("outputBox");
    var fields = document.getElementsByClassName("fields");
    var values = "";
    for (var i = 0; i < fields.length; i++) {
        values += fields[i].value + ", ";
    }
    output.innerText = values;
}