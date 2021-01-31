<?php

namespace App\Filter;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Annotations\Reader;

final class DeletedAtConfigurator
{
    protected EntityManagerInterface $em;

    protected Reader $reader;

    public function __construct(EntityManagerInterface $em, Reader $reader)
    {
        $this->em = $em;
        $this->reader = $reader;
    }

    public function onKernelRequest(): void
    {
        $filter = $this->em->getFilters()->enable('deleted_at_filter');
        $filter->setAnnotationReader($this->reader);
    }
}
