<?php

namespace App\Repository;

use App\Entity\MandatoryItemTrip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MandatoryItemTrip>
 *
 * @method MandatoryItemTrip|null find($id, $lockMode = null, $lockVersion = null)
 * @method MandatoryItemTrip|null findOneBy(array $criteria, array $orderBy = null)
 * @method MandatoryItemTrip[]    findAll()
 * @method MandatoryItemTrip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MandatoryItemTripRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MandatoryItemTrip::class);
    }

    public function save(MandatoryItemTrip $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MandatoryItemTrip $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MandatoryItemTrip[] Returns an array of MandatoryItemTrip objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MandatoryItemTrip
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
