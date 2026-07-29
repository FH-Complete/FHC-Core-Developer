export default {
	template: `
<div class="row-col mt-5">
<h3 class="h4">Basic Structure: Tabulator with localization</h3>		
<div class="card card-body bg-light mt-3">
<code><pre>
<span class="text-muted">// Import the Filter component</span>
import {CoreFilterCmpt} from '../../../../../js/components/filter/Filter.js';
export default {
	components: { 
		CoreNavigationCmpt,
		CoreFilterCmpt,
		CoreBaseLayout
	 },
	data() {
		return {
			tableConfig: {
				minHeight: 300,
				movableColumns: false,
				layout: "fitColumns",
				pagination: true,
				paginationSize: 25,
				paginationCounter: "rows",
				<span class="text-muted">// Set 'locale' property to true</span>
				locale: true,
				columns: [
					{
						<span class="text-muted">// For each localized column, add 'titlePhrase' property containing...</span>
						<span class="text-muted">// ...the column heading phrase as a single string with a forward slash</span>
						titlePhrase: "person/vorname",
						<span class="text-muted">// To prevent internal Tabulator issues, still declare a 'title' property...</span>
						<span class="text-muted">// ...but content can be any non-empty string</span>
						title: "placeholder",
						field: "firstName",
						sorter: "string",
					},
					{
						titlePhrase: "person/nachname",
						title: "placeholder",
						field: "lastName",
						sorter: "string",
					},
					{
						titlePhrase: "person/geburtsdatum",
						title: "placeholder",
						field: "birthday",
						sorter: "datetime",
					},
					{
						<span class="text-muted">// To keep a column non-localized even if localization is enabled...</span>
						<span class="text-muted">// ...keep conventional use of 'title' property and omit 'titlePhrase' property</span>
						title: "Username",
						field: "username",
						sorter: "string",
					},
				],
				data: [
					{
						firstName: "Fernando",
						lastName: "Alonso",
						birthday: "29.07.1981",
						username: "fe.al",
					},
					{
						firstName: "Nigel",
						lastName: "Mansell",
						birthday: "08.08.1953",
						username: "ni.ma",
					},
					{
						firstName: "Gilles",
						lastName: "Villeneuve",
						birthday: "18.01.1950",
						username: "gi.vi",
					},
				],
			}
		};
	},
	<span class="text-muted">//...</span>
	template: &#96;
		&lt;core-filter-cmpt
			:title="'Example table'"
			:ref="'exampleTable'"
			:tabulatorOptions="tableConfig"
			:sideMenu="false"
			tableOnly
		/&gt;
	&#96;
},
`
};