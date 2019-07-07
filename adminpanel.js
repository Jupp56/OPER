var currentaccount;
var baseurl = window.location.href.split('/').slice(0, window.location.href.split('/').length - 1).toString().replace(/\,/g, '/');

function getusers() {

    var xmlHttp = new XMLHttpRequest();
    var getusersurl = baseurl + "/getusers.php";

    xmlHttp.open("GET", getusersurl, true); //true for asynchronous request

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

    var table = document.getElementById("usertable");
    cleartable(document.getElementById("usertable"));
    var tablebody = document.getElementById("tablebody");
    for (var i = 0; i < array.length; i++) {
        var row = document.createElement("tr");

        var createClickHandler =
            function(dataset) {
                return function() {
                    showsingleaccount();

                    document.getElementById("FirstName-Single").value = dataset.FirstName;
                    document.getElementById("LastName-Single").value = dataset.LastName;
                    document.getElementById("DateOfBirth-Single").value = dataset.DateOfBirth;
                    document.getElementById("Username-Single").value = dataset.Username;
                    document.getElementById("Username-Single-Old").value = dataset.Username;
                    document.getElementById("Mail-Single").value = dataset.Mail;
                    currentaccount = thisusername;
                    //Zu bearbeitende Daten holen und anzeigen
                };
            };

        row.onclick = createClickHandler(array[i]);

        row.appendChild(createtd(i + 1));
        row.appendChild(createtd(array[i].FirstName));
        row.appendChild(createtd(array[i].LastName));
        row.appendChild(createtd(array[i].Username));
        row.appendChild(createtd(array[i].DateOfBirth));
        row.appendChild(createtd(array[i].Mail));

        tablebody.appendChild(row);
    }
}


function cleartable(table) {
    for (var i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
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
    document.getElementById("Password-Create").value = Math.random().toString(36).slice(-8);
}

function hidecreateaccount() {
    document.getElementById("createaccountwindow").style.width = "0%";
}

function sendcreateaccount() {
    hidecreateaccount();
    document.getElementById("createaccountform").submit();
    resetcreateaccount();
    getusers();
}

function resetcreateaccount() {
    document.getElementById("createaccountform").reset();
    document.getElementById("Password-Create").value = Math.random().toString(36).slice(-8);
}

function deleteaccount() {
    document.getElementById("deletewindow").style.width = "100%";
}

function deleteaccountconfirm() {
    var url = baseurl + "/deleteuser.php?user=" + currentaccount;
    alert(sendgetrequest(url).toString());
    document.getElementById("deletewindow").style.width = "0%";
    getusers();
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

function logout() {
    window.location.href = 'logout.php';
}

window.onload = getusers;