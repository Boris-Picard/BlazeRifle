<?php
$error = [];

define('REGEX_FIRSTNAME',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_PSEUDO','^[a-zA-Z0-9.-_]{3,20}$');
define('REGEX_ZIPCODE','^[0-9]{5}$');
define('REGEX_LINKEDIN','^(http(s)?:\/\/)?([\w]+\.)?linkedin\.com\/(pub|in|profile)');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');
define('MAX_FILESIZE', 2*1024*1024);

define('LANGUAGES', ['HTML/CSS', 'Javascript', 'Php', 'Python']);
define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
define('ARRAY_COUNTRIES', ['France', 'Suisse', 'Allemagne', 'Italie']);