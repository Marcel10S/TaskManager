<?php declare(strict_types=1);

namespace App\DTO\TaskRequest;

use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

class CreateTask
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 50)]
    #[Serializer\Groups(['taskCreate'])]
    public ?string $name;

    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 50)]
    #[Serializer\Groups(['taskCreate'])]
    public ?string $status;

    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 50)]
    #[Serializer\Groups(['taskCreate'])]
    public ?string $type;

    #[Assert\NotBlank]
    #[Assert\Date]
    public ?string $day;

}
