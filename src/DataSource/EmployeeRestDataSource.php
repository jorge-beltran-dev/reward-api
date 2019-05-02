<?php
namespace App\DataSource;

use Metaer\CurlWrapperBundle\CurlWrapper;

class EmployeeRestDataSource extends EmployeeDataSource implements DataSourceInterface
{
    /**
     * @var string
     */
    private $employeeUrl;

    /**
     * @var CurlWrapper
     */
    private $curlWrapper;

    /**
     * @var array
    */
    private $curlOptions;

    /**
     * @param CurlWrapper $curlWrapper
     */
    public function __construct(CurlWrapper $curlWrapper)
    {
        $this->employeeUrl = $_ENV['EMPLOYEE_URL'];
        $this->curlWrapper = $curlWrapper;
        $this->curlOptions = [
            CURLOPT_URL => $this->employeeUrl,
            CURLOPT_RETURNTRANSFER => true,
        ];
    }

    /**
     * @throws \Exception
     * @return array
     */
    public function getList(): array
    {
        $results = json_decode($this->curlWrapper->getQueryResult($this->curlOptions));
        if (!is_array($results)) {
            throw new \Exception('Error retrieving employees data. Please, try again later');
        }
        return $results;
    }
}
