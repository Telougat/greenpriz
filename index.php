<?php
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Projet Greenpriz</title>
  <style type="text/css">
    @media(max-width: 540px) {
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
  <header class="bg-green-300 py-6 border-b border-black">
  	<h1 class="text-center text-5xl">Projet GreenPriz</h1>
  </header>
  <main>
  	<div class="lg:flex justify-between mt-16">
  		<div class="px-4 lg:w-1/2 lg:px-16">
        <div>
          <p>Cliquez pour ajouter le premier tableur à comparer</p>
          <button class="py-1 px-2 border border-black rounded-lg mt-2">Télécharger</button>
        </div>
	  		<div class="mt-12">
          <p>Résultat de la consommation :</p>   
          <p class="pt-2 pb-4 px-6 border border-black inline-block mt-1 text-3xl bg-gray-400 rounded-xl">**** <span class="font-bold">kWh</span></p>
        </div>
  		</div>
  		<div class="mt-12 px-4 lg:mt-0 lg:w-1/2 lg:px-16">
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
    <div class="mt-12 lg:mt-24 lg:grid grid-cols-2 grid-rows-1 lg:px-16 xl:gap-x-40">
      <div class="flex flex-col items-center lg:items-start xl:items-end">
        <div>
          <div>
            <p class="inline-block">Energie économisée :</p>
          </div>
          <div class="mt-4">
            <p class="pt-5 pb-4 px-8 bg-green-300 border border-yellow-400 rounded-tl-xl rounded-br-xl text-5xl inline-block">***** kWh</p>
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
</html>