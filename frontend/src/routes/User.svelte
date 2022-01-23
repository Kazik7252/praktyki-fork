<script>
import { onMount } from "svelte";

    const riot_key = 'RGAPI-101efe84-aaf5-4bf3-ab70-f5621d2c7140';

    let username = 'krixlionpl';
    let url = 'https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'+username;

    onMount(async () => {
		try{
		const response = await fetch(url, {
            mode: 'cors',
            headers: {
                'Access-Control-Request-Method': "GET",
                'Content-Type': 'application/json',
                "X-Riot-Token": "RGAPI-101efe84-aaf5-4bf3-ab70-f5621d2c7140",
            }
        });
		const data = await response.json();
		console.log(data.username);
		} catch(error){
			console.log(error)
		}
	});

</script>
<div>
    <!-- {#each data as data}
        <h1>Username: {data.username}</h1>
    {/each} -->
</div>