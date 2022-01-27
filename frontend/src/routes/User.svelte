<script>
import Card from "../components/Card.svelte";
import { StoreUserId } from "../stores/UserIdStore.js";
import { onMount } from "svelte";
import Navigation from '../components/Navigation.svelte';

    const riot_key = '#';

    let username = 'Drapieżnik2115';
    let summonerLevel = '';
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
        summonerLevel = data.summonerLevel;
		console.log(data);
		} catch(error){
			console.log(error)
		}
	});

    let topics = [];
    onMount(async () => {
            try {
                let resp = await fetch("http://localhost:8899/api/topics/by-user-id/"+$StoreUserId, {
                })
                .then((resp) => resp.json());
                const data = resp.user[0].topics;
                console.log(data);
                topics = resp.user[0].topics;
            } catch (error) {
                console.log(error);
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
                
                {#if $StoreUserId = null}
                    <h1 id="message">Zaloguj się aby wyświetlić zawartość</h1>
                {:else}

                    <h1 id="naglowek" >Tematy</h1>

                    <div class="scrollbox">
                        
                        {#each topics as topic }
                            <Card>
                                <div class="title">
                                    <h4><a href="#/topic/{topic.id}">Temat: {topic.title}</a></h4>
                                </div>
                            </Card>
                        {/each}
                    </div>
                    
                    <div id="liga">
                    <Card>
                        <h1>Twój nick w grze: {username}</h1> <br>
                        <h3>Twój poziom w grze: {summonerLevel}</h3>
                    </Card>
                    </div>
                    
                {/if}

            </div>

        <div id="footer">
            <h3 class="stopka">
                 &copy; 2022 Copyright Promote.gg
            </h3>
        </div>
</body>

<style>

    #naglowek {
        color: rgb(174, 145, 75);
        font-size: 26px;
        padding-left: 320px;
        padding-top: 50px;
}

    #message {
        font-size: 50px;
        color: rgb(174, 145, 75);
    }

    #liga {
        color: rgb(174, 145, 75);
        font-size: 20px;
        margin-left: 700px;
        text-align: center;    
        padding-top: 17px;
    }

    .scrollbox {
        padding-top: 20px;
        padding-left: 15px;
        margin-right: 20px;
        overflow: scroll;
        overflow-x: hidden;
        width: 700px;
        text-align: left;
        color: #ae914b;
        font-weight: 200;
        margin: 0.5em;
        height: 400px;
        float: left;
        
    }

    .scrollbox::-webkit-scrollbar {
        display: none;
    }

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
        background-color: rgb(15, 29, 29, 0.95);
        clear: both;

    }

    .stopka {
        font-size: 24px;
        color: rgb(174, 145, 75);
        padding-top: 85px;
        text-align: center;
    }

    a {
		color: #AE914B;
	}

	a:hover {
		color: #9D803A;
		font-size: 24px;
		text-decoration: none;
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