var participantid = window.location.href.split('=')[1]; //TODO: schöner!!!

function getparticipantresults() {
    fillarr(new Set());
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
    array = [
        { CourseName: "Tauchen", Grade: 1.7 },
        { CourseName: "Kleiderschwimmen", Grade: 4.0 }
    ]
    var table = document.getElementById("participanttable");
    cleartable(document.getElementById("participanttable"));
    var tablebody = document.getElementById("participanttablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");

        row.appendChild(createtd(i + 1));
        row.appendChild(createtd(array[i].CourseName));
        row.appendChild(createtd(array[i].Grade));

        tablebody.appendChild(row);
    }
}

window.onload = getparticipantresults;