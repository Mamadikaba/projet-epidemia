<?php
    require_once '../header.php';
?>
     <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">LISTE DES PAYS</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>NOM</th>
                                                <th>ACTION</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                           require_once '../../../bootstrap.php';
                                           require_once '../../../Autoloader.php';
                                           $p=$entityManager->getRepository(Pays::class);
                                           $pays=$p->findAll();
                                           
                                            foreach($pays as $p) {
                                                echo 
                                                 "<tr>
                                                    <td>".$p->getId()."</td>
                                                    <td>".$p->getNom()."</td>
                                                    <td><a class='btn mb-1 btn-rounded btn-danger' href='http://localhost/PHP/EPIDEMIA/src/controller/Pays/pays.php?id=".$p->getId()."'>Supprimer</a></td>
                                                    <td><a class='btn mb-1 btn-rounded btn-warning' href='http://localhost/PHP/EPIDEMIA/src/views/pays/liste.php?id=".$p->getId()."'>Modifier</a></td>
                                                </tr>";
                                            }

                                        ?> 
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">AJOUTE UN PAYS</h4>
                                <div class="table-responsive">
                                <div class="card shadow mb-4">
                 
                                
                                <form action="http://localhost/PHP/EPIDEMIA/src/controller/Pays/pays.php" method="post">
                                    <?php
                                        if(isset($_GET['id'])) 
                                        {
                                            require_once '../../../bootstrap.php';
                                            require_once '../../../Autoloader.php';
                                            $pa=$entityManager->getRepository(Pays::class);
                                            
                                            $pm=$pa->find($_GET['id']);
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label class="label-control" for="id">ID</label>
                                        <input class="form-control" type="text" name="id" id="id" value="<?php if(isset($pm)) echo $pm->getId();?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="libelle">NOM</label>
                                        <input class="form-control" type="text" name="nom" id="nom" value="<?php if(isset($pm)) echo $pm->getNom();?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn mb-1 btn-rounded btn-success" type="submit" name="<?php if(isset($pm)) echo "modifier";else echo "enregistrer"; ?>" value="<?php if(isset($pm)) echo "Modifier"; else echo "Enregistrer"; ?>"/>
                                        <input class="btn mb-1 btn-rounded btn-danger" type="reset" name="annuler" id="annuler" value="Annuler"/>
                                    </div>
                                </form>
                             </div>
                        </div> 
                     </div>
                </div>
            

<?php
     require_once '../footer.php';
?>