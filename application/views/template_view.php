<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Тестовое задание</title>

    <link rel="stylesheet" type="text/css" href="application/js/jsgrid-1.5.3/css/jsgrid.css" />
    <link rel="stylesheet" type="text/css" href="application/js/jsgrid-1.5.3/css/theme.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/cupertino/jquery-ui.css">

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <script src="application/js/jsgrid-1.5.3/src/jsgrid.core.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/jsgrid.load-indicator.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/jsgrid.load-strategies.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/jsgrid.sort-strategies.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/jsgrid.field.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/fields/jsgrid.field.text.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/fields/jsgrid.field.number.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/fields/jsgrid.field.select.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/fields/jsgrid.field.checkbox.js"></script>
    <script src="application/js/jsgrid-1.5.3/src/fields/jsgrid.field.control.js"></script>

    <script src="application/js/jsgrid-1.5.3/db.js"></script>
</head>

<body>
	<?php
        $data = $data;
        include 'application/views/'.$content_view;
    ?>
</body>
</html>