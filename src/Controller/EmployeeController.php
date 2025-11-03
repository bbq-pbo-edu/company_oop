<?php

class EmployeeController implements ControllerInterface
{
    public function show(int $id): void
    {
        $repo = new EmployeeRepository();
        $loader = new \Twig\Loader\FilesystemLoader('../templates/employee');
        $twig = new \Twig\Environment($loader);

        $entity = $repo->findbyId($id);

        echo $twig->render('employee.show.html.twig', ['employee' => $entity]);
    }

    public function showAll(): void
    {
        $repo = new EmployeeRepository();
        $loader = new \Twig\Loader\FilesystemLoader('../templates/employee');
        $twig = new \Twig\Environment($loader);

        $entity = $repo->findAll();

        echo $twig->render('employee.showAll.html.twig', ['employees' => $entity]);
    }

    public function create(): void
    {
        $loader = new \Twig\Loader\FilesystemLoader('../templates/employee');
        $twig = new \Twig\Environment($loader);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $repo = new EmployeeRepository();
            $newEmployee = new Employee();
            $newEmployee->setFirstname($_POST['firstName']);
            $newEmployee->setLastname($_POST['lastName']);
            $entity = $repo->create($newEmployee);

            echo $twig->render('employee.show.html.twig', ['employee' => $entity]);
        }
        else {
            echo $twig->render('employee.form.html.twig');
        }
    }

    public function update(int $id): void
    {
        $repo = new EmployeeRepository();
        $loader = new \Twig\Loader\FilesystemLoader('../templates/employee');
        $twig = new \Twig\Environment($loader);

        $entity = $repo->findbyId($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $entity->setFirstname($_POST['firstName']);
            $entity->setLastname($_POST['lastName']);

            $repo->update($entity);

            echo $twig->render('employee.show.html.twig', ['employee' => $entity]);
        }
        else {
            echo $twig->render('employee.form.html.twig', ['employee' => $entity]);
        }
    }

    public function delete(int $id): void
    {
        $repo = new EmployeeRepository();
        $loader = new \Twig\Loader\FilesystemLoader('../templates/employee');
        $twig = new \Twig\Environment($loader);

        $entity = $repo->findbyId($id);
        $repo->delete($id);

        echo $twig->render('employee.delete.html.twig', ['employee' => $entity]);
    }
}