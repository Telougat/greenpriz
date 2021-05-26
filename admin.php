<?php
    require("config.php");

    if (isset($_POST["truncate"]) AND isset($_POST["pass"]) AND $_POST["pass"] === $ADMIN_PASS) {
        try {
            $db = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
            $truncate = $db->prepare('TRUNCATE TABLE comparaisons');
            $truncate->execute();

            $files = glob('./csv/*'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
            header("Location: /");
            exit();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Greenpriz Admin</title>
</head>
<style>
    .bg-green {
        background-color: #a9d18e;
    }
</style>
<body>
    <form method="post" class="flex flex-col items-center justify-center h-screen">
        <div class="space-y-6 bg-green p-6 rounded-xl">
            <div class="flex items-center space-x-2">
                <label for="truncate">Réinitialiser les données : </label>
                <input class="mt-1" type="checkbox" name="truncate" id="truncate">
            </div>
            <div>
                <input class="p-1 rounded-xl" type="password" name="pass" placeholder="Mot de passe">
            </div>
            <div class="flex justify-end">
                <input class="px-3 py-1 rounded-xl cursor-pointer" type="submit" value="Réinitialiser">
            </div>
        </div>
    </form>
</body>
</html>
