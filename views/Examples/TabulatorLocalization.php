<?php
$includesArray = array(
	'title' => 'My Extension',
	'vue3' => true,
	'axios027' => true,
	'bootstrap5' => true,
	'tabulator5' => true,
	'fontawesome6' => true,
	'primevue3' => true,
	'navigationcomponent' => true,
	'filtercomponent' => true,
	'customJSs' => array(
		'vendor/moment/luxonjs/luxon.min.js'
	),
	'customJSModules' => array(
		'public/extensions/FHC-Core-Developer/js/apps/Examples2.js',
	),
	'customCSSs' => array('public/extensions/FHC-Core-Developer/css/FhcMain.css')

);

$this->load->view('templates/FHC-Header', $includesArray);
?>

<div id="main">
	<tabulator-localization></tabulator-localization>
</div>

<?php $this->load->view('templates/FHC-Footer', $includesArray); ?>