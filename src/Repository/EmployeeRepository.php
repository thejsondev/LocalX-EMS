<?php

namespace App\Repository;

use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employee>
 */
class EmployeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    /**
     * Fetch all employees
     *
     * @return Employee[]
     */
    public function findAllEmployees(): array
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find an employee by ID
     *
     * @param int $id
     * @return Employee|null
     */
    public function findEmployeeById(int $id): ?Employee
    {
        return $this->createQueryBuilder('e')
            ->where('e.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Batch insert employees
     *
     * @param Employee[] $employees
     * @return void
     */
    public function batchInsert(array $employees): void
    {
        $entityManager = $this->getEntityManager();
        foreach ($employees as $employee) {
            $entityManager->persist($employee);
        }
        $entityManager->flush();
    }

    /**
     * Delete an employee by ID
     *
     * @param int $id
     * @return void
     */
    public function deleteEmployeeById(int $id): void
    {
        $employee = $this->find($id);
        if ($employee) {
            $entityManager = $this->getEntityManager();
            $entityManager->remove($employee);
            $entityManager->flush();
        }
    }
}

?>
