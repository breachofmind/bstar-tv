<html>
<head>
    <title>Slider</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/slick.css">
    <link rel="stylesheet" href="/static/slick-theme.css">
    <link rel="stylesheet" href="/src/slider.css">

    <script src="/static/jquery.min.js"></script>
    <script src="/static/handlebars.min.js"></script>
    <script src="/static/slick.min.js"></script>
    <script src="/src/slider.js"></script>
</head>
<body>
    <div id="Slider" class="<?php echo $type; ?>"></div>

    <script id="SliderTemplate" type="text/x-handlebars-template">
        <div class='slide'>
            <img src='{{image}}' alt='{{type}}'/>
            <div class='caption'>
                <h3>{{title}}</h3>
                <p>{{content}}</p>
            </div>
        </div>
    </script>
</body>
</html>
