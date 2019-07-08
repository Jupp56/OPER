var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');

function sendsyncgetrequest(url) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", url, false); //true for asynchronous request
    xmlHttp.send(null);
    return xmlHttp.responseText;
}

function createtd(tdvalue) {
    var cell = document.createElement("td");
    var cellText = document.createTextNode(tdvalue);
    cell.appendChild(cellText);
    return cell;
}

function createinput(currentordefaultvalue) {
    var cell = document.createElement("td");
    var inputfield = document.createElement("input");
    inputfield.value = currentordefaultvalue;
    inputfield.onchange = changeoccured;
    cell.appendChild(inputfield);
    return cell;
}

function createth(thvalue) {
    var cell = document.createElement("th");
    cell.scope = "row";
    var celltext = document.createTextNode(thvalue);
    cell.appendChild(celltext);
    return cell;
}

function createbutton(text, buttonclass, onclickaction, onclickparameter) {
    var cell = document.createElement("td");
    var button = document.createElement("button");

    button.value = text;
    button.textContent = text;
    button.className = buttonclass;

    button.onclick = function() {
        onclickaction(onclickparameter);
    };

    cell.appendChild(button);
    return cell;
}

function cleartable(table) {
    for (var i = table.rows.length - 1; i >= 0; i--) {
        table.deleteRow(i);
    }
}