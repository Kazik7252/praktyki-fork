<script>
	import { onMount } from "svelte";
	import Card from './components/Card.svelte'

	let name = ':)';
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



<main>
	<h1>siemka {name} !</h1>
	<p>Visit the <a href="https://svelte.dev/tutorial">Svelte tutorial</a> to learn how to build Svelte apps.</p>
	
	{#each topics as topic}
	<div>
		<Card>
			<div class="title">
				<h3>{topic.title}</h3>
			</div>
			<div class="author">
				<h4>Author: {topic.topic_author.username}</h4>
			</div>
			<!-- <div class="content">
				<p>{topic.body}</p>
			</div> -->
		</Card>
	</div>
	{/each}
</main>



<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}

	h1 {
		color: #ff3e00;
		text-transform: uppercase;
		font-size: 4em;
		font-weight: 100;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}


	/* Styling card contents */
	.title{
		color: black;
		font-weight: bold;
		margin: 0.5em
	}
	.author{
		text-align: left;
		color: #555;
		font-weight: 200;
		margin: 0.5em;
	}
	/* .content{
		margin: 0.5em;
		text-align: left;
	} */
</style>