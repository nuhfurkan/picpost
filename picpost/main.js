function pageLoad(x) {
    var a = writeName("nuh furkan erturk");
    console.log(a);
    //console.log(x);
    writes(x);
}

var sellang;
var usersid;

function writes(x) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        usersid = x;
        console.log(this.responseText);
        var refsArr = this.responseText.split("@");
        document.getElementById("welcomeLine").innerHTML = writeName(refsArr[0]);
        document.getElementById("profilePhoto").src = getProfilePhoto(refsArr[1]);
        document.getElementById("language").innerText = writeName(refsArr[2]);
        sellang = refsArr[3];
      }
    };
    
    xmlhttp.open("GET", "forindex.php?q="+x, true);
    xmlhttp.send();
}

function getProfilePhoto(urlPhoto) {
  console.log(urlPhoto);
  // add firebase configs
  return urlPhoto;
}


function writeName(name) {
  name = name.split(" ");
  for (let index = 0; index < name.length; index++) {
    name[index] = name[index].charAt(0).toUpperCase() + name[index].slice(1);
  }

  name = name.join(" ");
  return name;
}
var elemCounter = 0;
var exelems = 0;

// DOWNLOAD PHOTOS FROM FIREBASE AND MAKE A DIV ON THE FEED
function makePhotoFrame(elem) {
  console.log("new frame created");
  var element = document.createElement("div");
  element.classList.add("photoFrame");
  element.id = exelems;
  exelems++;
  var storageRef = firebase.storage().ref();
  var imagebox = new Image();
  storageRef.child('images/'+ elem).getDownloadURL().then((url) => {
    //var img = document.getElementById('myimg');
    //img.setAttribute('src', url);

    
    imagebox.setAttribute("src", url);  

  })
  //element.innerHTML = elem;
  document.getElementById("dvs").appendChild(element);
  document.getElementById(exelems-1).appendChild(imagebox);
}

// SAYFANIN EN ASAGISINA GITTIGIMI GÖSTEREN FONKSIYON
window.onscroll = function(ev) {
  if (elemCounter == -1) {
    //console.log("no more elements to show!!!");
    return;
  }

  if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight) {
    // you're at the bottom of the page
    
    var heig = document.getElementById("dvs").offsetHeight;
    //document.getElementById("dvs").style.height = heig+1500+"px";
    console.log("end");
    
    //document.getElementById("dvs").innerHTML += elemCounter + "<br
    
    // GEREKLI AJAX KODLARI
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        console.log("inside the if");
        var refsArr = this.responseText.split("@");
        if (refsArr[0] != "0") {
          for (let i = 0; i < 10; i++) {
            const element = refsArr[i];
            console.log("inside the if and for");
            makePhotoFrame(element);
          }          
        } else {
          console.log("inside the else");
          var i = refsArr[1];
          console.log(i + " is i!!!");
          for (let n = 0; n < i; n++) {
            const element = refsArr[n+2];
            console.log("inside the else and for");
            makePhotoFrame(element);
          }
          elemCounter = -1;
        }

      }
    };
    

    xmlhttp.open("GET", "downloadPhoto.php?q="+elemCounter+"&selan="+sellang, true);
    xmlhttp.send();
    elemCounter += 10;
  }
};


function dspModal() {
  document.getElementById("modalBox").style.display = "block";
}

window.onclick = function(event) {
  if (event.target == document.getElementById("modalBox")) {
    ///  TO DO: ALT SATIRDAKI MODAL-FILE IN DEGERI SIFIRLANACAK !!!
    //document.getElementById("modal-file");
    document.getElementById("modalBox").style.display = "none";
  }
  
}

var loadFile = function(event) {
  var fileimg = document.getElementById('modal-img');
  fileimg.style = "border-radius: 50px;";
  fileimg.src = URL.createObjectURL(event.target.files[0]);
  fileimg.onload = function() {
    URL.revokeObjectURL(fileimg.src);
  }
};

function tophp(names, keywordval, url) {
      // TO PHP
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          console.log("inside the if");
        }
      };
  
      xmlhttp.open("GET", "uploadPhoto.php?q="+usersid+"&urls="+url+"&keyword="+keywordval+"&lang="+sellang, true);
      xmlhttp.send();
  
}

function uploadPhotoToDB() {
      var storageRef = firebase.storage().ref();
      
      var file = document.getElementById("modal-file").files[0];
      console.log(file);
      
      //dynamically set reference to the file name
      var names = file.name;
      var thisRef = storageRef.child("images/"+names);

      //put request upload file to firebase storage
      thisRef.put(file).then(function(snapshot) {
         alert("File Uploaded")
         console.log('Uploaded a blob or file!');
      });

      var keywordval = document.getElementById("keyword").value;

  storageRef.child('images/'+ names).getDownloadURL().then((url) => {
    //var img = document.getElementById('myimg');
    //img.setAttribute('src', url);

    
    tophp(names, keywordval, names);

  });

}