<script>
</script>

<svelte:head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
</svelte:head>

	<nav  id="topnav">
        <a href="/"><img id="logo" src="Promote3.png" alt="logo Promote.gg" /> </a> 
        <a id="forum" class="nav-link" href="#/topics"><button class="button">Forum</button></a>
        <a id="user" class="nav-link" href="#/user"><button class="button">Twój Profil</button></a>
        <a id="login" class="nav-link" href="#/login"><button class="button">Logowanie</button></a>
    </nav>


<style>

    #topnav {
        width: 100%;
        background-color:rgb(54, 44, 23, 0.95);
        font-size: 15px;
        position:fixed;
        top: 0;
    }   

    .nav-link {
        display: inline-block;
        width: 250px;
        font-size: 30px;
        vertical-align:200%;
        font-family: 'Caudex', serif;
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
		font-size: 15px;
    }

    #forum {
        height: 65;
		font-size: 30px;
    }

    #login {
        position: absolute;
        top: 30px;
        right: 25px;
		font-size: 30px;
    }

    #user {
        position: absolute;
        top: 30px;
        right: 250px;
		font-size: 30px;
    }

	a {
		color: #AE914B;
	}

	a:hover {
		color: #9D803A;
		font-size: 24px;
		text-decoration: none;
	}

    * {
        font-family: 'Caudex', serif;
    }

</style>

