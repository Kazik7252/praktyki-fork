<script>
import { StoreToken } from "../stores/TokenStore.js";
import { StoreUserId } from "../stores/UserIdStore.js";
import Navigation from '../components/Navigation.svelte';


    let username = "";
    let password = "";
    let url = "http://localhost:8899/api/user/login";

    async function login () {
            try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    username: username,
                    password: password,
                }),
            }).then(response => response.json());

            $StoreToken = response.token;
            $StoreUserId = response.user.id;
            console.log($StoreToken);
        } catch (error) {
            console.log(error);
        }
    }

    
</script>
<svelte:head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Caudex&display=swap"
        rel="stylesheet"
    />
</svelte:head>

<body class="parallax">

    <Navigation></Navigation>

    <div id="placeholder"></div>

        <div class="div" style="background-color: rgb(13, 54, 58, 0.9);">
            <h3 id="join">
                Logowanie
                </h3>
                    <form>
                        <label for="username">Nazwa użytkownika:</label><br>
                        <input bind:value={username} type="text" id="username" name="usename"><br>
                        <label for="password">Hasło:</label><br>
                        <input bind:value={password} type="password" id="password" name="password"><br>
                        <button type="button" on:click={login} class="button">Zaloguj się </button>
                  </form>
        </div>

        <div id="footer">
            <h3 class="stopka">
                &copy; 2022 Copyright Promote.gg
            </h3>
        </div>

</body>

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
        background-color: rgb(174, 145, 75);
        border-radius: 10%;
        color: white;
        border-color: rgb(174, 145, 75);
    }

    form {
        background-color: rgb(15, 29, 29, 0.75);
        font-size: 30px;
        margin-top: 100px;
        margin-left: 180px;
        margin-right: 180px;
        text-align: center;
        padding-top: 25px;
        padding-bottom: 25px;
    }

    input {
        color: rgb(71, 71, 71);
    }

    #join {
        text-align: center;
        font-size: 50px;
        vertical-align: bottom;
        padding-top: 75px;
    }

    #footer {
        width: 100%;
        height: 200px;
        background-color: rgb(15, 29, 29, 0.95);
    }

    .stopka {
        font-size: 24px;
        color: rgb(174, 145, 75);

        padding-top: 85px;
        text-align: center;
    }

    .parallax {
        /* The image used */
        background-image: url("https://a-static.besthdwallpaper.com/8k-sentinel-irelia-splash-art-league-of-legends-lol-wallpaper-3840x2160-73298_54.jpg");

        /* Set a specific height */
        min-height: 1080px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    * {
        font-family: "Caudex", serif;
    }
</style>
