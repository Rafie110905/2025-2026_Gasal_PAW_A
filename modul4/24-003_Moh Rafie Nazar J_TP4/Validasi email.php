<?php

$email = "user@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL))
    echo "Email valid!<br>";
else
    echo "Email tidak valid!<br>";

$url = "https://example.com";
if (filter_var($url, FILTER_VALIDATE_URL))
    echo "URL valid!<br>";
else
    echo "URL tidak valid!<br>";

if (checkdate(2, 29, 2024))
    echo "Tanggal valid!<br>";
else
    echo "Tanggal tidak valid!<br>";
?>
