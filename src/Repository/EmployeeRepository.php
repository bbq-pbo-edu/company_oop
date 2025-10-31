<?php

class EmployeeRepository extends AbstractRepository
{

    public function findAll(): array
    {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare("SELECT * FROM employee");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Employee');
    }

    public function findById(int $id): array
    {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare("SELECT * FROM employee WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Employee');
    }

    public function create(Employee $employee): bool
    {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare("INSERT INTO employee (firstName, lastName) VALUES (:firstName, :lastName)");

        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $stmt->bindParam(":firstName", $firstName);
        $stmt->bindParam(":lastName", $lastName);

        return $stmt->execute();
    }

    public function update(Employee $employee): bool
    {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare("UPDATE employee SET firstName = :firstName, lastName = :lastName WHERE id = :id");

        $id = $employee->getId();
        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":firstName", $firstName);
        $stmt->bindParam(":lastName", $lastName);

        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $conn = $this->dbConnect();
        $stmt = $conn->prepare("DELETE FROM employee WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}