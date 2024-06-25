<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/api/employee")
 */
class EmployeeController extends AbstractController
{
    /**
     * Prepare API response object.
     *
     * @param bool $success Whether the operation was successful.
     * @param string $message Response message.
     * @param mixed $data Response data.
     * @param int $statusCode HTTP status code (default: 200 OK).
     * @return JsonResponse
     */
    private function prepareResponse(bool $success, string $message, $data = null, int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return $this->json([
            'success' => $success,
            'message' => $message,
            'response' => $data,
        ], $statusCode);
    }

    /**
     * @Route("/", name="employee_index", methods={"GET"})
     */
    public function index(EmployeeRepository $employeeRepository): JsonResponse
    {
        try {
            $employees = $employeeRepository->findAllEmployees();

            if (empty($employees)) {
                return $this->prepareResponse(true, 'No employees found', null, Response::HTTP_NOT_FOUND);
            }

            return $this->prepareResponse(true, 'Employees retrieved successfully', $employees);
        } catch (\Exception $e) {
            return $this->prepareResponse(false, 'Failed to retrieve employees', null, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @Route("/{id}", name="employee_show", methods={"GET"})
     */
    public function show(Employee $employee): JsonResponse
    {
        if (!$employee) {
            return $this->prepareResponse(false, 'Employee not found', null, Response::HTTP_NOT_FOUND);
        }

        return $this->prepareResponse(true, 'Employee retrieved successfully', $employee);
    }

    /**
     * @Route("/", name="employee_create", methods={"POST"})
     */
    public function create(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, EmployeeRepository $employeeRepository): JsonResponse
{
    $contentType = $request->headers->get('Content-Type');
    
    if ($contentType !== 'text/csv') {
        return $this->prepareResponse(false, 'Unsupported content type', null, Response::HTTP_BAD_REQUEST);
    }

    try {
        $csvContent = $request->getContent();

        $serializer = new \Symfony\Component\Serializer\Serializer([new ObjectNormalizer()], [new CsvEncoder()]);

        // Decode CSV content with header row as keys
        $employees = $serializer->decode($csvContent, 'csv', ['as_collection' => true]);

        // Function to trim keys of an array
        function trimArrayKeys($array) {
            $trimmedArray = [];
            foreach ($array as $key => $value) {
                $trimmedKey = trim($key);
                $trimmedArray[$trimmedKey] = $value;
            }
            return $trimmedArray;
        }

        $validEmployees = [];
        $seenEmployeeIds = []; // To track seen employee_ids

        foreach ($employees as $employeeData) {
            // Trim only the keys (headers) of the employee data
            $employeeData = trimArrayKeys($employeeData);

            // Check for duplicate employee_id
            $employeeId = $employeeData['Emp ID'];
            if (in_array($employeeId, $seenEmployeeIds)) {
                // Skip duplicate employee_id
                continue;
            }
            $seenEmployeeIds[] = $employeeId; // Add current employee_id to seen list

            $employee = new Employee();
            // Map CSV data to Employee entity properties
            $employee->setEmployeeId($employeeData['Emp ID']);
            $employee->setUserName($employeeData['User Name']);
            $employee->setNamePrefix($employeeData['Name Prefix']);
            $employee->setFirstName($employeeData['First Name']);
            $employee->setMiddleInitial($employeeData['Middle Initial']);
            $employee->setLastName($employeeData['Last Name']);
            $employee->setGender($employeeData['Gender']);
            $employee->setEmail($employeeData['E Mail']);
            $employee->setDateOfBirth($employeeData['Date of Birth']);
            $employee->setTimeOfBirth($employeeData['Time of Birth']);
            $employee->setAgeInYears(floatval($employeeData['Age in Yrs']));
            $employee->setDateOfJoining($employeeData['Date of Joining']);
            $employee->setAgeInCompanyYears(floatval($employeeData['Age in Company (Years)']));
            $employee->setPlaceName($employeeData['Place Name']);
            $employee->setCounty($employeeData['County']);
            $employee->setCity($employeeData['City']);
            $employee->setZip($employeeData['Zip']);
            $employee->setRegion($employeeData['Region']);

            // Handle Phone No field
            if (is_array($employeeData['Phone No'])) {
                // Convert array to string (e.g., join with comma)
                $employeeData['Phone No'] = implode(', ', $employeeData['Phone No']);
            }
            $employee->setPhoneNo($employeeData['Phone No']);

            $errors = $validator->validate($employee);
            if (count($errors) > 0) {
                // Handle validation errors
                return $this->prepareResponse(false, 'Validation error', (string) $errors, Response::HTTP_BAD_REQUEST);
            }

            $validEmployees[] = $employee;
        }

        // Batch insert valid employees
        $employeeRepository->batchInsert($validEmployees);

        return $this->prepareResponse(true, 'Employees imported successfully', null, Response::HTTP_CREATED);
    } catch (\Exception $e) {
        return $this->prepareResponse(false, 'An error occurred', $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    


    /**
     * @Route("/{id}", name="employee_delete", methods={"DELETE"})
     */
    public function delete(Employee $employee, EmployeeRepository $employeeRepository): JsonResponse
    {
        if (!$employee) {
            return $this->prepareResponse(false, 'Employee not found', null, Response::HTTP_NOT_FOUND);
        }

        $employeeRepository->deleteEmployeeById($employee->getId());

        return $this->prepareResponse(true, 'Employee deleted successfully', null, Response::HTTP_NO_CONTENT);
    }
}

?>
