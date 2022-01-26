<script>
    let username = "";
    let password = "";
    let url = "http://localhost:8899/api/user/login";

    async function doPost() {
        try {
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    username: username,
                    password: password,
                }),
            });
            // const data = response.json();
            let data = response.json();
            console.log(Promise['PromiseResult']);
            // console.log(data.result);
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
    <nav id="topnav">
        <a href="/"
            ><img id="logo" src="Promote3.png" alt="logo Promote.gg" />
        </a>
        <a id="forum" class="nav-link" href="#/topics"
            ><button class="button">Forum</button></a
        >
        <a id="login" class="nav-link" href="#/login"
            ><button class="button">Logowanie</button></a
        >
    </nav>
    <div id="placeholder" />

    <div class="div" style="background-color: rgb(13, 54, 58, 0.9);">
        <h3 id="join">
            Logowanie
        </h3>
        <form>
            <label for="username">Nazwa użytkownika:</label><br />
            <input
                bind:value={username}
                type="text"
                id="username"
                name="usename"
            /><br />
            <label for="password">Hasło:</label><br />
            <input
                bind:value={password}
                type="password"
                id="password"
                name="password"
            /><br />
            <button type="button" on:click={doPost} class="button"
                >Zaloguj się
            </button>
        </form>
    </div>

    <div id="footer">
        <h3 class="stopka">&copy; 2022 Copyright Promote.gg</h3>
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

    #topnav {
        width: 100%;
        background-color: rgb(54, 44, 23, 0.95);
        font-family: Arial, sans-serif;
        font-size: 15px;
        position: fixed;
        top: 0;
    }

    .nav-link {
        display: inline-block;
        width: 250px;
        font-size: 30px;
        vertical-align: 200%;

        color: White;
        text-align: center;

        text-decoration: none;
    }

    .button {
        background-color: rgb(174, 145, 75);
        border-radius: 10%;
        color: white;
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
        height: 65;
    }

    #login {
        position: absolute;
        top: 40px;
        right: 25px;
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
