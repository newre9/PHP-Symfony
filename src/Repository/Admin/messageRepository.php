<?php

namespace App\Repository\Admin;

use App\Entity\Admin\message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method message|null find($id, $lockMode = null, $lockVersion = null)
 * @method message|null findOneBy(array $criteria, array $orderBy = null)
 * @method message[]    findAll()
 * @method message[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class messageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, message::class);
    }

    // /**
    //  * @return message[] Returns an array of message objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?message
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
