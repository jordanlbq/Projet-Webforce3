<?php

namespace App\Repository;

use App\Entity\Definition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Definition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Definition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Definition[]    findAll()
 * @method Definition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DefinitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Definition::class);
    }





	/**
	* @return Definition[] Returns an array of Produit objects
	* Fonction pour récupérer toutes les catégories
	*/
    public function findAllBySearch($term){
		
		$term = '%' . $term . '%';
		// ex : blanche ---> %blanche%
		
		$builder = $this -> createQueryBuilder('d');
		return $builder 
			-> select('d')
			-> where('d.terme LIKE :term')
			-> setParameter(':term', $term)
			-> getQuery() -> getResult();
    }
    /**
	* @return Definition[] Returns an array of Produit objects
	* Fonction pour récupérer toutes les catégories
	*/
    public function findAllVideo(){
		
		
		$builder = $this -> createQueryBuilder('d');
		return $builder 
        -> select('p')
        -> distinct(true)
        -> orderBy('p', 'ASC');
	}
    
    
    // /**
    //  * @return Definition[] Returns an array of Definition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Definition
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
