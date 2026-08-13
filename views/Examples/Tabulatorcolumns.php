<?php
	$includesArray = [
		'title' => 'Search',
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
				<h1>TabulatorColumns</h1>
			</header>
			<aside class="col-lg-3">
				<div id="sidenav" class="list-group sticky-lg-top small">
				</div>
			</aside>
			<main class="col-lg-9">
				<h2 class="h3" id="concept" data-nav-level="1">Basic Concept</h2>
				<p>
					To make a Tabulator table more flexible TabulatorColumns 
					allows administrators to add columns via a config file and 
					code snippets.<br>
					The Snippet endpoint then reads the snippets and assembles 
					them into an array of tabulator column definitions that can 
					be used in the tabulator config.
				</p>


				<h2 class="h3" id="config" data-nav-level="1">Config</h2>
				<p>
					In an config file add a "list_columns" array with additional column instructions.<br>
					These column instructions are associative arrays with a 'js' entry that points to a <a href="#snippets">javascript snippet</a>.
				</p>
				<pre class="border"><code class="language-php"><?= htmlentities(
					'<?php' . "\n" .
					'/* ... */' . "\n" .
					'$config["list_columns"] = [' . "\n" .
					'	"some_column" => [' . "\n" .
					'		// load snippet from /application/views/jssnippets/tabulatorcolumns/some_column.js' . "\n" .
					'		"js" => "jssnippets/tabulatorcolumns/some_column.js"' . "\n" .
					'	],' . "\n" .
					'	/* ... */' . "\n" .
					'];' . "\n" .
					'/* ... */'
				); ?></code></pre>
				<p class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<span>
						Some apps like Studierendenverwaltung allow in addition 
						to the "js" entry a "default" and a "joins" entry.<br>
						<b>default:</b> A SQL <code>SELECT</code> 
						statement that holds the default value for the column.<br>
						<b>joins:</b> An array of tables and 
						<code>JOIN</code> conditions that should be added to the 
						query.<br>
						They are stored in an array where the first element is the name of the table (or a subselect) and optional a table alias.<br>
						The second element is the condition for joining the table.<br>
						The third is optional and specifies if the table should be joined <code>LEFT</code> or <code>RIGHT</code>.<br>
						This fourth is optional and specifies the position in the 
						query. (<code>before_xxx</code>, <code>after_xxx</code> 
						or <code>end</code>, where xxx stands for another 
						tablename or -alias)
					</span>
				</p>


				<h2 class="h3" id="snippets" data-nav-level="1">Snippets</h2>
				<p>
					Snippets are stored in the view folder of Codeigniter.<br>
					The are javascript files that should <code>return</code> an 
					<code>array</code> of <code>object</code>s or a single 
					<code>object</code> at the end.<br>
					Each object is a 
					<a href="https://www.tabulator.info/docs/5.6/columns/#definition" target="_blank">tabulator column definition</a>.
				</p>
				<p class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<span>
						Altough snippets could be stored anywhere in the view 
						folder it's advised to store them in 
						<code>views/jssnippets/tabulatorcolumns/</code> or in an appropriate subfolder.
					</span>
				</p>
				<p class="alert alert-warning d-flex align-items-center" role="alert">
					<i class="fa-solid fa-triangle-exclamation flex-shrink-0 me-3" role="img" aria-label="Warning:"></i>
					<span>
						The endpoint automaticially adds the main snippet located in 
						<code>views/jssnippets/tabulatorcolumns/<i>_configname_</i>.js</code>, 
						where <i>_configname_</i> is the name of the config 
						holding the <a href="#config" class="alert-link">"list_columns" instructions</a>.
					</span>
				</p>

				<h3 class="h4" id="snippets-examples" data-nav-level="2">Examples</h3>
				<pre class="border"><code class="language-js"><?= htmlentities(
					'/* any helper code can go here */' . "\n" . "\n" .
					'return {' . "\n" .
					'	/* tabulator column definition */' . "\n" .
					'};'
				); ?></code></pre>
				<pre class="border"><code class="language-js"><?= htmlentities(
					'/* any helper code can go here */' . "\n" . "\n" .
					'return [' . "\n" .
					'	{' . "\n" .
					'		/* tabulator column definition */' . "\n" .
					'	},' . "\n" .
					'	{' . "\n" .
					'		/* tabulator column definition */' . "\n" .
					'	}' . "\n" .
					'];'
				); ?></code></pre>



				<h2 class="h3" id="tabulator" data-nav-level="1">Integration in Tabulator</h2>
				<p>
					Integrating in a table is as simple as importing the snippet 
					endpoint and using the result as column parameter in the 
					tabulator config.<br>
					The import path must be from the codeigniter base <code>/js/tabulatorcolumns/<i>_configname_</i>.js</code>.<br>
					Where <i>_configname_</i> is the name of the config holding 
					the <a href="#config">"list_columns" instructions</a>.<br>
					i.e: ../../../index.ci.php/js/tabulatorcolumns/lvverwaltung.js
				</p>
				<pre class="border"><code class="language-js"><?= htmlentities(
					'/* _configname_ here is the name of the config where "list_columns" is defined */' . "\n" .
					'import TabulatorColumns from \'.../index.ci.php/js/tabulatorcolumns/_configname_.js\';' . "\n" . "\n" .
					'/* ... */' . "\n" . "\n" .
					'tabulatorOptions: {' . "\n" .
					'	columns: TabulatorColumns,' . "\n" .
					'	/* ... */' . "\n" .
					'},' . "\n" . "\n" .
					'/* ... */'
				); ?></code></pre>
			</main>
		</div>
	</div>

	<style type="text/css">
		@import url("https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css");
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
	<script>hljs.configure({cssSelector:'pre code:not([data-highlighted="yes"])'});hljs.highlightAll();</script>

<?php $this->load->view('templates/FHC-Footer', $includesArray); ?>
