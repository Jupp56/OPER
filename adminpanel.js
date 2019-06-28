function getusers() {


    var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');
    var xmlHttp = new XMLHttpRequest();
    var getusersurl = baseurl+"/getusers.php";

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

        var cell = document.createElement("td");
        var cellText = document.createTextNode(array[i].Username);
        cell.appendChild(cellText);
        row.appendChild(cell);

        var cell = document.createElement("td");
        var cellText = document.createTextNode(array[i].Mail);
        cell.appendChild(cellText);
        row.appendChild(cell);

        var cell = document.createElement("td");
        var cellText = document.createTextNode(array[i].Salt);
        cell.appendChild(cellText);
        row.appendChild(cell);

        // for (var j = 0; j < 3; j++) {
        //     var cell = document.createElement("td");
        //     var cellText = document.createTextNode(array[i][j]);
        //     cell.appendChild(cellText);
        //     row.appendChild(cell);
        // }
        table.appendChild(row);
    }
}

window.onload = getusers;
