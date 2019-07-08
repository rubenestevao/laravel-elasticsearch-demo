<?php

declare(strict_types = 1);

namespace App\Elastic;

use ScoutElastic\IndexConfigurator;

class PostIndexConfigurator extends IndexConfigurator
{
    // It's not obligatory to determine name. By default it'll be a snaked class name without `IndexConfigurator` part.
    protected $name = 'post_index';

    // You can specify any settings you want, for example, analyzers.
    protected $settings = [
        'analysis' => [
            'analyzer' => [
                'en_std' => [
                    'type' => 'standard',
                    'stopwords' => '_english_'
                ]
            ]
        ]
    ];
}
