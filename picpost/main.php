<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="default.css">
    
    <title>Main page</title>
    <?php $q = $_GET["q"]; ?>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-storage.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBCIN70UAK523cuESKB89y2OX9jxAVp0FE",
    authDomain: "iwpproject-619d2.firebaseapp.com",
    projectId: "iwpproject-619d2",
    storageBucket: "iwpproject-619d2.appspot.com",
    messagingSenderId: "113882931858",
    appId: "1:113882931858:web:a2035f99ee1eb0f55abc4b",
    measurementId: "G-GEJFJR5MBY"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>


<script src="main.js"></script>
</head>

<!--
    !!! SADECE RESIM YUKLEME-INDIRME KALDI !!!
    SCORE-PROFIL RESMI-ISIM-DIL YAZDIRILACAK // BUYUK ORANDA TAMAMLANDI
    MENU HAZIRLANACAK // MENU IPTAL OLABILIR
        AYARLAR
        LOG OUT
        ABOUT
    ADD NEW PHOTO BUTONU EKLENECEK // NEREDEYSE TAMAM - !!! DB YE YUKLEME KALDI !!!
    TIMELINE EKLENECEK // BIR OLCUDE BASLANDI
        RESIM
        RESIMI POST EDENIN ADI
        LIKE-DISLIKE
        KELIMEYI DENEME (EGER DOGRUYSA SCORUN ARTMASI)
-->


<body <?php echo "onload='pageLoad(".$q.")'"; ?> >  <!--echo htmlspecialchars($name)-->
    <nav>
        
        <div class="navLeft">
            <div class="navLeftItem">
                <!-- BURAYA RESIM ALMA KISMI EKLENECEK -->
                <img class="imgDiv" id="profilePhoto" src="profilePhoto.jpg" alt="profilePhoto">
            </div>
            <div class="navLeftItem">
                <p id="scoreLine">Score: </p>
            </div>
        </div>
        <div class="navMid">
            <h1>Welcome <span id="welcomeLine"></span></h1>

        </div>
        <div class="navRight">
            <div class="navLangguage">
                <p>Language:</p>
                <p id="language"></p>
            </div>
            <div name="menu">

            </div>
        </div>
    </nav>
    <div class="dvs" id="dvs">
        <p></p>
    </div>
    <div class="newPhoto" onclick="dspModal()">
        <p class="npText" > +</p>
    </div>
    <div class="modal" id="modalBox">
            <div class="modal-cont" id="modelmain" onclick="uploadPhotoToDB()" >
                <div class="modalsmallbox">
                    <p>Please upload the image</p> 
                </div>
                <div class="modalsmallbox">
                    <input type="file" name="" id="modal-file" accept="image/*" onchange="loadFile(event)" class="dataLoader">
                </div>
                <div class="modalsmallbox">
                    <img class="modalimg" id="modal-img" src="" alt="file uploaded">
                </div>
                <div class="modalsmallbox">
                    <p>Please enter a keyword: </p>
                    <input type="text" id="keyword">
                </div>    
                <div class="modalsmallbox">
                    <input type="submit" value="Submit">
                </div>            
                
            </div>
    </div>



</body>




</html>