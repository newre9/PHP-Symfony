<?php

namespace App\Repository\Admin;

use App\Entity\Admin\image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method image|null find($id, $lockMode = null, $lockVersion = null)
 * @method image|null findOneBy(array $criteria, array $orderBy = null)
 * @method image[]    findAll()
 * @method image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class imageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, image::class);
    }

    // /**
    //  * @return image[] Returns an array of image objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?image
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
