var currentaccount;
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');

function getparticipants() {

    var xmlHttp = new XMLHttpRequest();
    var url = baseurl + "/getparticipants.php";

    xmlHttp.open("GET", url, true); //true for asynchronous request

    xmlHttp.onload = function(e) {
        if (xmlHttp.status === 200) {
            var result = xmlHttp.responseText;
            try {
                var dataset = JSON.parse(result);
            } catch (e) {
                return;
            }
            fillarr(dataset);
        } else {
            console.log(xmlHttp.statusText);
        }
    }
    xmlHttp.send(null);

}

function fillarr(array) {

    var table = document.getElementById("participanttable");
    cleartable(table);
    var tablebody = document.getElementById("participanttablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");

        row.appendChild(createtd(i + 1));
        row.appendChild(createtd(array[i].FirstName));
        row.appendChild(createtd(array[i].LastName));
        row.appendChild(createtd(array[i].Username));
        row.appendChild(createtd(array[i].DateOfBirth));
        row.appendChild(createbutton("Ergebnisse", "button-alt", showparticipantresults, array[i].UserId));

        tablebody.appendChild(row);
    }
}

function showparticipantresults(participantid) {
    window.location.href = baseurl + "/participantresults.php?ParticipantId=" + participantid;
}

function cleartable(table) {
    for (var i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
}


function getdetails() {
    console.log("details");
}

function showsingleparticipant() {
    document.getElementById("singleaccount").style.width = "100%";
}

function hidesingleparticipant() {
    document.getElementById("singleaccount").style.width = "0%";
}

function showcreateparticipant() {
    document.getElementById("createaccountwindow").style.width = "100%";
}

function hidecreateparticipant() {
    document.getElementById("createaccountwindow").style.width = "0%";
}

function sendcreateparticipant() {
    hidecreateaccount();
    document.getElementById("createaccountform").submit();
    resetcreateaccount();
    getparticipants();
}

function resetcreateparticipant() {
    document.getElementById("createaccountform").reset();
}

function deleteparticipant() {
    document.getElementById("deletewindow").style.width = "100%";
}

function deleteparticipantconfirm() {
    var url = baseurl + "/deleteuser.php?user=" + currentaccount;
    alert(sendsyncgetrequest(url).toString());
    document.getElementById("deletewindow").style.width = "0%";
    getparticipants();
}

function deleteparticipantdeny() {
    document.getElementById("deletewindow").style.width = "0%";
}


function logout() {
    window.location.href = 'logout.php';
}

window.onload = getparticipants;