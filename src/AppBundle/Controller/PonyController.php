<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
//use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Pony;

class PonyController extends Controller {
//READ    
    
    /**
     * @Route("/pony/", name="ponies_list")
     * @Method({"GET"})
     */
    public function getPoniesAction() {
        $ponies = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Pony')
                ->findAll();
        /* @var $ponies Pony[] */
        
        if (empty($ponies)) {
            
                return new JsonResponse(['message' => 'Y\'a pas de poneys dans la base de données é__è !!!'], Response::HTTP_NOT_FOUND);
                
        } else {
        
            $formatted = [];

            foreach ($ponies as $pony) {
                $formatted[] = $this->formatPony($pony) ;
            }

            return new JsonResponse($formatted);
        }
    }
    
    
    /**
        * @Route("/pony/{id}", requirements={"id" = "\d+"}, name="apony")
        * @Method({"GET"})
        */
        public function getPonyAction($id) {
           $pony = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Pony')
                ->findOneById($id);

            if (empty($pony)) {
                return new JsonResponse(['message' => 'Aucun poney correspondant'], Response::HTTP_NOT_FOUND);
            } else {
                $formattedPony = $this->formatPony($pony) ;

                return new JsonResponse($formattedPony);
            }
        }
  
    
//DELETE
    /**
    * @Route("/pony/{id}")
    * @Method({"DELETE"})
    */
        public function delponyAction($id) {
            $em = $this->get('doctrine.orm.entity_manager');
            $pony = $em->getRepository('AppBundle:Pony')
                         ->find($id);
            /* @var $pony Pony */

            if (empty($pony)) {
                return new JsonResponse(['message' => 'Aucun poney correspondant'], Response::HTTP_NOT_FOUND);
            } else {
                $em->remove($pony);
                $em->flush();

                return new JsonResponse(['message' => 'Le poney est censé être supprimé']);
            }
        } 
        
        
        
        
    private function formatPony(Pony $pony):array {
        $formatted = [
                'id' => $pony->getId(),
                'name' => $pony->getName(),
                'imgpony' => $pony->getImgpony(),
                'family' => $pony->getFamily(), 
                'type' => $pony->getType(),
                'job' => $pony->getJob(),
                'cutiemark' => $pony->getCutiemark(),
                'imgcutiemark' => $pony->getImgcutiemark(),
                'body' => $pony->getBody(),
                'mane' => $pony->getMane(), 
                'eyes' => $pony->getEyes(),
                'antagonist' => $pony->getAntagonist(), 
                'other' => $pony->getOther()
            ];
        return $formatted ;
    }
}