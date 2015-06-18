<?php

return [
    // Incoming webhook endpoint: https://hooks.slack.com/services/XXXXXXXX/XXXXXXXX/XXXXXXXXXXXXXX
    'endpoint' => env('SLACK_ENDPOINT'),
    // Default channel: #group or @username
    'channel' => env('SLACK_CHANNEL', '#general'),
    // Default username
    'username' => 'bot',
];
