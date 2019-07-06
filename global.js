function sendsyncgetrequest(url) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", url, false); //true for asynchronous request
    xmlHttp.send(null);
    return xmlHttp.responseText;
}

