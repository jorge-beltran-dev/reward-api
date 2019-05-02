<?php
namespace App\DataSource;

interface DataSourceInterface
{
    public function getList(): array;
}
