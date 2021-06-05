

function pageload() {
    writes();
}

function writes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var texts = this.responseText.toLowerCase();
        texts = texts.split(" ");
        for (text in texts) {
            var thisText = texts[text];
            if (thisText == "") {
                continue;
            }
            thisText = writeCapital(thisText);
            var sel = document.getElementById('selectLang');
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(thisText));
            sel.appendChild(opt);
        }
      }
    };
    xmlhttp.open("GET", "loginset.php", true);
    xmlhttp.send();
}

function writeCapital(name) {
    name = name.charAt(0).toUpperCase() + name.slice(1);
    return name;
}

function uploadPhoto() {

}