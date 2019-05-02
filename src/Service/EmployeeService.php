<?php
namespace App\Service;

use App\DataSource\DataSourceInterface;
use App\Model\Employee;

class EmployeeService
{
    /**
     * @var DataSourceInterface
     */
    private $dataSource;

    /**
     * @param DataSourceInterface $dataSource
     */
    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $rows = $this->dataSource->getList();
        $employees = [];
        foreach ($rows as $row) {
            $employees[] = $this->createEmployeeFromRow($row);
        }
        return $employees;
    }

    /**
     * @param object $row
     * @return Employee
     */
    private function createEmployeeFromRow(object $row): Employee
    {
        $employee = new Employee();
        $employee->setUuid($row->uuid);
        $employee->setCompany($row->company);
        $employee->setBio($row->bio);
        $employee->setName($row->name);
        $employee->setTitle($row->title);
        $employee->setAvatar($row->avatar);
        return $employee;
    }
}
