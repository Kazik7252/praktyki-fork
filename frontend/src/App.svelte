<script>
import Router from "svelte-spa-router";
import NotFound from "./routes/NotFound.svelte";
import Topics from "./routes/Topics.svelte";
import Home from "./routes/Home.svelte";
import Topic from "./routes/Topic.svelte";
import User from "./routes/User.svelte";
import Mainpage from "./routes/Mainpage.svelte";
import Login from "./routes/Login.svelte";

	let routes = {
		"/": Mainpage,
		"/home": Home,
		"/topics": Topics,
		"/topic/:id": Topic,
		"/user": User,
		"/login": Login,

		"*": NotFound
	}

</script>

<main>
	
	<Router {routes} />
	
	
</main>