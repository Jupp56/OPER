window.onload = getcourses;
var userid = readCookie("user");
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');

function getcourses() {

    var xmlHttp = new XMLHttpRequest();
    var url = baseurl + "/getallcourses.php";

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

    var table = document.getElementById("coursetable");
    table.deleteRow(1);
    var tablebody = document.getElementById("coursetablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");
        var createClickHandler =
            function(array, i) {
                return function(event) {
                    //window.location.href = baseurl + '/getallcourses.php'
                    //What happens, when you click on a row
                };
            };

        row.appendChild(createtd(array[i].CourseName, createClickHandler(array, i)));
        row.appendChild(createtd(array[i].CourseId, createClickHandler(array, i)));
        tablebody.appendChild(row);
    }
}