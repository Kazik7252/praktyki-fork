<script>
import Card from "../components/Card.svelte";
import { onMount } from "svelte";

    export let params = {};

    let posts = [];
    let topic = [];

    let url = "http://localhost:8899/api/topics/by-topic-id/"+params.id;
    
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

<style>
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
</style>