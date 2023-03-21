<?php
include_once('helpers/_function.php');


// validation du formulaire
// 1-creation de mes variables
$error = [];
$errorMsg = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = false;

// 2-Je vérifie si le formualire est soumis
if (!empty($_POST['submited'])) {
  // 3- protege contre faille xss
  ///////////////////////////////
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));
    $Email = trim(htmlspecialchars($_POST['Email']));
    $age = trim(htmlspecialchars($_POST['age']));
    $formation = trim(htmlspecialchars($_POST['formation']));

  // 4- validation de chaque input
  /////////////////////////////////
  // nom
  if (!empty($fname)) {
    if (strlen($fname) <= 2) {
      $error['fname'] = "<span class='text-red-500'>3 caractères minimum</span>";
    } elseif (strlen($fname) > 20) {
      $error['fname'] = "<span class='text-red-500'>20 caractères maximum</span>";
    }
  } else {
    $error['fname'] = $errorMsg;
  }
  if (!empty($lname)) {
    if (strlen($lname) <= 2) {
      $error['lname'] = "<span class='text-red-500'>3 caractères minimum</span>";
    } elseif (strlen($lname) > 20) {
      $error['lname'] = "<span class='text-red-500'>20 caractères maximum</span>";
    }
  } else {
    $error['lname'] = $errorMsg;
  }}

  // age
  // verifie que user a bien rempli le champs
  if (!empty($age)) {
    // verifie que l'age est un nombre entier
    if (!is_numeric($age)) {
      $error['age'] = "<span class='text-red-500'>Merci de rentrer un age correct</span>";
      // verifie qu'il est majeur
    } elseif ($age < 18) {
      $error['age'] = "<span class='text-red-500'>Tu es mineur</span>";
    }
  } else {
    $error['age'] = $errorMsg;
  }
  if (!empty($email)){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    
        $error['email']="<span class='text-red-500'>format invalide</>";
    }
}
else{
        $error['email'] = $errorMsg;

  // formation
  if (!empty($formation)) {
    if (strlen($formation) <= 1) {
      $error['formation'] = "<span class='text-red-500'>20 caractères minimum</span>";
    } elseif (strlen($formation) > 30) {
      $error['formation'] = "<span class='text-red-500'>300 caractères maximum</span>";
    }
  } else {
    $error['formation'] = $errorMsg;
  }

  // 5- Pas d'erreur => Enregistrement en Base de donnée
  if (count($error) == 0) {
    $success = true;
    // enregistrement en BDD
  }
}
?>

<form action="" method="POST">
    <div ><input type="text" placeholder="premnom" class="input w-full max-w-xs" id="fname" name="fname"/>
    </div>
            <?php
                if (isset($error['fname'])) {
                 echo $error['fname'];
                }
            ?>
    <div><input  type="text" placeholder="nom" class="input w-full max-w-xs" class= "flex" id="lname" name="lname"/>
    </div>
     <?php
        if (isset($error['lname'])) {
         echo $error['lname'];
        }
     ?>
    <div><input  type="number" placeholder="age" class="input w-full max-w-xs" class= "flex" id="age" name="age"/>
    </div>
    <?php
        if (isset($error['age'])) {
         echo $error['age'];
        }
     ?>
    <div>
        <select class="select w-full max-w-xs" id="formation" name="formation">
            <?php 
            $formationOption =[
                ["name"=> "dev react"],
                ["name"=> "dev front"],
                ["name"=> "dev laravel"],
                ["name"=> "dev symphony"],
                ["name"=> "dev international comerce"],
            ]
            ?>
            <div>
                <option disabled selected>formation</option>
                <?php foreach($formationOption as $item): ?>
                <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                
            </div>
            
            <?php endforeach ?>
        </select>
    </div>
     <?php
        if (isset($error['formation'])) {
         echo $error['formation'];
        }
     ?>
    <div>
    <input type="email" placeholder="email" class="input w-full max-w-xs" class= "flex" id="Email" name="Email"/>
    </div>
     <?php
        if (isset($error['Email'])) {
         echo $error['Email'];
        }
     ?>
    
    

    
    
    <!-- <input type="file" class="file-input w-full max-w-xs" class= "flex"/> -->
    <input class="btn bg-blue-600 text-white mt-6" type="submit" id="submited" name="submited" value="Envoyer" />
</form>