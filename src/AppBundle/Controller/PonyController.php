<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializationContext;

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
            $data = $this->get('jms_serializer')->serialize($ponies, 'json', SerializationContext::create()->setGroups(array('listing')));
        
            return new JsonResponse($data, 200, [], true);
        
        }  
    }
    
    
    /**
        * @Route("/pony/{id}", name="apony")
        * @Method({"GET"})
        */
        public function getPonyAction($id) {
           $pony = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Pony')
                ->findOneById($id);

            if (empty($pony)) {
                return new JsonResponse(['message' => 'Aucun poney correspondant'], Response::HTTP_NOT_FOUND);
            } else {
                $data = $this->get('jms_serializer')->serialize($pony, 'json', SerializationContext::create()->setGroups(array('details')));
        
                return new JsonResponse($data, 200, [], true);
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
        
//CREATE
    /**
        * @Route("pony")
        * @Method("POST")
        */
        public function newponyAction(Request $request) {
            $pony = $this->datasToPony($request) ;
            
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($pony);
            $em->flush();
            
            return new JsonResponse(['message' => 'Le poney est censé être ajouté']);
        }
 
//UPDATE (total)
    /**
    * @Route("/pony/{id}")
    * @Method({"PUT"})
    */
    public function editPonyAction($id, Request $request) {
            
        $pony = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Pony')
            ->find($id);
            /* @var $pony Pony */

            if (empty($pony)) {
                
                return new JsonResponse(['message' => 'Aucun poney correspondant'], Response::HTTP_NOT_FOUND);
                
            } else {
                $pony = $this->datasToPony($request, $id) ;
                
                $em = $this->get('doctrine.orm.entity_manager');
                $em->merge($pony);
                $em->flush();
                
                return new JsonResponse(['message' => 'Le poney est censé être modifié']);
            }
         
        }    
        
        
        
//PRIVATE FUNCTIONS
    
    private function datasToPony(Request $request, int $id = null):Pony {
        //on crée une nouvelle instance vide
        $pony = new Pony() ;
            
        //on l'hydrate
        $pony->setName($request->get('name'))
                ->setFamily($request->get('family'))
                ->setImgpony($request->get('imgpony'))
                ->setType($request->get('type'))
                ->setJob($request->get('job'))
                ->setCutiemark($request->get('cutiemark'))
                ->setImgcutiemark($request->get('imgcutiemark'))
                ->setBody($request->get('body'))
                ->setMane($request->get('mane'))
                ->setEyes($request->get('eyes'))
                ->setAntagonist($request->get('antagonist'))
                ->setOther($request->get('other')) ;
        
        if($id != null) {
            $pony->setId($id) ;
        }

        return $pony ;
    }
    
}