<?php

$response = "\"[{\"wins\": 45,\"losses\": 20,\"full_name\": \"Boston Celtics\",\"id\": 1,\"players\": [{\"id\": 37729,\"first_name\": \"Kadeem\",\"last_name\": \"Allen\",\"position\": \"SG\",\"number\": 45}]},{\"wins\": 20,\"losses\": 44,\"full_name\": \"Brooklyn Nets\",\"id\": 2,\"players\": [{\"id\": 802,\"first_name\": \"Quincy\",\"last_name\": \"Acy\",\"position\": \"F\",\"number\": 13}]}]\";";

echo json_encode($response);