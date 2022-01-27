<script>
	import { StoreToken } from "../stores/TokenStore.js";
	import { StoreUserId } from "../stores/UserIdStore.js";
	import { onMount } from "svelte";
	import Card from '../components/Card.svelte';
	import Navigation from '../components/Navigation.svelte';

	let title = '';

	let topics = [];

	onMount(async () => {
		try{
		const response = await fetch('http://localhost:8899/api/topics');
		const data = await response.json();
		console.log(data.topics);
		console.log($StoreToken);
		topics = data.topics;
		} catch(error){
			console.log(error)
		}
	});

	async function doPost() {
		try {
			let resp = await fetch('http://localhost:8899/api/topics', {
				method: 'POST',
				headers: {
					"Content-Type": "application/json",    
					"Accept": 'application/json',
					"Authorization": 'Bearer '+$StoreToken,
				},
				body: JSON.stringify({
						title: title,
						user_id: $StoreUserId,
				})
			})
			.then((resp) => resp.json());
			console.log(resp);
		} catch(error) {
			console.log(error);
		}
	}

</script>

<svelte:head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
</svelte:head>

<body class="parallax">
<div id="placeholder"></div>
<div id="container">

	<Navigation> </Navigation>
	<div id="placeholder2"></div>
	<div class="card" style>

		<div class="div">

			<h3 id="join">
			Załóż swój temat
			</h3>
				<form>
					<label for="title">Temat:</label><br>
					<input bind:value={title} type="text" id="title" name="title"><br>
					<button type="button" on:click={doPost} class="button">Dodaj temat</button>
			  </form>

		</div>


	{#each topics as topic}
	<div>
		<Card>
			<div class="title">
				<h3><a href="#/topic/{topic.id}">{topic.title}</a></h3>
			</div>
			<div class="author">
				<h4>Autor: {topic.topic_author.username}</h4>
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
		min-height: 1080px;
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

    .button {
        background-color:rgb(174, 145, 75);
        border-radius: 10%;
        color:white;
        border-color: rgb(174, 145, 75);
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

    form {
        background-color: rgb(15, 29, 29, 0.75);
        font-size: 30px;
        margin-top: 50px;
        margin-left: 180px;
        margin-right: 180px;
        text-align: center;
		color: #AE914B;
    }

    input {
        color:rgb(71, 71, 71);
		width: 85%;
 		padding: 12px 20px;
	 	margin: 8px 0;
	 	box-sizing: border-box;
    }

    #join {
		color: #AE914B;
        text-align: center;
        font-size: 50px;
        vertical-align: bottom;
        padding-top: 50px;
    }

    #footer {
        width: 100%;
        height: 200px;
        background-color: rgb(15, 29, 29, 0.9)
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