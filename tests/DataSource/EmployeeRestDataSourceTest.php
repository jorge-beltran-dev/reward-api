<?php
namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\DataSource\EmployeeRestDataSource;
use Metaer\CurlWrapperBundle\CurlWrapper;

class EmployeeRestDataSourceTest extends TestCase
{
    public function setUp()
    {
        $employee1 = new \stdClass;
        $employee1->uuid = '1a367b32-42c2-379d-9833-a322a07ecf06';
        $employee1->company = 'Veum, Kulas and Barton';
        $employee1->bio = 'Beatae dolorum ipsam ut nihil consequatur perspiciatis.' .
            'Minus qui velit accusantium laborum modi quisquam.' .
            'Facilis repudiandae praesentium molestias consequatur.<script type=\"text/javascript\">alert(1);</script>';
        $employee1->name = 'Freddie Williamson';
        $employee1->title = 'Surveyor';
        $employee1->avatar = 'http://lorempixel.com/64/64/people/?83871';

        $employee2 = new \stdClass;
        $employee2->uuid = 'f37fcf53-b52b-36f1-931d-e071e2907173';
        $employee2->company = 'Roob-Glover';
        $employee2->bio = '';
        $employee2->name = 'Mr. Lisandro Harvey V';
        $employee2->title = 'Rock Splitter';
        $employee2->avatar = 'http://lorempixel.com/64/64/people/?64372';

        $employee3 = new \stdClass;
        $employee3->uuid = '61ceae95-1bca-3936-8aeb-6c223abdeb8f';
        $employee3->company = 'Cummings PLC';
        $employee3->bio = '';
        $employee3->name = 'Sydnie Lesch';
        $employee3->title = 'Roof Bolters Mining';
        $employee3->avatar = 'http://lorempixel.com/64/64/people/?50420';

        $this->employeesFixture = [$employee1, $employee2, $employee3];
        $this->employeesFixtureJson = json_encode([$employee1, $employee2, $employee3]);
    }

    public function testGetEmployeeDataFromWorkingRestApi()
    {
        $curlWrapper = $this->createMock(CurlWrapper::class);
        $curlWrapper->method('getQueryResult')
             ->willReturn($this->employeesFixtureJson);
        $employeeDataSource = new EmployeeRestDataSource($curlWrapper);
        $this->assertEquals($this->employeesFixture, $employeeDataSource->getList());
    }

    public function testThrowExceptionOnBrokenRestApi()
    {
        $curlWrapper = $this->createMock(CurlWrapper::class);
        $curlWrapper->method('getQueryResult')
             ->willReturn(json_encode(new \stdClass));
        $this->expectException(\Exception::class);
        $employeeDataSource = new EmployeeRestDataSource($curlWrapper);
        $employeeDataSource->getList();
    }
}
