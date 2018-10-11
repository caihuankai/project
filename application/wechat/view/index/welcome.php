<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">

    <style>
        body {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        div {
            padding: 0;
            margin: 0;
            border: 0;
        }

        [i="welcome"] {
            width: 100%;
        }

        .img {
            width: 100%;
            overflow: hidden;
            font-size: 0;
        }

        img {
            width: 100%;
            height: auto;
            border: none;
        }
    </style>

</head>

<body>

<div i="welcome">
    <div class="picture">
        <div class="img one" onclick="go('/index/0')">
            <img src="/images/welcome/new_welcome_01.jpg" alt="">
        </div>
        <div class="img two" onclick="go('/live/1707332')">
            <img src="/images/welcome/new_welcome_02.jpg" alt="">
        </div>
        <div class="img three" onclick="go('/live/1707329')">
            <img src="/images/welcome/new_welcome_03.jpg" alt="">
        </div>
        <div class="img four" onclick="go('/live/1707284')">
            <img src="/images/welcome/new_welcome_04.jpg" alt="">
        </div>
        <div class="img five" onclick="go('/live/1707305')">
            <img src="/images/welcome/new_welcome_05.jpg" alt="">
        </div>
        <div class="img six" onclick="go('/live/1707326')">
            <img src="/images/welcome/new_welcome_06.jpg" alt="">
        </div>
        <div class="img seven" onclick="go('/live/1707308')">
            <img src="/images/welcome/new_welcome_07.jpg" alt="">
        </div>
        <div class="img eight" onclick="go('/live/1707299')">
            <img src="/images/welcome/new_welcome_08.jpg" alt="">
        </div>
        <div class="img nine" onclick="go('/live/1707302')">
            <img src="/images/welcome/new_welcome_09.jpg" alt="">
        </div>
        <div class="img ten" onclick="go('/index/0')">
            <img src="/images/welcome/new_welcome_10.jpg" alt="">
        </div>
    </div>
</div>
<script>
	var domain = '<{$domain}>';
    function go(winName) {
        window.location.href = domain+`/#${winName}`;
    }

</script>
</body>

