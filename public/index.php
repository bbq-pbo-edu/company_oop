<?php
include '../config/loader.php';

$repo = new EmployeeRepository();

$employee = $repo->findById(1)[0];
var_dump($employee);
echo "<br><br>";
echo 'id: ' . $employee->getId() . '<br>';
echo 'firstName: ' . $employee->getFirstName() . '<br>';
echo 'lastName: ' . $employee->getLastName() . '<br>';

$employee->setFirstName("Martin");

$repo->update($employee);

$employee = $repo->findById(1)[0];
var_dump($employee);
echo "<br><br>";
echo 'id: ' . $employee->getId() . '<br>';
echo 'firstName: ' . $employee->getFirstName() . '<br>';
echo 'lastName: ' . $employee->getLastName() . '<br>';