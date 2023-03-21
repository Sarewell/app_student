<?php
    session_start();

   require_once('models/Model.php')

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.4/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
			integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
    <title>happy school</title>
</head>
<body>
    <?php
 
    include('helpers/_function.php');
       $students = getAll('students', 'fname');
    $navItems = 
    [
        [
            "name"=>"Nos formateur",
            "url"=>"formateur.php",
        ],
        [
            "name"=>"Nos ordinateur",
            "url"=>"ordinateur.php"
        ]
    ];
    ?>
    		<!-- header -->
		<header class="px-[10%] max-w-full bg-white px-5 py-20 flex place-content-between items-center shadow-xl">
			<!-- div logo -->
			<div class="">
				<a href="index.php" class="rounded-full bg-gray-100 text-2xl font-bold uppercase p-10 hover:bg-gray-200 shadow-lg hover:shadow-inner hover:text-red-700">happy school</a>
			</div>
			<!-- end div logo -->
			<!-- navigation -->
            
			<nav class= "text-gray-400 text-2xl space-x-5 uppercase">
            <?php
            foreach($navItems as $navItem){?>
                <a href="<?=$navItem['url']?>" class= "bg-gray-100 hover:text-red-700 p-5 rounded-xl shadow-lg bg-gray-100 hover:shadow-inner"><?=$navItem['name']?></a>

            <?php } ?>
                
			</nav>
			<!-- end navigation -->
		</header>
        <div>
            <h1  class="rounded-b-xl mx-96 bg-gray-100 text-4xl text-center py-16 text-bold uppercase text-gray-500 shadow-lg"><?= $title_page ?></h1>
        </div>
        
		<!-- end header -->
        <main class="px-24 py-20">

        

