window.onload = getdata;
var username = "testuser"; //TODO: load dynamically
var coursename = "<?php Print($course); ?>";
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');
var unsaved = false;

function getdata() {
    fillarr(null);
    alert(coursename);
    var xmlHttp = new XMLHttpRequest();
    var url = baseurl + "/getcoursedata.php?course=" + coursename;

    xmlHttp.open("GET", url, true); //true for asynchronous request

    xmlHttp.onload = function(e) {
        if (xmlHttp.status === 200) {
            var result = xmlHttp.responseText;
            console.log(xmlHttp.responseText);
            var dataset = JSON.parse(result);
            fillarr(dataset);
        } else {
            console.log(xmlHttp.statusText);
        }
    }
    xmlHttp.send(null);
}

function fillarr(array) {
    var array = new Array({ Participant: "John Doe", Grade: 2.7 });

    var table = document.getElementById("usertable");
    table.deleteRow(1);
    var tablebody = document.getElementById("tablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");

        row.appendChild(createtd(array[i].Participant));
        row.appendChild(createinput(array[i].Grade));
        row.appendChild(createbutton("Entfernen", "button-warn", array[i].Participant));

        tablebody.appendChild(row);
    }
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

function createbutton(text, buttonclass, Participant) {
    var cell = document.createElement("td");
    var button = document.createElement("button");

    button.value = text;
    button.textContent = text;
    button.className = buttonclass;

    button.onclick = function() {
        deleteaccountgrade(Participant);
    };

    cell.appendChild(button);
    return cell;

}

function deleteaccountgrade(varr) {
    alert(varr);
}

function changeoccured() {
    unsaved = true;
}

function back() {
    window.location.href = baseurl + '/main.php';
}