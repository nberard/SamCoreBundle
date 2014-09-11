<?php

namespace CanalTP\SamCoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CustomerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomerRepository extends EntityRepository
{
    public function findAllToArray()
    {
        $customers = array();

        foreach ($this->findAll() as $customer) {
            $customers[$customer->getId()] = $customer->getName();
        }
        return ($customers);
    }

    public function findByToArray($criterias)
    {
        $customers = array();

        foreach ($this->findBy($criterias) as $customer) {
            $customers[$customer->getId()] = $customer->getName();
        }
        return ($customers);
    }
    
    public function disableTokens(Customer $customer, Application $application = null)
    {
        $queryText = 'UPDATE CanalTPSamCoreBundle:CustomerApplication c '
                . 'SET c.isActive = false '
                . 'WHERE c.customer=:customer';
                
        
        if (!is_null($application)) {
            $queryText .= ' AND c.application=:application';
        }
        
        $query = $this->_em->createQuery($queryText);
        $query->setParameter('customer', $customer);
        
        if (!is_null($application)) {
            $query->setParameter('application', $application);
        }
        
        $query->execute();
    }
}
