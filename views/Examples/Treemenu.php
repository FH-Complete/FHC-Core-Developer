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
				<h1>Treemenu</h1>
			</header>
			<aside class="col-lg-3">
				<div id="sidenav" class="list-group sticky-lg-top small">
				</div>
			</aside>
			<main class="col-lg-9">
				<h2 class="h3" id="concept" data-nav-level="1">Basic Concept</h2>
				<p>
					The base concept is to delegate the handling of the menu to a user defined library.<br>
					This should help customizing menues and finding the correct method responsible for creating a menu entry or submenu.
				</p>


				<h2 class="h3" id="library" data-nav-level="1">Library</h2>
				<p>
					The Treemenu endpoint calls a <a href="#config-library">user defined library</a> to generate the menu.<br>
					For this to work, the library has to have certain members and functions. They are described in this chapter.
				</p>
				<p class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<span>
						Altough these libraries could be stored anywhere it's 
						advised to store all-purpose libraries (those which 
						provide code that is used in more than one app) in 
						<code>libraries/treemenu/base/</code> and app specific 
						libraries in <code>libraries/treemenu/</code>.
					</span>
				</p>

				<h3 class="h4" id="library-members" data-nav-level="2">Members</h3>

				<h4 class="h5" id="library-members-config" data-nav-level="3" data-nav-title="config">
					$config <small>array <code>required</code></small>
				</h4>
				<p>
					This is the heart of the treemenu. The config is the template 
					for the menu that should be rendered. Every node on this 
					template will be rendered into one or more menu entries, 
					depending on the implementation of the corresponding method.<br>
					The config can be set directly or inside the constructor and should not be altered afterwards.
				</p>
				<p class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<span>
						For core librarys it is best to load it from a config 
						file inside the constructor, so minor changes can be 
						realized via a simple config entry.<br>
						As above it is possible to store the config file anywhere 
						in the config folder but as a convention it is advised to 
						store it in either <code>config/treemenu/</code> for 
						all-purpose libraries or in 
						<code>config/treemenu/custom/</code> for app specific 
						ones.
					</span>
				</p>

				<h4 class="h5" id="library-members-redirect_method" data-nav-level="3" data-nav-title="redirect_method">
					$redirect_method <small>array</small>
				</h4>
				<p>
					If different treemenu nodes share code or code that would 
					render the entries already exist elsewhere, those nodes 
					generation method can be redirected.<br>
					The keys of this array are the name of the node that would be 
					redirected and the values are either the method name to 
					direct to, or an 
					<a href="https://www.php.net/manual/de/language.types.callable.php" target="_blank">callable</a> 
					that should be executed.
				</p>
				<p class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<span>
						If nodes share their generation method it is usefull to utilize the 
						<a href="#library-methods-arguments-original_method" class="alert-link">$original_method</a> 
						argument.
					</span>
				</p>

				<h4 class="h5" id="library-members-path_to_argument" data-nav-level="3" data-nav-title="path_to_argument">
					$path_to_argument <small>array</small>
				</h4>
				<p>
					Normally when generating the entries you would need information about the parent. This is realized with the 
					<a href="#library-methods-arguments">smart arguments</a>.<br>
					However if you want to rename one of the variables you can use this array.<br>
					The key represents the original node name and the value is the new variable name used in the methods arguments.
				</p>

				<h3 class="h4" id="library-methods" data-nav-level="2">Methods</h3>
				<p>
					For each node there has to be a corresponding method. If not declared otherwise (
					<a href="library-members-redirect_method">see above</a>
					) its name must be the same as the node name (using camelCase).
				</p>

				<h4 class="h5" id="library-methods-result" data-nav-level="3">
					Result
				</h4>
				<p>
					The return value must be an array with each entry representing one menu entry.<br>
					A menu entry can be an associative array or a stdclass object with the following members:
				</p>
				
				<h5 class="h6" id="library-methods-result-path" data-nav-level="4" data-nav-title="path">
					path <small>string <code>required</code></small>
				</h5>
				<p>
					The relative path to load the submenues for this entry.<br>
					Use the 
					<a href="#library-methods-arguments-path_template">$path_template</a> 
					argument to generate it.
				</p>
				<h5 class="h6" id="library-methods-result-name" data-nav-level="4" data-nav-title="name">
					name <small>string|array <code>required</code></small>
				</h5>
				<p>
					The Label that is displayed in the frontend.<br>
					If it's an array it will be passed into the translation function (<code>this.$p.t()</code>).<br>
					Otherwise it will be displayed as is.
				</p>
				<h5 class="h6" id="library-methods-result-title" data-nav-level="4" data-nav-title="title">
					title <small>string|array</small>
				</h5>
				<p>
					The title attribute of the entrys DOM element.<br>
					If it's an array it will be passed into the translation function (<code>this.$p.t()</code>).<br>
					Otherwise it will be displayed as is.
				</p>
				<h5 class="h6" id="library-methods-result-search" data-nav-level="4" data-nav-title="search">
					search <small>string</small>
				</h5>
				<p>
					Additional string that will be queried if the treemenues search filter is used.
				</p>
				<h5 class="h6" id="library-methods-result-droplink" data-nav-level="4" data-nav-title="droplink">
					droplink <small>array</small>
				</h5>
				<p>
					Makes the entry into a drop area.<br>
					The first element in the array is the effect (and a possible 
					strict modifier) and every thing after that are allowed types 
					(if any). <br>
					See drop directive for further details.
				</p>
				<h5 class="h6" id="library-methods-result-draggable" data-nav-level="4" data-nav-title="draggable">
					draggable <small>array</small>
				</h5>
				<p>
					Makes the entry into a draggable.<br>
					The first element in the array is the allowed effects and the second is the JSON encoded value.<br>
					See draggable directive for further details.
				</p>
				<h5 class="h6" id="library-methods-result-leaf" data-nav-level="4" data-nav-title="leaf">
					leaf <small>boolean</small>
				</h5>
				<p>
					Tells the frontend whether the entry has children or not.<br>
					If <code>true</code> the entry has no children and thus the 
					frontend should not render a toggler arrow for this entry (
					see <a href="https://v3.primevue.org/treetable/#api.options.TreeNode.leaf" target="_blank">PrimeVue</a>).
				</p>

				<h4 class="h5" id="library-methods-arguments" data-nav-level="3">
					Smart arguments
				</h4>
				<p>
					Arguments for the methods are chosen by the implementation. 
					The endpoint controller tries to provide the requested values 
					based on their names.<br>
					In addition to the fixed ones named below, there is one 
					possible argument for each parent node in the treemenu.<br>
					Its name is, if not changed via the 
					<a href="#library-members-path_to_argument">$path_to_argument</a> 
					property, the same as the node is given in the 
					<a href="#library-members-config">$config</a> 
					array.
				</p>
				
				<h5 class="h6" id="library-methods-arguments-path_template" data-nav-level="4" data-nav-title="path_template">
					$path_template <small>string</small>
				</h5>
				<p>
					This is a string ready to use in a <code>sprintf</code> 
					function. It has one directive which should be an identifying 
					value for the specific menu entry. Meaning it should be 
					unique inside the result array.
				</p>

				<h5 class="h6" id="library-methods-arguments-has_children" data-nav-level="4" data-nav-title="has_children">
					$has_children <small>boolean</small>
				</h5>
				<p>
					The value tells you if the node that is processed has children in the <a href="#library-members-config">$config</a> array.<br>
					This can be used to set the <a href="#library-methods-result-leaf">leaf</a> parameter in the result entries.
				</p>

				<h5 class="h6" id="library-methods-arguments-original_method" data-nav-level="4" data-nav-title="original_method">
					$original_method <small>string</small>
				</h5>
				<p>
					This argument has the name of the node is processed as value.<br>
					This is mainly used if the generation is redirected via the <a href="#library-members-redirect_method">$redirect_method</a> array.
				</p>


				<h2 class="h3" id="config" data-nav-level="1">Config</h2>
				<p class="lead">
					/application/config/treemenu.php
				</p>
				<p>
					Each treemenu has its own config array inside the main <code>$config</code> variable.
					The key is the name of the treemenu used in the <a href="#component-properties-config">components config property</a>.
				</p>

				<h3 class="h4" id="config-library" data-nav-level="2" data-nav-title="Library">
					Library <small>string</small>
				</h3>
				<p>
					Relative path of the library to use.
				</p>

				<h3 class="h4" id="config-permissions" data-nav-level="2" data-nav-title="Permissions">
					Permissions <small>string|array</small>
				</h3>
				<p>
					Permissions to view the treemenu at all. (Should be the same as the permission of the app in which the treemenu is enbedded in)
				</p>

				<h2 class="h3" id="endpoints" data-nav-level="1">Endpoints</h2>
				<p>
					The <code>path</code> value of the selected menu entry should be passed as argument to the <code>data()</code> function of 
					the treemenu api factory (
					<code>/public/js/api/factory/treemenu.js</code>
					) and called via the 
					<a href="<?= site_url('extensions/FHC-Core-Developer/examples/vuejs/api#plugin-usage-get'); ?>">FHC-Api</a>.<br>
					This will result in a call to 
					<code>/api/frontent/v1/treemenudata/<i>&lt;treemenu-name&gt;</i>/<i>&lt;data-function-argument&gt;</i></code> 
					which can be overwritten in the <code>routes.php</code> 
					config.
				</p>
				<p class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<span>
						The 
						<a href="<?= site_url('studvw'); ?>" target="_blank" class="alert-link">Studierenden Verwaltung</a> and the 
						<a href="<?= site_url('lVVerwaltung'); ?>" target="_blank" class="alert-link">LV Verwaltung</a> 
						are fully or partially using the 
						<a href="<?= site_url('extensions/FHC-Core-Developer/examples/tabulatorcolumns'); ?>" class="alert-link">Tabulatorcolumns</a> 
						to manage their columns.<br>
						Keep that in mind when extending an endpoint.
					</span>
				</p>
				<p class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<span>
						The 
						<a href="<?= site_url('studvw'); ?>" target="_blank" class="alert-link">Studierenden Verwaltung</a> 
						utilizes the SudentListLib to ensure every endpoint call 
						returns the correct columns, even if the columns are 
						manipulated by other extensions. So be sure to use it in 
						every custom endpoint call.
					</span>
				</p>

				<h2 class="h3" id="component" data-nav-level="1">Treemenu Component</h2>
				<p class="lead">
					/public/js/components/Base/Treemenu.js
				</p>

				<h3 class="h4" id="component-properties" data-nav-level="2">Properties</h3>

				<h4 class="h5" id="component-properties-config" data-nav-level="3" data-nav-title="config">
					config <small>string</small>
				</h4>
				<p>
					Which treemenu to use.<br>
					It uses the config of that name given in <code>application/config/treemenu.php</code>.
				</p>

				<h4 class="h5" id="component-properties-preselectedkey" data-nav-level="3" data-nav-title="preselected-key">
					preselected-key <small>array</small>
				</h4>
				<p>
					Preselects the given entry.<br>
					This property is utilizing VueJs' reactiveness, so changing 
					the input imediately changes the selected entry (and emits a 
					select-entry event).<br>
					The array must be the url segments that lead to the menu entry.<br>
					e.g: <code>['stg', 'bbe', 'semester', '5']</code>
				</p>
				<div class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<div>
						<p>
							If the treemenu is reflected in the apps url, then 
							the <code>$route</code>s <code>param</code> can 
							provide the <code>preselect-key</code>.
						</p>
						<pre class="border"><code class="language-js"><?= htmlentities(
							'const router = VueRouter.createRouter({' . "\n" .
							'	...' . "\n" .
							'	routes: [' . "\n" .
							'		...' . "\n" .
							'		{ path: \':treemenu(.*)*\', component: ... },' . "\n" .
							'		...' . "\n" .
							'	]' . "\n" .
							'});'
						); ?></code></pre>
						<pre class="border"><code class="language-html"><?= htmlentities(
							'<base-treemenu' . "\n" .
							'	:preselected-key="$route.params.treemenu"' . "\n" .
							'></base-treemenu>'
						); ?></code></pre>
					</div>
				</div>

				<h3 class="h4" id="component-emits" data-nav-level="2">Emits</h3>

				<h4 class="h5" id="component-emits-selectentry" data-nav-level="3">@select-entry</h4>
				<p>
					Fires if an entry is selected by the user or by changing the <cod>preselected-key</cod> property.<br>
					The event holds the data for this entry (the fields that are returned from the db or the librarys function).
				</p>
				<div class="alert alert-info d-flex align-items-center" role="alert">
					<i class="fa-solid fa-circle-info flex-shrink-0 me-3" role="img" aria-label="Hint:"></i>
					<div>
						<p>
							If the treemenu is reflected in the apps url, then this emit should add a <code>route</code> to the <code>$router</code>.
						</p>
						<pre class="border"><code class="language-js"><?= htmlentities(
							'export default {' . "\n" .
							'	...' . "\n" .
							'	methods: {' . "\n" .
							'		onSelectTreeNode(node) {' . "\n" .
							'			this.$router.push({' . "\n" .
							'				// example for named routes' . "\n" .
							'				// assuming there is a route:' . "\n" .
							'				// { name: \'tm\', path: \':tmpath(.*)*\', ... }' . "\n" .
							'				name: \'tm\',' . "\n" .
							'				params: {' . "\n" .
							'					tmpath: node.path.split(\'/\')' . "\n" .
							'				}' . "\n" .
							'			});' . "\n" .
							'		},' . "\n" .
							'		...' . "\n" .
							'	},' . "\n" .
							'	...' . "\n" .
							'	template: /* html */`' . "\n" .
							'		...' . "\n" .
							'		<base-treemenu @select-entry="onSelectTreeNode"/>' . "\n" .
							'		...' . "\n" .
							'	`' . "\n" .
							'};'
						); ?></code></pre>
					</div>
				</div>

				<h4 class="h5" id="component-emits-drop" data-nav-level="3">@drop</h4>
				<p>
					If a drop event occurs on an entry that has the appropriate droplist value in its data, this event will trigger.<br>
					The event argument is an <code>object</code> holding the data 
					of the entry in its <code>drop</code> member and the data of 
					the dragged item(s) in its <code>drag</code> member.
				</p>
			</main>
		</div>
	</div>

	<style type="text/css">
		@import url("https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css");
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
	<script>hljs.configure({cssSelector:'pre code:not([data-highlighted="yes"])'});hljs.highlightAll();</script>

<?php $this->load->view('templates/FHC-Footer', $includesArray); ?>
