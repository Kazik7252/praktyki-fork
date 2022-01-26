<script>
import Card from "../components/Card.svelte";
import { onMount } from "svelte";
import Navigation from '../components/Navigation.svelte';

    export let params = {};

    let posts = [];
    let topic = [];
    let body = '';

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
    
        <Navigation></Navigation>
    
        <div id="placeholder2"></div>
        <div class="card" style>


        {#each topic as topic}
        <div>
            <Card>
                <div class="title">
                    <h4>Topic: {topic.title}</h4>
                </div>
                <div class="author">
                    <h6>Topic author: {topic.topic_author.username}</h6>
                </div>
            </Card>
        </div>
        {/each}

        {#each posts as post}
        <div>
            <Card>
                <div class="author">
                    <h4>Author: {post.post_author.username}</h4>
                </div>
                <div class="content">
                    <p>{post.body}</p>
                </div>
            </Card>
        </div> 
        {/each}
        </div>

        <div class="div">

            <h3 id="join">
            Dodaj swój post
            </h3>
                <form>
                    <label for="body">Treść postu</label><br>
                    <textarea rows="8" cols="50" id="body"> </textarea> <br>
                    <button type="button" class="button">Dodaj post</button>
              </form>
        
        </div>
        <div id="placeholder3">

        </div>
</div>

<div id="footer">
    <h3 class="stopka">
        &copy; 2022 Copyright Promote.gg
    </h3>
</div>

</body>

<style>

    .card {
		margin-top:100px;
	}

    #container {
        width: 100%;
        height: 100%;
        background-color:rgb(13, 54, 58, 0.9);
        min-height: 1080px;
    }

    #placeholder {
        width: 100%;
        height: 132px;
    }

	#placeholder2 {
        width: 100%;
        height: 100px;
    }

	#placeholder3 {
        width: 100%;
        height: 100px;
    }

    .button {
        background-color:rgb(174, 145, 75);
        border-radius: 10%;
        color:white;
        border-color: rgb(174, 145, 75);
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

    form {
        background-color: rgb(15, 29, 29, 0.75);
        font-size: 30px;
        margin-top: 50px;
        margin-left: 180px;
        margin-right: 180px;
        text-align: center;
		color: #AE914B;
        /* margin-bottom: 500px; */
    }

    #body {
        color:rgb(71, 71, 71);
		width: 85%;
 		padding: 12px 20px;
	 	margin: 8px 0;
	 	box-sizing: border-box;
        resize: none;
        font-size: 19px;
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
        background-color: rgb(15, 29, 29, 0.95)
    }

    .stopka {
        font-size: 24px;
        color: rgb(174, 145, 75);
        padding-top: 85px;
        text-align: center;
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