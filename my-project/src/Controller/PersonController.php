<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\PersonService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp;

class PersonController extends AbstractController
{
    /**
     * @var [PersonService]
     */
    private $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function createPerson(Request $request)
    {
        $personData = json_decode(
            $request->getContent(),
            true
        );

        $person = $this->personService->createPerson(
            array('name'=> $personData['name'],
                  'age'=> $personData['age'])
        );
        

        if ($person->getName() === 'Erro') {
            return new Response(
                '<html>
                    <body> Error Person not created </body>
                </html>',
                500
            );
        }
        return new Response(
            '<html>
                <body>' . $person->toString() . '</body>
            </html>',
            201
        );
    }
}
