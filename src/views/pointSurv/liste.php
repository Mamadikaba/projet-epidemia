<?php
    require_once '../header.php';
?>
     <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">LISTE DES POINTS DE SURVELLANCE</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>NOM</th>
                                                <th>Nb_Hab_SYP</th>
                                                <th>Nb_Hab_POS</th>
                                                <th>ZONE</th>
                                                <th>ACTION</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php
                                           require_once '../../../bootstrap.php';
                                           require_once '../../../Autoloader.php';
                                           $ps=$entityManager->getRepository(PointSurv::class);
                                           $pointSv=$ps->findAll();
                                          
                                            foreach($pointSv as $pts) {
                                                echo 
                                                 "<tr>
                                                    <td>".$pts->getId()."</td>
                                                    <td>".$pts->getNom()."</td>
                                                    <td>".$pts->getNbreHabitantSyp()."</td>
                                                    <td>".$pts->getNbreHabitantPos()."</td>
                                                    <td>".$pts->getZone()->getNom()."</td>
                                                    <td><a class='btn mb-1 btn-rounded btn-danger' href='http://localhost/PHP/EPIDEMIA/src/controller/PointSurv/pointsurv.php?id=".$pts->getId()."'>Supprimer</a></td>
                                                    <td><a class='btn mb-1 btn-rounded btn-warning' href='http://localhost/PHP/EPIDEMIA/src/views/pointSurv/liste.php?id=".$pts->getId()."'>Modifier</a></td>
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
                                <h4 class="card-title">AJOUT UN POINT DE SURVEILLANCE</h4>
                                <div class="table-responsive">
                                <div class="card shadow mb-4">
                 
                                
                                <form action="http://localhost/PHP/EPIDEMIA/src/controller/PointSurv/pointsurv.php" method="post">
                                    <?php
                                        if(isset($_GET['id'])) 
                                        {
                                            require_once '../../../bootstrap.php';
                                            require_once '../../../Autoloader.php';
                                            $pts=$entityManager->getRepository(PointSurv::class);
                                            
                                            $p=$pts->find($_GET['id']);
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label class="label-control" for="id">ID</label>
                                        <input class="form-control" type="text"  name="id" id="id" value="<?php if(isset($p)) echo $p->getId();?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="libelle">NOM</label>
                                        <input class="form-control" type="text" name="nom" id="nom" value="<?php if(isset($p)) echo $p->getNom();?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="libelle">NOMBRE_HABITANT_SYMPTOMATOQUE</label>
                                        <input class="form-control" type="number" name="nb_hab_syp" id="nb_hab_syp" value="<?php if(isset($p)) echo $p->getNbreHabitantSyp();?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="libelle">NOMBRE_HABITANT_POSITIFS</label>
                                        <input class="form-control" type="number" name="nb_hab_pos" id="nb_hab_pos" value="<?php if(isset($p)) echo $p->getNbreHabitantPos();?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for="">ZONE</label>
                                        <select class="form-control" type="text" name="zone" id="zone">
                                        <?php
                                                require_once '../../../bootstrap.php';
                                                require_once '../../../Autoloader.php';
                                                $z=$entityManager->getRepository(Zone::class);
                                                $zones=$z->findAll();
                                                foreach ($zones as $zo) {
                                                    echo $zo->getId();
                                                    }
                                                    foreach($zones as $zo) {
                                                        echo 
                                                        "<option value=".$zo->getId().">"
                                                            .$zo->getNom().
                                                        "</option>";
                                                    }

                                            ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn mb-1 btn-rounded btn-success" type="submit" name="<?php if(isset($p)) echo "modifier"; else echo "enregistrer"; ?>" value="<?php if(isset($p)) echo "Modifier"; else echo "Enregistrer"; ?>"/>
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