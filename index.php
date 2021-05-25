<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Projet Greenpriz</title>
</head>
<body>
  <header class="bg-green-300 py-6 border-b border-black">
  	<h1 class="text-center text-5xl">Projet GreenPriz</h1>
  </header>
  <main>
  	<div class="flex justify-between mt-16">
  		<div class="w-1/2 px-16">
        <div>
          <p>Cliquez pour ajouter le premier tableur à comparer</p>
          <button class="py-1 px-2 border border-black rounded-lg mt-2">Télécharger</button>
        </div>
	  		<div class="mt-12">
          <p>Résultat de la consommation :</p>   
          <p class="pt-2 pb-4 px-6 border border-black inline-block mt-1 text-3xl bg-gray-400 rounded-xl">**** <span class="font-bold">kWh</span></p>
        </div>
  		</div>
  		<div class="w-1/2 px-16">
        <div>
          <p>Cliquez pour ajouter le second tableur à comparer</p>
          <button class="py-1 px-2 border border-black rounded-lg mt-2">Télécharger</button>
        </div>
  			<div class="mt-12">
          <p>Résultat de la consommation :</p>   
          <p class="pt-2 pb-4 px-6 border border-black inline-block mt-1 text-3xl bg-gray-400 rounded-xl">**** <span class="font-bold">kWh</span></p>
        </div>
  		</div>
  	</div>
    <div class="mt-24 grid grid-cols-2 grid-rows-1 gap-x-40">
      <div class="flex flex-col items-end">
        <div>
          <div>
            <p class="inline-block">Energie économisée :</p>
          </div>
          <div class="mt-4">
            <p class="pt-5 pb-4 px-8 bg-green-300 border border-yellow-400 rounded-tl-xl rounded-br-xl text-5xl inline-block">***** kWh</p>
          </div>
        </div>
      </div>
      <div class="pr-16">

        <!-- Table -->
        <div class="grid grid-cols-4 border-t border-l border-black">

          <!-- Table head (Not using standard <table> for more flexibility with the design.)-->
          <div class="border-r border-b border-black pl-2"><p class="uppercase">Date</p></div>
          <div class="border-r border-b border-black pl-2"><p class="uppercase">1er tableur</p></div>
          <div class="border-r border-b border-black pl-2"><p class="uppercase">2éme tableur</p></div>
          <div class="border-r border-b border-black pl-2"><p class="uppercase">Comparaison</p></div>

          <!-- Repeatable table rows (Dynamic content) -->
          <div class="border-r border-b border-black px-2 py-2"><p>****</p></div>
          <div class="border-r border-b border-black px-2 text-center py-2"><p>****</p></div>
          <div class="border-r border-b border-black px-2 text-center py-2"><p>****</p></div>
          <div class="border-r border-b border-black px-2 text-right py-2"><p>****</p></div>

        </div>
      </div>
    </div>
  </main>
</body>
</html>