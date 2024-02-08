<?php
$error = [];

define('DSN', 'mysql:host=localhost;dbname=blazerifle');
define('USER', 'BorisRifle');
define('PASSWORD', 'r.g[WZL_FZkqM0Gs');

define('REGEX_TITLE', '^[a-zA-Z0-9 .,\'éèêëàâäôöûüçÉÈÊËÀÂÄÔÖÛÜÇ:-]{10,150}$');
define('REGEX_SECTION', "^[a-zA-Z0-9 '.,éèêëàâäôöûüçÉÈÊËÀÂÄÔÖÛÜÇ:-]{250,1500}$");
define('REGEX_NAME','^[A-Za-z-éèêëàâäôöûüç\' ]{2,100}$');
define('IMAGE_TYPES',  ['image/jpeg', 'image/png', 'image/avif']);
define('MAX_FILESIZE', 2*1024*1024);
define('REGEX_PLACE', '^[A-Za-zÀ-ÖØ-öø-ÿ\-\s\']{2,}$');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_CONSOLE', "^[a-zA-Z0-9 ]{2,20}$");

define('DATE', '^(?:\d{4}-\d{2}-\d{2})$');


define('REGEX_FIRSTNAME',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_PSEUDO','^[a-zA-Z0-9.-_]{3,20}+$');
define('REGEX_PASSWORD', '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{8,}+$');
define('REGEX_ZIPCODE','^[0-9]{5}$');
define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');

define('SECRET_KEY', 'kadzefze6rze6r5ze9rzggr:!;ezfoi"à"é"éd56d48ez4f6zef6fz');

