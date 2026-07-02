/**
 * Copyright (C) 2024 fhcomplete.org
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

// Load Components:
// ===============
import { CoreNavigationCmpt } from "../../../../js/components/navigation/Navigation.js";
import FhcApi from '../../../../js/plugin/FhcApi.js';
import fhcapifactory from "../../../../js//api/fhcapifactory.js";
Vue.$fhcapi = fhcapifactory;

// Create App:
// ==========
const app = Vue.createApp({
	components: {
		CoreNavigationCmpt
	},
	mounted() {
		document.body.style.position = 'relative';

		const sidenav = document.getElementById('sidenav');
		if (sidenav) {
			if (!sidenav.children.length) {
				// Populate sidenav
				document
					.querySelectorAll('#content > main [id][data-nav-level]')
					.forEach(el => {
						const link = document.createElement('a');
						link.href = '#' + el.id;
						link.className = 'list-group-item list-group-item-action py-1';

						let name = el.dataset.navTitle || el.innerText;
						let tier = parseInt(el.dataset.navLevel);
						while (--tier)
							name = '<span class="ps-3">' + name + '</span>';
						link.innerHTML = name;

						sidenav.append(link);
					});
			}
			
			new bootstrap.ScrollSpy(document.body, {
				target: '#sidenav'
			});
		}

		document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el, {
			title: function() {
				if (!this.dataset.bsFiles)
					return '';
				return '<ul>' + this.dataset.bsFiles.split(',').map(t => '<li>' + t.trim() + '</li>').join('') + '</ul>';
			}
		}));
	}
});
app.use(FhcApi);
app
	// Start the App:
	// =============
	.mount('#nav');
