var participantid = window.location.href.split('=')[1]; //TODO: schöner!!!

function getparticipantresults() {

    var xmlHttp = new XMLHttpRequest();
    var url = baseurl + "/getparticipantresults.php?ParticipantId=" + participantid;

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
    cleartable(document.getElementById("participanttable"), false);
    var tablebody = document.getElementById("participanttablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");

        row.appendChild(createtd(i + 1));
        row.appendChild(createtd(array[i].CourseName));
        row.appendChild(createtd(array[i].Grade));

        tablebody.appendChild(row);
    }
}

function back() {
    window.location.href = baseurl + '/participants.php';
}

window.onload = getparticipantresults;