<?php
session_start();
require_once('functions.php');
// Create connection
$conn = sqlConnect();
if (isset($_SESSION['user']))
{
    setcookie("user",$_SESSION['user']);
}
elseif (isset($_COOKIE["user"]))
{
    $_SESSION['user'] = $_COOKIE["user"];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Documentation </title>
    <link href="doc.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1158619689.js" crossorigin="anonymous"></script>

</head>

<body>

<div class="top" id="topp">
    <div class="be"> <a href="home#goal" style="text-decoration: none; color: black"> <h1> GOAL </h1> </a></div>
    <div class="be"> <a href="home#products" style="text-decoration: none; color: black"> <h1> PRODUCTS </h1> </a></div>
    <div class="be"> <a href="home#about" style="text-decoration: none; color: black"> <h1> ABOUT </h1> </a></div>
    <div class="be"> <a href="documentation" style="text-decoration: none; color: black"><h1> PROGRESS </h1></a> </div>
    <div class="be"> <a href="home#sponsors" style="text-decoration: none; color: black"> <h1> SPONSORS </h1> </a></div>
</div>

<div id="content" class="content">

    <div class="item" id="disub">
        <div id="submit" class="submit">
            <form action="submitdoc.php" id="form" method="post" enctype="multipart/form-data" onsubmit="uploadFiles(e)">
                <input type="file" name="file" accept="image/*" id="filedrag" src="img/upload.png" oninput="input(this.value)" onmouseover="back()" onmouseleave="back2()">
                <label for="filedrag" class="drag">
                    <img src="img/upload.png" id="drag" oninput="function l() {input(this.value);drag_drop(e);}" onmouseover="back()" onmouseleave="back2()" ondrop="drag_drop(e)" ondragover="back()">
                </label>
                <div class="space"> </div>
                <br>
                <p id="file"> </p>

                <input name="date" id="date" type="date">

                <div id="textin">
                    <input class="in" name="title" id="title" type="text" placeholder="Event Header">
                    <div class="space2"></div>
                    <input class="in" name="desc" id="desc" type="text" placeholder="Description of Event">
                </div>

                <div id="submitbutton">
                    <button onclick="uploadFiles(event)" type="submit">Upload Files</button>
                </div>
            </form>
        </div>
    </div>

    <div class="loginbtn">
        <img id="btn" src="img/login.png" onclick="displayModal()">
    </div>

    <div class="modal" id="uno">
        <form id="modal" class="modal-content" action="login.php" method="post" onsubmit="login(this)">
            <div class="container">
                <img src="img/login2.png">
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="psw" required>
                <br>
                <button type="submit" class="g">Login</button>
            </div>

        </form>
    </div>

    <!-- Where images and content will be displayed! -->

</div>


</body>



</html>

<script src="jquery-3.4.1.min.js"></script>
<script>

    function login(obj) {
        obj.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){ alert (xhr.responseText); };
        xhr.open(obj.method, obj.action, true);
        xhr.send(obj);
    }

    var file;

    function back() {
        document.getElementById("drag").style.opacity = "0.5";
        document.getElementById("filedrag").style.cursor = "pointer";
    }
    function back2() {
        document.getElementById("drag").style.opacity = "1";
        document.getElementById("body").style.cursor = "auto";
    }

    function drag_drop() {
        this.event.preventDefault();
        file = this.event.dataTransfer.files[0];
        document.getElementById("file").innerHTML = file.name;
        document.getElementById("drag").src = "img/selected.png";
        document.getElementById("drag").style.backgroundColor = "rgba(77,255,43,0.25)";
        document.getElementById("filedrag").value = this.event.dataTransfer.files[0];
    }

    function input(x) {
        file = document.getElementById("filedrag").files[0];
        /*alert(document.getElementById("filedrag").event.dataTransfer.files[0]);
        document.getElementById("filedrag").event.preventDefault();
        file = document.getElementById("filedrag").event.dataTransfer.files[0];
        alert(file);*/
        alert(file);
        let y = x.split("\\");

        document.getElementById("file").innerHTML = y[y.length-1];
        document.getElementById("drag").src = "img/selected.png";
        document.getElementById("drag").style.backgroundColor = "rgba(77,255,43,0.25)";
    }

    function uploadFiles(event) {
        event.preventDefault();
        let formData = new FormData();
        if (!file)
        {
            let im = document.createElement("IMG");
            im.src = "docs/none.png";
            fetch(im.src)
                .then(res => res.blob())
                .then(blob => {
                    file = new File([blob], 'none.png', blob)
                    alert(file);
                });
        }
        setTimeout(function () {
            formData.append(document.getElementById("filedrag").name, file, file.name);
            formData.append(document.getElementById("title").name, document.getElementById("title").value);
            formData.append(document.getElementById("desc").name, document.getElementById("desc").value);
            formData.append(document.getElementById("date").name, document.getElementById("date").value);
            formData.action = "submitdoc.php";
            formData.method = "POST";
            formData.enctype = "multipart/form-data";
            let xhr = new XMLHttpRequest();
            xhr.onload = function(){
                alert(xhr.responseText);
                location.reload();
            };
            xhr.open(formData.method, formData.action, true);
            xhr.send(formData);
            document.getElementById("disub").style.display = "none";
        },1000);
    }

    var modal1 = document.getElementById("uno");
    var modal2 = document.getElementById("modal");
    var off = document.getElementById("dark");



    function displayModal() {
        modal1.style.display = "block";
        modal2.classList.add("on");

        window.onclick = function(event) {
            if (event.target === modal1) {
                modal1.style.display = "none";
            }
        }
    }

    var php;
    php = <?php if (isset($_SESSION['user'])) {json_encode($_SESSION['user']);} else {echo json_encode("0");}?> + "";
    if (php !== "0")
    {
        document.getElementById("submit").style.display = "block";
        document.getElementById("disub").style.display = "block";
        document.getElementById("btn").onclick = function end() {
            location.replace("logout.php");
        };
        document.getElementById("btn").src = "img/logout.png";
    }

    var pic = "";
    pic = <?php
        $result = $conn->query("SELECT * FROM documentation");
        $arr = array();
        $counter = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["index"];
                $name = $row["title"];
                $desc = $row["description"];
                $date = $row["date"];
                $image = $row["image"];
                $arr[$counter] = array($id, $name, $desc, $date, $image);
                $counter++;
            }
        }
        echo json_encode($arr);
        ?>;

    pic.sort(function(x, y) {
        let x1 = x[3].split("-");
        let y1 = y[3].split("-");
        if (x1[0] > y1[0])
        {
            return 1;
        }
        else if (x1[0] === y1[0])
        {
            if (x1[1] > y1[1])
            {
                return 1;
            }
            else if (x1[1] === y1[1])
            {
                if (x1[2] > y1[2])
                {
                    return 1;
                }
                else if (x1[2] === y1[2])
                {
                    return 0;
                }
            }
        }
        else
            return -1;
    });

    let con = document.getElementById("content");
    let vis = 5;
    for (var i = pic.length - 1; i >= 0 && i >= pic.length - vis; i--)
    {
        var item = document.createElement("div");
        item.classList.add("item");
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            item.style.borderRadius = "5vw";
        }
        var apic = document.createElement("IMG");
        var tex = document.createElement("div");
        apic.src = "docs/" + pic[i][4];
        var aname = document.createElement("h1");
        let boola = (pic[i][4] === "none.png");
        aname.append(document.createTextNode(pic[i][1]));
        var text = pic[i][3].split("-");
        var mon = "Jan";
        if (text[1] === "01")
            mon = "Jan";
        if (text[1] === "02")
            mon = "Feb";
        if (text[1] === "03")
            mon = "Mar";
        if (text[1] === "04")
            mon = "Apr";
        if (text[1] === "05")
            mon = "May";
        if (text[1] === "06")
            mon = "Jun";
        if (text[1] === "07")
            mon = "Jul";
        if (text[1] === "08")
            mon = "Aug";
        if (text[1] === "09")
            mon = "Sep";
        if (text[1] === "10")
            mon = "Oct";
        if (text[1] === "11")
            mon = "Nov";
        if (text[1] === "12")
            mon = "Dec";
        var day = text[2];
        if (text[2] < 10)
            day = text[2].substring(1);
        text = "Dated " + mon +" "+ day + ", " + text[0];
        var adate = document.createElement("p");
        adate.append(document.createTextNode(text));
        var adesc = document.createElement("p");
        adesc.append(document.createTextNode(pic[i][2]));
        apic.addEventListener("click",onZoom);
        apic.classList.add("on");
        if (i % 2 !== 0)
        {
            apic.classList.add("itempicl");
            if (!boola)
            {
                item.appendChild(apic);
            }
            else
            {
                item.classList.add("cen");
            }
            adate.classList.add("adatel");
        }
        else
        {
            apic.classList.add("itempicr");
            adate.classList.add("adater");
        }
        aname.classList.add("aname");
        tex.appendChild(aname);
        adate.classList.add("adate");
        tex.appendChild(adate);
        adesc.classList.add("adesc");
        tex.appendChild(adesc);
        tex.classList.add("tex");
        item.classList.add("on");
        item.appendChild(tex);
        if (i % 2 === 0)
        {

            if (!boola)
            {
                item.appendChild(apic);
                item.classList.add("greener");
            }
            else
            {
                item.classList.add("greenerc");
            }
            item.backgroundColor = "green";
            item.textAlign = "center";
        }
        item.classList.add("slidefadeup");
        con.appendChild(item);
    }
    var loaditem = document.createElement("div");
    loaditem.classList.add("item");
    var load = document.createElement("div");
    load.appendChild(document.createTextNode(""));
    load.id = "load";
    loaditem.appendChild(load);
    con.appendChild(loaditem);
    vis = vis + 5;
    var end = false;



    window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight - 50) {
            loaditem.remove();
            for (var i = pic.length - (vis - 4); i >= 0 && i >= pic.length - vis; i--) {
                var item = document.createElement("div");
                item.classList.add("item");
                var apic = document.createElement("IMG");
                apic.src = "art/uploaded/" + pic[i][4];
                var aname = document.createElement("h1");
                aname.append(document.createTextNode(pic[i][1]));
                var text = pic[i][3].split("-");
                var mon = "Jan";
                if (text[1] === 1)
                    mon = "Jan";
                if (text[1] === 2)
                    mon = "Feb";
                if (text[1] === 3)
                    mon = "Mar";
                if (text[1] === 4)
                    mon = "Apr";
                if (text[1] === 5)
                    mon = "May";
                if (text[1] === 6)
                    mon = "Jun";
                if (text[1] === 7)
                    mon = "Jul";
                if (text[1] === 8)
                    mon = "Aug";
                if (text[1] === 9)
                    mon = "Sep";
                if (text[1] === 10)
                    mon = "Oct";
                if (text[1] === 11)
                    mon = "Nov";
                if (text[1] === 12)
                    mon = "Dec";
                var day = text[2];
                if (text[2] < 10)
                    day = text[2].split("0")[1];
                text = "Posted " + mon +" "+ day + ", " + text[0];
                var adate = document.createElement("p");
                adate.append(document.createTextNode(text));
                var adesc = document.createElement("p");
                adesc.append(document.createTextNode(pic[i][2]));
                apic.classList.add("itempic");
                apic.addEventListener("click",onZoom);
                item.appendChild(apic);
                aname.classList.add("aname");
                item.appendChild(aname);
                adate.classList.add("adate");
                item.appendChild(adate);
                adesc.classList.add("adesc");
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                    item.style.borderRadius = "5vw";
                }
                item.appendChild(adesc);
                con.appendChild(item);
                if (i === 0)
                {
                    end = true;
                }
            }
            if (end === false) {
                loaditem = document.createElement("div");
                loaditem.classList.add("item");
                var load = document.createElement("div");
                load.appendChild(document.createTextNode("Refreshing..."));
                load.id = "load";
                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                    loaditem.style.borderRadius = "5vw";
                }
                loaditem.appendChild(load);
                con.appendChild(loaditem);
            }
            vis = vis + 5;
        }
    };

    function onZoom() {
        document.getElementById("shade").style.display = "block";
        var apic = document.createElement("IMG");
        apic.src = this.src;
        apic.id = "apic";
        apic.style.zIndex = "1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        apic.classList.add("zoom");
        document.getElementById("shade").appendChild(apic);
        var shade = document.getElementById("shade");
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            document.getElementById("apic").style.marginTop = "20vh";
        }
        window.onclick = function(event) {
            if (event.target === shade) {
                shade.style.display = "none";
                apic.remove();
            }
        };
    }
</script>