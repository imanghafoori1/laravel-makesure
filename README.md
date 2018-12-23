# laravel Makesure
Readable syntax to write tests in laravel

[![StyleCI](https://github.styleci.io/repos/162841027/shield?branch=master)](https://github.styleci.io/repos/162841027)

This package tries to give you a more readable syntax to write 

### Installation

```

composer require imanghafoori/laravel-makesure --dev

```


### Usage

You can use it like this :



```php

  MakeSure::that($this)->
      ->sendingGetRequest('some-url')
      ->isRespondedWith()
      ->statusCode(402);

// Instead of writing this :

$this
    ->get('some-url')
    ->assertStatus(402);

```

You should start of with the `MakeSure` alias or the `Imanghafoori\MakeSure\Facades\MakeSure` Facade class like this:

```

MakeSure::that($this)->...

```

Note that for technical reasons you should always pass $this into the `that` method.


then you have access to all of these methods:

```

sendingPostRequest

sendingJsonPostRequest

sendingDeleteRequest

sendingJsonDeleteRequest

sendingPutRequest

sendingJsonPutRequest

sendingPatchRequest

sendingJsonPatchRequest

sendingGetRequest

sendingJsonGetRequest

```
