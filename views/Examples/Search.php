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
				<h1>Search</h1>
			</header>
			<aside class="col-lg-3">
				<div id="sidenav" class="list-group sticky-lg-top small">
				</div>
			</aside>
			<main class="col-lg-9">
				<h2 class="h3" id="searchbar" data-nav-level="1">Searchbar</h2>
				<p class="lead">
					/public/js/components/searchbar/searchbar.js
				</p>

				<h3 class="h4" id="searchbar-properties" data-nav-level="2">Properties</h3>

				<h4 class="h5" id="searchbar-properties-function" data-nav-level="3" data-nav-title="ShowSubmitButton">
					show-btn-submit <small>boolean</small>
				</h4>
				<p>
					If set to <code>true</code> a submit button will appear in the searchbar.
				</p>

				<h4 class="h5" id="searchbar-properties-function" data-nav-level="3" data-nav-title="Searchfunction">
					searchfunction <small>function</small>
				</h4>
				<p>
					This needs to call an endpoint which utilizes the <a href="#library">SearchLib</a> library
				</p>

				<h4 class="h5" id="searchbar-properties-options" data-nav-level="3" data-nav-title="Searchoptions">
					searchoptions <small>object</small>
				</h4>
				<table class="table table-sm">
					<thead>
						<tr>
							<th>Key</th>
							<th>Type</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>origin</td>
							<td><code>string</code></td>
							<td>A unique string that is used to store the last query and type selections</td>
						</tr>
						<tr>
							<td>types</td>
							<td><code>array</code>&lt;<code>string</code>&gt; | <code>object</code></td>
							<td>
								A list of search types. If it is an 
								<code>object</code> 
								the keys are search types and the values are translations of those types
							</td>
						</tr>
						<tr>
							<td>actions</td>
							<td><code>object</code></td>
							<td>
								The keys are the searchtypes and the values are themselves object consisting of a 
								<code>defaultaction</code> (actionobject) 
								and <code>childactions</code> (an array of actionobjects).<br>
								<code>actionobject</code>:
								<table class="table table-sm">
									<thead>
										<tr>
											<th>Key</th>
											<th>Type</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>type</td>
											<td><code>string</code></td>
											<td><code>link</code> or <code>function</code></td>
										</tr>
										<tr>
											<td>action</td>
											<td><code>function</code> | <code>string</code></td>
											<td>
												Depending on the type either the <code>href</code> value or an onclick handler
											</td>
										</tr>
										<tr>
											<td>renderif</td>
											<td><code>function</code> <i>(optional)</i></td>
											<td>
												A function that returns whether the action should be displayed or not
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td>mergeResults</td>
							<td><code>string</code> <i>(optional)</i></td>
							<td>
								Possible values:<br>
								<code>student</code> - 
								combines student and prestudent datasets (using the uid) 
								and displays them with the mergedStudent renderer<br>
								<code>person</code> - 
								combines person, employee, student and prestudent datasets (using the person_id) 
								and displays them with the mergedPerson renderer
							</td>
						</tr>
						<tr>
							<td>nolivesearch</td>
							<td><code>boolean</code> <i>(optional)</i></td>
							<td>If <code>true</code> disables the live search (preview)</td>
						</tr>
						<tr>
							<td>calcheightonly</td>
							<td><code>boolean</code> <i>(optional)</i></td>
							<td>If <code>true</code> only sets the results height. Otherwise (default) also sets the width and absolute position</td>
						</tr>
					</tbody>
				</table>

				<h3 class="h4" id="searchbar-powerfeatures" data-nav-level="2">Powerfeatures</h3>
				<p>
					There are some hidden features in the searchbar component with which you can add more control to your search
				</p>
				<h4 class="h5" id="searchbar-powerfeatures-quotation" data-nav-level="3">Using quotation marks</h4>
				<p>
					If a searchword contains spaces it has to be encapsuled in quotation marks (") to ensure it is registered as a single searchword
				</p>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="&quot;searchword&quot;" class="form-control" readonly>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="&quot;Doe Smith&quot;" class="form-control" readonly>
				</div>
				<h4 class="h5" id="searchbar-powerfeatures-or" data-nav-level="3">Keyword: or</h4>
				<p>
					Normally searchwords separated by a space will be combined with an AND logic. 
					To search for either one of two or more chunks of searchwords separate them with the keyword "or"
				</p>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="searchwords or searchwords" class="form-control" readonly>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="John Doe or Jane Doe" class="form-control" readonly>
				</div>
				<h4 class="h5" id="searchbar-powerfeatures-not" data-nav-level="3">Operator: not</h4>
				<p>
					By adding a minus ("-") in front of a searchword it will be negated.
				</p>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="-searchword" class="form-control" readonly>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="-John" class="form-control" readonly>
				</div>
				<h4 class="h5" id="searchbar-powerfeatures-type" data-nav-level="3">Filter: searchtype</h4>
				<p>
					You can filter by searchtype(s) without using the 
					dropdown by writing a colon (":") and the name of the 
					searchtype (or an alias) into the search input
				</p>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value=":searchtype" class="form-control" readonly>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value=":person :room" class="form-control" readonly>
				</div>
				<h4 class="h5" id="searchbar-powerfeatures-field" data-nav-level="3">Filter: searchfield</h4>
				<p>
					To limit a search word to a single field in the database 
					use the name of the searchfield (or an alias) and a 
					colon (":") and then the searchword.
				</p>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="field:searchword" class="form-control" readonly>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input type="text" value="firstname:John lastname:Doe" class="form-control" readonly>
				</div>
				<h4 class="h5" id="searchbar-powerfeatures-combinations">Combinations</h4>
				<p>
					Combinations of the above are also allowed
				</p>
				<div class="input-group mb-3">
					<span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
					<input
						type="text"
						value="firstname:John -lastname:Doe or Jane -lastname:&quote;Doe Smith&quote; -:employee"
						class="form-control"
						readonly
					>
				</div>


				<h2 class="h3" id="library" data-nav-level="1">Search Library</h2>
				<p class="lead">
					/application/libraries/SearchLib.php
				</p>
				<p>
					The SearchLib library is where all the magic happens. 
					It can be called anywhere but it is recommend to use the 
					Searchbar endpoint located in /application/controllers/api/frontend/v1/Searchbar.php 
					where it is already integrated inside the <code>searchAdvanced</code> function.
				</p>

				<h3 class="h4" id="library-constructor" data-nav-level="2">Constructor</h3>
				<p>
					In constructor the <a href="#config">config file</a> can be set as param.
					If not set it defaults to 'search'
				</p>
				<pre class="border"><code class="language-php"><?= htmlentities(
					'$this->load->library("SearchLib", [' . "\n" .
					'	// loads: application/config/searchconfig.php' . "\n" .
					'	"config" => "searchconfig"' . "\n" .
					']);' . "\n"
				); ?></code></pre>

				<ul class="list-group mb-3">
					<li id="library-search" class="list-group-item list-group-item-primary" data-nav-level="2" data-nav-title="Search">
						search
					</li>
					<li class="list-group-item">
						Do a search.<br><br>
						Returns: a <code>retval object</code><br>
						On success an additional meta array is added to the retval object<br>
						<code>time</code> the time used in milliseconds<br>
						<code>searchstring</code> the cleaned up searchstring
					</li>
					<li class="list-group-item">
						<samp class="d-block">search($searchstring)</samp>
						<samp class="d-block">search($searchstring, $types)</samp>
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
									<td><code>$searchstring</code></td>
									<td>string</td>
									<td>The string to search for</td>
								</tr>
								<tr>
									<td><code>$types</code></td>
									<td>array</td>
									<td>The array specifying the searchtypes that should be searched<br> 
									If empty all searchtypes defined in the <a href="#config">search config</a> are used
								</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>


				<h2 class="h3" id="functions" data-nav-level="1">Search Functions Config</h2>
				<p class="lead">
					/application/config/searchfunctions.php
				</p>
				<p>
					This file contains all compare functions that are usable inside the <a href="#config">search config files</a>.<br>
					Each compare function is described by an associative array that controls how the comparision is handled in the database query.
				</p>

				<h3 class="h4" id="functions-props" data-nav-level="2">Properties</h3>

				<h4 class="h5" id="functions-props-priority" data-nav-level="3" data-nav-title="Priority">
					priority <small>integer</small>
				</h4>
				<p>
					This helps to speed up the overall query. 
					Faster functions should have higher priority values. 
					So they are executed first and reduce the amound of datasets that are filtered.
				</p>
				<h4 class="h5" id="functions-props-rank" data-nav-level="3" data-nav-title="Rank">
					rank* <small>string</small>
				</h4>
				<p>
					SQL query part that calculates the ranking for the comparision. 
					The result should be between 0 and 1, where 0 is a perfect match. 
					If the compare function (see below) returns false then the rank is 1 regardless what this function returns.
				</p>
				<h4 class="h5" id="functions-props-compare" data-nav-level="3" data-nav-title="Compare">
					compare* <small>string</small>
				</h4>
				<p>
					SQL query part that calculates if the word matches the searchfield. The result needs to be a boolean.
				</p>
				<h4 class="h5" id="functions-props-compare_boolean" data-nav-level="3" data-nav-title="Compare Boolean">
					compare_boolean* <small>string</small>
				</h4>
				<p>
					Same as above (compare) but used if a word is excluded (has the "-" operator). 
					This SQL query part will be surounded by the <code>NOT</code> operator.
				</p>
				<h4 class="h5" id="functions-props-force_integer" data-nav-level="3" data-nav-title="Force Integer">
					force_integer <small>boolean</small>
				</h4>
				<p>
					If set, words that are not integers (or can be converted 
					into integers) are considered not equal and are not 
					processed for this searchfield. 
					This is used to speed up performance.
				</p>
				<p>
					* The following keywords will be replaced and escaped:<br>
					<code>{field}</code>: the searchfields name<br>
					<code>{word}</code>: the current search word<br>
					<code>{like:word}</code>: the current search word with a '%' at the beginning and the end
				</p>


				<h2 class="h3" id="config" data-nav-level="1">Search Config</h2>
				<p class="lead">
					/application/config/
				</p>
				<p>
					The config will be loaded by the 
					<a href="#library">SearchLib</a> 
					and contains all information that will be needed to search in the database. 
				</p>
				<p>
					Each config file will have it's own set of searchtypes and will control which fields are allowed to search for or to display.
				</p>

				<h3 class="h4" id="config-syntax" data-nav-level="2">Syntax</h3>
				<p>
					The config is an associative array.
				</p>
				<p>
					The keys at the top level are the searchtype names (e.g: student, person, room).<br>
					The values are associative arrays described in chapter <a href="#config-syntax-searchtype">SearchType</a>
				</p>
				<ul class="list-group mb-3">
					<li id="config-syntax-searchtype" data-nav-level="3" class="list-group-item list-group-item-primary">
						SearchType
					</li>
					<li class="list-group-item">
						A searchtype is a list of datasets which can be searched for specific datasets. 
						In most cases this will be a database table or a set of joined tables.
					</li>
					<li class="list-group-item">
						<table class="table table-sm">
							<thead>
								<tr>
									<th>Key</th>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>alias</td>
									<td><code>array</code>&lt;<code>string</code>&gt; <i>(optional)</i></td>
									<td>Alternative names used for <a href="#searchbar-powerfeatures-type">Powerfeatures (Filter: searchtype)</a></td>
								</tr>
								<tr>
									<td>primarykey</td>
									<td><code>string</code> | <code>array</code>&lt;<code>string</code>&gt;</td>
									<td>The primary key(s) of the database table as array or comma separated list</td>
								</tr>
								<tr>
									<td>table</td>
									<td><code>string</code></td>
									<td>The database table name</td>
								</tr>
								<tr>
									<td>searchfields</td>
									<td><code>array</code>&lt;<a href="#config-syntax-searchfield"><code>searchfield</code></a>&gt;</td>
									<td>
										An associative array describing the fields in which to search.<br>
										The keys are the field names that are used for 
										<a href="#searchbar-powerfeatures-field">Powerfeatures (Filter: searchfield)</a> 
										(e.g: firstname, uid, bezeichnung).<br>
										The values are associative arrays described in chapter <a href="#config-syntax-searchfield">SearchField</a>
									</td>
								</tr>
								<tr>
									<td>resultfields</td>
									<td><code>array</code>&lt;<code>string</code>&gt;</td>
									<td>
										Per default only the primary key is added to the result. 
										Other fields that should appear in the result must be defined here
									</td>
								</tr>
								<tr>
									<td>resultjoin</td>
									<td><code>string</code> <i>(optional)</i></td>
									<td>
										Add join statements to the result query
									</td>
								</tr>
								<tr>
									<td>renderer</td>
									<td><code>string</code> <i>(optional)</i></td>
									<td>
										Name of the result component to use. If not specified the name equals the searchtype
									</td>
								</tr>
								<tr>
									<td>prepare</td>
									<td><code>string</code> <i>(optional)</i></td>
									<td>
										Adds a 
										<code>WITH</code> 
										statement at the beginning of the search query that can be used to extend the queried data
									</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="config-syntax-searchfield" data-nav-level="3" class="list-group-item list-group-item-primary">
						SearchField
					</li>
					<li class="list-group-item">
						A searchfield is one data entry in a set which can be queried by the search. 
						In most cases this will be a column of the database table used in the current searchtype.
					</li>
					<li class="list-group-item">
						<table class="table table-sm">
							<thead>
								<tr>
									<th>Key</th>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>alias</td>
									<td><code>array</code>&lt;<code>string</code>&gt; <i>(optional)</i></td>
									<td>
										Alternative names used for 
										<a href="#searchbar-powerfeatures-field">Powerfeatures (Filter: searchfield)</a>
									</td>
								</tr>
								<tr>
									<td>comparison</td>
									<td><code>string</code></td>
									<td>
										How the searchfield will be compared to the search word(s). 
										Possible values are defined in the <a href="#functions">searchfunctions.php config</a>
									</td>
								</tr>
								<tr>
									<td>field</td>
									<td><code>string</code></td>
									<td>The database tables field or a SQL expression that will be searched</td>
								</tr>
								<tr>
									<td>join</td>
									<td>
										<a href="#config-syntax-searchfield-join"><code>join</code></a>
										|
										<code>array</code>&lt;<a href="#config-syntax-searchfield-join"><code>join</code></a>&gt;
										<i>(optional)</i>
									</td>
									<td>
										An associative array (or an array of those) described in chapter <a href="#config-syntax-join">Join</a>
									</td>
								</tr>
								<tr>
									<td>prepare</td>
									<td><code>string</code> <i>(optional)</i></td>
									<td>
										Adds a 
										<code>WITH</code> 
										statement at the beginning of the search query that can be used to extend the queried data
									</td>
								</tr>
								<tr>
									<td>1-n</td>
									<td><code>boolean</code> <i>(optional)</i></td>
									<td>
										If <code>true</code> indicates that the searchfield has more than one value.
									</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="config-syntax-searchfield-join" data-nav-level="3" class="list-group-item list-group-item-primary">
						Join
					</li>
					<li class="list-group-item">
						Adds a <code>JOIN</code> statement to the search query to get more data to search for
					</li>
					<li class="list-group-item">
						<table class="table table-sm">
							<thead>
								<tr>
									<th>Key</th>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>table</td>
									<td><code>string</code></td>
									<td>The database table to join</td>
								</tr>
								<tr>
									<td>using / on</td>
									<td><code>string</code></td>
									<td>SQL <code>USING()</code> or <code>ON()</code> statement</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>
				<h3 class="h6 mt-3" id="config-syntax-example" data-nav-level="2" data-nav-title="Example">Example:</h3>
				<pre class="border"><code class="language-php"><?= htmlentities(
					'$config["searchtype"] = [' . "\n" .
					'	"alias" => ["aliasforsearchtype"],' . "\n" .
					'	"primarykey" => "db_table_pk_field",' . "\n" .
					'	"table" => "db_table_name",' . "\n" .
					'	"searchfields" => [' . "\n" .
					'		"field_to_search_in" => [' . "\n" .
					'			"alias" => ["aliasfor_field_to_search_in"],' . "\n" .
					'			"comparision" => "equals",' . "\n" .
					'			"field" => "fieldtosearchin",' . "\n" .
					'		]' . "\n" .
					'		// ...' . "\n" .
					'	],' . "\n" .
					'	"resultfields" => [' . "\n" .
					'		"\'some_constant\' AS value_1",' . "\n" .
					'		"other_table.some_field",' . "\n" .
					'		"field_to_search_in",' . "\n" .
					'		"shared_table_field AS shared"' . "\n" .
					'		// ...' . "\n" .
					'	],' . "\n" .
					'	"resultjoin" => "JOIN other_table USING (shared_table_field)"' . "\n" .
					'];' . "\n"
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
