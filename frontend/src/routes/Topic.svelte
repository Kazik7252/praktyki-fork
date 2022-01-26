<script>
import Card from "../components/Card.svelte";
import { onMount } from "svelte";

    export let params = {};

    let posts = [];
    let topic = [];

    let url = 'http://localhost:8899/api/topics/by-topic-id/'+params.id;
    
    onMount(async () => {
        try{
		const response = await fetch(url);
		const data = await response.json();
		console.log(data.posts);
        console.log(data.topic);
		posts = data.posts;
        topic = data.topic;
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

        <div id="container">
        {#each topic as topic}
            <Card>
                <div class="title">
                    <h4>Topic: {topic.title}</h4>
                </div>
                <div class="author">
                    <h6>Topic author: {topic.topic_author.username}</h6>
                </div>
            </Card>
        {/each}

        {#each posts as post}
            <Card>
                <div class="author">
                    <h4>Author: {post.post_author.username}</h4>
                </div>
                <div class="content">
                    <p>{post.body}</p>
                </div>
            </Card>
        {/each}
        </div>

</body>

<style>
    #container {
        width: 100%;
        height: 100%;
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

	.author{
		text-align: left;
        color: #AE914B;
		font-weight: 200;
		margin: 0.5em;
	}

	.content{
		margin: 0.5em;
		text-align: left;
        color: #AE914B;
	}

    .title{
        color: #AE914B;
        font-weight: bold;
        margin: 0.5em
    }

	.parallax {
        /* The image used */
         background-image: url("https://images4.alphacoders.com/904/904299.jpg");

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