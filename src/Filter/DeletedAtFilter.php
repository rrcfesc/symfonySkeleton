<?php

namespace App\Filter;

use Doctrine\ORM\Mapping\ClassMetaData;
use Doctrine\ORM\Query\Filter\SQLFilter;
use Doctrine\Common\Annotations\Reader;
use App\InterfacesFilter\DeletedAtFilter as InterfaceFilter;
use ReflectionException;

class DeletedAtFilter extends SQLFilter
{
    protected Reader $reader;

    public function setAnnotationReader(Reader $reader): void
    {
        $this->reader = $reader;
    }

    /**
     * @throws ReflectionException
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if (empty($this->reader)) {
            return '';
        }

        $deletedAtAware = "";
        // The Doctrine filter is called for any query on any entity
        // Check if the current entity is "deletedAtFilter Interface" (marked)
        $reflection = $targetEntity->getReflectionClass();
        $interfaces = $reflection->getInterfaceNames();
        $exists = $reflection->hasMethod('getDeletedAtFilter');
        if ($exists && in_array(InterfaceFilter::class, $interfaces)) {
            $method = $reflection->getMethod('getDeletedAtFilter');
            $deletedAtAware = $method->invoke(null, null, null);
        }

        if (!$deletedAtAware) {
            return '';
        }

        $fieldName = $deletedAtAware;

        if (empty($fieldName)) {
            return '';
        }

        $query = "";
        if (is_array($fieldName)) {
            foreach ($fieldName as $item) {
                $query .= sprintf('%s.%s IS NULL AND ', $targetTableAlias, $item);
            }

            $query = (strlen($query) > 0) ? substr($query, 0, (strlen($query) - 4)) : "";
        } else {
            $query = sprintf('%s.%s IS NULL ', $targetTableAlias, $fieldName);
        }

        return $query;
    }

}
