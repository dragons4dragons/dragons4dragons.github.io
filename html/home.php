<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title> Dragons 4 Dragons </title>
    <meta charset="UTF-8", name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1158619689.js" crossorigin="anonymous"></script>
    <link href="home.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="mid"> </div>

<div class="scroll off" id="scroll"> </div>

<div class="top" id="topp">
    <div class="b" onclick="scroller('goal')"> <h1> GOAL </h1> </div>
    <div class="b" onclick="scroller('support')"> <h1> PRODUCTS </h1> </div>
    <div class="b" onclick="scroller('about')"> <h1> ABOUT </h1> </div>
    <div class="b"> <a href="documentation" style="text-decoration: none; color: black"><h1> PROGRESS </h1></a> </div>
    <div class="b" onclick="scroller('sponsors')"> <h1> SPONSORS </h1> </div>
</div>

<div class="topback"> </div>

<div class="slides">
    <div class="hov l" id="place" onclick="slide('back')"><i class="fas fa-chevron-left"></i></div>
    <img id="slide" class="slideinleft" src="img/slide1.jpg">
    <div class="hov r" onclick="slide('next')"><i class="fas fa-chevron-right"></i></div>
</div>


<div class="goal off" id="what">
    <br>
    <h1> What is Dragons 4 Dragons? </h1>
    <p> This program was created for students to support each other by raising funds for college scholarships through the sale of merchandise, donations, and sponsorships. It is the hope that enough money will be raised each year to give out several awards to those students who have demonstrated the true meaning of being a Southlake Carroll Dragon.</p>
    <br>
</div>

<div class="off support" id="support">
    <div class="shirt">
        <img src="img/shirt.png">
        <div class="txt">
            <h1> Buy a Dragons4Dragons Shirt! </h1>
            <p> All proceeds go to the Dragons4Dragons scholarship fund for students. <br> Click <a href="https://www.etsy.com/listing/982790168/dragons-4-dragons-mens-short-sleeved-100?ref=listing_published_alert&variation0=1921849126" target="_blank">here</a> to learn more </p>
        </div>
    </div>
    <!--
    <p class="or"> or </p>
    <div class="donate">
        <h1> Donate Today </h1>
    </div>
    -->
</div>

<h1 class="off" id="ab1"> About Us </h1>
<br><br><br>

<div class="off" id="ab2">
    <div class="info a">
        <img src="img/michael.jfif">
        <h1> Michael Ubis </h1>
        <p> COO and Marketing Manager </p>
    </div>

    <div class="info">
        <img src="img/brett.jfif">
        <h1> Brett Belleville </h1>
        <p> CEO and Founder</p>
    </div>

    <div class="info c">
        <img src="img/bryant.jfif">
        <h1> Bryant Hargreaves </h1>
        <p> CTO and Marketing Manager </p>
    </div>
</div>

<!--
<div class="about" id="ab2">

    <div class="info c">
        <img src="img/shirt.png">
        <div class="txt2">
            <h1> Brett Belleville <br> CEO </h1>
            <p> Paragraph </p>
        </div>
    </div>

    <div class="info a">
        <div class="txt2">
            <h1> Michael Ubis <br> CMO </h1>
            <p> Paragraph </p>
        </div>
        <img src="img/shirt.png">
    </div>

    <div class="info c">
        <img src="img/bryant.png">
        <div class="txt2">
            <h1> Bryant Hargreaves <br> CTO </h1>
            <p> I don't know what I'm doing but you can follow me on twitter </p>
        </div>
    </div>
</div>
-->

<div class="off" id="sponsors">
    <h1> This Year's Sponsors</h1>
    <div class="cont">
        <div class="link">
        <a class="link" href="https://www.gigglesandgrins.org/contact.php" target="_blank">
            <img src="img/gng.png">
        </a>
            <a href="https://www.google.com/maps/place/2915+E+Southlake+Blvd+%23200,+Southlake,+TX+76092/@32.9378564,-97.1043538,19.75z/data=!4m5!3m4!1s0x864dd4c5edd0d219:0x96d26388c8ac8086!8m2!3d32.9378491!4d-97.1044384" target="_blank">
                <p>
                    2915 E Southlake Blvd, Suite 200, Southlake, TX 76092
                    <br>
                </p>
                <a href="https://www.gigglesandgrins.org/contact.php" target="_blank">
                    Phone: 817.488.3533
                </a>
            </a>
        </div>

        <div class="link">
        <a class="link" href="http://www.tbkenvironmental.com/" target="_blank">
            <img src="img/tbk.jfif">
        </a>
            <a href="mailto:info@tbkenvironmental.com" target="_blank">
                <p>
                    info@tbkenvironmental.com
                </p>
                <a href="http://www.tbkenvironmental.com/" target="_blank">
                    Phone: 469-688-2704
                </a>
            </a>
        </div>

        <div class="link">
            <a class="link" href="https://thetravelpurveyor.com/" target="_blank">
                <img src="img/travel.png">
            </a>
            <a href="mailto:Shannon.obrien@frosch.com" target="_blank">
                <p>
                    Shannon.obrien@frosch.com
                </p>
                <a href="https://thetravelpurveyor.com/" target="_blank">
                    Phone: 817-935-8633
                </a>
            </a>
        </div>
    </div>
</div>

<div class="off" id="footer">
    <a href="https://www.facebook.com/Dragons-4-Dragons-280790759256498/" target="_blank">
        <p>
            Find us on Facebook!
        </p>
    </a>
</div>

</body>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    var body = document.body,
        html = document.documentElement;

    var height = Math.max( body.scrollHeight, body.offsetHeight,
        html.clientHeight, html.scrollHeight, html.offsetHeight );

    var topp = document.getElementById("topp");
    var tab = document.getElementById("scroll");
    var what = document.getElementById("what");
    var support = document.getElementById("support");
    var ab1 = document.getElementById("ab1");
    var ab2 = document.getElementById("ab2");
    var sponsors = document.getElementById("sponsors");
    var footer = document.getElementById("footer");
    var scrollTop = (window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop) + screen.height;
    var tabpos = scrollTop/height * 100;
    var tabheight = screen.height/height * 100;
    tab.style.height = 30 + "%";
    var tabfade = false;
    setInterval(function(){
        if (tabpos > 30)
        {
            what.classList.remove("off");
            what.classList.add("slideDown");
        }

        if (tabpos > 40)
        {
            support.classList.remove("off");
            support.classList.add("support");
            support.classList.add("slideDown");
        }

        if (tabpos > 60)
        {
            ab1.classList.remove("off");
            ab1.classList.add("slideDown");
            ab1.classList.add("aboutus");
            ab2.classList.remove("off");
            ab2.classList.add("slideDown");
            ab2.classList.add("about");
        }

        if (tabpos > 90)
        {
            sponsors.classList.remove("off");
            sponsors.classList.add("slideDown");
            sponsors.classList.add("sponsors");
        }

        if (tabpos > 99)
        {
            footer.classList.remove("off");
            footer.classList.add("fadeIn");
            footer.classList.add("footer");
        }

        scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
        tabpos = scrollTop/height * 150;

        if (tabpos > 10 && tabpos < 95) {
            tab.classList.remove("off");
            tab.classList.remove("fadeOut");
            tab.classList.add("tabFadeIn");
        }
        else
        {
            tab.classList.add("fadeOut");
            tab.classList.remove("tabFadeIn");
            setTimeout(function () {
                if (tabpos > 10 && tabpos < 95)
                    tab.classList.remove("off");
                else
                    tab.classList.add("off");
            }, 500);
        }

        if (tabpos > 10 && tabpos < 95) {
            tab.classList.remove("off");
            tab.classList.remove("fadeOut");
            tab.classList.add("fadeIn");
        }
        else
        {
            tab.classList.add("fadeOut");
            tab.classList.remove("fadeIn");
            setTimeout(function () {
                if (tabpos > 10 && tabpos < 95)
                    tab.classList.remove("off");
                else
                    tab.classList.add("off");
            }, 500);
        }

        tab.style.marginTop = (scrollTop/height) * screen.height - 62 + "px";
    }, 1);

    function scroller(yeet) {
        var scrollify = topp;
        if (yeet === 'goal')
        {
            tabpos = 19;
            scrollify = what;
        }
        if (yeet === 'support')
        {
            tabpos = 34;
            scrollify = support;
        }
        if (yeet === 'about')
        {
            tabpos = 62;
            scrollify = ab1;
        }
        if (yeet === 'sponsors')
        {
            tabpos = 180;
            scrollify = sponsors;
        }

        scrollify.scrollIntoView();
        scrollTo(0,height * ((tabpos)/100))
        removeHash()
    }

    function removeHash () {
        var scrollV, scrollH, loc = window.location;
        if ("pushState" in history)
            history.pushState("", document.title, loc.pathname + loc.search);
        else {
            // Prevent scrolling by storing the page's current scroll offset
            scrollV = document.body.scrollTop;
            scrollH = document.body.scrollLeft;

            loc.hash = "";

            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scrollV;
            document.body.scrollLeft = scrollH;
        }
    }


    /*$(document).ready(function(){
        // Add smooth scrolling to all links
        $(".b").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });*/

    setTimeout(function () {
        if (location.hash === "#about")
            scroller('about');
        if (location.hash === "#goal")
            scroller('goal');
        if (location.hash === "#products")
            scroller('support');
        if (location.hash === "#sponsors")
            scroller('sponsors');
    },1000);

    let slidec = 1;
    let tick = 0;

    function slide(x) {
        tick = 0;
        if (x === "next")
            slidec++;
        else if (x === "back")
            slidec--;
        if (slidec === 8)
            slidec = 1;
        else if (slidec === 0)
            slidec = 7;

        let slide = document.getElementById("slide");
        slide.classList.remove("slideinleft");
        slide.classList.remove("slideinright");
        if (x === "next")
            slide.classList.add("slideoutleft");
        if (x === "back")
            slide.classList.add("slideoutright");
        setTimeout(function () {
            slide.src = "img/slide" + slidec + ".jpg";
            if (x === "next")
            {
                slide.classList.remove("slideoutleft");
                slide.classList.add("slideinleft");
            }
            if (x === "back")
            {
                slide.classList.remove("slideoutright");
                slide.classList.add("slideinright");
            }
        },1000);
    }

    setInterval(function () {
        tick++;
        if (tick === 8)
            slide("next");
    },1000);


    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        tab.style.display = "none";
    }



</script>

</html>

