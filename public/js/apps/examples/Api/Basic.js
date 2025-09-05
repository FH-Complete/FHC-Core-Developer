/**
 * Copyright (C) 2025 fhcomplete.org
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

// Load Plugins:
// ============
import PluginsApi from "../../../../../../js/plugins/Api.js";

// Load Extension Factory:
// ======================
import ApiExamples from "../../../api/examples.js";

// Create App:
// ==========
const app = Vue.createApp({
	data() {
		return {
			header: "",
			status: "",
			data: "",
			queryList: [],
			validationErrorValue: "",
			dbValue: ""
		};
	},
	methods: {
		getList() {
			this.$api
				.call(
					ApiExamples.getList(),
					/* Prevent automatic error handling for demonstration purposes */
					{ errorHandling: false }
				)
				.then(this._showSuccess)
				.catch(this._showError);
		},
		getError() {
			this.$api
				.call(
					ApiExamples.getError(),
					/* Prevent automatic error handling for demonstration purposes */
					{ errorHandling: false }
				)
				.then(this._showSuccess)
				.catch(this._showError);
		},
		getException() {
			this.$api
				.call(
					ApiExamples.getException(),
					/* Prevent automatic error handling for demonstration purposes */
					{ errorHandling: false }
				)
				.then(this._showSuccess)
				.catch(this._showError);
		},
		postValidationError() {
			this.$api
				.call(
					ApiExamples.postValidationError(this.validationErrorValue),
					/* Prevent automatic error handling for demonstration purposes */
					{ errorHandling: false }
				)
				.then(this._showSuccess)
				.catch(this._showError);
		},
		getAuth() {
			this.$api
				.call(
					ApiExamples.getAuth(),
					/* Prevent automatic error handling for demonstration purposes */
					{ errorHandling: false }
				)
				.then(this._showSuccess)
				.catch(this._showError);
		},
		postDb() {
			this.$api
				.call(
					ApiExamples.postDb(this.dbValue),
					/* Prevent automatic error handling for demonstration purposes */
					{ errorHandling: false }
				)
				.then(this._showSuccess)
				.catch(this._showError);
		},
		_showSuccess(result) {
			this.header = result.meta.response.statusText;
			this.status = result.meta.response.status;
			this.data = JSON.stringify(result, null, 2);
		},
		_showError(error) {
			this.header = error.response.statusText;
			this.status = error.response.status;
			this.data = JSON.stringify(error.response.data, null, 2);
		}
	},
	created() {
		this.$api
			.call(
				ApiExamples.getList(),
				/* Prevent automatic error handling for demonstration purposes */
				{ errorHandling: false }
			)
			.then(result => this.queryList = result.data)
			.catch(this.$fhcAlert.handleSystemError);
	},
	template: `
	<div class="app-example-api-basic">
		<div>
			<div class="input-group mb-3">
				<span class="input-group-text">GET</span>
				<span class="input-group-text flex-grow-1">
					/api/frontend/v1/fhcapi/getList
				</span>
				<button class="btn btn-outline-secondary" @click="getList">
					Send request
				</button>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">GET</span>
				<span class="input-group-text flex-grow-1">
					/api/frontend/v1/fhcapi/getError
				</span>
				<button class="btn btn-outline-secondary" @click="getError">
					Send request
				</button>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">GET</span>
				<span class="input-group-text flex-grow-1">
					/api/frontend/v1/fhcapi/getException
				</span>
				<button class="btn btn-outline-secondary" @click="getException">
					Send request
				</button>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">POST</span>
				<span class="input-group-text flex-grow-1">
					/api/frontend/v1/fhcapi/postValidationError
				</span>
				<span class="input-group-text">Value</span>
				<input type="text" class="form-control" v-model="validationErrorValue">
				<button class="btn btn-outline-secondary" @click="postValidationError">
					Send request
				</button>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">GET</span>
				<span class="input-group-text flex-grow-1">
					/api/frontend/v1/fhcapi/getAuth
				</span>
				<button class="btn btn-outline-secondary" @click="getAuth">
					Send request
				</button>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">POST</span>
				<span class="input-group-text flex-grow-1">
					/api/frontend/v1/fhcapi/postDb
				</span>
				<span class="input-group-text">Query</span>
				<select class="form-select" v-model="dbValue">
					<option v-for="(label, value) in queryList" :key="value" :value="value">{{ label }}</option>
				</select>
				<button class="btn btn-outline-secondary" @click="postDb">
					Send request
				</button>
			</div>
		</div>
		<h5>Response</h5>
		<div class="border bg-light px-3 py-2">
			<span v-if="!status" class="d-block text-muted text-center">TODO(chris): TEXT</span>
			<span :class="status == 200 ? 'text-success' : 'text-danger'">{{ header }} {{ status }}</span>
			<pre v-html="data" class="mb-0"></pre>
		</div>
	</div>`
});

app
	// Use Plugins:
	// ===========
	// PluginsApi
	.use(PluginsApi)

	// Start the App:
	// =============
	.mount('#example-api-basic');
