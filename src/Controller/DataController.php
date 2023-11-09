<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DataImportType;
use App\Entity\Category;
use App\Entity\Task;


/*
JSON FORMAT :

{
    "categories": [
        {
        "name": "Tâches ménagères",
        "tasks" : [
            {
                "title" : "Ranger la chambre",
                "description" : "Il faudrait le faire avant 16h"
            },
            {
                "title" : "Ranger le garage",
                "description" : "nettoyer la voiture + la trot"
            }...
            ]
        }...
    ]
    }
*/

class DataController extends AbstractController
{
    #[Route('/data', name: 'app_data')]
    public function index(): Response
    {
        return $this->render('data/index.html.twig', [
            'controller_name' => 'DataController',
        ]);
    }

    #[Route('/data/import', name: 'app_data_import', methods: ['GET', 'POST'])]
    public function import(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DataImportType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // get JSON_file from form
            $file = $form->get('JSON_file')->getData();
            // get JSON_file content
            $json = file_get_contents($file);
            // decode JSON file
            $data = json_decode($json, true);


            // get current user
            $user = $this->getUser();

            // get categories from JSON file
            $categories = $data['categories'];

            // for each category
            foreach ($categories as $category) {
                $newCategory = new Category();
                $newCategory->setName($category['name']);
                $newCategory->setCreationDate(new \DateTime());
                $newCategory->setCreator($user);
                $entityManager->persist($newCategory);
               

                // get tasks from JSON file
                $tasks = $category['tasks'];

                // for each task
                foreach ($tasks as $task) {
                    $newTask = new Task();
                    $newTask->setTitle($task['title']);
                    $newTask->setDescription($task['description']);
                    $newTask->setCreationDate(new \DateTime());
                    $newTask->setCreator($user);
                    $newTask->addCategory($newCategory);
                    $entityManager->persist($newTask);
                }
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_data', [], Response::HTTP_SEE_OTHER);
            
        }
        return $this->render('data/import.html.twig', [
            'form' => $form->createView(),
        ]);

    }


    #[Route('/data/export', name: 'app_data_export')]
    public function export(EntityManagerInterface $entityManager): JsonResponse
    {
        $categories = $entityManager->getRepository(Category::class)->findAllByUser($this->getUser());
    
        $exportedData = [
            'categories' => [],
        ];
    
        foreach ($categories as $category) {
            $exportedCategory = [
                'name' => $category->getName(),
                'tasks' => [],
            ];
    
            foreach ($category->getTasks() as $task) {
                $exportedCategory['tasks'][] = [
                    'title' => $task->getTitle(),
                    'description' => $task->getDescription(),
                ];
            }
    
            $exportedData['categories'][] = $exportedCategory;
        }
    
        $jsonData = json_encode($exportedData);
    
        return new JsonResponse($jsonData, 200, [], true);
    }
}
