<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * Inscription de l'utilisateur en utilisant les données envoyées au format JSON
     * @Route("/inscription", name="app_security_inscription")
     */
    public function inscription(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $manager): JsonResponse
    {
        $userDatas = json_decode($request->getContent(), true);
        // dd($userDatas["pseudo"]);

        $user = new User();
        $user->setPseudo($userDatas["pseudo"])
            ->setEmail($userDatas["email"])
            ->setPassword($passwordHasher->hashPassword($user, $userDatas["password"]));

        dd($user);
        $manager->persist($user);
        $manager->flush();
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SecurityController.php',
        ]);
    }
}
