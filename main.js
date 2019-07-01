window.onload = getcourses;
var username = "testuser"; //TODO: load dynamically
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');

function getcourses() {
    var xmlHttp = new XMLHttpRequest();
    var url = baseurl + "/getcourses.php?user=" + username;

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
    array[0] = ["Course" = "cours1", "Participants" = 5];
    var table = document.getElementById("usertable");
    table.deleteRow(1);
    var tablebody = document.getElementById("tablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");
        var createClickHandler =
            function(array, i) {
                return function() {
                    window.location.href = baseurl + '/course?course=' + array[i].Course;
                    //What happens, when you click on a row
                };
            };
        row.onclick = createClickHandler(array, i);
        row.appendChild(createtd(array[i].Course));
        row.appendChild(createtd(array[i].Participants));

        tablebody.appendChild(row);
    }
}