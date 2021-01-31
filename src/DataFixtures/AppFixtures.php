<?php

namespace App\DataFixtures;

use App\Entity\AdminUser;
use App\Entity\Domain;
use App\Entity\DomainInformation;
use App\Entity\DomainPage;
use App\Entity\Exhibitor;
use App\Entity\Folder;
use App\Entity\MediaUploaded;
use App\Entity\Student;
use App\Entity\WidgetPage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture implements FixtureGroupInterface
{
    /** @var UserPasswordEncoderInterface  */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new AdminUser();
        $admin->setName('rrcfesc@gmail.com');
        $admin->setPassword($this->encoder->encodePassword($admin, 'unam2010'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $student = new Student();
        $student->setName('student@mailinator.com');
        $student->setPassword($this->encoder->encodePassword($student, 'unam2010'));
        $student->setRoles(['ROLE_STUDENT']);
        $manager->persist($student);

        $exhibitor = new Exhibitor();
        $exhibitor->setName('exhibitor@mailinator.com');
        $exhibitor->setPassword($this->encoder->encodePassword($exhibitor, 'unam2010'));
        $exhibitor->setRoles(['ROLE_EXHIBITOR']);
        $manager->persist($exhibitor);

        $domain = new Domain();
        $domain->setDomainName('example.com');
        $domain->setWebsiteName('UNITEC');

        $domainInformation = new DomainInformation();
        $domainInformation->setLogo('sharedFolder/unitec.svg');
        $domainInformation->setLogoWidth(133);
        $domainInformation->setHeaderBackgroundColor('#2176bd');
        $domainInformation->setHeaderTextColor('#FFF');
        $domainInformation->setFooterCompanyName('Universidad Tecnológica de México');
        $domainInformation->setFooterAddress('Avenida Parque Chapultepec No. 56, Piso 1, Colonia El Parque. Municipio Naucalpan de Juárez, Estado de México., 53398. Laureate Education Inc.');
        $domainInformation->addDomain($domain);

        $domainPage = new DomainPage();
        $domainPage->setName('home');
        $domainPage->setDomainInformation($domainInformation);

        $widgetPage = new WidgetPage();
        $widgetPage->setPage($domainPage);
        $widgetPage->setName('slider');
        $widgetPage->setPriority(1);

        $folder = new Folder();
        $folder->setName('upload');

        $mediaUploaded = new MediaUploaded();
        $mediaUploaded->setName('banner 1');
        $mediaUploaded->setFolder($folder);
        $mediaUploaded->setFileName('1.jpg');
        $mediaUploaded->setRealFile('1.jpg');
        $mediaUploaded->setType('image');

        $mediaUploaded1 = new MediaUploaded();
        $mediaUploaded1->setName('banner 2');
        $mediaUploaded1->setFolder($folder);
        $mediaUploaded1->setFileName('2.jpg');
        $mediaUploaded1->setRealFile('2.jpg');
        $mediaUploaded1->setType('image');

        $mediaUploaded2 = new MediaUploaded();
        $mediaUploaded2->setName('banner 3');
        $mediaUploaded2->setFolder($folder);
        $mediaUploaded2->setFileName('3.jpg');
        $mediaUploaded2->setRealFile('3.jpg');
        $mediaUploaded2->setType('image');

        $manager->persist($domain);
        $manager->persist($domainInformation);
        $manager->persist($domainPage);
        $manager->persist($widgetPage);
        $manager->persist($folder);
        $manager->persist($mediaUploaded);
        $manager->persist($mediaUploaded1);
        $manager->persist($mediaUploaded2);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['users'];
    }
}
