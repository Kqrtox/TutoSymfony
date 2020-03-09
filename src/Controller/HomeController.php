<?php


namespace App\Controller;


use App\Entity\Brand;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home", requirements={"number" = "\d+"})
     * @return Response
     * @throws \Exception
     */
    public function home(Request $request, EntityManagerInterface $manager) {
        $brand = new Brand();
        $brand->setName("Asus")->setCreatedAt(new \DateTime());

        $manager->persist($brand);

        $manager->flush();

        dump($brand);

        return $this->render('pages/home.html.twig');
    }
}