<?php

namespace App;

use App\Elastic\PostIndexConfigurator;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Post extends Model
{
    use Searchable;

    protected $indexConfigurator = PostIndexConfigurator::class;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'posts_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only('title', 'description', 'comments_number', 'publish');
    }

    public function shouldBeSearchable()
    {
        return true;
    }

    protected $searchRules = [
        //
    ];

    // Here you can specify a mapping for model fields
    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
                // Also you can configure multi-fields, more details you can find here https://www.elastic.co/guide/en/elasticsearch/reference/current/multi-fields.html
                'fields' => [
                    'raw' => [
                        'type' => 'keyword',
                    ]
                ]
            ],

            'comments_number' => [
                'type' => 'long',
            ],

            'publish' => [
                'type' => 'boolean',
            ],
        ]
    ];
}
