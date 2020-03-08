<?php declare(strict_types=1);

namespace NextCv\Modules\Resume\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use NextCv\Modules\Resume\Entity\Resume;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @method Resume|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resume|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resume[]    findAll()
 * @method Resume[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResumeRepository extends ServiceEntityRepository
{
    private $manager;
    private $serializer;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager, SerializerInterface $serializer)
    {
        parent::__construct($registry, Resume::class);
        $this->manager = $manager;
        $this->serializer = $serializer;
    }

    /**
     * @return Resume[] Returns an array of Resume objects
     */
    public function findAllDql()
    {
        $dql = <<<DQL
            SELECT resume FROM NextCv\Modules\Resume\Entity\Resume resume
            DQL;

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

    public function store(array $data)
    {
        $resume = $this->serializer->denormalize($data, Resume::class);
        $this->manager->persist($resume);
        $this->manager->flush();
    }

    // /**
    //  * @return Resume[] Returns an array of Resume objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Resume
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
