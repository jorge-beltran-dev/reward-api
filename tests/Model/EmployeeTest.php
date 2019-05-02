<?php
namespace App\Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Employee;

class EmployeeTest extends TestCase
{
    public function testYouCantSetHtmlOrScriptsInBio()
    {
        $employee = new Employee();
        $employee->setBio('<p>Some html bio.<script>alert(1);</script>');
        $this->assertSame('Some html bio.', $employee->getBio());
    }
 
    public function testYouCanSetAValidUrlInAvatar()
    {
        $avatarUrl = 'https://www.mydomain.com/avatar.jpg';
        $employee = new Employee();
        $employee->setAvatar($avatarUrl);
        $this->assertSame($avatarUrl, $employee->getAvatar());
    }

    public function testYouCantSetAnInvalidUrlInAvatar()
    {
        $avatarUrl = 'http/myavatar.jpg//';
        $employee = new Employee();
        $employee->setAvatar($avatarUrl);
        $this->assertSame('', $employee->getAvatar());
    }
}
