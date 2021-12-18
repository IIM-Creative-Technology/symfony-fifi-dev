<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    /** @var UserPasswordHasherInterface */
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $a =1;
        for ($i=1;$i<=11;$i++) {
            $user = new User();
            $json = file_get_contents("https://superheroapi.com/api/1247856435693245/".$a);
            $data= json_decode($json, TRUE);
            $user->setusername($data["name"]);
            if ($data["id"] = 5){
                $user->setRoles(['ROLE_SUPER_HERO']);

            }else{
                $user->setRoles(['ROLE_ADMIN']);
            }
            $user->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));
           // $user->setIntelligence($data["powerstats"]["intelligence"]);
            //$user->setStrength($data["powerstats"]["strength"]);
           // $user->setSpeed($data["powerstats"]["speed"]);
            //$user->setDurability($data["powerstats"]["durability"]);
           // $user->setPower($data["powerstats"]["power"]);
           // $user->setCombat($data["powerstats"]["combat"]);
            $user->setImage($data["image"]["url"]);
            $a = $a +1;
            $manager->persist($user);
        }





        $manager->flush();
    }
}