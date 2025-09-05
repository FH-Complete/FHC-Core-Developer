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

export default {
	getList() {
		return {
			method: 'get',
			url: 'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getList'
		};
	},
	getError() {
		return {
			method: 'get',
			url: 'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getError'
		};
	},
	getException() {
		return {
			method: 'get',
			url: 'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getException'
		};
	},
	postValidationError(value) {
		return {
			method: 'post',
			url: 'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/postValidationError',
			params: { value }
		};
	},
	getAuth() {
		return {
			method: 'post',
			url: 'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getAuth'
		};
	},
	postDb(query) {
		return {
			method: 'post',
			url: 'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/postDb',
			params: { query }
		};
	}
};