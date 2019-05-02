# reward-api
Employee API access test.
Developed with Symfony 4. Also uses the package metaer/curl-wrapper-bundle

## Installation
```bash
git clone https://github.com/razzman/reward-api.git reward-api
cd reward-api
composer update
bin/console server:start
```
* The website will be accessible at: http://127.0.0.1:8000

## Unit tests
* To run unit tests:
```bash
bin/phpunit
```

## Relevant files
src/Controller/EmployeesController.php
src/DataSource/DataSourceInterface.php
src/DataSource/EmployeeDataSource.php
src/DataSource/EmployeeRestDataSource.php
src/Model/Employee.php
src/Service/EmployeeService.php

templates/employees.html.twig

tests/DataSource/EmployeeRestDataSourceTest.php
tests/Model/EmployeeTest.php
tests/Service/EmployeeServiceTest.php
