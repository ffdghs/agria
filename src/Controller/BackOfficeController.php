<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Animal;
use Doctrine\DBAL\DriverManager;
use AppBundle\Entity\MyRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BackOfficeController extends AbstractController
{
    /**
     * @Route("/back/office", name="back_office")
     */
    public function index(): Response
    {
        $connectionParams = array(
            'url' => 'mysql://root:@127.0.0.1:3306/db_agria',
            'charset' => 'UTF8'
        );
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
        
        $sql = "SELECT * FROM   INFORMATION_SCHEMA.TABLES WHERE Table_Type='BASE TABLE' AND TABLE_SCHEMA='db_agria';";

        $query = $conn->prepare($sql);
        $query->execute();

        $tables = $query->fetchAllAssociative();

        $users = $this->getDoctrine()->getRepository(User::class)->findby([],['id' => 'DESC'],3,NULL);

        // dd($tables);

        return $this->render('_backOffice/index.backoffice.html.twig', [
            'tables' => $tables,
            'users' => $users
        ]);
    }
}
