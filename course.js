window.onload = getdata;
var username = "testuser"; //TODO: load dynamically
var coursename = window.location.href.split('=')[1]; //TODO: schöner!!!
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');
var unsaved = false;

function getdata() {
    fillarr(null);

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
    var array = new Array({FirstName: "John", LastName: "Doe", DateOfBirth: "2017-05-03", ID: "1729", Grade: 2.7 });

    var table = document.getElementById("usertable");
    table.deleteRow(1);
    var tablebody = document.getElementById("tablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");
        row.appendChild(createth(i + 1));
        row.appendChild(createtd(array[i].FirstName));
        row.appendChild(createtd(array[i].LastName));
        row.appendChild(createtd(array[i].DateOfBirth));
        row.appendChild(createtd(array[i].ID));
        row.appendChild(createinput(array[i].Grade));
        row.appendChild(createbutton("X", "button-warn", array[i].Participant));

        tablebody.appendChild(row);
    }
}

function createth(thvalue) {
    var cell = document.createElement("th");
    cell.scope = "row";
    var celltext = document.createTextNode(thvalue);
    cell.appendChild(celltext);
    return cell;
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
    unsaved = true;
    alert(varr);
}

function addparticipant() {
    hideaddparticipant();
}

function showaddparticipant() {
    document.getElementById("addparticipantoverlay").style.width = "100%";
}

function hideaddparticipant() {
    cleartable(document.getElementById("searchresulttable"));
    document.getElementById("addparticipantoverlay").style.width = "0%";
}

function search() {
    var table = document.getElementById("searchresulttable");

    cleartable(table);

    var resultfield = document.getElementById("searchresults");
    var searchterm = document.getElementById("participantsearchbox").value;
    // try {
    //     var allusers = JSON.parse(sendgetrequest(baseurl + '/getallusers.php'));
    // } catch (e) {
    //     return;
    // }
    //test data
    var allusers = new Array(
        "Martin Fowler",
        "Max Mustermann",
        "Paul Lambert",
        "Jeff Davis",
        "Dagobert Duck",
        "Daniel Davis"
    )
    var searchexpression = new RegExp(searchterm, "gi");

    allusers.forEach(participant => {
        if (participant.match(searchexpression)) {
            var row = document.createElement("tr");
            row.appendChild(createtd(participant));
            row.onclick = function() {
                document.getElementById("participantsearchbox").value = participant;
                cleartable(resultfield);
            }
            resultfield.appendChild(row);
        }

    });
}

function cleartable(table) {
    for (var i = table.rows.length - 1; i >= 0; i--) {
        table.deleteRow(i);
    }
}

function changeoccured() {
    unsaved = true;
}

function save() {
    unsaved = false;
    //TODO: Read list and send to server - wait for confirmation, else alert user that data is unsaved
}

function sendgetrequest(url) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", url, false); //true for asynchronous request
    xmlHttp.send(null);
    return xmlHttp.responseText;
}

function back() {
    if (unsaved = true) {
        save();
    }
    window.location.href = baseurl + '/main.php';
}