/**
 * Copyright (C) 2026 fhcomplete.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
import CoreBaseLayout from "../../../../../js/components/layout/BaseLayout.js";
import { CoreFilterCmpt } from "../../../../../js/components/filter/Filter.js";
import { CoreNavigationCmpt } from "../../../../../js/components/navigation/Navigation.js";
import docTabulatorLocalization from "../docs/docTabulatorLocalization.js";

export default {
	components: {
		CoreBaseLayout,
		CoreNavigationCmpt,
		CoreFilterCmpt,
		docTabulatorLocalization
	},
	data: () => {
		return {
			languages: FHC_JS_DATA_STORAGE_OBJECT.server_languages,
			tableConfig: {
				minHeight: 300,
				movableColumns: false,
				layout: "fitColumns",
				pagination: true,
				paginationSize: 25,
				paginationCounter: "rows",
				locale: true,
				columns: [
					{
						title: "placeholder",
						titlePhrase: "person/vorname",
						field: "firstName",
						sorter: "string",
					},
					{
						title: "placeholder",
						titlePhrase: "person/nachname",
						field: "lastName",
						sorter: "string",
					},
					{
						title: "placeholder",
						titlePhrase: "person/geburtsdatum",
						field: "birthday",
						sorter: "datetime",
					},
					{
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
			},
		};
	},
	methods: {
		setLanguage(language) {
			this.$p.setLanguage(language);
		},
	},
	template: /*html*/ `
	<!-- Navigation -->
	<core-navigation-cmpt></core-navigation-cmpt>

	<core-base-layout
		:title="'Tabulator with localization'"
		mainCols="8"
		asideCols="4"
	>
		<template #main>
			<core-filter-cmpt
				:title="'Example table'"
				:ref="'exampleTable'"
				:tabulatorOptions="tableConfig"
				:sideMenu="false"
				tableOnly
			>
				<template #actions>
					<button
						v-for="language in languages"
						@click="setLanguage(language.sprache)"
						:key="language"
						class="btn"
						:class="$p.user_language.value === language.sprache ? 'btn-primary' : 'btn-outline-primary'"
					>
						{{ language.bezeichnung }}
					</button>
				</template>
			</core-filter-cmpt>
		</template>
		<template #aside>
			<span>The structure of and data in this table are arbitrary. It only exists to demonstrate the use of custom Tabulator localization.</span>
			<br>
			<br>
			<span>Toggle languages with the action buttons above the table. Note the effect on the column headings (both in the actual table and in the column filter collapsible), as well as the built-in footer elements. The "Username" column heading is not localized.</span>
			<br>
			<br>
			<span>Follow instructions below to set up use of localization in Tabulator instances. Only a couple minor modifications to the config object are necessary. If applying to a table with an existing localization workaround (e.g. resetting columns entirely with setColumns), remove the workaround.</span>
		</template>
	</core-base-layout>
	<doc-tabulator-localization />
`,
};
