<script>
import { onMount } from "svelte";
import Navigation from '../components/Navigation.svelte';

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

<svelte:head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
</svelte:head>

<body class="parallax" >

   <Navigation></Navigation>

       <div id="placeholder"></div>

            <div class="div" style="background-color:rgb(13, 54, 58, 0.9)">
                <h1>Hello</h1>
            </div>

        <div id="footer">
            <h3 class="stopka">
                 &copy; 2022 Copyright Promote.gg
            </h3>
        </div>
</body>

<style>

    .div {
        background-color:rgb(13, 54, 58, 0.9);
        width: 100%;
        height: 1080px;
    }

    #placeholder {
        width: 100%;
        height: 132px;
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
         background-image: url("http://waifu.clan.su/_ld/2/36430096.jpg");

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