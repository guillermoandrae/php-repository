# PHP Repository Library
[![Travis](https://img.shields.io/travis/guillermoandrae/php-repository.svg?style=flat-square)](https://travis-ci.org/guillermoandrae/php-repository) [![Scrutinizer](https://img.shields.io/scrutinizer/g/guillermoandrae/php-repository.svg?style=flat-square)](https://scrutinizer-ci.com/g/guillermoandrae/php-repository/) [![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/guillermoandrae/php-repository.svg?style=flat-square)](https://scrutinizer-ci.com/g/guillermoandrae/php-repository/) [![Your Mom Approves](https://img.shields.io/badge/approved%20by-your%20mom-green.svg?style=flat-square)](https://guillermoandraefisher.com)

I use a simple implementation of the Repository pattern. Often. I've been copying and pasting the same code between projects for longer than I care to admit; I came to my senses recently, and that's why this project now exists.

## Installation
Do this, then relax:
```
composer require guillermoandrae/php-repository
```

## Usage
Before you do anything crazy, [read up on the Repository pattern](https://martinfowler.com/eaaCatalog/repository.html). If you've decided you still want to move forward, keep reading.

### Naming Classes
Your classes should be named according to their data type. For example, if you're dealing with widgets, your repository should be named `WidgetsRepository` and your model should be named `WidgetModel`. Note that the data type in the repository name is pluralized and singular in the model name. 

### Creating Repositories
Leveraging the repository functionality is as easy as writing the following:

```php
namespace App\Repositories;

use Guillermoandrae\Repositories\AbstractRepository;

class WidgetsRepository extends AbstractRepository
{
    public function create(array $data): ModelInterface
    {
        // add your object creation code here
    }
}
```

There are a few methods you need to implement in the classes that inherit from the `AbstractRepository` class. Check out the [`RepositoryInterface`](src/Repositories/RepositoryInterface.php) and [`AbstractRepository`](src/Repositories/AbstractRepository.php) classes for the most up-to-date list.

### Creating Models
Creating models is straightforward:
```php
namespace App\Repositories;

use Guillermoandrae\Models\AbstractModel;

final class WidgetModel extends AbstractModel
{
    // add your constructor and getters
}
```

I like to build immutable models, but how you use them is really up to you.

## Testing
Run the following command to make sure you don't ruin the code coverage percentage:
```
composer check-coverage
```

Run the following command to make sure your code is appropriately styled:
```
composer check-style
```

Run the following command to invoke both of the above commands easily:
```
composer test
```
