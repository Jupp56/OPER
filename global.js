var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');

function sendsyncgetrequest(url) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", url, false); //true for asynchronous request
    xmlHttp.send(null);
    return xmlHttp.responseText;
}

function createtd(tdvalue, onclick, style) {
    var cell = document.createElement("td");
    var cellText = document.createTextNode(tdvalue);
    cell.appendChild(cellText);
    if (onclick) cell.onclick = onclick;
    if(style) cell.classList = style;
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

function cleartable(table, deletefirstrow) {
    if (deletefirstrow)
        for (var i = table.rows.length - 1; i >= 0; i--) {
            table.deleteRow(i);
        }
    else
        for (var i = table.rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
        }
}

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toUTCString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}