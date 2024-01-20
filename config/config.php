<?php
$error = [];

define('DSN', 'mysql:host=localhost;dbname=rent_my_ride');
define('USER', 'BorisRide');
define('PASSWORD', 'M7cya2wS3QLr85YF');

$consolesArray = ['PS5', 'XBOX', 'SWITCH', 'PC'];
$gamesArray = [
    'GTA6', 
    'Call of Duty : MW3', 
    'Overwatch 2', 
    'Counter-Strike 2', 
    'Apex Legends', 
    'Battlefield 2042',
    'Far Cry 6',
    'Quake',
    'Call of Duty: Warzone 2.0',
    'Valorant',
    'Borderlands 4',
    'Halo Infinite',
    'DOOM',
];

define('REGEX_FIRSTNAME',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_PSEUDO','^[a-zA-Z0-9.-_]{3,20}$');
define('REGEX_PASSWORD', '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{8,}$');
define('REGEX_ZIPCODE','^[0-9]{5}$');
define('REGEX_LINKEDIN','^(http(s)?:\/\/)?([\w]+\.)?linkedin\.com\/(pub|in|profile)');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');
define('MAX_FILESIZE', 2*1024*1024);

