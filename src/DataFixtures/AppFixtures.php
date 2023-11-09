<?php


namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Task;
use App\Entity\Category;

class AppFixtures extends Fixture
{

    public function __construct()
    {
    }

    public function load(ObjectManager $manager)
    {
        // Create a user with ROLE_USER
        $user = new User();
        $user->setEmail('user@example.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('$2y$13$pS37vJF2jrC0ngUC1bH56OOEaibJ.gBBAJjlrSclEZNY2c8Xnsubm');  // 'useruser' hashed 
        $manager->persist($user);

        // Create an admin user with ROLE_ADMIN
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setRoles(['ROLE_USER','ROLE_ADMIN']);
        $admin->setPassword('$2y$13$4TM/Kqmuy3/jbeibS5e1WuXrv1S9JmZGDJUDmtUk3Gn1TMWWlPTpy');  // 'adminadmin' hashed
        $manager->persist($admin);

        // Création de deux catégories
        $category1 = new Category();
        $category1->setCreator($user);
        $category1->setName('Travail');
        $category1->setCreationDate(new \DateTime());
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setCreator($admin);
        $category2->setName('Loisirs');
        $category2->setCreationDate(new \DateTime());
        $manager->persist($category2);

        // Création de deux tâches
        $task1 = new Task();
        $task1->setCreator($user);
        $task1->setTitle('Rédiger le rapport');
        $task1->setDescription('Préparer un rapport sur le projet XYZ');
        $task1->setCreationDate(new \DateTime());
        $task1->addCategory($category1);
        $manager->persist($task1);

        $task2 = new Task();
        $task2->setCreator($admin);
        $task2->setTitle('Sortir avec les amis');
        $task2->setDescription('Organiser une sortie avec les amis ce week-end');
        $task2->setCreationDate(new \DateTime());
        $task2->addCategory($category2);
        $manager->persist($task2);

        $task3 = new Task();
        $task3->setCreator($admin);
        $task3->setTitle('Faire les courses');
        $task3->setDescription('Acheter du pain, du lait et des oeufs');
        $task3->setCreationDate(new \DateTime());
        $task3->addCategory($category2);
        $manager->persist($task3);

        $task4 = new Task();
        $task4->setCreator($user);
        $task4->setTitle('Faire mon CV');
        $task4->setDescription('Mettre à jour mon CV');
        $task4->setCreationDate(new \DateTime());
        $task4->addCategory($category1);
        $manager->persist($task4);


        $manager->flush();
    }
}
