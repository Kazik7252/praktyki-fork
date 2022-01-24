<script>
import { onMount } from "svelte";

    const riot_key = '###';

    let username = 'krixlionpl';
    let url = 'https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'+username;

    onMount(async () => {
		try{
		const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Access-Control-Request-Method': "GET",
                'Content-Type': 'application/json',
                "X-Riot-Token": riot_key,
            }
        });
		const data = await response.json();
		console.log(data.username);
		} catch(error){
			console.log(error)
		}
	});

</script>
