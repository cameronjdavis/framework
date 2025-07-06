<?php

return [
    'example.env.value' => getenv('ENV_VAR_1') ? getenv('ENV_VAR_1') : 'Try running: ENV_VAR_1="Here I am." php console config',
];
