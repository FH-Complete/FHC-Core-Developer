<?php
	$includesArray = [
		'title' => 'My Extension - VueJs Examples - Apps',
		'vue3' => true,
		'axios027' => true,
		'bootstrap5' => true,
		'fontawesome6' => true,
		'primevue3' => true,
		'navigationcomponent' => true,
		'filtercomponent' => true,
		'customCSSs' => [
			'public/extensions/FHC-Core-Developer/css/VueJs.css'
		],
		'customJSModules' => [
			// Load Vue Apps
			'public/extensions/FHC-Core-Developer/js/apps/Examples.js',
			'public/extensions/FHC-Core-Developer/js/apps/examples/Api/Basic.js',
		]
	];
	$this->load->view('templates/FHC-Header', $includesArray);
?>

	<div id="main">
		<div id="nav">
			<core-navigation-cmpt></core-navigation-cmpt>
		</div>

		<div id="content" class="row flex-row-reverse">
			<header class="fhc-header">
				<h1>VueJs Examples<small>FhcApps</small></h1>
			</header>
			<aside class="col-lg-3">
				<div id="sidenav" class="list-group sticky-lg-top">
					<a href="#load" class="list-group-item list-group-item-action">
						Load an App
					</a>
					<a href="#load-explained" class="list-group-item list-group-item-action">
						<span class="ps-3">
							- What happens behind the scenes?
						</span>
					</a>
					<a href="#initiate" class="list-group-item list-group-item-action">
						Make App extendable
					</a>
					<a href="#extend" class="list-group-item list-group-item-action">
						Extend App
					</a>
					<a href="#extend-functions" class="list-group-item list-group-item-action">
						<span class="ps-3">
							- Available functions
						</span>
					</a>
				</div>
			</aside>
			<main class="col-lg-9">
				<h2 class="h3" id="load">Load an App</h2>
				<p>
					To make an App extedable you first need to load it with the fhcApps directive in the Codeigniter view.
					<br>
					Use the path relative to <code>/public/js/apps</code> without any suffix (.js)
					<br>
					For Apps inside Extensions use the Extensions name and a colon as suffix.
				</p>
				<pre class="border"><code class="language-php"><?= htmlentities(
					'<?php' . "\n" .
					'$includesArray = [' . "\n" .
					'	\'fhcApps\' => [' . "\n" .
					'		// Load App (standard way)' . "\n" .
					'		// location: /public/js/apps/MyApp.js' . "\n" .
					'		\'MyApp\' => [' . "\n" .
					'		// Load App from subfolder:' . "\n" .
					'		// location: /public/js/apps/Subfolder/MyApp.js' . "\n" .
					'		\'Subfolder/MyApp\' => [' . "\n" .
					'		// Load App from Extension' . "\n" .
					'		// location in Extension: /public/js/apps/MyApp.js' . "\n" .
					'		\'FHC-Core-MyExtension:MyApp\' => [' . "\n" .
					'		// Load App from Extension and subfolder' . "\n" .
					'		// location in Extension: /public/js/apps/Subfolder/MyApp.js' . "\n" .
					'		\'FHC-Core-MyExtension:Subfolder/MyApp\' => [' . "\n" .
					'	]' . "\n" .
					'];' . "\n" .
					'...' . "\n" .
					'$this->load->view(\'templates/FHC-Header\', $includesArray);' . "\n" .
					'...' . "\n" .
					'$this->load->view(\'templates/FHC-Footer\', $includesArray);' . "\n" .
					'...' . "\n" .
					'?>'
				); ?></code></pre>
				<h3 class="h4" id="load-explained">What happens behind the scenes?</h3>
				<p>
					This directive loads in order:
				</p>
				<ul>
					<li>A CSS file located in <code>/public/css/apps/APP_PATH_AND_NAME.css</code> (if available)</li>
					<li>All css files located in <code>/public/css/extend_app/APP_PATH_AND_NAME.css</code> (if available) in all Extensions</li>
					<li>The <code>FhcApps.js library</code> located in the core in <code>/public/js/FhcApps.js</code></li>
					<li>All js files located in <code>/public/js/extend_app/APP_PATH_AND_NAME.js</code> 
					(if available) in all Extensions as Module</li>
					<li>The js file located in <code>/public/js/apps/APP_PATH_AND_NAME.js</code></li>
				</ul>

				<h2 class="h3" id="initiate">Make App extendable</h2>
				<p>
					Once the App is load via this directive the <code>FhcApps.js library</code> is available inside the script file.
					<br>
					Use the <code>makeExtendable()</code> functions on the 
					app object (and the router object if available) to make 
					them extendable by Extensions.
				</p>
				<pre class="border"><code class="language-js"><?= htmlentities(
					'const router = VueRouter.createRouter({' . "\n" .
					'	...' . "\n" .
					'});' . "\n" .
					'const app = Vue.createApp({' . "\n" .
					'	...' . "\n" .
					'});' . "\n" . "\n" .
					'...' . "\n" . "\n" .
					'// Make router extendable:' . "\n" .
					'FhcApps.router.makeExtendable(router);' . "\n" . "\n" .
					'// Make app extendable:' . "\n" .
					'FhcApps.makeExtendable(app);' . "\n" . "\n" .
					'app' . "\n" .
					'	.use(router)' . "\n" .
					'	// other code' . "\n" .
					'	.mount(...);'
				); ?></code></pre>

				<h2 class="h3" id="extend">Extend App</h2>
				<p>
					To extend an existing App that was made extendable via 
					above mentioned means. Just create a file in the 
					<code>/public/js/extend_app/</code> 
					folder with the same name and subpath as the original App.
					<br>
					Inside this Extension file use the <code>FhcApps library</code> to extend the App as pleased.
				</p>
				<p class="alert alert-info">
					Note: If the original App is located inside another 
					Extension. Use the folder 
					<code>/public/js/extend_app/extensions/EXTENSION_NAME/</code> 
					instead.
				</p>

				<h3 class="h4" id="extend-functions">Available functions</h3>
				<ul class="list-group mb-3">
					<li id="extend-functions-addRoute" class="list-group-item list-group-item-primary">
						router.addRoute
					</li>
					<li class="list-group-item">
						Adds a Route Record to the extendable Router.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">router.addRoute(route)</samp>
						<samp class="d-block">router.addRoute(parentName, route)</samp>
					</li>
					<li class="list-group-item">
						<table class="table table-sm">
							<thead class="">
								<tr>
									<th>Parameter</th>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><code>route</code></td>
									<td>object</td>
									<td>Route Record to add</td>
								</tr>
								<tr>
									<td><code>parentName</code></td>
									<td>string</td>
									<td>Parent Route Record where route should be appended at.</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>
			</main>
		</div>
	</div>

	<style type="text/css">
		@import url("https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css");
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
	<script>hljs.configure({cssSelector:'pre code:not([data-highlighted="yes"])'});hljs.highlightAll();</script>

<?php $this->load->view('templates/FHC-Footer', $includesArray); ?>
