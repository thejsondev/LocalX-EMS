<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "employee_id", type: "string", length: 255, unique: true, nullable: true)]
    private ?string $employeeId = null;

    #[ORM\Column(name: "user_name", type: "string", length: 255, nullable: true)]   
    private ?string $userName = null;

    #[ORM\Column(name: "name_prefix", type: "string", length: 255, nullable: true)]   
    private ?string $namePrefix = null;

    #[ORM\Column(name: "first_name", type: "string", length: 255, nullable: true)]   
    private ?string $firstName = null;

    #[ORM\Column(name: "middle_initial", type: "string", length: 255, nullable: true)]
    private ?string $middleInitial = null;

    #[ORM\Column(name: "last_name", type: "string", length: 255, nullable: true)]   
    private ?string $lastName = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]   
    private ?string $gender = null;

    #[ORM\Column(name: "email", type: "string", length: 255, nullable: true)]   
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(name: "date_of_birth", type: "string", nullable: true)]   
    private ?string $dateOfBirth = null;

    #[ORM\Column(name: "time_of_birth", type: "string", nullable: true)]   
    private ?string $timeOfBirth = null;

    #[ORM\Column(name: "age_in_years", type: "float", nullable: true)]   
    #[Assert\Type("float")]
    private ?float $ageInYears = null;

    #[ORM\Column(name: "date_of_joining", type: "string", nullable: true)]   
    private ?string $dateOfJoining = null;

    #[ORM\Column(name: "age_in_company_years", type: "float", nullable: true)]   
    #[Assert\Type("float")]
    private ?float $ageInCompanyYears = null;

    #[ORM\Column(name: "phone_no", type: "string", length: 255, nullable: true)]   
    private ?string $phoneNo = null;

    #[ORM\Column(name: "place_name", type: "string", length: 255, nullable: true)]   
    private ?string $placeName = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]   
    private ?string $county = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]   
    private ?string $city = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]   
    private ?string $zip = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]   
    private ?string $region = null;

    // Getters and setters for each property

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    public function setEmployeeId(?string $employeeId): self
    {
        $this->employeeId = $employeeId;
        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    public function getNamePrefix(): ?string
    {
        return $this->namePrefix;
    }

    public function setNamePrefix(?string $namePrefix): self
    {
        $this->namePrefix = $namePrefix;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getMiddleInitial(): ?string
    {
        return $this->middleInitial;
    }

    public function setMiddleInitial(?string $middleInitial): self
    {
        $this->middleInitial = $middleInitial;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getTimeOfBirth(): ?string
    {
        return $this->timeOfBirth;
    }

    public function setTimeOfBirth(?string $timeOfBirth): self
    {
        $this->timeOfBirth = $timeOfBirth;
        return $this;
    }

    public function getAgeInYears(): ?float
    {
        return $this->ageInYears;
    }

    public function setAgeInYears(?float $ageInYears): self
    {
        $this->ageInYears = $ageInYears;
        return $this;
    }

    public function getDateOfJoining(): ?string
    {
        return $this->dateOfJoining;
    }

    public function setDateOfJoining(?string $dateOfJoining): self
    {
        $this->dateOfJoining = $dateOfJoining;
        return $this;
    }

    public function getAgeInCompanyYears(): ?float
    {
        return $this->ageInCompanyYears;
    }

    public function setAgeInCompanyYears(?float $ageInCompanyYears): self
    {
        $this->ageInCompanyYears = $ageInCompanyYears;
        return $this;
    }

    public function getPhoneNo(): ?string
    {
        return $this->phoneNo;
    }

    public function setPhoneNo(?string $phoneNo): self
    {
        $this->phoneNo = $phoneNo;
        return $this;
    }

    public function getPlaceName(): ?string
    {
        return $this->placeName;
    }

    public function setPlaceName(?string $placeName): self
    {
        $this->placeName = $placeName;
        return $this;
    }

    public function getCounty(): ?string
    {
        return $this->county;
    }

    public function setCounty(?string $county): self
    {
        $this->county = $county;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;
        return $this;
    }
}
?>
