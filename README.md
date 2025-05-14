## Tutorial

[Part I](https://kinsta.com/blog/laravel-blog)

[Part II](https://kinsta.com/blog/laravel-unit-testing/)

## Commands

```bash
php artisan make:model Post -mc
```

```bash
php artisan make:test PostModelFunctionalityTest --unit
```

```bash
php artisan test tests/Unit/PostModelFunctionalityTest.php
```

```bash
php artisan make:test PostCreationTest --unit
```

```bash
php artisan config:clear
```

```bash
php artisan test tests/Unit/PostCreationTest.php
```

```bash
php artisan make:test PostControllerTest
```

```bash
php artisan test tests/Feature/PostControllerTest.php
```

## License

Licensed under the [MIT license](https://opensource.org/licenses/MIT).
