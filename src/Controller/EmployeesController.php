<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\EmployeeService;
use App\DataSource\EmployeeRestDataSource;

class EmployeesController extends AbstractController
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        try { 
	    $employees = $this->employeeService->getAll();
        } catch (\Exception $exception) {
		return new Response($exception->getMessage());
        }
	return $this->render('employees.html.twig', ['employees' => $employees]); 
    }
}

