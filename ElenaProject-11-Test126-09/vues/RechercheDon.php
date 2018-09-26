<?php 
if (!isset($_SESSION))
    session_start();
    require_once("../modeles/config/CategoryDao.class.php");
    $pageTitle = 'RechercheDon';
    include('header.php'); 
?>

<script src="../ficiers-js/jquery-1.12.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<style>
    body{
        
        background:url(../images/marbre.jpg) no-repeat center center fixed;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size:cover;  
        }

    input.ng-invalid.ng-dirty{
        border:1px solid red;
        }
    #important{
        color: red;
        margin-left: 5px;
    }
</style>


<?php
    include('navBar.php');
?>


    <div class="container  col-md-8  col-md-offset-2" style="top:10px" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
                 <h3 class="panel-title text-center">Rechercher un Don pour modifier</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="../controleurs/Controle_dispatcher.php" method="POST" name="frm">
                
                    <div class="form-group">
                        <label class="control-label col-md-2">ID:<span id="important">*</span></label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" ng-model="user.idDon" name="idDon" placeholder="Entrer ID du Don a modifier" min="1" required>
                            <span ng-show="frm.idDon.$dirty && frm.idDon.$error.required">Champs obligatoire</span>
                            <!-- <span ng-show="frm.idDon.$dirty && frm.emaidDonil.$error.number">ID valid requis</span>                             -->

                        </div>   
                    </div><br>

                    <div class="form-group">
                        <label class="control-label col-md-2">Courriel:<span id="important">*</span></label>
                        <div class="col-md-8">
                            <input class="form-control" ng-model="user.email" type="email" name="email" id="email" placeholder="Entrer votre courriel"  required>
                            <span ng-show="frm.email.$dirty && frm.email.$error.required">Champs obligatoire</span>
                            <span ng-show="frm.email.$dirty && frm.email.$error.email">courriel valide requis</span>
                        </div>   
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <input class="btn btn-info col-md-2" type="submit" value="Rechercher ce Don" ng-disabled="frm.$invalid" name="rechercher" style="width:150px;">
                        </div>
                        <input class="btn btn-info col-md-2" type="submit" value="Afficher mes Dons" ng-disabled="frm.$invalid" name="afficher">
                    </div>
                </form>
            </div>
        </div>
    </div><!--en div class container-->
<script>
    
    var btnEmail =  document.getElementById("email");

    btnEmail.addEventListener('blur',function(){       
        if(!this.value==0)       
              document.getElementById("pointer").style['pointer-events'] = 'auto';
    })

    btnEmail.addEventListener('mouseleave',function(){       
        if(!this.value==0)       
              document.getElementById("pointer").style['pointer-events'] = 'none';
    })
    
</script>
    <?php include('footer.php') ?>
