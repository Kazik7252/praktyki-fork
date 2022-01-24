<script>
    let username = '';
	let email = '';
    let password = '';
    let password_confirmation = '';
	let url = 'http://localhost:8899/api/user/register?username='+username+'&password='+password+'&password_confirmation='+password_confirmation+'&email='+email;

	async function doPost () {
            try {
            const result = await fetch(url, {
                // mode: 'no-cors',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                 },
                })
            const response = result.json();
            console.log(response);
        } catch(error) {
            console.log(error);
        }
    }
</script>

<main>

    <body class="parallax">
        <nav  id="topnav">
         <img id="logo" src="Logo.png" alt="logo Promote.gg" />
                    <a class="nav-link" href="#/topics"><button class="button">Forum</button></a>
                    <a id="login" class="nav-link" href="#/login"><button class="button">Logowanie</button></a>
        </nav>
            <div class="div" style="background-color: rgb(13, 54, 58, 0.9);">
                <span class="textleft">
                Promote.gg pomaga nowym graczom z całego świata.
                </span>
                <span class="textleft2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, error neque doloremque suscipit quia odit assumenda aliquid eaque quasi quae sed, iusto qui enim, aut blanditiis et adipisci minus. Sed?
                </span>
                <img class="garen" src="Logo.png" alt="Logo Promote.gg" />
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

                <span class="join">
                Dołącz do nas!
                </span>
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
    </body>
</main>

<style>

    .div {
        width: 100%;
        height: 880px;
        color: rgb(174, 145, 75);
    }

    #topnav {
        width: 100%;
        background-color:rgb(54, 44, 23, 0.9);
        font-family: Arial, sans-serif;
        font-size: 15px;
    }   

    .nav-link {
        display: inline-block;
        width: 200px;
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
    }

    #login {
        position: absolute;
        top: 40px;
        right: 25px;
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
        margin-top: 100px;
        margin-left: 180px;
        margin-right: 180px;
        text-align: center;
    }

    input {
        color:rgb(71, 71, 71);
    }

    .join {
        padding-left: 772px;
        font-size: 50px;
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

</style>
