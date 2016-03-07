<?php
/**
* Controlador register para el bundle StareStore
*
* PHP version 5.6
*
* @category Controller
* @package  StareStoreBundle/Controller
* @author   Autor original <dacaslles@github.com>
* @license  http://www.php.net/license/3_01.txt  PHP License 3.01
* @link     http://github.com/dacaslles/Analisis2_Proyecto
*/
namespace Acme\Bundle\StareStoreBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\Bundle\StareStoreBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

/**
* Controlador register para el bundle StareStore
*
* PHP version 5.6
*
* @category Controller
* @package  StareStoreBundle/Controller
* @author   Autor original <dacaslles@github.com>
* @license  http://www.php.net/license/3_01.txt  PHP License 3.01
* @link     http://github.com/dacaslles/Analisis2_Proyecto
*/
class RegisterController extends Controller
{
    /**
    * Muestra la pagina de registro para el usuario
    *
    * @return html formulario de registro para usuario
    */
    public function registerAction()
    {
        $contenido = $this->renderView('AcmeBundleStareStoreBundle:register.html.twig');
        return new Response($contenido);
    }

    /**
    * Agrega un nuevo usuario a la BD
    * 
    * @param request $request Contiene el request POST 
    *
    * @return html pagina de confirmacion para el sign in
    */
    public function userAction(Request $request)
    {
        /*$usuario = new Usuario();
        $datos = array("usuario" => "nuevo usuario") ;
        $form = $this->createFormBuilder($datos)
        ->add('nombre',TextType::class)
        ->add('apellido',TextType::class)
        ->add('correo',TextType::class)
        ->add('telefono',TextType::class)
        ->add('nacimiento',DateType::class)
        ->add('password',PasswordType::class)
        ->getForm();

        $form->handleRequest($request);
        /*
        if($form->isSubmitted() && $form->isValid()){
        return new Response('<html><body>Submitted!</body></html>');
        }
        */
        $usuario = new Usuario();

        $usuario->setNombre($request->request->get('nombre'));
        $usuario->setApellido($request->request->get('apellido'));
        $usuario->setCorreo($request->request->get('correo'));
        $usuario->setTelefono($request->request->get('telefono'));
        $usuario->setFechanacimiento(new \DateTime($request->request->get('nacimiento')));
        $usuario->setPassword($request->request->get('password'));
        $usuario->setIdTipousuario(3);

        $em = $this->getDoctrine()->getManager();
        $em->persist($usuario);
        $em->flush();

        return new Response('<html><body>Registro completado!</br> </body></html>');
    }
}
