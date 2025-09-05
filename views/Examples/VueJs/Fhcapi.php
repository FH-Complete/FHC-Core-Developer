<?php
	$includesArray = [
		'title' => 'My Extension - VueJs Examples - FhcApi',
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
			'public/extensions/FHC-Core-Developer/js/apps/examples/Fhcapi/Basic.js',
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
				<h1>VueJs Examples<small>FhcApi</small></h1>
			</header>
			<aside class="col-lg-3">
				<div id="sidenav" class="list-group sticky-lg-top">
					<a href="#plugin" class="list-group-item list-group-item-action">
						FhcApi Plugin
					</a>
					<a href="#plugin-enable" class="list-group-item list-group-item-action">
						<span class="ps-3">
							Enable FhcApi Core Plugin in your App
						</span>
					</a>
					<a href="#plugin-options" class="list-group-item list-group-item-action">
						<span class="ps-3"><span class="ps-3">
							Options
						</span></span>
					</a>
					<a href="#plugin-usage" class="list-group-item list-group-item-action">
						<span class="ps-3">
							Usage
						</span>
					</a>
					<a href="#plugin-usage-geturi" class="list-group-item list-group-item-action">
						<span class="ps-3"><span class="ps-3">
							Get URI
						</span></span>
					</a>
					<a href="#plugin-usage-get" class="list-group-item list-group-item-action">
						<span class="ps-3"><span class="ps-3">
							GET Request
						</span></span>
					</a>
					<a href="#plugin-usage-post" class="list-group-item list-group-item-action">
						<span class="ps-3"><span class="ps-3">
							POST Request
						</span></span>
					</a>
					<a href="#plugin-usage-options" class="list-group-item list-group-item-action">
						<span class="ps-3"><span class="ps-3">
							Additional config options
						</span></span>
					</a>
					<a href="#plugin-factory" class="list-group-item list-group-item-action">
						<span class="ps-3">
							Factory
						</span>
					</a>
					<a href="#controller" class="list-group-item list-group-item-action">
						FhcApi Controller
					</a>
					<a href="#controller-returnobj" class="list-group-item list-group-item-action">
						<span class="ps-3">
							Output object
						</span>
					</a>
					<a href="#controller-output" class="list-group-item list-group-item-action">
						<span class="ps-3">
							Handle the output
						</span>
					</a>
					<a href="#controller-helper" class="list-group-item list-group-item-action">
						<span class="ps-3">
							Helper functions
						</span>
					</a>
					<a href="#example" class="list-group-item list-group-item-action">
						Examples
					</a>
				</div>
			</aside>
			<main class="col-lg-9">
				<h2 class="h3" id="plugin">FhcApi Plugin</h2>
				<p class="lead">
					/public/js/plugin/FhcApi.js
				</p>
				<p>
					Use FhcApi core plugin to make AJAX calls from anywhere inside your app.
				</p>

				<h3 class="h4" id="plugin-enable">Enable FhcApi Core Plugin in your App</h3>
				<p>
					FhcApi core plugin is using 
					<a href="<?= site_url("extensions/FHC-Core-Developer/examples/vuejs/alerts"); ?>" target="_blank">FhcAlert</a> 
					and 
					<a href="<?= site_url("extensions/FHC-Core-Developer/examples/vuejs/phrases"); ?>" target="_blank">Phrases</a> 
					Plugins to display error and success messages. They are loaded automaticially inside the plugin.<br>
					The FhcApi plugin is a wrapper for a customized 
					<a href="https://axios-http.com/" target="_blank">Axios</a> instance.<br>
					To use it, import FhcApi core plugin once into your app, to then use it from anywhere inside your app.
				</p>
				<pre class="border"><code class="language-js"><?= htmlentities(
					'// Import plugin into your app' . "\n" .
					'import FhcApi from \'../../../../js/plugin/FhcApi.js\';' . "\n" .
					"\n" .
					'const app = Vue.createApp({' . "\n" .
					'	components: {' . "\n" .
					'		// components' . "\n" .
					'	}' . "\n" .
					'});' . "\n" .
					"\n" .
					'// Use plugin in your app' . "\n" .
					'app' . "\n" .
					'	.use(FhcApi)' . "\n" .
					'	.mount(\'#main\');'
				); ?></code></pre>
				<ul class="list-group mb-3">
					<li id="plugin-options" class="list-group-item list-group-item-secondary">
						Options
					</li>
					<li class="list-group-item">
						<table class="table table-sm">
							<thead class="">
								<tr>
									<th>Option</th>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><code>factory</code></td>
									<td>object</td>
									<td>
										Loads additional Endpoints to the factory (See below).<br>
										Must be an associative array with functions as lowest tier. 
										The object this.$fhcApi will be overwritten inside those functions with the global $fhcApi object.
									</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>

				<h3 id="plugin-usage" class="h3">Usage</h2>
				<p>
					You can use the getUri <code>$fhcapi.getUri()</code> 
					function to get an absolute URI (like the CodeIgniter function: <code>site_url()</code>) or 
					use the post <code>$fhcapi.post()</code> or get <code>$fhcapi.get()</code> function to send or receive data.
				</p>
				<ul class="list-group mb-3">
					<li id="plugin-usage-geturi" class="list-group-item list-group-item-primary">
						getUri
					</li>
					<li class="list-group-item">
						Get the absolute URI from a string.<br><br>
						Returns: a <code>string</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">getUri(uri)</samp>
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
									<td><code>uri</code></td>
									<td>string</td>
									<td>The Uri part after index.ci.php</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="plugin-usage-get" class="list-group-item list-group-item-primary">
						get
					</li>
					<li class="list-group-item">
						Send a GET request<br><br>
						Returns: an axios <code>Promise</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">get(uri)</samp>
						<samp class="d-block">get(uri, params)</samp>
						<samp class="d-block">get(uri, params, config)</samp>
						<samp class="d-block">get(form, uri)</samp>
						<samp class="d-block">get(form, uri, params)</samp>
						<samp class="d-block">get(form, uri, params, config)</samp>
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
									<td><code>uri</code></td>
									<td>string</td>
									<td>The Uri of the endpoint</td>
								</tr>
								<tr>
									<td><code>params</code></td>
									<td>object</td>
									<td>The GET parameters</td>
								</tr>
								<tr>
									<td><code>config</code></td>
									<td>object</td>
									<td>
										Additional config for the axios request. Additional options see below.
									</td>
								</tr>
								<tr>
									<td><code>form</code></td>
									<td>object</td>
									<td>
										Must contain a <code>clearValidation</code> 
										and a <code>setFeedback</code> function. 
										For best practice use the 
										<a href="<?= site_url("extensions/FHC-Core-Developer/examples/vuejs/forms#formcomponent"); ?>">
											Form component
										</a>.<br>
										If this parameter is set, validations will be displayed using these functions.
									</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="plugin-usage-post" class="list-group-item list-group-item-primary">
						post
					</li>
					<li class="list-group-item">
						Send a POST request<br><br>
						Returns: an axios <code>Promise</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">post(uri)</samp>
						<samp class="d-block">post(uri, data)</samp>
						<samp class="d-block">post(uri, data, config)</samp>
						<samp class="d-block">post(form, uri)</samp>
						<samp class="d-block">post(form, uri, data)</samp>
						<samp class="d-block">post(form, uri, data, config)</samp>
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
									<td><code>uri</code></td>
									<td>string</td>
									<td>The Uri of the endpoint</td>
								</tr>
								<tr>
									<td><code>data</code></td>
									<td>object</td>
									<td>The POST data</td>
								</tr>
								<tr>
									<td><code>config</code></td>
									<td>object</td>
									<td>
										Additional config for the axios request. Additional options see below.
									</td>
								</tr>
								<tr>
									<td><code>form</code></td>
									<td>object</td>
									<td>
										Must contain a <code>clearValidation</code> 
										and a <code>setFeedback</code> function. 
										For best practice use the 
										<a href="<?= site_url("extensions/FHC-Core-Developer/examples/vuejs/forms#formcomponent"); ?>">
											Form component
										</a>.<br>
										If this parameter is set, validations will be displayed using these functions.
									</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="plugin-usage-options" class="list-group-item list-group-item-secondary">
						Additional ajax options are:
					</li>
					<li class="list-group-item">
						<table class="table table-sm">
							<thead class="">
								<tr>
									<th>Option</th>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><code>errorHandling</code></td>
									<td>string | boolean</td>
									<td>
										If set to false or "off" automatic error handling will be disabled.<br>
										If set to "fail" automatic error handling will be disabled for successfull calls.<br>
										If set to "success" automatic error handling will only be enabled for successfull calls.
									</td>
								</tr>
								<tr>
									<td><code>errorHeader</code></td>
									<td>string</td>
									<td>
										Use this as title of the alerts.<br>
										Usefull when making multiple calls to distinct the error and success messages.
									</td>
								</tr>
								<tr>
									<td><code>form</code></td>
									<td>object</td>
									<td>You can use this instead of the form paramater in the post and get functions.</td>
								</tr>
								<tr>
									<td>
										<code>validationErrorHandler</code><br>
										<code>generalErrorHandler</code><br>
										<code>phpErrorHandler</code><br>
										<code>exceptionErrorHandler</code><br>
										<code>dbErrorHandler</code><br>
										<code>authErrorHandler</code>
									</td>
									<td>function</td>
									<td>
										Overwrite the error handling function for the respective error types.
										Two parameter will be submitted: error and config.
									</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>

				<h3 class="h4" id="plugin-factory">Factory</h3>
				<p>
					The FhcAPI factory is a way to organize API endpoints.<br>
					The core factory functions are located in <code>/public/js/api/fhcapifactory.js</code> and are loaded automatically.<br>
					Extension factory functions must be included via the <a href="#plugin-options">plugin option</a>.
				</p>
				<h4 class="h5" id="plugin-factory">Providing endpoints</h4>
				<p>
					Best practice is to write new endpoint functions into <code>/public/js/api</code> 
					and it's subfolders.<br>
					Inlude core endpoints into the cores <code>/public/js/api/fhcapifactory.js</code> file.<br>
					Load Extension endpoints as necessary via the <a href="#plugin-options">plugin option</a>.<br>
					Use mindful naming and subfolders to keep the factory simple and understandable.
				</p>
				<p>
					The endpoint functions should return a <code>Promise</code>.<br>
					Preferably those returned by a <code>this.$fhcApi.get()</code> or <code>this.$fhcApi.post()</code> call.
				</p>
				<h5 class="h6 mt-3" id="plugin-factory">Endpoint example:</h5>
				<pre class="border"><code class="language-js"><?= htmlentities(
					'// in /public/js/api/examples.js:' . "\n" .
					'export default {' . "\n" .
					'	doSmth() {' . "\n" .
					'		return this.$fhcApi.get(\'path/to/backend\');' . "\n" .
					'	}' . "\n" .
					'};' . "\n" .
					"\n" .
					'// in /public/js/api/fhcapifactory.js:' . "\n" .
					'import examples from \'./examples.js\';' . "\n" .
					'...' . "\n" .
					'export default {' . "\n" .
					'	examples,' . "\n" .
					'	...' . "\n" .
					'};' . "\n" .
					"\n" .
					'// usage:' . "\n" .
					'this.$fhcApi.factory.examples.doSmth();'
				); ?></code></pre>


				<h2 class="h3" id="controller">FhcApi Controller</h2>
				<p class="lead">
					/controllers/api/frontend/v1/*
				</p>
				<p>
					All FhcApi Controllers must extend the global Controller <code>FHCAPI_Controller</code> 
					which is a child of <code>Auth_Controller</code>.<br>
					The output will always be a JSON string of the internal 
					<code>$returnObj</code> 
					variable (except, for security reasons, for response code 404).
				</p>

				<h3 id="controller-returnobj" class="h4">Output object</h3>
				<p>
					The output object will be returned by the endpoints and processed by the frontend.
				</p>
				<h4 class="h5">Basic Response</h4>
				<pre class="border"><code class="language-js"><?= htmlentities(
					'{' . "\n" .
					'	meta {' . "\n" .
					'		status: "success"' . "\n" .
					'	},' . "\n" .
					'	data: null,' . "\n" .
					'	errors: [' . "\n" .
					'		{' . "\n" .
					'			type: "general",' . "\n" .
					'			message: "Some error occured!"' . "\n" .
					'		},' . "\n" .
					'		{' . "\n" .
					'			type: "validation",' . "\n" .
					'			messages: {' . "\n" .
					'				"field1": "Field1 has an validation error!"' . "\n" .
					'			}' . "\n" .
					'		}' . "\n" .
					'	]' . "\n" .
					'}'
				); ?></code></pre>
				<ul class="list-group mb-3">
					<li id="controller-returnobj-base" class="list-group-item list-group-item-primary">
						Top level keys
					</li>
					<li class="list-group-item">
						<table class="table table-sm">
							<thead class="">
								<tr>
									<th>Key</th>
									<th>Required</th>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><code>meta</code></td>
									<td>Required</td>
									<td>object</td>
									<td>
										An object containing metadata (Most notably the status key which is mandatory)
									</td>
								</tr>
								<tr>
									<td><code>data</code></td>
									<td>Optional</td>
									<td>mixed</td>
									<td>
										Resulting data of the request
									</td>
								</tr>
								<tr>
									<td><code>errors</code></td>
									<td>Optional</td>
									<td>array</td>
									<td>
										An array containing all errors that occured during processing
									</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li class="list-group-item list-group-item-secondary">
						meta
					</li>
					<li class="list-group-item">
						Additional data for the request.<br>
						The most important is the mandatory status key.
						It can take one of three values:
						<table class="table table-sm">
							<thead class="">
								<tr>
									<th>Value</th>
									<th>Description</th>
									<th>Required keys</th>
									<th>Optional keys</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><code>success</code></td>
									<td>All went well, and (usually) some data was returned</td>
									<td>data</td>
									<td>errors</td>
								</tr>
								<tr>
									<td><code>fail</code></td>
									<td>There was a problem with the data submitted, or some pre-condition of the API call wasn't satisfied</td>
									<td>errors</td>
									<td>data</td>
								</tr>
								<tr>
									<td><code>error</code></td>
									<td>An error occurred in processing the request, i.e. an exception was thrown</td>
									<td>errors</td>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li class="list-group-item list-group-item-secondary">
						data
					</li>
					<li class="list-group-item">
						The main data of the request.
					</li>
					<li class="list-group-item list-group-item-secondary">
						errors
					</li>
					<li class="list-group-item">
						<p>
							A list of errors that occurred.
							Each error must have a type.
							There are seven types:
						</p>

						<h5><code>404</code></h5>
						<p>
							This type is special as it does not have a JSON body and can't have other errors or meta data.<br>
							For security reasons it looks exactly like other 404/Not Found pages.
						</p>
						<p>Can manually be called with <code>show_404()</code></p>

						<h5><code>auth</code></h5>
						<p>
							This type is used if the user has no permission to access this endpoint.<br>
							It is sent with a <code>401</code> or a <code>403</code> response header depending if the user is logged in or not.
						</p>
						<p>
							It's called automatically if the permissions of the constructor are not met 
							or manually by calling:<br>
							<code>$this->_outputAuthError([$this->router->method => "permission:rw"])</code><br>
							or<br>
							<code>$this->_outputAuthError([$this->router->method => ["permission1:rw", "permission2:r"]])</code>
						</p>
						<pre><code class="language-js"><?= htmlentities(
							'{' . "\n" .
							'	type: "auth",' . "\n" .
							'	message: "You are not allowed to access to this content"' . "\n" .
							'	controller: "My_Controller"' . "\n" .
							'	method: "myMethod"' . "\n" .
							'	required_permissions: "permission:rw"' . "\n" .
							'}'
						); ?></code></pre>

						<h5><code>db</code></h5>
						<p>
							Errors that occur inside the database are using this type.<br>
							In <code>development</code> mode a PHP warning will be called alongside the database error.<br>
							in <code>production</code> mode you have to call the error manually.
						</p>
						<p>
							It's called automatically in <code>development</code> mode.<br>
							or manually by calling either:<br>
							<code>$this->getDataOrTerminateWithError($retvalobject, self::ERROR_TYPE_DB)</code><br>
							or<br>
							<code>$this->addError($errormsgfromdb, self::ERROR_TYPE_DB)</code>
						</p>
						<pre><code class="language-js"><?= htmlentities(
							'{' . "\n" .
							'	type: "db",' . "\n" .
							'	heading: "A Database Error Occurred", ' . '/* only in development mode */' . "\n" .
							'	message: "ERROR:  relation \"not_existing_table\" does not existLINE 1: SELECT * FROM not_existing_table",' . "\n" .
							'	code: 42, ' . '/* optional */' . "\n" .
							'	sql: "SELECT * FROM not_existing_table", ' . '/* only in development mode */' . "\n" .
							'	filename: "core/DB_Model.php", ' . '/* only in development mode */' . "\n" .
							'	line: 42, ' . '/* only in development mode */' . "\n" .
							'}'
						); ?></code></pre>

						<h5><code>exeption</code></h5>
						<p>This type is used for PHP Exceptions.</p>
						<p>Triggered automatically by the PHP engine or by manually throwing an PHP Exception</p>
						<pre><code class="language-js"><?= htmlentities(
							'{' . "\n" .
							'	type: "php",' . "\n" .
							'	message: "Test exception",' . "\n" .
							'	class: "SomeController",' . "\n" .
							'	filename: "/path/to/file/Some_Controller.php",' . "\n" .
							'	line: 42,' . "\n" .
							'	/* if SHOW_DEBUG_BACKTRACE is true */' . "\n" .
							'	backtrace: [' . "\n" .
							'		{' . "\n" .
							'			file: "/path/to/file/example.php",' . "\n" .
							'			line: 42,' . "\n" .
							'			function: "some_function",' . "\n" .
							'		},' . "\n" .
							'		...' . "\n" .
							'	]' . "\n" .
							'}'
						); ?></code></pre>

						<h5><code>general</code></h5>
						<p>
							This is the basic type. All errors that do not fit into the other types are using this one.
						</p>
						<p>
							It's called with either:<br>
							<code>show_error($message)</code>,<br>
							<code>$this->terminateWithError($message)</code><br>
							or<br>
							<code>$this->addError($message)</code>
						</p>
						<pre><code class="language-js"><?= htmlentities(
							'{' . "\n" .
							'	type: "general",' . "\n" .
							'	heading: "Test error",' . "\n" .
							'	message: "An error occured",' . "\n" .
							'}'
						); ?></code></pre>

						<h5><code>php</code></h5>
						<p>
							This type is use for everything thrown by the PHP error reporting.
						</p>
						<p>Triggered automatically by the PHP engine</p>
						<pre><code class="language-js"><?= htmlentities(
							'{' . "\n" .
							'	type: "php",' . "\n" .
							'	message: "Test warning",' . "\n" .
							'	severity: "Warning",' . "\n" .
							'	filename: "./example.php",' . "\n" .
							'	line: 42,' . "\n" .
							'	/* if SHOW_DEBUG_BACKTRACE is true */' . "\n" .
							'	backtrace: [' . "\n" .
							'		{' . "\n" .
							'			file: "/path/to/file/example.php",' . "\n" .
							'			line: 42,' . "\n" .
							'			function: "some_function",' . "\n" .
							'		},' . "\n" .
							'		...' . "\n" .
							'	]' . "\n" .
							'}'
						); ?></code></pre>

						<h5><code>validation</code></h5>
						<p>
							If the parameter sent with the request do not meet the requirements of the endpoint,
							this type should be used.<br>
							The response status in the meta key should be either <code>success</code> (in rare cases) or <code>fail</code>
							and the response header should be <code>200</code> or <code>400</code> respectively.
						</p>
						<p>
							The recommend way is to call:<br>
							<code>$this->terminateWithValidationErrors($this->form_validation->error_array())</code><br>
							<small>(status and header are set to fail/400)</small><br>
							but can also be called with:<br>
							<code>$this->addError($errorarray, self::ERROR_TYPE_VALIDATION)</code><br>
							<small>(status and header are not set)</small><br>
							or<br>
							<code>$this->terminateWithError($errorarray, self::ERROR_TYPE_VALIDATION, 400)</code><br>
							<small>(status and header are set based on the last parameter)</small>
						</p>
						<pre><code class="language-js"><?= htmlentities(
							'{' . "\n" .
							'	type: "validation",' . "\n" .
							'	messages: {' . "\n" .
							'		field1: "There is an error in field1"' . "\n" .
							'	}' . "\n" .
							'}'
						); ?></code></pre>
					</li>
				</ul>

				<h3 id="controller-output" class="h4">Handle the output</h3>
				<p>
					To manipulate the output variable there are several functions:
				</p>
				<ul class="list-group mb-3">
					<li id="controller-output-adderror" class="list-group-item list-group-item-primary">
						addError
					</li>
					<li class="list-group-item">
						Add one or more errors.<br>
						For best practice only use the ERROR_TYPE_* constants inside FHCAPI_Controller as type.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">addError($data)</samp>
						<samp class="d-block">addError($data, $type)</samp>
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
									<td><code>$data</code></td>
									<td>string|array|object</td>
									<td>
										If $data is a string it will set the message attribute of the error to that value. 
										Otherwise it will either overwrite the error with the array/object 
										or if the type is set to FHCAPI_Controller::ERROR_TYPE_VALIDATION and $data is an array 
										it will set the messages attribute of the error to that value.
									</td>
								</tr>
								<tr>
									<td><code>$type</code></td>
									<td>string</td>
									<td>Specify the type of the error. Defaults to FHCAPI_Controller::ERROR_TYPE_GENERAL</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="controller-output-setdata" class="list-group-item list-group-item-primary">
						setData
					</li>
					<li class="list-group-item">
						Set the data value of the output.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">setData($data)</samp>
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
									<td><code>$data</code></td>
									<td>mixed</td>
									<td>Any value that can be processed by the frontend</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="controller-output-addmeta" class="list-group-item list-group-item-primary">
						addMeta
					</li>
					<li class="list-group-item">
						Adds meta data to the output.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">addMeta($key, $value)</samp>
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
									<td><code>$key</code></td>
									<td>string</td>
									<td>The index for the meta array (an associative array) to store the value into</td>
								</tr>
								<tr>
									<td><code>$value</code></td>
									<td>mixed</td>
									<td>The value to add to the meta array</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="controller-output-getmeta" class="list-group-item list-group-item-primary">
						getMeta
					</li>
					<li class="list-group-item">
						Gets meta data.<br>
						The reverse function of the one above.<br><br>
						Returns: <code>mixed</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">getMeta($key)</samp>
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
									<td><code>$key</code></td>
									<td>string</td>
									<td>The index for the meta array (an associative array) of which to retrieve the data</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="controller-output-setstatus" class="list-group-item list-group-item-primary">
						setStatus
					</li>
					<li class="list-group-item">
						Sets the status in the meta array.<br>
						This is equal to addMeta('status', $status).<br>
						If no status is set at the time of output the class will set it automatically based on the HTTP response code.<br>
						For best practice use the STATUS_* constants inside FHCAPI_Controller.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">setStatus($status)</samp>
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
									<td><code>$status</code></td>
									<td>string</td>
									<td>The status to set</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>

				<h3 id="controller-helper" class="h4">Helper functions</h3>
				<p>
					These functions handle basic needs when programming an endpoint.
				</p>
				<ul class="list-group mb-3">
					<li id="controller-helper-terminatewithsuccess" class="list-group-item list-group-item-primary">
						terminateWithSuccess
					</li>
					<li class="list-group-item">
						End execution here and output with status success.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">terminateWithSuccess()</samp>
						<samp class="d-block">terminateWithSuccess($data)</samp>
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
									<td><code>$data</code></td>
									<td>mixed</td>
									<td>
										<a href="#controller-output-setdata">see above</a>
										Defaults to <code>null</code>
									</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="controller-helper-terminatewitherror" class="list-group-item list-group-item-primary">
						terminateWithError
					</li>
					<li class="list-group-item">
						Call addError, end execution here and output with status error.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">terminateWithError($error)</samp>
						<samp class="d-block">terminateWithError($error, $type)</samp>
						<samp class="d-block">terminateWithError($error, $type, $status)</samp>
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
									<td><code>$error</code></td>
									<td>string|array|object</td>
									<td><a href="#controller-output-adderror">see above</a></td>
								</tr>
								<tr>
									<td><code>$type</code></td>
									<td>string</td>
									<td><a href="#controller-output-adderror">see above</a></td>
								</tr>
								<tr>
									<td><code>$status</code></td>
									<td>integer</td>
									<td>HTTP status code. Defaults to REST_Controller::HTTP_INTERNAL_SERVER_ERROR (500)</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="controller-helper-terminatewithvalidationerrors" class="list-group-item list-group-item-primary">
						terminateWithValidationErrors
					</li>
					<li class="list-group-item">
						Call addError, end execution here and output with status fail.<br><br>
						Returns: <code>void</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">terminateWithValidationErrors($errors)</samp>
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
									<td><code>$errors</code></td>
									<td>array</td>
									<td>Associative array of error messages</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li id="controller-helper-getdata" class="list-group-item list-group-item-primary">
						getDataOrTerminateWithError
					</li>
					<li class="list-group-item">
						Checks a given retval object (e.g: from a Model) and 
						calls terminateWithError on error or returns the 
						retval on success.<br><br>
						Returns: <code>mixed</code>
					</li>
					<li class="list-group-item">
						<samp class="d-block">getDataOrTerminateWithError($result)</samp>
						<samp class="d-block">getDataOrTerminateWithError($result, $errortype)</samp>
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
									<td><code>$result</code></td>
									<td>stdClass</td>
									<td>TODO(chris): IMPLEMENT!</td>
								</tr>
								<tr>
									<td><code>$errortype</code></td>
									<td>string</td>
									<td>Set an alternative error type in case one occurs</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>


				<div class="d-flex justify-content-between">
					<h2 class="h3" id="example">Examples:</h2>
					<a
						href="#"
						onclick="event.preventDefault()"
						data-bs-files="FHC-Core-Developer/public/js/apps/examples/Fhcapi/Basic.js"
						data-bs-toggle="tooltip"
						data-bs-placement="left"
						data-bs-html="true"
						data-bs-custom-class="filelist"
						>
						<i class="fa-solid fa-circle-info"></i>
					</a>
				</div>
				<section class="border p-3">
					<div id="example-fhcapi-basic"></div>
				</section>
			</main>
		</div>
	</div>

	<style type="text/css">
		@import url("https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css");
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
	<script>hljs.configure({cssSelector:'pre code:not([data-highlighted="yes"])'});hljs.highlightAll();</script>

<?php $this->load->view('templates/FHC-Footer', $includesArray); ?>
