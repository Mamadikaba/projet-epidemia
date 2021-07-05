<?php
require_once 'src/entities/Pays.php';
require_once 'EntityM.php';
class PaysRepos extends EntityM
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function add($p)
    {
        $this->entityManager->persist($p);
        $this->entityManager->flush();
    }
    
}