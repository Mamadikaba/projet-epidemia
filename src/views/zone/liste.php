<?php
    require_once '../header.php';
?>
     <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">LISTE DES ZONES</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>NOM</th>
                                                <th>NB_HAB</th>
                                                <th>PAYS</th>
                                                <th>ACTION</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php
                                           require_once '../../../bootstrap.php';
                                           require_once '../../../Autoloader.php';
                                           $z=$entityManager->getRepository(Zone::class);
                                           $zones=$z->findAll();
                                          
                                            foreach($zones as $zo) {
                                                echo 
                                                 "<tr>
                                                    <td>".$zo->getId()."</td>
                                                    <td>".$zo->getNom()."</td>
                                                    <td>".$zo->getNbreHabitant()."</td>
                                                    <td>".$zo->getPay()->getNom()."</td>
                                                    <td><a class='btn mb-1 btn-rounded btn-danger' href='http://localhost/PHP/EPIDEMIA/src/controller/Zone/zone.php?id=".$zo->getId()."'>Supprimer</a></td>
                                                    <td><a class='btn mb-1 btn-rounded btn-warning' href='http://localhost/PHP/EPIDEMIA/src/views/zone/liste.php?id=".$zo->getId()."'>Modifier</a></td>
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
                                <h4 class="card-title">AJOUT UNE ZONE</h4>
                                <div class="table-responsive">
                                <div class="card shadow mb-4">
                 
                                
                                <form action="http://localhost/PHP/EPIDEMIA/src/controller/Zone/zone.php" method="post">
                                    <?php
                                        if(isset($_GET['id'])) 
                                        {
                                            require_once '../../../bootstrap.php';
                                            require_once '../../../Autoloader.php';
                                            $zom=$entityManager->getRepository(Zone::class);
                                            
                                            $zm=$zom->find($_GET['id']);
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label class="label-control" for="id">ID</label>
                                        <input class="form-control" type="text" name="id" id="id" value="<?php if(isset($zm)) echo $zm->getId();?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="nom">NOM</label>
                                        <input class="form-control" type="text" name="nom" id="nom" value="<?php if(isset($zm)) echo $zm->getNom();?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="nom">NOMBRE_HABITANTS</label>
                                        <input class="form-control" type="number" name="nombre_hab" id="nombre_hab" value="<?php if(isset($zm)) echo $zm->getNbreHabitant();?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="">Pays</label>
                                        <select class="form-control" type="text" name="pays" id="pays">
                                            
                                            <?php
                                                require_once '../../../bootstrap.php';
                                                require_once '../../../Autoloader.php';
                                                $p=$entityManager->getRepository(Pays::class);
                                                $pays=$p->findAll();
                                                
                                                    foreach($pays as $p) {
                                                        echo 
                                                        "<option value=".$p->getId().">"
                                                            
                                                            .$p->getNom().
                                                            
                                                        "</option>";
                                                    }

                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn mb-1 btn-rounded btn-success" type="submit" name="<?php if(isset($zm)) echo "modifier"; else echo "enregistrer"; ?>" value="<?php if(isset($zm)) echo "Modifier"; else echo "Enregistrer"; ?>"/>
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