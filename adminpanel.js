var currentuser;

function getusers() {

    var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');
    var xmlHttp = new XMLHttpRequest();
    var getusersurl = baseurl + "/getusers.php";

    xmlHttp.open("GET", getusersurl, true); //true for asynchronous request

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
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");
        var createClickHandler =
            function(row) {
                return function() {
                    var cells = row.getElementsByTagName("td");
                    var thisusername = cells[0].innerHTML;
                    var thismail = cells[1].innerHTML;
                    currentuser = thisusername;
                    document.getElementById("overlaystuff").style.width = "100%";
                    document.getElementById("Name-Single").setAttribute('value', thisusername);
                    document.getElementById("Mail-Single").setAttribute('value', thismail);
                    //Zu bearbeitende Daten holen und anzeigen
                };
            };
        row.onclick = createClickHandler(row);
        row.appendChild(createtd(array[i].Username));
        row.appendChild(createtd(array[i].Mail));
        row.appendChild(createtd(array[i].Salt));

        table.appendChild(row);
    }
}

function createtd(tdvalue) {
    var cell = document.createElement("td");
    var cellText = document.createTextNode(tdvalue);
    cell.appendChild(cellText);
    return cell;
}

function getdetails() {
    console.log("details");
}

/* Open when someone clicks on the span element */
function showoverlay() {
    document.getElementById("overlaystuff").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeoverlay() {
    document.getElementById("overlaystuff").style.width = "0%";
}

window.onload = getusers;