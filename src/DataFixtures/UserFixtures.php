<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher) {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Utilisateur 'user' avec le rôle ROLE_USER
        $user = new User();
        $user->setEmail("user@example.com");
        $user->setIsVerified(true);
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "user"));
        $manager->persist($user);

        // Utilisateur 'admin' avec le rôle ROLE_ADMIN
        $admin = new User();
        $admin->setEmail("admin@example.com");
        $admin->setIsVerified(true);
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->userPasswordHasher->hashPassword($admin, "admin"));
        $manager->persist($admin);

        // Utilisateur 'superadmin' avec le rôle ROLE_SUPER_ADMIN
        $superadmin = new User();
        $superadmin->setEmail("superadmin@example.com");
        $superadmin->setIsVerified(true);
        $superadmin->setRoles(['ROLE_SUPER_ADMIN']);
        $superadmin->setPassword($this->userPasswordHasher->hashPassword($superadmin, "superadmin"));
        $manager->persist($superadmin);

        $manager->flush();
    }
}
