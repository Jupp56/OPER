
// var dataset = [
//     ["blah", "blub", "param"],
//     ["blah", "blub", "param"]
// ];

function getusers() {


    var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');
    var xmlHttp = new XMLHttpRequest();
    var getusersurl = baseurl+"/getusers.php";
    alert(getusersurl);
    xmlHttp.open("GET", getusersurl, true); //true for asynchronous request

    xmlHttp.onload = function (e) {
        if (xmlHttp.status === 200) {
            var result = xmlHttp.responseText;
            alert(xmlHttp.responseText);
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

    for (var i = 0; i < dataset.length; i++) {
        var row = document.createElement("tr");

        for (var j = 0; j < 3; j++) {
            var cell = document.createElement("td");
            var cellText = document.createTextNode(dataset[i][j]);
            cell.appendChild(cellText);
            row.appendChild(cell);
        }
        table.appendChild(row);
    }
}

window.onload = getusers;
