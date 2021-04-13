# ElasticQueue [![Home page](https://img.shields.io/static/v1?label=version&message=0.6&color=green)](https://github.com/edwardcaret/elasticqueue)
Laravel Queue Driver for Elasticsearch

Code originally from <https://packagist.org/packages/brokerexchange/elasticqueue>

However it was modified by Edward van der Jagt to fix some missing stuff in the code, as well as fixing some incompatibilities with newer Elasticsearch.

## License
ElasticQueue is released under the MIT Open Source License, <https://opensource.org/licenses/MIT>

## Copyright
ElasticQueue &copy; Edward van der Jagt 2021

## Installation
 * Run command `composer require edwardcaret\elasticqueue`
 * If you are using Laravel 5.5+, this package will be auto-discovered
    * Otherwise, add `ElasticQueue\ElasticQueueServiceProvider::class,` to config/app.php
 * Add to config/queue.php

```php
        'elasticsearch' => [
            'driver' => 'elasticsearch',
            'host' => explode(',',env('ELASTICSEARCH_HOST','localhost:9200')),
            'index' => 'jobs',
            'queue' => 'default',
            'retry_after' => 60,
        ],
```

## Development notes:
This original code was created for version 6 (or older). However 7+ has removed mapping types, and this invalidated some code.
See https://www.elastic.co/guide/en/elasticsearch/reference/current/removal-of-types.html

