var currentaccount;
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');

function getusers() {

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
    var tablebody = document.getElementById("tablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");
        var createClickHandler =
            function(row) {
                return function() {
                    var cells = row.getElementsByTagName("td");
                    var thisusername = cells[0].innerHTML;
                    var thismail = cells[1].innerHTML;
                    currentuser = thisusername;
                    showsingleaccount();
                    document.getElementById("Name-Single").setAttribute('value', thisusername);
                    document.getElementById("Mail-Single").setAttribute('value', thismail);
                    currentaccount = thisusername;
                    //Zu bearbeitende Daten holen und anzeigen
                };
            };
        row.onclick = createClickHandler(row);
        row.appendChild(createtd(array[i].Username));
        row.appendChild(createtd(array[i].Mail));
        row.appendChild(createtd(array[i].Salt));

        tablebody.appendChild(row);
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

function showsingleaccount() {
    document.getElementById("singleaccount").style.width = "100%";
}

function hidesingleaccount() {
    document.getElementById("singleaccount").style.width = "0%";
}

function showcreateaccount() {
    document.getElementById("createaccountwindow").style.width = "100%";
}

function hidecreateaccount() {
    document.getElementById("createaccountwindow").style.width = "0%";
}

function deleteaccount() {
    document.getElementById("deletewindow").style.width = "100%";
}

function deleteaccountconfirm() {
    var url = baseurl + "/deleteuser.php?user=" + currentaccount;
    alert(sendgetrequest(url).toString());
    document.getElementById("deletewindow").style.width = "0%";
}

function deleteaccountdeny() {
    document.getElementById("deletewindow").style.width = "0%";
}

function sendgetrequest(url) {
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.open("GET", url, false); //true for asynchronous request


    xmlHttp.send(null);

    return xmlHttp.status;
}

window.onload = getusers;