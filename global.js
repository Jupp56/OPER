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