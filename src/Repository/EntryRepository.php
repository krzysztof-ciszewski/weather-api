<?php

namespace App\Repository;

use App\Entity\EntityInterface;
use App\Entity\Entry;
use App\Model\Response\EntryPage;
use App\Persister\EntryPersisterInterface;
use App\Provider\EntryPageProviderInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

//TODO: Write functional tests
class EntryRepository extends ServiceEntityRepository implements EntryPersisterInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entry::class);
    }

    public function save(Entry $entry): void
    {
        $this->getEntityManager()->persist($entry);
        $this->getEntityManager()->flush($entry);
    }

    /**
     * @param int $page
     * @param int $pageSize
     *
     * @return Entry[]
     */
    public function getPage(int $page, int $pageSize): array
    {
        $qb = $this->createQueryBuilder('e')
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->orderBy('e.id', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function getTotal(): int
    {
        return $this->count([]);
    }
}
