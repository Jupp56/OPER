function getusers() {

    var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');
    var xmlHttp = new XMLHttpRequest();
    var getusersurl = baseurl + "/getusers.php";

    xmlHttp.open("GET", getusersurl, true); //true for asynchronous request

    xmlHttp.onload = function (e) {
        if (xmlHttp.status === 200) {
            var result = xmlHttp.responseText;
            console.log(xmlHttp.responseText);
            var dataset = JSON.parse(result);
            fillarr(dataset);
        }
        else {
            console.log(xmlHttp.statusText);
        }
    }
    xmlHttp.send(null);

}

function fillarr(array) {

    var table = document.getElementById("usertable");

    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");

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

window.onload = getusers;
