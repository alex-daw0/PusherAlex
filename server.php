<?php
require __DIR__ . '/vendor/autoload.php';

$pusher = new Pusher\Pusher(
    '4af5bc9b6ddf24e1d1b5',
    '9c9276c7dbc3693d669f',
    '1763775',
    [
        'cluster' => 'eu',
    ]
);

for ($i = 0; $i < 10; $i++) {
    $timestamp = time();
    $amount = rand(100, 1000);

    $data = [
        'timestamp' => date('H:i:s', $timestamp),
        'amount' => $amount
    ];

    $pusher->trigger('sales-channel', 'new-sale', $data);

    sleep(1);
}
?>
