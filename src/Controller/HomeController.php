<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuestionType::class, new Question());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $entityManager->persist($task);
            $entityManager->flush();

            $form = $this->createForm(QuestionType::class, new Question());

            return $this->render(
                'home/index.html.twig',
                [
                    'form' => $form,
                    'message' => 'Köszönjük szépen a kérdésedet.
Válaszunkkal hamarosan keresünk a megadott e-mail címen.',
                ]
            );
        }

        return $this->render(
            'home/index.html.twig',
            [
                'form' => $form,
            ]
        );
    }
}
