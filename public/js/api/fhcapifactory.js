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

export default {
	examples: {
		getList() {
			return this.$fhcApi.get(
				'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getList',
				{},
				{
					/* Prevent automatic error handling for demonstration purposes */
					errorHandling: false
				}
			);
		},
		getError() {
			return this.$fhcApi.get(
				'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getError',
				{},
				{
					/* Prevent automatic error handling for demonstration purposes */
					errorHandling: false
				}
			);
		},
		getException() {
			return this.$fhcApi.get(
				'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getException',
				{},
				{
					/* Prevent automatic error handling for demonstration purposes */
					errorHandling: false
				}
			);
		},
		postValidationError(value) {
			return this.$fhcApi.post(
				'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/postValidationError',
				{
					value
				},
				{
					/* Prevent automatic error handling for demonstration purposes */
					errorHandling: false
				}
			);
		},
		getAuth() {
			return this.$fhcApi.post(
				'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/getAuth',
				{},
				{
					/* Prevent automatic error handling for demonstration purposes */
					errorHandling: false
				}
			);
		},
		postDb(query) {
			return this.$fhcApi.post(
				'extensions/FHC-Core-Developer/api/frontend/v1/fhcapi/postDb',
				{
					query
				},
				{
					/* Prevent automatic error handling for demonstration purposes */
					errorHandling: false
				}
			);
		}
	}
};
