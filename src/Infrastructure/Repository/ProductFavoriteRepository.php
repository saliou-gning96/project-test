<?php

namespace App\Infrastructure\Repository;

use App\Domain\Interfaces\ProductFavoriteInterface;
use App\Infrastructure\Entity\ProductFavorite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductFavorite>
 *
 * @method ProductFavorite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductFavorite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductFavorite[]    findAll()
 * @method ProductFavorite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductFavoriteRepository extends ServiceEntityRepository implements ProductFavoriteInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductFavorite::class);
    }

    public function add(ProductFavorite $entity, bool $flush = false): ProductFavorite
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }

        return $entity;
    }

    public function remove(ProductFavorite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ProductFavorite[] Returns an array of ProductFavorite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProductFavorite
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
