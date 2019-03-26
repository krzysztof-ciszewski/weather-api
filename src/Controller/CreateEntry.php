<?php

namespace App\Controller;

use App\Factory\Entity\EntryFactoryInterface;
use App\Factory\Response\EntryFactoryInterface as EntryResponseFactoryInterface;
use App\Model\Request\NewEntry;
use App\Persister\EntryPersisterInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class CreateEntry extends AbstractFOSRestController
{
    /**
     * @var EntryFactoryInterface
     */
    private $entryEntityFactory;

    /**
     * @var EntryPersisterInterface
     */
    private $persister;

    /**
     * @var EntryResponseFactoryInterface
     */
    private $entryResponseFactory;

    public function __construct(
        EntryFactoryInterface $entryEntityFactory,
        EntryPersisterInterface $persister,
        EntryResponseFactoryInterface $entryResponseFactory
    ) {
        $this->entryEntityFactory = $entryEntityFactory;
        $this->persister = $persister;
        $this->entryResponseFactory = $entryResponseFactory;
    }

    /**
     * @ParamConverter("newEntry", converter="fos_rest.request_body")
     *
     * @param NewEntry                         $newEntry
     * @param ConstraintViolationListInterface $validationErrors
     *
     * @return Response
     */
    public function __invoke(NewEntry $newEntry, ConstraintViolationListInterface $validationErrors): Response
    {
        if ($validationErrors->count() > 0) {
            return $this->handleView($this->view($validationErrors));
        }

        $entity = $this->entryEntityFactory->create($newEntry);
        $this->persister->save($entity);

        return $this->handleView(
            $this->view(
                $this->entryResponseFactory->create($entity),
                Response::HTTP_CREATED
            )
        );
    }
}
