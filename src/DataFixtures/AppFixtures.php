<?php

namespace App\DataFixtures;

use App\Entity\AdminUser;
use App\Entity\Exhibitor;
use App\Entity\Student;
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

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['users'];
    }
}
