window.onload = getdata;
var userid = readCookie("user");
var coursename = window.location.href.split('=')[1]; //TODO: schöner!!!
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');
var unsaved = false;

function getdata() {

    var xmlHttp = new XMLHttpRequest();
    var url = baseurl + "/getcourse.php?course=" + coursename;

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
        row.appendChild(createbutton("X", "button-warn", deleteaccountgrade, array[i].ID));

        tablebody.appendChild(row);
    }
}




function deleteaccountgrade(participantid) {
    sendsyncgetrequest(baseurl + "/deleteaccountgrade.php?Course=" + coursename + "&ParticipantId=" + participantid)
    getdata();
}

function addparticipant() {
    hideaddparticipant();
}

function showaddparticipant() {
    document.getElementById("addparticipantoverlay").style.width = "100%";
}

function hideaddparticipant() {
    cleartable(document.getElementById("searchresulttable"), true);
    document.getElementById("addparticipantoverlay").style.width = "0%";
}

function search() {
    var table = document.getElementById("searchresulttable");

    cleartable(table, true);

    var resultfield = document.getElementById("searchresults");
    var searchterm = document.getElementById("participantsearchbox").value;
    // try {
    //     var allusers = JSON.parse(sendgetrequest(baseurl + '/getallusers.php'));
    // } catch (e) {
    //     return;
    // }
    //test data
    var allusers = new Array({ FirstName: "Martin", LastName: "Fowler", DateOfBirth: "1989-03-23", UserId: 23 }, { FirstName: "Max", LastName: "Mustermann", DateOfBirth: "2000-08-12", UserId: 26 }, { FirstName: "Paul", LastName: "Lambert", DateOfBirth: "1924-07-03", UserId: 4 }, { FirstName: "Jeff", LastName: "Davis", DateOfBirth: "1955-02-20", UserId: 236 }, { FirstName: "Dagobert", LastName: "Duck", DateOfBirth: "1999-12-17", UserId: 12 })
    var searchexpression = new RegExp(searchterm, "gi");

    allusers.forEach(participant => {
        var fullname = participant.FirstName + " " + participant.LastName;
        if (fullname.match(searchexpression)) {
            var row = document.createElement("tr");
            row.appendChild(createtd(fullname));
            row.appendChild(createtd(participant.DateOfBirth))
            row.onclick = function() {
                document.getElementById("participantsearchbox").value = fullname;
                document.getElementById("participantsearcheduserid").value = participant.UserId;
                cleartable(resultfield, true);
            }
            resultfield.appendChild(row);
        }

    });
}



function changeoccured() {
    unsaved = true;
}

function save() {
    unsaved = false;
    //TODO: Read list and send to server - wait for confirmation, else alert user that data is unsaved
}

function back() {
    if (unsaved = true) {
        save();
    }
    window.location.href = baseurl + '/main.php';
}