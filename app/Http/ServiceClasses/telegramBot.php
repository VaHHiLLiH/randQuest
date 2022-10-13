<?php

        $data = json_decode(file_get_contents('php://input'), TRUE);
        file_put_contents('botLogs.txt', '$data: '.print_r($data, 1)."\r\n", FILE_APPEND);
