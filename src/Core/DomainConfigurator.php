<?php

namespace App\Core;

use App\DTO\HeaderInformation;
use App\Entity\Domain;
use App\Entity\DomainInformation;
use App\Repository\DomainRepository;

final class DomainConfigurator
{
    private string $domain;

    private DomainRepository $domainRepository;

    private HeaderInformation $header;

    public function __construct(DomainRepository  $domainRepository, string $domain)
    {
        $this->domain = $domain;
        $this->domainRepository = $domainRepository;

        /** @var Domain $domainClass */
        $domainClass = $this->domainRepository->findOneBy(['domainName' => $domain]);
        if (null === $domainClass) {
            throw new \Exception('Domain not found');
        }
        if (null === $domainClass->getDomainInformation()) {
            throw new \Exception('DomainInformation not found');
        }
        $domainInformation = $domainClass->getDomainInformation();

        $this->header = new HeaderInformation(
            $domainClass->getWebsiteName(),
            $domainInformation->getLogo(),
            $domainInformation->getLogoWidth(),
            $domainInformation->getHeaderBackgroundColor(),
            $domainInformation->getHeaderTextColor()
        );
    }

    public function getHeader(): HeaderInformation
    {
        return $this->header;
    }
}