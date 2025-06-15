<?php

/*
 * This file is part of the PHPFlasher package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

return array(
    'scripts' => array(
        'cdn' => array(
            'https://cdn.jsdelivr.net/npm/@flasher/flasher-notyf@1.3.2/dist/flasher-notyf.min.js',
        ),
        'local' => array(
            '/vendor/flasher/flasher-notyf.min.js',
        ),
    ),
    'styles' => array(
        'cdn' => array(
            'https://cdn.jsdelivr.net/npm/@flasher/flasher-notyf@1.3.2/dist/flasher-notyf.min.css',
        ),
        'local' => array(
            '/vendor/flasher/flasher-notyf.min.css',
        ),
    ),
    'options' => array(
        'dismissible' => true,
        'ripple' => false,
        'duration' => 3000,
        'position' => array(
            'x' => 'right',
            'y' => 'top',
        ),
    ),
);
