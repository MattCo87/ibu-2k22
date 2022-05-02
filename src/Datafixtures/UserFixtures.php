<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\UserRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{

    private UserPasswordEncoderInterface $hasher;

    public function __construct(UserPasswordEncoderInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $tabuser = [];
        $tabuser = [
            ["87700a@gmail.com", "ROLE_ADMIN", "Matthieu87"],
        ];
        
        foreach ($tabuser as list($email, $role, $pwd)) {
            $user = new User();
            //$password = $this->hasher->hashPassword($user, $pwd);
            $user
                ->setEmail($email)
                ->setRoles([$role])
                ->setPassword($this->hasher->encodePassword($user, $pwd));
            $manager->persist($user);
        }
        unset($tabuser, $email, $role, $pwd);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
