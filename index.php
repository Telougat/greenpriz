<?php
  if (isset($_FILES["firstTab"]) AND isset($_FILES["secondTab"])) {

    function uploadFile($file_path_to_save, $file_temp_name, $formatAccepted) { /* Function to upload files */
      $file_type = strtolower(pathinfo($file_path_to_save,PATHINFO_EXTENSION)); /* Get the file format */

      if ($file_type === $formatAccepted) { /* Check if file type is .csv */
        if (!file_exists($file_path_to_save)) { /* Check if another file exist with the same name */
          if (move_uploaded_file($file_temp_name, $file_path_to_save)) { /* Save the file and check if it's success */
            return true;
          } else {
            return "Erreur lors de l'enregistrement des fichiers.";
          }
        } else {
          return "Un fichier possèdant le même nom existe déjà sur le serveur !";
        }
      } else {
        return "Vous n'avez pas le droit d'upload un fichier avec un format différent de .csv.";
      }
    }

    $target_dir = "csv/"; /* Folder to store the file */

    $target_first_file = $target_dir . basename($_FILES["firstTab"]["name"]); /* Save the path with correct filename */
    $target_second_file = $target_dir . basename($_FILES["secondTab"]["name"]);

    $first_tmp_name = $_FILES["firstTab"]["tmp_name"];
    $second_tmp_name = $_FILES["secondTab"]["tmp_name"];

    $first_file_result = uploadFile($target_first_file, $first_tmp_name, "csv");

    if (gettype($first_file_result) == "boolean" AND $first_file_result === true) {
        $second_file_result = uploadFile($target_second_file, $second_tmp_name, "csv");
        if (gettype($second_file_result) == "boolean" AND $second_file_result === true) { /* All files are upload successfully */
            $upload_message = "Les fichiers ont bien étaient uploadés";
        } else {
            unlink($target_first_file);
            $upload_message = $second_file_result;
        }
    } else {
        $upload_message = $first_file_result;
    }

    /*if ($upload_ok) {
      $handle = fopen($target_file, "r");
      if ($handle != false) {
        $data = fgetcsv($handle, 400, ",");
        while ($data != false) {
          var_dump($data);
          $data = fgetcsv($handle, 400, ",");
        }
      }
    }*/
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Projet Greenpriz</title>
  <style type="text/css">
      .bg-green {
          background-color: #a9d18e;
      }
    @media(max-width: 540px) {
      /* Rotate the result table on tiny device */
      .rotate-table {
        transform: translateY(-50%) translateX(50vw) rotate(90deg);
        transform-origin: left 50%;
        width: 150vw;
        min-width: 550px;
      }
    }
  </style>
</head>
<body>
  <?php if (isset($upload_message)) : /* If upload was sent to server */ ?>
    <div id="dialog" class="absolute w-screen h-screen bg-gray-400 bg-opacity-50 flex justify-center items-start pt-28">
      <div class="py-16 px-24 bg-white rounded-xl">
        <h2 class="text-2xl font-bold">Informations</h2>
        <p class="pl-6 mt-4"><?php echo $upload_message; ?></p>
        <div class="flex justify-end mt-8">
          <button id="closeDialog" class="bg-black font-semibold text-white px-8 py-1 rounded-xl">Ok</button>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <header class="bg-green py-6 border-b border-black">
  	<h1 class="text-center text-5xl">Projet GreenPriz</h1>
  </header>
  <main>
  	<form method="post" enctype="multipart/form-data">
        <div class="lg:flex justify-between mt-16">
            <div class="px-4 lg:w-1/2 lg:px-16">
                <div>
                    <p>Cliquez pour ajouter le premier tableur à comparer</p>
                    <input class="invisible w-0" type="file" id="firstTab" accept=".csv" name="firstTab">
                    <label class="py-1 px-2 inline-block border border-black rounded-lg mt-2 cursor-pointer" for="firstTab">
                        <svg class="w-4 h-4 -mt-1 inline" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px"
                             y="0px" width="433.5px" height="433.5px" viewBox="0 0 433.5 433.5"
                             style="enable-background:new 0 0 433.5 433.5;" xml:space="preserve"><g><g id="file-upload"><polygon points="140.25,331.5 293.25,331.5 293.25,178.5 395.25,178.5 216.75,0 38.25,178.5 140.25,178.5"/><rect x="38.25" y="382.5" width="357" height="51"/></g></g></svg>
                        <span>Télécharger</span>
                    </label>
                </div>
                <?php if (isset($_FILES["firstTab"])) : ?>
                    <div class="mt-12">
                        <p>Résultat de la consommation :</p>
                        <p class="pt-2 pb-4 px-6 border border-black inline-block mt-1 text-3xl bg-gray-400 rounded-xl">**** <span class="font-bold">kWh</span></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-12 px-4 lg:mt-0 lg:w-1/2 lg:px-16">
                <div>
                    <p>Cliquez pour ajouter le second tableur à comparer</p>
                    <input class="invisible w-0" type="file" id="secondTab" accept=".csv" name="secondTab">
                    <label class="py-1 px-2 inline-block border border-black rounded-lg mt-2 cursor-pointer" for="secondTab">
                        <svg class="w-4 h-4 -mt-1 inline" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px"
                             y="0px" width="433.5px" height="433.5px" viewBox="0 0 433.5 433.5"
                             style="enable-background:new 0 0 433.5 433.5;" xml:space="preserve"><g><g id="file-upload"><polygon points="140.25,331.5 293.25,331.5 293.25,178.5 395.25,178.5 216.75,0 38.25,178.5 140.25,178.5"/><rect x="38.25" y="382.5" width="357" height="51"/></g></g></svg>
                        <span>Télécharger</span>
                    </label>
                </div>
                <?php if (isset($_FILES["secondTab"])) : ?>
                    <div class="mt-12">
                        <p>Résultat de la consommation :</p>
                        <p class="pt-2 pb-4 px-6 border border-black inline-block mt-1 text-3xl bg-gray-400 rounded-xl">**** <span class="font-bold">kWh</span></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <input class="mx-4 appearance-none mt-8 rounded-lg px-4 py-1 border border-black bg-white cursor-pointer hover:bg-black hover:text-white lg:mx-16" type="submit" value="Comparer">
  	</form>
    <div class="mt-12 lg:mt-24 lg:grid grid-cols-2 grid-rows-1 lg:px-16 xl:gap-x-40">
      <div class="flex flex-col items-center lg:items-start xl:items-end">
        <div>
          <div>
            <p class="inline-block">Energie économisée :</p>
          </div>
          <div class="mt-4">
            <p class="pt-5 pb-4 px-8 bg-green border border-yellow-400 rounded-tl-xl rounded-br-xl text-5xl inline-block">***** kWh</p>
          </div>
        </div>
      </div>
      <div class="rotate-table px-4 mt-12 lg:mt-0 lg:px-0">

        <!-- Table -->
        <div class="grid grid-cols-4 border-t border-l border-black">

          <!-- Table head (Not using standard <table> for more flexibility with the design.)-->
          <div class="border-r border-b border-black pl-2"><p class="uppercase lg:text-sm xl:text-base">Date</p></div>
          <div class="border-r border-b border-black pl-2"><p class="uppercase lg:text-sm xl:text-base">1er tableur</p></div>
          <div class="border-r border-b border-black pl-2"><p class="uppercase lg:text-sm xl:text-base">2éme tableur</p></div>
          <div class="border-r border-b border-black pl-2"><p class="uppercase lg:text-sm xl:text-base">Comparaison</p></div>

          <!-- Repeatable table rows (Dynamic content) -->
          <div class="border-r border-b border-black px-2 py-2 lg:text-sm xl:text-base"><p>****</p></div>
          <div class="border-r border-b border-black px-2 text-center py-2 lg:text-sm xl:text-base"><p>****</p></div>
          <div class="border-r border-b border-black px-2 text-center py-2 lg:text-sm xl:text-base"><p>****</p></div>
          <div class="border-r border-b border-black px-2 text-right py-2 lg:text-sm xl:text-base"><p>****</p></div>

        </div>
      </div>
    </div>
  </main>
</body>
<script type="text/javascript">
  let dialog = document.getElementById("dialog");

  if (dialog !== null) {
    document.getElementById("closeDialog").addEventListener("click", function(e) {
      dialog.remove();
    });
  }

  /* Select all inputs file elements in document */
  let inputs = document.querySelectorAll('input[type="file"]');
  
  /* When user select file display the filename instead of label */
  Array.prototype.forEach.call( inputs, function( input )
  {
    let label  = input.nextElementSibling,
        labelVal = label.innerHTML;

    input.addEventListener( 'change', function( e )
    {
      if (this.files.length > 0) {
        label.querySelector('span').innerHTML = this.files[0].name;
      }
    });
  });
</script>
</html>