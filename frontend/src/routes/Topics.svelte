<script>
	import { onMount } from "svelte";
	import Card from '../components/Card.svelte';

	let topics = [];
	onMount(async () => {
		try{
		const response = await fetch('http://localhost:8899/api/topics');
		const data = await response.json();
		console.log(data.topics);
		topics = data.topics;
		} catch(error){
			console.log(error)
		}
	});
</script>

<svelte:head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
</svelte:head>

<body class="parallax">
<div id="placeholder"></div>
<div id="container">

	<nav  id="topnav">
        <a href="/"><img id="logo" src="Promote3.png" alt="logo Promote.gg" /> </a> 
        <a id="forum" class="nav-link" href="#/topics"><button class="button">Forum</button></a>
        <a id="login" class="nav-link" href="#/login"><button class="button">Logowanie</button></a>
    </nav>

	<div id="placeholder2"></div>
	<div class="card" style>
	{#each topics as topic}
	<div>
		<Card>
			<div class="title">
				<h3><a href="#/topic/{topic.id}">{topic.title}</a></h3>
			</div>
			<div class="author">
				<h4>Author: {topic.topic_author.username}</h4>
			</div>
		</Card>
	</div>
	{/each}
	</div>
			<div id="footer">
				<h3 class="stopka">
					&copy; 2022 Copyright Promote.gg
				</h3>
			</div>
</div>
</body>



<style>

	#container {
		background-color:rgb(13, 54, 58, 0.9);
	}

	#placeholder {
        width: 100%;
        height: 132px;
    }

	#placeholder2 {
        width: 100%;
        height: 1px;
    }

    #topnav {
        width: 100%;
        background-color:rgb(54, 44, 23, 0.95);
        font-family: Arial, sans-serif;
        font-size: 15px;
        position:fixed;
        top: 0;
    }   

    .nav-link {
        display: inline-block;
        width: 250px;
        font-size: 30px;
        vertical-align:200%;

        color: White;
        text-align: center;

        text-decoration: none;
    }

    .button {
        background-color:rgb(174, 145, 75);
        border-radius: 10%;
        color:white;
        border-color: rgb(174, 145, 75);
    }

    #logo {
        width: 130px;
        display: inline-block;
        padding-top: 60px;
    	text-align: left;
		padding: 1em;
		max-width: 100px;
		margin: 50 auto;
        height: 100px;
        padding-left: 40px;
		font-size: 15px;
    }

    #forum {
        height: 65;
		font-size: 30px;
    }

    #login {
        position: absolute;
        top: 30px;
        right: 25px;
		font-size: 30px;
    }

	.card {
		margin-top:100px;
	}

	@media (min-width: 640px) {
		#container {
			max-width: none;
		}
	}
	
	a {
		color: #AE914B;
	}

	a:hover {
		color: #9D803A;
		font-size: 24px;
		text-decoration: none;
	}

    #footer {
        width: 100%;
        height: 200px;
        background-color: rgb(15, 29, 29, 0.95)
    }

    .stopka {
        font-size: 24px;
        color: rgb(174, 145, 75);
        padding-top: 85px;
        text-align: center;
    }

	.title{
		color: black;
		font-weight: bold;
		margin: 0.5em;
		font-size: 20px;
        text-align: center;
	}
	.author{
		text-align: left;
		color: #555;
		font-weight: 200;
		margin: 0.7em;
	}

	.parallax {
        /* The image used */
         background-image: url("https://i.pinimg.com/originals/d0/46/b9/d046b993370991a73a01e274b690a39b.jpg");

        /* Set a specific height */
		min-height: 1080px;

        /* Create the parallax scrolling effect */
         background-attachment: fixed;
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
    }

	* {
        font-family: 'Caudex', serif;
    }

</style>