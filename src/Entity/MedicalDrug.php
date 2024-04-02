<?php

namespace Unmainsys\HealthKick\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

##[ORM\Table(name: 'to-be-updated')]
#[ORM\Entity]
#[ApiResource]
class MedicalDrug
{
    use DictionaryTrait;
}