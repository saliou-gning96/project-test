<?php

namespace App\Infrastructure\DataFixtures;

use App\Infrastructure\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $hasher)
    {}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@admin.fr');
        $user->setPassword($this->hasher->hashPassword($user, 'passer_2022'));

        $manager->persist($user);
        $manager->flush();
    }
}
