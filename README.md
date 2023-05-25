## Laravel Facade Pattern Scaffolding

This package provides scaffolding for the Facade Pattern in Laravel. The Facade Pattern is a design pattern that helps to separate the business logic from the controller or other client code, making it easier to maintain and test.

## Why Facade Pattern instead of Repository Pattern?

In the Repository Pattern, the implementation of the data access layer is abstracted behind an interface. This interface defines the methods that the repository must implement, but it doesn't provide any way to access the underlying implementation details.   

This lack of flexibility can be problematic in cases where you need to access the implementation details of the repository from other parts of the code. For example, if you need to access the repository from within a queued job or another simple class, you can't simply create a new instance of the repository because it's abstracted behind an interface.   

One workaround for this issue is to pass the repository instance to the queued job or simple class as a parameter, but this can lead to tight coupling and make the code harder to maintain.   

Another workaround is to use a dependency injection container to provide an instance of the repository to the queued job or simple class. However, this can add additional complexity and require additional configuration.   

Overall, the lack of flexibility in the Repository Pattern can be a disadvantage in certain situations, especially when you need to access the implementation details of the repository from other parts of the code.   

Here comes the solution with Facade Pattern. You can easily access the Facade from within a queued job or another simple class.

## Installation

You can install the package via composer:

```bash
composer require hyder/facade-pattern --dev
```

## Publish Provider

After installation, you need to run the `vendor:publish` command to publishing provider file. You can do this by running the following command:

```bash
php artisan vendor:publish --provider=Hyder\FacadePattern\FacadePatternServiceProvider --tag=provider

```
This will publish the package's `FacadeServiceProvider`  to the `app/Providers` directory, which you can then modify as needed.   
   
The `FacadeServiceProvider` class is responsible for registering the service classes for Facade with the Laravel container. This allows you to easily swap out the implementation of the service classes if needed.

## Configuration

You have to manually add the service provider in your config/app.php file:

```php
'providers' => [
    // ...
    App\Providers\FacadeServiceProvider::class,
];
```
## Create Scaffolding

Now you can run the `facade-pattern:scaffold` command to generate the necessary scafolding files. You can do this by running the following command:
```bash
php artisan facade-pattern:scaffold Example

```
This will create the following files in your app directory:

```text
app/
└── Patterns/
    ├── Facades/
    │   ├── <name>Facade.php
    │   └── ... other facades
    ├── Interfaces/
    │   ├── <name>Interface.php
    │   └── ... other interfaces
    └── Services/
        ├── <name>FacadeService.php
        └── ... other services

```

- The `Patterns/Facades` directory contains the Facade classes, which provide a simple, consistent interface to the underlying service classes. You can create additional Facade classes as needed.   

- The `Patterns/Interfaces` directory contains the repository interfaces, which define the methods that the service classes must implement. You can create additional interface files as needed.   

- The `Patterns/Services` directory contains the service classes, which perform the actual business logic and communicate with the database or other external systems. You can create additional service classes as needed.   

## Create Facade, Interface and Service 

By running the `facade-pattern:facade`, `facade-pattern:interface`, and `facade-pattern:service` command you can generate the necessary file. You can do this by running the following command:   

### Facade 
```bash
php artisan facade-pattern:facade ExampleFacade

```
### Interface 
```bash
php artisan facade-pattern:interface ExampleInterface

```
### Service 
```bash
php artisan facade-pattern:service ExampleFacadeService

```
Don't forget to register your facade service class in `FacadeServiceProvider` provider's register() method.   
That's it! You can now start using the Facade Pattern in your Laravel application.   

## Contributing
If you would like to contribute to this package, please create a pull request or open an issue.

## License
This package is open-sourced software licensed under the MIT license.
