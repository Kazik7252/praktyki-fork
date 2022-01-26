<script>
import { onMount } from "svelte";

    const riot_key = '#';

    let username = 'krixlionpl';
    let url = 'https://eun1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'+username+'?api_key='+riot_key;

    onMount(async () => {
		try{
		const response = await fetch(url, {
            method: 'GET',
            // headers: {
            //     "X-Riot-Token": riot_key,
            // }
        });
		const data = await response.json();
		console.log(data.name);
		} catch(error){
			console.log(error)
		}
	});

</script>

<div>
    <h1>Hello</h1>
</div>