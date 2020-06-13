<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Comentarios;
use App\Entity\Posts;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{           
     /**
     * @Route("/", name="dashboard1")
     */
    public function dashboard1(PaginatorInterface $paginator, Request $request){
               
            $em = $this->getDoctrine()->getManager();
            $query = $em->getRepository(Posts::class)->BuscarTodosLosPosts();
            $user = $this->getUser(); //OBTENGO AL USUARIO ACTUALMENTE LOGUEADO
            if($user){
                $comentarios = $em->getRepository(Comentarios::class)->BuscarComentarios($user->getid()); // Consulto los comentarios con el ID del usuario actualmente logueado
                $pagination = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                2 /*limit per page*/
            );
            
            return $this->render('dashboard/dashboard1.html.twig', [
                'pagination' => $pagination,
                'comentarios'=>$comentarios
            ]);
            }else{
                $pagination = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                2 /*limit per page*/
            );
            }    
            return $this->render('dashboard/dashboard1.html.twig', [
                'pagination' => $pagination
                
            ]);
        }
           
            
       

    
}
