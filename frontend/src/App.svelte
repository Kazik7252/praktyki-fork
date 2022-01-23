<script>
import Router from "svelte-spa-router";
import Welcome from "./routes/Welcome.svelte";
import NotFound from "./routes/NotFound.svelte";
import Topics from "./routes/Topics.svelte";
import Home from "./routes/Home.svelte";
import Topic from "./routes/Topic.svelte";
import User from "./routes/User.svelte";


	let routes = {
		"/": Welcome,
		"/home": Home,
		"/topics": Topics,
		"/topic/:id": Topic,
		"/user": User,

		"*": NotFound
	}

</script>

<main>
	
	<Router {routes} />
	
	
</main>

<style>
	main {
		background-color: #362C17;
	}
</style>