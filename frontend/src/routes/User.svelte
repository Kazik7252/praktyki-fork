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

<svelte:head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
</svelte:head>

<body class="parallax" >

    <nav  id="topnav">
        <a href="/"> <img id="logo" src="Promote3.png" alt="logo Promote.gg" /> </a>
                   <a id="forum" class="nav-link" href="#/topics"><button class="button">Forum</button></a>
                   <a id="login" class="nav-link" href="#/login"><button class="button">Logowanie</button></a>
       </nav>
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
    }

    #forum {
        top: 15px;
    }

    #login {
        position: absolute;
        top: 30px;
        right: 25px;
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