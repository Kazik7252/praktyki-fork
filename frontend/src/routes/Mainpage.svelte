<script>
	import Navigation from '../components/Navigation.svelte';

    let username = '';
	let email = '';
    let password = '';
    let password_confirmation = '';
	let url = 'http://localhost:8899/api/user/register';
	
    async function doPost () {
            try {
            const result = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    "username": username,
                    "email": email,
	                "password": password,
	                "password_confirmation": password_confirmation
                }), 
            })
            const response = result.json();
            console.log(response);
        } catch(error) {
            console.log(error);
        }
    }
</script>

<svelte:head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
</svelte:head>

<main>

    <body class="parallax">
        
        <Navigation></Navigation>

        <div id="placeholder"></div>
            <div class="div" style="background-color: rgb(13, 54, 58, 0.9);">
                <span class="textleft">
                Promote.gg pomaga nowym graczom z całego świata.
                </span>
                <span class="textleft2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, error neque doloremque suscipit quia odit assumenda aliquid eaque quasi quae sed, iusto qui enim, aut blanditiis et adipisci minus. Sed?
                </span>
                <img class="garen" src="Promote3.png" alt="Logo Promote.gg" />
            </div>
            <div class="div" style="background-color: rgb(17, 33, 32, 0.9);">
                <span class="textleft">
                Tutaj znajdziesz wszystkie informacje potrzebne do przyjemnej gry.          
                </span>
                <span class="textleft2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, error neque doloremque suscipit quia odit assumenda aliquid eaque quasi quae sed, iusto qui enim, aut blanditiis et adipisci minus. Sed?
                </span>
                <img class=garen src="garen2.png" alt="Render Garena" />
            </div>
            <div class="div" style="background-color: rgb(15, 29, 29, 0.9356);">
                <span class="textright">
                Tu spotkasz graczy o podobnych umiejętnościach chętnych do wspólnej gry.               
                </span>
                <span class="textright2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, error neque doloremque suscipit quia odit assumenda aliquid eaque quasi quae sed, iusto qui enim, aut blanditiis et adipisci minus. Sed?
                </span>
                <img class="draven" src="draven2.png" alt="Render Dravena" />
            </div>
            <div class="div" style="background-color: rgb(17, 33, 32, 0.9);">
                <span class="textleft">
                    Możesz tu zapisać własne buildy i udostępniać je innym graczom.          
                </span>
                <span class="textleft2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, error neque doloremque suscipit quia odit assumenda aliquid eaque quasi quae sed, iusto qui enim, aut blanditiis et adipisci minus. Sed?
                </span>
                <img class="sylas" src="sylas2.png" alt="Render Sylasa" />
            </div>
            <div class="div" style="background-color: rgb(13, 54, 58, 0.9);">

                <h3 id="join">
                Dołącz do nas!
                </h3>
                    <form>
                        <label for="username">Nazwa użytkownika:</label><br>
                        <input bind:value={username} type="text" id="username" name="usename"><br>
                        <label for="E-mail">E-mail</label><br>
                        <input bind:value={email} type="text" id="e-mail" name="e-mail">
                        <label for="password">Hasło:</label><br>
                        <input bind:value={password} type="password" id="password" name="password">
                        <label  for="confirmpassword">Powtórz Hasło:</label><br>
                        <input bind:value={password_confirmation} type="password" id="confirmpassword" name="confirmpassword"> <br/>
                        <button type="button" on:click={doPost} class="button">Załóż Konto </button>
                  </form>

            </div>
 
            <div id="footer">
                <h3 class="stopka">
                     &copy; 2022 Copyright Promote.gg
                </h3>
            </div>
        
    </body>
</main>

<style>



    .div {
        width: 100%;
        height: 880px;
        color: rgb(174, 145, 75);
    }

    #placeholder {
        width: 100%;
        height: 132px;
    }

    .button {
        background-color:rgb(174, 145, 75);
        border-radius: 10%;
        color:white;
        border-color: rgb(174, 145, 75);
    }

    .garen {
        margin-top: 50px;
        margin-left: 150px;
    }

    .draven {
        margin-top: 30px;
        margin-left: 100px;
        width: 550px;
    }

    .sylas {
        width: 550px;
        margin-top: 35px;
        margin-left: 75px;
    }

    .textleft {
        float:left;
        height: 220px;
        width: 960px;
        font-size: 50px;
        margin-top: 100px;
        margin-left: 180px;
    }

    .textright {
        float:right;
        height: 220px;
        width: 960px;
        font-size: 50px;
        margin-top: 100px;
        margin-right: 121px;
    }

    .textleft2 {
        float:left;
        height: 220px;
        width: 960px;
        font-size: 40px;
        margin-bottom: 280px;
        margin-left: 180px;
    }

    .textright2 {
        float:right;
        height: 220px;
        width: 960px;
        font-size: 40px;
        margin-bottom: 280px;
        margin-right: 121px;
    }

    form {
        background-color: rgb(15, 29, 29, 0.75);
        font-size: 30px;
        margin-top: 50px;
        margin-left: 180px;
        margin-right: 180px;
        text-align: center;
    }

    input {
        color:rgb(71, 71, 71);
    }

    #join {
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
         background-image: url("https://a-static.besthdwallpaper.com/league-of-legends-lol-spirit-blossom-yasuo-z-yone-tapeta-2560x1600-64061_7.jpg");

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
